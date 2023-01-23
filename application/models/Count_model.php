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
        $query = $this->db->query("SELECT COUNT(*) as hitung FROM `db_prospect` WHERE sts = 'Waiting' OR sts = 'Deal'");
        return $query->result_array();
    }

    public function countWaiting($id)
    {
        $query = $this->db->query("SELECT COUNT(*) as hitung FROM `db_prospect` WHERE sts = 'Waiting'");
        return $query->result_array();
    }

    public function countLost($id)
    {
        $query = $this->db->query("SELECT COUNT(*) as hitung FROM `db_prospect` WHERE sts = 'Lost'");
        return $query->result_array();
    }

    public function countDeal($id)
    {
        $query = $this->db->query("SELECT COUNT(*) as hitung FROM `db_prospect` WHERE sts = 'Deal'");
        return $query->result_array();
    }
}

/* End of file Activity_model.php */
/* Location: ./application/models/Activity_model.php */