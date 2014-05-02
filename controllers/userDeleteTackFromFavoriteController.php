<?php require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?>
<?php 
  $user = User::find_by_id($_SESSION["user_id"]);
  $tack = Tack::find_by_id($_GET["tackid"]);

?>
<?php

$exist=Tack::find_favorite_tack($user->user_id,$tack->tack_id);
if($exist){ //make sure the tack is not add favorite yet
	$result=Tack::delete_tack_from_favorite($user->user_id,$tack->tack_id);
	if($result){
        $_SESSION["message"] = "The tack has been deleted from your favorite list.";
        BasicHelper::redirect_to("../views/user_favorite_tacks.php");
    } else {
      // Failure
      $_SESSION["message"] = "Delete favorite tack failed.";
	  BasicHelper::redirect_to("../views/user_favorite_tacks.php");
    }
}
else {
    $_SESSION["message"] = "This tack not in you favorite list, could not delete from it";
    BasicHelper::redirect_to("../views/user_favorite_tacks.php");
}
?>
