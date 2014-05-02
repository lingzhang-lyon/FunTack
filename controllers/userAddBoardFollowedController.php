<?php require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?>
<?php 
  $user = User::find_by_id($_SESSION["user_id"]);
  $board = Board::find_by_id($_GET["boardid"]);

?>
<?php
if($board->user_id!=$user->user_id){//make sure the board not belong to the user
	echo "test";
	$exist=Board::find_followed_board($user->user_id,$board->board_id);
	if($exist){ //make sure the board is not add followed yet
	    $_SESSION["message"] = "You already followed this board. No need to follow again";
	    BasicHelper::redirect_to("../views/user_dashboard.php");
	}
	else {
		$result=Board::add_board_followed($user->user_id,$board->board_id);
		if($result){
	        $_SESSION["message"] = "The board has been added to your followed list.";
	        BasicHelper::redirect_to("../views/user_followed_boards.php");
	    } else {
	      // Failure
	      $_SESSION["message"] = "Follow board failed.";
		  BasicHelper::redirect_to("../views/user_dashboard.php");
	    }

	}
}	
else {
    $_SESSION["message"] = "It's your board, no need to follow.";
    BasicHelper::redirect_to("../views/user_dashboard.php");
}
		


?>