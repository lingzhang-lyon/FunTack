<?php require_once("../controllers/userDashboardController.php"); ?>
<!-- The userDashboardController will set session and the object $user -->
<?php include("layouts/header.php"); ?>
<?php $activeMenu = "user_profile"; include("layouts/menu.php"); ?>

<div id="content">
    <?php echo Session::message(); ?>
    <?php echo Session::form_errors(Session::$errors); ?>
	
    <h2>Your Profile: <?php echo htmlentities($user->name); ?></h2>
    

		<p>First Name<br></br>
		<?php echo htmlentities($user->first_name); ?>
		</p>
		
		<p>Last Name<br></br>
		<?php echo htmlentities($user->last_name); ?>
		</p>
		
		<p>Email<br></br>
		<?php echo htmlentities($user->email_id); ?>
		</p>

		<a href="user_edit_profile.php">Edit Your Profile</a>
		
</div>
		
<?php include("layouts/footer.php"); ?>