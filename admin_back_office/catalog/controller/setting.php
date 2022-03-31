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
        // คำนำหน้า
        public function prefix(){
            $data           = array();
            $data['title']  = "คำนำหน้า";
            $data['lists']  = $this->model('setting')->prefixLists();
            $this->view('prefix/index',$data);
        }
        public function prefixAdd(){
            $data           = array();
            $data['title']  = "เพิ่มข้อมูล";
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $data = array();
                $data = $_POST;
                $insert = $this->model('setting')->insertPrefix($data);
                if($insert){
                    redirect('setting/prefix');
                }
            }
            $this->view('prefix/add',$data);
        }
        public function prefixEdit(){
            $data           = array();
            $data['title']  = "แก้ไขข้อมูล";
            $id             = $_GET['id'];
            $data['result'] = $this->model('setting')->prefixDetail($id);
            $data['status'] = "hide";
            if(isset($_GET['update'])){
                $data['status'] = "show";
            }
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $data = array();
                $data = $_POST;
                $update = $this->model('setting')->updatePrefix($id,$data);
                if($update){
                    redirect('setting/prefixEdit&id='.$id.'&update=success');
                }
            }
            $this->view('prefix/edit',$data);
        }
        public function prefixDel(){
            $id = $_GET['id'];
            $delete = $this->model('setting')->delPrefix($id);
            if($delete){
                redirect('setting/prefix');
            }
        }



        // เขตที่ตรวจ
        public function part(){
            $data = array();
            $data['title']  = "เขตที่ตรวจ";
            $data['lists']  = $this->model('setting')->partLists();
            $this->view('part/index',$data);
        }
        public function partAdd(){
            $data           = array();
            $data['title']  = "เพิ่มข้อมูล";
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $post = array();
                $post = $_POST;
                $insert = $this->model('setting')->insertPart($post);
                if($insert){
                    redirect('setting/part');
                }
            }
            $this->view('part/add',$data);
        }
        public function partEdit(){
            $data           = array();
            $data['title']  = "แก้ไขข้อมูล";
            $id             = $_GET['id'];
            $data['result'] = $this->model('setting')->partDetail($id);
            $data['status'] = "hide";
            if(isset($_GET['update'])){
                $data['status'] = "show";
            }
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $post = array();
                $post = $_POST;
                $update = $this->model('setting')->updatePart($id,$post);
                if($update){
                    redirect('setting/partEdit&id='.$id.'&update=success');
                }
            }
            $this->view('part/edit',$data);
        }
        public function partDel(){
            $id = $_GET['id'];
            $delete = $this->model('setting')->delPart($id);
            if($delete){
                redirect('setting/part');
            }
        }



        // จังหวัด
        public function provinces(){
            $data = array();
            $data['title']  = "จังหวัด";
            $data['lists']  = $this->model('setting')->provincesLists();
            $this->view('provinces/index',$data);
        }
        public function provincesAdd(){
            $data           = array();
            $data['title']  = "เพิ่มข้อมูล";
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $post = array();
                $post = $_POST;
                $insert = $this->model('setting')->insertProvinces($post);
                if($insert){
                    redirect('setting/provinces');
                }
            }
            $this->view('provinces/add',$data);
        }
        public function provincesEdit(){
            $data           = array();
            $data['title']  = "แก้ไขข้อมูล";
            $id             = $_GET['id'];
            $data['result'] = $this->model('setting')->provincesDetail($id);
            $data['status'] = "hide";
            if(isset($_GET['update'])){
                $data['status'] = "show";
            }
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $post = array();
                $post = $_POST;
                $update = $this->model('setting')->updateProvinces($id,$post);
                if($update){
                    redirect('setting/provincesEdit&id='.$id.'&update=success');
                }
            }
            $this->view('provinces/edit',$data);
        }
        public function provincesDel(){
            $id = $_GET['id'];
            $delete = $this->model('setting')->delProvinces($id);
            if($delete){
                redirect('setting/provinces');
            }
        }



        // ตำแหน่ง
        public function position(){
            $data = array();
            $data['title']  = "ตำแหน่ง";
            $data['lists']  = $this->model('setting')->positionLists();
            $this->view('position/index',$data);
        }
        public function positionAdd(){
            $data           = array();
            $data['title']  = "เพิ่มข้อมูล";
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $post = array();
                $post = $_POST;
                $insert = $this->model('setting')->insertPosition($post);
                if($insert){
                    redirect('setting/position');
                }
            }
            $this->view('position/add',$data);
        }
        public function positionEdit(){
            $data           = array();
            $data['title']  = "แก้ไขข้อมูล";
            $id             = $_GET['id'];
            $data['result'] = $this->model('setting')->positionDetail($id);
            $data['status'] = "hide";
            if(isset($_GET['update'])){
                $data['status'] = "show";
            }
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $post = array();
                $post = $_POST;
                $update = $this->model('setting')->updatePosition($id,$post);
                if($update){
                    redirect('setting/positionEdit&id='.$id.'&update=success');
                }
            }
            $this->view('position/edit',$data);
        }
        public function positionDel(){
            $id = $_GET['id'];
            $delete = $this->model('setting')->delPosition($id);
            if($delete){
                redirect('setting/position');
            }
        }



        // หน่วยงาน
        public function agency(){
            $data = array();
            $data['title']  = "หน่วยงาน";
            $data['lists']  = $this->model('setting')->agencyLists();
            $this->view('agency/index',$data);
        }
        public function agencyAdd(){
            $data           = array();
            $data['title']  = "เพิ่มข้อมูล";
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $post = array();
                $post = $_POST;
                $insert = $this->model('setting')->insertAgency($post);
                if($insert){
                    redirect('setting/agency');
                }
            }
            $this->view('agency/add',$data);
        }
        public function agencyEdit(){
            $data           = array();
            $data['title']  = "แก้ไขข้อมูล";
            $id             = $_GET['id'];
            $data['result'] = $this->model('setting')->agencyDetail($id);
            $data['status'] = "hide";
            if(isset($_GET['update'])){
                $data['status'] = "show";
            }
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $post = array();
                $post = $_POST;
                $update = $this->model('setting')->updateAgency($id,$post);
                if($update){
                    redirect('setting/agencyEdit&id='.$id.'&update=success');
                }
            }
            $this->view('agency/edit',$data);
        }
        public function agencyDel(){
            $id = $_GET['id'];
            $delete = $this->model('setting')->delAgency($id);
            if($delete){
                redirect('setting/agency');
            }
        }
	}
?>