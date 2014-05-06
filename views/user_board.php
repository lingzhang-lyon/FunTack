<?php require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?> 
<?php
$board = Board::find_by_id($_GET["id"]);
$tacks = Tack::find_tacks_by_board_id($_GET["id"]);
?>
<?php include("layouts/header.php"); ?>	
<?php 
if($board->user_id == $_SESSION["user_id"]){
	$activeMenu = "user_myboards";
} 
else $activeMenu = ""; 
include("layouts/menu.php"); ?>

<div id="content">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>
  
  <?php if($board->user_id == $_SESSION["user_id"]) { ?> 
  <!-- if this board own by the user, then allow to create new tack -->
	<br><h4>+ Create New Tack In This Board 
		<a class="btn btn-primary " href="user_create_tack.php?boardid=<?php echo urlencode($board->board_id);?> "> Create</a> 
		</h4><br>
  
  <?php } ?>
  <div class="panel panel-warning"> 
	<div class="panel-heading">
	  <?php echo $board->name?>
		<?php
		if($board->privacy==0) $output="Type: Public";
		else $output="Type: Private";
		echo $output;
		?>
		Category: 
		<?php 
		$category = Category::find_by_id($board->category_id); 
		$output = htmlentities($category->category_name); 
		if($board->user_id == $_SESSION["user_id"]) { 
		  $output.="<a href= \"user_edit_board.php?boardid=".urlencode($board->board_id)."\"> Edit </a>&nbsp; ";
		  $output.="<a href= \"../controllers/userDeleteBoardController.php?boardid=".urlencode($board->board_id)."\" ";
		  $output.="onclick=\"return confirm('Are you sure?');\"> Delete </a>"; 
		 }
		 else $output .= "<a href= \"../controllers/userAddBoardFollowedController.php?boardid=".urlencode($board->board_id). " \" > Follow this board</a> ";
		echo $output;
		?>
		</div>
		<div class="panel-body">
		
		<div class="row row-offcanvas row-offcanvas-right" style="margin-left:10px;margin-right:10px;">
  <?php $i=1;?>
  <?php foreach($tacks as $tack){ ?>
	<?php if ($i%4===1){?>	
		<div class="col-xs-4 col-sm-3 sidebar-offcanvas panel panel-default" id="Div2" role="navigation" style="height:250px;background:rgba(255,248,168,0.4);">
			<div class="thumbnail" style="margin-top: 10px;"><a href="<?php echo $tack->website_url?>">
			  <img src=<?php echo $tack->picture_url;?> class="img-responsive img-rounded"></a>
			  <div class="caption">
				<?php echo htmlentities($tack->description);?>
				<a href= "user_retack.php?tackid=<?php echo urlencode($tack->tack_id);?>" > ReTack </a> &nbsp;
		  <a href= "../controllers/userAddTackFavoriteController.php?tackid=<?php echo urlencode($tack->tack_id);?>" > Favorite</a> &nbsp;
		  <?php 
		  if($board->user_id == $_SESSION["user_id"]) { 
			  $output="<a href= \"user_edit_tack.php?tackid=".urlencode($tack->tack_id)."&boardid=".urlencode($board->board_id)."\"> Edit </a>&nbsp; ";
			  $output.="<a href= \"../controllers/userDeleteTackController.php?tackid=".urlencode($tack->tack_id)."&boardid=".urlencode($board->board_id)."\" ";
			  $output.="onclick=\"return confirm('Are you sure?');\"> Delete </a>";
			  echo $output;
		  }
		  ?> 
			  </div>
			</div> 
		</div>
		<?php } ?>
		<?php if ($i%4===2){?>	
		<div class="col-xs-4 col-sm-3 sidebar-offcanvas panel panel-default" id="Div2" role="navigation" style="height:250px;background:rgba(255,248,168,0.4);">
			<div class="thumbnail" style="margin-top: 10px;"><a href="<?php echo $tack->website_url?>">
			  <img src=<?php echo $tack->picture_url;?> class="img-responsive img-rounded"></a>
			  <div class="caption">
				<?php echo htmlentities($tack->description);?>
				<a href= "user_retack.php?tackid=<?php echo urlencode($tack->tack_id);?>" > ReTack </a> &nbsp;
		  <a href= "../controllers/userAddTackFavoriteController.php?tackid=<?php echo urlencode($tack->tack_id);?>" > Favorite</a> &nbsp;
		  <?php 
		  if($board->user_id == $_SESSION["user_id"]) { 
			  $output="<a href= \"user_edit_tack.php?tackid=".urlencode($tack->tack_id)."&boardid=".urlencode($board->board_id)."\"> Edit </a>&nbsp; ";
			  $output.="<a href= \"../controllers/userDeleteTackController.php?tackid=".urlencode($tack->tack_id)."&boardid=".urlencode($board->board_id)."\" ";
			  $output.="onclick=\"return confirm('Are you sure?');\"> Delete </a>";
			  echo $output;
		  }
		  ?> 
			  </div>
			</div> 
		</div>
		<?php } ?>
		<?php if ($i%4===3){?>	
		<div class="col-xs-4 col-sm-3 sidebar-offcanvas panel panel-default" id="Div2" role="navigation" style="height:250px;background:rgba(255,248,168,0.4);">
			<div class="thumbnail" style="margin-top: 10px;"><a href="<?php echo $tack->website_url?>">
			  <img src=<?php echo $tack->picture_url;?> class="img-responsive img-rounded"></a>
			  <div class="caption">
				<?php echo htmlentities($tack->description);?>
				<a href= "user_retack.php?tackid=<?php echo urlencode($tack->tack_id);?>" > ReTack </a> &nbsp;
		  <a href= "../controllers/userAddTackFavoriteController.php?tackid=<?php echo urlencode($tack->tack_id);?>" > Favorite</a> &nbsp;
		  <?php 
		  if($board->user_id == $_SESSION["user_id"]) { 
			  $output="<a href= \"user_edit_tack.php?tackid=".urlencode($tack->tack_id)."&boardid=".urlencode($board->board_id)."\"> Edit </a>&nbsp; ";
			  $output.="<a href= \"../controllers/userDeleteTackController.php?tackid=".urlencode($tack->tack_id)."&boardid=".urlencode($board->board_id)."\" ";
			  $output.="onclick=\"return confirm('Are you sure?');\"> Delete </a>";
			  echo $output;
		  }
		  ?> 
			  </div>
			</div> 
		</div>
		<?php } ?>
		<?php if ($i%4===0){?>	
		<div class="col-xs-4 col-sm-3 sidebar-offcanvas panel panel-default" id="Div2" role="navigation" style="height:250px;background:rgba(255,248,168,0.4);">
			<div class="thumbnail" style="margin-top: 10px;"><a href="<?php echo $tack->website_url?>">
			  <img src=<?php echo $tack->picture_url;?> class="img-responsive img-rounded"></a>
			  <div class="caption">
				<?php echo htmlentities($tack->description);?>
				<a href= "user_retack.php?tackid=<?php echo urlencode($tack->tack_id);?>" > ReTack </a> &nbsp;
		  <a href= "../controllers/userAddTackFavoriteController.php?tackid=<?php echo urlencode($tack->tack_id);?>" > Favorite</a> &nbsp;
		  <?php 
		  if($board->user_id == $_SESSION["user_id"]) { 
			  $output="<a href= \"user_edit_tack.php?tackid=".urlencode($tack->tack_id)."&boardid=".urlencode($board->board_id)."\"> Edit </a>&nbsp; ";
			  $output.="<a href= \"../controllers/userDeleteTackController.php?tackid=".urlencode($tack->tack_id)."&boardid=".urlencode($board->board_id)."\" ";
			  $output.="onclick=\"return confirm('Are you sure?');\"> Delete </a>";
			  echo $output;
		  }
		  ?> 
			  </div>
			</div> 
		</div>
		<?php } ?>
		  
		    
  <?php } ?>
		</div> <!--/row thumbnail-->
	  </div> <!--/panel-body-->
	</div> <!--/panel-->
	<h4><a href="user_myboards.php"> Back to My Boards </a></h4>
</div>

<?php include("layouts/footer.php"); ?>	  