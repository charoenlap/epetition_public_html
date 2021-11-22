<?php 
	class ReportController extends Controller {
	    public function index() {
	    	$this->view('report/home');
	    }
		public function department(){
			$this->view('report/department');
		}
		public function way(){
			$this->view('report/way');
		}
		public function zone(){
			$this->view('report/zone');
		}
		public function mission(){
			$this->view('report/mission');
		}
		public function land(){
			$this->view('report/land');
		}
		public function problem(){
			$this->view('report/problem');
		}
		public function type(){
			$this->view('report/type');
		}
		public function progress(){
			$this->view('report/progress');
		}
		public function topic(){
			$this->view('report/topic');
		}
		public function status(){
			$this->view('report/status');
		}
		public function  satisfaction(){
			$this->view('report/satisfaction');
		}
	}
?>