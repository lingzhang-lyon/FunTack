<?php
	require_once("config.php");
	
class MySQLDatabase {
	
	public $connection;
	
	function __construct(){
		$this->open_connection();
	}
	
	public function open_connection(){
		// 1. Create a database connection
		$this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		// Test if connection succeeded
	    if(mysqli_connect_errno()) {
	      die("Database connection failed: " . 
	           mysqli_connect_error() . 
	           " (" . mysqli_connect_errno() . ")"
	      );
	    }
	}
		
	public function close_connection(){
		if(isset($this->connection)){
			mysqli_close($this->connection);
			unset($this->connection);
		}
	}
	
	public function query($sql){  //test index 3 success
	 $result= mysqli_query($this->connection, $sql);
		$this->confirm_query($result);
		return $result;
	}
	
	public function escape_value($string) {
		$escaped_string = mysqli_real_escape_string($this->connection, $string);
		return $escaped_string;
	}
	
	private function confirm_query($result) {  //test index3 success
		if (!$result) {
			die("Database query failed.....");
		}
	}

	public function fetch_array($result_set){ //test index3 success
		return mysqli_fetch_array($result_set);
	}
    
	public function num_rows($result_set){
		return mysqli_num_rows($result_set);
	}
	


}

	$database = new MySQLDatabase();
	$db =& $database;
	
	
?>
