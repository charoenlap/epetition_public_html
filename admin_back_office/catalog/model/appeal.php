<?php 
    class AppealModel extends db {
        public function getlists($data = array()){
        	$sql = "SELECT * FROM ep_appeal";
         	$query  = $this->query($sql);
            return $query;
        }
    }
?>