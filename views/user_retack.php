<?php require_once("../controllers/userRetackController.php"); ?>
<!-- The userRetackController will set session and the object $user, $tack, object array $boards -->
<?php include("layouts/header.php"); ?>	
<?php $activeMenu = ""; include("layouts/menu.php"); ?>

<div id="content" style="margin-top:15px;">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>
  
  <form action="user_retack.php?tackid=<?php echo urlencode($tack->tack_id);?>" method="post">
  <div class="row row-offcanvas row-offcanvas-right" style="margin-left:10px;margin-right:10px;">
	<div class="col-xs-8 col-sm-6 sidebar-offcanvas panel panel-default" id="Div2" role="navigation" style="background:rgba(255,248,168,0.4);">
	<div class="thumbnail " style="margin-top: 10px;">
	<?php $output= " <a href= ".$tack->website_url.">"  ;
	      $output.="<img src=".$tack->picture_url." class='img-responsive img-rounded' />.</a><div class='caption'>". htmlentities($tack->description);
		  $output.="<input type='hidden' name='tackid' value='".$tack->tack_id."'/>";
		  echo $output;
	?>
				</div>
			</div> 
		</div>
	</div><!--/row thumbnail-->
	<p>Select one of your boards:		
	<select name="boardid" >
	<?php
		foreach($boards as $board) { 
			echo "<option value ={$board->board_id}> {$board->name} </option>";
	}?>
	</select>	
	<input type="submit" name="submit" class="btn btn-success" value="Submit"/>
	</p>
	</form>
</div>
<?php include("layouts/footer.php"); ?>