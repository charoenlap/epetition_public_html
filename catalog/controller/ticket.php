<?php 
	class TicketController extends Controller {
	    public function index() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
 	    	$this->view('ticket',$data); 
	    }
	}
?>