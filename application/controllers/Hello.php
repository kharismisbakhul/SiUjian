<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hello extends CI_Controller
{
    public function index()
    {
        $data['title'] = "SiUjian";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
}
