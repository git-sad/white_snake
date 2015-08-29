<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron_notification extends CI_Controller {

	public function log_access($date = NULL) {
		
		$this->load->model('Log_access_model', 'log_access');
		$this->load->library('email');
		
		$ary_exempt_host_name = array(
			'softbank219183047172.bbtec.net:219.183.47.172'  => 0,
			'c141014.net61215.cablenet.ne.jp:61.215.141.14'  => 0,
			'c129187.net61215.cablenet.ne.jp:61.215.129.187' => 0,
			'c141058.net61215.cablenet.ne.jp:61.215.141.58'  => 0
		);
		
		if($this->input->is_cli_request() === FALSE) {
			echo 'No execution.<br />';
		} else {
			$date = is_null($date) ? date('Y-m-d', strtotime('- 1 day')) : $date;
			
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
			$this->email->from('****@****', '****');
			$this->email->to('****@****');
			$this->email->subject('FourPH Info['.$date.']');
			$this->email->message($msg);
			
			if($this->email->send()) {
				echo 'メール送信成功'."\n";
			} else {
				var_dump($this->email->print_debugger());
			}
		}
	}
}

/* End of file cron_notification.php */
/* Location: ./application/controllers/cron_notification.php */
