<?php 
	class ReportController extends Controller {
	    public function index() {
	    	$data = array();
			$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			$data['active_del'] = 0;
			$data['active_add'] = 0;
			$data['active_view'] = 0;
			$data['active_edit'] = 0;
			foreach($menu as $val){
				if($val['MENU_ID']=="1"){
					if($val['USER_DELETE']=="1"){
						$data['active_del'] = 1;
					}
					if($val['USER_ADD']=="1"){
						$data['active_add'] = 1;
					}
					if($val['USER_VIEW']=="1"){
						$data['active_view'] = 1;
					}
					if($val['USER_EDIT']=="1"){
						$data['active_edit'] = 1;
					}
				}
			}
			$this->view('report/home',$data);
	    }
		public function department(){
			$data = array();
			$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			$data['active_del'] = 0;
			$data['active_add'] = 0;
			$data['active_view'] = 0;
			$data['active_edit'] = 0;
			foreach($menu as $val){
				if($val['MENU_ID']=="6"){
					if($val['USER_DELETE']=="1"){
						$data['active_del'] = 1;
					}
					if($val['USER_ADD']=="1"){
						$data['active_add'] = 1;
					}
					if($val['USER_VIEW']=="1"){
						$data['active_view'] = 1;
					}
					if($val['USER_EDIT']=="1"){
						$data['active_edit'] = 1;
					}
				}
			}
			$this->view('report/department',$data);
		}
		public function way(){
			$data = array();
			$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			$data['active_del'] = 0;
			$data['active_add'] = 0;
			$data['active_view'] = 0;
			$data['active_edit'] = 0;
			foreach($menu as $val){
				if($val['MENU_ID']=="7"){
					if($val['USER_DELETE']=="1"){
						$data['active_del'] = 1;
					}
					if($val['USER_ADD']=="1"){
						$data['active_add'] = 1;
					}
					if($val['USER_VIEW']=="1"){
						$data['active_view'] = 1;
					}
					if($val['USER_EDIT']=="1"){
						$data['active_edit'] = 1;
					}
				}
			}
			$this->view('report/way',$data);
		}
		public function zone(){
			$data = array();
			$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			$data['active_del'] = 0;
			$data['active_add'] = 0;
			$data['active_view'] = 0;
			$data['active_edit'] = 0;
			foreach($menu as $val){
				if($val['MENU_ID']=="8"){
					if($val['USER_DELETE']=="1"){
						$data['active_del'] = 1;
					}
					if($val['USER_ADD']=="1"){
						$data['active_add'] = 1;
					}
					if($val['USER_VIEW']=="1"){
						$data['active_view'] = 1;
					}
					if($val['USER_EDIT']=="1"){
						$data['active_edit'] = 1;
					}
				}
			}
			$this->view('report/zone',$data);
		}
		public function mission(){
			$data = array();
			$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			$data['active_del'] = 0;
			$data['active_add'] = 0;
			$data['active_view'] = 0;
			$data['active_edit'] = 0;
			foreach($menu as $val){
				if($val['MENU_ID']=="9"){
					if($val['USER_DELETE']=="1"){
						$data['active_del'] = 1;
					}
					if($val['USER_ADD']=="1"){
						$data['active_add'] = 1;
					}
					if($val['USER_VIEW']=="1"){
						$data['active_view'] = 1;
					}
					if($val['USER_EDIT']=="1"){
						$data['active_edit'] = 1;
					}
				}
			}
			$this->view('report/mission',$data);
		}
		public function land(){
			$data = array();
			$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			$data['active_del'] = 0;
			$data['active_add'] = 0;
			$data['active_view'] = 0;
			$data['active_edit'] = 0;
			foreach($menu as $val){
				if($val['MENU_ID']=="10"){
					if($val['USER_DELETE']=="1"){
						$data['active_del'] = 1;
					}
					if($val['USER_ADD']=="1"){
						$data['active_add'] = 1;
					}
					if($val['USER_VIEW']=="1"){
						$data['active_view'] = 1;
					}
					if($val['USER_EDIT']=="1"){
						$data['active_edit'] = 1;
					}
				}
			}
			$this->view('report/land',$data);
		}
		public function problem(){
			$data = array();
			$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			$data['active_del'] = 0;
			$data['active_add'] = 0;
			$data['active_view'] = 0;
			$data['active_edit'] = 0;
			foreach($menu as $val){
				if($val['MENU_ID']=="11"){
					if($val['USER_DELETE']=="1"){
						$data['active_del'] = 1;
					}
					if($val['USER_ADD']=="1"){
						$data['active_add'] = 1;
					}
					if($val['USER_VIEW']=="1"){
						$data['active_view'] = 1;
					}
					if($val['USER_EDIT']=="1"){
						$data['active_edit'] = 1;
					}
				}
			}
			$this->view('report/problem',$data);
		}
		public function type(){
			$data = array();
			$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			$data['active_del'] = 0;
			$data['active_add'] = 0;
			$data['active_view'] = 0;
			$data['active_edit'] = 0;
			foreach($menu as $val){
				if($val['MENU_ID']=="12"){
					if($val['USER_DELETE']=="1"){
						$data['active_del'] = 1;
					}
					if($val['USER_ADD']=="1"){
						$data['active_add'] = 1;
					}
					if($val['USER_VIEW']=="1"){
						$data['active_view'] = 1;
					}
					if($val['USER_EDIT']=="1"){
						$data['active_edit'] = 1;
					}
				}
			}
			$this->view('report/type',$data);
		}
		public function progress(){
			$data = array();
			$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			$data['active_del'] = 0;
			$data['active_add'] = 0;
			$data['active_view'] = 0;
			$data['active_edit'] = 0;
			foreach($menu as $val){
				if($val['MENU_ID']=="13"){
					if($val['USER_DELETE']=="1"){
						$data['active_del'] = 1;
					}
					if($val['USER_ADD']=="1"){
						$data['active_add'] = 1;
					}
					if($val['USER_VIEW']=="1"){
						$data['active_view'] = 1;
					}
					if($val['USER_EDIT']=="1"){
						$data['active_edit'] = 1;
					}
				}
			}
			$this->view('report/progress',$data);
		}
		public function topic(){
			$data = array();
			$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			$data['active_del'] = 0;
			$data['active_add'] = 0;
			$data['active_view'] = 0;
			$data['active_edit'] = 0;
			foreach($menu as $val){
				if($val['MENU_ID']=="14"){
					if($val['USER_DELETE']=="1"){
						$data['active_del'] = 1;
					}
					if($val['USER_ADD']=="1"){
						$data['active_add'] = 1;
					}
					if($val['USER_VIEW']=="1"){
						$data['active_view'] = 1;
					}
					if($val['USER_EDIT']=="1"){
						$data['active_edit'] = 1;
					}
				}
			}
			$this->view('report/topic',$data);
		}
		public function status(){
			$data = array();
			$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			$data['active_del'] = 0;
			$data['active_add'] = 0;
			$data['active_view'] = 0;
			$data['active_edit'] = 0;
			foreach($menu as $val){
				if($val['MENU_ID']=="15"){
					if($val['USER_DELETE']=="1"){
						$data['active_del'] = 1;
					}
					if($val['USER_ADD']=="1"){
						$data['active_add'] = 1;
					}
					if($val['USER_VIEW']=="1"){
						$data['active_view'] = 1;
					}
					if($val['USER_EDIT']=="1"){
						$data['active_edit'] = 1;
					}
				}
			}
			$this->view('report/status',$data);
		}
		public function  satisfaction(){
			$data = array();
			$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			$data['active_del'] = 0;
			$data['active_add'] = 0;
			$data['active_view'] = 0;
			$data['active_edit'] = 0;
			foreach($menu as $val){
				if($val['MENU_ID']=="16"){
					if($val['USER_DELETE']=="1"){
						$data['active_del'] = 1;
					}
					if($val['USER_ADD']=="1"){
						$data['active_add'] = 1;
					}
					if($val['USER_VIEW']=="1"){
						$data['active_view'] = 1;
					}
					if($val['USER_EDIT']=="1"){
						$data['active_edit'] = 1;
					}
				}
			}
			$this->view('report/satisfaction',$data);
		}
	}
?>