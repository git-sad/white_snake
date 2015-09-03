<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_config_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function get_manage_host_name() {
		$this->db->select('cf_value');
		$this->db->where("cf_key = 'log_access_manage_host_name'");
		$this->db->order_by('cf_id', 'ASC');
		$query = $this->db->get('config');
		$result = $query->result();
		
		$manage_host_name = array();
		foreach($result as $val) {
			$manage_host_name[] = $val->cf_value;
		}
		
		return $manage_host_name;
	}
	
	public function get_cron_notification_from_email() {
		$this->db->select('cf_value');
		$this->db->where("cf_key = 'cron_notification_from_email'");
		$this->db->order_by('cf_id', 'DESC');
		$query = $this->db->get('config');
		$result = $query->result();
		
		$from_email = $result[0]->cf_value ?: '';
		
		return $from_email;
	}
	
	public function get_cron_notification_from_name() {
		$this->db->select('cf_value');
		$this->db->where("cf_key = 'cron_notification_from_name'");
		$this->db->order_by('cf_id', 'DESC');
		$query = $this->db->get('config');
		$result = $query->result();
		
		$from_name = $result[0]->cf_value ?: '';
		
		return $from_name;
	}
	
	public function get_cron_notification_to_email() {
		$this->db->select('cf_value');
		$this->db->where("cf_key = 'cron_notification_to_email'");
		$this->db->order_by('cf_id', 'DESC');
		$query = $this->db->get('config');
		$result = $query->result();
		
		$to_email = $result[0]->cf_value ?: '';
		
		return $to_email;
	}

}

/* End of file Blog_config_model.php */
/* Location: ./application/models/Blog_config_model.php */
