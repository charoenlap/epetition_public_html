<?php 
	class MemberController extends Controller {
	    public function signin() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
 	    	$this->view('member/signin',$data); 
	    }
	}
?>