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
 	    	$this->view('home',$data); 
	    }
	    public function agreement(){
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
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
	    	$master 				= $this->model('master');
			if(method_post()){
				$post 				= $_POST;
				$post['topic_id'] 	= post('topic_id');
				unset($post['file-upload-field']);
				if(isset($_FILES['file-upload-field'])){
					$upload_name = time().$_FILES['file-upload-field']['name'];
					upload($_FILES['file-upload-field'],'uploads/files/',$upload_name);
					$post['file'] = $upload_name;
				}
				$post['AUT_USER_ID'] = (int)decrypt($this->getSession('AUT_USER_ID'));

				$add = $master->addResponse($post);
				if($add){
					redirect('home/formComplate&case_code='.$add);
				}
			}else{
				$data = array();
		    	$data['title'] = "";
		    	$data['descreption'] = "";
		    	$data['limit_mb'] 		= $master->getConfigDay();
				
				$data['geographies'] 	= $master->getGeographies();
				$data['topic_id'] 		= get('topic_id');
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