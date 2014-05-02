<?php require_once("../controllers/userFavoriteTacksController.php"); ?>
<!-- The userFavoriteTacksController will set session and object $user,  board objects array $followedboards, boardid with tacks objects array $boards_tacks -->
<?php include("layouts/header.php"); ?>	
<?php $activeMenu = "user_favorite_tacks"; include("layouts/menu.php"); ?>

<div id="content">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>
  
<?php
if($favoritetacks){ ?>
	<table>
    <tr valign="top"> 
   <?php foreach($tacks as $tack){ ?>
	     
	   <td >  
	      <img src= <?php echo $tack->picture_url;?> width=200px height=200px/>
	      <a href= <?php echo $tack->website_url;?> > <?php echo htmlentities($tack->description);?> </a><br>
		  <a href= "user_retack.php?tackid=<?php echo urlencode($tack->tack_id);?>" > ReTack </a> &nbsp;
		  <?php 
		  if($board->user_id == $_SESSION["user_id"]) { 
			  $output="<a href= \"user_edit_tack.php?tackid=".urlencode($tack->tack_id)."&boardid=".urlencode($board->board_id)."\"> Edit </a>&nbsp; ";
			  $output.="<a href= \"../controllers/userDeleteTackController.php?tackid=".urlencode($tack->tack_id)."&boardid=".urlencode($board->board_id)."\" ";
			  $output.="onclick=\"return confirm('Are you sure?');\"> Delete </a>";
			  echo $output;
		  }
		  ?> 

	   </td>
		    
  <?php } ?>
   </tr>
    </table>
<?php } ?>
</div>

<?php include("layouts/footer.php"); ?>