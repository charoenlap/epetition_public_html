<?php
    class TicketModel extends db {
        public function getTicket($data = array()){
        	$result = array();
        	$case_code = (isset($data['case_code'])?$this->escape($data['case_code']):'');
            $phone = (isset($data['phone'])?$this->escape($data['phone']):'');
        	// echo $case_code;
        	if($case_code && $phone){
	            $sql = "SELECT *,
                        `ep_status`.`status_class` as text_class,
                        `ep_status`.`status_text` as text_status,
                        `ep_response`.`id` as id  
                            FROM ep_response 
        	            LEFT JOIN ep_agency_minor ON ep_response.`id_angency_minor` = ep_agency_minor.`id` 
                        LEFT JOIN ep_status ON ep_response.`status` = ep_status.`id`
        	            WHERE case_code = '".$this->escape($case_code)."'
                        AND phone = '".$this->escape($phone)."'";
	            $result_case = $this->query($sql)->rows; 
                foreach($result_case as $val){
                    $id = $val['id'];
                    $sql_agency = "SELECT *,ep_response_status.id AS id,ep_response_status.date_create AS date_create FROM ep_response_status 
                        LEFT JOIN ep_agency_minor ON ep_agency_minor.id = ep_response_status.id_agency_minor
                    WHERE id_response = ".(int)$id;
                    $result[] = array(
                        'detail'    => $val,
                        'agency'    => $this->query($sql_agency)->rows
                    );
                }
	        }
            return $result;
        }
        public function getTicketById($data = array()){
            $result = array();
            $idno = (isset($data['idno'])?$this->escape($data['idno']):'');
            $phone = (isset($data['phone'])?$this->escape($data['phone']):'');
            if($idno && $phone){
                $sql = "SELECT *,
                        `ep_status`.`status_class` as text_class,
                        `ep_status`.`status_text` as text_status,
                        `ep_response`.`id` as id  
                            FROM ep_response 
                        LEFT JOIN ep_agency_minor ON ep_response.`id_angency_minor` = ep_agency_minor.`id` 
                        LEFT JOIN ep_status ON ep_response.`status` = ep_status.`id`
                        WHERE id_card = '".$this->escape($idno)."' 
                        AND phone = '".$this->escape($phone)."'";
                $result_user = $this->query($sql)->rows; 
                foreach($result_user as $val){
                    $id = $val['id'];
                    $sql_agency = "SELECT *,ep_response_status.id AS id,ep_response_status.date_create AS date_create FROM ep_response_status 
                        LEFT JOIN ep_agency_minor ON ep_agency_minor.id = ep_response_status.id_agency_minor
                    WHERE id_response = ".(int)$id;
                    $result[] = array(
                        'detail'    => $val,
                        'agency'    => $this->query($sql_agency)->rows
                    );
                }
            }
            return $result;
        }
    }
?>