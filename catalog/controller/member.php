<?php 
	class MemberController extends Controller {
	    public function signin() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
			if(method_post()){
				$input = $_POST;
				$user = $input['user'];
				$pass = $input['pass'];
				$result = $this->model('master')->login($user, $pass);
				if($result->num_rows){
					$this->setSession('AUT_USER_ID',encrypt($result->row['AUT_USER_ID']));
					$this->setSession('AUT_USERNAME',$result->row['AUT_USERNAME']);
					$this->setSession('FIRSTNAME',$result->row['FIRSTNAME']);
					$this->setSession('LASTNAME',$result->row['LASTNAME']);
					redirect('member/profile');
				}
			}
 	    	$this->view('member/signin',$data); 
	    }
		public function profile(){
			$data = array();
			$AUT_USER_ID 			= decrypt($this->getSession('AUT_USER_ID'));
			$data['AUT_USERNAME'] 	= $this->getSession('AUT_USERNAME');
			$data['FIRSTNAME'] 		= $this->getSession('FIRSTNAME');
			$data['LASTNAME'] 		= $this->getSession('LASTNAME');

			$this->view('member/profile',$data);
		}
		public function status(){
			$data = array();
			$AUT_USER_ID 			= decrypt($this->getSession('AUT_USER_ID'));
			$data['AUT_USERNAME'] 	= $this->getSession('AUT_USERNAME');
			$data['FIRSTNAME'] 		= $this->getSession('FIRSTNAME');
			$data['LASTNAME'] 		= $this->getSession('LASTNAME');
			$data['ticket'] = $this->model('master')->getTicketByID($AUT_USER_ID);
			$this->view('member/status',$data);
		}
		public function signOut(){
			session_destroy();
			redirect('home');
		}
	}
?>