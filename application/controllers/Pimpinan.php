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
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['user_login'] = $this->db->get_where('dosen', ['nip' => $this->session->userdata('username')])->row_array();
        $data['mahasiswa'] = $this->mahasiswa->getDetailLaporanMahasiswa();
        $data['bimbingan_jumlah'] = $this->dosen->getMahasiswaBimbingan($this->session->userdata('username'))->num_rows();
        $data['pembimbing_terbanyak'] = $this->dosen->getPembimbingTerbanyak();
        $data['rekap_dosen'] = $this->dosen->getRekapAllDosen();

        $this->load->model('Notif_model', 'notif');
        $result = $this->notif->notif($data['username'], intval($data['user']['user_profile_kode']));
        $counter = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['counter'] = intval($counter['jumlah_notifikasi']);
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

    public function profil()
    {
        $data = $this->initData();
        $data['title'] = 'Profil';
        $this->loadTemplate($data);
        $this->load->view('pimpinan/profil', $data);
        $this->load->view('templates/footer');
    }

    public function laporanStatusMahasiswa()
    {
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data = $this->initData();
        $data['title'] = 'Laporan Status Mahasiswa';
        $data['star_date'] = "";
        $data['end_date'] = "";

        if ($this->input->post('star_date') && $this->input->post('end_date')) {
            $data['star_date'] = $this->input->post('star_date');
            $data['end_date'] = $this->input->post('end_date');
        }

        if ($data['user_login']['jabatan_pimpinan'] != "") {
            if ($data['user_login']['jabatan_pimpinan'] == "Dekan") {
                $data['mahasiswa'] = $this->mahasiswa->getDetailLaporanMahasiswa();
            } else {

                $data['mahasiswa'] = $this->mahasiswa->getDetailLaporanMahasiswa($data['star_date'], $data['end_date'], $data['user_login']['prodi_dosen']);
            }
        } elseif ($this->uri->segment(3) || $this->uri->segment(4)) {
            if ($this->uri->segment(3) == "Dekan") {
                $data['mahasiswa'] = $this->mahasiswa->getDetailLaporanMahasiswa();
            } else {
                $data['mahasiswa'] = $this->mahasiswa->getDetailLaporanMahasiswa($data['star_date'], $data['end_date'], $this->uri->segment(4));
            }
        }

        $this->loadTemplate($data);
        $this->load->view('pimpinan/laporan_status_mahasiswa', $data);
        $this->load->view('templates/footer');
    }
    public function laporanDosen()
    {
        $this->load->model('dosen_model', 'dosen');
        $data = $this->initData();
        $data['star_date'] = "";
        $data['end_date'] = "";
        $data['dosen'] = "";
        $data['user_login'] = "";


        if ($this->session->userdata("user_profile_kode") == 3) {
            $data['user_login'] = $this->db->get_where('dosen', ['nip' => $this->session->userdata('username')])->row_array();
            if ($data['user_login']['jabatan_pimpinan'] != "") {
                if ($data['user_login']['jabatan_pimpinan'] == "Dekan") {
                    $data['dosen'] = $this->dosen->getListDosen($data['user_login']['nip']);
                } else {
                    $data['dosen'] = $this->dosen->getListDosen($data['user_login']['nip'], $data['user_login']['prodi_dosen']);
                }
            }
        }
        if ($this->uri->segment(3) && $this->uri->segment(4)) {
            if ($this->uri->segment(3) == "Dekan") {
                $data['dosen'] = $this->dosen->getListDosen($this->uri->segment(5));
            } else {
                $data['dosen'] = $this->dosen->getListDosen($this->uri->segment(5), $this->uri->segment(4));
            }
        }
        $data['title'] = 'Laporan Dosen';
        $this->loadTemplate($data);

        $this->load->view('pimpinan/laporan_dosen', $data);
        $this->load->view('templates/footer');
    }

    public function rekapDosen()
    {
        $this->load->model('dosen_model', 'dosen');
        $data = $this->initData();
        $data['star_date'] = '';
        $data['end_date'] = '';
        if ($this->input->post('submit')) {
            $data['star_date'] = $this->input->post('star_date');
            $data['end_date'] = $this->input->post('end_date');
        }
        if ($this->session->userdata("user_profile_kode") == 3) {
            $data['user_login'] = $this->db->get_where('dosen', ['nip' => $this->session->userdata('username')])->row_array();
            if ($data['user_login']['jabatan_pimpinan'] != "") {
                if ($data['user_login']['jabatan_pimpinan'] == "Dekan") {
                    $data['rekap_dosen'] = $this->dosen->getRekapDosen($data['user_login']['nip'], 0,  $data['star_date'], $data['end_date']);
                } else {
                    $data['rekap_dosen'] = $this->dosen->getRekapDosen($data['user_login']['nip'], $data['user_login']['prodi_dosen'],  $data['star_date'], $data['end_date']);
                }
            }
        }
        if ($this->uri->segment(3) && $this->uri->segment(4)) {
            if ($this->uri->segment(3) == "Dekan") {
                $data['rekap_dosen'] = $this->dosen->getRekapDosen($this->uri->segment(5), 0,  $data['star_date'], $data['end_date']);
            } else {
                $data['rekap_dosen'] = $this->dosen->getRekapDosen($this->uri->segment(5), $this->uri->segment(4),  $data['star_date'], $data['end_date']);
            }
        }
        $data['title'] = 'Rekap Dosen';
        $this->loadTemplate($data);
        $this->load->view('pimpinan/rekap_dosen', $data);
        $this->load->view('templates/footer');
    }

    public function detailRekapDosen($nip)
    {
        $star_date = '';
        $end_date = '';
        if ($this->input->get('star_date') || $this->input->get('end_date')) {
            $star_date = $this->input->get('star_date');
            $end_date = $this->input->get('end_date');
        }
        $this->load->model('dosen_model', 'dosen');
        $this->dosen->getDetailRekapDosen($nip, $star_date, $end_date);
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
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $star_date = $this->input->get('star_date');
        $end_date = $this->input->get('end_date');
        $result = $this->dosen->getMahasiswaBimbingan($nip, $star_date, $end_date)->result_array();
        $dosenA = $this->dosen->getDetailDosen($nip);
        $dosen['nama_dosen'] = $dosenA['nama_dosen'];
        $dosen['mahasiswa_bimbingan'] = $result;
        for ($i = 0; $i < count($dosen['mahasiswa_bimbingan']); $i++) {
            $dosen['mahasiswa_bimbingan'][$i]['ujian_terakhir'] = $this->mahasiswa->getUjianTerakhir($dosen['mahasiswa_bimbingan'][$i]['Mahasiswanim']);
        }
        echo json_encode($dosen);
    }
}
