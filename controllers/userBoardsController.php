<?php require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?> 
<?php 
	$user = User::find_by_id($_SESSION["user_id"]);
	$boards = Board::find_boards_by_user_id($_SESSION["user_id"]); //return board objects array
	$firstboard = $boards[0]; //for test
	$tacks = Tack::find_tacks_by_board_id($firstboard->board_id); //return tack objects array //for test
	$singleboard = Board::find_by_id (1); //for test
	?>