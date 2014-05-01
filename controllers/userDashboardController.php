<?php require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?> 
<?php 
	$user = User::find_by_id($_SESSION["user_id"]);
	//$tacks = Tack::find_tacks_by_user_id($_SESSION["user_id"]); //return tack objects array
    $categories = Category::find_all(); 
	$boards = Board::find_recent_boards(5,0);
	?>
<?php

if (isset($_POST['submit'])) {
  // Process the form 
  // validations
  $required_fields = array("categoryid");
  ValidationHelper::validate_presences($required_fields);
 
  if (empty(Session::$errors)) {
    
    $boards = Board::find_boards_by_category_id($_POST["categoryid"]);
  }
}

$boardid_tacks = array();
$i=0;
$boardid=0;
while (!empty($boards[$i]) ){
	$boardid=$boards[$i]->board_id;
	$temptacks = Tack::find_latest_tacks_by_board_id(4,$boardid);
    $boardid_tacks[$boardid]=$temptacks;
	$i++;
}
  
?>