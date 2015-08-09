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
			
			// �{���쐬
			$msg = '���('.$date.')�̃A�N�Z�X���O�����[�����܂��B'."\n";
			$msg .= '[���]'."\n";
			foreach($ary_log as $log) {
				if(array_key_exists($log->la_host_name.':'.$log->la_ip, $ary_exempt_host_name) === TRUE) {
					$ary_exempt_host_name[$log->la_host_name.':'.$log->la_ip] = intval($log->num);
				} else {
					$msg .= ' '.$log->la_host_name.':'.$log->la_ip.' => '.$log->num."\n";
				}
			}
			arsort($ary_exempt_host_name);
			$msg .= '[�Ǘ�]'."\n";
			foreach($ary_exempt_host_name as $k => $v) {
				if(0 < $v) {
					$msg .= ' '.$k.' => '.$v."\n";
				}
			}
			$msg .= '[base_url]'."\n";
			$msg .= $this->config->base_url()."\n";
			$msg .= '�ȏ�'."\n";
			$msg = mb_convert_encoding($msg, 'UTF-8', 'SJIS');
			var_dump($msg);
			
			// ���[���ݒ�
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['charset']  = 'UTF-8';
			$config['wordwrap'] = TRUE;
			
			$this->email->initialize($config);
			
			// ���[�����M
			$this->email->from('4peoplehouse@gmail.com', '4 people house');
			$this->email->to('4peoplehouse@gmail.com');
			$this->email->subject('�A�N�Z�X���O�ʒm['.$date.']');
			$this->email->message($msg);
			
//			$this->email->send();
			
			var_dump($this->email->print_debugger());
		}
	}
}

/* End of file cron_notification.php */
/* Location: ./application/controllers/cron_notification.php */
