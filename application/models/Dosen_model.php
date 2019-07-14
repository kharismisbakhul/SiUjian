<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dosen_model extends CI_Model
{
    public function getListDosen()
    {
        $query = "SELECT dosen.nama, dosen.nip, dosen.statusAktif, COUNT(pembimbing.Mahasiswanim) as 'jumlah_bimbingan' FROM dosen left join pembimbing on dosen.nip = pembimbing.Dosennip GROUP BY dosen.nama";
        return $this->db->query($query)->result_array();
    }
    public function getRekapDosen()
    {
        $this->db->select('*');
        $this->db->from('pembimbing');
        // $this->db->join('pembimbing', 'dosen.nip = pembimbing.Dosennip');
        $this->db->join('mahasiswa', 'mahasiswa.nim = pembimbing.Mahasiswanim');
        $result = $this->db->get();
        echo json_encode($result->result_array());
    }
    public function getDetailDosen($nip)
    {
        return $this->db->get_where('dosen', ['nip' => $nip])->row_array();
    }
    public function getMahasiswaBimbingan($dosen_nip)
    {
        $this->db->where('pembimbing.Dosennip', $dosen_nip);
        $this->db->select('*');
        $this->db->from('pembimbing');
        // $this->db->join('pembimbing', 'pembimbing.Dosennip = ' . $dosen_nip);
        $this->db->join('mahasiswa', 'mahasiswa.nim = pembimbing.Mahasiswanim', 'right');
        // prodi -> nama -> kode
        // jurusan -> nama -> kode
        $this->db->join('prodi', 'prodi.kode = mahasiswa.prodikode');
        $this->db->join('jurusan', 'jurusan.kode = prodi.jurusankode');
        return $this->db->get();
    }

    public function getUjian($nip)
    {
        $this->db->select('ujian.id,mahasiswa.nama,kodeujian.nama_ujian,ujian.tgl_ujian,ujian.nilai_akhir');
        $this->db->from('penguji');
        $this->db->where('penguji.dosennip', $nip);
        $this->db->join('ujian', 'ujian.id=penguji.ujianid');
        $this->db->join('kodeujian', 'ujian.kodeujiankode=kodeujian.kode');
        $this->db->join('mahasiswa', 'ujian.mahasiswanim=mahasiswa.nim');
        $this->db->order_by('penguji.dosennip');
        return $this->db->get()->result_array();
    }

    public function updateNilai($nilai, $id_penguji)
    {
        $this->db->set('nilai', $nilai);
        $this->db->where('id', $id_penguji);
        $this->db->update('penguji');
    }
    public function updateNilaiAkhir($updateNilaiAkhir, $id_ujian)
    {
        $this->db->set('nilai_akhir', $updateNilaiAkhir);
        $this->db->where('id', $id_ujian);
        $this->db->update('ujian');
    }

    public function cekNilaiAkhir($id_ujian)
    {
        $this->db->select_avg('penguji.nilai');
        $this->db->from('penguji');
        $this->db->where('penguji.ujianid', $id_ujian);
        return $this->db->get()->row_array();
    }
}
