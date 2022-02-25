<?php 
    class AppealModel extends db {
        public function getlists($data = array()){
        	$sql = "SELECT * FROM ep_appeal";
         	$query  = $this->query($sql);
            return $query;
        }
        public function getResponse($data=array()){
        	$result = array();
        	$case_code = (isset($data['case_code'])?$data['case_code']:'');
        	if(!empty($case_code)){
	        	$sql = "SELECT * FROM ep_response WHERE case_code = '".$case_code."' limit 0,1";
	         	$query  = $this->query($sql);
	         	if($query->num_rows){
	         		$result = $query->row;
	         	}
	         }
            return $result;
        }
    }
?>