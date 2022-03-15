<?php 
	class AppealController extends Controller {
		public function sender(){
			$result = array();
			if(method_post()){
				$input = $_POST;
				$insert = array();
				
				if(isset($input['id_appeal'])){
					if($input['id_appeal']){
						foreach($input['id_appeal'] as $key => $val){
							$insert[] = array(
								'id_response'=> $input['id_response'],
								'id_agency_minor'	=> $input['id_agency'][$key],
								'id_appeal'	=> $val,
								'date_create'	=> date('Y-m-d H:i:s'),
								'note'			=> 'ส่งเรื่องร้องเรียน'
							);
						}
					}
				}
				$this->model('response')->inputResponse($insert);
			}
			$this->json($result);
		}
		public function comment(){
			$result = array();
			if(method_post()){
				$input = $_POST;
				$insert = array();
				$status = (int)$input['status'];
				$this->model('response')->updateStatus($input['id_response'],$status);
				if(!empty($input['note'])){
					$insert = array(
						'id_user'=> $this->getSession('AUT_USER_ID'),
						'id_agency'	=> $this->getSession('DEPARTMENT_ID'),
						'id_response'	=> $input['id_response'],
						'date_create'	=> date('Y-m-d H:i:s'),
						'note'			=> $input['note']
					);
					$this->model('response')->inputComment($insert);
				}
			}
			$this->json($result);
		}
		public function delSender(){
			$result = array();
			if(method_post()){
				$id = (int)post('id');
				$this->model('response')->delResponse($id);
			}
			$this->json($result);
		}
	    public function index() {
	    	// var_dump($_SESSION);exit();
			$data['title'] 	= "เรื่องที่ร้องเรียน/ร้องทุกข์"; 
			$data['topic'] 			= $this->model('topic')->getLists();
			$data['department'] 	= $this->model('agency')->getLists();
			$data['status'] 		= $this->model('status')->getLists();
			// var_dump($data['status']);
			$response 		= $this->model('response');
			$data['lists'] = array();
			
			$chkTypePhone 	= get('chkTypePhone');
			$data['phone'] = get('phone');
			$data['chkTypePhone']= get('chkTypePhone');
			$data['topic_id'] = get('topic_id');
			$data['dateadd'] = get('dateadd');
			$data['dateadd_time'] = get('dateadd_time');
			$data['dateadd_end'] = get('dateadd_end');
			$data['case_code'] = get('case_code');
			$data['department_id'] = get('department_id');
			$data['t_id_provinces'] = get('t_id_provinces');
			$data['date_end'] = get('date_end');
			$data['id_card'] = get('id_card');
			$data['name_lastname'] = get('name_lastname');
			$data['response_person'] = get('response_person');
			$data['date_respect'] = get('date_respect');
			$data['status_id'] = get('status_id');
			$tel 	= '';
			$phone 	= '';
			if($chkTypePhone==1){
				$tel 	= $data['phone'];
			}else{
				$phone 	= $data['phone'];
			}
			$data['page'] = (get('page')?get('page'):1);
			$USER_GROUP_ID = (int)$this->getSession('USER_GROUP_ID');
			$id_agency_minor = 0;
			if($USER_GROUP_ID>1){
				$id_agency_minor = (int)$this->getSession('id_agency_minor');
			}
			$data_search = array(
				'topic_id' 			=> $data['topic_id'],
				'dateadd'			=> $data['dateadd'],
				'dateadd_time'		=> $data['dateadd_time'],
				'dateadd_end'		=> $data['dateadd_end'],
				'case_code'			=> $data['case_code'],
				'department_id'		=> $data['department_id'], 
				't_id_provinces'	=> $data['t_id_provinces'], 
				'date_end'			=> $data['date_end'], 
				'id_card'			=> $data['id_card'], 
				'name_lastname'		=> $data['name_lastname'], 
				'tel'				=> $tel, 
				'phone'				=> $phone, 
				'response_person'	=> $data['response_person'],
				'status_id'			=> $data['status_id'],
				'page'				=> $data['page'],
				'id_agency_minor'	=> $id_agency_minor
			);
			
			$resultData 	= $response->getLists($data_search);

			foreach($resultData->rows as $key => $value){
				$data['lists'][] = array(
					'case_code'			=> $value['case_code'],
					'id' 				=> $value['id'],
					'fullname'			=> $value['name_title']." ".$value['name']." ".$value['lastname'],
					'dateadd'			=> date('d-m-Y',strtotime($value['dateadd'])),
					'topicTitle'		=> $value['topic_title'],
					't_id_provinces'	=> $value['PROVINCE_NAME'],
					'text_class'		=> $value['text_class'],
					'text_status'		=> $value['text_status'],
					'status_id'			=> $value['status_id'],
					'status_icon'		=> $value['status_icon'],
				);
			}
			$data['page_limit'] = ceil($resultData->num_rows/DEFAULT_LIMIT_PAGE);

			$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			$data['active_del'] = 0;
			$data['active_add'] = 0;
			$data['active_view'] = 0;
			$data['active_edit'] = 0;
			foreach($menu as $val){
				if($val['MENU_ID']=="2"){
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
				}
			}
	    	$this->view('appeal/home',$data);
	    }
	    public function add() {
			$data['title'] 			= "แบบฟอร์มเรื่องร้องเรียน";
			// ตัว script เลือก จังหวัด อำเภอ ตำบล ใช้ตัวเดียวกันกับหน้าเว็บแหละ controller ตัวเดียวกัน
			$master 				= $this->model('master'); 
			$response				= $this->model('response');
			$data['geographies']	= $master->getGeographies();
			$data['title_topic']	= $response->getTopic();

			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$post 				= $_POST;
				$post['topic_id'] 	= post('topic_id');
				unset($post['file-upload-field']);
				if(isset($_FILES['file-upload-field'])){
					$upload_name = time().$_FILES['file-upload-field']['name'];
					upload($_FILES['file-upload-field'],'uploads/files/',$upload_name);
					$post['file'] = $upload_name;
				}
				// exit();
				$add = $master->addResponse($post);
				if($add){
					redirect('appeal');
				}
			}
	    	$this->view('appeal/add',$data);
	    }
		public function del(){
			$id 	= $_GET['id'];
			$del 	= $this->model('response')->del($id);
			if($del){
				redirect('appeal');
			}
		}
	    public function edit() {
			$data['title']	= "แก้ไขแบบฟอร์มเรื่องร้องเรียน";

			$id 			= $_GET['id'];
			$response 		= $this->model('response');
			$master 		= $this->model('master'); 

			$data['data'] 			= $response->getList($id);
			$data['title_topic']	= $response->getTopic();
			$data['geographies']	= $master->getGeographies();

			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$post 	= $_POST;
				$update	= $response->updateResponse($post,$id);
				if($update){
					redirect('appeal');
				}
			}
			
	    	$this->view('appeal/edit',$data);
	    }
	    public function detail() {
			$data['title'] 	= "รายละเอียดเรื่องร้องเรียน";

			$id 		= (int)$_GET['id'];
			$response 	= $this->model('response');
			$resultData = $response->getList($id);

			$data['ticket']				= "6510000".$resultData['id'];
			$data['dateadd']			= $resultData['dateadd'];
			$data['idCard']				= $resultData['id_card'];
			$data['fullname']			= $resultData['name_title']." ".$resultData['name']." ".$resultData['lastname'];
			$data['age']				= $resultData['age'];
			$data['tel']				= $resultData['tel'];
			$data['phone']				= $resultData['phone'];
			$data['email']				= $resultData['email'];
			$data['address_no']			= $resultData['address_no'];
			$data['moo']				= $resultData['moo'];
			$data['housename']			= $resultData['housename'];
			$data['soi']				= $resultData['soi'];
			$data['road']				= $resultData['road'];
			$data['id_provinces']		= $resultData['id_provinces'];
			$data['id_amphures']		= $resultData['id_amphures'];
			$data['id_districts']		= $resultData['id_districts'];
			$data['zipcode']			= $resultData['zipcode'];
			$data['note_topic']			= $resultData['note_topic'];
			$data['status']				= $resultData['status'];
			$data['topic_address']		= "เลขที่ ".$resultData['t_address_no']." หมู่บ้าน ".$resultData['t_moo']." ซอย ".$resultData['t_soi']." ถนน ".$resultData['t_road']." ตำบล".$resultData['t_id_districts']." อำเภอ".$resultData['t_id_amphures']." จังหวัด".$resultData['t_id_provinces']."";
			$data['place_landmarks']	= $resultData['place_landmarks'];
			$data['response_person']	= $resultData['response_person'];

			$data['getResponse'] = $this->model('response')->getResponse($id);
			$data['getComment'] = $this->model('response')->getComment($id);
			$data['id'] = $id;
			// var_dump($data['getResponse']);
	    	$this->view('appeal/detail',$data);
	    }	
	    public function status() {
	    	$data = array();
			$data['title']	= "บันทึกรับเรื่องร้องเรียน";
			$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			$data['active_del'] = 0;
			$data['active_add'] = 0;
			foreach($menu as $val){
				if($val['MENU_ID']=="2"){
					if($val['USER_DELETE']=="1"){
						$data['active_del'] = 1;
					}
					if($val['USER_ADD']=="1"){
						$data['active_add'] = 1;
					}
				}
			}
			// echo "<pre>";
			// var_dump($menu);exit();
			$id 		= $_GET['id'];
			$data['agency'] = $this->model('agency')->getlistsAgency();
			$data['agencyMinor'] = $this->model('agency')->getlists();
			$data['appeal'] = $this->model('appeal')->getlists();
			$response 	= $this->model('response');
			$resultData = $response->getList($id);

			$data['ticket']				= $resultData['case_code'];
			$data['dateadd']			= $resultData['dateadd'];
			$data['idCard']				= $resultData['id_card'];
			$data['fullname']			= $resultData['name_title']." ".$resultData['name']." ".$resultData['lastname'];
			$data['age']				= $resultData['age'];
			$data['tel']				= $resultData['tel'];
			$data['phone']				= $resultData['phone'];
			$data['email']				= $resultData['email'];
			$data['address_no']			= $resultData['address_no'];
			$data['moo']				= $resultData['moo'];
			$data['housename']			= $resultData['housename'];
			$data['soi']				= $resultData['soi'];
			$data['road']				= $resultData['road'];
			$data['id_provinces']		= $resultData['id_provinces'];
			$data['PROVINCE_NAME']		= $resultData['PROVINCE_NAME'];
			$data['id_amphures']		= $resultData['id_amphures'];
			$data['AMPHUR_NAME']		= $resultData['AMPHUR_NAME'];
			$data['id_districts']		= $resultData['id_districts'];
			$data['TAMBON_NAME']		= $resultData['TAMBON_NAME'];
			$data['zipcode']			= $resultData['zipcode'];
			$data['note_topic']			= $resultData['note_topic'];
			$data['contacts']			= '';

			$data['topic_address']		= "เลขที่ ".$resultData['t_address_no']." หมู่บ้าน ".$resultData['t_moo']." ซอย ".$resultData['t_soi']." ถนน ".$resultData['t_road']." ตำบล".$resultData['t_TAMBON_NAME']." อำเภอ".$resultData['t_AMPHUR_NAME']." จังหวัด".$resultData['t_PROVINCE_NAME']."";
			$data['place_landmarks']	= $resultData['place_landmarks'];
			$data['response_person']	= $resultData['response_person'];
			$data['id'] = $id = $resultData['id'];
			$data['getResponse'] = $this->model('response')->getResponse($id);
	    	$this->view('appeal/status',$data);
	    }

	    public function opm() {
			$data['title'] 	= "เรื่องร้องเรียนจาก สปน"; 
			$data['token_id'] = $token_id = $this->getSession('token_id');
			$data['error'] = '';
			$data['result'] = array();

			$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			$data['active_del'] = 0;
			$data['active_add'] = 0;
			$data['active_view'] = 0;
			$data['active_edit'] = 0;
			foreach($menu as $val){
				if($val['MENU_ID']=="20"){
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
				}
			}
			$result = '';
			if($data['active_view']){
				$data['timeline_type'] = (get('timeline_type')?get('timeline_type'):'A');
				$dataSelect = array(
					'token_id' =>  $token_id,
					'last_get_date_time' =>  '',
					'timeline_type' => $data['timeline_type'],
					'skip' => '0',
					'take' => '10'
				);
				$data['result'] = $result = $this->model('opm')->getTimelineHeader($dataSelect);
			}
			if($result=="Err:Not found user!!!"){
				$data['error'] = "Err:Not found user!!!";
				$data['error'] .= '<a href="'.route('login').'">Token หมดอายุ กรุณาล็อคอินใหม่</a>';
				$this->view('appeal/opmHome',$data);
			}else{
				$this->view('appeal/opmHome',$data);
			}
	    }
	    public function opmDetail() {
			$data['title'] 	= "รายละเอียดเรื่องร้องเรียน";
			$data['case_id'] = $case_id = get('case_id');
			$data['case_code']	= get('case_code');
			// $data['token_id'] = $token_id = $this->getSession('token_id');
			$data['error'] = '';
			$data['result_TimelineOperating'] = array();
			
			$USER_GROUP_ID 		= $this->getSession('USER_GROUP_ID');
			$menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
			$data['menu'] = array();
			$data['active_del'] = 0;
			$data['active_add'] = 0;
			$data['active_view'] = 0;
			$data['active_edit'] = 0;
			foreach($menu as $val){
				if($val['MENU_ID']=="20"){
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
				}
			}
			if($data['active_view']){
				$dataSelectTimelineOperating = array(
					// 'token_id' 	=>  $token_id,
					'case_id'	=> $case_id,
					'skip' 		=> '0',
					'take' 		=> '10'
				);
				$result_TimelineOperating = $this->model('opm')->GetTimelineOperating($dataSelectTimelineOperating);

				$dataSelectGetCase = array(
					// 'token_id' 	=>  $token_id,
					'case_id'	=> $case_id,
				);
				// echo "<pre>";
				// var_dump($dataSelectGetCase);
				$result_GetCase = $this->model('opm')->GetCase($dataSelectGetCase);
				// echo "<pre>";
				// var_dump($result_GetCase);exit();
				$dataSelectgetOperatings = array(
					// 'token_id' 		=>  $token_id,
					'case_id'		=> $case_id,
					'select_org_id'	=> '',
					'skip' 			=> '0',
					'take' 			=> '10'
				);
				$result_getOperatings = $this->model('opm')->getOperatings($dataSelectgetOperatings);

				$dataGetCases = array(
					'skip' 			=> '0',
					'take' 			=> '10'
				);
				// $result_GetCases = $this->model('opm')->GetCases($dataGetCases);
				// echo "<pre>";
				// var_dump($result_GetCases);exit();

				if($result_TimelineOperating=="Err:Not found user!!!"){
					$data['error'] = "Err:Not found user!!!";
					$data['error'] .= '<a href="'.route('login').'">Token หมดอายุ กรุณาล็อคอินใหม่</a>';
					$this->view('appeal/opmDetail',$data);
				}else{
					$data['TimelineOperating'] = $result_TimelineOperating;
					// echo "<pre>";
					// var_dump($data['TimelineOperating']);exit();
					// $data['getCase'] = $result_GetCase;
					// var_dump($data['getCase']);
					$data['getOperatings'] = $result_getOperatings;
					$this->view('appeal/opmDetail',$data);
				}
			}else{
				$this->view('appeal/opmDetail',$data);
			}
	    }
	    public function opmAdd() {
	    	$data = array();
	    	$data['title'] 			= "แบบฟอร์มเรื่องร้องเรียน";
	    	$data['token_id'] 	= $token_id = $this->getSession('token_id');
	    	$this->view('appeal/opmAdd',$data);
	    }
	    public function getProvinces(){
	    	$data = array();
	    	$provinces = $this->model('opm')->getProvinces(array('is_thai'=>1));
	    	// var_dump($result);
	    	//Update provinces  to PROVINCE
	    	// $this->model('opm')->updateProvince($provinces);
	    	$data_subDistricts = array();
	    	$data_districts = array();
	    	$data_province = array();
	    	$data_current = date('Y-m-d H:i:s');
	    	foreach($provinces as $province){
	    		$data_province[] = array(
					'PROVINCE_NAME' 	=> $province['Name'],
					'PROVINCE_ID'		=> $province['ID'],
					'CREATE_USER'		=> '',
					'UPDATE_USER'		=> '',
					'CREATE_TIMESTAMP' 	=> $data_current,
					'UPDATE_TIMESTAMP' 	=> $data_current
				);
	    		$districts = $this->model('opm')->getDistricts(array('province_id'=>$province['ID'],'is_thai'=>1));
	    		foreach($districts as $district){
	    			$data_districts[] = array(
	    				'POSTCODE'			=> $district['Postcode'],
    					'AMPHUR_ID' 		=> $district['ID'],
    					'PROVINCE_id' 		=> $province['ID'],
    					'AMPHUR_NAME'		=> $district['Name'],
    					'ACTIVE_STATUS'		=> 1,
    					'CREATE_USER_ID'	=> '',
    					'UPDATE_USER_ID'	=> '',
    					'CREATE_TIMESTAMP' 	=> $data_current,
    					'UPDATE_TIMESTAMP' 	=> $data_current,
    					'DELETE_FLAG'		=> 0
    				);
	    			$subDistricts = $this->model('opm')->GetSubDistricts(array('district_id'=>$district['ID'],'is_thai'=>1));
	    			foreach($subDistricts as $subDistrict){
	    				$data_subDistricts[] = array(
	    					'TAMBON_ID' 		=> $subDistrict['ID'],
	    					'AMPHUR_ID' 		=> $district['ID'],
	    					'PROVINCE_ID' 		=> $province['ID'],
	    					'TAMBON_NAME'		=> $subDistrict['Name'],
	    					'ACTIVE_STATUS'		=> 1,
	    					'CREATE_USER_ID'	=> '',
	    					'UPDATE_USER_ID'	=> '',
	    					'CREATE_TIMESTAMP' 	=> $data_current,
	    					'UPDATE_TIMESTAMP' 	=> $data_current,
    						'DELETE_FLAG'		=> 0
	    				);
	    			}
	    		}
	    	}
	    	$this->model('opm')->updateDataAddress($data_province,$data_districts,$data_subDistricts);
	    }
	    public function submitSendOPM(){
	    	$data = array();
	    	$result = array(
	    		'status' => 'fail'
	    	);
	    	$case_code 			= get('case_code');
	    	$result_detail 		= $this->model('appeal')->getResponse(array('case_code'=>$case_code));
	    	$data['token_id'] 	= $token_id = $this->getSession('token_id');
	    	// echo "<pre>";
	    	// var_dump($result_detail);
	    	$type_id 			= get('type_id');
			$status_id 			= get('status_id');
			$organization_id 	= get('organization_id');
			$channel_id 		= get('channel_id');

	    	if(!empty($result_detail['case_code'])){
	    		if($type_id AND $status_id AND $organization_id AND $channel_id){
	    			$date 				= date('Y-m-d H:i:s');
					$case_code 			= $result_detail['case_code'];
					
					$detail 			= $result_detail['response_person'];
					$province_id 		= get('province_id');
					$district_id 		= get('district_id');
					$subdistrict_id 	= get('subdistrict_id');
					$contact_citizen_id = $result_detail['id_card'];
					$contact_name 		= $result_detail['name'];
					$contact_lastname 	= $result_detail['lastname'];
					$contact_telephone  = $result_detail['phone'];
					$created_date 		= $date;
					$updated_date 		= $date;
					$dataInsert = array(
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
					);
					$resultAddCase = $this->model('opm')->addCase($dataInsert);
	    		}else{
	    			$result = array(
	    				'status' => 'fail'
	    			);
	    		}
			}
			echo json_encode($result);
	    }
	   	public function opmSaveAdd() {
	   		$data = array();
			
			$data['token_id'] 	= $token_id = $this->getSession('token_id');
			$date 				= date('Y-m-d H:i:s');
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
			$contact_telephone  = get('contact_telephone');
			$created_date 		= $date;
			$updated_date 		= $date;
			$dataInsert = array(
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
			);
			$resultAddCase = $this->model('opm')->addCase($dataInsert);
	    }
		public function opmDel(){
			$id 	= $_GET['id'];
			$del 	= $this->model('response')->del($id);
			if($del){
				redirect('appeal/opm');
			}
		}
	    public function opmEdit() {
			$data['title']	= "แก้ไขแบบฟอร์มเรื่องร้องเรียน";

			$id 			= $_GET['id'];
			$response 		= $this->model('response');
			$master 		= $this->model('master',"/home/charoenlap/domains/charoenlap.com/public_html/epetition/public_html/catalog/"); 

			$data['data'] 			= $response->getList($id);
			$data['title_topic']	= $response->getTopic();
			$data['geographies']	= $master->getGeographies();

			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$post 	= $_POST;
				$update	= $response->updateResponse($post,$id);
				if($update){
					redirect('appeal/opm');
				}
			}
			
	    	$this->view('appeal/edit',$data);
	    }
	    	
	    public function opmStatus() {
			$data['title']	= "บันทึกรับเรื่องร้องเรียน";

			$id 		= $_GET['id'];
			$response 	= $this->model('response');
			$resultData = $response->getList($id);

			$data['ticket']				= "6510000".$resultData['id'];
			$data['dateadd']			= $resultData['dateadd'];
			$data['idCard']				= $resultData['id_card'];
			$data['fullname']			= $resultData['name_title']." ".$resultData['name']." ".$resultData['lastname'];
			$data['age']				= $resultData['age'];
			$data['tel']				= $resultData['tel'];
			$data['phone']				= $resultData['phone'];
			$data['email']				= $resultData['email'];
			$data['address_no']			= $resultData['address_no'];
			$data['moo']				= $resultData['moo'];
			$data['housename']			= $resultData['housename'];
			$data['soi']				= $resultData['soi'];
			$data['road']				= $resultData['road'];
			$data['id_provinces']		= $resultData['id_provinces'];
			$data['id_amphures']		= $resultData['id_amphures'];
			$data['id_districts']		= $resultData['id_districts'];
			$data['zipcode']			= $resultData['zipcode'];
			$data['note_topic']			= $resultData['note_topic'];
			$data['topic_address']		= "เลขที่ ".$resultData['t_address_no']." หมู่บ้าน ".$resultData['t_moo']." ซอย ".$resultData['t_soi']." ถนน ".$resultData['t_road']." ตำบล".$resultData['t_id_districts']." อำเภอ".$resultData['t_id_amphures']." จังหวัด".$resultData['t_id_provinces']."";
			$data['place_landmarks']	= $resultData['place_landmarks'];
			$data['response_person']	= $resultData['response_person'];

	    	$this->view('appeal/opmStatus',$data);
	    }
	}
?>