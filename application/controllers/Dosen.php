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
        $data['user_login'] = $this->db->get_where('dosen', ['nip' => $this->session->userdata('username')])->row_array();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['username'] = $this->session->userdata('username');
        //Mahasiswa bimbingan
        $this->load->model('dosen_model', 'dosen');
        $data['bimbingan_jumlah'] = $this->dosen->getMahasiswaBimbingan($data['user_login']['nip'])->num_rows();
        $data['bimbingan'] = $this->dosen->getMahasiswaBimbingan($data['user_login']['nip'])->result_array();
        return $data;
    }

    public function index()
    {
        if ($this->session->userdata('user_profile_kode') != 4) {
            redirect('auth/blocked');
        }
        $data = $this->initData();
        $data['title'] = 'Dashboard';
        $this->loadTemplate($data);
        $this->load->view('dashboard/dash_dosen', $data);
        $this->load->view('templates/footer');
    }
    public function bimbingan()
    {
        $data = $this->initData();
        $data['title'] = 'Bimbingan';
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
        $data['title'] = 'Input Nilai';
        $this->loadTemplate($data);
        $this->load->model('Dosen_model', 'dosen');
        $data['ujian'] = $this->dosen->getUjian($data['user']['username']);
        $this->form_validation->set_rules('inputNilai', 'nilai', 'required|numeric');
        if ($this->form_validation->run() == false) {
            $this->load->view('dosen/inputNilai', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_ujian' => $this->input->post('ujian'),
                'id_penguji' => $this->input->post('idPenguji')
            ];
            $nilai = $this->input->post('inputNilai');
            $this->dosen->updateNilai($nilai, $data['id_penguji']);
            $NilaiAkhir = $this->dosen->cekNilaiAkhir($data['id_ujian']);
            $this->dosen->updateNilaiAkhir($NilaiAkhir['nilai'], $data['id_ujian']);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> nilai berhasil di tambah ! </div>');
            redirect('dosen/inputNilai');
        }
    }
    public function getDetailUjian($id_ujian)
    {
        $this->load->model('Operator_model', 'dosen');
        $data = [
            'ujian' => $this->dosen->getUjian($id_ujian),
            'penguji' => $this->dosen->getPenguji($id_ujian),
            'pembimbing' => $this->dosen->getPembimbing($id_ujian),
        ];
        echo json_encode($data);
    }
}
