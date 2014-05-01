<?php
	require_once("database.php");
	
class Tack {
	
	public $tack_id;
	public $user_id;
	public $website_url;
	public $picture_url;
	public $description;
	public $no_of_retacks;
	public $no_of_favorites;
	
	private static function instantiate ($record){ // test sucess
		$object =new self;
		$object->tack_id =$record['tack_id'];
		$object->user_id =$record['user_id'];
		$object->website_url =$record['website_url'];
		$object->picture_url =$record['picture_url'];
		$object->description =$record['description'];
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
	
	public static function find_tack($userid=0,$websiteurl="",$pictureurl="",$description="") { 
		global $database;
		$safe_websiteurl = $database->escape_value($websiteurl);
		$safe_pictureurl = $database->escape_value($pictureurl);
		$safe_description= $database->escape_value($description);
		$sql = "select * from tacks where "; 
		$sql.= "user_id = {$userid} ";
		if($safe_websiteurl!=""){
		$sql.= "and website_url = '{$safe_websiteurl}' ";
	    }
		if($safe_pictureurl!=""){
			$sql.= "and picture_url = '{$safe_pictureurl}' ";
		}
		if($safe_description!=""){
			$sql.= "and description = '{$safe_description}' ";
		}	
		$sql.= "limit 1 ";
		$result_set =$database->query($sql);
		if($result_set){
			$object_array = array();
			while($row = $database->fetch_array($result_set)){		
				$object_array[] = static::instantiate ($row);
			}
			return $object_array[0];
		}	
		else return NULL;
	}
		
	
	public static function create_tack($userid=0,$websiteurl="",$pictureurl="",$description="") {  //test success
		global $database;
		$safe_websiteurl = $database->escape_value($websiteurl);
		$safe_pictureurl = $database->escape_value($pictureurl);
		$safe_description= $database->escape_value($description);
	    $sql  = "INSERT INTO tacks (";
	    $sql  .= "  user_id, website_url, picture_url, description ";
	    $sql  .= ") VALUES (";
	    $sql  .= "  {$userid}, '{$safe_websiteurl}', '{$safe_pictureurl}','{$safe_description}' ";
	    $sql  .= ")";
		$result_set =$database->query($sql);
		return $result_set;			
	}
	
	public static function update_tack($tackid=0,$websiteurl="",$pictureurl="",$description="") {  
		global $database;
		$safe_websiteurl = $database->escape_value($websiteurl);
		$safe_pictureurl = $database->escape_value($pictureurl);
		$safe_description= $database->escape_value($description);
	    
		$sql  = "UPDATE tacks SET ";
	    $sql  .= "website_url= '{$safe_websiteurl}', ";		
	    $sql  .= "picture_url= '{$safe_pictureurl}', ";
		$sql  .= "description= '{$safe_description}' ";
	    $sql .= "WHERE tack_id = {$tackid} ";
	    $sql .= "LIMIT 1";
		$result_set =$database->query($sql);
		return $result_set;			
	}
	
	public static function delete_tack($userid=0,$tackid=0,$websiteurl="",$pictureurl="",$description="") { //test success
		//must have user_id
		global $database;
		$safe_websiteurl = $database->escape_value($websiteurl);
		$safe_pictureurl = $database->escape_value($pictureurl);
		$safe_description= $database->escape_value($description);
		$sql = "delete from tacks where ";	
		$sql.= "user_id = {$userid} ";
		if($tackid!=0){ 
			$sql.= "and tack_id = {$tackid} ";
	    }
		if($safe_websiteurl!=""){
			$sql.= "and website_url = '{$safe_websiteurl}' ";
	    }
		if($safe_pictureurl!=""){
			$sql.= "and picture_url = '{$safe_pictureurl}' ";
		}
		if($safe_description!=""){
			$sql.= "and description = '{$safe_description}' ";
		}	
		$sql.= "limit 1 ";
		$result =$database->query($sql);
		return $result;		
	}
	
	
	
	public static function link_tack_to_board($boardid=0,$tackid=0){
		global $database;
	    $sql  = "INSERT INTO board_tacks (";
	    $sql  .= "  board_id, tack_id ";
	    $sql  .= ") VALUES (";
	    $sql  .= "  {$boardid}, {$tackid} ";
	    $sql  .= ")";
		$result_set =$database->query($sql);
		return $result_set;			
		
	}
	
	public static function delete_tack_from_board($boardid=0,$tackid=0){
		global $database;
	    $sql  = "DELETE FROM board_tacks WHERE ";
	    $sql  .= " board_id = {$boardid} ";
	    $sql  .= "AND tack_id = {$tackid} ";
		$result_set =$database->query($sql);
		return $result_set;
	}
	
	public static function create_tack_and_link_to_board (
	    $userid=0,$boardid=0,$websiteurl="",$pictureurl="",$description="") { 
			
		global $database;
		$safe_boardid = $database->escape_value($boardid);
		$result1=static::create_tack($userid,$websiteurl,$pictureurl,$description);
		if($result1){
			//echo "tack created, try to link it to board. ";
			$tack=static::find_tack($userid,$websiteurl,$pictureurl,$description);
			//if($tack) {echo "new tack found "; echo $tack->description;}
			$result2 = static::link_tack_to_board($safe_boardid,$tack->tack_id);
			if($result2)return $result2;
			else {
				//static::delete_tack($userid,$tack->tack_id);
				static::delete_tack($userid,0,$websiteurl,$pictureurl,$description);
				//echo "tack link to board failed, delete created tack. ";
				return NULL;
			}
		}
		else return $result1;
		
	}
		
		
		   
	
	
	

	
}

?>