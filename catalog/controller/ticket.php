<?php 
	class TicketController extends Controller {
	    public function index() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
 	    	$this->view('ticket',$data); 
	    }
		public function ticketStatus(){
			if(method_post()){
				$case_code = post('case_code');
				$dataSelect = array(
					'case_code' => $case_code
				);
				$data['ticket'] = $this->model('ticket')->getTicket($dataSelect);
				$data['case_code'] = $case_code;
				$this->view('ticketStatus',$data);
			}
			
		}
	}
?>