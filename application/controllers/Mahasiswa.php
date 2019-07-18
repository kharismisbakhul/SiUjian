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

        $data['title'] = 'Dashboard';
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['ujian'] = $this->mahasiswa->getUjian($this->session->userdata('username'));

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }

    // Edit Profile
    public function profil()
    {
        if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) {
            $this->_updateProfil();
            redirect('operator/mahasiswa/profile/' . $this->input->post('nim'));
        }
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['title'] = 'Profil';
        $data['user'] = $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('username')])->row_array();
        $data['fakultas'] = $this->mahasiswa->getProfilJurusan($data['user']['prodikode']);
        $data['pembimbing'] = $this->mahasiswa->getPembimbing($data['user']['nim']);
        $data['dosen'] = $this->mahasiswa->getDaftarPembimbing($data['user']['nim']);

        $this->form_validation->set_rules('noTelp', 'No Telepon', 'trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/profil', $data);
            $this->load->view('templates/footer');
        } else {
            $this->_updateProfil();
            redirect('mahasiswa/profil');
        }
    }
    private function _updateProfil()
    {
        $mhs['alamat'] = $this->input->post('alamat');
        $mhs['noTelp'] = $this->input->post('noTelp');
        $mhs['tglMulaiTA'] = $this->input->post('tglMulaiTA');
        $this->db->where('nim', $this->input->post('nim'));
        $this->db->update('mahasiswa', $mhs);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil di perbaharui ! </div>');
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
        $data['user'] = $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('username')])->row_array();

        $data['ujian'] = $this->mahasiswa->getUjian($this->session->userdata('username'));
        $data['jumlah_ujian'] = $this->db->get_where('ujian', ['mahasiswanim' => $data['user']['nim']])->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/ujian', $data);
        $this->load->view('templates/footer');
    }

    public function tambahUjian()
    {

        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['title'] = 'Tambah Ujian';
        $data['user'] = $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('username')])->row_array();
        $data['ujian'] = $this->mahasiswa->getBelumUjian($this->session->userdata('username'));
        $data['jumlah_ujian'] = $this->db->get_where('ujian', ['mahasiswanim' => $data['user']['nim']])->num_rows();
        if ($data['jumlah_ujian'] > 3) {
            redirect('mahasiswa/ujian');
        }
        $data['pembimbing'] = $this->db->select('Dosennip,statusPembimbing as statusPenguji')->get_where('pembimbing', ['Mahasiswanim' => $data['user']['nim']])->result_array();
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
                'MahasiswaNim' => $data['user']['nim']
            ];
            // Tambah Penguji dengan dosen pembimbing


            if ($_FILES['buktiUjian']['name']) {
                $dataUjian['bukti_ujian'] = $_FILES['buktiUjian']['name'];
                $config['allowed_types'] = 'jpg|png|pdf';
                $config['max_size']     = '2048'; //kb
                $config['upload_path'] = './assets/ujian/';
                $config['file_name'] = time() . '_' . $data['user']['nim'] . '_' . $dataUjian['bukti_ujian'];

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('buktiUjian')) {
                    $dataUjian['bukti_ujian'] = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data ujian gagal di tambah ! </div>');
                    echo $this->upload->display_errors();
                }
            }
            $this->mahasiswa->insertUjian($dataUjian);
            $idUjian = $this->mahasiswa->getNewIdUjian($data['user']['nim'], $dataUjian['kodeUjiankode']);
            foreach ($data['pembimbing'] as $pmb) {
                $this->mahasiswa->updatePenguji($pmb, $idUjian['id']);
            }
            var_dump($this->db->get('penguji')->result_array());

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data ujian berhasil di tambah ! </div>');
            redirect('mahasiswa/ujian');
        }
    }

    public function hapusUjian($id)
    {
        $user = [
            'publikasi' => $this->db->get_where('ujian', ['id' => $id])->row_array()
        ];

        $this->load->library('upload');

        unlink(FCPATH . "assets/ujian/" . $user['publikasi']['bukti']);
        $this->db->delete('ujian', ['id' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ujian terhapus</div>');

        redirect('mahasiswa/ujian');
    }

    public function editUjian($id)
    {
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['title'] = 'Edit Ujian';
        $data['ujian'] = $this->db->get_where('ujian', ['id' => $id])->row_array();
        $data['user'] = $this->db->get_where('mahasiswa', ['nim' => $data['ujian']['MahasiswaNim']])->row_array();

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
                'MahasiswaNim' => $data['user']['nim'],
                'bukti' => $data['ujian']['bukti']
            ];

            $upload_bukti = $_FILES['buktiUjian'];

            if ($upload_bukti['name'] != '') {
                $config['allowed_types'] = 'jpg|png|pdf';
                $config['max_size']     = '2048'; //kb
                $config['upload_path'] = './assets/ujian/';
                $config['file_name'] = time() . '_' . $data['user']['nim'] . '_' . $upload_bukti['name'];


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

            redirect('mahasiswa/ujian');
        }
    }


    public function publikasi()
    {
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['title'] = 'Publikasi';
        $data['user'] = $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('username')])->row_array();

        $data['publikasi'] = $this->mahasiswa->getPublikasi($this->session->userdata('username'));
        $data['jumlah_publikasi'] = $this->db->get_where('publikasi', ['mahasiswanim' => $data['user']['nim']])->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/publikasi', $data);
        $this->load->view('templates/footer');
    }

    public function tambahPublikasi()
    {
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['title'] = 'Tambah Publikasi';
        $data['user'] = $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('username')])->row_array();
        $data['jumlah_publikasi'] = $this->db->get_where('publikasi', ['mahasiswanim' => $data['user']['nim']])->num_rows();
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


    public function editPublikasi($id)
    {
        $this->load->model('mahasiswa_model', 'mahasiswa');
        $data['title'] = 'Edit Publikasi';
        $data['jurnal'] = $this->db->get_where('publikasi', ['idJurnal' => $id])->row_array();
        $data['statusJurnal'] = ['Internasional Bereputasi', 'Internasional', 'Nasional Terakreditasi', 'Nasional'];

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
}
