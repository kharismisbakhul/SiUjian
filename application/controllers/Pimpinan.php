<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pimpinan extends CI_Controller
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
        $this->load->model('dosen_model', 'dosen');
        $data['dosen'] = $this->dosen->getListDosen();
        return $data;
    }

    public function index()
    {
        if ($this->session->userdata('user_profile_kode') != 3) {
            redirect('auth/blocked');
        }
        $data = $this->initData();
        $data['title'] = 'Dashboard';
        $this->loadTemplate($data);
        $this->load->view('dashboard/dash_pimpinan', $data);
        $this->load->view('templates/footer');
    }

    public function laporanStatusMahasiswa()
    {
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data = $this->initData();
        $data['mahasiswa'] = $this->mahasiswa->getMahasiswaPlusProdi();
        $data['title'] = 'Laporan Status Mahasiswa';
        $this->loadTemplate($data);
        $this->load->view('pimpinan/laporan_status_mahasiswa', $data);
        $this->load->view('templates/footer');
    }
    public function laporanDosen()
    {
        $data = $this->initData();
        $data['title'] = 'Laporan Dosen';
        $this->loadTemplate($data);
        $this->load->view('pimpinan/laporan_dosen', $data);
        $this->load->view('templates/footer');
    }

    public function rekapDosen()
    {
        $this->load->model('dosen_model', 'dosen');
        $data = $this->initData();
        $data['dosen'] = $this->dosen->getListDosen();
        $data['title'] = 'Rekap Dosen';
        $this->loadTemplate($data);
        $this->load->view('pimpinan/rekap_dosen', $data);
        $this->load->view('templates/footer');
    }


    public function detailMahasiswa($nim)
    {
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $result = $this->mahasiswa->getDetailMahasiswa($nim);
        $data = $this->mahasiswa->getProfilJurusan($result['prodikode']);
        $dosenPembimbing = $this->mahasiswa->getDosenPembimbing($nim);
        $result['nama_prodi'] = $data['nama_prodi'];
        $result['nama_jurusan'] = $data['nama_jurusan'];
        $result['dosen_pembimbing'] = $dosenPembimbing;
        echo json_encode($result);
    }
    public function detailMahasiswaBimbingan($nip)
    {
        $this->load->model('dosen_model', 'dosen');
        $result = $this->dosen->getMahasiswaBimbingan($nip)->result_array();
        $dosenA = $this->dosen->getDetailDosen($nip);
        $dosen['nama'] = $dosenA['nama'];
        $dosen['mahasiswa_bimbingan'] = $result;
        // $data = $this->mahasiswa->getProfilJurusan($result['prodikode']);
        // $dosenPembimbing = $this->mahasiswa->getDosenPembimbing($nim);
        // $result['nama_prodi'] = $data['nama_prodi'];
        // $result['nama_jurusan'] = $data['nama_jurusan'];
        // $result['dosen_pembimbing'] = $dosenPembimbing;
        echo json_encode($dosen);
    }
}
