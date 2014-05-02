<?php require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?>
<?php 
  $user = User::find_by_id($_SESSION["user_id"]);
  $board = Board::find_by_id($_GET["boardid"]);

?>
<?php
$exist=Board::find_followed_board($user->user_id,$board->board_id);
if($exist){//make sure the board is followed by the user
	$result=Board::delete_board_from_followed($user->user_id,$board->board_id);
	if($result){
        $_SESSION["message"] = "The board has been deleted from your followed list.";
        BasicHelper::redirect_to("../views/user_followed_boards.php");
    } else {
      // Failure
      $_SESSION["message"] = "Delete board from followed failed.";
	  BasicHelper::redirect_to("../views/user_followed_boards.php");
    }
}	
else {
    $_SESSION["message"] = "This board is not in your followed list, could not delete from it.";
    BasicHelper::redirect_to("../views/user_dashboard.php");
}
		


?>
