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
			$id_agency 			= $this->getSession('id_agency');
			$data['agency_title'] = $this->model('agency')->getAgency($id_agency);
			// exit();
			// var_dump($_SESSION);exit();
			$data['name'] 		= $officer_name;
			$data['role_name'] 	= $role_name;
			$data['image']		= '';
			$data['last_login']	= $last_login;
			// echo $USER_GROUP_ID;exit();
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			foreach($menu as $val){
				$data['menu'][$val['MENU_ID']] = $val['checkbox'];
			}

			$USER_GROUP_ID = (int)$this->getSession('USER_GROUP_ID');
			$id_agency_minor = 0;
			if($USER_GROUP_ID>1){
				$id_agency_minor = (int)$this->getSession('id_agency_minor');
			}
			$AUT_USER_ID = $this->getSession('AUT_USER_ID');
			$data_search = array(
				'id_agency_minor'	=> $id_agency_minor,
				'AUT_USER_ID'		=> $AUT_USER_ID
			);
			
			$resultData 	= $this->model('response')->getNotification($data_search);
			$data['noti'] = 0;
			foreach($resultData->rows as $val){
				if(!$val['id_noti']){
					$data['noti'] +=1;
				}
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