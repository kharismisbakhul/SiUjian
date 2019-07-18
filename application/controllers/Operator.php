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
            $data['user'] = $this->db->get_where('mahasiswa', ['nim' => $Id])->row_array();
            $data['fakultas'] = $this->mahasiswa->getProfilJurusan($data['user']['prodikode']);
            $data['jumlah_ujian'] = $this->db->get_where('ujian', ['mahasiswanim' => $Id])->num_rows();
            $data['jumlah_publikasi'] = $this->db->get_where('publikasi', ['mahasiswanim' => $Id])->num_rows();
            $data['pembimbing'] = $this->mahasiswa->getPembimbing($data['user']['nim']);
            $data['ujian'] = $this->mahasiswa->getUjian($Id);
            $data['publikasi'] = $this->mahasiswa->getPublikasi($Id);
            $data['dosen'] = $this->mahasiswa->getDaftarPembimbing($Id);
            $data['posisiPembimbing'] = $this->mahasiswa->getPosisiPembimbing();
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

            $data['ujian'] = $this->dosen->getUjian($Id);
            $data['bimbingan'] = $this->dosen->getStatusBimbingan($Id);
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

    public function tambahPembimbing($nim)
    {

        $data = [
            'Mahasiswanim' => $nim,
            'Dosennip' => $this->input->post('nip'),
            'statusPembimbing' => $this->input->post('pembimbing')
        ];
        $this->db->insert('pembimbing', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Pembimbing berhasil di tambah ! </div>');
        redirect('operator/mahasiswa/profile/' . $nim);
    }

    public function hapusPembimbing($nim)
    {
        $id = $this->input->post('pembimbing');
        $this->db->delete('pembimbing', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Pembimbing berhasil di hapus ! </div>');
        redirect('operator/mahasiswa/profile/' . $nim);
    }

    public function updateStatusMahasiswa($nim)
    {

        $data['statusKelulusan'] = $this->input->post('cekStatusKelulusan');
        $data['statusWisuda'] = $this->input->post('cekstatusWisuda');
        $data['statusTOEFL'] = $this->input->post('cekstatusTOEFL');
        $data['statusTPA'] = $this->input->post('cekstatusTPA');
        $this->db->where('nim', $nim);
        $this->db->update('mahasiswa', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil di perbaharui ! </div>');
        redirect('operator/mahasiswa/profile/' . $nim);
    }

    public function ujian()
    {
        $data = $this->initData();
        $data['title'] = 'Ujian';
        $this->loadTemplate($data);
        $this->load->model('Operator_model', 'operator');
        $data['valid_ujian'] = $this->operator->cekValidasi();
        $this->load->view('operator/validasi_operator', $data);
        $this->load->view('templates/footer');
    }

    public function ubahNilai()
    {
        $this->load->model('Operator_model', 'operator');
        $this->load->model('Dosen_model', 'dosen');
        $id_ujian = $this->input->post('idujian');
        $data['penguji'] = $this->operator->getPenguji($id_ujian);
        foreach ($data['penguji'] as $pngj) {
            $nilai[$pngj['id']]['id'] = $pngj['id'];
            $nilai[$pngj['id']]['nilai'] = $this->input->post($pngj['id']);
        }
        foreach ($nilai as $id) {
            $this->operator->updateNilaiUjian($id['id'], $id['nilai']);
        }
        $NilaiAkhir = $this->dosen->cekNilaiAkhir($id_ujian);
        $this->dosen->updateNilaiAkhir($NilaiAkhir['nilai'], $id_ujian);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Nilai berhasil di perbaharui ! </div>');
        redirect('operator/validasi_cek/' . $id_ujian);
    }

    public function validasi_cek($id_ujian)
    {
        $data = $this->initData();
        $data['title'] = 'Detail Ujian';
        $this->loadTemplate($data);

        $this->load->model('Operator_model', 'operator');
        $data['dosen'] = $this->operator->cekPenguji($id_ujian);
        $data['ujian'] = $this->operator->getUjian($id_ujian);
        $data['posisiPenguji'] = $this->operator->getPosisiPenguji();
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
        $this->load->model('Dosen_model', 'dosen');
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
            // update Nilai
            $NilaiAkhir = $this->dosen->cekNilaiAkhir($data['ujianid']);
            $this->dosen->updateNilaiAkhir($NilaiAkhir['nilai'], $data['ujianid']);
            // akhir update nilai
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data penguji berhasil di tambah ! </div>');
            redirect('operator/validasi_cek/' . $id_ujian);
        }
    }

    public function hapusPenguji()
    {
        $data = $this->initData();
        $this->loadTemplate($data);
        $this->load->model('Dosen_model', 'dosen');
        $id = $this->input->post('id_penguji');
        $id_ujian = $this->input->post('id_ujian');;
        $this->db->delete('penguji', ['id' => $id]);
        // update Nilai
        $NilaiAkhir = $this->dosen->cekNilaiAkhir($id_ujian);
        $this->dosen->updateNilaiAkhir($NilaiAkhir['nilai'], $id_ujian);
        // akhir update nilai
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">penguji berhasil di hapus ! </div>');
        redirect('operator/validasi_cek/' . $id_ujian);
    }
}
