<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReedemPoint extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('tampilan/reedempoint');
        $this->load->view('templates/footer');
    }
}
