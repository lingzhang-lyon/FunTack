<?php require_once("../controllers/userMyBoardsController.php"); ?>
<!-- The userMyBoardsController will set session and object $user,  board objects array $boards, boardid with tacks objects array $boards_tacks -->
<?php include("layouts/header.php"); ?>	
<?php include("layouts/menu.php"); ?>	
	
<div id="content">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>


	<br />
	<br />
	
	<h2>Your Boards: <?php echo htmlentities($user->first_name); ?></h2>
	<h3><a href="user_create_board.php"> + Create New Board</a><h3><br></br>
	
	
	<?php
	foreach($boards as $board){ ?>
		<a href="user_board.php?id=<?php echo urlencode($board->board_id);?> ">
		<?php echo $board->name; ?></a>
		<br>
		<?php 
		$ownboardid=$board->board_id;
		$owntacks=$boardid_tacks[$ownboardid];
		foreach($owntacks as $owntack){ ?>
	    <img src= <?php echo $owntack->picture_url;?> width=200px height=200px /> 
	   <?php } ?>
	   <br> 
	<?php 
     } ?>
	
	

	
	

<?php include("layouts/footer.php"); ?>