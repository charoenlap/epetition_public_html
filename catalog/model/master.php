<?php 
	class MasterModel extends db {
		public function getEmailConfig(){
			$result = array();
			$result_query = $this->query("SELECT * FROM ep_settings WHERE `name` like 'email_%'");
			foreach($result_query->rows as $val){
				$result[$val['name']] = $val['val'];
			}
			return $result;
		}
		public function getMasterSetting($name=''){
            $result = '';
            $result = $this->getdata('settings',"name='".$this->escape($name)."'");
            if($result->num_rows){
                $result = $result->row['val'];
            }
            return $result;
        }
		 public function getBanners(){
            $query = $this->query("SELECT * FROM ep_setting_banner where del = '0' order by id desc"); 
            return $query->rows;
        }
        public function getHideData(){
        	$result = array();
            $query = $this->query("SELECT * FROM ep_setting_hide_data"); 
            foreach($query->rows as $val){
            	$result[$val['name_en']] = $val['required'];
            }
            return $result;
        }
		public function getContent(){
            $result = array();
            $query_contact = $this->getdata('setting_content',"name='contact'")->row;
            $result = $query_contact['value'];
            return $result;
        }
        public function getFooter(){
            $result = array();
            $query_footer = $this->getdata('setting_content',"name='footer'")->row;
            $result = $query_footer['value'];
            return $result;
        }
        public function getAgreement(){
            $result = array();
            $query_agreement = $this->getdata('setting_content',"name='agreement'")->row;
            $result = $query_agreement['value'];
            return $result;
        }
		public function getConfigDay(){
			$result = 2;
			$sql = "SELECT * FROM ep_config WHERE `name`='limit_mb'";
			$result_query = $this->query($sql);
			if($result_query->num_rows){
				$result = $result_query->row['val'];
			}
			return $result;
		}
		public function getTicketByID($id=0){
        	$result = array();
            $sql = "SELECT *,
                    `ep_status`.`status_class` as text_class,
                    `ep_status`.`status_text` as text_status,
                    `ep_response`.`id` as id  
                        FROM ep_response 
    	            LEFT JOIN ep_agency_minor ON ep_response.`id_angency_minor` = ep_agency_minor.`id` 
                    LEFT JOIN ep_status ON ep_response.`status` = ep_status.`id`
    	            WHERE AUT_USER_ID = '".(int)$id."'";
            $result_response = $this->query($sql); 
            foreach($result_response->rows as $key => $val){
	            $id_response = $val['id'];
	            $sql_agency = "SELECT *,ep_response_status.id AS id,ep_response_status.date_create AS date_create FROM ep_response_status 
	                LEFT JOIN ep_agency_minor ON ep_agency_minor.id = ep_response_status.id_agency_minor
	            WHERE id_response = ".(int)$id_response;

	            $result[] = array(
					'text_status'		=> $val['text_status'],
					'text_class'		=> $val['text_class'],
					'case_code'			=> $val['case_code'],
					'response_person'	=> $val['response_person'],
	            	'agency' 			=> $this->query($sql_agency)->rows
	            );
	        }
            return $result;
        }
		public function login($user='', $pass=''){
			$result = array();
			$pass = md5($pass);
			$sql = "SELECT * FROM AUT_USER 
			WHERE AUT_USERNAME = '".$this->escape($user)."' AND AUT_PASSWORD='".$this->escape($pass)."'
			AND id_agency = 5 
			AND id_agency_minor=12
			AND ACTIVE_STATUS = 1
			AND DELETE_FLAG = 0";
			$result = $this->query($sql);
			return $result;
		}
		public function getPrefix($data=array()){
			$result = array();
			$sql = "SELECT * FROM ep_prefix";
			$query = $this->query($sql);
			return $query->rows;
		}
		public function addResponse($data=array()){
			$day_end = 30;
			$sql_config_day = "SELECT * FROM ep_config WHERE `name` = 'day_end'";
			$query_config_day = $this->query($sql_config_day);
			if($query_config_day->num_rows){
				$day_end = $query_config_day->row['val'];
			}
			$dateadd=date('Y-m-d');
			$date_end = date('Y-m-d', strtotime($dateadd. ' + '.$day_end.' days'));

			$data['day_end']	= $day_end;
			$data['dateadd']	= date('Y-m-d H:i:s'); 
			$data['date_end']	= $date_end;
			$data['status']		= 2;
			$result_last_insert = $this->insert('response',$data);
			$case_code = ((date('y')+43).date('m')).str_pad($result_last_insert,4,"0", STR_PAD_LEFT);
			$sql_update = "UPDATE ep_response SET case_code = '".$case_code."' WHERE id=".$result_last_insert;
			$query_update = $this->query($sql_update);

			return $case_code;
		}
		public function getGeographies($data=array()){
			$result = array();
			$path_json = PATH_JSON.'getGeographies.json';
			if(!isset($data['db'])){
				$sql = "SELECT * FROM ep_address_geographies";
				$result = $this->query($sql)->rows;

				$fp = fopen($path_json, 'w');
				fwrite($fp, json_encode($result));
				fclose($fp);
			}else{
				$result = json_decode(file_get_contents($path_json), true);
			}
			return $result;
		}
		public function getProvinces($data=array()){
			$result = array();
			// $geography_id = (int)$data['geography_id'];
			// $path_json = PATH_JSON.'getProvinces_'.$geography_id.'.json';
			// if(!isset($data['db'])){
			// 	if($geography_id){
			// 		if(file_exists($path_json)){
			// 			$result = json_decode(file_get_contents($path_json), true);
			// 		}else{
						$sql = "SELECT * FROM PROVINCE";
						$result = $this->query($sql)->rows;

			// 			$fp = fopen($path_json, 'w');
			// 			fwrite($fp, json_encode($result));
			// 			fclose($fp);
			// 		}
			// 	}
			// }else{
			// 	$result = json_decode(file_get_contents($path_json), true);
			// }
			return $result;
		}
		public function getAmphures($data=array()){
			$result = array();
			$province_id = (int)$data['province_id'];
			// $path_json = PATH_JSON.'getAmphures_'.$province_id.'.json';
			// if(!isset($data['db'])){
				// if($province_id){
				// 	if(file_exists($path_json)){
				// 		$result = json_decode(file_get_contents($path_json), true);
				// 	}else{
						$sql = "SELECT * FROM AMPHUR WHERE PROVINCE_ID = '".(int)$province_id."'";
						$result = $this->query($sql)->rows;

						// $fp = fopen($path_json, 'w');
						// fwrite($fp, json_encode($result));
						// fclose($fp);
				// 	}
				// }
			// }else{
			// 	$result = json_decode(file_get_contents($path_json), true);
			// }
			return $result;
		}
		public function getTambon($data=array()){
			$result = array();
			$amphure_id = (int)$data['amphure_id'];
			// $path_json = PATH_JSON.'getDistricts_'.$amphure_id.'.json';
			// if(!isset($data['db'])){
			// 	if($amphure_id){
			// 		if(file_exists($path_json)){
			// 			$result = json_decode(file_get_contents($path_json), true);
			// 		}else{
						$sql = "SELECT * FROM TAMBON WHERE AMPHUR_ID = '".(int)$amphure_id."'";
						$result = $this->query($sql)->rows;

			// 			$fp = fopen($path_json, 'w');
			// 			fwrite($fp, json_encode($result));
			// 			fclose($fp);
			// 		}
			// 	}
			// }else{
			// 	$result = json_decode(file_get_contents($path_json), true);
			// }
			return $result;
		}
		// public function getCategory($data=array()){
		// 	$date = "2021-10-01";
		// 	$result = array();
		// 	$path_json = PATH_JSON.'/getCategory.json';
		// 	if(!isset($data['db'])){
		// 		$sql = "SELECT * FROM b_category WHERE `status`=0 AND sub_category = 0";
		// 		$category = $this->query($sql)->rows;

		// 		foreach($category as $val){
		// 			$sub = array();
		// 			$sql_sub = "SELECT * FROM b_category WHERE `status`=0 AND sub_category = '".$val['id']."'";
		// 			$category_sub = $this->query($sql_sub)->rows;

		// 			$type = array();
		// 			$sql_sub = "SELECT * FROM b_category_type 
		// 			LEFT JOIN b_type ON b_category_type.id_type = b_type.id 
		// 			LEFT JOIN (SELECT * FROM b_result WHERE `date` = '".$date."') result ON result.id_cate_type = b_category_type.id 
		// 			WHERE `status`=0 
		// 			AND id_category = '".$val['id']."'

		// 			ORDER BY b_category_type.`order` ASC";
		// 			$type = $this->query($sql_sub)->rows;

		// 			$result[] = array(
		// 				'id' 	=> $val['id'],
		// 				'name' 	=> $val['name'],
		// 				'sub'	=> $category_sub,
		// 				'type'	=> $type
		// 			);
		// 		}

		// 		$fp = fopen($path_json, 'w');
		// 		fwrite($fp, json_encode($result));
		// 		fclose($fp);
		// 	}else{
		// 		$result = json_decode(file_get_contents($path_json), true);
		// 	}
		// 	return $result;
		// }
		
	}
?>