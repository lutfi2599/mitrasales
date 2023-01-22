<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title = 'Users Management';
		$this->page_data['page']->menu = 'users';
	}

	public function index()
	{
		$this->page_data['users'] = $this->users_model->get();
		$this->load->view('users/list', $this->page_data);
	}



	// public function view($id)
	// {

	// 	ifPermissions('users_view');

	// 	$this->page_data['User'] = $this->users_model->getById($id);
	// 	$this->page_data['User']->role = $this->roles_model->getByWhere([
	// 		'id'=> $this->page_data['User']->role
	// 	])[0];
	// 	$this->page_data['User']->activity = $this->activity_model->getByWhere([
	// 		'user'=> $id
	// 	], [ 'order' => ['id', 'desc'] ]);
	// 	$this->load->view('users/view', $this->page_data);

	// }

	public function viewEditUser($id)
	{
		$this->page_data['User'] = $this->users_model->getUserData($id);
		$this->load->view('/', $this->page_data);
	}

	public function updateDataUser($id)
	{
        $data = array(
            'nama_lengkap' => 'piyo nanas',
            'hp' => '0813404',
            'alamat' => 'konter ilham',
            'email' => 'ilil@gmail.com',
            'kendaraan' => 'avanza',
            'salesman' => 'wahyu'
        );

		// $password = post('password');
		$password = '';
		
		if(logged('id')!=$id)
			$data['status'] = post('status')==1;

		if(!empty($password))
			$data['password'] = hash( "sha256", $password );

		$this->users_model->updateData('db_user', $data, $id);

		if (!empty($_FILES['image']['name'])) {

			$path = $_FILES['image']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$this->uploadlib->initialize([
				'file_name' => $id.'.'.$ext
			]);
			$image = $this->uploadlib->uploadImage('image', '/users');

			if($image['status']){
				$this->users_model->update($id, ['img_type' => $ext]);
			}

		}

		$this->activity_model->add('Merubah Data Profile');

        $this->session->set_flashdata('alert-type', 'success');
        $this->session->set_flashdata('alert', 'Anda berhasil merubah data profile');
		
		redirect('/');

	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */