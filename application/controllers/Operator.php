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
        $time = date('Y-m-d');
        $data['jumlah_ujian_hari_ini'] = $this->db->get_where('ujian', ['tgl_ujian' => $time])->num_rows();
        $this->load->model('dosen_model', 'dosen');
        $data['jumlah_penguji_hari_ini'] = $this->dosen->getPengujiHariIni();

        //list validasi hari_ini
        $this->load->model('Operator_model', 'operator');
        $data['valid_ujian'] = $this->operator->cekValidasiHariIni();

        return $data;
    }

    public function index()
    {
        if ($this->session->userdata('user_profile_kode') != 2) {
            redirect('auth/blocked');
        }
        $data = $this->initData();
        $data['title'] = 'Dashboard';
        $this->loadTemplate($data);
        $this->load->view('dashboard/dash_operator', $data);
        $this->load->view('templates/footer');
    }

    public function profil()
    {
        $data = $this->initData();
        $data['title'] = 'Profil';
        $this->loadTemplate($data);
        $this->load->view('operator/profil', $data);
        $this->load->view('templates/footer');
    }

    public function mahasiswa()
    {
        $type = $this->uri->segment(3);
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data = $this->initData();
        $data['title'] = 'Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa->getDetailLaporanMahasiswa();
        if ($type != "list") {
            $Id = $this->uri->segment(4);
            $data['user_login'] = $this->db->get_where('mahasiswa', ['nim' => $Id])->row_array();
            $data['fakultas'] = $this->mahasiswa->getProfilJurusan($data['user_login']['prodikode']);
            $data['pembimbing'] = $this->mahasiswa->getDosenPembimbing($data['user_login']['nim']);
            $data['jumlah_ujian'] = $this->db->get_where('ujian', ['mahasiswanim' => $Id])->num_rows();
            $data['jumlah_publikasi'] = $this->db->get_where('publikasi', ['mahasiswanim' => $Id])->num_rows();
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
        $type = $this->uri->segment(3);
        $this->load->model('dosen_model', 'dosen');
        $data = $this->initData();
        $data['dosen'] = $this->dosen->getListDosen();
        $data['title'] = 'Dosen';
        if ($type != "list") {
            $Id = $this->uri->segment(4);
            $data['user_login'] = $this->db->get_where('dosen', ['nip' => $Id])->row_array();
            //Mahasiswa bimbingan
            $data['bimbingan_jumlah'] = $this->dosen->getMahasiswaBimbingan($data['user_login']['nip'])->num_rows();
            $data['bimbingan'] = $this->dosen->getMahasiswaBimbingan($data['user_login']['nip'])->result_array();
            $data['ujian'] = $this->dosen->getUjian($data['user_login']['nip']);
        }

        $this->loadTemplate($data);
        if ($type === "list") {
            $this->load->view('operator/dosen_operator', $data);
        } elseif ($type === "profile") {
            $this->load->view('dosen/profil', $data);
        } elseif ($type === "ujian") {
            $this->load->view('dosen/inputNilai', $data);
        } elseif ($type === "bimbingan") {
            $this->load->view('dosen/bimbingan', $data);
        }
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
