<?php require_once("../controllers/userFavoriteTacksController.php"); ?>
<!-- The userFavoriteTacksController will set session and object $user,   objects array $favoritetacks -->
<?php include("layouts/header.php"); ?>	
<?php $activeMenu = "user_favorite_tacks"; include("layouts/menu.php"); ?>

<div id="content" style="margin-top:15px;">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>
  
<?php
$i=1;
if($favoritetacks){ ?>
<div class="panel panel-warning" > 
		<div class="panel-heading"> Here are the tacks you marked as favorite
		</div>
		<div class="panel-body">
		<div class="row row-offcanvas row-offcanvas-right" style="margin-left:10px;margin-right:10px;">
   <?php 
   foreach($favoritetacks as $tack){ ?>
		 <?php if ($i%4===1){?>	
		<div class="col-xs-4 col-sm-3 sidebar-offcanvas panel panel-default" id="Div2" role="navigation" style="height:250px;background:rgba(255,248,168,0.4);">
			<div class="thumbnail" style="margin-top: 10px;"><a href="<?php echo $tack->website_url?>">
			  <img src=<?php echo $tack->picture_url;?> class="img-responsive img-rounded"></a>
			  <div class="caption">
				<?php echo htmlentities($tack->description);?>
				<a href= "user_retack.php?tackid=<?php echo urlencode($tack->tack_id);?>" > ReTack </a> &nbsp;
				<?php 
		  
			  $output ="<a href= \"../controllers/userDeleteTackFromFavoriteController.php?tackid=".urlencode($tack->tack_id)."\" ";
			  $output.="onclick=\"return confirm('Are you sure?');\"> Delete From Favorite </a>";
			  echo $output;
		  
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
				<?php 
		  
			  $output ="<a href= \"../controllers/userDeleteTackFromFavoriteController.php?tackid=".urlencode($tack->tack_id)."\" ";
			  $output.="onclick=\"return confirm('Are you sure?');\"> Delete From Favorite </a>";
			  echo $output;
		  
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
				<?php 
		  
			  $output ="<a href= \"../controllers/userDeleteTackFromFavoriteController.php?tackid=".urlencode($tack->tack_id)."\" ";
			  $output.="onclick=\"return confirm('Are you sure?');\"> Delete From Favorite </a>";
			  echo $output;
		  
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
				<?php 
		  
			  $output ="<a href= \"../controllers/userDeleteTackFromFavoriteController.php?tackid=".urlencode($tack->tack_id)."\" ";
			  $output.="onclick=\"return confirm('Are you sure?');\"> Delete From Favorite </a>";
			  echo $output;
		  
		  ?> 
			  </div>
			</div> 
		</div>
		<?php } ?>
		
		<?php $i++;} ?>
		</div> <!--/row thumbnail-->
	   </div> <!--/panel-body-->
	</div> <!--/panel-->
  <?php } ?>

</div>

<?php include("layouts/footer.php"); ?>