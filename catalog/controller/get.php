<?php 
	class getController extends Controller {
	    public function provinces() {
	    	$master = $this->model('master');
			$amphures = $master->getProvinces();
			echo "<option>เลือก</option>";
			foreach($amphures as $key => $value){
				echo "<option value='".$value['PROVINCE_ID']."' data-id='".$value['PROVINCE_ID']."'>".$value['PROVINCE_NAME']."</option>";
			}
 	    	// $this->json($data); 
	    }
	    public function amphures() {
	    	$data = array(
				'province_id' => get('idprovinces')
			);
			$master = $this->model('master');
			$amphures = $master->getAmphures($data);
			echo "<option>เลือก</option>";
			foreach($amphures as $key => $value){
				echo "<option value='".$value['AMPHUR_ID']."' data-id='".$value['AMPHUR_ID']."' zipcode='".$value['POSTCODE']."'>".$value['AMPHUR_NAME']."</option>";
			}
 	    	// $this->json($data); 
	    }
	    public function tambons() {
	    	$data = array(
				'amphure_id' => get('idamphures')
			);
			$master = $this->model('master');
			$amphures = $master->getTambon($data);
			echo "<option>เลือก</option>";
			foreach($amphures as $key => $value){
				echo "<option value='".$value['TAMBON_ID']."' data-id='".$value['TAMBON_ID']."'>".$value['TAMBON_NAME']."</option>";
			}
 	    	// $this->json($data); 
	    }
	}
?>