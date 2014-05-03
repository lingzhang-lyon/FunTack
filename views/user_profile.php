<?php require_once("../controllers/userDashboardController.php"); ?>
<!-- The userDashboardController will set session and the object $user -->
<?php include("layouts/header.php"); ?>
<?php $activeMenu = "user_profile"; include("layouts/menu.php"); ?>

<div id="content">
    <?php echo Session::message(); ?>
    <?php echo Session::form_errors(Session::$errors); ?>
	
    <div class="panel panel-warning" > 
	<div class="panel-heading"><h3>Your Profile: <?php echo htmlentities($user->first_name); ?></h3></div>
	<div class="panel-body">
		<div class="input-group" style="margin-top:15px;">
		  <span class="input-group-addon">First Name</span>
		  <input type="text" class="form-control" value="<?php echo htmlentities($user->first_name); ?>">
		</div>
		<div class="input-group" style="margin-top:15px;">
		  <span class="input-group-addon">Last Name</span>
		  <input type="text" class="form-control" value="<?php echo htmlentities($user->last_name); ?>">
		</div>
		<div class="input-group" style="margin-top:15px;">
		  <span class="input-group-addon">Email</span>
		  <input type="text" class="form-control" value="<?php echo htmlentities($user->email_id); ?>">
		</div>
		<a class="btn btn-info" href="user_edit_profile.php" style="margin-top:15px;">Edit Profile</a>
	</div>
</div>
		
</div>
		
<?php include("layouts/footer.php"); ?>