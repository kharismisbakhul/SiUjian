<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {

        $data['title'] = 'Dasboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }

    // Edit Profile
    public function profil()
    {
        $this->load->model('mahasiswa_model', 'mahasiswa');

        $data['title'] = 'Profil';
        $data['user'] = $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('username')])->row_array();


        $data['fakultas'] = $this->mahasiswa->getProfilJurusan($data['user']['prodikode']);



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/profil', $data);
        $this->load->view('templates/footer');
    }

    public function ujian()
    {
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['title'] = 'Ujian';
        $data['user'] = $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('username')])->row_array();

        $data['ujian'] = $this->mahasiswa->getUjian($this->session->userdata('username'));

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/ujian', $data);
        $this->load->view('templates/footer');
    }

    public function tambahUjian()
    {
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['title'] = 'Ujian';
        $data['user'] = $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('username')])->row_array();
        $data['ujian'] = $this->mahasiswa->getBelumUjian($this->session->userdata('username'));

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/tambahUjian', $data);
        $this->load->view('templates/footer');
    }

    public function publikasi()
    { {
            $data['title'] = 'Publikasi';
            $data['user'] = $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/publikasi', $data);
            $this->load->view('templates/footer');
        }
    }
}
