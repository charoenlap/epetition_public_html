<?php 
	class OpmController extends Controller {
	    public function index() {
	    	$data = array();
 	    	echo "OPM Service API";
	    }
	    public function generalEncodeString(){
	    	global $url;
	    	$array = array(
				'params' 	=> array(
				  "str"	=> 'test'
				),
				'url'		=> $url."General.asmx?WSDL",
				'func'		=> "EncodeString"
			);
			echo soap($array)->EncodeStringResult;
	    }
		
	}
?>