<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

    // public function getCount($table){
    //     return $this->db->get($table,['mahasiswanim' => $nim])->;
    // }

    public function getProfilJurusan($data)
    {
        $this->db->select('prodi.nama_prodi, jurusan.nama_jurusan');

        // prodi -> nama -> kode
        // jurusan -> nama -> kode
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'prodi.kode = ' . $data);
        $this->db->join('jurusan', 'jurusan.kode = prodi.jurusankode');

        return $this->db->get()->row_array();
    }

    public function getBelumUjian($data)
    {
        $this->db->select('kodeujian.*');
        $this->db->from('mahasiswa');
        $this->db->join('ujian', 'ujian.MahasiswaNim=' . $data);
        $this->db->join('kodeujian', 'ujian.kodeUjianKode = kodeujian.kode', 'right');
        $this->db->where('ujian.kodeUjianKode=', null);
        return $this->db->get()->result_array();
    }

    public function getUjian($data)
    {
        $this->db->select('ujian.*,kodeujian.nama_ujian');
        $this->db->from('mahasiswa');
        $this->db->join('ujian', 'ujian.MahasiswaNim=' . $data);
        $this->db->join('kodeujian', 'ujian.kodeUjianKode = kodeujian.kode');
        return $this->db->get()->result_array();
    }


    public function getUjian_Edit($data)
    {
        $this->db->select('kodeujian.*');
        $this->db->from('ujian');
        $this->db->where('id', $data);
        $this->db->join('kodeujian', 'ujian.kodeUjiankode = kodeujian.kode');
        return $this->db->get()->row_array();
    }

    public function editUjian($dataUjian, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('ujian', $dataUjian);
    }


    public function getPublikasi($data)
    {
        $this->db->select('publikasi.*');
        $this->db->from('mahasiswa');
        $this->db->join('publikasi', 'publikasi.Mahasiswanim=' . $data);
        return $this->db->get()->result_array();
    }

    public function editPublikasi($dataPublikasi, $id)
    {
        $this->db->where('idJurnal', $id);
        $this->db->update('publikasi', $dataPublikasi);
    }

    public function insertUjian($dataUjian)
    {
        $this->db->set('tgl_ujian', $dataUjian['tanggal_ujian']);
        $this->db->set('kodeUjiankode', $dataUjian['kodeUjiankode']);
        $this->db->set('MahasiswaNim', $dataUjian['MahasiswaNim']);
        $this->db->set('tgl_tambah_ujian', $dataUjian['tanggal_tambah_ujian']);
        $this->db->set('bukti', $dataUjian['bukti_ujian']);
        $this->db->insert('ujian');
    }
}
