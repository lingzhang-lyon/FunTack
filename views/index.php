<?php require_once("../helper/initializeHelper.php"); ?>
<?php if (Session::logged_in()) BasicHelper::redirect_to("user_dashboard.php");?>
<?php include("layouts/header.php"); ?>	


 <div id="mainmenu">
   <ul>
		<li><a href="login.php">Login</a></li>

		<li><a href="register.php">Registration</a></li>

   <ul>	

		
 </div>		



  <div id="content">

			<br> </br>
			<p>Welcome!</p>
			<br> </br>
			<br> </br>
			<br> </br>
			<br> </br>
			<br> </br>
			<br> </br>
			<br> </br>
			

  </div>
</div>

<?php include("layouts/footer.php"); ?>