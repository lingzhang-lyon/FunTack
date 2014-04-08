<?php require_once("../models/session.php"); ?>
<?php require_once("../models/database.php"); ?>
<?php require_once("../models/user.php"); ?>
<?php require_once("../helper/basic_functions.php"); ?>
<?php require_once("../helper/validation_functions.php"); ?>
<?php
$email = "";

if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("email", "password");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Attempt Login

		 $email = $_POST["email"];		
		 $password = $_POST["password"];
		
		$found_user = attempt_login($email, $password);

    if ($found_user) {
      // Success
			// Mark user as logged in
			$_SESSION["user_id"] = $found_user["user_id"];
			$_SESSION["email_id"] = $found_user["email_id"];
			if ($found_user["admin_authority"] == 1 ) redirect_to("admin_dashboard.php");
			else redirect_to("user_dashboard.php");
    } else {
      // Failure
      $_SESSION["message"] = "Email/password not found.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>