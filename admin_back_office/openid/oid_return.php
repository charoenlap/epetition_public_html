<?php
ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
//  oid_return.php

// Includes required files
require_once "Auth/OpenID/Consumer.php";
require_once "Auth/OpenID/FileStore.php";
require_once "Auth/OpenID/AX.php";

if($_SERVER['SERVER_NAME'] == 'e-petition.energy.go.th'){
  $url_complete = 'https://e-petition.energy.go.th/admin_back_office/openid/oid_return.php';
  require_once('/var/www/html/e-petition.energy.go.th/lib/function/main_function.php');
}else{
  $url_complete = 'http://localhost/epetition/public_html/admin_back_office/openid/oid_return.php';
  require_once($_SERVER['DOCUMENT_ROOT'].'/epetition/lib/function/main_function.php');
}

// echo $_SERVER['DOCUMENT_ROOT'].'/epetition/lib/function/main_function.php';
session_start();

// สร้าง file ไว้เก็บค่า OpenID 
$store = new Auth_OpenID_FileStore('./oid_store');

// สร้าง OpenID consumer
$consumer = new Auth_OpenID_Consumer($store);

// ตรวจสอบค่าที่ได้รับมา (input เป็น URL ที่ให้ Server ส่งค่ากลับมา)
$response = $consumer->complete($url_complete);


if ($response->status == Auth_OpenID_SUCCESS) {
    // Get registration informations
    $ax = new Auth_OpenID_AX_FetchResponse();
    $obj = $ax->fromSuccessResponse($response);
    // echo '<pre>';
    // var_dump($obj->data);
    $arr = (array)$obj->data;
    // exit();
    // example return data
    // array(5) {
    //   ["http://axschema.org/contact/email"]=>
    //   array(1) {
    //     [0]=>
    //     string(22) "dev_govid@energy.go.th"
    //   }
    //   ["http://axschema.org/namePerson"]=>
    //   array(1) {
    //     [0]=>
    //     string(48) "ใช้สำหรับทดสอบ GOVID"
    //   }
    //   ["http://axschema.org/namePerson/friendly"]=>
    //   array(1) {
    //     [0]=>
    //     string(9) "dev_govid"
    //   }
    //   ["http://www.egov.go.th/2012/identifier/citizenid"]=>
    //   array(1) {
    //     [0]=>
    //     string(1) "-"
    //   }
    //   ["http://www.egov.go.th/2012/identifier/citizenidverifiedlevel"]=>
    //   array(1) {
    //     [0]=>
    //     string(10) "Unverified"
    //   }
    // }
    $email = $arr["http://axschema.org/contact/email"][0];
    // echo $email;
    // var_dump($email);
    // exit();
    // $openid_claimed_id = $obj->data->
    if($email){
        $email = str_replace('https://govid.egov.go.th/user.aspx/','',$email);
        header('location: ../index.php?route=home/loginopenid&id_key='.encrypt($email));
    }

    // Print me raw
    // echo '<pre>';
    // print_r($obj->data);
    // echo '</pre>';
    // exit;
} 
if ($response->status == Auth_OpenID_CANCEL) {
	echo 'ผู้ใช้ยกเลิก';
}
if ($response->status == Auth_OpenID_FAILURE) {
	// echo 'Login ล้มเหลว';
 //    echo "<pre>";
 //    var_dump($_GET);
    
    /*
    Login ล้มเหลว
    array(23) {
      ["janrain_nonce"]=>
      string(26) "2022-03-18T03:06:27ZR5GVqa"
      ["openid_claimed_id"]=>
      string(57) "https://govid.egov.go.th/user.aspx/Dev_govid@energy.go.th"
      ["openid_identity"]=>
      string(57) "https://govid.egov.go.th/user.aspx/Dev_govid@energy.go.th"
      ["openid_sig"]=>
      string(28) "f07nsPLoywqhWRZil2+S4wXKvEY="
      ["openid_signed"]=>
      string(286) "claimed_id,identity,assoc_handle,op_endpoint,return_to,response_nonce,ns.alias3,alias3.mode,alias3.type.alias1,alias3.value.alias1,alias3.type.alias2,alias3.value.alias2,alias3.type.alias3,alias3.value.alias3,alias3.type.alias4,alias3.value.alias4,alias3.type.alias5,alias3.value.alias5"
      ["openid_assoc_handle"]=>
      string(124) "IlUO!IAAAAPZMw_LaqPynGrGnhhEBe0AI2S4hgdAXF_evyZyZiwU7MQAAAAGOLDStL4dzkBV7TghGFKgHUGM5bGkRxoTdi0tKkK7d4laV4_IMPibhxZ_XRirL-bM"
      ["openid_op_endpoint"]=>
      string(36) "https://govid.egov.go.th/server.aspx"
      ["openid_return_to"]=>
      string(105) "http://localhost/epetition/public_html/openid/oid_return.php?janrain_nonce=2022-03-18T03%3A06%3A27ZR5GVqa"
      ["openid_response_nonce"]=>
      string(28) "2022-03-18T03:06:26ZkQ3v9jWP"
      ["openid_mode"]=>
      string(6) "id_res"
      ["openid_ns"]=>
      string(32) "http://specs.openid.net/auth/2.0"
      ["openid_ns_alias3"]=>
      string(28) "http://openid.net/srv/ax/1.0"
      ["openid_alias3_mode"]=>
      string(14) "fetch_response"
      ["openid_alias3_type_alias1"]=>
      string(33) "http://axschema.org/contact/email"
      ["openid_alias3_value_alias1"]=>
      string(22) "dev_govid@energy.go.th"
      ["openid_alias3_type_alias2"]=>
      string(30) "http://axschema.org/namePerson"
      ["openid_alias3_value_alias2"]=>
      string(48) "ใช้สำหรับทดสอบ GOVID"
      ["openid_alias3_type_alias3"]=>
      string(39) "http://axschema.org/namePerson/friendly"
      ["openid_alias3_value_alias3"]=>
      string(9) "dev_govid"
      ["openid_alias3_type_alias4"]=>
      string(47) "http://www.egov.go.th/2012/identifier/citizenid"
      ["openid_alias3_value_alias4"]=>
      string(1) "-"
      ["openid_alias3_type_alias5"]=>
      string(60) "http://www.egov.go.th/2012/identifier/citizenidverifiedlevel"
      ["openid_alias3_value_alias5"]=>
      string(10) "Unverified"
    }
    */
}
else {
  echo 'Unknow Error';
}

