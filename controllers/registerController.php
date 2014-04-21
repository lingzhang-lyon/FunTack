<?php require_once("../helper/initializeHelper.php"); ?>
<?php
if (Session::logged_in()) BasicHelper::redirect_to("user_dashboard.php");
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("email","firstname","lastname", "password");
  ValidationHelper::validate_presences($required_fields);
  
  
  if (empty(Session::$errors)) {
    // Perform Create

    $firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
    $password = $_POST["password"];
    
    $result = User::insert_user($firstname, $lastname, $email,$password);

    if ($result) {
      // Success
	  $user=User::find_by_email($email);
      $_SESSION["email_id"] = $user->email_id;
      BasicHelper::redirect_to("login.php");
    } else {
      // Failure
      $_SESSION["message"] = "User account creation failed.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>