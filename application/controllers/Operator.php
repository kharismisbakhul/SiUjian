<?php
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
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data = $this->initData();
        $data['title'] = 'Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa->getMahasiswaPlusProdi();
        $this->loadTemplate($data);
        $this->load->view('operator/mahasiswa_operator', $data);
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
        $this->load->model('Operator_model', 'operator');
        $data['valid_ujian'] = $this->operator->cekValidasi();
        $this->load->view('operator/validasi_operator', $data);
        $this->load->view('templates/footer');
    }

    public function validasi_cek($id_ujian)
    {
        $data = $this->initData();
        $data['title'] = 'Validasi Ujian';
        $this->loadTemplate($data);

        $this->load->model('Operator_model', 'operator');
        $data['dosen'] = $this->operator->cekPenguji($id_ujian);
        $data['ujian'] = $this->operator->getUjian($id_ujian);
        $data['pembimbing'] = $this->operator->getPembimbing($id_ujian);
        $data['penguji'] = $this->operator->getPenguji($id_ujian);
        $this->load->view('operator/validasi_operator_ujian', $data);
        $this->load->view('templates/footer');
    }

    public function validasiUjian($id)
    {
        $data = [
            'id' => $id,
            'tanggal' => $this->input->post('tgl_ujian'),
            'komentar' => $this->input->post('komentar'),
            'valid' => $this->input->post('valid')
        ];
        $this->load->model('Operator_model', 'operator');
        $this->operator->validasiUjian($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data penguji berhasil di tambah ! </div>');
        redirect('operator/validasi');
    }

    public function getInfoPenguji($nip)
    {
        $this->load->model('Operator_model', 'operator');
        echo json_encode($this->operator->getDetailInfoPenguji($nip));
    }

    public function tambahPenguji($id_ujian)
    {
        $data = $this->initData();
        $this->loadTemplate($data);

        $this->form_validation->set_rules('nip', 'Dosen', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data penguji tidak berhasil di tambah ! </div>');
            redirect('operator/validasi_cek/' . $id_ujian);
        } else {
            $data = [
                'Dosennip' =>   $this->input->post('nip'),
                'ujianid' =>   $id_ujian,
                'statuspenguji' =>   $this->input->post('statuspenguji')
            ];
            $this->db->insert('penguji', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data penguji berhasil di tambah ! </div>');
            redirect('operator/validasi_cek/' . $id_ujian);
        }
    }

    public function hapusPenguji()
    {
        $data = $this->initData();
        $this->loadTemplate($data);
        $id = $this->input->post('id_penguji');
        $id_ujian = $this->input->post('id_ujian');;
        $this->db->delete('penguji', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data penguji tidak berhasil di tambah ! </div>');
        redirect('operator/validasi_cek/' . $id_ujian);
    }
}
