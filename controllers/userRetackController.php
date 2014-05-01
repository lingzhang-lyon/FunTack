<?php require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?>
<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("boardid","tackid");
  ValidationHelper::validate_presences($required_fields);
  
  if (empty(Session::$errors)) {
 
    $result = 
		Tack::link_tack_to_board($_POST["boardid"], $_POST["tackid"]);
       

    if ($result) {
      // Success
      $_SESSION["message"] = "The tack has been add to your board.";
      BasicHelper::redirect_to("user_myboards.php");
    } else {
      // Failure
      $_SESSION["message"] = "Retack failed.";
    }
  
  }
}  
?>
<?php
$tack = Tack::find_by_id($_GET["tackid"]);
$user = User::find_by_id($_SESSION["user_id"]);
$boards = Board::find_boards_by_user_id($_SESSION["user_id"]);
?> 