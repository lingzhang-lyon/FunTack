<?php require_once("../controllers/userDashboardController.php"); ?>
<!-- The userDashboardController will set session and object $user,  tack objects array $tacks -->
<?php include("layouts/header.php"); ?>	
<?php $activeMenu = "user_dashboard"; include("layouts/menu.php"); ?>	

<div id="content">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>

	<br />
	<br />
<!-- Single button -->

	
	<form action="user_dashboard.php" method="post">
		<p>Search By Category: 		
		<select name="categoryid" >
		<?php
			foreach($categories as $category) { 
				echo "<option value ={$category->id}> {$category->category_name} </option>";
		}?>
		</select>
		<input type="submit" name="submit" class="btn btn-primary" value="Search"/>	
	</p>
	</form>
	<h3> New Public Boards:</h3>
<?php $i=1;?>	
	<?php
	foreach($boards as $board){ ?>
		<div class="panel panel-warning" > 
			<div class="panel-heading">
				<a href="user_board.php?id=<?php echo urlencode($board->board_id);?> ">
				<?php echo $board->name; ?></a> 
				Category: <?php 
					$category = Category::find_by_id($board->category_id); 
				echo  htmlentities($category->category_name); ?>
			</div>
		<div class="panel-body">
		<div class="row row-offcanvas row-offcanvas-right" style="margin-left:10px;margin-right:10px;">
		<?php 
		$ownboardid=$board->board_id;
		$owntacks=$boardid_tacks[$ownboardid];
		foreach($owntacks as $owntack){ ?>
		<?php if ($i%4===1){?>	
		<div class="col-xs-4 col-sm-3 sidebar-offcanvas panel panel-default" id="Div2" role="navigation" style="height:250px;background:rgba(255,248,168,0.4);">
			<div class="thumbnail" style="margin-top: 10px;"><a href="<?php echo $owntack->website_url?>">
			  <img src=<?php echo $owntack->picture_url;?> class="img-responsive img-rounded"></a>
			  <div class="caption">
				<?php echo $owntack->description;?>
			  </div>
			</div> 
		</div>
		<?php } ?>
		<?php if ($i%4===2){?>	
		<div class="col-xs-4 col-sm-3 sidebar-offcanvas panel panel-default" id="Div2" role="navigation" style="height:250px;background:rgba(255,248,168,0.4);">
			<div class="thumbnail" style="margin-top: 10px;"><a href="<?php echo $owntack->website_url?>">
			  <img src=<?php echo $owntack->picture_url;?> class="img-responsive img-rounded"></a>
			  <div class="caption">
				<?php echo $owntack->description;?>
			  </div>
			</div> 
		</div>
		<?php } ?>
		<?php if ($i%4===3){?>	
		<div class="col-xs-4 col-sm-3 sidebar-offcanvas panel panel-default" id="Div2" role="navigation" style="height:250px;background:rgba(255,248,168,0.4);">
			<div class="thumbnail" style="margin-top: 10px;"><a href="<?php echo $owntack->website_url?>">
			  <img src=<?php echo $owntack->picture_url;?> class="img-responsive img-rounded"></a>
			  <div class="caption">
				<?php echo $owntack->description;?>
			  </div>
			</div> 
		</div>
		<?php } ?>
		 <?php if ($i%4===0){?>	
		<div class="col-xs-4 col-sm-3 sidebar-offcanvas panel panel-default" id="Div2" role="navigation" style="height:250px;background:rgba(255,248,168,0.4);">
			<div class="thumbnail" style="margin-top: 10px;"><a href="<?php echo $owntack->website_url?>">
			  <img src=<?php echo $owntack->picture_url;?> class="img-responsive img-rounded"></a>
			  <div class="caption">
				<?php echo $owntack->description;?>
			  </div>
			</div> 
		</div>
		<?php } ?>
	   <?php $i++;} ?>
	   
	   </div> <!--/row thumbnail-->
	   </div> <!--/panel-body-->
	</div> <!--/panel-->
	   <br> 
	<?php 
     } ?>
	<!-- <?php foreach($tacks as $tack){ ?>
	<img src= <?php echo $tack->picture_url;?> width=200px height=200px />
	<?php } ?> -->
	
</div>
	


	
	

<?php include("layouts/footer.php"); ?>

	
