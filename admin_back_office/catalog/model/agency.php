<?php 
    class AgencyModel extends db {
        public function getlists($data = array()){
        	$sql = "SELECT * FROM ep_agency_minor";
         	$query  = $this->query($sql);
            return $query;
        }
    }
?>