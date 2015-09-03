<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function get_count_all() {
		return $this->db->count_all_results('article');
	}
	
	public function get_all($per_rows, $page = 0) {
		$this->db->limit($per_rows, $page);
		$this->db->order_by('ac_regdate', 'DESC');
		$query = $this->db->get('article');
		return $query->result();
	}
	
	public function get_one($id = 0) {
		$this->db->where('ac_id', $id);
		$this->db->order_by('ac_regdate', 'DESC');
		$query = $this->db->get('article');
		return $query->result();
	}
}

/* End of file Article_model.php */
/* Location: ./application/models/Article_model.php */
