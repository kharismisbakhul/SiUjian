<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hello extends CI_Controller
{
    public function index()
    {
        $this->load->view('operator/validasi_operator_isian.php');
    }
}
