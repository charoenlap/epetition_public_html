<?php 
	class ProgressController extends Controller {
	    public function index() {
	    	$data = array();
	    	$data['year'] = (get('year')?get('year'):(date('Y')+543));
	    	$data_select = array(
	    		'year' => ($data['year']-543)
	    	);
	    	$data['listProgress'] = $this->model('progress')->getLists($data_select);
	    	$this->view('progress/home',$data);
	    }
		public function detail() {
			$data = array();
			$data['year'] 	= (int)get('year');
			$data['month'] 	= (int)get('month');
			$data_select = array(
	    		'year' => ($data['year']-543),
	    		'month' => $data['month']
	    	);
			$data['listProgress'] = $this->model('progress')->getListsDetail($data_select);
			$this->view('progress/detail',$data);
		}
	}
?>