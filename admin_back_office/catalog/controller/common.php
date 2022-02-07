<?php 
	class CommonController extends Controller {
	    public function header($data=array()) {
	    	$data = array();
	    	$user_name 			= $this->getSession('user_name');
			$officer_id 		= $this->getSession('officer_id');
			$officer_name 		= $this->getSession('officer_name');
			$role_name 			= $this->getSession('role_name');
			$last_login 		= $this->getSession('last_login');
			$last_login 		= $this->getSession('last_login');
			$data['name'] 		= $officer_name;
			$data['role_name'] 	= $role_name;
			$data['image']		= '';
			$data['last_login']	= $last_login;
	    	$this->render('common/header',$data);
	    }
	    public function footer($data=array()){
	    	$this->render('common/footer',$data);
	    }
	    public function logout($data=array()){
	    	$this->redirect('home',$data);
	    }
	}
?>