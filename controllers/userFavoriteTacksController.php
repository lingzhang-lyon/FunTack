<?php require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?> 
<?php 
	$user = User::find_by_id($_SESSION["user_id"]);
	$favoritetacks = Tack::find_favorite_tacks_by_user_id($_SESSION["user_id"]); //return tacks objects array
		
	?>