<?php 
	class DashboardModel extends db {
		public function getTotalCaseProvince($data=array()){
			$id_agency          = (isset($data['id_agency'])?$data['id_agency']:'');
            $id_agency_minor    = (isset($data['id_agency_minor'])?$data['id_agency_minor']:'');
            $role_id    		= (isset($data['role_id'])?$data['role_id']:'');
            $province_name    	= (isset($data['province_name'])?$data['province_name']:'');

            $where = " ep_response.id <> ''";
            if(empty($role_id)){
	            if($id_agency){
	                $where .= " AND ep_response_status.id_agency = '".$id_agency."'";
	                if($id_agency_minor){
	                    $where .= " AND ep_response_status.id_agency_minor = '".$id_agency_minor."'";
	                }
	                
	            }
	        }
	        if($province_name){
                $where .= " AND PROVINCE.PROVINCE_NAME = '".$province_name."'";
            }
			$result = 0;
			$sql = "SELECT COUNT(ep_response.id) as total FROM ep_response 
			LEFT JOIN ep_response_status ON ep_response.id = ep_response_status.id_response 
			LEFT JOIN PROVINCE ON PROVINCE.PROVINCE_id = ep_response.t_id_provinces 
			WHERE ".$where;
			$query = $this->query($sql);
			if($query->num_rows){
				$result = $query->row['total'];
			}
			return $result;
		}
		public function getTotalCase($data = array()){
			$id_agency          = (isset($data['id_agency'])?$data['id_agency']:'');
            $id_agency_minor    = (isset($data['id_agency_minor'])?$data['id_agency_minor']:'');
            $role_id    = (isset($data['role_id'])?$data['role_id']:'');

            $where = " ep_response.id <> ''";
            if(empty($role_id)){
	            if($id_agency){
	                $where .= " AND ep_response_status.id_agency = '".$id_agency."'";
	                if($id_agency_minor){
	                    $where .= " AND ep_response_status.id_agency_minor = '".$id_agency_minor."'";
	                }
	            }
	        }

			$result = 0;
			$sql = "SELECT COUNT(ep_response.id) as total FROM ep_response 
			LEFT JOIN ep_response_status ON ep_response.id = ep_response_status.id_response 
			WHERE ".$where;
			// echo $sql;exit();
			$query = $this->query($sql);
			if($query->num_rows){
				$result = $query->row['total'];
			}
			// var_dump($result);exit();
			return $result;
		}
		public function getTotalCaseProcess($data = array()){
			$id_agency          = (isset($data['id_agency'])?$data['id_agency']:'');
            $id_agency_minor    = (isset($data['id_agency_minor'])?$data['id_agency_minor']:'');
            $role_id    = (isset($data['role_id'])?$data['role_id']:'');
            
            $where = "";
            if(empty($role_id)){
	            if($id_agency){
	                $where .= " AND ep_response_status.id_agency = '".$id_agency."'";
	                if($id_agency_minor){
	                    $where .= " AND ep_response_status.id_agency_minor = '".$id_agency_minor."'";
	                }
	            }
	        }

			$result = 0;
			$sql = "SELECT COUNT(*) as total FROM ep_response 
			LEFT JOIN ep_response_status ON ep_response.id = ep_response_status.id_response 
			WHERE ep_response.`status` != 1".$where;
			$query = $this->query($sql);
			if($query->num_rows){
				$result = $query->row['total'];
			}
			return $result;
		}
		public function getTotalUser($data = array()){
			$result = 0;
			$id_agency          = (isset($data['id_agency'])?$data['id_agency']:'');
            $id_agency_minor    = (isset($data['id_agency_minor'])?$data['id_agency_minor']:'');

            $where = " AUT_USER.AUT_USER_ID <> ''";
            if($id_agency){
                $where .= " AND AUT_USER.id_agency = '".$id_agency."'";
                if($id_agency_minor){
                    $where .= " AND AUT_USER.id_agency_minor = '".$id_agency_minor."'";
                }
            }
			$sql = "SELECT COUNT(*) as total FROM AUT_USER WHERE ".$where;
			$query = $this->query($sql);
			if($query->num_rows){
				$result = $query->row['total'];
			}
			return $result;
		}
	}
?>