<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function get_count_all($article_id = 0) {
		$this->db->where('cm_article_id', $article_id);
		$this->db->where('cm_display', TRUE);
		return $this->db->count_all_results('comment');
	}
	
	public function get_all($article_id = 0) {
		$this->db->where('cm_article_id', $article_id);
		$this->db->where('cm_display', TRUE);
		$this->db->order_by('cm_regdate', 'DESC');
		$query = $this->db->get('comment');
		return $query->result();
	}
	
	public function insert($article_id, $name, $comment) {
		$this->load->driver('session');
		
		$regdate = date('Y-m-d H:i:s');
		
		$data = array(
			'cm_article_id' => $article_id,
			'cm_content' => $comment,
			'cm_name' => $name,
			'cm_log_access_id' => $this->session->userdata('log_access_id'),
			'cm_display' => TRUE,
			'cm_regdate' => $regdate,
			'cm_moddate' => $regdate
		);
		
		$this->db->insert('comment', $data);
	}
}

/* End of file comment_model.php */
/* Location: ./application/models/comment_model.php */
