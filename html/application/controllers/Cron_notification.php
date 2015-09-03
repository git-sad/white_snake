<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron_notification extends CI_Controller {

	public function log_access($date = NULL) {
		
		$this->load->model('Blog_Config_model', 'blog_config');
		$this->load->model('Log_access_model',  'log_access');
		$this->load->library('email');
		
		if($this->input->is_cli_request() === FALSE) {
			echo 'No execution.<br />';
			return;
		}
		
		$ary_exempt_host_name = array();
		$ary_manage_host_namae = $this->blog_config->get_manage_host_name();
		foreach($ary_manage_host_namae as $val) {
			$ary_exempt_host_name[$val] = 0;
		}
		
		$date = $date ?: date('Y-m-d', strtotime('- 1 day'));
		
		$ary_log = $this->log_access->get_day($date);
		
		// 本文作成
		$msg = '昨日('.$date.')のアクセスログをメールします。'."\n";
		$msg .= '[一般]'."\n";
		foreach($ary_log as $log) {
			if(array_key_exists($log->la_host_name.':'.$log->la_ip, $ary_exempt_host_name) === TRUE) {
				$ary_exempt_host_name[$log->la_host_name.':'.$log->la_ip] = intval($log->num);
			} else {
				$msg .= ' '.$log->la_host_name.':'.$log->la_ip.' => '.$log->num."\n";
			}
		}
		arsort($ary_exempt_host_name);
		$msg .= '[管理]'."\n";
		foreach($ary_exempt_host_name as $k => $v) {
			if(0 < $v) {
				$msg .= ' '.$k.' => '.$v."\n";
			}
		}
		$msg .= '[base_url]'."\n";
		$msg .= $this->config->base_url()."\n";
		$msg .= '以上'."\n";
		var_dump($msg);
		
		// メール設定
		$this->email->set_newline("\r\n");
		
		// メール送信
		$from_email = $this->blog_config->get_cron_notification_from_email();
		$from_name  = $this->blog_config->get_cron_notification_from_name();
		$to_email   = $this->blog_config->get_cron_notification_to_email();
		
		$this->email->from($from_email, $from_name);
		$this->email->to($to_email);
		$this->email->subject('FourPH Info['.$date.']');
		$this->email->message($msg);
		
		if($this->email->send()) {
			echo 'メール送信成功'."\n";
		} else {
			var_dump($this->email->print_debugger());
		}
	}
}

/* End of file Cron_notification.php */
/* Location: ./application/controllers/Cron_notification.php */
