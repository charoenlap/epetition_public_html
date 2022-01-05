<?php 
	class SettingController extends Controller {
	    public function index() {
			$data['title'] 	= "ตั้งค่าระบบ";
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