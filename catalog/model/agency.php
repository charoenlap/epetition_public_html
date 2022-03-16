<?php 
	class AgencyModel extends db {
		public function getAgency($data=array()){
			$result = array();
			$path_json = PATH_JSON.'getAgency.json';
			if(!isset($data['db'])){
				$sql = "SELECT * FROM ep_agency";
				$agency = $this->query($sql)->rows;
				foreach($agency as $key => $val){
					$sql_minor = "SELECT * FROM ep_agency_minor WHERE id_agency = '".(int)$val['id']."'";
					$agency_minor = $this->query($sql_minor)->rows;
					$result[] = array(
						'id'=> $val['id'],
						'agency_title'=> $val['agency_title'],
						'minor' => $agency_minor
					);
				}

				$fp = fopen($path_json, 'w');
				fwrite($fp, json_encode($result));
				fclose($fp);
			}else{
				$result = json_decode(file_get_contents($path_json), true);
			}
			return $result;
		}
	}
?>