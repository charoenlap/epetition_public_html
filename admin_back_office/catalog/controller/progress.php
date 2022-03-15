<?php 
	class ProgressController extends Controller {
	    public function index() {
	    	$data = array();
	    	$data['listProgress'] = array();
	    	$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			$data['active_del'] = 0;
			$data['active_add'] = 0;
			$data['active_view'] = 0;
			$data['active_edit'] = 0;
			foreach($menu as $val){
				if($val['MENU_ID']=="4"){
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
			if($data['active_view']){
		    	$data['year'] = (get('year')?get('year'):(date('Y')+543));
		    	$data_select = array(
		    		'year' => ($data['year']-543)
		    	);
		    	$data['listProgress'] = $this->model('progress')->getLists($data_select);
		    }
	    	$this->view('progress/home',$data);
	    }
		public function detail() {
			$data = array();
			$data['active_view'] = array();
			$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			$data['active_del'] = 0;
			$data['active_add'] = 0;
			$data['active_view'] = 0;
			$data['active_edit'] = 0;
			foreach($menu as $val){
				if($val['MENU_ID']=="4"){
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
			if($data['active_view']){
				$data['year'] 	= (int)get('year');
				$data['month'] 	= (int)get('month');
				$data_select = array(
		    		'year' => ($data['year']-543),
		    		'month' => $data['month']
		    	);
				$data['listProgress'] = $this->model('progress')->getListsDetail($data_select);
			}
			$this->view('progress/detail',$data);
		}
	}
?>