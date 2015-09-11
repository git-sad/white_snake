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
		$this->load->model('Comment_model', 'comment');
		$this->load->library('pagination');
		$this->load->library('markdown');
		
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
		
		$ary_comment_count = array();
		$ary_article = $this->article->get_all(10, $page);
		foreach($ary_article as $k => $v) {
			$ary_article[$k]->ac_content = $this->markdown->parse($ary_article[$k]->ac_content);
			$ary_comment_count[$v->ac_id] = $this->comment->get_count_all($v->ac_id);
		}
		
		$header_data['description']    = 'こんにちは、FourPH管理人です。都内の会社でSEをしながら、PHP、CodeIgniterの勉強、利用をしています。まずはServersMan@VPS、CodeIgniterを利用してブログ「white_snake」を構築しています。GitHubでも公開していますので、是非御覧下さい。';
		$header_data['keywords']       = 'FourPH,CodeIgniter,VPS,GitHub,SE,勉強,ブログ,Blog,トップ,Top';
		$header_data['title']          = 'VPS、仮想環境、PHP、CodeIgniter、様々な日常を記録 | 4 people house';
		$header_data['header_img_alt'] = 'VPS、仮想環境、PHP、CodeIgniter、様々な日常を記録する「4 people house」';
		$header_data['nav_active']     = 'Home';
		
		$data['article']       = $ary_article;
		$data['comment_count'] = $ary_comment_count;
		$data['pages_top']     = $pages_top;
		$data['pages_bottom']  = $pages_bottom;
		
		$this->load->view($this->get_theme('common/header'), $header_data);
		$this->load->view($this->get_theme('top'), $data);
		$this->load->view($this->get_theme('common/footer'));
	}
}

/* End of file Top.php */
/* Location: ./application/controllers/Top.php */
