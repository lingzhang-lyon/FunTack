<?php require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?>
<?php 
$user = User::find_by_id($_SESSION["user_id"]);
$tack = Tack::find_by_id($_GET["tackid"]);
$board = Board::find_by_id($_GET["boardid"]);
?>
<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("websiteurl","pictureurl","description");
  ValidationHelper::validate_presences($required_fields);
 
  
  if (empty(Session::$errors)) {
    
    
 
    $result = 
 		Tack::update_tack($tack->tack_id,$_POST["websiteurl"], $_POST["pictureurl"],$_POST["description"]);
       
 
    if ($result) {
      // Success
      $_SESSION["message"] = "Tack updated.";
      BasicHelper::redirect_to("user_board.php?id=".$board->board_id);
    } else {
      // Failure
      $_SESSION["message"] = "Tack updated failed.";
    }
  
  } 
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))
?>