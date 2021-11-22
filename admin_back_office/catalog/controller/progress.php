<?php 
	class ProgressController extends Controller {
	    public function index() {
	    	$this->view('progress/home');
	    }
		public function detail() {
			$this->view('progress/detail');
		}
	}
?>