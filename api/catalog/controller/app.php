<?php 
	class AppController extends Controller {
		public function getTicketByID(){
			$result = $result = array(
				'code'		=>200,
				'status' 	=> 'failed',
				'desc' 		=> ''
			);
			if(method_post()){
				$token = post('token');
				$id = decrypt($token);
				$dataResult = $this->model('master')->getTicketByID($id);
				$result = array(
					'code'		=> 200,
					'status' 	=> 'success',
					'desc' 		=> $dataResult
				);
			}
			
			$this->json($result);
		}
		public function login(){
			$result = $result = array(
				'code'		=>200,
				'status' 	=> 'failed',
				'desc' 		=> ''
			);
			if(method_post()){
				$user = post('user');
				$pass = post('pass');
				$dataResult = $this->model('master')->login($user,$pass);
				if($dataResult->num_rows){
					$data = array(
						'token' => encrypt($dataResult->row['AUT_USER_ID']),
						'FIRSTNAME' => $dataResult->row['FIRSTNAME'],
						'LASTNAME'	=> $dataResult->row['LASTNAME']
					);

					$result = array(
						'code'		=> 200,
						'status' 	=> 'success',
						'desc' 		=> $data
					);
				}
			}
			
			$this->json($result);
		}
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
					$AUT_USER_ID 	= post('AUT_USER_ID');
					if($AUT_USER_ID){
						$post['AUT_USER_ID'] = (int)decrypt($AUT_USER_ID);
					}else{
						unset($post['AUT_USER_ID']);
					}
					$file = post('file');
					if(!empty($file)){
						$arr = explode(';base64',$file);
						$type = explode('/',$arr[0]);
						$post['file'] = time().'_'.rand(100,999).'.'.$type[1];
						if(!empty($type[1])){
							convert_base64($file,'../uploads/files/'.$post['file']);
						}else{
							$post['file'] = 'File mistake';
						}
					}else{
						$post['file'] = '';
					}
					$post['addBy'] = 1;
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
	function convert_base64($base64_string, $output_file) {
	    $ifp = fopen( $output_file, 'wb' ); 

	    // split the string on commas
	    // $data[ 0 ] == "data:image/png;base64"
	    // $data[ 1 ] == <actual base64 string>
	    $data = explode( ',', $base64_string );
	    fwrite( $ifp, base64_decode( $data[ 1 ] ) );
	    fclose( $ifp ); 
	    return $output_file; 
	}
?>