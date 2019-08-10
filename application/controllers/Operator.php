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
        $data['star_date'] = "";
        $data['end_date'] = "";
        if ($this->input->post('submit') && $this->input->post('star_date') && $this->input->post('end_date')) {
            $data['star_date'] = $this->input->post('star_date');
            $data['end_date'] = $this->input->post('end_date');
            $data['mahasiswa'] = $this->mahasiswa->getDetailLaporanMahasiswa($data['star_date'], $data['end_date']);
        } else {
            $data['mahasiswa'] = $this->mahasiswa->getDetailLaporanMahasiswa();
        }
        if ($type != "list") {
            $Id = $this->uri->segment(4);
            $data['user_login'] = $this->mahasiswa->getDataMahasiswa($Id);
            $data['fakultas'] = $this->mahasiswa->getProfilJurusan($data['user_login']['prodikode']);
            $data['pembimbing'] = $this->mahasiswa->getPembimbing($data['user_login']['nim']);
            $data['jumlah_ujian'] = $this->db->get_where('ujian', ['mahasiswanim' => $Id])->num_rows();
            $data['jumlah_publikasi'] = $this->db->get_where('publikasi', ['mahasiswanim' => $Id])->num_rows();
            $data['ujian'] = $this->mahasiswa->getUjian($Id);
            $data['publikasi'] = $this->mahasiswa->getPublikasi($Id);
            $data['isianMahasiswa'] = $this->db->get_where('isianMahasiswa', ['Mahasiswanim' => $Id])->row_array();
            $data['dosen'] = $this->mahasiswa->getDaftarPembimbing($Id);
            $data['posisiPembimbing'] = $this->mahasiswa->getPosisiPembimbing($Id);
            $data['belumUjian'] = $this->mahasiswa->getBelumUjian($Id);
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

    public function Pimpinan()
    {
        $data = $this->initData();
        $this->load->model('dosen_model', 'dosen');
        $data['pimpinan'] = $this->dosen->getPimpinanPlusProdi();
        $data['title'] = 'Pimpinan';
        $this->loadTemplate($data);
        $this->load->view('operator/listPimpinan', $data);
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
        $this->load->model('Operator_model', 'operator');
        $type = $this->uri->segment(3);
        $this->load->model('dosen_model', 'dosen');
        $data = $this->initData();
        $data['title'] = 'Dosen';
        $data['star_date'] = "";
        $data['end_date'] = "";
        if ($this->input->post('submit') && $this->input->post('star_date') && $this->input->post('end_date')) {
            $data['star_date'] = $this->input->post('star_date');
            $data['end_date'] = $this->input->post('end_date');
            $data['dosen'] = $this->operator->getDataPeriodeDosen($data['star_date'], $data['end_date']);
        } else {
            $data['dosen'] = $this->operator->getDataPeriodeDosen();
        }
        if ($type != "list") {
            $Id = $this->uri->segment(4);
            $data['user_login'] = $this->db->get_where('dosen', ['nip' => $Id])->row_array();
            //Mahasiswa bimbingan
            $data['bimbingan_jumlah'] = $this->dosen->getMahasiswaBimbingan($data['user_login']['nip'])->num_rows();
            // $data['bimbingan'] = $this->dosen->getMahasiswaBimbingan($data['user_login']['nip'])->result_array();
            $data['ujian'] = $this->dosen->getUjian($Id);
            if ($this->input->post('cek')) {
                $data['bimbingan'] = $this->dosen->getStatusBimbingan($Id, $data['star_date'], $data['end_date']);
            } else {
                $data['bimbingan'] = $this->dosen->getStatusBimbingan($Id, $this->input->post('tglMulai'), $this->input->post('tglAkhir'));
            }
            // $data['bimbingan'] = $this->dosen->getStatusBimbingan($Id);
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
            'statusPembimbing' => $this->input->post('pembimbing'),
            'tgl_tambah_pembimbing' => date("Y/m/d")
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
        $data['star_date'] = "";
        $data['end_date'] = "";
        if ($this->input->post('submit') && $this->input->post('star_date') && $this->input->post('end_date')) {
            $data['star_date'] = $this->input->post('star_date');
            $data['end_date'] = $this->input->post('end_date');
            $data['valid_ujian'] = $this->operator->getDataPeriode($data['star_date'], $data['end_date']);
        } else {
            $data['valid_ujian'] = $this->operator->cekValidasi();
        }
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
        $this->dosen->updateNilaiAkhir(round($NilaiAkhir['nilai'], 2), $id_ujian);
        // update nilaiTA
        // cek ujian
        $ujian = $this->db->select('kodeUjiankode,MahasiswaNim as nim')->get_where('ujian', ['id' => $id_ujian])->row_array();
        if ($ujian['kodeUjiankode'] == 4 || $ujian['kodeUjiankode'] == 12 || $ujian['kodeUjiankode'] == 16) {
            $this->_kalkulasiNilaiTA($ujian['nim']);
        }
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
        $data['posisiPenguji'] = $this->operator->getPosisiPenguji($id_ujian);
        $data['pembimbing'] = $this->operator->getPembimbing($id_ujian);
        $data['penguji'] = $this->operator->getPenguji($id_ujian);
        $this->load->view('operator/validasi_operator_ujian', $data);
        $this->load->view('templates/footer');
    }
    public function validasiUjian($id)
    {
        if ($this->input->post('statusUjian')) {
            $this->db->set('statusUjian', $this->input->post('statusUjian'));
            $this->db->update('ujian');
            $this->db->where('id', $id);
        } else {
            $data = [
                'id' => $id,
                'tanggal' => $this->input->post('tgl_ujian'),
                'komentar' => $this->input->post('komentar'),
                'valid' => $this->input->post('valid')
            ];
            $this->load->model('Operator_model', 'operator');
            $this->operator->validasiUjian($data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil di ubah ! </div>');
        redirect('operator/validasi_cek/' . $id);
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
    public function publikasi()
    {
        $data = $this->initData();
        $data['title'] = 'Publikasi';
        $this->loadTemplate($data);
        $this->load->model('Operator_model', 'operator');
        $data['star_date'] = "";
        $data['end_date'] = "";
        if ($this->input->post('submit') && $this->input->post('star_date') && $this->input->post('end_date')) {
            $data['star_date'] = $this->input->post('star_date');
            $data['end_date'] = $this->input->post('end_date');
            $data['valid_publikasi'] = $this->operator->getDataPublikasi($data['star_date'], $data['end_date']);
        } else {
            $data['valid_publikasi'] = $this->operator->getDataPublikasi();
        }
        $this->load->view('operator/validasi_operator_publikasi', $data);
        $this->load->view('templates/footer');
    }
    public function validasi_publikasi($idJurnal)
    {
        $data = $this->initData();
        $data['title'] = 'Publikasi';
        $this->loadTemplate($data);
        $this->load->model('Operator_model', 'operator');
        $data['publikasi'] = $this->db->get_where('publikasi', ['idJurnal' => $idJurnal])->row_array();
        if ($this->input->post('valid')) {
            $this->db->set('kategoriJurnal', $this->input->post('kategoriJurnal'));
            $this->db->set('valid', $this->input->post('valid'));
            $this->db->where('idJurnal', $idJurnal);
            $this->db->update('publikasi');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data publikasi berhasil di perbaharui ! </div>');
            redirect('operator/validasi_publikasi/' . $idJurnal);
        }
        $this->load->view('operator/validasi_operator_publikasi_cek', $data);
        $this->load->view('templates/footer');
    }

    private function _kalkulasiNilaiTA($nim)
    {
        $this->load->model('Operator_model', 'operator');
        $mhs['status'] = $this->operator->getDetailMahasiswa($nim);
        $mhs['ujian'] = $this->operator->getDetailUjian($nim);
        $nilaiTA = 0;
        $nilai_angka = 0;
        $angka_mutu_x_nilai = 0;
        $whereCondition = '';
        $case = '';
        $case2 = '';

        if ($mhs['status']['jurusankode'] == 1 && $mhs['status']['jenjang'] == 'S3') {
            $nilai_angka = [];
            foreach ($mhs['ujian'] as $u) {
                $id = $u['id'];
                $whereCondition .= ($whereCondition == '') ? "'$id'" : ',' . "'$id'";
                $nilai_angka[$u['kode']] = $u['bobot_nilai'] * $u['nilai_akhir'];
                if ($u['kode'] == 6 || $u['kode'] == 8) {
                    $angka_mutu_x_nilai = ($nilai_angka[$u['kode']] + $nilai_angka[$u['kode'] - 1]) * $u['angka_mutu'];
                    $case2 .= " WHEN id = " . $id . " THEN " . ($nilai_angka[$u['kode']] + $nilai_angka[$u['kode'] - 1])  . "";
                    $case2 .= " WHEN id = " . ($id - 1) . " THEN " . ($nilai_angka[$u['kode']] + $nilai_angka[$u['kode'] - 1])  . "";
                    $case .= " WHEN id = " . $id . " THEN " .  $angka_mutu_x_nilai . "";
                    $case .= " WHEN id = " . ($id - 1) . " THEN " .  $angka_mutu_x_nilai . "";
                    $nilaiTA += $angka_mutu_x_nilai;
                } elseif ($u['kode'] == 12) {
                    $angka_mutu_x_nilai = ($nilai_angka[$u['kode']] + $nilai_angka[$u['kode'] - 1] + $nilai_angka[$u['kode'] - 2] + $nilai_angka[$u['kode'] - 3]) * $u['angka_mutu'];
                    $case2 .= " WHEN id = " . $id . " THEN " . ($nilai_angka[$u['kode']] + $nilai_angka[$u['kode'] - 1] + $nilai_angka[$u['kode'] - 2] + $nilai_angka[$u['kode'] - 3])  . "";
                    $case2 .= " WHEN id = " . ($id - 1) . " THEN " . ($nilai_angka[$u['kode']] + $nilai_angka[$u['kode'] - 1] + $nilai_angka[$u['kode'] - 2] + $nilai_angka[$u['kode'] - 3])  . "";
                    $case2 .= " WHEN id = " . ($id - 2) . " THEN " . ($nilai_angka[$u['kode']] + $nilai_angka[$u['kode'] - 1] + $nilai_angka[$u['kode'] - 2] + $nilai_angka[$u['kode'] - 3])  . "";
                    $case2 .= " WHEN id = " . ($id - 3) . " THEN " . ($nilai_angka[$u['kode']] + $nilai_angka[$u['kode'] - 1] + $nilai_angka[$u['kode'] - 2] + $nilai_angka[$u['kode'] - 3])  . "";
                    $case .= " WHEN id = " . $id . " THEN " .  $angka_mutu_x_nilai . "";
                    $case .= " WHEN id = " . ($id - 1) . " THEN " .  $angka_mutu_x_nilai . "";
                    $case .= " WHEN id = " . ($id - 2) . " THEN " .  $angka_mutu_x_nilai . "";
                    $case .= " WHEN id = " . ($id - 3) . " THEN " .  $angka_mutu_x_nilai . "";
                    $nilaiTA += $angka_mutu_x_nilai;
                }
            }
        } else {
            foreach ($mhs['ujian'] as $u) {
                $id = $u['id'];
                $whereCondition .= ($whereCondition == '') ? "'$id'" : ',' . "'$id'";
                $nilai_angka = $u['bobot_nilai'] * $u['angka_mutu'] * $u['nilai_akhir'];
                $case .= " WHEN id = " . $u['id'] . " THEN " . $nilai_angka . "";
                $nilaiTA += $u['bobot_nilai'] * $u['angka_mutu'] * $u['nilai_akhir'];
            }
        }
        $sql = "UPDATE ujian set angka_mutu_x_nilai = CASE $case END ,nilai_akhir_angka = CASE $case2 END WHERE id in($whereCondition)";
        $this->db->query($sql);
        $this->operator->updateNilaiTA(round($nilaiTA, 2), $nim);
    }
}
