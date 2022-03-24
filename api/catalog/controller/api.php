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
				// $dataResult = $this->model('master')->getTicketByID($id);
				$result = array(
					'code'		=> 200,
					'status' 	=> 'success',
					'desc' 		=> $dataResult
				);
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
				$token = post('token');
				$limit = post('limit');
				$status = post('status');
				// $dataResult = $this->model('master')->getTicketByID($id);
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
				$token 		= post('token');
				$case_code 	= post('case_code');
				// $dataResult = $this->model('master')->getTicketByID($id);
				$result = array(
					'code'		=> 200,
					'status' 	=> 'success',
					'desc' 		=> $dataResult,
					'date_create' => ''
				);
			}
			$this->json($result);
		}
	}
?>