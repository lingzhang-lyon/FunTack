<?php require_once("../controllers/userMyBoardsController.php"); ?>
<!-- The userMyBoardsController will set session and object $user,  board objects array $boards, boardid with tacks objects array  $boards_tacks, object array $categories-->
<?php include("layouts/header.php"); ?>	
<?php $activeMenu = "user_myboards"; include("layouts/menu.php"); ?>	
	
<div id="content">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>
	<br />
	<br />
	<div class="alert alert-warning"><h4>Your Boards: <?php echo htmlentities($user->first_name); ?></h4></div>
	
	<form action="user_create_board.php" method= "LINK">
	<p> + Create New Board :		
	<button type ="submit" class="btn btn-primary">Create</button>		
	</p>
	</form>
	<?php if($boards) { ?>
	<form action="user_myboards.php" method = "post" >
	<p> + Choose A Board :		
	<select name="newtack_boardid" >
	<?php
		foreach($boards as $board) { 
			echo "<option value ={$board->board_id}> {$board->name} </option>";
	}?>
	</select>
	<input type="submit" name="newtacksubmit" class="btn btn-success" value="Create New Tack"/>
	</p>
	</form>
	<?php } ?>
	
	<?php $i=1;?>
	<?php
if($boards){
	foreach($boards as $board){ ?>
		<div class="panel panel-warning" > 
			<div class="panel-heading">
		<a href="user_board.php?id=<?php echo urlencode($board->board_id);?> ">
		<?php echo $board->name; ?></a> 
		Category: <?php 
		    $category = Category::find_by_id($board->category_id); 
			echo  htmlentities($category->category_name); ?>
			<?php
			if($board->privacy==0) $output="&nbsp;Type: Public";
			else $output="&nbsp;Type: Private";
			echo $output;
		    ?>
			</div>
			<div class="panel-body">
			<div class="row row-offcanvas row-offcanvas-right" style="margin-left:10px;margin-right:10px;">
		<br></br>
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