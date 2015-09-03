<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Convert_markdown extends CI_Controller {

	/**
	 * 使用方法: 
	 *   /tmp 配下に、変換元 test1.txt を配置。
	 *   # /usr/bin/php /var/www/html/webapp/htdocs/index.php convert_markdown convert test1.txt test2.txt
	 *   /tmp 配下に、変換先 test2.txt が生成されている。
	 *   変換文字: # \
	 */
	public function convert($from = '', $to = '') {
		
		$this->load->helper('file');
		
		if($this->input->is_cli_request() === FALSE) {
			echo 'No execution.<br />';
			return;
		}
		
		$str = read_file('/tmp/'.$from);
		if($str === FALSE) {
			echo '変換元ファイルが読み込めません。[/tmp/'.$from.']'."\n";
			return;
		}
		
		$str = str_replace(array("\r\n", "\r"), "\n", $str);
		
		$title = '';
		$info  = '';
		$tag   = '';
		$date  = '';
		$ary_str = explode("\n", $str);
		$str     = '';
		$c = count($ary_str);
		for($i = 0; $i < $c; $i++) {
			switch($i) {
			case 0:
				$title = $ary_str[$i];
				break;
			case 1:
				$info  = $ary_str[$i];
				break;
			case 2:
				$tag   = $ary_str[$i];
				break;
			case 3:
				$date  = $ary_str[$i];
				break;
			default:
				$str  .= $ary_str[$i].'\n\n';
			}
		}
		$date = $date ?: date('Y-m-d H:i:s');
		
		$str = str_replace('#', '\\\#', $str);
		$str = str_replace('\'', '\\\'', $str);
		
		$str = 'INSERT INTO article (ac_title, ac_content, ac_info, ac_tag, ac_display, ac_regdate, ac_moddate) VALUES '."\n".
			   '(\''.$title.'\', '."\n".
			   '\''.$str.'\', '."\n".
			   '\''.$info.'\', \''.$tag.'\', TRUE, \''.$date.'\', \''.$date.'\');'."\n\n";
		
		if(write_file('/tmp/'.$to, $str) === FALSE) {
			echo '変換先ファイルに書き込めません。[/tmp/'.$to.']'."\n";
		} else {
			echo '変換完了'."\n";
		}
	}
}

/* End of file Convert_markdown.php */
/* Location: ./application/controllers/Convert_markdown.php */
