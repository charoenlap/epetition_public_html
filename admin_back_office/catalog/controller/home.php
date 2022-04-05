<?php 
	class HomeController extends Controller {
	    public function index() {
	    	$data = array(); 

			$last_login = $this->getSession('last_login');
			if($last_login){
				$province_id = get('province_id');
		    	// $id_admin = $this->getSession('id_admin');
		    	// if($id_admin){
		    	// 	$this->view('home');
		    	// }else{
		    	//  	redirect('home/login');
		    	// }

		    	$id_agency 			= $this->getSession('id_agency');
		    	$id_agency_minor 	= $this->getSession('id_agency_minor');
		    	$data_dashboard = array(
		    		'id_agency' 		=> $id_agency,
					'id_agency_minor' 	=> $id_agency_minor,
		    	);
		    	$total_case 		= $this->model('dashboard')->getTotalCase($data_dashboard);
		    	$total_case_process = $this->model('dashboard')->getTotalCaseProcess($data_dashboard);
		    	$total_user 		= $this->model('dashboard')->getTotalUser($data_dashboard);

				$data['total_case'] 		= $total_case;
				$data['total_case_process'] = $total_case_process;
				$data['total_report'] 		= 8;
				$data['total_user'] 		= $total_user;
				$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
				$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
				$data['menu'] = array();
				$data['active_del'] 	= 0;
				$data['active_add'] 	= 0;
				$data['active_view'] 	= 0;
				$data['active_edit'] 	= 0;
				$data['user_shortcut'] 	= 0;
				$data['user_graph'] 	= 0;
				$data['user_graph_sub'] = 0;
				// echo "<pre>";
				// var_dump($menu);
				//exit();
				foreach($menu as $val){
					if($val['MENU_ID']=="1"){
						if($val['USER_DELETE']=="1"){
							$data['active_del'] = 1;
						}
						if($val['USER_ADD']=="1"){
							$data['active_add'] = 1;
						}
						if($val['USER_VIEW']=="1"){
							$data['active_view'] = 1;
						}
						if($val['USER_EDIT']=="1"){
							$data['active_edit'] = 1;
						}

						if($val['user_shortcut']=="1"){
							$data['user_shortcut'] = 1;
						}
						if($val['user_graph']=="1"){
							$data['user_graph'] = 1;
						}
						if($val['user_graph_sub']=="1"){
							$data['user_graph_sub'] = 1;
						}
					}
					// exit();
				}
				
				if($data['user_graph']){
					$data['report'] = $this->model('report')->getDashboardHome($province_id);
				}
				$id_agency 			= $this->getSession('id_agency');
				$data['agency_title'] = $this->model('agency')->getAgency($id_agency);
		    	$this->view('home',$data);
		    }else{
		    	redirect('login');
		    }
	    }
	    public function login(){
	    	$this->setSession('token_id','');
			$this->setSession('user_name','');
			$this->setSession('officer_id','');
			$this->setSession('officer_name','');
			$this->setSession('role_id','');
			$this->setSession('role_name','');
			$this->setSession('org_id','');
			$this->setSession('org_name','');
			$this->setSession('position','');
			$this->setSession('default_language','');
			$this->setSession('last_login','');
	    	if(method_post()){
	    		$result = array(
	    			'code' 	=> 200,
	    			'status'=> 'failed',
	    			'desc'	=> 'Connect'
	    		);
	    		$username = post('username');
	    		$password = post('password');
	    		if(!empty($password)){
		    		$selectToken = array(
		    			'username' 	=> $username,
		    			'password' 	=> $password
					);
					// var_dump($selectToken);exit();
					$resultLogin = $this->model('login')->auth($selectToken);
					if($resultLogin['result']=="fail"){
						$result = array(
			    			'code' 	=> 200,
			    			'status'=> 'failed',
			    			'desc'	=> 'Login error'
			    		);
					}else{
						// echo "<pre>";
						// var_dump($resultLogin);exit();
						$officer_name = $resultLogin['detail']['FIRSTNAME'].' '.$resultLogin['detail']['LASTNAME'];
						$this->setSession('token_id','');
						$this->setSession('id_agency',$resultLogin['detail']['id_agency']);
						$this->setSession('id_agency_minor',$resultLogin['detail']['id_agency_minor']);

						$this->setSession('AUT_USER_ID',$resultLogin['detail']['AUT_USER_ID']);
						$this->setSession('DEPARTMENT_ID',$resultLogin['detail']['DEPARTMENT_ID']);
						$this->setSession('USER_GROUP_ID',$resultLogin['detail']['USER_GROUP_ID']);
						$this->setSession('user_name',$resultLogin['detail']['AUT_USER_ID']);
						$this->setSession('officer_id',$resultLogin['detail']['AUT_USERNAME']);
						$this->setSession('officer_name',$officer_name);
						$this->setSession('role_id',$resultLogin['detail']['USER_GROUP_ID']);
						$this->setSession('role_name',$resultLogin['detail']['GROUP_NAME']);
						$this->setSession('org_id','');
						$this->setSession('org_name','');
						// $this->setSession('position',$resultLogin['detail']['DEPARTMENT_NAME']);
						$this->setSession('default_language','');
						$this->setSession('last_login',$resultLogin['last_login']);
						$log = array(
							'AUT_USER_ID' => $resultLogin['detail']['AUT_USER_ID'],
							'LOG_DESCRIPTION' => $resultLogin['detail']['FIRSTNAME'].' เข้าสู่ระบบ ด้วย Username และ รหัสผ่าน',
							'CREATE_TIMESTAMP' => date('Y-m-d H:i:s')
						);
						$this->model('master')->insertLog($log);
						$result = array(
			    			'code' 			=> 200,
			    			'status'		=> 'success',
			    			'desc'			=> 'Login complete',
			    			'detail'		=> $resultLogin,
			    			'last_login'	=> $resultLogin['last_login']
			    		);
					}
				}else{
					$result = array(
		    			'code' 	=> 200,
		    			'status'=> 'failed',
		    			'desc'	=> 'Password empty'
		    		);
				}
	    	}else{
	    		$result = array(
	    			'code' 	=> 200,
	    			'status'=> 'failed',
	    			'desc'	=> 'Method not allow'
	    		);
	    	}
	    	$this->json($result);
	    }
	    public function loginOPM(){
	    	if(method_post()){
	    		$result = array(
	    			'code' 	=> 200,
	    			'status'=> 'failed',
	    			'desc'	=> 'Connect'
	    		);
	    		$username = post('username');
	    		$password = post('password');
	    		if(!empty($password)){
		    		$selectToken = array(
		    			'username' 	=> $username,
		    			'password' 	=> $password
					);
					$resultToken = $this->model('opm')->GetToken($selectToken);
					if($resultToken=="Err:Invalid username or password."){
						$result = array(
			    			'code' 	=> 200,
			    			'status'=> 'failed',
			    			'desc'	=> 'Login OPM error'
			    		);
					}else{
						$this->setSession('token_id',$resultToken['token_id']);
						$this->setSession('user_name',$resultToken['user_name']);
						$this->setSession('officer_id',$resultToken['officer_id']);
						$this->setSession('officer_name',$resultToken['officer_name']);
						$this->setSession('role_id',$resultToken['role_id']);
						$this->setSession('role_name',$resultToken['role_name']);
						$this->setSession('org_id',$resultToken['org_id']);
						$this->setSession('org_name',$resultToken['org_name']);
						$this->setSession('position',$resultToken['position']);
						$this->setSession('default_language',$resultToken['default_language']);
						$this->setSession('last_login',date('Y-m-d H:i:s'));
						$result = array(
			    			'code' 	=> 200,
			    			'status'=> 'success',
			    			'desc'	=> 'Login OPM complete',
			    			'detail'=> $resultToken
			    		);
					}
				}else{
					$result = array(
		    			'code' 	=> 200,
		    			'status'=> 'failed',
		    			'desc'	=> 'Password empty'
		    		);
				}
	    	}else{
	    		$result = array(
	    			'code' 	=> 200,
	    			'status'=> 'failed',
	    			'desc'	=> 'Method not allow'
	    		);
	    	}
	    	$this->json($result);
	    }
	    public function loginOpenID(){
	    	// if(method_post()){
	    		$result = array(
	    			'code' 	=> 200,
	    			'status'=> 'failed',
	    			'desc'	=> 'Connect'
	    		);
	    		$id_key = get('id_key');
	    		if(!empty($id_key)){
	    			$open_id_email = decrypt($id_key);
	    			// echo $open_id_email;exit();
		    		$selectOpenIDEmail = array(
		    			'open_id_email' 	=> $open_id_email,
					);
					$resultLogin = $this->model('login')->authOpenID($selectOpenIDEmail);
					if($resultLogin['result']=="fail"){
						$result = array(
			    			'code' 	=> 200,
			    			'status'=> 'failed',
			    			'desc'	=> 'Login error '.$open_id_email.'key not match'
			    		);
					}else{
						$officer_name = $resultLogin['detail']['FIRSTNAME'].' '.$resultLogin['detail']['LASTNAME'];
						$this->setSession('token_id','');
						$this->setSession('id_agency',$resultLogin['detail']['id_agency']);
						$this->setSession('id_agency_minor',$resultLogin['detail']['id_agency_minor']);

						$this->setSession('AUT_USER_ID',$resultLogin['detail']['AUT_USER_ID']);
						$this->setSession('DEPARTMENT_ID',$resultLogin['detail']['DEPARTMENT_ID']);
						$this->setSession('USER_GROUP_ID',$resultLogin['detail']['USER_GROUP_ID']);
						$this->setSession('user_name',$resultLogin['detail']['AUT_USER_ID']);
						$this->setSession('officer_id',$resultLogin['detail']['AUT_USERNAME']);
						$this->setSession('officer_name',$officer_name);
						$this->setSession('role_id',$resultLogin['detail']['USER_GROUP_ID']);
						$this->setSession('role_name',$resultLogin['detail']['GROUP_NAME']);
						$this->setSession('org_id','');
						$this->setSession('org_name','');
						// $this->setSession('position',$resultLogin['detail']['DEPARTMENT_NAME']);
						$this->setSession('default_language','');
						$this->setSession('last_login',$resultLogin['last_login']);

						$log = array(
							'AUT_USER_ID' => $resultLogin['detail']['AUT_USER_ID'],
							'LOG_DESCRIPTION' => $resultLogin['detail']['FIRSTNAME'].' เข้าสู่ระบบ ด้วย Open ID',
							'CREATE_TIMESTAMP' => date('Y-m-d H:i:s')
						);
						$this->model('master')->insertLog($log);

						$result = array(
			    			'code' 			=> 200,
			    			'status'		=> 'success',
			    			'desc'			=> 'Login complete',
			    			'detail'		=> $resultLogin,
			    			'last_login'	=> $resultLogin['last_login']
			    		);
			    		redirect('home');
					}
				}else{
					$result = array(
		    			'code' 	=> 200,
		    			'status'=> 'failed',
		    			'desc'	=> 'Password empty'
		    		);
				}
	    	// }else{
	    	// 	$result = array(
	    	// 		'code' 	=> 200,
	    	// 		'status'=> 'failed',
	    	// 		'desc'	=> 'Method not allow'
	    	// 	);
	    	// }
	    	$this->json($result);
	    }
	    public function loginLdap(){
	    	$result_login = false;
	    	if(method_post()){
	    		$result = array(
	    			'code' 	=> 200,
	    			'status'=> 'failed',
	    			'desc'	=> 'Connect'
	    		);
	    		$username = post('username');
	    		$password = post('password');
	    		// $username = 'bitzldap@energy.local';
	    		// $password = '4P3MKK*t9';
	    		if(!empty($password)){
		    		$selectToken = array(
		    			'username' 	=> $username,
		    			'password' 	=> $password
					);
					// $resultToken = $this->model('opm')->GetToken($selectToken);
		    		// $server = "172.18.0.7";
		    		// $server = "172.19.0.105";
		    		$server = "172.19.0.105";
		    		$ldaprdn = $username;//"bitzldap@energy.local";
		    		$ldappass = $password;//"4P3MKK*t9";
		    		$result_connect_ldap = false;
		    		$ldapconn = ldap_connect('ldap://'.$server);
		    		ldap_set_option($ldapconn , LDAP_OPT_PROTOCOL_VERSION, 3);
					ldap_set_option($ldapconn , LDAP_OPT_REFERRALS, 0);

		    		if(!$ldapconn)   {
		    			die("Connect not connect to ".$server);
		    			exit();
		    		}else{
		    			// echo "Connect server ldap<br>";
		    		}
		    		// $b = ldap_bind($ldapconn, $server.'\\'.$user , $pass);
		    		// $lb=ldap_bind($ldap,"uid=xxx,ou=something,o=hostname.com","password");
		    		// $b = ldap_bind($ldapconn,$user,$pass);
		    		// $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass);

		    		$error_bind= "<br>server: ".'ldaps://'.$server;
		    		$error_bind.= "<br>user: ".$ldaprdn;
		    		$error_bind.= "<br>pass: ".$ldappass;

		    		$ldapbind = @ldap_bind($ldapconn,$ldaprdn,$ldappass)  or die ("Bind Error : ".ldap_error($ldapconn).$error_bind);
		    		// var_dump($ldapbind);
		    		if (!$ldapbind) {
		    			echo " ldap_bind() problem!<br>";
					    if (ldap_get_option($ldapconn, LDAP_OPT_DIAGNOSTIC_MESSAGE, $extended_error)) {
					        echo "Error Binding to LDAP: $extended_error";
					    } else {
					        echo "Error Binding to LDAP: No additional information is available.";
					    }
					}
					ldap_close($ldapconn);
					if(!$ldapbind){
						$result = array(
			    			'code' 	=> 200,
			    			'status'=> 'failed',
			    			'desc'	=> 'Login Ldap error ',
			    			'return' => $ldapbind,
			    			'user'	=> $ldaprdn,
			    			'pass'	=> $ldappass,
			    			'connect'	=> $ldapconn
			    		);
					}else{
						$select_user_ldap = array(
							'user_ldap' => $ldaprdn
						);
						$resultLogin = $this->model('login')->authLdap($select_user_ldap);
						if($resultLogin['result']=="fail"){
							$result = array(
				    			'code' 	=> 200,
				    			'status'=> 'failed',
				    			'desc'	=> 'เข้าสู่ระบบผิดพลาด '.$ldaprdn.' ไม่มีชื่อบัญชีนี้ในระบบ'
				    		);
						}else{
							$officer_name = $resultLogin['detail']['FIRSTNAME'].' '.$resultLogin['detail']['LASTNAME'];
							$this->setSession('token_id','');
							$this->setSession('id_agency',$resultLogin['detail']['id_agency']);
							$this->setSession('id_agency_minor',$resultLogin['detail']['id_agency_minor']);

							$this->setSession('AUT_USER_ID',$resultLogin['detail']['AUT_USER_ID']);
							$this->setSession('DEPARTMENT_ID',$resultLogin['detail']['DEPARTMENT_ID']);
							$this->setSession('USER_GROUP_ID',$resultLogin['detail']['USER_GROUP_ID']);
							$this->setSession('user_name',$resultLogin['detail']['AUT_USER_ID']);
							$this->setSession('officer_id',$resultLogin['detail']['AUT_USERNAME']);
							$this->setSession('officer_name',$officer_name);
							$this->setSession('role_id',$resultLogin['detail']['USER_GROUP_ID']);
							$this->setSession('role_name',$resultLogin['detail']['GROUP_NAME']);
							$this->setSession('org_id','');
							$this->setSession('org_name','');
							$this->setSession('default_language','');
							$this->setSession('last_login',$resultLogin['last_login']);

							$log = array(
								'AUT_USER_ID' => $resultLogin['detail']['AUT_USER_ID'],
								'LOG_DESCRIPTION' => $resultLogin['detail']['FIRSTNAME'].' เข้าสู่ระบบ ด้วย LDAP',
								'CREATE_TIMESTAMP' => date('Y-m-d H:i:s')
							);
							$this->model('master')->insertLog($log);
							$result = array(
				    			'code' 			=> 200,
				    			'status'		=> 'success',
				    			'desc'			=> 'Login complete',
				    			'detail'		=> $resultLogin,
				    			'last_login'	=> $resultLogin['last_login'],
				    			'detail'		=> $ldapbind,
			    				'user'			=> $ldaprdn
				    		);
						}
					}
				}else{
					$result = array(
		    			'code' 	=> 200,
		    			'status'=> 'failed',
		    			'desc'	=> 'Password empty'
		    		);
				}
	    	}else{
	    		$result = array(
	    			'code' 	=> 200,
	    			'status'=> 'failed',
	    			'desc'	=> 'Method not allow'
	    		);
	    	}
	    	$this->json($result);
	    }
	    public function releaseToken(){
	    	$result = array();
	    	$token_id = get('token_id');
	    	if(!empty($token_id)){
	    		$result = $this->model('opm')->ReleaseToken( array('token_id'=>$token_id) );
	    	}
	    	$this->json($result);
	    }
	    public function getTimelineHeader(){
	    	$result = array();
			$token_id 			= get('token_id');
			$last_get_date_time = get('last_get_date_time'); // 2015-01-01 00:01:12
			$timeline_type 		= get('timeline_type'); // A=ทั้งหมด,I=รายการรับ, P=กํา ลังดำเนินการ, N=รายการแจ้งเตือน
			$skip 				= get('skip'); // จำนวนรายการที่ต้องการข้ําม
			$take 				= get('take'); // จำนวนรายการที่ต้องการ

	    	if(!empty($token_id)){
	    		$selectTimelineHeader = array(
					'token_id' 				=> $token_id,
					'last_get_date_time' 	=> $last_get_date_time,
					'timeline_type' 		=> $timeline_type,
					'skip' 					=> $skip,
					'take' 					=> $take,
	    		);
	    		$result = $this->model('opm')->getTimelineHeader( $selectTimelineHeader );
	    	}
	    	$this->json($result);
	    }

	    // ํขอ้มูลกํารปฏิบตัิงํานภํายใตเ้คสซ่ึงจะแสดงเฉพําะตํามสิทธ์ิของผใู้ชง้ํานน้นั
	    public function getTimelineOperating(){
	    	$result 	= array();
			$token_id 	= get('token_id');
			$case_id 	= get('case_id'); // 2015-01-01 00:01:12
			$skip 		= get('skip'); // จำนวนรายการที่ต้องการข้ําม
			$take 		= get('take'); // จำนวนรายการที่ต้องการ

	    	if(!empty($token_id)){
	    		$selectTimelineOperating = array(
					'token_id' 	=> $token_id,
					'case_id' 	=> $case_id,
					'skip' 		=> $skip,
					'take' 		=> $take,
	    		);
	    		$result = $this->model('opm')->getTimelineOperating( $selectTimelineOperating );
	    	}
	    	$this->json($result);
	    }
	    // ํํดึงข้อมูลเรื่องตามรหัส
	    public function getCase(){
	    	$result 	= array();
			$token_id 	= get('token_id');
			$case_id 	= get('case_id'); 

	    	if(!empty($token_id)){
	    		$selectGetCase = array(
					'token_id' 	=> $token_id,
					'case_id' 	=> $case_id // E7AD8F92103442AD98B7C38B58047A24
	    		);
	    		$result = $this->model('opm')->getCase( $selectGetCase );
	    	}
	    	$this->json($result);
	    }
	    // ดึงข้อมูลกํารปฏิบัติงํานภํายใต้เคสซึ่งจะแสดงเฉพําะตํามสิทธ์ิของผใู้ชง้ํานน้นั
	    public function getOperatings(){
	    	$result 		= array();
			$token_id 		= get('token_id');
			$case_id 		= get('case_id'); 
			$select_org_id 	= get('select_org_id'); 
			$skip 			= get('skip'); // จำนวนรายการที่ต้องการข้ําม
			$take 			= get('take'); // จำนวนรายการที่ต้องการ
	    	if(!empty($token_id)){
	    		$selectGetOperatings = array(
					'token_id' 		=> $token_id,
					'case_id' 		=> $case_id, // E7AD8F92103442AD98B7C38B58047A24
					'select_org_id' => $select_org_id,
					'skip' 			=> $skip,
					'take' 			=> $take,
	    		);
	    		$result = $this->model('opm')->getOperatings( $selectGetOperatings );
	    	}
	    	$this->json($result);
	    }
	    // ข้อมูลกํารปฏิบัติงํานเพียง1 กํารปฏิบัติงําน
	    public function getOperating(){
	    	$result 		= array();
			$token_id 		= get('token_id');
			$operating_id 		= get('operating_id'); 
	    	if(!empty($token_id)){
	    		$selectGetOperating = array(
					'token_id' 		=> $token_id,
					'operating_id' 		=> $operating_id,
	    		);
	    		$result = $this->model('opm')->getOperating( $selectGetOperating );
	    	}
	    	$this->json($result);
	    }
	    // ขอ้มูลกํารปฏิบตัิงํานที่มีรหสักํารติดต่อจํากประชําชนเพียง 1 กํารติดต่อ
	    public function getContact(){
	    	$result 		= array();
			$token_id 		= get('token_id');
			$operating_id 		= get('operating_id'); 
	    	if(!empty($token_id)){
	    		$selectGetContact = array(
					'token_id' 		=> $token_id,
					'operating_id' 		=> $operating_id,
	    		);
	    		$result = $this->model('opm')->getContact( $selectGetContact );
	    	}
	    	$this->json($result);
	    }
	    // ขอ้มูลกํารปฏิบตัิงํานที่มีรหสักํารติดต่อจํากประชําชนเพียง 1 กํารติดต่อ
	    public function getAttachment(){
	    	$result 		= array();
			$token_id 		= get('token_id');
			$attachment_id 	= get('attachment_id'); 
			$is_preview 	= get('is_preview'); 
	    	if(!empty($token_id)){
	    		$selectGetAttachment = array(
					'token_id' 		=> $token_id,
					'attachment_id' => $attachment_id,
					'is_preview' 	=> $is_preview,
	    		);
	    		$result = $this->model('opm')->getAttachment( $selectGetAttachment );
	    	}
	    	$this->json($result);
	    }
	    // ข้อมูลผู้เดือดร้อนที่ถูกระบุไว้ภํายในเรื่อง
	    public function getCaseCustomerProfile(){
	    	$result 	= array();
			$token_id 	= get('token_id');
			$case_id 	= get('case_id'); 
	    	if(!empty($token_id)){
	    		$selectGetCaseCustomerProfile = array(
					'token_id'=> $token_id,
					'case_id' => $case_id,
	    		);
	    		$result = $this->model('opm')->getCaseCustomerProfile( $selectGetCaseCustomerProfile );
	    	}
	    	$this->json($result);
	    }
	    // ข้อมูลผู้เดือดร้อนที่ถูกระบุไว้ภํายในเรื่อง
	    public function getCustomerProfile(){
	    	$result 	= array();
			$token_id 	= get('token_id');
			$customer_id 	= get('customer_id'); 
	    	if(!empty($token_id)){
	    		$selectGetCustomerProfile = array(
					'token_id'=> $token_id,
					'customer_id' => $customer_id,
	    		);
	    		$result = $this->model('opm')->getCustomerProfile( $selectGetCustomerProfile );
	    	}
	    	$this->json($result);
	    }
	    // ํขอ้มูลผตู้ิดต่อที่ถูกระบุไวภ้ํายในกํารติดตอ่
	    public function getContactAccount(){
	    	$result 	= array();
			$token_id 	= get('token_id');
			$account_id = get('account_id'); 
	    	if(!empty($token_id)){
	    		$selectGetContactAccount = array(
					'token_id'	=> $token_id,
					'account_id'=> $account_id,
	    		);
	    		$result = $this->model('opm')->getContactAccount( $selectGetContactAccount );
	    	}
	    	$this->json($result);
	    }
	    // บนั ทึกผลสรุปกํารปฏิบตัิงํานแจง้ผรู้้องของหน่วยงําน
	    public function setOrgSummaryResult(){
	    	$result 	= array();
			$token_id 	= get('token_id');
			$case_id 	= get('case_id'); 
			$status_id 	= get('status_id'); 
			$result 	= get('result'); 
	    	if(!empty($token_id)){
	    		$selectSetOrgSummaryResult = array(
					'token_id' 	=> $token_id,
					'case_id'	=> $case_id,
					'status_id'	=> $status_id,
					'result'	=> $result,
	    		);
	    		$result = $this->model('opm')->setOrgSummaryResult( $selectSetOrgSummaryResult );
	    	}
	    	$this->json($result);
	    }
	    public function addOperating(){
	    	$result 	= array();
			$token_id 			= get('token_id');
			$case_id 			= get('case_id'); 
			$type_id 			= get('type_id'); 
			$objective_id 		= get('objective_id'); 
			$terminal_org_id 	= get('terminal_org_id'); 
			$terminal_owner_id 	= get('terminal_owner_id'); 
			$channel_id 		= get('channel_id'); 
			$contact_detail 	= get('contact_detail'); 
			$date_opened 		= get('date_opened'); 
			$date_closed 		= get('date_closed'); 
			$detail 			= get('detail'); 
			$severity_id 		= get('severity_id'); 
			$secret_id 			= get('secret_id'); 
	    	if(!empty($token_id)){
	    		$selectAddOperating = array(
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
	    		);
	    		$result = $this->model('opm')->addOperating( $selectAddOperating );
	    	}
	    	$this->json($result);
	    }
	    public function operatingAttachment(){
	    	$result 	= array();
			$token_id 			= get('token_id');
			$case_id 			= get('case_id');
			$operating_id 		= get('operating_id');
			$file_name 			= get('file_name');
			$file_content 		= get('file_content');
			$file_description 	= get('file_description');
			$doc_type_id 		= get('doc_type_id');
			$doc_type 			= get('doc_type');
			$doc_no 			= get('doc_no');
			$doc_date 			= get('doc_date');
			$doc_ref_no 		= get('doc_ref_no');
			$doc_ref_date 		= get('doc_ref_date');
			$document_no 		= get('document_no');
			$document_date 		= get('document_date');
	    	if(!empty($token_id)){
	    		$selectOperatingAttachment = array(
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
	    		);
	    		$result = $this->model('opm')->operatingAttachment( $selectOperatingAttachment );
	    	}
	    	$this->json($result);
	    }
	    public function addCase(){
	    	$result 	= array();
			$token_id 			= get('token_id');
			$case_code 			= get('case_code');
			$type_id 			= get('type_id');
			$status_id 			= get('status_id');
			$organization_id 	= get('organization_id');
			$channel_id 		= get('channel_id');
			$detail 			= get('detail');
			$province_id 		= get('province_id');
			$district_id 		= get('district_id');
			$subdistrict_id 	= get('subdistrict_id');
			$contact_citizen_id = get('contact_citizen_id');
			$contact_name 		= get('contact_name');
			$contact_lastname 	= get('contact_lastname');
			$contact_telephone 	= get('contact_telephone');
			$created_date 		= get('created_date');
			$updated_date 		= get('updated_date');
	    	if(!empty($token_id)){
	    		$selectaddCase = array(
					'token_id' => $token_id,
					'case_code' => $case_code,
					'type_id' => $type_id,
					'status_id' => $status_id,
					'organization_id' => $organization_id,
					'channel_id' => $channel_id,
					'detail' => $detail,
					'province_id' => $province_id,
					'district_id' => $district_id,
					'subdistrict_id' => $subdistrict_id,
					'contact_citizen_id' => $contact_citizen_id,
					'contact_name' => $contact_name,
					'contact_lastname' => $contact_lastname,
					'contact_telephone' => $contact_telephone,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
	    		);
	    		$result = $this->model('opm')->addCase( $selectaddCase );
	    	}
	    	$this->json($result);
	    }
	  //   public function getCase(){
	  //   	$result 	= array();
			// $token_id 			= get('token_id');
			// $case_id 			= get('case_id');
	  //   	if(!empty($token_id)){
	  //   		$selectgetCase = array(
			// 		'token_id' => $token_id,
			// 		'case_id' => $case_id,
	  //   		);
	  //   		$result = $this->model('opm')->getCase( $selectgetCase );
	  //   	}
	  //   	$this->json($result);
	  //   }
	     public function getCases(){
	    	$result 	= array();
			$token_id			= get('token_id');
			$last_get_date_time	= get('last_get_date_time');
			$skip				= get('skip');
			$take				= get('take');
	    	if(!empty($token_id)){
	    		$selectgetCases = array(
					'token_id' 				=> $token_id,
					'last_get_date_time' 	=> $last_get_date_time,
					'skip' 					=> $skip,
					'take' 					=> $take,
	    		);
	    		$result = $this->model('opm')->getCases( $selectgetCases );
	    	}
	    	$this->json($result);
	    }
	    public function getCaseType(){
	    	$result 	= array();
			$ref_id		= get('ref_id');
			$is_thai	= get('is_thai');
	    	if(!empty($token_id)){
	    		$selectGetCaseType = array(
					'ref_id' 	=> $ref_id,
					'is_thai'	=> $is_thai,
	    		);
	    		$result = $this->model('opm')->getCaseType( $selectGetCaseType );
	    	}
	    	$this->json($result);
	    }
	    public function getCaseStatus(){
	    	$result 	= array();
			$ref_id		= get('ref_id');
			$is_thai	= get('is_thai');
	    	if(!empty($token_id)){
	    		$selectgetCaseStatus = array(
					'ref_id' 	=> $ref_id,
					'is_thai'	=> $is_thai,
	    		);
	    		$result = $this->model('opm')->getCaseStatus( $selectgetCaseStatus );
	    	}
	    	$this->json($result);
	    }
	    public function GetOrganization(){
	    	$result 	= array();
			$ref_id		= get('ref_id');
			$is_thai	= get('is_thai');
	    	if(!empty($token_id)){
	    		$selectGetOrganization = array(
					'ref_id' 	=> $ref_id,
					'is_thai'	=> $is_thai,
	    		);
	    		$result = $this->model('opm')->getOrganization( $selectGetOrganization );
	    	}
	    	$this->json($result);
	    }
	    public function getChannelIn(){
	    	$result 	= array();
			$ref_id		= get('ref_id');
			$org_id		= get('org_id');
			$is_thai	= get('is_thai');
	    	if(!empty($token_id)){
	    		$selectGetChannelIn = array(
					'ref_id' 	=> $ref_id,
					'org_id' 	=> $org_id,
					'is_thai'	=> $is_thai,
	    		);
	    		$result = $this->model('opm')->getChannelIn( $selectGetChannelIn );
	    	}
	    	$this->json($result);
	    }
	    public function getProvinces(){
	    	$result 	= array();
			$is_thai	= get('is_thai');
	    	if(!empty($token_id)){
	    		$selectGetProvinces = array(
					'is_thai'	=> $is_thai,
	    		);
	    		$result = $this->model('opm')->getProvinces( $selectGetProvinces );
	    	}
	    	$this->json($result);
	    }
	    public function getDistricts(){
	    	$result 	= array();
			$province_id	= get('province_id');
			$is_thai		= get('is_thai');
	    	if(!empty($token_id)){
	    		$selectGetDistricts = array(
					'province_id'	=> $province_id,
					'is_thai'		=> $is_thai,
	    		);
	    		$result = $this->model('opm')->getDistricts( $selectGetDistricts );
	    	}
	    	$this->json($result);
	    }
	    public function getSubDistricts(){
	    	$result 	= array();
			$district_id	= get('district_id');
			$is_thai		= get('is_thai');
	    	if(!empty($token_id)){
	    		$selectGetSubDistricts = array(
					'district_id'	=> $district_id,
					'is_thai'		=> $is_thai,
	    		);
	    		$result = $this->model('opm')->getDistricts( $selectGetSubDistricts );
	    	}
	    	$this->json($result);
	    }
	   
	    public function logout(){
	    	// $this->rmSession('id_admin');
	    	// redirect('home/login');
	    }
	}
?>