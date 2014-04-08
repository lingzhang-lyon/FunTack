<?php
	require_once("database.php");
	
class User {
	
	public $user_id;
	public $email_id;
	public $first_name;
	public $last_name;
	public $password;
	public $admin_authority;
	
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
	
}

	
?>
