<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends MY_Model
{

    // public $table = 'activity_logs';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData($table)
    {
        $idu = logged('id');
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_user', $idu);
        return $this->db->get()->result_array();
    }

    public function getRewardList()
    {
        $query = $this->db->get('db_reward');
        return $query->result_array();
    }

    public function getUserPoint($idUser)
    {
        $this->db->select('id, total_point');
        $this->db->from('db_user');
        $this->db->where('id', $idUser);
        // $query = $this->db->update('db_user', $data, array('id' => $idUser));
        return $this->db->get()->result_array();
    }

    public function getUser($idUser)
    {
        $this->db->select('*');
        $this->db->from('db_prospect');
        $this->db->where('id', $idUser);
        return $this->db->get()->result_array();
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