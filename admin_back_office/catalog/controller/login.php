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
	    		if($email){
		    		$subject = "แจ้งลืมรหัสผ่าน";
		    		$password = rand(100000000,999999999);

		    		$msg = 'เพื่อยันยันการเปลี่ยนรหัสผ่านใหม่เป็น <b>'.$password.'</b> <a href="'.route('login/active&key='.encrypt($password).'&m='.encrypt($email)).'">คลิกที่นี่</a> ';
		    		$config_email = $this->model('master')->getEmailConfig();
			    	$data_send = array(
						'email_host' 		=> $config_email['email_host'],
						'email_port' 		=> $config_email['email_port'],
						'email_user' 		=> $config_email['email_user'],
						'email_pass' 		=> $config_email['email_pass'],
						'email_send' 		=> $config_email['email_send'],
						'email_stmpsecure' 	=> $config_email['email_stmpsecure']
			    	);
		    		sendmailSmtp($email,$msg,$subject,$data_send);
		    		echo 'ระบบได้ส่งการยันยันการเปลี่ยนรหัสผ่านไปที่ email '.$email;
		    	}else{
		    		echo 'อีเมลไม่ควรเป็นค่าว่าง';
		    	}
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