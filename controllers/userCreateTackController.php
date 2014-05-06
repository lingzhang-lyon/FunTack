<?php
//This userCreateTackController is to handle the post request from user_create_board.php

require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?>
<?php 
  $user = User::find_by_id($_SESSION["user_id"]);
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
 		Tack::create_tack_and_link_to_board($_SESSION["user_id"],$_GET["boardid"],$_POST["websiteurl"],
                                             $_POST["pictureurl"],$_POST["description"]);
       
 
    if ($result) {
      // Success
      $_SESSION["message"] = "Tack created.";
      BasicHelper::redirect_to("user_board.php?id=".$board->board_id);
    } else {
      // Failure
      $_SESSION["message"] = "Tack creation failed.";
    }
  
  } 
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))
?>