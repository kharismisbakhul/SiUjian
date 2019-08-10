<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getDetailUser($id)
    {
        $data = $this->db->get_where('user', ['id' => $id])->row_array();
        return $data;
    }

    public function getPrivilegesUser($kodeProfileUser)
    {
        $data = $this->db->get_where('userprofile', ['kode' => $kodeProfileUser])->row_array();
        return $data;
    }

    public function getAnotherPrivileges($jenisUser)
    {
        $this->db->where('jenisUser !=', $jenisUser);
        $result = $this->db->get('userprofile')->result_array();
        $data[] = "";
        $i = 0;
        foreach ($result as $r) :
            $data[$i] = $result[$i]['jenisUser'];
            $i++;
        endforeach;
        return $data;
    }
}
