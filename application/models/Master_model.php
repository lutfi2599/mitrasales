<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends MY_Model
{

    // public $table = 'activity_logs';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData()
    {
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function getRewardList()
    {
        $query = $this->db->get('db_reward');
        return $query->result_array();
    }

    public function addData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function updateData($table, $data, $id)
    {
        $this->db->update($table, $data, array('id' => $id));
    }

    public function deleteData($table, $id)
    {
        $this->db->delete($table, array('id' => $id));
    }
}

/* End of file Activity_model.php */
/* Location: ./application/models/Activity_model.php */