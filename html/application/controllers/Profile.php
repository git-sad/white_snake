<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

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
	public function index() {
		
		$header_data['description']    = 'FourPH管理人のプロフィールです。関東圏に4人家族で生活しているおっさんSEですが、気持ちは若いですよ。PHP、Java、Ruby、C、C++等様々な言語を操るマニアです。お見知り置きを。';
		$header_data['keywords']       = 'FourPH,CodeIgniter,VPS,ブログ,GitHub,SE,勉強,プロフィール,Profile';
		$header_data['title']          = 'VPS、仮想環境、PHP、CodeIgniter、様々な日常を記録している人 | 4 people house - Profile';
		$header_data['header_img_alt'] = 'VPS、仮想環境、PHP、CodeIgniter、様々な日常を記録している人の「4 people house」';
		$header_data['nav_active']     = 'Profile';
		
		$this->load->view($this->get_theme('common/header'), $header_data);
		$this->load->view($this->get_theme('profile'));
		$this->load->view($this->get_theme('common/footer'));
	}
}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */
