<?php require_once("../controllers/userEditProfileController.php"); ?>  
<!-- The userEditProfileController will set session and the object $user -->
<?php include("layouts/header.php"); ?>	
<div id="mainmenu">
	<ul><li>
   <a href="user_dashboard.php">Back To DashBoard</a>
   </li></ul>
</div>

<div id="content">

    <?php echo Session::message(); ?>
    <?php echo Session::form_errors(Session::$errors); ?>
    
    <h2>Edit Your Profile: <?php echo htmlentities($user->first_name); ?></h2>
    <form action="user_edit_profile.php?id=<?php echo urlencode($_SESSION["user_id"]); ?>" method="post">

		<p>First Name<br></br>
		<input type="text" name="firstname" value="<?php echo htmlentities($user->first_name); ?>" />
		</p>
		
		<p>Last Name<br></br>
		<input type="text" name="lastname" value="<?php echo htmlentities($user->last_name); ?>" />
		</p>

		<p>Email<br></br>
		<input type="text" name="email" value="<?php echo htmlentities($user->email_id); ?>" />
		</p>

		<p>Password<br></br>
		<input type="password" name="password" value="" />
		</p>

		<input type="submit" name="submit" value="Edit"/>
    </form>

</div>

<?php include("layouts/footer.php"); ?>