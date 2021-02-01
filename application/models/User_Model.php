<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function is_authenticated()
	{
		$username = $this->session->userdata('username');

		$user_data = $this->find('users', ['username' => $username], 0);

		return ($user_data) ? true : false;
	}
}

/* End of file User_Model.php */
/* Location: ./application/models/User_Model.php */ ?>