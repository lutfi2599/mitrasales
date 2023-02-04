<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_model extends MY_Model {

	public $table = 'db_history_prospect';

	public function __construct()
	{
		parent::__construct();
	}

	public function getData($idUser)
    {
        $this->db->select('*');
        $this->db->from('db_history_prospect');
        $this->db->where('id_user', $idUser);
        $this->db->order_by('create_at', 'DESC');
        return $this->db->get()->result_array();
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