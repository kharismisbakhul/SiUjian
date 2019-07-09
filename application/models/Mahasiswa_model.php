<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

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
        $this->db->select('kodeujian.nama_ujian');
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

    public function getPublikasi($data)
    {
        $this->db->select('publikasi.*');
        $this->db->from('mahasiswa');
        $this->db->join('publikasi', 'publikasi.Mahasiswanim=' . $data);
        return $this->db->get()->result_array();
    }

    public function getMahasiswaPlusProdi()
    {
        $this->db->select('mahasiswa.nama, mahasiswa.prodikode, prodi.kode, prodi.nama_prodi, mahasiswa.jenjang');
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'mahasiswa.prodikode= prodi.kode');
        return $this->db->get()->result_array();
    }
}
