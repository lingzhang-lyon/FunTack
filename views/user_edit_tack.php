<?php require_once("../controllers/userEditTackController.php"); ?>  
<!-- The userEditBoardController will set session and the object $user, $tack, $board -->
<?php include("layouts/header.php"); ?>	
<?php include("layouts/menu.php"); ?>

<div id="content">

    <?php echo Session::message(); ?>
    <?php echo Session::form_errors(Session::$errors); ?>
    
    <h2><?php echo htmlentities($user->first_name); ?> :Edit Your Tack </h2>
    <form action="user_edit_tack.php?tackid=<?php echo urlencode($tack->tack_id);?>&boardid=<?php echo urlencode($board->board_id);?>" method="post">

		<p>Tack Website URL<br></br>
		<input type="text" name="websiteurl" value="<?php echo htmlentities($tack->website_url); ?>" style="width: 50em"/>
		</p>
		
		<p>Picture URL<br></br>
		<input type="text" name="pictureurl" value="<?php echo htmlentities($tack->picture_url); ?>" style="width: 50em" />
		</p>

		<p>Description<br></br>
		<input type="text" name="description" value="<?php echo htmlentities($tack->description); ?>"style="width: 50em"/>
		</p>


		<input type="submit" name="submit" value="Edit"/>
		<a href="user_board.php?id=<?php echo urlencode($board->board_id);?>">Cancel</a>
		

		 
    </form>

</div>

<?php include("layouts/footer.php"); ?>