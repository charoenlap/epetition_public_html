<?php 
	class EmailModel extends db {
		public function agency($data = array()){
            $result = $this->query("SELECT * FROM ep_template_email WHERE type = '1' ");
            return $result->row;
		}
		public function agencySub($data = array()){
            $result = $this->query("SELECT * FROM ep_template_email WHERE type = '0' ");
            return $result->row;
		}
	}
?>