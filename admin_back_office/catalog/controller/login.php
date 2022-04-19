<?php 
	class LoginController extends Controller {
	    public function index() {
	    	$this->render('login');
	    }
	    public function forgot() {
	    	$data = array();
	    	$data['result'] = get('result');
	    	if(method_post()){
	    		$email = post('email');
	    		$subject = "แจ้งลืมรหัสผ่าน";
	    		$password = rand(100000000,999999999);
	    		
	    		$msg = 'เพื่อยันยันการเปลี่ยนรหัสผ่านใหม่เป็น <b>'.$password.'</b> <a href="'.route('login/active&key='.encrypt($password).'&m='.encrypt($email)).'">คลิกที่นี่</a> ';
	    		sendmailSmtp($email,$msg,$subject);
	    		$this->redirect('login/forgot&result=ระบบได้ส่งการยันยันการเปลี่ยนรหัสผ่านไปที่ email '.$email);
	    	}else{
	    		$this->render('forgot',$data);
	    	}
	    }
	    public function active(){
	    	$email 	= get('m');
	    	$key 	= get('key');
	    	if($email and $key){
		    	$this->model('master')->changePassword($mail,$pass);
		    	redirect('login&result=reset');
		    }
	    	redirect('login&result=fail');
	    }
	}
?>