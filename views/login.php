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
	<?php include("../controllers/loginController.php"); ?>
<!-- The loginController will set session and $email variable-->
	<div class="container" id="page">
		<div class="jumbotron">
		<br />
		<a href="index.php">&laquo; Main Page</a><br />
		
		<?php echo Session::message(); ?>
		<?php echo Session::form_errors(Session::$errors); ?>
		
		<h2>Login</h2>
		<form action="login.php" method="post" class="form-horizontal" role="form">
			<div class="form-group">
				<label for="Email" class="col-sm-2 control-label">Email:</label>
				<div class="col-sm-10">
					<input type="text" name="email" value="<?php echo htmlentities($email); ?>" class="form-control" placeholder="Email">
				</div>
			</div>
			<div class="form-group">
				<label for="Password" class="col-sm-2 control-label">Password:</label>
				<div class="col-sm-10">
					<input type="password" name="password" value="" class="form-control" placeholder="Password">
				</div>
			</div>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
		</form>
		</div>
	</div>
<?php include("layouts/footer.php"); ?>
