<?php require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?> 
<?php 
	$user = User::find_by_id($_SESSION["user_id"]);
	$tacks = Tack::find_tacks_by_user_id($_SESSION["user_id"]); //return tack objects array
	$singletack = Tack::find_by_id(1); //for test
	?>