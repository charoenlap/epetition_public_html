<?php 
	class OpmModel extends db {
		public $token_id;
		public function __construct(){
			$username 			= USERNAME;
			$password 			= PASSWORD;
			$encryptPassword = $this->encodeString(array('txt'=>$password));
			$array = array(
				'params' 	=> array(
				  "user"		=> $username,
				  "password"	=> $encryptPassword,
				  'authen_from'	=> 'S',
				  'ip_address'	=> IP
				),
				'url'		=> URL."Officer.asmx?WSDL",
				'func'		=> "GetToken"
			);
			$resultGetToken = soap($array);
			$result = json_decode($resultGetToken->GetTokenResult,true);
			// var_dump($result);
			$this->token_id = $result['token_id'];
		}
		public function encodeString($data = array()){
			$result = "";
			$txt = (isset($data['txt'])?$data['txt']:'');
			if(!empty($txt)){
				$array = array(
					'params' 	=> array(
					  "str"	=> $txt
					),
					'url'		=> URL."General.asmx?WSDL",
					'func'		=> "EncodeString"
				);
				$encrypt_password = soap($array)->EncodeStringResult;
				$encrypt_password = json_decode($encrypt_password,true);
				$result = $encrypt_password;
			}
			return $result;
		}
		public function getToken($data = array()){
			$result = "";
			$username 			= USERNAME;
			$password 			= PASSWORD;
			$encryptPassword = $this->encodeString(array('txt'=>$password));
			$array = array(
				'params' 	=> array(
				  "user"		=> $username,
				  "password"	=> $encryptPassword,
				  'authen_from'	=> 'S',
				  'ip_address'	=> IP
				),
				'url'		=> URL."Officer.asmx?WSDL",
				'func'		=> "GetToken"
			);
			$resultGetToken = soap($array);
			$result = json_decode($resultGetToken->GetTokenResult,true);
			return $result;
		}
		public function releaseToken($data = array()){
			$result = "";
			$token_id 			= $this->token_id;
			$array = array(
				'params' 	=> array(
				  "token_id"	=> $token_id
				),
				'url'		=> URL."Officer.asmx?WSDL",
				'func'		=> "ReleaseToken"
			);
			$result = soap($array);
			// var_dump($resultGetToken);exit();
			$result = json_decode($result->ReleaseTokenResult,true);
			return $result;
		}
		public function getTimelineHeader($data = array()){
			$result = "";
			$token_id 			= $this->token_id;
			$last_get_date_time = (isset($data['last_get_date_time'])?$data['last_get_date_time']:'');
			$timeline_type 		= (isset($data['timeline_type'])?$data['timeline_type']:'');
			$skip 				= (isset($data['skip'])?$data['skip']:'');
			$take 				= (isset($data['take'])?$data['take']:'');

			$array = array(
				'params' 	=> array(
					'token_id' 			=> $token_id,
					'last_get_date_time'=> $last_get_date_time,
					'timeline_type' 	=> $timeline_type,
					'skip' 				=> $skip,
					'take' 				=> $take,
				),
				'url'		=> URL."Officer.asmx?WSDL",
				'func'		=> "GetTimelineHeader"
			);
			$result = soap($array);
			$result = json_decode($result->GetTimelineHeaderResult,true);
			return $result;
		}
		public function getTimelineOperating($data = array()){
			$result = "";
			$token_id 			= $this->token_id;
			$case_id 			= (isset($data['case_id'])?$data['case_id']:'');
			$skip 				= (isset($data['skip'])?$data['skip']:'');
			$take 				= (isset($data['take'])?$data['take']:'');

			$array = array(
				'params' 	=> array(
					'token_id' 			=> $token_id,
					'case_id'			=> $case_id,
					'skip' 				=> $skip,
					'take' 				=> $take,
				),
				'url'		=> URL."Officer.asmx?WSDL",
				'func'		=> "GetTimelineOperating"
			);
			$result = soap($array);
			$result = json_decode($result->GetTimelineOperatingResult,true);
			return $result;
		}
		public function getCase($data = array()){
			$result = "";
			$token_id 			= $this->token_id;
			$case_id 			= (isset($data['case_id'])?$data['case_id']:'');

			$array = array(
				'params' 	=> array(
					'token_id' 			=> $token_id,
					'case_id'			=> $case_id,
				),
				// http://service.1111.go.th/SOAP/ManageCenter.asmx
				'url'		=> URL."ManageCenter.asmx?WSDL",
				'func'		=> "GetCase"
			);
			// echo "Param".'<br>';
			// echo "<pre>";
			// var_dump($array);
			$result = soap($array);
			$result = json_decode($result->GetCaseResult,true);
			// echo "result<br>";
			// echo "<pre>";
			// var_dump($result);exit();
			return $result;
		}
		
		public function getOperatings($data = array()){
			$result = "";
			$token_id 			= $this->token_id;
			$case_id 			= (isset($data['case_id'])?$data['case_id']:'');
			$select_org_id 		= (isset($data['select_org_id'])?$data['select_org_id']:'');
			$skip 				= (isset($data['skip'])?$data['skip']:'');
			$take 				= (isset($data['take'])?$data['take']:'');

			$array = array(
				'params' 	=> array(
					'token_id' 			=> $token_id,
					'case_id'			=> $case_id,
					'select_org_id' 	=> $select_org_id,
					'skip' 				=> $skip,
					'take' 				=> $take,
				),
				'url'		=> URL."Officer.asmx?WSDL",
				'func'		=> "GetOperatings"
			);
			$result = soap($array);
			$result = json_decode($result->GetOperatingsResult,true);
			return $result;
		}
		public function getOperating($data = array()){
			$result = "";
			$token_id 			= $this->token_id;
			$operating_id 		= (isset($data['operating_id'])?$data['operating_id']:'');

			$array = array(
				'params' 	=> array(
					'token_id' 			=> $token_id,
					'operating_id'		=> $operating_id
				),
				'url'		=> URL."Officer.asmx?WSDL",
				'func'		=> "GetOperating"
			);
			$result = soap($array);
			$result = json_decode($result->GetOperatingResult,true);
			return $result;
		}
		public function getContact($data = array()){
			$result = "";
			$token_id 			= $this->token_id;
			$operating_id 		= (isset($data['operating_id'])?$data['operating_id']:'');

			$array = array(
				'params' 	=> array(
					'token_id' 			=> $token_id,
					'operating_id'		=> $operating_id
				),
				'url'		=> URL."Officer.asmx?WSDL",
				'func'		=> "GetContact"
			);
			$result = soap($array);
			$result = json_decode($result->GetContactResult,true);
			return $result;
		}
		public function getAttachment($data = array()){
			$result = "";
			$token_id 			= $this->token_id;
			$attachment_id 		= (isset($data['attachment_id'])?$data['attachment_id']:'');
			$is_preview 		= (isset($data['is_preview'])?$data['is_preview']:'');

			$array = array(
				'params' 	=> array(
					'token_id' 			=> $token_id,
					'attachment_id'		=> $attachment_id,
					'is_preview'		=> $is_preview
				),
				'url'		=> URL."Officer.asmx?WSDL",
				'func'		=> "GetAttachment"
			);
			$result = soap($array);
			$result = json_decode($result->GetAttachmentResult,true);
			return $result;
		}
		
		public function getCaseCustomerProfile($data = array()){
			$result = "";
			$token_id 			= $this->token_id;
			$case_id 		= (isset($data['case_id'])?$data['case_id']:'');

			$array = array(
				'params' 	=> array(
					'token_id' 		=> $token_id,
					'case_id'		=> $case_id,
				),
				'url'		=> URL."Officer.asmx?WSDL",
				'func'		=> "GetCaseCustomerProfile"
			);
			$result = soap($array);
			$result = json_decode($result->GetCaseCustomerProfileResult,true);
			return $result;
		}
		public function getCustomerProfile($data = array()){
			$result = "";
			$token_id 			= $this->token_id;
			$customer_id 		= (isset($data['customer_id'])?$data['customer_id']:'');

			$array = array(
				'params' 	=> array(
					'token_id' 		=> $token_id,
					'customer_id'	=> $customer_id,
				),
				'url'		=> URL."Officer.asmx?WSDL",
				'func'		=> "GetCustomerProfile"
			);
			$result = soap($array);
			$result = json_decode($result->GetCustomerProfileResult,true);
			return $result;
		}
		public function getContactAccount($data = array()){
			$result = "";
			$token_id 			= $this->token_id;
			$account_id 		= (isset($data['account_id'])?$data['account_id']:'');

			$array = array(
				'params' 	=> array(
					'token_id' 		=> $token_id,
					'account_id'	=> $account_id,
				),
				'url'		=> URL."Officer.asmx?WSDL",
				'func'		=> "GetContactAccount"
			);
			$result = soap($array);
			$result = json_decode($result->GetContactAccountResult,true);
			return $result;
		}
		public function setOrgSummaryResult($data = array()){
			$result = "";
			$token_id 		= $this->token_id;
			$case_id 		= (isset($data['case_id'])?$data['case_id']:'');
			$status_id 		= (isset($data['status_id'])?$data['status_id']:'');
			$result 		= (isset($data['result'])?$data['result']:'');

			$array = array(
				'params' 	=> array(
					'token_id' 		=> $token_id,
					'case_id'	=> $case_id,
					'status_id'	=> $status_id,
					'result'	=> $result,
				),
				'url'		=> URL."Officer.asmx?WSDL",
				'func'		=> "SetOrgSummaryResult"
			);
			$result = soap($array);
			$result = json_decode($result->SetOrgSummaryResultResult,true);
			return $result;
		}
		public function addOperating($data = array()){
			$result = "";
			$token_id 			= $this->token_id;
			$case_id 			= (isset($data['case_id'])?$data['case_id']:'');
			$type_id 			= (isset($data['type_id'])?$data['type_id']:'');
			$objective_id 		= (isset($data['objective_id'])?$data['objective_id']:'');
			$terminal_org_id 	= (isset($data['terminal_org_id'])?$data['terminal_org_id']:'');
			$terminal_owner_id 	= (isset($data['terminal_owner_id'])?$data['terminal_owner_id']:'');
			$channel_id 		= (isset($data['channel_id'])?$data['channel_id']:'');
			$contact_detail 	= (isset($data['contact_detail'])?$data['contact_detail']:'');
			$date_opened 		= (isset($data['date_opened'])?$data['date_opened']:'');
			$date_closed 		= (isset($data['date_closed'])?$data['date_closed']:'');
			$detail 			= (isset($data['detail'])?$data['detail']:'');
			$severity_id 		= (isset($data['severity_id'])?$data['severity_id']:'');
			$secret_id 			= (isset($data['secret_id'])?$data['secret_id']:'');

			$array = array(
				'params' 	=> array(
					'token_id' 			=> $token_id,
					'case_id'			=> $case_id,
					'type_id'			=> $type_id,
					'objective_id'		=> $objective_id,
					'terminal_org_id'	=> $terminal_org_id,
					'terminal_owner_id'	=> $terminal_owner_id,
					'channel_id'		=> $channel_id,
					'contact_detail'	=> $contact_detail,
					'date_opened'		=> $date_opened,
					'date_closed'		=> $date_closed,
					'detail'			=> $detail,
					'severity_id'		=> $severity_id,
					'secret_id'			=> $secret_id,
				),
				'url'		=> URL."Officer.asmx?WSDL",
				'func'		=> "AddOperating"
			);
			$result = soap($array);
			$result = json_decode($result->AddOperatingResult,true);
			return $result;
		}
		public function operatingAttachment($data = array()){
			$result = "";
			$token_id 			= $this->token_id;
			$case_id 			= (isset($data['case_id'])?$data['case_id']:'');
			$operating_id 		= (isset($data['operating_id'])?$data['operating_id']:'');
			$file_name 			= (isset($data['file_name'])?$data['file_name']:'');
			$file_content 		= (isset($data['file_content'])?$data['file_content']:'');
			$file_description 	= (isset($data['file_description'])?$data['file_description']:'');
			$doc_type_id 		= (isset($data['doc_type_id'])?$data['doc_type_id']:'');
			$doc_type 			= (isset($data['doc_type'])?$data['doc_type']:'');
			$doc_no 			= (isset($data['doc_no'])?$data['doc_no']:'');
			$doc_date 			= (isset($data['doc_date'])?$data['doc_date']:'');
			$doc_ref_no 		= (isset($data['doc_ref_no'])?$data['doc_ref_no']:'');
			$doc_ref_date 		= (isset($data['doc_ref_date'])?$data['doc_ref_date']:'');
			$document_no 		= (isset($data['document_no'])?$data['document_no']:'');
			$document_date 		= (isset($data['document_date'])?$data['document_date']:'');

			$array = array(
				'params' 	=> array(
					'token_id' 			=> $token_id,
					'case_id'			=> $case_id,
					'operating_id'		=> $operating_id,
					'file_name'			=> $file_name,
					'file_content'		=> $file_content,
					'file_description'	=> $file_description,
					'doc_type_id'		=> $doc_type_id,
					'doc_type'			=> $doc_type,
					'doc_no'			=> $doc_no,
					'doc_date'			=> $doc_date,
					'doc_ref_no'		=> $doc_ref_no,
					'doc_ref_date'		=> $doc_ref_date,
					'document_no'		=> $document_no,
					'document_date'		=> $document_date,
				),
				'url'		=> URL."Officer.asmx?WSDL",
				'func'		=> "OperatingAttachment"
			);
			$result = soap($array);
			$result = json_decode($result->OperatingAttachmentResult,true);
			return $result;
		}



		public function addCase($data = array()){
			$result = "";
			$token_id 			= $this->token_id;
			$case_code 			= (isset($data['case_code'])?$data['case_code']:'');
			$type_id 			= (isset($data['type_id'])?$data['type_id']:'');
			$status_id 			= (isset($data['status_id'])?$data['status_id']:'');
			$organization_id 	= (isset($data['organization_id'])?$data['organization_id']:'');
			$channel_id 		= (isset($data['channel_id'])?$data['channel_id']:'');
			$detail 			= (isset($data['detail'])?$data['detail']:'');
			$province_id 		= (isset($data['province_id'])?$data['province_id']:'');
			$district_id 		= (isset($data['district_id'])?$data['district_id']:'');
			$subdistrict_id 	= (isset($data['subdistrict_id'])?$data['subdistrict_id']:'');
			$contact_citizen_id = (isset($data['contact_citizen_id'])?$data['contact_citizen_id']:'');
			$contact_name 		= (isset($data['contact_name'])?$data['contact_name']:'');
			$contact_lastname 	= (isset($data['contact_lastname'])?$data['contact_lastname']:'');
			$contact_telephone 	= (isset($data['contact_telephone'])?$data['contact_telephone']:'');
			$created_date 		= (isset($data['created_date'])?$data['created_date']:'');
			$updated_date 		= (isset($data['updated_date'])?$data['updated_date']:'');

			$array = array(
				'params' 	=> array(
					'token_id' 			=> $token_id,
					'case_code'			=> $case_code,
					'type_id'			=> $type_id,
					'status_id'			=> $status_id,
					'organization_id'	=> $organization_id,
					'channel_id'		=> $channel_id,
					'detail'			=> $detail,
					'province_id'		=> $province_id,
					'district_id'		=> $district_id,
					'subdistrict_id'	=> $subdistrict_id,
					'contact_citizen_id'=> $contact_citizen_id,
					'contact_name'		=> $contact_name,
					'contact_lastname'	=> $contact_lastname,
					'contact_telephone'	=> $contact_telephone,
					'created_date'		=> $created_date,
					'updated_date'		=> $updated_date,
				),
				'url'		=> URL."ManageCenter.asmx?WSDL",
				'func'		=> "AddCase"
			);
			$result = soap($array);
			$result = json_decode($result->AddCaseResult,true);
			return $result;
		}
		// public function getCase($data = array()){
		// 	$result = "";
		// 	$token_id 			= $this->token_id;
		// 	$case_id 			= (isset($data['case_id'])?$data['case_id']:'');
		// 	$array = array(
		// 		'params' 	=> array(
		// 			'token_id' 			=> $token_id,
		// 			'case_id'			=> $case_id
		// 		),
		// 		'url'		=> URL."Officer.asmx?WSDL",
		// 		'func'		=> "GetCase"
		// 	);
		// 	$result = soap($array);
		// 	$result = json_decode($result->GetCaseResult,true);
		// 	return $result;
		// }
		public function getCases($data = array()){
			$result = "";
			$token_id 			= $this->token_id;
			$last_get_date_time = (isset($data['last_get_date_time'])?$data['last_get_date_time']:'');
			$skip 				= (isset($data['skip'])?$data['skip']:'');
			$take 				= (isset($data['take'])?$data['take']:'');

			$array = array(
				'params' 	=> array(
					'token_id' 			=> $token_id,
					'last_get_date_time'=> $last_get_date_time,
					'skip' 				=> $skip,
					'take' 				=> $take,
				),
				'url'		=> URL."ManageCenter.asmx?WSDL",
				'func'		=> "GetCases"
			);
			$result = soap($array);
			$result = json_decode($result->GetCasesResult,true);
			return $result;
		}
		public function getCaseType($data = array()){
			$result = "";
			$ref_id 	= (isset($data['ref_id'])?$data['ref_id']:'');
			$is_thai 	= (isset($data['is_thai'])?$data['is_thai']:'');

			$array = array(
				'params' 	=> array(
					'ref_id' 	=> $ref_id,
					'is_thai'	=> $is_thai,
				),
				'url'		=> URL."ListOfValues.asmx?WSDL",
				'func'		=> "getCaseType"
			);
			//http://service.1111.go.th/SOAP/ListOfValues.asmx
			$result = soap($array);
			$result = json_decode($result->GetCaseTypeResult,true);
			return $result;
		}
		public function getCaseStatus($data = array()){
			$result = "";
			$ref_id 	= (isset($data['ref_id'])?$data['ref_id']:'');
			$is_thai 	= (isset($data['is_thai'])?$data['is_thai']:'');

			$array = array(
				'params' 	=> array(
					'ref_id' 	=> $ref_id,
					'is_thai'	=> $is_thai,
				),
				'url'		=> URL."ListOfValues.asmx?WSDL",
				'func'		=> "getCaseStatus"
			);
			$result = soap($array);
			$result = json_decode($result->GetCaseStatusResult,true);
			return $result;
		}
		public function GetOrganization($data = array()){
			$result = "";
			$ref_id 	= (isset($data['ref_id'])?$data['ref_id']:'');
			$is_thai 	= (isset($data['is_thai'])?$data['is_thai']:'');

			$array = array(
				'params' 	=> array(
					'ref_id' 	=> $ref_id,
					'is_thai'	=> $is_thai,
				),
				'url'		=> URL."ListOfValues.asmx?WSDL",
				'func'		=> "GetOrganization"
			);
			$result = soap($array);
			$result = json_decode($result->GetOrganizationResult,true);
			return $result;
		}
		public function GetChannelIn($data = array()){
			$result = "";
			$ref_id 	= (isset($data['ref_id'])?$data['ref_id']:'');
			$org_id 	= (isset($data['org_id'])?$data['org_id']:'');
			$is_thai 	= (isset($data['is_thai'])?$data['is_thai']:'');

			$array = array(
				'params' 	=> array(
					'ref_id' 	=> $ref_id,
					'org_id' 	=> $org_id,
					'is_thai'	=> $is_thai,
				),
				'url'		=> URL."ListOfValues.asmx?WSDL",
				'func'		=> "GetChannelIn"
			);
			$result = soap($array);
			$result = json_decode($result->GetOrganizationResult,true);
			return $result;
		}
		public function updateDataAddress($data_province=array(),$data_districts=array(),$data_subDistricts=array()){
			$sql_PROVINCE = "TRUNCATE PROVINCE;";
			$this->query($sql_PROVINCE);
			$sql_AMPHUR = "TRUNCATE AMPHUR;";
			$this->query($sql_AMPHUR);
			$sql_TAMBON = "TRUNCATE TAMBON;";
			$this->query($sql_TAMBON);
			foreach($data_province as $val){
				$this->insert('PROVINCE',$val,false);
			}
			foreach($data_districts as $val){
				$this->insert('AMPHUR',$val,false);
			}
			foreach($data_subDistricts as $val){
				$this->insert('TAMBON',$val,false);
			}
		}
		public function getProvinces($data = array()){
			$result = "";
			$is_thai 	= (isset($data['is_thai'])?$data['is_thai']:'');

			$array = array(
				'params' 	=> array(
					'is_thai'	=> $is_thai,
				),
				'url'		=> URL."ListOfValues.asmx?WSDL",
				'func'		=> "getProvinces"
			);
			$result = soap($array);
			$result = json_decode($result->GetProvincesResult,true);
			return $result;
		}
		public function getDistricts($data = array()){
			$result = "";
			$province_id= (isset($data['province_id'])?$data['province_id']:'');
			$is_thai 	= (isset($data['is_thai'])?$data['is_thai']:'');

			$array = array(
				'params' 	=> array(
					'province_id'	=> $province_id,
					'is_thai'		=> $is_thai,
				),
				'url'		=> URL."ListOfValues.asmx?WSDL",
				'func'		=> "getDistricts"
			);
			$result = soap($array);
			$result = json_decode($result->GetDistrictsResult,true);
			return $result;
		}
		public function getSubDistricts($data = array()){
			$result = "";
			$district_id= (isset($data['district_id'])?$data['district_id']:'');
			$is_thai 	= (isset($data['is_thai'])?$data['is_thai']:'');

			$array = array(
				'params' 	=> array(
					'district_id'	=> $district_id,
					'is_thai'		=> $is_thai,
				),
				'url'		=> URL."ListOfValues.asmx?WSDL",
				'func'		=> "getSubDistricts"
			);
			$result = soap($array);
			$result = json_decode($result->GetSubDistrictsResult,true);
			return $result;
		}
		
	}
?>