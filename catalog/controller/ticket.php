<?php 
	class TicketController extends Controller {
	    public function index() {
	    	$data = array();
	    	$data['production'] = true;
	    	if($_SERVER['HTTP_HOST']=='localhost'){
	    		$data['production'] = false;
	    	}
	    	$data['title'] = "";
	    	$data['descreption'] = "";
 	    	$this->view('ticket',$data); 
	    }
		public function ticketStatus(){
			$data = array();
			if(method_post()){
				$data['production'] = true;
		    	if($_SERVER['HTTP_HOST']=='localhost'){
		    		$data['production'] = false;
		    	}
		    	if($_SERVER['HTTP_HOST']!='localhost'){
		    		if(!post('g-recaptcha-response')){
		    			redirect('ticket&result=fail&rdetail=g-recaptcha-response');
		    		}
		    	}

				$case_code 	= post('case_code');
				$rdoType 	= post('rdoType');
				$phone 		= post('phone');

				if($rdoType=="ticket"){
					$dataSelect = array(
						'case_code' => $case_code,
						'phone'	=> $phone
					);
					$data['ticket'] = $this->model('ticket')->getTicket($dataSelect);
				}else{
					$dataSelect = array(
						'idno' => $case_code,
						'phone'	=> $phone
					);
					$data['ticket'] = $this->model('ticket')->getTicketById($dataSelect);
				}
				$data['case_code'] = $case_code;
				$this->view('ticketStatus',$data);
			}
			
		}
	}
?>