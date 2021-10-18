<?php 
	class AppealController extends Controller {
	    public function index() {
	    	$this->view('appeal/home');
	    }
	    public function add() {
	    	$this->view('appeal/add');
	    }
	    public function edit() {
	    	$this->view('appeal/edit');
	    }
	    public function detail() {
	    	$this->view('appeal/detail');
	    }
	    public function status() {
	    	$this->view('appeal/status');
	    }
	}
?>