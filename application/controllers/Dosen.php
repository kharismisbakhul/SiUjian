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
        $data['user_login_prodi'] = $this->db->get_where('prodi', ['kode' => intval($data['user_login']['prodi_dosen'])])->row_array();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['username'] = $this->session->userdata('username');
        //Mahasiswa bimbingan
        $this->load->model('dosen_model', 'dosen');
        $data['bimbingan_jumlah'] = $this->dosen->getMahasiswaBimbingan($data['user_login']['nip'])->num_rows();
        $data['bimbingan'] = $this->dosen->getMahasiswaBimbingan($data['user_login']['nip'])->result_array();

        $data['ujian_hari_ini'] = [];
        for ($i = 0; $i < count($data['bimbingan']); $i++) {
            $nim = $data['bimbingan'][$i]['Mahasiswanim'];
            $this->db->where('MahasiswaNim', $nim);
            $this->db->select('id, kodeUjiankode, MahasiswaNim, tgl_ujian, nama_ujian');
            $this->db->from('ujian');
            $this->db->join('kodeujian', 'kodeujian.kode = ujian.kodeUjiankode');
            $data['bimbingan'][$i]['ujian'] = $this->db->get()->result_array();
            $jumlah_ujian = count($data['bimbingan'][$i]['ujian']);
            for ($j = 0; $j < $jumlah_ujian; $j++) {
                $data['bimbingan'][$i]['ujian'][$j]['nama'] = $data['bimbingan'][$i]['nama'];
                if ($data['bimbingan'][$i]['ujian'][$j]['tgl_ujian'] === date('Y-m-d')) {
                    array_push($data['ujian_hari_ini'], $data['bimbingan'][$i]['ujian'][$j]);
                }
            }
        }

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
        $this->load->model('Dosen_model', 'dosen');
        $data = $this->initData();
        $data['title'] = 'Bimbingan';
        $data['star_date'] = "";
        $data['end_date'] = "";
        if ($this->input->post('submit') && $this->input->post('star_date') && $this->input->post('end_date')) {
            $data['star_date'] = $this->input->post('star_date');
            $data['end_date'] = $this->input->post('end_date');
            if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) {
                $data['bimbingan'] = $this->dosen->getStatusBimbingan($this->input->post('nip'), $data['star_date'], $data['end_date']);
            } else {
                $data['bimbingan'] = $this->dosen->getStatusBimbingan($data['user_login']['nip'], $data['star_date'], $data['end_date']);
            }
        } else {
            if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) {
                $data['bimbingan'] = $this->dosen->getStatusBimbingan($this->input->post('nip'), null, null);
            } else {
                $data['bimbingan'] = $this->dosen->getStatusBimbingan($data['user_login']['nip'], null, null);
            }
        }
        $this->loadTemplate($data);
        $this->load->view('dosen/bimbingan', $data);
        $this->load->view('templates/footer');
    }

    public function getDetailBimbingan($nim)
    {
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['user'] = $this->db->get_where('mahasiswa', ['nim' => $nim])->row_array();
        $data['fakultas'] = $this->mahasiswa->getProfilJurusan($data['user']['prodikode']);
        $data['isianMahasiswa'] = $this->db->get_where('isianmahasiswa', ['Mahasiswanim' => $nim])->row_array();
        $data['ujian'] = $this->mahasiswa->getUjian($data['user']['nim']);
        $data['publikasi'] = $this->mahasiswa->getPublikasi($data['user']['nim']);
        $data['pembimbing'] = $this->mahasiswa->getPembimbing($data['user']['nim']);
        echo json_encode($data, true);
    }
    public function profil()
    {
        $data = $this->initData();
        $data['title'] = 'Profil';
        $this->loadTemplate($data);
        $this->form_validation->set_rules('notlpn', 'No Telepon', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('dosen/profil', $data);
            $this->load->view('templates/footer');
        } else {
            $update = [
                'noTlpnDosen' => $this->input->post('notlpn'),
                'AlamatDosen' => $this->input->post('alamat')
            ];
            if ($this->session->userdata('user_profile_kode') == 2 || $this->session->userdata('user_profile_kode') == 1) {
                $this->db->where('nip', $this->uri->segment(3));
                $this->db->update('dosen', $update);
            } else {
                $this->db->where('nip', $data['user_login']['nip']);
                $this->db->update('dosen', $update);
            }

            $this->session->set_flashdata('message', 'Profile Berhasil diperbaharui');
            if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) {
                redirect('operator/dosen/profile/' . $this->input->post('nip'));
            }
            redirect('dosen/profil');
        }
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
            if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) {
                redirect('operator/dosen/ujian/' . $this->input->post('nip'));
            }
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
