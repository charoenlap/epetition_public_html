<?php 
    class AssignModel extends db {
        public function getlistUser($data = array()){
            $id_agency          = (isset($data['id_agency'])?$data['id_agency']:'');
            $id_agency_minor    = (isset($data['id_agency_minor'])?$data['id_agency_minor']:'');
            $AUT_USER_ID        = (isset($data['AUT_USER_ID'])?$data['AUT_USER_ID']:'');

            $where = " AUT_USER_ID <> '".$AUT_USER_ID."'";
            if($id_agency){
                $where .= " AND id_agency = '".$id_agency."'";
                if($id_agency_minor){
                    $where .= " AND id_agency_minor = '".$id_agency_minor."'";
                }
            }
        	$sql = "SELECT * FROM AUT_USER WHERE ".$where;
         	$query  = $this->query($sql)->rows;
            return $query;
        }
        public function getlistAssign($data = array()){
            $user_id        = (int)(isset($data['user_id'])?$data['user_id']:'');
            if($user_id){
                $sql = "SELECT * FROM ep_assign 
                LEFT JOIN AUT_USER ON AUT_USER.AUT_USER_ID = ep_assign.assign_user_id 
                WHERE ep_assign.user_id  = '".$user_id ."'";
                $query  = $this->query($sql)->rows;
            }
            return $query;
        }
        public function insertAssign($data = array()){
            $this->insert('assign',$data);
        }
    }
?>