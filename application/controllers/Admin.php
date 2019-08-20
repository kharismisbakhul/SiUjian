<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->library('excel_reader2');
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
        $data['username'] = $this->session->userdata('username');
        $myusername = $data['username'];
        $data['privileges'] = $this->db->get("userprofile")->result_array();
        $data['privileges_now'] = $this->db->get_where('userprofile', ['kode' => $data['user']['user_profile_kode']])->row_array();
        //ambil list user
        $query = "SELECT * FROM `user` JOIN `userprofile` ON `user`.`user_profile_kode` = `userprofile`.`kode` WHERE `user`.`username`!= $myusername ORDER BY `jenisUser` ASC";
        $result = $this->db->query($query)->result_array();
        $data['list_user'] = $result;

        //Mahasiswa
        $data['jumlah_mahasiswa'] = $this->db->get_where('user', ['user_profile_kode' => 5])->num_rows();
        $data['jumlah_operator'] = $this->db->get_where('user', ['user_profile_kode' => 4])->num_rows();
        $this->db->select('Dosennip');
        $this->db->distinct();
        $data['jumlah_pembimbing'] = $this->db->get('pembimbing')->num_rows();
        $time = date('Y-m-d');
        $data['jumlah_ujian_hari_ini'] = $this->db->get_where('ujian', ['tgl_ujian' => $time])->num_rows();
        $this->load->model('dosen_model', 'dosen');
        $data['jumlah_penguji_hari_ini'] = $this->dosen->getPengujiHariIni();

        $this->load->model('Notif_model', 'notif');
        $result = $this->notif->notif($data['username'], intval($data['user']['user_profile_kode']));
        $counter = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['counter'] = intval($counter['jumlah_notifikasi']);

        //list validasi hari_ini
        $this->load->model('Operator_model', 'operator');
        $data['valid_ujian'] = $this->operator->cekValidasiHariIni();

        return $data;
    }

    public function index()
    {
        if ($this->session->userdata('user_profile_kode') != 1) {
            redirect('auth/blocked');
        }
        $data = $this->initData();

        $data['title'] = 'Dashboard';
        $this->loadTemplate($data);
        $this->load->view('dashboard/dash_admin', $data);
        $this->load->view('templates/footer');
    }

    public function profil()
    {
        $data = $this->initData();
        $data['title'] = 'Profil';
        $this->loadTemplate($data);
        $this->load->view('admin/profil', $data);
        $this->load->view('templates/footer');
    }

    public function manajemenUser()
    {
        $data = $this->initData();
        $data['title'] = 'Manajemen User';
        $this->loadTemplate($data);
        $this->load->view('admin/manajemen_user', $data);
        $this->load->view('templates/footer');
    }

    private function getProfilKode($input)
    {
        if ($input === "Administrator") {
            return 1;
        } else if ($input === "Operator") {
            return 2;
        } else if ($input === "Pimpinan") {
            return 3;
        } else if ($input === "Dosen") {
            return 4;
        } else {
            return 5;
        }
    }

    private function getStatus($input)
    {
        if ($input === "Aktif") {
            return 1;
        } else {
            return 0;
        }
    }

    private function getKodeProdi($prodi)
    {
        $this->db->select('kode');
        $this->db->where('nama_prodi', $prodi);
        $result = $this->db->get('prodi')->row_array();
        return $result['kode'];
    }

    public function adduser()
    {
        $this->form_validation->set_rules('namaadd', 'Nama', 'required|trim');
        $this->form_validation->set_rules('usernameadd', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'This Username has already registered!'
        ]);
        $this->form_validation->set_rules('passwordadd', 'Password', 'required|trim|matches[password2]', [
            'matches' => 'Password dont match!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[passwordadd]');
        if ($this->form_validation->run() == false) {
            $this->adduserview();
        } else {
            $username = $this->input->post('usernameadd');
            $password = $this->input->post('passwordadd');
            $nama = $this->input->post('namaadd');
            $prodi_kode = $this->input->post('prodi');
            $jenjang = $this->input->post('jenjang');
            $user_profile_kode = $this->getProfilKode($this->input->post('privileges'));
            $is_active = $this->getStatus($this->input->post('status'));
            $data = array(
                'username' => htmlspecialchars($username),
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'nama' => $nama,
                'user_profile_kode' => $user_profile_kode,
                'is_active' => $is_active,
                'date_created' => date('Y-m-d')
            );
            if ($user_profile_kode == 5) {
                $data_mahasiswa = [
                    'nim' => $username,
                    'nama' => $nama,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'prodikode' => $prodi_kode,
                    'jenjang' => $jenjang,
                    'noTest' => base64_encode(random_bytes(3))
                ];
                $this->db->insert('mahasiswa', $data_mahasiswa);
            } else if ($user_profile_kode == 4 || $user_profile_kode == 3) {
                $data_dosen = [
                    'nip' => $username,
                    'nama_dosen' => $nama,
                    'jenjang' => $jenjang,
                    'prodi_dosen' => $prodi_kode,
                    'statusAktif' => $is_active
                ];
                if ($user_profile_kode == 3) {
                    $data_dosen['jabatan_pimpinan'] = $this->input->post('posisi');
                }
                $this->db->insert('dosen', $data_dosen);
            }
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Account has been registered</div>');
            redirect('admin/manajemenUser');
        }
    }


    public function getListProdi()
    {
        $this->db->select('nama_prodi,kode');
        echo json_encode($this->db->get('prodi')->result_array());
    }

    public function adduserview()
    {
        $data = $this->initData();
        $data['title'] = 'Manajemen User';
        $this->loadTemplate($data);
        $this->load->view('admin/add_user', $data);
        $this->load->view('templates/footer');
    }

    public function edituser($id)
    {
        $this->form_validation->set_rules('namaadd', 'Nama', 'required|trim');
        $this->form_validation->set_rules('usernameadd', 'Username', 'required|trim');
        $this->form_validation->set_rules('passwordadd', 'Password', 'required|trim|matches[password2]', [
            'matches' => 'Password dont match!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[passwordadd]');
        if ($this->form_validation->run() == false) {
            $this->edituserview($id);
        } else {
            $username = $this->input->post('usernameadd');
            $password = $this->input->post('passwordadd');
            $nama = $this->input->post('namaadd');
            $user_profile_kode = $this->getProfilKode($this->input->post('privileges'));
            $is_active = $this->getStatus($this->input->post('status'));
            $data = array(
                'username' => htmlspecialchars($username),
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'nama' => $nama,
                'user_profile_kode' => $user_profile_kode,
                'is_active' => $is_active
            );

            if ($user_profile_kode == 5) {
                $data_mahasiswa = [
                    'nim' => $username,
                    'nama' => $nama,
                    'password' => password_hash($password, PASSWORD_DEFAULT)
                ];
                $this->db->set($data_mahasiswa);
                $this->db->where('nim', $username);
                $this->db->update('mahasiswa');
            }
            if ($user_profile_kode == 4) {
                $data_dosen = [
                    'nip' => $username,
                    'nama' => $nama,
                    'statusAktif' => $is_active
                ];
                $this->db->set($data_dosen);
                $this->db->where('nip', $username);
                $this->db->update('dosen');
            }

            //cek jika ada gambar
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $old_images = $data['user']['image'];
                    if ($old_images != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_images);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Account has been Updated</div>');
            redirect('admin/manajemenUser');
        }
    }

    public function edituserview($id)
    {
        $this->load->model('user_model', 'um');
        $data = $this->initData();
        $data['title'] = 'Manajemen User';
        $data['detailUser'] = $this->um->getDetailUser($id);
        $data['privileges_user'] = $this->um->getPrivilegesUser($data['detailUser']['user_profile_kode']);
        $data['another_privileges'] = $this->um->getAnotherPrivileges($data['privileges_user']['jenisUser']);
        $this->loadTemplate($data);
        $data['id_temp'] = $id;
        $this->load->view('admin/edit_user', $data);
        $this->load->view('templates/footer');
    }

    public function deleteuser($id)
    {
        $result = $this->db->get_where('user', ['id' => $id])->row_array();
        if (intval($result['user_profile_kode']) == 5) {
            $this->db->where('nim', $result['username']);
            $this->db->delete('mahasiswa');
        } elseif (intval($result['user_profile_kode']) == 4 || intval($result['user_profile_kode']) == 3) {
            $this->db->where('nip', $result['username']);
            $this->db->delete('dosen');
        }
        $this->db->where('id', intval($id));
        $this->db->delete('user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Account has been deleted</div>');
        redirect('admin/manajemenUser');
    }

    public function downloadTemplate($user)
    {
        if ($user == "Dosen") {
            $this->load->view('admin/templateExcelDosen');
        } else {
            $this->load->view('admin/templateExcelMahasiswa');
        }
    }
    public function importDataUser()
    {
        // menghubungkan dengan library excel reader

        $status = $this->input->post('jenisUser');

        // upload file xls
        $target = basename($_FILES['import-data']['name']);
        move_uploaded_file($_FILES['import-data']['tmp_name'], $target);

        // beri permisi agar file xls dapat di baca
        chmod($_FILES['import-data']['name'], 0777);

        // mengambil isi file xls
        $data = new Spreadsheet_Excel_Reader($_FILES['import-data']['name'], false);
        // menghitung jumlah baris data yang ada
        $jumlah_baris = $data->rowcount($sheet_index = 0);

        for ($i = 2; $i <= $jumlah_baris; $i++) {
            // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
            $kode_user = 0;
            if ($status == "Mahasiswa") {
                $result = [
                    "nim" => $data->val($i, 1),
                    "nama" => $data->val($i, 2),
                    "noTest" => base64_encode(random_bytes(3)),
                    "password" => password_hash(123, PASSWORD_DEFAULT),
                    "prodikode" => 1
                ];
                $kode_user = 5;
                $user = [
                    "user_profile_kode" => $kode_user,
                    "username" => $result['nim'],
                    "password" => password_hash(123, PASSWORD_DEFAULT),
                    "nama" => $result['nama'],
                    'is_active' => 1,
                    'date_created' => date('Y-m-d')
                ];
            } else {
                $result = [
                    "nip" => $data->val($i, 1),
                    "nama_dosen" => $data->val($i, 2),
                    "jenisKelamin" => $data->val($i, 3),
                    "statusPNS" => $data->val($i, 4),
                    "posisi" => $data->val($i, 5),
                    "statusAktif" => $data->val($i, 6),
                    "jenjang" => $data->val($i, 7),
                    "noTlpnDosen" => $data->val($i, 8),
                    "AlamatDosen" => $data->val($i, 9),
                    "prodi_dosen" => $data->val($i, 10),
                    "jabatan_pimpinan" => $data->val($i, 11)
                ];
                $kode_user = 4;
                $user = [
                    "user_profile_kode" => $kode_user,
                    "username" => $result['nip'],
                    "password" => password_hash(123, PASSWORD_DEFAULT),
                    "nama" => $result['nama_dosen'],
                    'is_active' => 1,
                    'date_created' => date('Y-m-d')
                ];
            }
            if ($kode_user == 5) {
                if ($result['nim'] != "" && $result['nama'] != "") {
                    // input data ke database (table data_pegawai)
                    $this->db->insert('mahasiswa', $result);
                    $this->db->insert('user', $user);
                }
            } else {
                if ($result['nip'] != "" && $result['nama_dosen'] != "") {
                    // input data ke database (table data_pegawai)
                    $this->db->insert('dosen', $result);
                    $this->db->insert('user', $user);
                }
            }
        }

        // hapus kembali file .xls yang di upload tadi
        // unlink($_FILES['import-data']['name']);

        // alihkan halaman ke index.php

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Impor data berhasil</div>');
        redirect('admin/manajemenUser');
    }
}
