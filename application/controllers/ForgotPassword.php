<?php

class ForgotPassword extends CI_Controller
{
    public function index()
    {   $this->load->view('templates/header');
        $this->load->view('tampilan/forgotPassword');
        $this->load->view('templates/footer');
    }
}
