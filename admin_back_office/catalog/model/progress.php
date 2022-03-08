<?php 
	class ProgressModel extends db {
		public function getLists($data = array()){
			$result = array(
				'result' => 'fail',
				'detail' => array()
			);
			$month = array(
				1,2,3,4,5,6,7,8,9,10,11,12
			);
			foreach($month as $val){
				$sql = "SELECT COUNT(id) AS count_id FROM ep_response WHERE MONTH(dateadd) = ".$val." AND YEAR(dateadd) = ".$data['year'];
				$result['detail'][$val] = $this->query($sql)->rows;
			}
			return $result;
		}
		public function getListsDetail($data = array()){
			$result = array();
			$year = $data['year'];
			$month = $data['month'];

			$sql = "SELECT *,ep_response.id AS id FROM ep_response 
			LEFT JOIN ep_topic ON ep_response.topic_id = ep_topic.id 
			LEFT JOIN PROVINCE ON ep_response.`id_provinces` = PROVINCE.`PROVINCE_id`
			WHERE MONTH(dateadd) = ".$month." AND YEAR(dateadd) = ".$year;
			$result_detail = $this->query($sql);
			foreach($result_detail->rows as $val){
				$id = $val['id'];
				$sql_get_last_agency = "SELECT * FROM ep_response_status
					LEFT JOIN ep_agency_minor ON  ep_response_status.id_agency_minor = ep_agency_minor.id 
					LEFT JOIN ep_agency ON ep_agency.id = ep_agency_minor.id_agency 
					 WHERE ep_response_status.id_response = '".$id."' ORDER BY ep_response_status.id DESC LIMIT 0,1";
				$query_agency = $this->query($sql_get_last_agency);

				// $sql_get_last_comment = "SELECT * FROM ep_response_comment
				// 	LEFT JOIN ep_agency_minor ON  ep_response_status.id_agency_minor = ep_agency_minor.id 
				// 	LEFT JOIN ep_agency ON ep_agency.id = ep_agency_minor.id_agency 
				// 	 WHERE ep_response_status.id_response = '".$id."' ORDER BY ep_response_status.id DESC LIMIT 0,1";
				// $query_agency = $this->query($sql_get_last_comment);

				$result[] = array(
					'case_code' => $val['case_code'],
					'topic_title' => $val['topic_title'],
					'PROVINCE_NAME' => $val['PROVINCE_NAME'],
					'dateadd' => $val['dateadd'],
					'agency' => $query_agency->row
				);
			}
			return $result;
		}
		// public function getList($id){
  //           $query = $this->query('SELECT * FROM AUT_USER WHERE AUT_USER_ID='.$id);
  //           return $query->row;
  //       }
  //       public function addUser($data=array()){
  //           $query = $this->insert('AUT_USER',$data,false);
  //           return $query;
  //       }
  //       public function updateUser($id,$data=array()){
  //           $query = $this->update('AUT_USER',$data,'AUT_USER_ID='.$id,false);
  //           return $query;
  //       }
	}
?>