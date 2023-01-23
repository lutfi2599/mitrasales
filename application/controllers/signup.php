<?php

class Signup extends CI_Controller
{

    public function index()
    {

        $this->load->view('templates/header');
        $this->load->view('tampilan/signup');
        $this->load->view('templates/footer_login');
    }
}
