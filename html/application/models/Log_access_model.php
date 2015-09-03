<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_access_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function get_day($date) {
		$this->db->select('la_host_name, la_ip, COUNT(la_id) AS num');
		$this->db->where('la_regdate >=', $date.' 00:00:00');
		$this->db->where('la_regdate <=', $date.' 23:59:59');
		$this->db->group_by(array('la_host_name', 'la_ip'));
		$this->db->order_by('num', 'DESC');
		$query = $this->db->get('log_access');
		return $query->result();
	}
	
	public function insert() {
		$this->load->driver('session');
		
		$data = array();
		$data['la_ip'] = $this->input->ip_address();
		$data['la_host_name'] = gethostbyaddr($data['la_ip']) ?: '';
		$data['la_port'] = $this->input->server('REMOTE_PORT');
		$data['la_user_agent'] = $this->input->user_agent();
		$data['la_referrer'] = $this->input->server('HTTP_REFERER') ?: '';
		$data['la_request_uri'] = preg_replace('/\/index\.php/', '', $this->input->server('REQUEST_URI'), 1);
		$data['la_session_id'] = session_id();
		$data['la_regdate'] = date("Y-m-d H:i:s");
		
		$this->db->insert('log_access', $data);
		
		$id = $this->db->insert_id();
		$this->session->set_userdata('log_access_id', $id);
	}
}

/* End of file log_access_model.php */
/* Location: ./application/models/log_access_model.php */
