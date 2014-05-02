<?php require_once("../controllers/userRetackController.php"); ?>
<!-- The userRetackController will set session and the object $user, $tack, object array $boards -->
<?php include("layouts/header.php"); ?>	
<?php $activeMenu = ""; include("layouts/menu.php"); ?>

<div id="content">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>
  
  <form action="user_retack.php?tackid=<?php echo urlencode($tack->tack_id);?>" method="post">
	<?php $output= " <a href= ".$tack->website_url.">" . htmlentities($tack->description). "</a><br>" ;
	      $output.="<img src=".$tack->picture_url." width=200px height=200px /> <br>";
		  $output.="<input type='hidden' name='tackid' value='".$tack->tack_id."'/>";
		  echo $output;
	?>
	<p>Select one of your boards:		
	<select name="boardid" >
	<?php
		foreach($boards as $board) { 
			echo "<option value ={$board->board_id}> {$board->name} </option>";
	}?>
	</select>	
	<input type="submit" name="submit" value="Submit"/>
	</p>
	
</div>
<?php include("layouts/footer.php"); ?>