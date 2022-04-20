<?php 
	class UserModel extends db {
        public function listEmailUser($data=array()){
            $id_agency_minor = (int)(isset($data['id_agency_minor'])?$data['id_agency_minor']:'');
            $id_agency = (int)(isset($data['id_agency'])?$data['id_agency']:'');
            $where = '';
            if($id_agency_minor){
                $where = " AND id_agency_minor='".(int)$id_agency_minor."'";
            }
            $sql = "SELECT * FROM AUT_USER WHERE `email` != '' AND id_agency = '".(int)$id_agency."' ".$where;
            $result = $this->query($sql);
            return $result;
        }
        public function checkUser($AUT_USERNAME=''){
            $result = 0;
            $AUT_USERNAME = $this->escape($AUT_USERNAME);
            $result = $this->query("SELECT * FROM AUT_USER WHERE AUT_USERNAME = '".$AUT_USERNAME."' LIMIT 0,1");
            return $result->num_rows;
        }
        public function checkUserGroup($AUT_USER_ID=''){
            $result = '';
            $AUT_USER_ID = $this->escape($AUT_USER_ID);
            $sql ="SELECT * FROM ep_assign WHERE assign_user_id = '".$AUT_USER_ID."' AND ('".date("Y-m-d H:i:s")."' BETWEEN date_start AND date_end) LIMIT 0,1";
            $result_assign = $this->query($sql);
            if($result_assign->num_rows){
                $result = $result_assign->row['group_id'];
            }
            // echo $result;exit();
            return $result;
        }
        public function checkUserGroupHeader($AUT_USER_ID=''){
            $result = '';
            $AUT_USER_ID = $this->escape($AUT_USER_ID);
            $sql ="SELECT * FROM ep_assign WHERE assign_user_id = '".$AUT_USER_ID."' AND ('".date("Y-m-d H:i:s")."' BETWEEN date_start AND date_end) LIMIT 0,1";
            $result_assign = $this->query($sql);
            if($result_assign->num_rows){
                $result = $result_assign;
            }
            // echo $result;exit();
            return $result;
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
        public function updateUser($id=0,$data=array()){
            // if($id){
                $return = array(
                    'result' => false
                );
                $flag_update = false;
                $AUT_USERNAME = $data['AUT_USERNAME'];
                $password = trim($data['AUT_PASSWORD']);

                if(empty($password)){
                    unset($data['AUT_PASSWORD']);
                }else{
                    $data['AUT_PASSWORD'] = md5($password);
                }
                $sql_check_user = "SELECT * FROM AUT_USER WHERE AUT_USERNAME='".$AUT_USERNAME."' LIMIT 0,1";
                $result_check_user = $this->query($sql_check_user);
                if($result_check_user->num_rows>1){
                    if($result_check_user->row['AUT_USER_ID']==$id){
                        $flag_update = true;
                    }else{
                        $return = array(
                            'result' => false,
                            'desc'  => "User Dupplicate"
                        );
                    }
                }else{
                    $flag_update = true;
                }
                if($flag_update){
                    $USER_GROUP_ID = $data['USER_GROUP_ID'];
                    unset($data['USER_GROUP_ID']);
                    unset($data['id']);
                    $query = $this->update('AUT_USER',$data,'AUT_USER_ID='.(int)$id,false);

                    $this->query("DELETE FROM AUT_USER_GROUP WHERE AUT_USER_ID = ".(int)$id);
                    $insert_user_group = array(
                        'AUT_USER_ID' => $id,
                        'USER_GROUP_ID' => $USER_GROUP_ID
                    );
                    $this->insert('AUT_USER_GROUP',$insert_user_group,false);
                    $return = array(
                        'result' => true
                    );
                }
                return $return;
            // }
        }
		public function getLists($data = array()){
			$result = array(
				'result' => 'fail'
			);
			$sql = "SELECT * FROM AUT_USER 
            LEFT JOIN ep_agency ON ep_agency.id=AUT_USER.id_agency
            LEFT JOIN ep_agency_minor ON ep_agency_minor.id=AUT_USER.id_agency_minor
            LEFT JOIN AUT_USER_GROUP ON AUT_USER_GROUP.AUT_USER_ID = AUT_USER.AUT_USER_ID
            LEFT JOIN AUT_GROUP ON AUT_GROUP.USER_GROUP_ID = AUT_USER_GROUP.USER_GROUP_ID 
            ORDER by AUT_USER.AUT_USER_ID DESC";
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
            $sql = "SELECT *,
                AUT_USER.id_agency AS id_agency,
                AUT_USER.id_agency_minor AS id_agency_minor,
                AUT_USER.position_id AS position_id 
            FROM AUT_USER 
                LEFT JOIN ep_agency ON ep_agency.id=AUT_USER.id_agency
                LEFT JOIN ep_agency_minor ON ep_agency_minor.id=AUT_USER.id_agency_minor
                LEFT JOIN AUT_USER_GROUP ON AUT_USER_GROUP.AUT_USER_ID = AUT_USER.AUT_USER_ID
                LEFT JOIN AUT_GROUP ON AUT_GROUP.USER_GROUP_ID = AUT_USER_GROUP.USER_GROUP_ID 
            WHERE AUT_USER.AUT_USER_ID=".$id."
                ORDER by AUT_USER.AUT_USER_ID DESC";

            $query = $this->query($sql);
            return $query->row;
        }
        public function getGroups(){
            $query = $this->query("SELECT * FROM AUT_GROUP WHERE ACTIVE_STATUS = 1");
            return $query;
        }
        public function getPosition(){
            $query = $this->query("SELECT * FROM ep_position WHERE del = 0");
            return $query;
        }
        public function getMenu($data=array()){
        	$group_menu_id = (int)(isset($data['group_menu_id'])?$data['group_menu_id']:0);
            $type = (int)(isset($data['type'])?$data['type']:0);
            $id = (int)(isset($data['id'])?$data['id']:0);
            $position_id = (int)(isset($data['position_id'])?$data['position_id']:0);
            $agency_id = (int)(isset($data['agency_id'])?$data['agency_id']:0);
            $where = '';
            if($group_menu_id){
                $where .= " AND AUT_GROUP_MENU_ID = '".$group_menu_id."'";
            }
            if($type){
                $where .= " AND AUT_GROUP_MENU.type = '".$type."'";
            }
            if($id){
                $where .= " AND AUT_GROUP_MENU.user_id = '".$id."'";
            }
            if($position_id){
                $where .= " AND AUT_GROUP_MENU.position_id = '".$position_id."'";
            }
            if($agency_id){
                $where .= " AND AUT_GROUP_MENU.agency_id = '".$agency_id."'";
            }
        	$sql = "SELECT *,
                AGM.USER_VIEW AS USER_VIEW,
                AGM.MENU_ID AS checkbox,
                AUT_MENU_SETTING.MENU_ID AS MENU_ID 
        			FROM AUT_MENU_SETTING 
        			LEFT JOIN (
        				SELECT * FROM AUT_GROUP_MENU 
        					WHERE MENU_ID <> ''  ".$where.") AGM 
        			ON AGM.MENU_ID = AUT_MENU_SETTING.MENU_ID 
        			ORDER BY AUT_MENU_SETTING.MENU_ORDER ASC
        			 ";
            // echo $sql;exit();
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
        public function saveMenuPerson($insert=array(),$id=0){
            if($id){
                $this->query("DELETE FROM AUT_GROUP_MENU WHERE user_id=".(int)$id);
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
        
	}
?>