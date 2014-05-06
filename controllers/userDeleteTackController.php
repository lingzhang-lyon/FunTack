<?php
//this controller will check the tack and then delete the tack

require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?>
<?php 
  $user = User::find_by_id($_SESSION["user_id"]);
  $tack = Tack::find_by_id($_GET["tackid"]);
  $board = Board::find_by_id($_GET["boardid"]);

?>
<?php
if($tack->user_id==$user->user_id){ //if this tack created by the user originally
	//delete from tacks table, will delete from board_tacks table cascadely.
	//echo "user created this tack";
	$result=Tack::delete_tack($user->user_id,$tack->tack_id);
	if($result){
        $_SESSION["message"] = "The tack has been deleted from your board.";
        BasicHelper::redirect_to("../views/user_board.php?id={$board->board_id}");
    } else {
      // Failure
	  //echo "failed";
      $_SESSION["message"] = "Delete tack failed.";
	  BasicHelper::redirect_to("../views/user_board.php?id={$board->board_id}");
    }
	
		
}
else{ //if this tack not created by the user, just retacked from others
	//delete from board_tacks table, the original tack will still be there
	$result=Tack::delete_tack_from_board($board->board_id,$tack->tack_id);
	if($result){
        $_SESSION["message"] = "The tack has been deleted from your board.";
        BasicHelper::redirect_to("../views/user_board.php?id={$board->board_id}");
    } else {
      // Failure
	  //echo "failed";
      $_SESSION["message"] = "Delete tack failed.";
	  BasicHelper::redirect_to("../views/user_board.php?id={$board->board_id}");
    }
}
?>
