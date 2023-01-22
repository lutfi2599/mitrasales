<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->page_data['page']->title = 'Master Management';
        $this->page_data['page']->menu = 'master';
        $this->load->model('Master_model', 'master');;
    }

    public function index()
    {
        $this->page_data['prospects'] = $this->users_model->get('db_prospect');
        $this->load->view('/', $this->page_data);
    }

    /* ---------------START OF PROSES UNTUK HALAMAN PROSPECT----------------- */
    public function addProspect()
    {

        $data = array(
            'id_user' => logged('id'),
            'nama_customer' => 'udinese',
            'telp' => '089912391932',
            'alamat' => 'panam',
            'unit_minat' => '1',
            'sts' => 'Waiting',
            'create_at' => time(),
            'update_at' => null
        );

        $this->master->addData('db_prospect', $data);

        $this->activity_model->add('Membuat prospect baru');

        $this->session->set_flashdata('alert-type', 'success');
        $this->session->set_flashdata('alert', 'Anda berhasil membuat prospect baru');

        redirect('/');
    }

    public function editProspect($id)
    {

        $id = 1;
        $data = array(
            'nama_customer' => 'opong',
            'telp' => '089912391932',
            'alamat' => 'hr.subrantas',
            'unit_minat' => '5',
            'sts' => 'Waiting',
            'update_at' => time()
        );

        $this->master->updateData('db_prospect', $data, $id);

        $this->activity_model->add('Merubah data prospect');

        $this->session->set_flashdata('alert-type', 'success');
        $this->session->set_flashdata('alert', 'Anda berhasil merubah prospect baru');

        redirect('/');
    }

    public function deleteProspect($id)
    {

        $this->master->deleteData('db_prospect', $id);

        $this->activity_model->add('Menghapus data prospect');

        $this->session->set_flashdata('alert-type', 'success');
        $this->session->set_flashdata('alert', 'Data Prospect Berhasil Dihapus');

        redirect('/');
    }
    /* ---------------END OF PROSES UNTUK HALAMAN PROSPECT----------------- */




    /* ---------------START OF Reedem Point----------------- */

    public function rewardList()
    {
        $this->page_data['rewards'] = $this->master->getRewardList();
        $this->load->view('/', $this->page_data);
    }

    /* ---------------END OF Reedem Point----------------- */
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */