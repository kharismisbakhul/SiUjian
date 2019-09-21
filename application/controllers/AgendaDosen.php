<?php
defined('BASEPATH') or exit('No direct script access allowed');

class agendaDosen extends CI_Controller
{

    private function loadTemplate($data)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
    }
    public function agenda($nip = null)
    {
        $data['title'] = 'Lecturer Agenda';
        if ($nip != null) {
            $data['user_login'] = $this->db->get_where('dosen', ['nip' => $nip])->row_array();
            $data['user_login_prodi'] = $this->db->get_where('prodi', ['kode' => intval($data['user_login']['prodi_dosen'])])->row_array();
        }

        $data['dosen'] = $this->db->get('dosen')->result_array();
        $this->load->view('templates/header', $data);
        if ($nip != null) {
            $this->load->view('publik/agendaDosenDetail', $data);
        } else {
            $this->load->view('publik/agendaDosen', $data);
        }
        $this->load->view('templates/footer');
    }
    public function get_agenda($nip)
    {
        $data = $this->db->get_where('agendaDosen', ['nip_dosen' => $nip])->result_array();
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function tambahAgenda($nip)
    {
        $title = $this->input->post('namaAgenda');
        $kategori = $this->input->post('kategoriAgenda');
        if ($kategori == 1) {
            $tanggal = $this->input->post('tanggalAgenda');
            $startTime = $this->input->post('waktuMulai');
            $endTime = $this->input->post('waktuSelesai');
            $ruangan = $this->input->post('ruangan');

            $date1 = new DateTime($tanggal . 'T' . $startTime);
            $date2 = new DateTime($tanggal . 'T' . $endTime);
            $diff = $date2->diff($date1);
            $durasi = $diff->format('%H:%I:%S');

            $nameOfDay = date('D', strtotime($tanggal));
            $hari = strtoupper(substr($nameOfDay, 0, 2));

            $data = [
                'nip_dosen' => $nip,
                'nama_agenda' => $title,
                'tanggalMulai' => $tanggal,
                'waktuMulai' => $startTime,
                'tanggalSelesai' => $tanggal,
                'waktuSelesai' => $endTime,
                'ruangan' => $ruangan,
                'hariAgenda' => $hari,
                'durasi' => $durasi,
                'kategoriAgenda' => $kategori
            ];
        } else if ($kategori == 2) {
            $start = $this->input->post('tanggalMulai');
            $startTime = $this->input->post('waktuMulai');
            $end = $this->input->post('tanggalSelesai');
            $endTime = $this->input->post('waktuSelesai');
            $ruangan = $this->input->post('ruangan');
            $data = [
                'nip_dosen' => $nip,
                'nama_agenda' => $title,
                'tanggalMulai' => $start,
                'waktuMulai' => $startTime,
                'tanggalSelesai' => $end,
                'waktuSelesai' => $endTime,
                'ruangan' => $ruangan,
                'kategoriAgenda' => $kategori
            ];
        } else if ($kategori == 3) {
            $hari = $this->input->post('hariAgenda');
            $start = $this->input->post('tanggalMulai');
            $startTime = $this->input->post('waktuMulai');
            $end = $this->input->post('tanggalSelesai');
            $endTime = $this->input->post('waktuSelesai');
            $ruangan = $this->input->post('ruangan');

            // Kalkulasi Durasi
            $date1 = new DateTime($start . 'T' . $startTime);
            $date2 = new DateTime($start . 'T' . $endTime);
            $diff = $date2->diff($date1);
            $durasi = $diff->format('%H:%I:%S');

            $data = [
                'nip_dosen' => $nip,
                'nama_agenda' => $title,
                'tanggalMulai' => $start,
                'waktuMulai' => $startTime,
                'tanggalSelesai' => $end,
                'waktuSelesai' => $endTime,
                'durasi' => $durasi,
                'ruangan' => $ruangan,
                'hariAgenda' => $hari,
                'kategoriAgenda' => $kategori
            ];
        } else {
            $hari = $this->input->post('hariAgenda');
            $start = $this->input->post('semesterMulai');
            $startTime = $this->input->post('waktuMulai');
            $end = $this->input->post('semesterSelesai');
            $endTime = $this->input->post('waktuSelesai');
            $ruangan = $this->input->post('ruangan');

            // Kalkulasi Durasi
            $date1 = new DateTime($start . 'T' . $startTime);
            $date2 = new DateTime($start . 'T' . $endTime);
            $diff = $date2->diff($date1);
            $durasi = $diff->format('%H:%I:%S');

            $data = [
                'nip_dosen' => $nip,
                'nama_agenda' => $title,
                'tanggalMulai' => $start,
                'waktuMulai' => $startTime,
                'tanggalSelesai' => $end,
                'waktuSelesai' => $endTime,
                'durasi' => $durasi,
                'ruangan' => $ruangan,
                'hariAgenda' => $hari,
                'kategoriAgenda' => $kategori
            ];
        }
        $this->db->insert('agendaDosen', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Agenda added</div>');
        if ($this->session->userdata('user_profile_kode') == 2) {
            redirect('operator/agendaDosen/' . $nip);
        } else {
            redirect('dosen/agendaDosen/');
        }
    }

    public function hapusAgenda()
    {
        $nip = $this->uri->segments[4];
        $id = $this->uri->segments[3];
        $this->db->where('id_agenda', intval($id));
        $this->db->delete('agendaDosen');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Agenda has been deleted</div>');
        if ($this->session->userdata('user_profile_kode') == 2) {
            redirect('operator/agendaDosen/' . $nip);
        } else {
            redirect('dosen/agendaDosen/');
        }
    }

    public function editAgenda()
    {
        $id = $this->input->post('id_agenda_edit');
        $nip = $this->input->post('nip_modal_edit');
        $namaAgenda = $this->input->post('namaAgendaEdit');
        $data = array(
            'id_agenda' => $id,
            'nip_dosen' => $nip,
            'nama_agenda' => $namaAgenda
        );
        $this->db->set($data);
        $this->db->where('id_agenda', $id);
        $this->db->update('agendaDosen');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Agenda has been Updated</div>');
        if ($this->session->userdata('user_profile_kode') == 2) {
            redirect('operator/agendaDosen/' . $nip);
        } else {
            redirect('dosen/agendaDosen/');
        }
    }

    public function getRuangan()
    {
        $ruangan = [
            "GD. A LT. 1",
            "GD. A LT. 2",
            "GD. A LT. 3",
            "GD. Dekanat Lama LT.1",
            "GD. Dekanat Lama LT.2",
            "GD. C LT. 1",
            "GD. C LT. 2",
            "GD. D LT. 1",
            "GD. D LT. 2",
            "GD. D LT. 3",
            "GD. E LT. 1",
            "GD. E LT. 2",
            "GD. E LT. 3",
            "GD. E LT. 4",
            "GD. F LT. 1",
            "GD. F LT. 2",
            "GD. F LT. 3",
            "GD. F LT. 4",
            "GD. F LT. 5",
            "GD. F LT. 6",
            "GD. F LT. 7",
            "GD. GU LT. 1",
            "GD. GU LT. 2",
            "GD. GU LT. 3",
            "GD. GU LT. 4",
            "GD. GU LT. 5",
            "GD. GU LT. 6",
            "GD. GU LT. 7",
            "GD. GU LT. 8",
            "GD. GU LT. 9",
            "GD. GU LT. 10"
        ];
        echo json_encode($ruangan);
    }
}
