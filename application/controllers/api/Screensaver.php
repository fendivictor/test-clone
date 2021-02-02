<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

header("Access-Control-Allow-Origin: *");
date_default_timezone_set('Asia/Jakarta');

use chriskacerguis\RestServer\RestController;

class Screensaver extends RestController {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['Screensaver_Model']);
	}

	public function index_get($id = '')
	{
		$screensaver = $this->Screensaver_Model->find('screensaver', ($id != '') ? ['id' => $id] : [], 1);

		if (! $screensaver) {
			$this->response([
				'status' => 0,
				'message' => 'Data not found'
			], 404);
		}

		$data = [];
		foreach ($screensaver as $row) {
			$path = ($row->file_type == 'foto') ? base_url('uploads/foto/') : base_url('uploads/video/');
			$data[] = [
				'id' => $row->id,
				'file' => $row->file,
				'file_type' => $row->file_type,
				'url' => $path . $row->file
			];
		}

		$this->response([
			'status' => 1,
			'message' => 'OK',
			'data' => $data
		], 200);
	}

}

/* End of file Screensaver.php */
/* Location: ./application/controllers/Screensaver.php */ ?>