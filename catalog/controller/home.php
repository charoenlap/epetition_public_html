<?php 
	class HomeController extends Controller {
	    public function about() {
	    	$data = array();
	    	$data['title'] = "เกี่ยวกับหน่วยงาน";
	    	$data['descreption'] = "เกี่ยวกับหน่วยงาน";
 	    	$this->view('about',$data); 
	    }
	    public function map() {
	    	$data = array();
	    	$data['title'] = "แผนที่หน่วยงาน";
	    	$data['descreption'] = "แผนที่หน่วยงาน";
 	    	$this->view('map',$data); 
	    }
	    public function index() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
	    	$data['contact'] = $this->model('master')->getContent();
	    	$data['banners'] = $this->model('master')->getBanners();
 	    	$this->view('home',$data); 
	    }
	    public function agreement(){
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
	    	$data['agreement'] = $this->model('master')->getAgreement();
 	    	$this->view('agreement',$data); 
	    }
	    public function topic(){
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";

			$topic = $this->model('topic');
			$data['topic'] = $topic->getTopicSub();
			
 	    	$this->view('topic',$data); 
	    }
		// public function addTopic(){
		// 	$_SESSION['topic_id'] = $_GET['id'];
		// 	redirect('home/form');
		// }
	    public function form(){
	    	$data = array();
	    	$data['hide'] = $this->model('master')->getHideData();
	    	$data['production'] = true;
	    	if($_SERVER['HTTP_HOST']=='localhost'){
	    		$data['production'] = false;
	    	}
	    	
	    	$master 				= $this->model('master');
			if(method_post()){
				$post 				= $_POST;
				if($_SERVER['HTTP_HOST']!='localhost'){
		    		if(!$post['g-recaptcha-response']){
		    			redirect('home/form&result=fail&rdetail=g-recaptcha-response');
		    		}
		    	}
				if(post('id_card')){
					$post['topic_id'] 		= post('topic_id');
					$post['sub_topic_id'] 	= post('sub_topic_id');
					// echo "<pre>";
					// var_dump($post);
					unset($post['file-upload-field'],$post['g-recaptcha-response']);
					if(isset($_FILES['file-upload-field'])){
						$upload_name = time().$_FILES['file-upload-field']['name'];
						upload($_FILES['file-upload-field'],'uploads/files/',$upload_name);
						$post['file'] = $upload_name;
					}
					$post['AUT_USER_ID'] = (int)decrypt($this->getSession('AUT_USER_ID'));

					$add = $master->addResponse($post);

					$email = post('email');
					if($email){
						$to_email=$email;
						$data['mail_people']  = $this->model('master')->getMasterSetting('mail_people');
						$templateEmail = str_replace("{{ticket_id}}", $add, $templateEmail);
						$templateEmail = str_replace("{{id_card}}",post('id_card'),$templateEmail);
						$templateEmail = str_replace("{{name_title}}",post('name_title'),$templateEmail);
						$templateEmail = str_replace("{{name}}",post('name'),$templateEmail);
						$templateEmail = str_replace("{{lastname}}",post('lastname'),$templateEmail);
						$templateEmail = str_replace("{{age}}",post('age'),$templateEmail);
						$templateEmail = str_replace("{{tel}}",post('tel'),$templateEmail);
						$templateEmail = str_replace("{{phone}}",post('phone'),$templateEmail);
						$templateEmail = str_replace("{{email}}",post('email'),$templateEmail);
						$templateEmail = str_replace("{{complain_name}}",post('complain_name'),$templateEmail);
						$templateEmail = str_replace("{{response_person}}",post('response_person'),$templateEmail);

				    	$subject="ระบบแจ้งเรื่องร้องเรียน กระทรวงพลังงาน";
				    	sendmailSmtp($to_email,$templateEmail,$subject);
				    }
					if($add){
						redirect('home/formComplate&case_code='.$add);
					}
				}else{
					redirect('home/form&result=fail&rdetail=id_card');
				}
			}else{
				$topic_id = (int)get('topic_id');
		    	if(empty($topic_id)){
		    		redirect('home/topic&result=Not found topic id');
		    	}
		    	$sub_topic_id = (int)get('sub_topic_id');
		    	if(empty($sub_topic_id)){
		    		redirect('home/topic&result=Not found topic id');
		    	}
				$data['rdetail'] 		= get('rdetail');
		    	$data['title'] 			= "";
		    	$data['descreption'] 	= "";
		    	$data['limit_mb'] 		= $master->getConfigDay();
				$data['geographies'] 	= $master->getGeographies();
				$data['topic_id'] 		= (int)get('topic_id');
				$data['sub_topic_id'] 	= (int)get('sub_topic_id');
				$data['topic'] 			= $this->model('topic')->getTopicDetail($data['topic_id']);
				$data['prefix']			= $master->getPrefix();
			}
			
 	    	$this->view('form',$data); 
	    }
	    public function status(){
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
 	    	$this->view('status',$data); 
	    }
		public function formComplate(){
			$data = array();
			$case_code = get('case_code');
			$data['case_code'] = $case_code;
			$this->view('formComplate',$data);
		}
	}
?>