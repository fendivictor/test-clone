<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['User_Model']);
	}

	public function index()
	{
		$is_authenticated = $this->User_Model->is_authenticated();

		if ($is_authenticated) {
			redirect('screensaver');
		}

		$this->load->view('login');
	}

	public function auth()
	{
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);

		$user_data = $this->User_Model->find('users', ['username' => $username], 0);

		if (! $user_data) {
			$this->session->set_flashdata('message', 'User tidak ditemukan');
			redirect('/');
		}

		if (! password_verify($password, $user_data->password)) {
			$this->session->set_flashdata('message', 'Password Salah');
			redirect('/');
		}

		$session_data = [
			'user_id' => $user_data->id,
			'username' => $user_data->username,
			'profile_name' => $user_data->profile_name,
			'photo' => $user_data->photo,
			'email' => $user_data->email
		];
		
		$this->session->set_userdata($session_data);

		$update = $this->User_Model->store('users', ['last_login' => date('Y-m-d H:i:s')]);

		redirect('screensaver');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */ ?>