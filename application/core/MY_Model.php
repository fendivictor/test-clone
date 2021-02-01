<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function find($table, $condition, $multiple = 1)
	{
		$result = $this->db->where($condition)->get($table);

		return ($multiple == 1) ? $result->result() : $result->row();
	}

	public function remove($table, $condition)
	{
		$this->db->where($condition)
			->delete($table);

		return $this->db->affected_rows();
	}

	public function store($table, $data, $condition = [], $bulk = false)
    {   
        $this->db->trans_begin();
        if ($condition) {
            $this->db->update($table, $data, $condition);
        } else {
            if ($bulk) {
                $this->db->insert_batch($table, $data);
            } else {
                $this->db->insert($table, $data);
            }
        }

        if ($this->db->trans_status()) {
            $this->db->trans_commit();

            return true;
        } else {
            $this->db->trans_rollback();

            return false;
        }
    }
}

/* End of file MY_Model.php */
/* Location: ./application/models/MY_Model.php */ ?>