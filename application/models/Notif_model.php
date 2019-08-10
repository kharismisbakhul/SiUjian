<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notif_model extends CI_Model
{
    public function setNotifications($data)
    { }
    public function getNotifications($username, $kode)
    {
        if ($kode == 2) {
            $this->db->where('valid != ', 1);
            $this->db->order_by('tgl_ujian ', 'DSC');
            $result['ujian'] = $this->db->get('ujian')->result_array();

            $this->db->where('valid != ', 1);
            $this->db->order_by('tanggal ', 'DSC');
            $result['publikasi'] = $this->db->get('publikasi')->result_array();

            $result['counter'] = count($result['ujian']) + count($result['publikasi']);
            header("Content-type: application/json");
            echo json_encode($result);
        } else if ($kode = 5) {
            $this->db->where('valid', 1);
            $this->db->where('MahasiswaNim', $username);
            $this->db->order_by('tgl_ujian ', 'DSC');
            $result['ujian'] = $this->db->get('ujian')->result_array();

            $this->db->where('valid', 1);
            $this->db->where('Mahasiswanim', $username);
            $this->db->order_by('tanggal ', 'DSC');
            $result['publikasi'] = $this->db->get('publikasi')->result_array();

            $result['counter'] = count($result['ujian']) + count($result['publikasi']);

            echo json_encode($result);
        }
    }
}
