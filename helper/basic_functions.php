<?php  //basic helper functions for funtack

	function redirect_to($new_location) {
	  header("Location: " . $new_location);
	  exit;
	}
	
	function form_errors($errors=array()) {
		$output = "";
		if (!empty($errors)) {
		  $output .= "<div class=\"error\">";
		  $output .= "Please fix the following errors:";
		  $output .= "<ul>";
		  foreach ($errors as $key => $error) {
		    $output .= "<li>";
				$output .= htmlentities($error);
				$output .= "</li>";
		  }
		  $output .= "</ul>";
		  $output .= "</div>";
		}
		return $output;
	}


//login helper functions	
	function attempt_login($email, $password) {
		
		$user = User::find_by_email($email);  
	
		if ($user) {
			// found user, now check password
			if ($password === $user["password"]) {
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


	function logged_in() {
		return isset($_SESSION['user_id']);
	}

	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("login.php");
		}
	}
	
//end login helper functions


?>