<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Top extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Log_access_model', 'log_access');
		$this->load->model('Article_model', 'article');
		
		$data['article'] = $this->article->get_all();
		
		$this->load->view('top', $data);
		
		$this->log_access->insert();
	}
}

/* End of file top.php */
/* Location: ./application/controllers/top.php */
