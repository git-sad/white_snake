<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_access_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function insert() {
		$data = array();
		$data['la_ip'] = $this->input->ip_address();
		$data['la_host_name'] = $this->input->server('REMOTE_HOST');
		$data['la_port'] = $this->input->server('REMOTE_PORT');
		$data['la_user_agent'] = $this->input->user_agent();
		$data['la_referrer'] = empty($this->input->server('HTTP_REFERER')) ? '' : $this->input->server('HTTP_REFERER');
		$data['la_request_uri'] = preg_replace('/\/index\.php/', '', $this->input->server('PHP_SELF'), 1);
		$data['la_session_id'] = $this->session->userdata('session_id');
		$data['la_regdate'] = date("Y-m-d H:i:s");
		
		$this->db->insert('log_access', $data);
	}
}

/* End of file log_access_model.php */
/* Location: ./application/models/log_access_model.php */
