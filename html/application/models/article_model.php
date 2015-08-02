<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function get_all() {
		$this->db->order_by('ac_regdate', 'DESC');
		$query = $this->db->get('article');
		return $query->result();
	}
}

/* End of file article_model.php */
/* Location: ./application/models/article_model.php */
