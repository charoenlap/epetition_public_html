<?php 
    class AgencyModel extends db {
        public function getlistsAgency($data = array()){
        	$sql = "SELECT * FROM ep_agency";
         	$query  = $this->query($sql);
            return $query;
        }
        public function getlistsAgencyMinor($id_agency=0){
        	$where = '';
        	if($id_agency){
        		$where = " AND id_agency = ".(int)$id_agency;
        	}
        	$sql = "SELECT * FROM ep_agency_minor WHERE id<>'' ".$where;
         	$query  = $this->query($sql);
            return $query;
        }
        public function getlists($data = array()){
        	$sql = "SELECT * FROM ep_agency_minor";
         	$query  = $this->query($sql);
            return $query;
        }
    }
?>