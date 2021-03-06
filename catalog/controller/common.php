<?php 
	class CommonController extends Controller {
	    public function header($data=array()) {
	    	$data['link_result'] = route('result');
	    	$data['link_contact'] = route('contact');
	    	$data['link_home'] = route('home');
	    	$data['link_login'] = route('login');
			$data['link_register'] = route('register');
			$data['link_forgot'] = route('forgot');
			$data['link_result'] = route('result'); 
			$data['link_help'] = route('help'); 

			$data['link_dashboard'] = route('member/dashboard'); 
			$data['link_deposit'] = route('member/deposit'); 
			$data['link_password'] = route('member/password'); 
			$data['link_logout'] = route('member/logout'); 
			$AUT_USERNAME = '';
			$AUT_USER_ID = (int)decrypt($this->getSession('AUT_USER_ID'));
			if($AUT_USER_ID){
				$data['AUT_USERNAME'] = $this->getSession('AUT_USERNAME');
			}
	    	$this->render('common/header',$data);
	    }
	    public function footer($data=array()){
	    	$data['link_result'] = route('result');
	    	$data['link_contact'] = route('contact');
	    	$data['link_home'] = route('home');
	    	$data['link_login'] = route('login');
			$data['link_register'] = route('register');
			$data['link_forgot'] = route('forgot');
			$data['link_result'] = route('result'); 
			$data['link_help'] = route('help'); 

			$data['link_dashboard'] = route('member/dashboard'); 
			$data['link_deposit'] = route('member/deposit'); 
			$data['link_password'] = route('member/password'); 
			$data['link_logout'] = route('member/logout'); 

			$data['footer'] = $this->model('master')->getFooter();
	    	$this->render('common/footer',$data);
	    }
	}
?>