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
				$sql = "SELECT COUNT(id) AS count_id FROM ep_response WHERE MONTH(dateadd) = ".$val;
				$result['detail'][$val] = $this->query($sql)->rows;
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