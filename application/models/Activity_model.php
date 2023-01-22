<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_model extends MY_Model {

	public $table = 'db_history_prospect';

	public function __construct()
	{
		parent::__construct();
	}

	public function add($message)
	{
		return $this->create([
			'id_user' => logged('id'),
			'date' => date('Y-m-d'),
			'create_at' => time(),
			'activity' => $message
		]);
	}

}

/* End of file Activity_model.php */
/* Location: ./application/models/Activity_model.php */