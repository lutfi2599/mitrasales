<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->page_data['page']->title = 'Master Management';
        $this->page_data['page']->menu = 'master';
        $this->load->model('Master_model', 'master');
    }

    public function index()
    {
        // $this->page_data['prospects'] = $this->users_model->get('db_prospect');
        // $this->load->view('/', $this->page_data);
        redirect('master/viewProspect');
    }

    /* ---------------START OF PROSES UNTUK HALAMAN PROSPECT----------------- */
    public function viewProspect()
    {
        $this->page_data['prospects'] = $this->master->getAllData('db_prospect');

        $this->load->view('templates/header');
        $this->load->view('tampilan/listProspect', $this->page_data);
        $this->load->view('templates/footer_i');
    }

    public function viewAddPros()
    {
        $this->page_data['prospects'] = $this->master->getAllData('db_prospect');

        $this->load->view('templates/header');
        $this->load->view('tampilan/input', $this->page_data);
        $this->load->view('templates/footer_i');
    }

    public function viewEditPros($id)
    {
        $this->page_data['user'] = $this->master->getUser($id);

        $this->load->view('templates/header');
        $this->load->view('tampilan/edit_pros', $this->page_data);
        $this->load->view('templates/footer_i');
    }

    public function addProspect()
    {

        $this->form_validation->set_rules('nama_customer', 'Nama Customer', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telp', 'Telepon', 'trim|required|xss_clean');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|xss_clean');
        $this->form_validation->set_rules('unit_minat', 'Unit Mobil', 'trim|required|xss_clean');

        $this->load->view('templates/header');
        if ($this->form_validation->run() == FALSE) {
            return $this->load->view('tampilan/input');
        }
        $this->load->view('templates/footer_i');

        $data = array(
            'id_user' => logged('id'),
            'nama_customer' => post('nama_customer'),
            'telp' => post('telp'),
            'alamat' => post('alamat'),
            'unit_minat' => post('unit_minat'),
            'sts' => 'Waiting',
            'create_at' => time(),
            'tgl_dibuat' => date('Y-m-d'),
            'update_at' => null
        );

        $this->master->addData('db_prospect', $data);

        $this->activity_model->add('Membuat prospect baru');

        $this->session->set_flashdata('alert-type', 'success');
        $this->session->set_flashdata('alert', 'Anda berhasil membuat prospect baru');

        redirect('master/viewProspect');
    }

    public function updateProspect($id)
    {
        $this->form_validation->set_rules('nama_customer', 'Nama Customer', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telp', 'Telepon', 'trim|required|xss_clean');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|xss_clean');
        $this->form_validation->set_rules('unit_minat', 'Unit Mobil', 'trim|required|xss_clean');

        $this->page_data['user'] = $this->master->getUser($id);
        $this->load->view('templates/header');
        if ($this->form_validation->run() == FALSE) {
            return $this->load->view('tampilan/edit_pros', $this->page_data);
        }
        $this->load->view('templates/footer_i');

        $data = array(
            'id_user' => logged('id'),
            'nama_customer' => post('nama_customer'),
            'telp' => post('telp'),
            'alamat' => post('alamat'),
            'unit_minat' => post('unit_minat'),
            'sts' => 'Waiting',
            'update_at' => time()
        );

        $this->master->updateData('db_prospect', $data, $id);

        $this->activity_model->add('Ubah Data Prospect');

        $this->session->set_flashdata('alert-type', 'success');
        $this->session->set_flashdata('alert', 'Anda berhasil Mengubah prospect');

        redirect('master/viewProspect');
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

    // public function deleteProspect($id)
    // {

    //     $this->master->deleteData('db_prospect', $id);

    //     $this->activity_model->add('Menghapus data prospect');

    //     $this->session->set_flashdata('alert-type', 'success');
    //     $this->session->set_flashdata('alert', 'Data Prospect Berhasil Dihapus');

    //     redirect('master/viewProspect');
    // }
    /* ---------------END OF PROSES UNTUK HALAMAN PROSPECT----------------- */




    /* ---------------START OF Reedem Point----------------- */

    public function rewardList()
    {
        $idUser = logged('id');
        $this->page_data['rewards'] = $this->master->getRewardList();
        $this->page_data['userPoint'] = $this->master->getUserPoint($idUser);

        $this->load->view('templates/header');
        $this->load->view('tampilan/reedempoint', $this->page_data);
        $this->load->view('templates/footer_i');
    }

    public function addReedem()
    {

        $userId = logged('id');
        $getUserPoint = $this->master->getUserPoint($userId);
        $getItemPoint = post('itemPoint');
        $getItemName = post('itemName');
        //angka '6500' disesuaikan atau dibikin ambil data dari data list yang dipilih user di frontend
        //misalnya di frontend user pilih reendem produk 2 dengan total point 2400, berarti tinggal disesuaikan lemparan datanya
        $totalPoint = array('total_point' => $getUserPoint[0]['total_point'] - $getItemPoint);

        if ($getUserPoint[0]['total_point'] < $getItemPoint) {
            $this->session->set_flashdata('alert-type', 'danger');
            $this->session->set_flashdata('alert', 'Maaf! Point Anda Tidak Mencukupi');
            redirect('master/rewardList', 'refresh');
            return true;
        } else {

            $data = array(
                'id_user' => logged('id'),
                'id_reward' => post('idItem'),
                'point' => $getItemPoint,
                'create_at' => time(),
                'tgl_dibuat' => date('Y-m-d'),
                'update_at' => null
            );

            $this->master->addData('db_reedem', $data);
            $this->master->updateData('db_user', $totalPoint, $userId);

            $this->activity_model->add('Berhasil Melakukan Reedem Point Dengan Barang ' . $getItemName . ' sebanyak ' . $getItemPoint . ' point');

            $this->session->set_flashdata('alert-type', 'success');
            $this->session->set_flashdata('alert', 'Selamat, anda berhasil menukarkan point anda!');
            redirect('master/rewardList', 'refresh');
            return true;
        }
    }

    /* ---------------END OF Reedem Point----------------- */
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */