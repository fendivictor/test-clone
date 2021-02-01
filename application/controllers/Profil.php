<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model(['User_Model']);
	}

	public function index()
	{
		$title = 'Profile';

		$header = [
			'title' => $title
		];

		$body = [
			'title' => $title,
			'content' => 'profil/index'
		];

		$footer = [];

		$this->template($header, $body, $footer);
	}

	public function update()
	{
		$user_id = $this->input->get('user_id', TRUE);

		$username = $this->input->post('username', TRUE);
		$profile_name = $this->input->post('profile_name', TRUE);
		$email = $this->input->post('email', TRUE);

		$this->form_validation->set_rules('username', 'Username', 'required', ['required' => '{field} harus diisi']);
		$this->form_validation->set_rules('profile_name', 'Profile Name', 'required', ['required' => '{field} harus diisi']);

		if ($this->form_validation->run()) {
			$data = [
				'username' => $username,
				'profile_name' => $profile_name,
				'email' => $email,
				'update_at' => date('Y-m-d H:i:s')
			];

			$simpan = $this->User_Model->store('users', $data, ['id' => $user_id]);
			if ($simpan) {
				$this->session->set_flashdata('message', 'Data berhasil diupdate');
				$this->session->set_flashdata('msg_type', 'success');

				$session_data = [
					'user_id' => $user_id,
					'username' => $username,
					'profile_name' => $profile_name,
					'email' => $email
				];
				
				$this->session->set_userdata($session_data);

			} else {
				$this->session->set_flashdata('message', 'Gagal mengupdate data');
				$this->session->set_flashdata('msg_type', 'danger');
			}
		} else {
			$this->session->set_flashdata('message', validation_errors());
			$this->session->set_flashdata('msg_type', 'danger');
		}

		redirect('profil');
	}
}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */ ?>