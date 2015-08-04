<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Top extends MY_Controller {

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
	public function index($page = 0) {
		
		$this->load->model('Article_model', 'article');
		$this->load->library('pagination');
		
		$total_rows = $this->article->get_count_all();
		
		$config['base_url'] = 'http://27.120.105.160/top/index/';
		$config['total_rows'] = $total_rows;
		$config['per_rows'] = 10;
		$config['cur_page'] = $page;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<div id="pagination_top" align="right"><nav><ul class="pagination pagination-sm">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['first_link'] = urldecode('%e6%9c%80%e5%88%9d');
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = urldecode('%e6%9c%80%e5%be%8c');
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$pages_top = $this->pagination->create_links();
		
		$config['full_tag_open'] = '<div id="pagination_top" align="right"><nav><ul class="pagination">';
		$pages_bottom = $this->pagination->create_links();
		
		$data['article'] = $this->article->get_all(10, $page);
		$data['pages_top'] = $pages_top;
		$data['pages_bottom'] = $pages_bottom;
		
		$this->load->view('top', $data);
	}
}

/* End of file top.php */
/* Location: ./application/controllers/top.php */
