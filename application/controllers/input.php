<?php

class Input extends CI_Controller
{
    public function index()
    {   $this->load->view('templates/header');
        $this->load->view('tampilan/input');
        $this->load->view('templates/header');
    }
}
