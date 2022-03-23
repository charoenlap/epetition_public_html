<?php 
	class ExeController extends Controller {
	    public function index() {
	    	$output = shell_exec('ls');
	    	echo "<pre>".$output."</pre>";
	    }
	}
?>