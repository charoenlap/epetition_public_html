<?php 
	class LoginController extends Controller {
	    public function index() {
	    	$this->render('login');
	    }
	    public function forgot() {
	    	$this->render('forgot');
	    }
	}
?>