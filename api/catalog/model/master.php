<?php 
	class MasterModel extends db {
		public function getTicket($data = array()){
        	$result = array();
        	$case_code = (isset($data['case_code'])?$this->escape($data['case_code']):'');
        	// echo $case_code;
        	if($case_code){
	            $sql = "SELECT *,
                        `ep_status`.`status_class` as text_class,
                        `ep_status`.`status_text` as text_status,
                        `ep_response`.`id` as id  
                            FROM ep_response 
        	            LEFT JOIN ep_agency_minor ON ep_response.`id_angency_minor` = ep_agency_minor.`id` 
                        LEFT JOIN ep_status ON ep_response.`status` = ep_status.`id`
        	            WHERE case_code = '".$case_code."'";
	            $result = $this->query($sql)->row; 
                $id = $result['id'];
                $sql_agency = "SELECT *,ep_response_status.id AS id,ep_response_status.date_create AS date_create FROM ep_response_status 
                    LEFT JOIN ep_agency_minor ON ep_agency_minor.id = ep_response_status.id_agency_minor
                WHERE id_response = ".(int)$id;
                $result['agency'] = $this->query($sql_agency)->rows;
	        }
            return $result;
        }
        public function getTopicSub(){
            $result = array();
            $sql = "SELECT * FROM ep_topic WHERE topic_title !='' order by sort ASC";
            $result_topic = $this->query($sql);
            if($result_topic->num_rows){
                foreach($result_topic->rows as $val){
                    $sql_sub = "SELECT * FROM ep_topic_sub WHERE topic_id = ".(int)$val['id'];
                    $result_sub = $this->query($sql_sub);
                    $result[] = array(
                        'rows'  => $val,
                        'sub'       => $result_sub->rows
                    );
                }

            }
            return $result;
        }
	}