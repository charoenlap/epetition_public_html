<?php 
	class MasterModel extends db {
		public function addNoti($id_user=0,$id=0){
			$result = array();
			$sql = "SELECT * FROM ep_notification WHERE id_user = '".$id_user."' AND id_response = '".$id."'";
			$result_noti = $this->query($sql);
			if($result_noti->num_rows==0){
				$this->insert('notification',array('id_response'=>$id,'id_user'=>$id_user));
			}
			return $result;
		}
		public function insertLog($data = array()){
			$this->insert('LOG_HISTORY',$data,false);
		}
		public function querydb($sql=''){
			$result = new \stdClass;
			$result_query = $this->query($sql);
			$result->rows = $result_query->rows;
			return $result;
		}
		public function getTopic($id){
			$sql = "SELECT * FROM ep_topic_sub 
					LEFT JOIN ep_topic ON ep_topic_sub.topic_id = ep_topic.id 
					WHERE ep_topic_sub.id = '".(int)$id."'";
			$result = $this->query($sql);
			return $result->row;
		}
		public function getHideTake($data = array()){
			$result = array();
			$topic_id = (isset($data['topic_id'])?$data['topic_id']:'');
			$sub_topic_id = (isset($data['sub_topic_id'])?$data['sub_topic_id']:'');

			$sql_get = "SELECT * FROM ep_setting_hide_take  
			LEFT JOIN ep_setting_hide_data ON ep_setting_hide_take.id_hide_data = ep_setting_hide_data.id
			WHERE id_topic = '".$topic_id."' AND id_sub_topic = '".$sub_topic_id."'";
			$result_get = $this->query($sql_get);
			foreach($result_get->rows as $val){
				$result[$val['name_en']] = $val['status'];
			}
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
			$data['dateadd']	= $dateadd; 
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
			$geography_id = (int)$data['geography_id'];
			$path_json = PATH_JSON.'getProvinces_'.$geography_id.'.json';
			if(!isset($data['db'])){
				if($geography_id){
					if(file_exists($path_json)){
						$result = json_decode(file_get_contents($path_json), true);
					}else{
						$sql = "SELECT * FROM ep_address_provinces WHERE geography_id = '".$geography_id."'";
						$result = $this->query($sql)->rows;

						$fp = fopen($path_json, 'w');
						fwrite($fp, json_encode($result));
						fclose($fp);
					}
				}
			}else{
				$result = json_decode(file_get_contents($path_json), true);
			}
			return $result;
		}
		public function getAmphures($data=array()){
			$result = array();
			$province_id = (int)$data['province_id'];
			$path_json = PATH_JSON.'getAmphures_'.$province_id.'.json';
			if(!isset($data['db'])){
				if($province_id){
					if(file_exists($path_json)){
						$result = json_decode(file_get_contents($path_json), true);
					}else{
						$sql = "SELECT * FROM ep_address_amphures WHERE province_id = '".$province_id."'";
						$result = $this->query($sql)->rows;

						$fp = fopen($path_json, 'w');
						fwrite($fp, json_encode($result));
						fclose($fp);
					}
				}
			}else{
				$result = json_decode(file_get_contents($path_json), true);
			}
			return $result;
		}
		public function getDistricts($data=array()){
			$result = array();
			$amphure_id = (int)$data['amphure_id'];
			$path_json = PATH_JSON.'getDistricts_'.$amphure_id.'.json';
			if(!isset($data['db'])){
				if($amphure_id){
					if(file_exists($path_json)){
						$result = json_decode(file_get_contents($path_json), true);
					}else{
						$sql = "SELECT * FROM ep_address_districts WHERE amphure_id = '".$amphure_id."'";
						$result = $this->query($sql)->rows;

						$fp = fopen($path_json, 'w');
						fwrite($fp, json_encode($result));
						fclose($fp);
					}
				}
			}else{
				$result = json_decode(file_get_contents($path_json), true);
			}
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