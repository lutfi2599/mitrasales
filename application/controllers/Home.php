<?php

class Home extends CI_Controller
{
    public function index()
    {   $this->load->view('templates/header');
        $this->load->view('tampilan/login');
        $this->load->view('templates/footer_login');
    }

    public function login()
    {
        $this->load->view('tampilan/signup');
    }
}
