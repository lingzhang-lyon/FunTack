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
		$object_array = array();
		while($row = $database->fetch_array($result_set)){
			$object_array[] = static::instantiate ($row);
		}
		return $object_array;		
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
	
}