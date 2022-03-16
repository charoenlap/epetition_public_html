<?php 
	class AppController extends Controller {
		public function findTicket(){
			$result = $result = array(
				'code'		=>200,
				'status' 	=> 'failed',
				'desc' 		=> ''
			);
			if(method_post()){
				$case_code = post('case_code');
				$dataSelect = array(
					'case_code' => $case_code
				);
				$data['ticket'] = $this->model('master')->getTicket($dataSelect);
				$data['case_code'] = $case_code;
				$result = array(
					'code'		=> 200,
					'status' 	=> 'success',
					'desc' 		=> $data
				);
			}
			
			$this->json($result);
		}
		public function addResponse(){
			$result = $result = array(
				'code'		=>200,
				'status' 	=> 'failed',
				'desc' 		=> 'topic id empty'
			);
			if(method_post()){
				$post 				= $_POST;
				if(isset($post['topic_id'])){
					$post['topic_id'] 	= post('topic_id');
					// unset($post['file-upload-field']);
					// if(isset($_FILES['file-upload-field'])){
					// 	$upload_name = time().$_FILES['file-upload-field']['name'];
					// 	upload($_FILES['file-upload-field'],'uploads/files/',$upload_name);
					// 	$post['file'] = $upload_name;
					// }
					// exit();
					$add = $this->model('master')->addResponse($post);

					$result = array(
						'code'		=> 200,
						'status' 	=> 'success',
						'desc' 		=> $add
					);
				} 
			}
			
			$this->json($result);
		}
		public function getTopicSub(){
			$data = array();
			$data['topic'] = $this->model('master')->getTopicSub();
			$result = array(
				'code'		=> 200,
				'status' 	=> 'success',
				'desc' 		=> $data
			);
			$this->json($result);
		}
		public function provinces() {
	    	$master = $this->model('master');
			$province = $master->getProvinces();
 	    	$this->json($province); 
	    }
	    public function amphures() {
	    	$data = array(
				'province_id' => get('idprovinces')
			);
			$master = $this->model('master');
			$amphures = $master->getAmphures($data);
 	    	$this->json($amphures); 
	    }
	    public function tambons() {
	    	$data = array(
				'amphure_id' => get('idamphures')
			);
			$master = $this->model('master');
			$tambon = $master->getTambon($data);
 	    	$this->json($tambon); 
	    }
	    public function getPrefix(){
	    	$data = array();
			$master = $this->model('master');
			$data = $master->getPrefix($data);
 	    	$this->json($data); 
	    }
	}
?>