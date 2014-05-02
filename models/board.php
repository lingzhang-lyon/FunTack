<?php
	require_once("database.php");
	
class Board {
	
	public $board_id; 
	public $category_id; 
	public $user_id; 
	public $name;
	public $description;
	public $created_date; 
	public $no_of_tacks;
	public $privacy;
	
	private static function instantiate ($record){ // test sucess
		$object =new self;
		$object->board_id=$record['board_id'];
		$object->category_id =$record['category_id'];
		$object->user_id =$record['user_id'];
		$object->name =$record['name'];
		$object->description =$record['description'];
		$object->created_date =$record['created_date'];
		$object->no_of_tacks =$record['no_of_tacks'];
		$object->privacy =$record['privacy'];
		return $object;
	}
	
	public static function find_by_sql($sql=""){ // test sucess
		//will return objects array
		global $database;
		$result_set =$database->query($sql);
		if ($result_set){
			$object_array = array();
			while($row = $database->fetch_array($result_set)){
				$object_array[] = static::instantiate ($row);
			}
			return $object_array;
		}
		else return NULL;		
	}
	
	public static function find_all(){
		//will return board objects array
		return self::find_by_sql("select * from boards");
	}
	
	public static function find_by_id($id=0) { //test sucess
		//will return board object
		$result_array = static::find_by_sql("select * from boards where board_id={$id} limit 1");
		return $result_array[0] ;
		
	}
	
	public static function find_boards_by_user_id($userid=0) {  //test sucess
		//will return board objects array
		return static::find_by_sql("select * from boards where user_id = {$userid}");
		
	}
	
	public static function find_followed_boards_by_user_id($userid=0) {  //test sucess
		//will return board objects array
		global $database;
		$result_set= $database->query("select * from user_follow_boards where user_id = {$userid}");
		if($result_set){
			$object_array = array();
			while($row = $database->fetch_array($result_set)){		
				$object_array[] = static::find_by_id ($row['board_id']);
			}
			return $object_array;
		}
		else return NULL;	
		
	}
	
	public static function find_followed_board($userid=0,$boardid=0) {  //test sucess
		//will return board objects array
		global $database;
		$result_set = $database->query("select * from user_follow_boards where user_id = {$userid} and board_id = {$boardid} limit 1");
		$result=$database->fetch_array($result_set);
		return $result;
		
	}
	
	public static function create_board($userid=0,$boardname="",$categoryid=0,$description="",$boardtype=0) {
		global $database;
		$safe_boardname = $database->escape_value($boardname);
		$safe_description= $database->escape_value($description);
		$time=$database->escape_value(date("Y-m-d"));
	    $sql  = "INSERT INTO boards (";
	    $sql  .= "  user_id, name, category_id, description,created_date, privacy ";
	    $sql  .= ") VALUES (";
	    $sql  .= "  {$userid}, '{$safe_boardname}', {$categoryid},'{$safe_description}','{$time}',{$boardtype} ";
	    $sql  .= ")";
		$result_set =$database->query($sql);
		return $result_set;	
		
	}
	
	public static function update_board($boardid=0,$boardname="",$categoryid=0,$description="",$boardtype=0) {
		global $database;
		$safe_boardname = $database->escape_value($boardname);
		$safe_description= $database->escape_value($description);
		$sql  = "UPDATE boards SET ";
	    $sql  .= "name= '{$safe_boardname}', ";		
	    $sql  .= "category_id= {$categoryid}, ";
		$sql  .= "description= '{$safe_description}', ";
		$sql  .= "privacy= {$boardtype} ";
	    $sql .= "WHERE board_id = {$boardid} ";
	    $sql .= "LIMIT 1";
		$result_set =$database->query($sql);
		return $result_set;	
		
	}
	
	public static function delete_board($userid=0,$boardid=0){
		global $database;
		$sql = "delete from boards where ";	
		$sql.= "user_id = {$userid} ";
		$sql.= "and board_id = {$boardid} ";
		$result =$database->query($sql);
		return $result;	
	}
	
	public static function add_board_followed($userid=0,$boardid=0){
		global $database;
		$sql = "insert into user_follow_boards (user_id, board_id ) values ";	
		$sql.= "( {$userid}, ";
		$sql.= "{$boardid} )";
		$result =$database->query($sql);
		return $result;	
	}
	
	public static function delete_board_from_followed($userid=0,$boardid=0){
		global $database;
		$sql = "delete from user_follow_boards where ";	
		$sql.= "user_id = {$userid} ";
		$sql.= "and board_id = {$boardid} ";
		$result =$database->query($sql);
		return $result;
	
	}
	
	
	public static function find_boards_by_category_id($categoryid){
		//will return board objects array
		global $database;
		$result_array= static::find_by_sql("select * from boards where category_id = {$categoryid}");
		return $result_array ;
		
	}
	
	public static function find_recent_boards($number,$privacy){
		//will return board objects array
		return self::find_by_sql("select * from boards where privacy={$privacy} Order by created_date desc limit {$number} ");
	}
	
}