<?php 
	class ConfigModel extends db {
		public function getConfig($data=array()){
			// $result_last_insert = $this->insert('response',$data);
			// $case_code = ((date('y')+43).date('m')).str_pad($result_last_insert,4,"0", STR_PAD_LEFT);
			$sql = "SELECT * FROM ep_config";
			$query = $this->query($sql);

			return $query->rows;
		}
	}
?>