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
        //list Dosen
        $dosen = $this->getListDosen();

        //get mahasiswa bimbingan + jumlah
        for ($i = 0; $i < count($dosen); $i++) {
            $jumlah_bimbingan_lulus = 0;
            $mahasiswa_bimbingan = $this->getMahasiswaBimbingan($dosen[$i]['nip'])->result_array();
            $dosen[$i]['mahasiswa_bimbingan'] = $mahasiswa_bimbingan;
            for ($j = 0; $j < count($mahasiswa_bimbingan); $j++) {
                if ($mahasiswa_bimbingan[$j]['statusKelulusan'] == 1) {
                    $jumlah_bimbingan_lulus++;
                }
            }
            $dosen[$i]['jumlah_mahasiswa_bimbingan'] = $this->getMahasiswaBimbingan($dosen[$i]['nip'])->num_rows();
            $dosen[$i]['jumlah_bimbingan_lulus'] = $jumlah_bimbingan_lulus;
            $dosen[$i]['jumlah_menguji'] = $this->db->get_where('penguji', ['Dosennip' => $dosen[$i]['nip']])->num_rows();
        }

        // $this->db->from('pembimbing');
        // $this->db->join('pembimbing', 'dosen.nip = pembimbing.Dosennip');
        // $this->db->join('mahasiswa', 'mahasiswa.nim = pembimbing.Mahasiswanim');
        // $result = $this->db->get();
        return $dosen;
    }

    public function getDetailRekapDosen($nip)
    {
        $dosen = $this->db->get_where('dosen', ['nip' => $nip])->row_array();
        $jumlah_bimbingan_lulus = 0;
        $mahasiswa_bimbingan = $this->getMahasiswaBimbingan($nip)->result_array();
        $dosen['mahasiswa_bimbingan'] = $mahasiswa_bimbingan;
        for ($j = 0; $j < count($mahasiswa_bimbingan); $j++) {
            if ($mahasiswa_bimbingan[$j]['statusKelulusan'] == 1) {
                $jumlah_bimbingan_lulus++;
            }
        }
        $dosen['jumlah_mahasiswa_bimbingan'] = $this->getMahasiswaBimbingan($nip)->num_rows();
        $dosen['jumlah_bimbingan_lulus'] = $jumlah_bimbingan_lulus;
        $dosen['jumlah_menguji'] = $this->db->get_where('penguji', ['Dosennip' => $nip])->num_rows();
        echo json_encode($dosen);
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

    public function getPengujiHariIni()
    {
        // $this->db->select('*');
        $pengujiHariIni = 0;
        $dosen = $this->db->get('dosen')->result_array();
        for ($i = 0; $i < count($dosen); $i++) {
            $this->db->where('penguji.Dosennip', $dosen[$i]['nip']);
            $this->db->select('*');
            $this->db->from('penguji');
            $this->db->join('ujian', 'ujian.id = penguji.Ujianid');
            $jadwal_menguji = $this->db->get()->result_array();
            $dosen[$i]['jadwal_menguji'] = $jadwal_menguji;
            $ujianHariIni = 0;
            for ($j = 0; $j < count($jadwal_menguji); $j++) {
                if ($jadwal_menguji[$j]['tgl_ujian'] === date('Y-m-d')) {
                    $ujianHariIni++;
                }
            }
            if ($ujianHariIni > 0) {
                $pengujiHariIni++;
            }
            // $dosen[$i]['menguji_hari_ini']
        }
        // $result = $this->db->get()->result_array();
        return $pengujiHariIni;
    }
}
