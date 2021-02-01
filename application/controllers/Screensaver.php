<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Screensaver extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['Screensaver_Model']);
		$this->load->library(['form_validation']);
	}

	public function index()
	{
		$title = 'Screensaver';

		$header = [
			'title' => $title
		];

		$body = [
			'title' => $title,
			'content' => 'screensaver/index'
		];

		$footer = [
			'js' => 'screensaver/js'
		];

		$this->template($header, $body, $footer);
	}

	public function add()
	{
		$csrf = [
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        ];

        $id = $this->input->post('id', TRUE);
        $file_type = $this->input->post('file_type', TRUE);

        $this->form_validation->set_rules('file_type', 'File Type', 'required', ['required' => '{field} harus diisi']);

        $status = 0;
        $message = validation_errors();

        if ($this->form_validation->run()) {
        	$allowed_types = ($file_type == 'foto') ? 'png|jpg|jpeg|gif|bmp|webp' : 'mp4|avi|dat|mpeg4|3gp|mkv';
        	$path = ($file_type == 'foto') ? './uploads/foto/' : './uploads/video/';
        	$file_name = ($file_type == 'foto') ? 'foto_'.date('YmdHis').rand() : 'video_'.date('YmdHis').rand();

        	if (! file_exists($path)) {
        		mkdir($path, 0777, true);
        	}

        	$config = [
        		'file_name' => $file_name,
        		'upload_path' => $path,
        		'allowed_types' => $allowed_types
        	];

        	$this->load->library('upload', $config);

        	$data = [
        		'file_type' => $file_type,
        		($id == '') ? 'insert_at' : 'update_at' => date('Y-m-d H:i:s'),
        		($id == '') ? 'user_insert' : 'user_update' => $this->session->userdata('username') 
        	];

        	$is_file_uploaded = false;
        	if ($this->upload->do_upload('file_upload')) {
        		$is_file_uploaded = true;

        		$data['file'] = $this->upload->data('file_name');
        	}

        	$message = 'Gagal menyimpan data';
        	if (! $is_file_uploaded) {
        		$message = $this->upload->display_errors();
        	} else {
        		if ($id != '') {
        			$exists = $this->Screensaver_Model->find('screensaver', ['id' => $id], 0);

        			if ($exists) {
        				$path = ($exists->file_type == 'foto') ? './uploads/foto/' : './uploads/video/';

        				if (file_exists($path . $exists->file)) {
        					unlink($path . $exists->file);
        				}
        			}
        		}

        		$simpan = $this->Screensaver_Model->store('screensaver', $data, ($id == '') ? [] : ['id' => $id], false);

	    		if ($simpan) {
	    			$status = 1;
	    			$message = 'Data berhasil disimpan';
	    		}
        	}
        }

        $this->output->set_content_type('application/json')->set_output(json_encode([
        	'status' => $status,
        	'message' => $message,
        	'csrf' => $csrf
        ]));
	}	

	public function dt_table()
	{
		$response = [];

		$data = $this->Screensaver_Model->find('screensaver', [], 1);

		if ($data) {
			$no = 1;
			foreach ($data as $row) {
				$response[] = [
					'no' => $no++,
					'file' => $row->file,
					'action' => '	<a href="#" class="btn btn-primary btn-edit" data-id="'.$row->id.'">Ubah</a>
                                	<a href="#" class="btn btn-danger btn-delete" data-id="'.$row->id.'">Hapus</a>'
				];
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode(['data' => $response]));
	}

	public function delete()
	{
		$csrf = [
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        ];

        $id = $this->input->post('id', TRUE);

        $data = $this->Screensaver_Model->find('screensaver', ['id' => $id], 0);

        $status = 0;
        $message = 'Gagal menghapus data';

        if ($data) {
        	$delete = $this->Screensaver_Model->remove('screensaver', ['id' => $id]);

	        if ($delete) {
	        	$status = 1;
	        	$message = 'Data berhasil dihapus';

	        	$path = ($data->file_type == 'foto') ? './uploads/foto/' : './uploads/video/';

	        	if (file_exists($path . $data->file)) {
	        		unlink($path . $data->file);
	        	}
	        }
        }

        $this->output->set_content_type('application/json')->set_output(json_encode([
        	'status' => $status,
        	'message' => $message,
        	'csrf' => $csrf
        ]));
	}

	public function edit()
	{
		$id = $this->input->get('id', TRUE);

		$data = $this->Screensaver_Model->find('screensaver', ['id' => $id], 0);

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
}

/* End of file Screensaver.php */
/* Location: ./application/controllers/Screensaver.php */ ?>