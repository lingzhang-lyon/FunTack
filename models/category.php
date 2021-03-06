<?php
	require_once("database.php");
	
class Category {
	
	public $id;
	public $category_name;
	
	
	private static function instantiate ($record){
		$object =new self;
		$object->id = $record['id'];
		$object->category_name =$record['name'];
		return $object;
	}
	
	public static function find_by_name($categoryname){
		global $database;
		$safe_categoryname = $database->escape_value($categoryname);
		$result_set = $database->query("select * from categories where name = '{$safe_categoryname}' limit 1");
		$row = $database->fetch_array($result_set);
		$object =static::instantiate ($row);		
		return $object;
	}
	
	public static function find_by_id($categoryid){ //not success
		global $database;
		$result_set = $database->query("select * from categories where id = {$categoryid} limit 1");
		$row = $database->fetch_array($result_set);
		$object =static::instantiate ($row);
		return $object;
	}
	
	public static function find_all(){ //test success
		global $database;
		$result_set = $database->query("select * from categories");
		$object_array = array();
		while($row = $database->fetch_array($result_set)){
			$object_array[] = static::instantiate ($row);
		}
		return $object_array;
		
	}

	
	
}

?>