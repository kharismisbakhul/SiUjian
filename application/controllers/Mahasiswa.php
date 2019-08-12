<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('user_profile_kode') != 5) {
            redirect('auth/blocked');
        }
        $data['title'] = 'Dashboard';
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['username'] = $this->session->userdata('username');
        $data['ujian'] = $this->mahasiswa->getUjian($this->session->userdata('username'));
        $data['ujian_selanjutnya'] = $this->mahasiswa->getUjianSelanjutnya($data['username']);
        // $this->db->select('jumlah_notifikasi');
        $this->load->model('Notif_model', 'notif');
        $result = $this->notif->notif($data['username'], intval($data['user']['user_profile_kode']));

        $counter = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['counter'] = intval($counter['jumlah_notifikasi']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/dash_mahasiswa', $data);
        $this->load->view('templates/footer');
    }

    // Edit Profile
    public function profil()
    {
        if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) {
            if ($this->session->userdata('statusIsianMahasiswa') == 'insert') {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data isian berhasil ditambahan </div>');
            } else if ($this->session->userdata('statusIsianMahasiswa') == 'update') {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data isian berhasil diperbarui </div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil di perbaharui ! </div>');
            }
            //ini isian
            redirect('operator/mahasiswa/profile/' . $this->session->userdata('nim_mhsnya'));
        } else {
            $data['user_login'] = $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('username')])->row_array();
        }


        $this->form_validation->set_rules('noTelp', 'No Telepon', 'trim');
        $this->form_validation->set_rules('judulTA', 'Judul Tugas Akhir', 'required|trim');
        $this->form_validation->set_rules('paradigma', 'Paradigma', 'required|trim');
        $this->form_validation->set_rules('kataKunci', 'Kata Kunci', 'required|trim');
        $this->form_validation->set_rules('tujuanP', 'Tujuan Penelitian', 'required|trim');
        $this->form_validation->set_rules('metpen1', 'Metode Penelitian 1', 'required|trim');
        $this->form_validation->set_rules('metpen2', 'Metode Penelitian 2', 'required|trim');
        $this->form_validation->set_rules('temuan', 'Temuan', 'required|trim');
        $this->form_validation->set_rules('kontribusiImplikasi', 'Kontribusi dan Implikasi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->model('mahasiswa_model', 'mahasiswa');
            $data['title'] = 'Profil';
            $data['username'] = $this->session->userdata('username');
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['fakultas'] = $this->mahasiswa->getProfilJurusan($data['user_login']['prodikode']);
            $data['pembimbing'] = $this->mahasiswa->getPembimbing($data['user_login']['nim']);
            $data['dosen'] = $this->mahasiswa->getDaftarPembimbing($data['user_login']['nim']);
            $data['isianMahasiswa'] = $this->db->get_where('isianMahasiswa', ['Mahasiswanim' => $this->session->userdata('username')])->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/profil', $data);
            $this->load->view('templates/footer');
        }
    }
    public function updateProfil()
    {
        $mhs['alamat'] = $this->input->post('alamat');
        $mhs['noTelp'] = $this->input->post('noTelp');
        $mhs['tglMulaiTA'] = $this->input->post('tglMulaiTA');
        $this->db->where('nim', $this->input->post('nim'));
        $this->db->update('mahasiswa', $mhs);
        $this->session->set_userdata('nim_mhsnya', $this->input->post('nim'));
        $this->session->set_userdata('statusIsianMahasiswa', 'edit');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil di perbaharui ! </div>');
        redirect('mahasiswa/profil');
    }
    // cek dosbing
    public function getDosbing($nim)
    {
        $this->load->model('Mahasiswa_model', 'mahasiswa');
        $data['dosen'] = $this->mahasiswa->getDaftarPembimbing($nim);
        echo json_encode($data['dosen']);
    }
    public function ujian()
    {
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['title'] = 'Ujian';
        $data['username'] = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_login'] = $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('username')])->row_array();
        $data['ujian'] = $this->mahasiswa->getUjian($this->session->userdata('username'));
        $data['jumlah_ujian'] = $this->db->get_where('ujian', ['mahasiswanim' => $data['user_login']['nim']])->num_rows();
        $data['pembimbing'] = $this->mahasiswa->getPembimbing($data['user_login']['nim']);

        $this->load->model('Notif_model', 'notif');
        $result = $this->notif->notif($data['username'], intval($data['user']['user_profile_kode']));

        $counter = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['counter'] = intval($counter['jumlah_notifikasi']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/ujian', $data);
        $this->load->view('templates/footer');
    }

    public function tambahUjian($nim)
    {
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['title'] = 'Tambah Ujian';
        $data['username'] = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_login'] = $this->db->get_where('mahasiswa', ['nim' => $nim])->row_array();
        $data['belumUjian'] = $this->mahasiswa->getBelumUjian($data['user_login']['nim']);
        $data['jumlah_ujian'] = $this->db->get_where('ujian', ['mahasiswanim' => $data['user_login']['nim']])->num_rows();
        if ($data['jumlah_ujian'] > 3) {
            redirect('mahasiswa/ujian');
        }
        $data['pembimbing'] = $this->db->select('Dosennip,statusPembimbing as statusPenguji')->get_where('pembimbing', ['Mahasiswanim' => $data['user_login']['nim']])->result_array();
        $this->load->model('Notif_model', 'notif');
        $result = $this->notif->notif($data['username'], intval($data['user']['user_profile_kode']));

        $counter = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['counter'] = intval($counter['jumlah_notifikasi']);

        $this->form_validation->set_rules('kodeUjian', 'Ujian', 'required|trim');
        $this->form_validation->set_rules('tanggalUjian', 'Tanggal Ujian', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/tambahUjian', $data);
            $this->load->view('templates/footer');
        } else {
            $dataUjian = [
                'tgl_ujian' => $this->input->post('tanggalUjian'),
                'kodeUjiankode' => $this->input->post('kodeUjian'),
                'tgl_tambah_ujian' => date("Y/m/d"),
                'MahasiswaNim' => $data['user_login']['nim']
            ];
            // Tambah Penguji dengan dosen pembimbing
            if ($_FILES['buktiUjian']['name']) {
                $dataUjian['bukti_ujian'] = $_FILES['buktiUjian']['name'];
                $config['allowed_types'] = 'jpg|png|pdf';
                $config['max_size']     = '2048'; //kb
                $config['upload_path'] = './assets/ujian/';
                $config['file_name'] = time() . '_' . $data['user_login']['nim'] . '_' . $dataUjian['bukti_ujian'];
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('buktiUjian')) {
                    $dataUjian['bukti_ujian'] = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data ujian gagal di tambah ! </div>');
                    echo $this->upload->display_errors();
                }
            }

            //Update notifications
            // $dataNotif = [
            //     'notif' => $data['user_login']['nama'] . " (Mahasiswa) Menambahkan Ujian",
            //     'user' => $data['user']['id'],
            //     'jenis_notif' => 1,
            //     'tgl_notif' => date("Y/m/d")
            // ];

            // $this->db->insert('notifications', $dataNotif);

            $this->mahasiswa->insertUjian($dataUjian);
            $idUjian = $this->mahasiswa->getNewIdUjian($data['user_login']['nim'], $dataUjian['kodeUjiankode']);
            foreach ($data['pembimbing'] as $pmb) {
                $this->mahasiswa->updatePenguji($pmb, $idUjian['id']);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data ujian berhasil di tambah ! </div>');
            if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) {
                redirect('operator/mahasiswa/ujian/' . $nim);
            }
            redirect('mahasiswa/ujian');
        }
    }

    public function hapusUjian($id)
    {
        $user = [
            'ujian' => $this->db->get_where('ujian', ['id' => $id])->row_array()
        ];
        $data['pembimbing'] = $this->db->select('Dosennip')->get_where('pembimbing', ['Mahasiswanim' => $user['ujian']['MahasiswaNim']])->result_array();
        foreach ($data['pembimbing'] as $pmb) {
            $this->db->delete('penguji', ['Dosennip' => $pmb['Dosennip'], 'Ujianid' => $id]);
        }
        $this->load->library('upload');
        unlink(FCPATH . "assets/ujian/" . $user['ujian']['bukti']);
        $this->db->delete('ujian', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ujian terhapus</div>');
        if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) {
            redirect('operator/mahasiswa/ujian/' . $user['ujian']['MahasiswaNim']);
        }
        redirect('mahasiswa/ujian');
    }

    public function editUjian($id)
    {
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['title'] = 'Edit Ujian';
        $data['ujian'] = $this->db->get_where('ujian', ['id' => $id])->row_array();
        $data['username'] = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_login'] = $this->db->get_where('mahasiswa', ['nim' => $data['ujian']['MahasiswaNim']])->row_array();
        $ujianBelum = $this->mahasiswa->getBelumUjian($data['ujian']['MahasiswaNim']);
        $data['listUjian'] = ($ujianBelum);
        $data['pilihanUjian'] =  $this->mahasiswa->getUjian_Edit($id);
        $this->form_validation->set_rules('kodeUjian', 'Ujian', 'required|trim');
        $this->form_validation->set_rules('tanggalUjian', 'Tanggal Ujian', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/editUjian', $data);
            $this->load->view('templates/footer');
        } else {
            $dataUjian = [
                'tgl_ujian' => $this->input->post('tanggalUjian'),
                'kodeUjiankode' => $this->input->post('kodeUjian'),
                'tgl_tambah_ujian' => date("Y/m/d"),
                'MahasiswaNim' => $data['user_login']['nim'],
                'bukti' => $data['ujian']['bukti']
            ];
            $upload_bukti = $_FILES['buktiUjian'];
            if ($upload_bukti['name'] != '') {
                $config['allowed_types'] = 'jpg|png|pdf';
                $config['max_size']     = '2048'; //kb
                $config['upload_path'] = './assets/ujian/';
                $config['file_name'] = time() . '_' . $data['user_login']['nim'] . '_' . $upload_bukti['name'];
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('buktiUjian')) {
                    unlink(FCPATH . 'assets/ujian/' . $data['ujian']['bukti']);
                    $dataUjian['bukti'] = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->mahasiswa->editUjian($dataUjian, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data ujian berhasil di perbaharui ! </div>');
            if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) {
                redirect('operator/mahasiswa/ujian/' . $data['user_login']['nim']);
            }
            redirect('mahasiswa/ujian');
        }
    }
    public function publikasi()
    {
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['title'] = 'Publikasi';
        $data['username'] = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_login'] = $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('username')])->row_array();
        $data['publikasi'] = $this->mahasiswa->getPublikasi($this->session->userdata('username'));
        $data['jumlah_publikasi'] = $this->db->get_where('publikasi', ['mahasiswanim' => $data['user_login']['nim']])->num_rows();
        $data['pembimbing'] = $this->mahasiswa->getPembimbing($data['user_login']['nim']);
        $this->load->model('Notif_model', 'notif');
        $result = $this->notif->notif($data['username'], intval($data['user']['user_profile_kode']));

        $counter = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['counter'] = intval($counter['jumlah_notifikasi']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/publikasi', $data);
        $this->load->view('templates/footer');
    }
    public function tambahPublikasi($nim)
    {
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['title'] = 'Tambah Publikasi';
        $data['username'] = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_login'] = $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('username')])->row_array();

        $this->load->model('Notif_model', 'notif');
        $result = $this->notif->notif($data['username'], intval($data['user']['user_profile_kode']));

        $counter = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['counter'] = intval($counter['jumlah_notifikasi']);

        $data['jumlah_publikasi'] = $this->db->get_where('publikasi', ['mahasiswanim' => $data['user_login']['nim']])->num_rows();
        if ($data['jumlah_publikasi'] > 2) {
            redirect('mahasiswa/publikasi');
        }
        $this->form_validation->set_rules('judulArtikel', 'Judul Artikel', 'required|trim');
        $this->form_validation->set_rules('namaJurnal', 'Nama Jurnal', 'required|trim');
        $this->form_validation->set_rules('volumDanNo', 'Volume Dan No Terbitan', 'required|trim');
        $this->form_validation->set_rules('statusJurnal', 'Status Jurnal', 'required|trim');
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
                'kategoriJurnal' => 'kosong',
                'statusJurnal' => $this->input->post('statusJurnal'),
                'Mahasiswanim' => $data['user_login']['nim'],
                'bukti' => $_FILES['buktiPublikasi']['name'],
                'tanggal' => date("Y/m/d"),
            ];
            if ($dataPublikasi['bukti']) {
                $config['allowed_types'] = 'jpg|png|pdf';
                $config['max_size']     = '2048'; //kb
                $config['upload_path'] = './assets/publikasi/';
                $config['file_name'] = time() . '_' . $data['user_login']['nim'] . '_' . $dataPublikasi['bukti'];
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('buktiPublikasi')) {
                    $dataPublikasi['bukti'] = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data publikasi gagal di tambah ! </div>');
                    echo $this->upload->display_errors();
                }
            }
            $this->db->insert('publikasi', $dataPublikasi);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data publikasi berhasil di tambah ! </div>');
            if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) {
                redirect('operator/mahasiswa/publikasi/' . $nim);
            }
            redirect('mahasiswa/publikasi');
        }
    }
    public function hapusPublikasi($idJurnal)
    {
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $user = [
            'publikasi' => $this->db->get_where('publikasi', ['idJurnal' => $idJurnal])->row_array()
        ];
        $this->load->library('upload');
        unlink(FCPATH . "assets/publikasi/" . $user['publikasi']['bukti']);
        $this->db->delete('publikasi', ['idJurnal' => $idJurnal]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Publikasi terhapus</div>');
        if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) {
            redirect('operator/mahasiswa/publikasi/' . $user['publikasi']['Mahasiswanim']);
        }
        redirect('mahasiswa/publikasi');
    }
    public function editPublikasi($id)
    {
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['title'] = 'Edit Publikasi';
        $data['jurnal'] = $this->db->get_where('publikasi', ['idJurnal' => $id])->row_array();
        $data['statusJurnal'] = ['Internasional Bereputasi', 'Internasional', 'Nasional Terakreditasi', 'Nasional'];
        $data['username'] = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_login'] = $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('username')])->row_array();
        $this->load->model('Notif_model', 'notif');
        $result = $this->notif->notif($data['username'], intval($data['user']['user_profile_kode']));

        $counter = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['counter'] = intval($counter['jumlah_notifikasi']);

        $this->form_validation->set_rules('judulArtikel', 'Judul Artikel', 'required|trim');
        $this->form_validation->set_rules('namaJurnal', 'Nama Jurnal', 'required|trim');
        $this->form_validation->set_rules('volumDanNo', 'Volume Dan No Terbitan', 'required|trim');
        $this->form_validation->set_rules('statusJurnal', 'Status Jurnal', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/editPublikasi', $data);
            $this->load->view('templates/footer');
        } else {
            $dataPublikasi = [
                'judulArtikel' => $this->input->post('judulArtikel'),
                'namaJurnal' => $this->input->post('namaJurnal'),
                'volumeDanNoTerbitan' => $this->input->post('volumDanNo'),
                'kategoriJurnal' => $this->input->post('kategoriJurnal'),
                'statusJurnal' => $this->input->post('statusJurnal'),
                'Mahasiswanim' => $data['jurnal']['Mahasiswanim'],
                'bukti' => $data['jurnal']['bukti'],
                'tanggal' => date("Y/m/d")
            ];
            $upload_publikasi = $_FILES['buktiPublikasi'];
            if ($upload_publikasi['name'] != '') {
                $config['allowed_types'] = 'jpg|png|pdf';
                $config['max_size']     = '2048'; //kb
                $config['upload_path'] = './assets/publikasi/';
                $config['file_name'] = time() . '_' . $data['user']['nim'] . '_' . $upload_publikasi['name'];
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('buktiPublikasi')) {
                    unlink(FCPATH . 'assets/publikasi/' . $data['user']['bukti']);
                    $dataPublikasi['bukti'] = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->mahasiswa->editPublikasi($dataPublikasi, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data publikasi berhasil di perbaharui ! </div>');
            if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) {
                redirect('operator/mahasiswa/publikasi/' . $data['jurnal']['Mahasiswanim']);
            }
            redirect('mahasiswa/publikasi');
        }
    }
    public function getDetailPublikasi($data)
    {
        echo json_encode($this->db->get_where('publikasi', ['idJurnal' => $data])->row_array());
    }
    public function getDetailUjian($id_ujian)
    {
        $this->load->model('Operator_model', 'operator');
        $this->load->model('Mahasiswa_model', 'mahasiswa');
        $data = [
            'ujian' => $this->mahasiswa->getDetailUjian($id_ujian),
            'penguji' => $this->operator->getPenguji($id_ujian)
        ];
        echo json_encode($data);
    }

    public function insertIsianMahasiswa()
    {
        $data = [
            'judulAkhir' => $this->input->post('judulTA'),
            'paradigma' => $this->input->post('paradigma'),
            'kataKunci' => $this->input->post('kataKunci'),
            'tujuanPenelitian' => $this->input->post('tujuanP'),
            'metodePenelitian1' => $this->input->post('metpen1'),
            'metodePenelitian2' => $this->input->post('metpen2'),
            'temuan' => $this->input->post('temuan'),
            'kontribusiDanImplikasi' => $this->input->post('kontribusiImplikasi'),
            'Mahasiswanim' => $this->input->post('nim')
        ];
        $this->db->insert('isianMahasiswa', $data);
        $this->session->set_userdata('nim_mhsnya', $data['Mahasiswanim']);
        $this->session->set_userdata('statusIsianMahasiswa', 'insert');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data isian berhasil ditambahan </div>');
        redirect('mahasiswa/profil');
    }
    public function updateIsianMahasiswa($nim)
    {
        $data = [
            'judulAkhir' => $this->input->post('judulTA'),
            'paradigma' => $this->input->post('paradigma'),
            'kataKunci' => $this->input->post('kataKunci'),
            'tujuanPenelitian' => $this->input->post('tujuanP'),
            'metodePenelitian1' => $this->input->post('metpen1'),
            'metodePenelitian2' => $this->input->post('metpen2'),
            'temuan' => $this->input->post('temuan'),
            'kontribusiDanImplikasi' => $this->input->post('kontribusiImplikasi'),
            'Mahasiswanim' => $this->input->post('nim')
        ];
        $this->db->where('Mahasiswanim', $nim);
        $this->db->update('isianMahasiswa', $data);
        $this->session->set_userdata('nim_mhsnya', $data['Mahasiswanim']);
        $this->session->set_userdata('statusIsianMahasiswa', 'update');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data isian berhasil diperbarui </div>');
        redirect('mahasiswa/profil');
    }
    public function getDataEditIsian($nim)
    {
        $data = $this->db->get_where('isianMahasiswa', ['MahasiswaNim' => $nim])->row_array();
        echo json_encode($data);
    }
}
