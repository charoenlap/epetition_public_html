<?php 
    class AgencyModel extends db {
        public function getlistsAgency($data = array()){
        	$sql = "SELECT * FROM ep_agency";
         	$query  = $this->query($sql);
            return $query;
        }
        public function getAgency($id_agency=0){
            $result = '';
            $sql = "SELECT * FROM ep_agency WHERE id = ".(int)$id_agency;
            $query  = $this->query($sql);
            if($query->num_rows){
                $result = $query->row['agency_title'];
            }
            return $result;
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