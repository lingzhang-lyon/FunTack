<?php require_once("../controllers/userDashboardController.php"); ?>
<!-- The userDashboardController will set session and array variable $user,  tack objects array $tacks -->
<?php include("layouts/header.php"); ?>	

<div id="mainmenu">
   <ul>
		<li> <a href="user_profile.php">
	          <?php echo $_SESSION["first_name"]; ?> </a></li>
		<li><a href="user_search.php">Search</a></li>
		<li><a href="user_boards.php">MyBoards</a></li>
		<li><a href="user_followed_boards.php">Followed Boards</a></li>
		<li><a href="user_favorite_tacks.php">Favorite Tacks</a></li>

		<li><a href="../controllers/logoutController.php">Log Out</a></li>

   <ul>	

		
</div>	

<div id="content">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>

  <div id="navigation">
	<br />
	<a href="user_dashboard.php">&laquo; User Dashboard Home</a><br />
	
	<?php foreach($tacks as $tack){ ?>
	<img src= <?php echo $tack->url;?> width=200px height=200px />
	<?php } ?>
	
	<!-- for test  -test sucess -->
	<!-- <img src= <?php echo $singletack->url;?> width=200px height=200px />	 -->
	<!-- <img src= "http://media-cache-ak0.pinimg.com/originals/13/c4/37/13c43740d9281db040945bb709d4ed5c.jpg" width=200px height=200px /> -->
	


	
	

<?php include("layouts/footer.php"); ?>