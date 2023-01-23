<?php

class ListProspect extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('tampilan/listProspect');
        $this->load->view('templates/footer');
    }
}
