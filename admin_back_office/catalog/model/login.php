<?php 
	class LoginModel extends db {
		public function auth($data = array()){
			$result = array(
				'result' => 'fail'
			);
			$username		= $this->escape($data['username']);
			$password		= $this->escape($data['password']);
			$sql = "SELECT * FROM AUT_USER 
						JOIN DEPARTMENT ON AUT_USER.DEPARTMENT_ID = DEPARTMENT.DEPARTMENT_ID 
						JOIN AUT_USER_GROUP ON AUT_USER.AUT_USER_ID = AUT_USER_GROUP.AUT_USER_ID 
						JOIN AUT_GROUP ON AUT_USER_GROUP.USER_GRUOP_ID = AUT_GROUP.USER_GROUP_ID
					WHERE 
						AUT_USER.AUT_USERNAME ='".$username."' 
						AND AUT_USER.AUT_PASSWORD = MD5('".$password."') 
						AND AUT_USER.ACTIVE_STATUS = 1
						AND AUT_USER.DELETE_FLAG = 0";
			$result_login = $this->query($sql);
			// echo $result_login->sql;exit();
			if($result_login->num_rows > 0){
				$timestamp = date('Y-m-d H:i:s');
				$AUT_USER_ID = $result_login->row['AUT_USER_ID'];
				$sql_update = "UPDATE AUT_USER SET UPDATE_TIMESTAMP = '".$timestamp."' WHERE AUT_USER_ID = ".$AUT_USER_ID;
				$this->query($sql_update);
				$result = array(
					'result' 	=> 'success',
					'detail'	=> $result_login->row,
					'last_login'=> $timestamp
				);
			}
			return $result;
		}
	}
?>