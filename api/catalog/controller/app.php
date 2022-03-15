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
	}
?>