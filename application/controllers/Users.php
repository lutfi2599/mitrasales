<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller
{

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
		$this->load->view('templates/header');
		$this->load->view('tampilan/profileUser', $this->page_data);
		$this->load->view('templates/footer_login');
	}

	public function updateDataUser($id)
	{
		$data = array(
			'username' => post('username'),
			'nama_lengkap' => post('nama_lengkap'),
			'hp' => post('hp'),
			'alamat' => post('alamat'),
			'email' => post('email'),
			'kendaraan' => post('kendaraan'),
			'salesman' => post('salesman')
		);

		$password = post('password');

		if (!empty($password))
			$data['password'] = hash("sha256", $password);

		$this->users_model->updateData('db_user', $data, $id);

		// if (!empty($_FILES['image']['name'])) {

		// 	$path = $_FILES['image']['name'];
		// 	$ext = pathinfo($path, PATHINFO_EXTENSION);
		// 	$this->uploadlib->initialize([
		// 		'file_name' => $id.'.'.$ext
		// 	]);
		// 	$image = $this->uploadlib->uploadImage('image', '/users');

		// 	if($image['status']){
		// 		$this->users_model->update($id, ['img_type' => $ext]);
		// 	}

		// }

		// $this->activity_model->add('Berhasil Merubah Data Profile');

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Anda berhasil merubah data profile');

		redirect('users/viewEditUser/' . $id);
	}

	public function crop()
	{
		if (isset($_POST['crop_image'])) {
			$path = $_FILES['crop_image']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$data = $_POST['crop_image'];
			$image_array_1 = explode(";", $data);
			$image_array_2 = explode(",", $image_array_1[1]);
			$base64_decode = base64_decode($image_array_2[1]);
			// $path_img = 'uploads/users/' . logged('id') . time() . '.' . $ext;
			$path_img = 'uploads/users/' . logged('id') . '.png';
			$imagename = '' . time() . '.png';
			file_put_contents($path_img, $base64_decode);
		}
	}
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */