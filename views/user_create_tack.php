<?php require_once("../controllers/userCreateTackController.php"); ?>  
<!-- The userCreateBoardController will set session and the object $user -->
<?php include("layouts/header.php"); ?>	
<?php include("layouts/menu.php"); ?>

<div id="content">

    <?php echo Session::message(); ?>
    <?php echo Session::form_errors(Session::$errors); ?>
    
    <h2><?php echo htmlentities($user->first_name); ?> :Create Your Tack in the board <?php echo htmlentities($board->name);?></h2>
    <form action="user_create_tack.php?boardid=<?php echo urlencode($board->board_id);?>" method="post">

		<p>Tack Website URL<br></br>
		<input type="text" name="websiteurl" style="width: 50em" />
		</p>
		
		<p>Picture URL<br></br>
		<input type="text" name="pictureurl" style="width: 50em" />
		</p>

		<p>Description<br></br>
		<input type="text" name="description" style="width: 50em"/>
		</p>


		<input type="submit" name="submit" value="Create"/>
		<a href="user_board.php?id=<?php echo urlencode($board->board_id);?>">Cancel</a>
		

		 
    </form>

</div>

<?php include("layouts/footer.php"); ?>