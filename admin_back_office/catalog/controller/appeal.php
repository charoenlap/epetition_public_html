<?php 
	class AppealController extends Controller {
	    public function index() {
			$data['title'] 	= "เรื่องร้องเรียน"; 
			$response 		= $this->model('response');
			$resultData 	= $response->getLists();

			foreach($resultData as $key => $value){
				$data['lists'][$key]['ticketId']	= "6510000".$value['id'];
				$data['lists'][$key]['id'] 			= $value['id'];
				$data['lists'][$key]['fullname']	= $value['name_title']." ".$value['name']." ".$value['lastname'];
				$data['lists'][$key]['dateadd']		= date('d-m-Y',strtotime($value['dateadd']));
				$data['lists'][$key]['topicTitle']	= $value['topic_title'];
			}

	    	$this->view('appeal/home',$data);
	    }
	    public function add() {
			$data['title'] 			= "แบบฟอร์มเรื่องร้องเรียน";
			// ตัว script เลือก จังหวัด อำเภอ ตำบล ใช้ตัวเดียวกันกับหน้าเว็บแหละ controller ตัวเดียวกัน
			$master 				= $this->model('master',"/home/hostphp7/domains/hostphp7.com/public_html/epetition/public_html/catalog/"); 
			$response				= $this->model('response');
			$data['geographies']	= $master->getGeographies();
			$data['title_topic']	= $response->getTopic();

			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$post 				= $_POST;
				$post['dateadd']	= date('Y-m-d H:i:s');
				$insert				= $response->addResponse($post);
				if($insert){
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
			$master 		= $this->model('master',"/home/hostphp7/domains/hostphp7.com/public_html/epetition/public_html/catalog/"); 

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

	    	$this->view('appeal/detail',$data);
	    }	
	    public function status() {
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

	    	$this->view('appeal/status',$data);
	    }
	}
?>