<?php  //basic helper functions for funtack

class BasicHelper {
	
	public static function redirect_to($new_location) {
	  header("Location: " . $new_location);
	  exit;
	}
	
}

?>