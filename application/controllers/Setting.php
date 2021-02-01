<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends MY_Controller {

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
			'content' => 'setting/index'
		];

		$footer = [];

		$this->template($header, $body, $footer);
	}

	public function change_password()
	{
		$user_id = $this->input->get('user_id', TRUE);

		$password = $this->input->post('password', TRUE);
		$re_password = $this->input->post('re_password', TRUE);

		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => '{field} harus diisi']);
		$this->form_validation->set_rules('re_password', 'Re-type Password', 'required|matches[password]', ['required' => '{field} harus diisi', 'matches' => 'Password tidak cocok']);

		if ($this->form_validation->run()) {
			$data = [
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'update_at' => date('Y-m-d H:i:s')
			];

			$update = $this->User_Model->store('users', $data, ['id' => $user_id]);

			if ($update) {
				$this->session->set_flashdata('message', 'Data berhasil diupdate');
				$this->session->set_flashdata('msg_type', 'success');
			} else {
				$this->session->set_flashdata('message', 'Gagal mengupdate data');
				$this->session->set_flashdata('msg_type', 'danger');
			}
		} else {
			$this->session->set_flashdata('message', validation_errors());
			$this->session->set_flashdata('msg_type', 'danger');
		}

		redirect('setting');
	}
}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */ ?>