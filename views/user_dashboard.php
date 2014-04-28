<?php require_once("../controllers/userDashboardController.php"); ?>
<!-- The userDashboardController will set session and object $user,  tack objects array $tacks -->
<?php include("layouts/header.php"); ?>	
<?php $activeMenu = "user_dashboard"; include("layouts/menu.php"); ?>	

<div id="content">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>

	<br />
	<br />
	
	<?php foreach($tacks as $tack){ ?>
	<img src= <?php echo $tack->picture_url;?> width=200px height=200px />
	<?php } ?>
	
	<!-- for test  -test sucess -->
	<!-- <img src= <?php echo $singletack->url;?> width=200px height=200px />	 -->
	<!-- <img src= "http://media-cache-ak0.pinimg.com/originals/13/c4/37/13c43740d9281db040945bb709d4ed5c.jpg" width=200px height=200px /> -->
	


	
	

<?php include("layouts/footer.php"); ?>