<?php
    class TicketModel extends db {
        public function getTicket($data = array()){
        	$result = array();
        	$case_code = (isset($data['case_code'])?$this->escape($data['case_code']):'');
        	// echo $case_code;
        	if($case_code){
	            $sql = "SELECT * FROM ep_response 
	            LEFT JOIN ep_agency_minor ON ep_response.id_angency_minor = ep_agency_minor.id 
	            WHERE case_code = '".$case_code."'";
	            $result = $this->query($sql)->row;
	        }
            return $result;
        }
    }
?>