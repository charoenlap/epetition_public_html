<?php 
	class CommonController extends Controller {
	    public function header($data=array()) {
	    	$data = array();
	    	$user_name 			= $this->getSession('user_name');
			$officer_id 		= $this->getSession('officer_id');
			$officer_name 		= $this->getSession('officer_name');
			$role_name 			= $this->getSession('role_name');
			$last_login 		= $this->getSession('last_login');
			$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$data['name'] 		= $officer_name;
			$data['role_name'] 	= $role_name;
			$data['image']		= '';
			$data['last_login']	= $last_login;
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			// echo "<pre>";
			// var_dump($menu);exit();
			foreach($menu as $val){
				$data['menu'][$val['MENU_ID']] = $val['checkbox'];
			}
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