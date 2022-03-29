<?php 
	class SettingController extends Controller {
		public function approve(){
			$data = array();
			$data['title'] 	= "ตั้งค่าระบบ การอนุมัติ";
			$data['menu'] = array();
			$USER_GROUP_ID      = $this->getSession('USER_GROUP_ID');
	        $menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
            $data['active_del'] = 0;
            $data['active_add'] = 0;
            $data['active_view'] = 0;
            $data['active_edit'] = 0;
            foreach($menu as $val){
                if($val['MENU_ID']=="19"){
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
				// $modelSetting 	= $this->model('setting');
            }
            // echo "<pre>";
            // var_dump($_SESSION);
            // exit();
            $select = array(
                'AUT_USER_ID'       => (int)$this->getSession('AUT_USER_ID'),
                'id_agency'         => (int)$this->getSession('id_agency'),
                'id_agency_minor'   => (int)$this->getSession('id_agency_minor'),
            );
            $data['users'] = $this->model('assign')->getlistUser($select);
            $select = array(
                'user_id'       => (int)$this->getSession('AUT_USER_ID'),
            );
            $data['listAssign'] = $this->model('assign')->getlistAssign($select);
			$this->view('setting/approve',$data);
		}
        public function submitApprove(){
            if(method_post()){
                $AUT_USER_ID    = (int)$this->getSession('AUT_USER_ID');
                $date_start     = post('date_start');
                $date_end       = post('date_end');
                $assign_user_id = post('assign_user_id');
                if($date_start AND $date_start AND $date_end){
                    $insertAssign = array(
                        'user_id'       => $AUT_USER_ID,
                        'date_start'    => $date_start,
                        'date_end'      => $date_end,
                        'assign_user_id'=> $assign_user_id,
                        'group_id'      => (int)$this->getSession('USER_GROUP_ID'),
                        'group_id_type' => 0
                    );
                    $this->model('assign')->insertAssign($insertAssign);
                    redirect('setting/approve');
                }else{
                    redirect('setting/approve&result=data empty');
                }
            }
        }
	    public function index() {
			$data = array();
			$data['title'] 	= "ตั้งค่าระบบ";
			$data['menu'] = array();
			$USER_GROUP_ID      = $this->getSession('USER_GROUP_ID');
	        $menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
            $data['active_del'] = 0;
            $data['active_add'] = 0;
            $data['active_view'] = 0;
            $data['active_edit'] = 0;
            foreach($menu as $val){
                if($val['MENU_ID']=="19"){
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
				$modelSetting 	= $this->model('setting');
				$data['data']	= $modelSetting->getList();
				if($_SERVER['REQUEST_METHOD'] == "POST"){
					$id 	= '1';
					$post 	= array(
						'contacts'	=> $_POST['contact']
					);
					$update = $modelSetting->updateSetting($id,$post);
					if($update){
						redirect('setting');
					}
				}
            }
	    	$this->view('setting/home',$data);
	    }
	    public function EncodeString(){
	    	$url_test = "http://203.113.25.98/CoreService/";
	    	$url = "http://service.1111.go.th/";
	    	$path = "SOAP/General.asmx/EncodeString";

	    	$real_url = $url_test.$path;
	    	$type = "post";
	    	$params = array('str'=>'test');
	    	$result = apiXML($real_url,$type,$params);
	    	echo $result;
	    }
	}
?>