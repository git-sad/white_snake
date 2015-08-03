<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	function __construct() {
		
		parent::__construct();
		
		$this->load->model('Log_access_model', 'log_access');
		$this->log_access->insert();
	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
