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
				$case_code 	= post('case_code');
				$rdoType 	= post('rdoType');
				if($rdoType=="ticket"){
					$dataSelect = array(
						'case_code' => $case_code
					);
					$data['ticket'] = $this->model('ticket')->getTicket($dataSelect);
				}else{
					$dataSelect = array(
						'idno' => $case_code
					);
					$data['ticket'] = $this->model('ticket')->getTicketById($dataSelect);
				}
				$data['case_code'] = $case_code;
				$this->view('ticketStatus',$data);
			}
			
		}
	}
?>