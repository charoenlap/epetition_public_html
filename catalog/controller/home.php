<?php 
	class HomeController extends Controller {
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
			$data['topic'] = $topic->getTopic();
			
 	    	$this->view('topic',$data); 
	    }
		public function addTopic(){
			$_SESSION['topic_id'] = $_GET['id'];
			redirect('home/form');
		}
	    public function form(){
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";

			$master = $this->model('master');
			$data['geographies'] 	= $master->getGeographies();

			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$post 				= $_POST;
				$post['dateadd']	= date('Y-m-d H:i:s');
				$post['topic_id'] 	= $_SESSION['topic_id'];
				$add = $master->addResponse($post);
				if($add){
					redirect('home/formComplate');
				}
			}
			// เลือกจังหวัดจากภาค
			if(isset($_GET['idgeographies'])){
				$data = array(
					'geography_id' => $_GET['idgeographies']
				);
				$provinces = $master->getProvinces($data);
				echo "<option>เลือก</option>";
				foreach($provinces as $key => $value){
					echo "<option value='".$value['name_th']."' data-id='".$value['id']."'>".$value['name_th']."</option>";
				}
				exit();
			}
			// เลือกอำเภอจากจังหวัด
			if(isset($_GET['idprovinces'])){
				$data = array(
					'province_id' => $_GET['idprovinces']
				);
				$amphures = $master->getAmphures($data);
				echo "<option>เลือก</option>";
				foreach($amphures as $key => $value){
					echo "<option value='".$value['name_th']."' data-id='".$value['id']."'>".$value['name_th']."</option>";
				}
				exit();
			}
			// เลือกตำบลจากอำเภอ
			if(isset($_GET['idamphures'])){
				$data = array(
					'amphure_id' => $_GET['idamphures']
				);
				$districts = $master->getDistricts($data);
				echo "<option>เลือก</option>";
				foreach($districts as $key => $value){
					echo "<option value='".$value['name_th']."' data-id='".$value['id']."' zipcode='".$value['zip_code']."'>".$value['name_th']."</option>";
				}
				exit();
			}

			// เลือกจังหวัดจากภาคของหน่วยงาน
			if(isset($_GET['t_idgeographies'])){
				$data = array(
					'geography_id' => $_GET['t_idgeographies']
				);
				$provinces = $master->getProvinces($data);
				echo "<option>เลือก</option>";
				foreach($provinces as $key => $value){
					echo "<option value='".$value['name_th']."' data-id='".$value['id']."'>".$value['name_th']."</option>";
				}
				exit();
			}
			// เลือกอำเภอจากจังหวัดของหน่วยงาน
			if(isset($_GET['t_idprovinces'])){
				$data = array(
					'province_id' => $_GET['t_idprovinces']
				);
				$amphures = $master->getAmphures($data);
				echo "<option>เลือก</option>";
				foreach($amphures as $key => $value){
					echo "<option value='".$value['name_th']."' data-id='".$value['id']."'>".$value['name_th']."</option>";
				}
				exit();
			}
			// เลือกตำบลจากอำเภอของหน่วยงาน
			if(isset($_GET['t_idamphures'])){
				$data = array(
					'amphure_id' => $_GET['t_idamphures']
				);
				$districts = $master->getDistricts($data);
				echo "<option>เลือก</option>";
				foreach($districts as $key => $value){
					echo "<option value='".$value['name_th']."' data-id='".$value['id']."' zipcode='".$value['zip_code']."'>".$value['name_th']."</option>";
				}
				exit();
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
			$this->view('formComplate');
		}
	}
?>