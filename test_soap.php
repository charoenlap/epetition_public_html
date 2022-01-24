<?php 
	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
	error_reporting(E_ALL);
	
	// URL TEST
	// http://service.1111.go.th
	// http://203.113.25.98/CoreService

	global $url;
	$url = "http://203.113.25.98/CoreService/SOAP/";
	$url_test = "http://203.113.25.98/OPMApplication";

	// ชื่อเข้ําใช้งํานระบบที่ได้รับจําก สปน.
	$username = "opmegov";
	$password = "opmegov";

	// $username_egov = "serviceegov";
	// $password_egov = "serviceegov";

	$password = $password;
	// Start general_encodeString()
	$array = array(
		'params' 	=> array(
		  "str"	=> $password
		),
		'url'		=> $url."General.asmx?WSDL",
		'func'		=> "EncodeString"
	);
	$encrypt_password = soap($array)->EncodeStringResult;
	$encrypt_password = json_decode($encrypt_password,true);
	// $encrypt_password = str_replace('"','',$encrypt_password);
	echo 'encrypt_password: '.$encrypt_password.'<br>';
	// End general_encodeString()
 

	// Start getToken()
	$array = array(
		'params' 	=> array(
		  "user"		=> $username,
		  "password"	=> $encrypt_password,
		  'authen_from'	=> 'S',
		  'ip_address'	=> '49.228.98.246'
		),
		'url'		=> $url."Officer.asmx?WSDL",
		'func'		=> "GetToken"
	);
	$result = soap($array);

	$result = json_decode($result->GetTokenResult,true);
	if($result=="Err:Invalid username or password."){
		echo "Login error";
	}else{
		echo "<pre>";
		var_dump($result);
	}
	// End getToken()

	function soap($arr = array()){
		$client = new SoapClient($arr['url']);
		$params = $arr['params'];
		$response = $client->__soapCall($arr['func'], array($params));
		return $response;
	}
?>