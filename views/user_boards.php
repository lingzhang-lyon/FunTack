<?php require_once("../controllers/userBoardsController.php"); ?>
<!-- The userDashboardController will set session and object $user,  board objects array $boards, tack objects array $tacks -->
<?php include("layouts/header.php"); ?>	

<div id="mainmenu">
   <ul>
		<li> <a href="user_profile.php">
	          <?php echo $_SESSION["first_name"]; ?> </a></li>
		<li><a href="user_dashboard.php">Home</a></li>	
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


	<br />
	<br />
	
	<h2>Your Boards: <?php echo htmlentities($user->first_name); ?></h2>
	
	<!-- for test -->
	<!-- <?php echo $singleboard->name;?>  -->
	
	<?php echo $firstboard->name;?>  <br /> 
	
	<table width=300px height=200px>  <!-- need to modify css to make it look better -->
	<tr valign="top">
	
	<?php foreach($tacks as $tack){ ?>
	<td> <img src= <?php echo $tack->url;?> width=100px height=100px /> </td>
	<?php } ?>
	
	</tr>
	</table>
	

	
	

<?php include("layouts/footer.php"); ?>