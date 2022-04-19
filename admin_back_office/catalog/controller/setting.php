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
                $data['banners']  = $modelSetting->getBanners();
                $data['limitFile']  = $modelSetting->getMasterSetting('limitFile');
                $data['m']          = $modelSetting->getMasterSetting('m');
                $data['h']          = $modelSetting->getMasterSetting('h');
                $data['d']          = $modelSetting->getMasterSetting('d');
                $data['month']      = $modelSetting->getMasterSetting('month');
                $data['week']       = $modelSetting->getMasterSetting('week');
                $data['m_code']     = $modelSetting->getMasterSetting('m_code');
                $data['h_code']     = $modelSetting->getMasterSetting('h_code');
                $data['d_code']     = $modelSetting->getMasterSetting('d_code');
                $data['month_code'] = $modelSetting->getMasterSetting('month_code');
                $data['week_code']  = $modelSetting->getMasterSetting('week_code');
                
                $data['mail_people']  = $modelSetting->getMasterSetting('mail_people');
                $data['email_host']  = $modelSetting->getMasterSetting('email_host');
                $data['email_port']  = $modelSetting->getMasterSetting('email_port');
                $data['email_user']  = $modelSetting->getMasterSetting('email_user');
                $data['email_pass']  = $modelSetting->getMasterSetting('email_pass');
                $data['topic']      = $modelSetting->getTopic();
                $data['listField']      = $modelSetting->getlistField();

                // $resultTemplateEmail = $this->model('email')->agency();
                // if($resultTemplateEmail){
                //     $templateEmail  = $resultTemplateEmail['template_email'];
                //     $subject        = $resultTemplateEmail['subject'];
                // }
                $data['mail_agency']        = $this->model('email')->agency()['template_email'];
                $data['mail_agency_sub']    = $this->model('email')->agencySub()['template_email'];

                // DOCUMENT_ROOT.'log/sql/'
                $data['list_files'] = scandir(DOCUMENT_ROOT.'log/sql/');
            }
	    	$this->view('setting/home',$data);
	    }
        public function submitMaster(){
            $return = array();
            if(method_post()){
                $post   = array(
                    'name'  => 'limitFile',
                    'val' => post('limitFile')
                );
                $update = $this->model('setting')->updategetMasterSetting($post);
                $return = array(
                    'status' => 'success'
                );
                $this->json($return);
            }
        }
        public function btnUpdateGit(){
            $return = array();
            if(method_post()){
                $result = exec('git pull');

                // $post   = array(
                //     'name'  => 'limitFile',
                //     'val' => post('limitFile')
                // );
                // $update = $this->model('setting')->updategetMasterSetting($post);
                if($result=="Already up to date."){
                    $result = "โปรแกรมอยู่ในการอัพเดทปัจจุบันแล้ว ".date('Y-m-d H:i:s');
                }
                $return = array(
                    'status' => 'success',
                    'desc'  => $result
                );
                $this->json($return);
            }
        }
        public function getLog(){
            // $return = array();
            $result = '';
            $show = '';
            if(method_post()){
                $val = post('val');
                if($val=="login"){
                    $log = $this->model('setting')->getLog();
                    foreach($log as $val){
                        $result .= $val['CREATE_TIMESTAMP'].' '.$val['LOG_DESCRIPTION'].PHP_EOL;
                    }
                }else{
                    $path = '/var/log/'.$val;
                    $myfile = fopen($path, "r");
                    $result = fread($myfile,filesize($path));
                    fclose($myfile);
                }
                // $post   = array(
                //     'name'  => 'limitFile',
                //     'val' => post('limitFile')
                // );
                // $update = $this->model('setting')->updategetMasterSetting($post);
                
                $return = array(
                    'status' => 'success',
                    'desc'  => $result,
                    'show'  => $show
                );
                $this->json($return);
            }
        }
        public function submitContent(){
            $return = array();
            if(method_post()){
                $post   = array(
                    'contact' => post('contact'),
                    'footer' => post('footer'),
                    'agreement' => post('agreement'),
                );

                $update = $this->model('setting')->updateSettingContent($post);
                $return = array(
                    'status' => 'success'
                );
                $this->json($return);
            }
        }
        public function submitBackup(){
            $return = array();
            $post = array();
            if(method_post()){
                $post[]   = array(
                    'name'  => 'm',
                    'val' => post('m')
                );
                $post[]   = array(
                    'name'  => 'h',
                    'val' => post('h')
                );
                $post[]   = array(
                    'name'  => 'd',
                    'val' => post('d')
                );
                $post[]   = array(
                    'name'  => 'month',
                    'val' => post('month')
                );
                $post[]   = array(
                    'name'  => 'week',
                    'val' => post('week')
                );
                $post[]   = array(
                    'name'  => 'm_code',
                    'val' => post('m_code')
                );
                $post[]   = array(
                    'name'  => 'h_code',
                    'val' => post('h_code')
                );
                $post[]   = array(
                    'name'  => 'd_code',
                    'val' => post('d_code')
                );
                $post[]   = array(
                    'name'  => 'month_code',
                    'val' => post('month_code')
                );
                $post[]   = array(
                    'name'  => 'week_code',
                    'val' => post('week_code')
                );
                // var_dump($post);
                $update = $this->model('setting')->updategetMasterSettings($post);
                $return = array(
                    'status' => 'success'
                );
                $this->json($return);
            }
        }
        public function submitConfigDays(){
            $return = array();
            $post = array();
            if(method_post()){
                $post[]   = array(
                    'name'  => 'master_process',
                    'val' => post('master_process')
                );
                $post[]   = array(
                    'name'  => 'master_end',
                    'val' => post('master_end')
                );
                // var_dump($post);
                $update = $this->model('setting')->updategetMasterSettings($post);
                $return = array(
                    'status' => 'success'
                );
                $this->json($return);
            }
        }
        public function submitConfigEmail(){
            $return = array();
            $post = array();
            if(method_post()){
                $template_email[]   = array(
                    'val' => post('mail_agency'),
                    'type'  => 1
                );
                $template_email[]   = array(
                    'val' => post('mail_agency_sub'),
                    'type'  => 0
                );

                $post[]   = array(
                    'name'  => 'mail_people',
                    'val' => post('mail_people')
                );
                $post[]   = array(
                    'name'  => 'email_host',
                    'val' => post('email_host')
                );
                $post[]   = array(
                    'name'  => 'email_port',
                    'val' => post('email_port')
                );
                $post[]   = array(
                    'name'  => 'email_user',
                    'val' => post('email_user')
                );
                $post[]   = array(
                    'name'  => 'email_pass',
                    'val' => post('email_pass')
                );
                // var_dump($post);
                $update = $this->model('setting')->updategetMasterSettings($post);
                $update = $this->model('setting')->updategetEmailMasterSettings($template_email);
                $return = array(
                    'status' => 'success'
                );
                $this->json($return);
            }
        }
        public function delBanner(){
            $return = array();
            if(method_post()){
                $id = post('id');
                $result = $this->model('setting')->deleteBanner($id);
                $return = array(
                    'status' => 'success'
                );
                $this->json($return);
            }
        }
        public function getSubTopic(){
            $return = array();
            if(method_post()){
                $id = post('id');
                $result = $this->model('setting')->getSubTopic($id);
                $return = array(
                    'status'    => 'success',
                    'detail'    => $result
                );
                $this->json($return);
            }
        }
        public function changeRequire(){
            $return = array();
            if(method_post()){
                $id = post('id');
                $val = post('val');
                $result = $this->model('setting')->changeRequire($id,$val);
                $return = array(
                    'status'    => 'success',
                    'detail'    => $result
                );
                $this->json($return);
            }
        }
        public function getHideTopicSub(){
            $return = array();
            if(method_post()){
                $id = post('id');
                $result = $this->model('setting')->getHideTopicSub($id);
                $return = array(
                    'status'    => 'success',
                    'desc'    => $result
                );
                $this->json($return);
            }
        }
        public function backupDB(){

            $tables = get('tables');
            header('Pragma: public');
            header('Expires: 0');
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . DB_DB . '_' . date('Y-m-d_H-i-s', time()) . '_backup.sql"');
            header('Content-Transfer-Encoding: binary');

            $output = '';

            foreach ($tables as $table) {

                    $output .= 'TRUNCATE TABLE `' . $table . '`;' . "\n\n";

                    $query = $this->model('master')->querydb("SELECT * FROM `" . $table . "`");

                    foreach ($query->rows as $result) {
                        $fields = '';

                        foreach (array_keys($result) as $value) {
                            $fields .= '`' . $value . '`, ';
                        }

                        $values = '';

                        foreach (array_values($result) as $value) {
                            $value = str_replace(array("\x00", "\x0a", "\x0d", "\x1a"), array('\0', '\n', '\r', '\Z'), $value);
                            $value = str_replace(array("\n", "\r", "\t"), array('\n', '\r', '\t'), $value);
                            $value = str_replace('\\', '\\\\',  $value);
                            $value = str_replace('\'', '\\\'',  $value);
                            $value = str_replace('\\\n', '\n',  $value);
                            $value = str_replace('\\\r', '\r',  $value);
                            $value = str_replace('\\\t', '\t',  $value);

                            $values .= '\'' . $value . '\', ';
                        }

                        $output .= 'INSERT INTO `' . $table . '` (' . preg_replace('/, $/', '', $fields) . ') VALUES (' . preg_replace('/, $/', '', $values) . ');' . "\n";
                    }

                    $output .= "\n\n";
                
            }
            echo $output;

            $file = fopen(DOCUMENT_ROOT.'log/sql/'.date('Y-m-d_H-i-s').".sql","w");
            echo fwrite($file,$output);
            fclose($file);
        }
        public function changeHide(){
            $return = array();
            if(method_post()){
                $id             = post('id');
                $val            = post('val');
                $id_topic       = post('id_topic');
                $id_topic_sub   = post('id_topic_sub');

                $result         = $this->model('setting')->changeHide($id,$val,$id_topic,$id_topic_sub);
                $return = array(
                    'status'    => 'success',
                    'desc'    => $result
                );
                $this->json($return);
            }
        }
        public function getSubTopicConfig(){
            $return = array();
            if(method_post()){
                $id = post('id');
                $result = $this->model('setting')->getSubTopicConfig($id);
                $return = array(
                    'status'    => 'success',
                    'days_process'    => $result['days_process'],
                    'days_end'    => $result['days_end']
                );
                $this->json($return);
            }
        }
        public function setSubTopicConfigDaysProcess(){
            $return = array();
            if(method_post()){
                $topic_sub = post('topic_sub');
                $val = post('val');
                $result = $this->model('setting')->setSubTopicConfigDaysProcess($topic_sub,$val);
                $return = array(
                    'status'    => 'success'
                );
                $this->json($return);
            }
        }
        public function setSubTopicConfigDaysEnd(){
            $return = array();
            if(method_post()){
                $topic_sub = post('topic_sub');
                $val = post('val');
                $result = $this->model('setting')->setSubTopicConfigDaysEnd($topic_sub,$val);
                $return = array(
                    'status'    => 'success'
                );
                $this->json($return);
            }
        }
        public function submitBanner(){
            $return = array();
            if(method_post()){
                $data_select  = array();
                $countfiles = count($_FILES['banner']['name']);
                for($i=0;$i<$countfiles;$i++){
                    $filename = time()."_".$_FILES['banner']['name'][$i];
                    $file = $_FILES['banner']['tmp_name'][$i];
                    $data_select = array(
                        'filename' => $filename,
                        'file' => '../uploads/banner/'.$filename,
                        'date_create' => date('Y-m-d H:i:s')
                    );
                    move_uploaded_file($file,'../uploads/banner/'.$filename);
                }
                $update = $this->model('setting')->updateSettingBanner($data_select);
                $return = array(
                    'status' => 'success'
                );
                $this->json($return);
            }
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
        public function recoveryFile(){
            $data = array();
            if(method_post()){
                if(post('file')){
                    $data['result'] = 'success';
                }else{
                    $data['result'] = 'failed';
                }
            }
            $this->json($data);
        }
	}
?>