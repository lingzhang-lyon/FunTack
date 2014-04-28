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
		global $database;
		$result_array = static::find_by_sql("select * from boards where board_id={$id} limit 1");
		return $result_array[0] ;
		
	}
	
	public static function find_boards_by_user_id($userid=0) {  //test sucess
		//will return board objects array
		global $database;
		$result_array = static::find_by_sql("select * from boards where user_id = {$userid}");
		return $result_array ;	
		
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
	
	public static function create_board($userid=0,$boardname="",$categoryid=0,$description="",$boardtype=0) {
		global $database;
		$safe_boardname = $database->escape_value($boardname);
		$safe_description= $database->escape_value($description);
		$time=$database->escape_value(date("Y-m-d"));
	    $sql  = "INSERT INTO boards (";
	    $sql  .= "  user_id, name, category_id, description,created_date ";
	    $sql  .= ") VALUES (";
	    $sql  .= "  {$userid}, '{$safe_boardname}', {$categoryid},'{$safe_description}','{$time}' ";
	    $sql  .= ")";
		$result_set =$database->query($sql);
		return $result_set;	
		
	}
	
}