<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
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
        $data['user'] = $this->db->get_where('dosen', ['nip' => $this->session->userdata('username')])->row_array();
        $data['username'] = $this->session->userdata('username');
        //Mahasiswa bimbingan
        $this->load->model('Bimbingan_model', 'bimbingan');
        $data['bimbingan_jumlah'] = $this->bimbingan->getMahasiswaBimbingan($data['user']['nip'])->num_rows();
        $data['bimbingan'] = $this->bimbingan->getMahasiswaBimbingan($data['user']['nip'])->result_array();
        return $data;
    }

    public function index()
    {
        $data = $this->initData();
        $data['title'] = 'Dashboard Dosen';
        $this->loadTemplate($data);
        $this->load->view('dashboard/dash_dosen', $data);
        $this->load->view('templates/footer');
    }
    public function bimbingan()
    {
        $data = $this->initData();
        $data['title'] = 'Mahasiswa Bimbingan';
        $this->loadTemplate($data);
        $this->load->view('dosen/bimbingan', $data);
        $this->load->view('templates/footer');
    }

    public function profil()
    {
        $data = $this->initData();
        $data['title'] = 'Profil';
        $this->loadTemplate($data);
        $this->load->view('dosen/profil', $data);
        $this->load->view('templates/footer');
    }

    public function inputNilai()
    {
        $data = $this->initData();
        $data['title'] = 'Ujian (Input Nilai)';
        $this->loadTemplate($data);
        $this->load->view('dosen/inputNilai', $data);
        $this->load->view('templates/footer');
    }
}
