<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['User_Model']);

		$is_authenticated = $this->User_Model->is_authenticated();

		if ($is_authenticated == FALSE) {
			redirect(base_url());
		}
	}

	public function template($header = [], $body = [], $footer = [])
	{
		$this->load->view('partial/header', $header);
		$this->load->view('partial/body', $body);
		$this->load->view('partial/footer', $footer);
	}
}

/* End of file MY_Controller.php */
/* Location: ./application/controllers/MY_Controller.php */ ?>