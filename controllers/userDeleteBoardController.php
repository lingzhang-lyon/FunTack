<?php require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?>
<?php 
  $user = User::find_by_id($_SESSION["user_id"]);
  $board = Board::find_by_id($_GET["boardid"]);

?>
<?php
if($board->user_id==$user->user_id){//make sure the board belong to the user
	$result=Board::delete_board($user->user_id,$board->board_id);
	if($result){
        $_SESSION["message"] = "The board has been deleted.";
        BasicHelper::redirect_to("../views/user_myboards.php");
    } else {
      // Failure
      $_SESSION["message"] = "Delete board failed.";
	  BasicHelper::redirect_to("../views/user_myboards.php");
    }
}	
else {
    $_SESSION["message"] = "Not your board, delete board failed.";
    BasicHelper::redirect_to("../views/user_myboards.php");
}
		


?>
