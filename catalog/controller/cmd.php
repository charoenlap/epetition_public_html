<?php 
	class CmdController extends Controller {
	    public function updateCode() {
	    	$output = shell_exec('git stash;git pull;');
	    }
	    public function backupDB() {
	    	$file = time().".sql";
	    	// $output = shell_exec('mysqldump -u root -p --databases epeti > '.$file);
	    	$pipe = popen('mysqldump -u root -p --databases epeti > '.$file, 'r');
			fwrite($pipe, "root\r\n");
			pclose($pipe);
			echo "done";
	    }
	}
?>