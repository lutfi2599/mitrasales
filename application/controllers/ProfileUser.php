<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileUser extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('tampilan/profileUser');
        $this->load->view('templates/footer_login');
    }
}
