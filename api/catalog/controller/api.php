<?php 
	class ApiController extends Controller {
		public function getToken(){
			$result = $result = array(
				'code'		=>200,
				'status' 	=> 'failed',
				'desc' 		=> ''
			);
			if(method_post()){
				$user 		= post('user');
				$password 	= post('password');
				$dataResult = $this->model('api')->login($user,$password);
				if($dataResult){
					$result = array(
						'code'		=> 200,
						'status' 	=> 'success',
						'token' 	=> encrypt($dataResult),
						'desc' 		=> ''
					);
				}else{
					$result = array(
						'code'		=> 200,
						'status' 	=> 'failed',
						'desc' 		=> ''
					);
				}
			}
			$this->json($result);
		}
		public function getCases(){
			$result = $result = array(
				'code'		=>200,
				'status' 	=> 'failed',
				'desc' 		=> ''
			);
			if(method_post()){
				$token = decrypt(post('token'));
				$limit = post('limit');
				$status = post('status');
				$dataResult = $this->model('api')->getCases($token,$limit,$status);
				$result = array(
					'code'		=> 200,
					'status' 	=> 'success',
					'desc' 		=> $dataResult
				);
			}
			$this->json($result);
		}
		public function getCase(){
			$result = $result = array(
				'code'		=>200,
				'status' 	=> 'failed',
				'desc' 		=> ''
			);
			if(method_post()){
				$token 		= decrypt(post('token'));
				$case_code 	= post('case_code');
				$dataResult = $this->model('api')->getCase($token,$case_code);
				$result = array(
					'code'		=> 200,
					'status' 	=> 'success',
					'desc' 		=> $dataResult
				);
			}
			$this->json($result);
		}
		public function getOperation(){
			$result = $result = array(
				'code'		=>200,
				'status' 	=> 'failed',
				'desc' 		=> ''
			);
			if(method_post()){
				$token 		= decrypt(post('token'));
				$case_code 	= post('case_code');
				$dataResult = $this->model('api')->getOperation($token,$case_code);
				$result = array(
					'code'		=> 200,
					'status' 	=> 'success',
					'desc' 		=> $dataResult
				);
			}
			$this->json($result);
		}
		public function sendCase(){
			$result = $result = array(
				'code'		=>200,
				'status' 	=> 'failed',
				'desc' 		=> ''
			);
			if(method_post()){
				$token 		= decrypt(post('token'));
				$case_code 	= post('case_code');
				$comment 	= post('comment');
				$dataResult = $this->model('api')->sendCase($token,$case_code,$comment);
				$result = array(
					'code'		=> 200,
					'status' 	=> $dataResult['result'],
					'desc' 		=> $dataResult['desc']
				);
			}
			$this->json($result);
		}
	}
?>