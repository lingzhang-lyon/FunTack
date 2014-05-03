<?php require_once("../controllers/userEditProfileController.php"); ?>  
<!-- The userEditProfileController will set session and the object $user -->
<?php include("layouts/header.php"); ?>	
<?php $activeMenu = "user_profile"; include("layouts/menu.php"); ?>

<div id="content">

    <?php echo Session::message(); ?>
    <?php echo Session::form_errors(Session::$errors); ?>
    
    <div class="panel panel-warning" > 
		<div class="panel-heading"><h3>Edit Your Profile: <?php echo htmlentities($user->first_name); ?></h3></div>
		<div class="panel-body">
			<form action="user_edit_profile.php?id=<?php echo urlencode($_SESSION["user_id"]); ?>" method="post" class="form-horizontal" role="form">
				<div class="form-group">
					<label for="FirstName" class="col-sm-2 control-label">First Name</label>
					<div class="col-sm-10">
						<input type="text" name="firstname" value="<?php echo htmlentities($user->first_name); ?>" class="form-control" placeholder="First Name">
					</div>
				</div>
				<div class="form-group">
					<label for="LastName" class="col-sm-2 control-label">Last Name</label>
					<div class="col-sm-10">
						<input type="text" name="lastname" value="<?php echo htmlentities($user->last_name); ?>" class="form-control" placeholder="Last Name">
					</div>
				</div>
				<div class="form-group">
					<label for="Email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" name="email" value="<?php echo htmlentities($user->email_id); ?>" class="form-control" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label for="Password" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="password" name="password" value="" class="form-control" placeholder="Password">
					</div>
				</div>

				<input type="submit" name="submit" value="Edit" class="btn btn-primary"/>
				<a class="btn btn-danger" href="user_profile.php">Cancel</a>
			</form>
		</div>
	</div>
</div>

<?php include("layouts/footer.php"); ?>