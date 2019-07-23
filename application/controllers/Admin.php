<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
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
            $prodi_kode = $this->getKodeProdi($this->input->post('prodi'));
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
        $this->db->select('nama_prodi');
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
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Account has been deleted</div>');
        redirect('admin/manajemenUser');
    }
}
