<?php require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?>
<?php $user = User::find_by_id($_SESSION["user_id"]); ?>
<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("firstname","lastname","email","password");
  ValidationHelper::validate_presences($required_fields);

  
  if (empty(Session::$errors)) {
    
    // Perform Update
	$userid=$_SESSION["user_id"];
    $firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
    $password = $_POST["password"];
    
    $result = User::update_user($userid, $firstname, $lastname, $email,$password);
   
    

    if ($result) {
      // Success
      $_SESSION["message"] = "User updated.";
      BasicHelper::redirect_to("user_dashboard.php");
    } else {
      // Failure
      $_SESSION["message"] = "User update failed.";
    }
  
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))
?>