<?php require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?>
<?php 
$user = User::find_by_id($_SESSION["user_id"]);
$board = Board::find_by_id($_GET["boardid"]);
$categories = Category::find_all(); 
?>
<?php
if (isset($_POST['submit'])) {
  // Process the form 
  // validations
  $required_fields = array("boardname","categoryid","description", "boardtype");
  ValidationHelper::validate_presences($required_fields);

  
  if (empty(Session::$errors)) {

    $result = 
		Board::update_board($board->board_id, $_POST["boardname"], $_POST["categoryid"],$_POST["description"], $_POST["boardtype"]);
       

    if ($result) {
      // Success
      $_SESSION["message"] = "Board updated.";
      BasicHelper::redirect_to("user_myboards.php");
    } else {
      // Failure
      $_SESSION["message"] = "Board update failed.";
    }
  
  }
  
}
?>