<?php 
	class EmailController extends Controller {
	    public function send() {
	    	$email = get('email');
	    	$to_email="charoenlap88@gmail.com";
	    	$msg="test";
	    	$subject="test";
	    	sendmail($to_email,$msg,$subject);
	    }
	}
}