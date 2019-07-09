<?php

use function PHPSTORM_META\type;

defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    private function loadTemplate($data)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
    }

    private function initData()
    {
        $data['username'] = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        return $data;
    }

    public function index()
    {
        $data = $this->initData();
        $data['title'] = 'Dashboard';
        $this->loadTemplate($data);
        $this->load->view('dashboard/dash_operator', $data);
        $this->load->view('templates/footer');
    }

    public function mahasiswa()
    {
        $type = $this->uri->segment(3);
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data = $this->initData();
        $data['title'] = 'Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa->getMahasiswaPlusProdi();
        if ($type != "list") {
            $Id = $this->uri->segment(4);
            $data['user_login'] = $this->db->get_where('mahasiswa', ['nim' => $Id])->row_array();
            $data['fakultas'] = $this->mahasiswa->getProfilJurusan($data['user_login']['prodikode']);
            $data['ujian'] = $this->mahasiswa->getUjian($Id);
            $data['publikasi'] = $this->mahasiswa->getPublikasi($Id);
        }

        $this->loadTemplate($data);
        if ($type === "list") {
            $this->load->view('operator/mahasiswa_operator', $data);
        } elseif ($type === "profile") {
            $this->load->view('mahasiswa/profil', $data);
        } elseif ($type === "ujian") {
            $this->load->view('mahasiswa/ujian', $data);
        } elseif ($type === "publikasi") {
            $this->load->view('mahasiswa/publikasi', $data);
        }
        $this->load->view('templates/footer');
    }
    public function dosen()
    {
        $this->load->model('dosen_model', 'dosen');
        $data = $this->initData();
        $data['dosen'] = $this->dosen->getListDosen();
        $data['title'] = 'Dosen';
        $this->loadTemplate($data);
        $this->load->view('operator/dosen_operator', $data);
        $this->load->view('templates/footer');
    }
    public function validasi()
    {
        $data = $this->initData();
        $data['title'] = 'Validasi';
        $this->loadTemplate($data);
        $this->load->view('operator/validasi_operator', $data);
        $this->load->view('templates/footer');
    }
}
