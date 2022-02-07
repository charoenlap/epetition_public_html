<?php 
	class DashboardModel extends db {
		public function getTotalCase($data = array()){
			$result = 0;
			$sql = "SELECT COUNT(*) as total FROM ep_response";
			$query = $this->query($sql);
			if($query->num_rows){
				$result = $query->row['total'];
			}
			return $result;
		}
		public function getTotalCaseProcess($data = array()){
			$result = 0;
			$sql = "SELECT COUNT(*) as total FROM ep_response WHERE `status` != 1";
			$query = $this->query($sql);
			if($query->num_rows){
				$result = $query->row['total'];
			}
			return $result;
		}
		public function getTotalUser($data = array()){
			$result = 0;
			$sql = "SELECT COUNT(*) as total FROM AUT_USER";
			$query = $this->query($sql);
			if($query->num_rows){
				$result = $query->row['total'];
			}
			return $result;
		}
	}
?>