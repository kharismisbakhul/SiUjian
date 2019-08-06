<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dosen_model extends CI_Model
{
    public function getListDosen()
    {
        $query = "SELECT dosen.nama_dosen, dosen.nip, dosen.statusAktif, COUNT(pembimbing.Mahasiswanim) as 'jumlah_bimbingan' FROM dosen left join pembimbing on dosen.nip = pembimbing.Dosennip GROUP BY dosen.nama_dosen";
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
        $this->db->join('mahasiswa', 'mahasiswa.nim = pembimbing.Mahasiswanim', 'right');
        $this->db->join('prodi', 'prodi.kode = mahasiswa.prodikode');
        $this->db->join('jurusan', 'jurusan.kode = prodi.jurusankode');
        return $this->db->get();
    }

    public function getStatusBimbingan($nip, $star_date = null, $end_date = null)
    {
        $this->db->select('pmb.mahasiswanim ,MAX(kodeujian.kode) as K,pmb.tgl_tambah_pembimbing');
        $this->db->from('pembimbing as pmb');
        $this->db->join('ujian', 'ujian.mahasiswanim = pmb.mahasiswanim', 'left');
        $this->db->join('kodeujian', 'ujian.kodeujiankode = kodeujian.kode', 'left');
        $this->db->where('pmb.dosennip', $nip);
        if ($star_date != null && $end_date != null) {
            $this->db->where('pmb.tgl_tambah_pembimbing >=', $star_date);
            $this->db->where('pmb.tgl_tambah_pembimbing <=', $end_date);
        }
        $this->db->group_by('pmb.mahasiswanim');
        $from_clause = $this->db->get_compiled_select();

        $this->db->select('kodeujian.nama_ujian,kode.*,mahasiswa.nama,prodi.nama_prodi,mahasiswa.jenjang,statusUjian,statusKelulusan');
        $this->db->from('kodeujian');
        $this->db->join('(' . $from_clause . ') as kode', 'kode.K = kodeujian.kode', 'right');
        $this->db->join('mahasiswa', 'mahasiswa.nim = kode.mahasiswanim', 'left');
        $this->db->join('prodi', 'mahasiswa.prodikode = prodi.kode', 'left');
        $this->db->join('ujian', 'kode.mahasiswanim = ujian.mahasiswanim AND ujian.kodeujiankode = kode.K', 'left');
        $this->db->order_by('kode.tgl_tambah_pembimbing', 'ASC');
        return $this->db->get()->result_array();
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
        if ($updateNilaiAkhir > 80) {
            $this->db->set('nilai_huruf', 'A');
            $this->db->set('bobot', 4.0);
            $this->db->set('statusUjian', 1);
        } elseif ($updateNilaiAkhir > 75) {
            $this->db->set('nilai_huruf', 'B+');
            $this->db->set('bobot', 3.5);
            $this->db->set('statusUjian', 1);
        } elseif ($updateNilaiAkhir > 69) {
            $this->db->set('nilai_huruf', 'B');
            $this->db->set('bobot', 3.0);
            $this->db->set('statusUjian', 1);
        } elseif ($updateNilaiAkhir > 60) {
            $this->db->set('nilai_huruf', 'C+');
            $this->db->set('bobot', 2.5);
            $this->db->set('statusUjian', 3);
        } elseif ($updateNilaiAkhir > 55) {
            $this->db->set('nilai_huruf', 'C');
            $this->db->set('bobot', 2.0);
            $this->db->set('statusUjian', 3);
        } elseif ($updateNilaiAkhir > 50) {
            $this->db->set('nilai_huruf', 'D+');
            $this->db->set('bobot', 1.5);
            $this->db->set('statusUjian', 3);
        } elseif ($updateNilaiAkhir > 44) {
            $this->db->set('nilai_huruf', 'D');
            $this->db->set('bobot', 1.0);
            $this->db->set('statusUjian', 3);
        } elseif ($updateNilaiAkhir > 0) {
            $this->db->set('nilai_huruf', 'E');
            $this->db->set('bobot', 0.0);
            $this->db->set('statusUjian', 3);
        } else {
            $this->db->set('nilai_huruf', 'K');
            $this->db->set('bobot', 0.0);
            $this->db->set('statusUjian', 2);
        }


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
