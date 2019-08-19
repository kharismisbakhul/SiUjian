<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Notif extends CI_Controller
{
    public function setNotifications($user)
    {
        $username = $user;
        $kode_user = $this->getKode($username);
        $this->load->model('Notif_model', 'notif');
        $this->notif->setNotifications($username, $kode_user);
    }
    public function getNotifications($user)
    {
        $username = $user;
        $kode_user = $this->getKode($username);
        $this->load->model('Notif_model', 'notif');
        $this->notif->getNotifications($username, $kode_user);
    }
    public function getKode($username)
    {
        $this->db->select('user_profile_kode');
        $this->db->where('username', $username);
        $result = $this->db->get('user')->row_array();
        return (intval($result['user_profile_kode']));
    }
}
