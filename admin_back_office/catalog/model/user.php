<?php 
	class UserModel extends db {
		public function getLists($data = array()){
			$result = array(
				'result' => 'fail'
			);
			$sql = "SELECT * FROM AUT_USER 
			LEFT JOIN DEPARTMENT ON DEPARTMENT.DEPARTMENT_ID=AUT_USER.DEPARTMENT_ID
			ORDER by AUT_USER_ID DESC";
			$result_user = $this->query($sql);
			if($result_user->num_rows > 0){
				$result = $result_user->rows;
			}
			return $result;
		}
		public function getList($id){
            $query = $this->query('SELECT * FROM AUT_USER WHERE AUT_USER_ID='.$id);
            return $query->row;
        }
        public function getGroups(){
            $query = $this->query('SELECT * FROM AUT_GROUP');
            return $query;
        }
        public function addUser($data=array()){
            $query = $this->insert('AUT_USER',$data,false);
            return $query;
        }
        public function updateUser($id,$data=array()){
            $query = $this->update('AUT_USER',$data,'AUT_USER_ID='.$id,false);
            return $query;
        }
	}
?>