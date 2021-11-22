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
	}
?>