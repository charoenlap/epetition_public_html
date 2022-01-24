<?php 
	class MasterModel extends db {
		public function getTicket($data=array()){
			$result = array();
			$ticket_id = 1;
			$sql = "SELECT * FROM ep_response 
			LEFT JOIN ep_topic ON ep_response.topic_id = ep_topic.id 
			WHERE ep_response.id = '".$ticket_id."'";
			$query = $this->query($sql);
			$result = $query->row;
			return $result;
		}
		public function getTicket($data=array()){
			$result = array();
			$ticket_id = 1;
			$sql = "SELECT * FROM ep_response 
			LEFT JOIN ep_topic ON ep_response.topic_id = ep_topic.id 
			WHERE ep_response.id = '".$ticket_id."'";
			$query = $this->query($sql);
			$result = $query->rows;
			return $result;
		}
	}