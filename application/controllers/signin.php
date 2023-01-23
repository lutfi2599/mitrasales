<?php

class Signin extends CI_Controller
{

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('tampilan/signin');
        $this->load->view('templates/footer');
    }
}
