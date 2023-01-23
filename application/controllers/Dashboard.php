<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{


    public function index()
    {
        $this->load->model('Master_model', 'master');
        $this->load->model('Count_model', 'count');

        $userId = logged('id');
        $this->page_data['userPoint'] = $this->master->getUserPoint($userId);
        $this->page_data['cprospect'] = $this->count->countProspect($userId);
        $this->page_data['cwaiting'] = $this->count->countWaiting($userId);
        $this->page_data['clost'] = $this->count->countLost($userId);
        $this->page_data['cdeal'] = $this->count->countDeal($userId);

        $this->load->view('templates/header');
        $this->load->view('tampilan/main', $this->page_data);
        $this->load->view('templates/footer');
    }



    /* ---------------END OF Reedem Point----------------- */
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */