<?php 
	class MemberController extends Controller {
	    public function signin() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				redirect('member/profile');
			}
 	    	$this->view('member/signin',$data); 
	    }
		public function profile(){
			$this->view('member/profile');
		}
	}
?>