<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
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
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_login'] = $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('username')])->row_array();
        $data['username'] = $this->session->userdata('username');
        //profil
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['fakultas'] = $this->mahasiswa->getProfilJurusan($data['user_login']['prodikode']);
        //ujian
        $data['ujian'] = $this->mahasiswa->getUjian($this->session->userdata('username'));
        return $data;
    }

    public function index()
    {
        $data = $this->initData();
        $data['title'] = 'Dashboard';
        $this->loadTemplate($data);
        $this->load->view('dashboard/dash_mahasiswa', $data);
        $this->load->view('templates/footer');
    }

    // Edit Profile
    public function profil()
    {
        $data = $this->initData();
        $data['title'] = 'Profil';
        $this->loadTemplate($data);
        $this->load->view('mahasiswa/profil', $data);
        $this->load->view('templates/footer');
    }

    public function ujian()
    {
        $data = $this->initData();
        $data['title'] = 'Ujian';
        $this->loadTemplate($data);
        $this->load->view('mahasiswa/ujian', $data);
        $this->load->view('templates/footer');
    }
    public function tambahUjian()
    {
        $data = $this->initData();
        $data['title'] = 'Ujian';
        $this->loadTemplate($data);
        $this->load->view('mahasiswa/tambahUjian', $data);
        $this->load->view('templates/footer');
    }
    public function publikasi()
    {
        $data = $this->initData();
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['title'] = 'Publikasi';
        $data['publikasi'] = $this->mahasiswa->getPublikasi($this->session->userdata('username'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/publikasi', $data);
        $this->load->view('templates/footer');
    }
    public function tambahPublikasi()
    {
        $data = $this->initData();
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['title'] = 'Tambah Publikasi';
        $this->form_validation->set_rules('judulArtikel', 'Judul Artikel', 'required|trim');
        $this->form_validation->set_rules('namaJurnal', 'Nama Jurnal', 'required|trim');
        $this->form_validation->set_rules('volumDanNo', 'Volume Dan No Terbitan', 'required|trim');
        $this->form_validation->set_rules('statusJurnal', 'Kategori Jurnal', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/tambahPublikasi', $data);
            $this->load->view('templates/footer');
        } else {
            $dataPublikasi = [
                'judulArtikel' => $this->input->post('judulArtikel'),
                'namaJurnal' => $this->input->post('namaJurnal'),
                'volumeDanNoTerbitan' => $this->input->post('volumDanNo'),
                'kategoriJurnal' => $this->input->post('statusJurnal'),
                'statusJurnal' => 'kosong',
                'Mahasiswanim' => $data['user']['nim'],
                'bukti' => $_FILES['buktiPublikasi']['name'],
                'tanggal' => date("Y/m/d"),
            ];
            if ($dataPublikasi['bukti']) {
                $config['allowed_types'] = 'jpg|png|pdf';
                $config['max_size']     = '2048'; //kb
                $config['upload_path'] = './assets/publikasi/';
                $config['file_name'] = time() . '_' . $data['user']['nim'] . '_' . $dataPublikasi['bukti'];
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('buktiPublikasi')) {
                    $dataPublikasi['bukti'] = $this->upload->data('file_name');
                    $this->db->insert('publikasi', $dataPublikasi);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data publikasi berhasil di tambah ! </div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data publikasi gagal di tambah ! </div>');
                    echo $this->upload->display_errors();
                }
            }
            redirect('mahasiswa/publikasi');
        }
    }
    public function hapusPublikasi($idJurnal)
    {
        $data = $this->initData();
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $user = [
            'publikasi' => $this->db->get_where('publikasi', ['idJurnal' => $idJurnal])->row_array()
        ];
        $this->load->library('upload');
        // var_dump(unlink(FCPATH . "assets/publikasi/" . $user['publikasi']['bukti']));
        // die;
        unlink(FCPATH . "assets/publikasi/" . $user['publikasi']['bukti']);
        $this->db->delete('publikasi', ['idJurnal' => $idJurnal]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Publikasi terhapus</div>');
        redirect('mahasiswa/publikasi');
    }
}
