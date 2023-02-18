<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_logs extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title = 'Activity Logs';
		$this->page_data['page']->menu = 'activity_logs';
		$this->load->model('Activity_model', 'logs');
	}

	public function index()
	{
		$idUser = logged('id');
		$this->page_data['activity'] = $this->logs->getData($idUser);

        $this->load->view('templates/header');
        $this->load->view('tampilan/activity', $this->page_data);
        $this->load->view('templates/footer_i');
	}

	// public function view($id)
	// {
	// 	ifPermissions('activity_log_view');
	// 	$this->page_data['activity'] = $this->activity_model->getById($id);
	// 	$this->load->view('activity_logs/view', $this->page_data);

	// }

}

/* End of file Activity_logs.php */
/* Location: ./application/controllers/Activity_logs.php */