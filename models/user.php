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
		//will return user objects array
		return self::find_by_sql("select * from users");
	}
	
	public static function find_by_id($id=0) { //test sucess
		//will return user object
		global $database;
		$result_array = static::find_by_sql("select * from users where user_id={$id} limit 1");
		return $result_array[0];
	}
	
	public static function find_by_email($email="") {  //test sucess
		//will return user object
		global $database;
		$safe_email = $database->escape_value($email);
		$result_array = static::find_by_sql("select * from users where email_id = '{$safe_email}' limit 1");
		return $result_array[0];
		
	}
		
	public static function find_by_sql($sql=""){  //test success
		//will return user objects array
		global $database;
		$result_set =$database->query($sql);
		$object_array = array();
		while($row = $database->fetch_array($result_set)){
			$object_array[] = static::instantiate ($row);
		}
		return $object_array;
		
	}
		
	//login helper functions	
	public static function attempt_login($email="", $password="") {
		
			$user = static::find_by_email($email);  
	
			if ($user) {
				// found user, now check password
				if ($password === $user->password) {
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
	
	//end login helper functions
	
	public static function insert_user($firstname, $lastname, $email,$password){
		global $database;
		$safe_email = $database->escape_value($email);
		$safe_firstname = $database->escape_value($firstname);
		$safe_lastname= $database->escape_value($lastname);
		$safe_password = $database->escape_value($password);
	    $sql  = "INSERT INTO users (";
	    $sql  .= "  first_name, last_name, email_id, password ";
	    $sql  .= ") VALUES (";
	    $sql  .= "  '{$safe_firstname}', '{$safe_lastname}','{$safe_email}','{$safe_password}' ";
	    $sql  .= ")";
		$result_set =$database->query($sql);
		return $result_set;		
	}
	
	public static function update_user($userid, $firstname, $lastname, $email,$password){
		global $database;
		$safe_email = $database->escape_value($email);
		$safe_firstname = $database->escape_value($firstname);
		$safe_lastname= $database->escape_value($lastname);
		$safe_password = $database->escape_value($password);
	    $sql  = "UPDATE users SET ";
	    $sql .= "first_name = '{$safe_firstname}', ";
		$sql .= "last_name = '{$safe_lastname}', ";
	    $sql .= "email_id = '{$safe_email}', ";
	    $sql .= "password = '{$safe_password}' ";
	    $sql .= "WHERE user_id = {$userid} ";
	    $sql .= "LIMIT 1";
	    $result = $database->query($sql);
		return $result;	
	}
	
}

	
?>
