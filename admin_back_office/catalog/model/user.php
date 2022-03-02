<?php 
	class UserModel extends db {
        public function checkUser($AUT_USERNAME=''){
            $result = 0;
            $AUT_USERNAME = $this->escape($AUT_USERNAME);
            $result = $this->query("SELECT * FROM AUT_USER WHERE AUT_USERNAME = '".$AUT_USERNAME."' LIMIT 0,1");
            return $result->num_rows;
        }
        public function addUser($data = array()){
            $insert = $data;
            $insert['AUT_PASSWORD'] = md5($insert['AUT_PASSWORD']);
            $USER_GROUP_ID = $insert['USER_GROUP_ID'];
            unset($insert['USER_GROUP_ID']);
            $user_id=$this->insert('AUT_USER',$insert,false);
            $insert_user_group = array(
                'AUT_USER_ID' => $user_id,
                'USER_GROUP_ID' => $USER_GROUP_ID
            );
            $this->insert('AUT_USER_GROUP',$insert_user_group,false);
        }
		public function getLists($data = array()){
			$result = array(
				'result' => 'fail'
			);
			$sql = "SELECT * FROM AUT_USER 
			LEFT JOIN ep_agency_minor ON ep_agency_minor.id=AUT_USER.DEPARTMENT_ID
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
        public function getUser($id){
            $query = $this->query('SELECT * FROM AUT_USER WHERE AUT_USER_ID='.$id);
            return $query->row;
        }
        public function getGroups(){
            $query = $this->query("SELECT * FROM AUT_GROUP WHERE ACTIVE_STATUS = 1");
            return $query;
        }
        public function getMenu($data=array()){
        	$group_menu_id = (int)(isset($data['group_menu_id'])?$data['group_menu_id']:0);
        	$sql = "SELECT *,AGM.MENU_ID AS checkbox,AUT_MENU_SETTING.MENU_ID AS MENU_ID 
        			FROM AUT_MENU_SETTING 
        			LEFT JOIN (
        				SELECT * FROM AUT_GROUP_MENU 
        					WHERE AUT_GROUP_MENU_ID = '".$group_menu_id."') AGM 
        			ON AGM.MENU_ID = AUT_MENU_SETTING.MENU_ID 
        			ORDER BY AUT_MENU_SETTING.MENU_ORDER ASC
        			 ";
            $query = $this->query($sql);
            return $query;
        }
        public function saveMenu($insert=array(),$group_id=0){
        	if($group_id){
        		$this->query("DELETE FROM AUT_GROUP_MENU WHERE AUT_GROUP_MENU_ID=".$group_id);
        		foreach($insert as $val){
        			$this->insert('AUT_GROUP_MENU',$val,false);
        		}
        	}
        }
        // public function addUser($data=array()){
        //     $query = $this->insert('AUT_USER',$data,false);
        //     return $query;
        // }
        public function addGroup($data=array()){
            $query = $this->insert('AUT_GROUP',$data,false);
            return $query;
        }
        public function delGroup($group_id=0){
        	$sql = "UPDATE AUT_GROUP SET ACTIVE_STATUS = '0' WHERE USER_GROUP_ID='".$group_id."'";
            $query = $this->query($sql);
            // echo $sql;exit();
            return $query;
        }
        public function updateUser($id,$data=array()){
            $query = $this->update('AUT_USER',$data,'AUT_USER_ID='.$id,false);
            return $query;
        }
	}
?>