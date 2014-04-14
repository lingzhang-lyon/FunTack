<?php require_once("../helper/initializeHelper.php"); ?>
<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("email", "password");
  ValidationHelper::validate_presences($required_fields);
  
  if (empty(Session::$errors)) {
    // Attempt Login

		 $email = $_POST["email"];		
		 $password = $_POST["password"];
		
		$found_user = User::attempt_login($email, $password);

    if ($found_user) {
      // Success
			// Mark user as logged in
			$_SESSION["user_id"] = $found_user->user_id;
			$_SESSION["email_id"] = $found_user->email_id;
			$_SESSION["first_name"] = $found_user->first_name;
			if ($found_user->admin_authority == 1 ) BasicHelper::redirect_to("admin_dashboard.php");
			else BasicHelper::redirect_to("user_dashboard.php");
    } else {
      // Failure
      $_SESSION["message"] = "Email/password not found.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>