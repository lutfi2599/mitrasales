<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

   
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('tampilan/main', $this->page_data);
        $this->load->view('templates/footer');
      
    }

    

    /* ---------------END OF Reedem Point----------------- */
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */