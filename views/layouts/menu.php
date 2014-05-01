<div id="mainmenu">
   <ul>
		<li<?php if ($activeMenu == "user_profile") { ?> class="active"<?php } ?> > 
			<a href="user_profile.php">
	          <?php echo $_SESSION["first_name"]; ?> </a></li>
		<li <?php if ($activeMenu == "user_dashboard") { ?> class="active"<?php } ?> >
			<a href="user_dashboard.php">Home</a></li>	
		<li <?php if ($activeMenu == "user_myboards") { ?> class="active"<?php } ?> >
			<a href="user_myboards.php">MyBoards</a></li>
		<li <?php if ($activeMenu == "user_followed_boards") { ?> class="active"<?php } ?> >
			<a href="user_followed_boards.php">Followed Boards</a></li>
		<li <?php if ($activeMenu == "user_favorite_tacks") { ?> class="active"<?php } ?> >
			<a href="user_favorite_tacks.php">Favorite Tacks</a></li>
		<li><a href="../controllers/logoutController.php">Log Out</a></li>

   <ul>	

		
</div>	