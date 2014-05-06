<?php
// This Controller is to add selected tack to user's favorite list
require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?>
<?php 
  $user = User::find_by_id($_SESSION["user_id"]);
  $tack = Tack::find_by_id($_GET["tackid"]);

?>
<?php

$exist=Tack::find_favorite_tack($user->user_id,$tack->tack_id);
if(!$exist){ //make sure the tack is not add favorite yet
	$result=Tack::add_tack_favorite($user->user_id,$tack->tack_id);
	if($result){ //successfully
        $_SESSION["message"] = "The tack has been added to your favorite list.";
        BasicHelper::redirect_to("../views/user_favorite_tacks.php");
    } else {
      // Failure
      $_SESSION["message"] = "Favorite tack failed.";
	  BasicHelper::redirect_to("../views/user_favorite_tacks.php");
    }
}
else { // already added
    $_SESSION["message"] = "You already favorite this tack. No need to favorite again";
    BasicHelper::redirect_to("../views/user_favorite_tacks.php");
}

?>