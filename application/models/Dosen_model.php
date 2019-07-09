<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_model extends CI_Model
{
    public function getListDosen()
    {
        $query = "SELECT dosen.nama, dosen.nip, dosen.statusAktif, COUNT(pembimbing.Mahasiswanim) as 'jumlah_bimbingan' FROM dosen left join pembimbing on dosen.nip = pembimbing.Dosennip GROUP BY dosen.nama";
        return $this->db->query($query)->result_array();
    }
}
