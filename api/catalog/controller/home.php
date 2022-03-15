<?php 
	class HomeController extends Controller {
		public function getToken(){
			$result = array();
			$result = array(
				'code'		=>200,
				'status' 	=> 'failed',
				'desc' 		=> ''
			);
			$this->json($result);
		}
		public function getCases(){
			$result = array();
			$result = array(
				'code'		=>200,
				'status' 	=> 'failed',
				'desc' 		=> ''
			);
			$this->json($result);
		}
		public function getCase(){
			$result = array();
			$result = array(
				'code'		=>200,
				'status' 	=> 'failed',
				'desc' 		=> ''
			);
			$this->json($result);
		}
		public function getOperation(){
			$result = array();
			$result = array(
				'code'		=>200,
				'status' 	=> 'failed',
				'desc' 		=> ''
			);
			$this->json($result);
		}
		public function sendCase(){
			$result = array();
			$result = array(
				'code'		=>200,
				'status' 	=> 'failed',
				'desc' 		=> ''
			);
			$this->json($result);
		}
	}
?>