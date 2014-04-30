<?php require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?>
<?php 
if (isset($_POST['newtacksubmit'])) {
	  // Process the form
	  if (empty(Session::$errors)) {
	  $newtack_boardid=$_POST["newtack_boardid"];
      //BasicHelper::redirect_to("user_create_tack.php" );
	  BasicHelper::redirect_to("user_create_tack.php?boardid=".$newtack_boardid."" );
	  } 
}
	
?>
<?php 
	$user = User::find_by_id($_SESSION["user_id"]);
	$boards = Board::find_boards_by_user_id($_SESSION["user_id"]); //return board objects array
	
	$boardid_tacks = array();
	$i=0;
	$boardid=0;
	while (!empty($boards[$i]) ){
		$boardid=$boards[$i]->board_id;
		$temptacks = Tack::find_latest_tacks_by_board_id(3,$boardid);
	    $boardid_tacks[$boardid]=$temptacks;
		$i++;
	}

	
?>
