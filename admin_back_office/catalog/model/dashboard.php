<?php 
	class DashboardModel extends db {
		public function getTotalCase($data = array()){
			$id_agency          = (isset($data['id_agency'])?$data['id_agency']:'');
            $id_agency_minor    = (isset($data['id_agency_minor'])?$data['id_agency_minor']:'');

            $where = " ep_response.id <> ''";
            if($id_agency){
                $where .= " AND ep_response_status.id_agency = '".$id_agency."'";
                if($id_agency_minor){
                    $where .= " AND ep_response_status.id_agency_minor = '".$id_agency_minor."'";
                }
            }

			$result = 0;
			$sql = "SELECT COUNT(ep_response.id) as total FROM ep_response 
			INNER JOIN ep_response_status ON ep_response.id = ep_response_status.id_response 
			WHERE ".$where;
			$query = $this->query($sql);
			if($query->num_rows){
				$result = $query->row['total'];
			}
			return $result;
		}
		public function getTotalCaseProcess($data = array()){
			$id_agency          = (isset($data['id_agency'])?$data['id_agency']:'');
            $id_agency_minor    = (isset($data['id_agency_minor'])?$data['id_agency_minor']:'');

            $where = "";
            if($id_agency){
                $where .= " AND ep_response_status.id_agency = '".$id_agency."'";
                if($id_agency_minor){
                    $where .= " AND ep_response_status.id_agency_minor = '".$id_agency_minor."'";
                }
            }

			$result = 0;
			$sql = "SELECT COUNT(*) as total FROM ep_response 
			INNER JOIN ep_response_status ON ep_response.id = ep_response_status.id_response 
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