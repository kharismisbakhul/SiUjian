<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_model extends CI_Model
{
    public function getListDosen()
    {
        $query = "SELECT dosen.nama, dosen.nip, dosen.statusAktif, COUNT(pembimbing.Mahasiswanim) as 'jumlah_bimbingan' FROM dosen left join pembimbing on dosen.nip = pembimbing.Dosennip GROUP BY dosen.nama";
        return $this->db->query($query)->result_array();
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
}
