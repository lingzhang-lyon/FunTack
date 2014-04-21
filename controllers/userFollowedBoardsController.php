<?php require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?> 
<?php 
	$user = User::find_by_id($_SESSION["user_id"]);
	$followedboards = Board::find_followed_boards_by_user_id($_SESSION["user_id"]); //return board objects array
	
	$boardid_tacks = array(); // to store tacks for each board
	$i=0;
	$tempboardid=0;
	while (!empty($followedboards[$i]) ){
		$tempboardid=$followedboards[$i]->board_id;
		$temptacks = Tack::find_latest_tacks_by_board_id(3,$tempboardid);
	    $boardid_tacks[$tempboardid]=$temptacks;
		$i++;
	}
	
	?>