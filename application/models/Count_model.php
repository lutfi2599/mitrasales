<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Count_model extends MY_Model
{

    // public $table = 'activity_logs';

    public function __construct()
    {
        parent::__construct();
    }

    public function countProspect($id)
    {
        $this->db->select_sum('id');
        $this->db->where('id_user', $id);
        return $this->db->get('db_prospect')->row_array();
    }

    public function countWaiting($id)
    {
        $this->db->select_sum('sts');
        $this->db->where('id_user', $id);
        $this->db->where('sts', 'Waiting');
        return $this->db->get('db_prospect')->row_array();
    }

    public function countLost($id)
    {
        $this->db->select_sum('sts');
        $this->db->where('id_user', $id);
        $this->db->where('sts', 'Lost');
        return $this->db->get('db_prospect')->row_array();
    }

    public function countDeal($id)
    {
        $this->db->select_sum('sts');
        $this->db->where('id_user', $id);
        $this->db->where('sts', 'Deal');
        return $this->db->get('db_prospect')->row_array();
    }
}

/* End of file Activity_model.php */
/* Location: ./application/models/Activity_model.php */