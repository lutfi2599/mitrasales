<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller
{
    public function index()
    {   $this->load->view('templates/header');
        $this->load->view('tampilan/edit');
        $this->load->view('templates/footer_login');
    }

    public function login()
    {
        $this->load->view('tampilan/signup');
    }
}
