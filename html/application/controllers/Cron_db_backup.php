<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron_db_backup extends CI_Controller {

	public function backup() {
		
		$this->load->helper('file');
		$this->load->dbutil();
		
		if($this->input->is_cli_request() === FALSE) {
			echo 'No execution.<br />';
			return;
		}
		
		$prefs = array();
		$prefs['format'] = 'txt';
		$prefs['add_drop'] = TRUE;
		$prefs['add_insert'] = TRUE;
		$prefs['newline'] = "\n";
		
//		$backup =& $this->dbutil->backup($prefs);
		$backup = $this->dbutil->backup($prefs);
		
		$backup_date = date('Ymd_His');
		write_file('/tmp/db_blog_'.$backup_date.'.sql', $backup);
		
		echo 'バックアップ完了 ['.$backup_date.']'."\n";
	}
}

/* End of file cron_db_backup.php */
/* Location: ./application/controllers/cron_db_backup.php */
