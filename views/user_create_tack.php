<?php require_once("../controllers/userCreateTackController.php"); ?>
<!--This is the view for user_create_tack -->
<!-- The userCreateBoardController will set session and the object $user -->
<?php include("layouts/header.php"); ?>	
<?php $activeMenu = ""; include("layouts/menu.php"); ?>

<div id="content">

    <?php echo Session::message(); ?>
    <?php echo Session::form_errors(Session::$errors); ?>
    <div class="panel panel-warning" > 
		<div class="panel-heading"><h3><?php echo htmlentities($user->first_name); ?> :Create Your Tack in the board <?php echo htmlentities($board->name);?></h3></div>
		<div class="panel-body">
			<form action="user_create_tack.php?boardid=<?php echo urlencode($board->board_id);?>" method="post" class="form-horizontal" role="form">
			  <div class="form-group">
				<label for="WebsiteURL" class="col-sm-2 control-label">Tack Website URL</label>
				<div class="col-sm-10">
				  <input type="text" name="websiteurl" class="form-control" id="inputEmail3" placeholder="Website URL">
				</div>
			  </div>
			  <div class="form-group">
				<label for="ImageURL" class="col-sm-2 control-label">Picture URL</label>
				<div class="col-sm-10">
				  <input type="text" name="pictureurl" class="form-control" id="inputEmail3" placeholder="Picture URL">
				</div>
			  </div>
			  <div class="form-group">
				<label for="Description" class="col-sm-2 control-label">Description</label>
				<div class="col-sm-10">
				  <input type="text" name="description" class="form-control" id="inputEmail3" placeholder="Description">
				</div>
			  </div>	
				<input type="submit" name="submit" value="Create" class="btn btn-primary"/>
				<a class="btn btn-danger " href="user_board.php?id=<?php echo urlencode($board->board_id);?>">Cancel</a>
			</form>
		</div>
	</div>
</div>

<?php include("layouts/footer.php"); ?>