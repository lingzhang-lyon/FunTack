<?php require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?> 
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