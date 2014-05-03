<?php require_once("../controllers/userFollowedBoardsController.php"); ?>
<!-- The userFollowedBoardsController will set session and object $user,  board objects array $followedboards, boardid with tacks objects array $boards_tacks -->
<?php include("layouts/header.php"); ?>	
<?php $activeMenu = "user_followed_boards"; include("layouts/menu.php"); ?>

<div id="content"  style="margin-top:15px;">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>
  
	<?php $i=1;?>
<?php
if($followedboards){
	foreach($followedboards as $board){ ?>
	<div class="panel panel-warning"> 
		<div class="panel-heading">
		<a href="user_board.php?id=<?php echo urlencode($board->board_id);?> ">
		<?php echo $board->name; ?></a>
	    Category: 
		<?php 
		$category = Category::find_by_id($board->category_id); 
		echo  htmlentities($category->category_name); 
		$output ="&nbsp;<a href= \"../controllers/userDeleteBoardFromFollowedController.php?boardid=".urlencode($board->board_id)."\" ";
		$output.="onclick=\"return confirm('Are you sure?');\"> Delete From Followed </a>";
		echo $output;
		?>		
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
     } 
}	 
	 ?>
  
</div>

<?php include("layouts/footer.php"); ?>