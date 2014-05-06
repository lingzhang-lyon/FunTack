<?php require_once("../controllers/userEditTackController.php"); ?>
<!--This view is for user edit tack information -->
<!-- The userEditTackController will set session and the object $user, $tack, $board -->
<?php include("layouts/header.php"); ?>	
<?php $activeMenu = "user_myboards"; include("layouts/menu.php"); ?>

<div id="content">

    <?php echo Session::message(); ?>
    <?php echo Session::form_errors(Session::$errors); ?>
    
    <div class="panel panel-warning" > 
	<div class="panel-heading"><h3><?php echo htmlentities($user->first_name); ?> :Edit Your Tack </h3></div>
	<div class="panel-body">
		<form action="user_edit_tack.php?tackid=<?php echo urlencode($tack->tack_id);?>&boardid=<?php echo urlencode($board->board_id);?>" method="post" class="form-horizontal" role="form">
			<div class="form-group">
				<label for="WebsiteURL" class="col-sm-2 control-label">Tack Website URL</label>
				<div class="col-sm-10">
					<input type="text" name="websiteurl" class="form-control" value="<?php echo htmlentities($tack->website_url); ?>" placeholder="Website URL">
				</div>
			</div>
			<div class="form-group">
				<label for="WebsiteURL" class="col-sm-2 control-label">Picture URL</label>
				<div class="col-sm-10">
					<input type="text" name="pictureurl" class="form-control" value="<?php echo htmlentities($tack->picture_url); ?>" placeholder="picture URL">
				</div>
			</div>
			<div class="form-group">
				<label for="Description" class="col-sm-2 control-label">Description</label>
				<div class="col-sm-10">
					<input type="text" name="description" class="form-control" value="<?php echo htmlentities($tack->description); ?>" placeholder="Description">
				</div>
			</div>

			<input type="submit" name="submit" value="Edit" class="btn btn-primary"/>
			<a class="btn btn-danger " href="user_board.php?id=<?php echo urlencode($board->board_id);?>">Cancel</a>
		</form>
		</div>
	</div>

</div>

<?php include("layouts/footer.php"); ?>