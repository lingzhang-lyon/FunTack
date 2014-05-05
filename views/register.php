<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en" style="height:100%;">
<head>
		<title>FunTack </title>
		<link rel="shortcut icon" href="../images/logo.png">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/login.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">	
</head>		
<body style="background:url(../images/wall.jpg);" style="height:100%;">
<div id="main" class="container-fluid" id="page" style="height:100%;">
	<div id="navigation" class="jumbotron special" style="background:rgba(60,60,60,0.8);height:100%;">
	<?php include("../controllers/registerController.php"); ?>
<!-- The loginController will set session and $email variable-->
	<div class="container" id="page">
		<div class="jumbotron">
		<br />
		<a href="index.php">&laquo; Main Page</a><br />
		
		<?php echo Session::message(); ?>
		<?php echo Session::form_errors(Session::$errors); ?>
		
		<h2>Register</h2>
		<form action="register.php" method="post" class="form-horizontal" role="form">
			<div class="form-group">
				<label for="Email" class="col-sm-2 control-label">Email:</label>
				<div class="col-sm-10">
					<input type="email" name="email" value="" class="form-control" placeholder="Email">
				</div>
			</div>
			<div class="form-group">
				<label for="FirstName" class="col-sm-2 control-label">First Name:</label>
				<div class="col-sm-10">
					<input type="text" name="firstname" value="" class="form-control" placeholder="First Name">
				</div>
			</div>	
			<div class="form-group">
				<label for="LastName" class="col-sm-2 control-label">Last Name:</label>
				<div class="col-sm-10">
					<input type="text" name="lastname" value="" class="form-control" placeholder="Last Name">
				</div>
			</div>
			<div class="form-group">
					<label for="Password" class="col-sm-2 control-label">Password:</label>
					<div class="col-sm-10">
						<input type="password" name="password" class="form-control" value="" placeholder="Password">
					</div>
				</div> 
			  <input type="submit" name="submit" value="Create your account" class="btn btn-primary"/>
			  <a href="index.php" class="btn btn-danger">Cancel</a>
		</form>
<br />

		</div>
	</div>
<?php include("layouts/footer.php"); ?>
