<?php
	require_once("database.php");
	
class Tack {
	
	public $tack_id;
	public $user_id;
	public $path;
	public $url;
	public $no_of_retacks;
	public $no_of_favorites;
	
	private static function instantiate ($record){ // test sucess
		$object =new self;
		$object->tack_id =$record['tack_id'];
		$object->user_id =$record['user_id'];
		$object->path =$record['path'];
		$object->url =$record['url'];
		$object->no_of_retacks =$record['no_of_retacks'];
		$object->no_of_favorites =$record['no_of_favorites'];
		return $object;
	}
	
	
	public static function find_by_sql($sql=""){ // test sucess
		//will return objects array
		global $database;
		$result_set =$database->query($sql);
		if($result_set){
			$object_array = array();
			while($row = $database->fetch_array($result_set)){
				$object_array[] = static::instantiate ($row);
			}
			return $object_array;	
		}
		else return NULL;	
	}
	
	public static function find_all(){
		return self::find_by_sql("select * from tacks");
	}
	
	public static function find_by_id($id=0) { //test sucess
		//will return tack object
		global $database;
		$result_array = static::find_by_sql("select * from tacks where tack_id={$id} limit 1");
		return $result_array[0] ;
		
	}
	
	public static function find_tacks_by_user_id($userid=0) {  //test sucess
		//will return tack objects array
		global $database;
		$result_array = static::find_by_sql("select * from tacks where user_id = {$userid}");
		return $result_array ;	
		
	}
	
	public static function find_tacks_by_board_id($boardid=0) {  //test sucess
		//will return tack objects array
		global $database;
		$result_set =$database->query("select tack_id from board_tacks where board_id = {$boardid} ");
		if($result_set){
			$object_array = array();
			while($row = $database->fetch_array($result_set)){		
				$object_array[] = static::find_by_id ($row['tack_id']);
			}
			return $object_array;	
		}
		else return NULL;
				
	}
	
	public static function find_latest_tacks_by_board_id($num=0, $boardid=0) {  
		//will return tack objects array with latest $num tacks
		global $database;
		$sql="select id, tack_id from board_tacks where board_id = {$boardid} Order by id limit " . $num ." ";
		$result_set =$database->query($sql);
		if($result_set){
			$object_array = array();
			while($row = $database->fetch_array($result_set)){		
				$object_array[] = static::find_by_id ($row['tack_id']);
			}
			return $object_array;
		}
		else return NULL;	
				
	}
	
	
	

	
}

?>