<?php
	require_once("database.php");
	
class User {
	
	public $user_id;
	public $email_id;
	public $first_name;
	public $last_name;
	public $password;
	public $admin_authority;
	
	private static function instantiate ($record){
		$object =new self;
		$object->user_id =$record['user_id'];
		$object->email_id =$record['email_id'];
		$object->password =$record['password'];
		$object->last_name =$record['last_name'];
		$object->first_name =$record['first_name'];
		$object->admin_authority =$record['admin_authority'];
		return $object;
	}
	
	public static function find_all(){
		return self::find_by_sql("select * from users");
	}
	
	public static function find_by_id($id=0) {
		global $database;
		$result_set = self::find_by_sql("select * from users where user_id={$id} limit 1");
		$found = $database->fetch_array($result_set);
		return $found;
	}
	
	public static function find_by_email($email="") {  //test sucess
		global $database;
		$safe_email = $database->escape_value($email);
		$result_set = self::find_by_sql("select * from users where email_id = '{$safe_email}' limit 1");
		$found = $database->fetch_array($result_set);
		return $found;
		
	}
		
	public static function find_by_sql($sql=""){  //test success
		global $database;
		$result_set =$database->query($sql);
		return $result_set;
		

	}
		
	//login helper functions	
	public static function attempt_login($email, $password) {
		
			$user = User::find_by_email($email);  
	
			if ($user) {
				// found user, now check password
				if ($password === $user["password"]) {
					// password matches
					return $user;
				} else {
					// password does not match
					return false;
				}
			} else {
				// admin not found
				return false;
			}
		}


	public static	function logged_in() {
			return isset($_SESSION['user_id']);
		}

	public static	function confirm_logged_in() {
			if (!logged_in()) {
				redirect_to("login.php");
			}
		}
	
	//end login helper functions
}

	
?>
