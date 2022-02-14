<?php 
	class ProgressController extends Controller {
	    public function index() {
	    	$data = array();
	    	$data['listProgress'] = $this->model('progress')->getLists();
	    	$this->view('progress/home',$data);
	    }
		public function detail() {
			$this->view('progress/detail');
		}
	}
?>