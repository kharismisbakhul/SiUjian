<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbingan_model extends CI_Model
{
    public function getMahasiswaBimbingan($dosen_nip)
    {
        $this->db->where('pembimbing.Dosennip = ' . $dosen_nip);
        $this->db->select('*');
        $this->db->from('pembimbing');
        // $this->db->join('pembimbing', 'pembimbing.Dosennip = ' . $dosen_nip);
        $this->db->join('mahasiswa', 'mahasiswa.nim = pembimbing.Mahasiswanim');

        return $this->db->get();
    }
}
