<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends MY_Controller {

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
	public function index($id = 0) {
		
		$this->load->model('Article_model', 'article');
		$this->load->model('Comment_model', 'comment');
		$this->load->library('form_validation');
		$this->load->library('markdown');
		
		$ary_article = $this->article->get_one($id);
		foreach($ary_article as $k => $v) {
			$ary_article[$k]->ac_content = $this->markdown->parse($ary_article[$k]->ac_content);
		}
		$comment = $this->comment->get_all($id);
		
		$header_data['description']    = 'FourPH管理人です。'.(count($ary_article) <= 0 ? '該当記事無しです！' : $ary_article[0]->ac_title.'について記事にしました！コメントよろしくお願いします。未だ未だ勉強中です。');
		$header_data['keywords']       = 'FourPH,CodeIgniter,VPS,GitHub,SE,勉強,ブログ,Blog,記事,Article';
		$header_data['title']          = 'VPS、仮想環境、PHP、CodeIgniter、様々な日常を記録した記事の詳細 | 4 people house';
		$header_data['header_img_alt'] = 'VPS、仮想環境、PHP、CodeIgniter、様々な日常を記録した記事「4 people house」';
		$header_data['nav_active']     = 'Home';
		
		$data['article'] = $ary_article;
		$data['comment'] = $comment;
		
		$this->load->view($this->get_theme('common/header'), $header_data);
		$this->load->view($this->get_theme('article'), $data);
		$this->load->view($this->get_theme('common/footer'));
	}
	
	public function reg_comment($id = 0) {
		
		$this->load->model('Comment_model', 'comment');
		$this->load->helper('url');
		$this->load->library('form_validation');
		
		$this->form_validation->set_message('required', '%s が入力されていません。');
		$this->form_validation->set_message('max_length', '%s は最大 %s 文字です。');
		
		$this->form_validation->set_rules('name', '名前', 'max_length[256]');
		$this->form_validation->set_rules('comment', 'コメント', 'required|max_length[2048]');
		
		if($this->form_validation->run() == FALSE) {
			$this->index($id);
		} else {
			$this->comment->insert(
				$id,
				$this->input->post('name'),
				$this->input->post('comment')
			);
			
			redirect($this->config->base_url().'article/index/'.$id.'/');
		}
	}
}

/* End of file Article.php */
/* Location: ./application/controllers/Article.php */
