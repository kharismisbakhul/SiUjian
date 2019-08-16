<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Notif_model extends CI_Model
{
    public function notif($username, $kode)
    {
        $valid = '';
        if ($kode == 1 || $kode == 2) {
            $valid = 'valid != 1';
        } else if ($kode = 5) {
            $valid = 'valid = 1 AND nim = ' . $username;
        }
        $query = "SELECT ujian.id, MahasiswaNim as nim, nama, tgl_tambah_ujian as tanggal, kodeUjiankode, nama_ujian, status_notif, valid, CASE WHEN nama IS NOT NULL THEN 'ujian' END AS keterangan FROM ujian JOIN mahasiswa ON ujian.MahasiswaNim = mahasiswa.nim JOIN kodeujian ON ujian.kodeUjiankode = kodeujian.kode WHERE $valid ORDER BY tgl_tambah_ujian DESC";
        $ujian = $this->db->query($query)->result_array();
        $query = "SELECT idJurnal as id, Mahasiswanim as nim, nama, tanggal, status_notif, valid, CASE WHEN nama IS NOT NULL THEN 'publikasi' END AS keterangan FROM publikasi JOIN mahasiswa ON publikasi.Mahasiswanim = mahasiswa.nim WHERE $valid ORDER BY tanggal DESC";
        $publikasi = $this->db->query($query)->result_array();
        $result['all_notifikasi'] = [];
        $count = 0;
        // $result['all_notifikasi']['tanggal'] = ['2019-10-11', '2019-12-10', '2019-09-01'];
        for ($i = 0; $i < count($ujian); $i++) {
            array_push($result['all_notifikasi'], $ujian[$i]);
        }
        for ($i = 0; $i < count($publikasi); $i++) {
            array_push($result['all_notifikasi'], $publikasi[$i]);
        }
        for ($i = 0; $i < count($result['all_notifikasi']); $i++) {
            $tanggal = intval(str_replace("-", "", $result['all_notifikasi'][$i]['tanggal']));
            $result['all_notifikasi'][$i]['tanggal_temp'] = $tanggal;
            if ($result['all_notifikasi'][$i]['status_notif'] == 0) {
                $count++;
            }
        }
        for ($i = 0; $i < count($result['all_notifikasi']); $i++) {
            for ($j = 1; $j < count($result['all_notifikasi']) - $i; $j++) {
                if ($result['all_notifikasi'][$j]['tanggal_temp'] > $result['all_notifikasi'][$j - 1]['tanggal_temp']) {
                    // echo "HAI";
                    $temp = $result['all_notifikasi'][$j];
                    $result['all_notifikasi'][$j] = $result['all_notifikasi'][$j - 1];
                    $result['all_notifikasi'][$j - 1] = $temp;
                }
            }
        }
        if ($kode == 5) {
            $this->db->where('username', $username);
        }
        $this->db->where('user_profile_kode', $kode);
        $this->db->update('user', ['jumlah_notifikasi' => $count]);
        return $result;
    }
    public function getNotifications($username, $kode)
    {
        $result = $this->notif($username, $kode);
        header("Content-type: application/json");
        echo json_encode($result);
    }
    public function setNotifications($username, $kode)
    {
        $result = $this->notif($username, $kode);
        for ($i = 0; $i < count($result['all_notifikasi']); $i++) {
            if ($result['all_notifikasi'][$i]['keterangan'] == "ujian") {
                $this->db->where('id', $result['all_notifikasi'][$i]['id']);
                $this->db->update('ujian', ['status_notif' => 1]);
            } else {
                $this->db->where('idJurnal', $result['all_notifikasi'][$i]['id']);
                $this->db->update('publikasi', ['status_notif' => 1]);
            }
        }
        if ($kode == 5) {
            $this->db->where('username', $username);
        }
        $this->db->where('user_profile_kode', $kode);
        $this->db->update('user', ['jumlah_notifikasi' => 0]);
        header("Content-type: application/json");
        echo json_encode(0);
    }
}
