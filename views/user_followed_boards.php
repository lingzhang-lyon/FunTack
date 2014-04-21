<?php require_once("../controllers/userFollowedBoardsController.php"); ?>
<!-- The userFollowedBoardsController will set session and object $user,  board objects array $boards, boardid with tacks objects array $boards_tacks -->
<?php include("layouts/header.php"); ?>	
<?php include("layouts/menu.php"); ?>

<div id="content">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>
  
	<?php
	foreach($followedboards as $board){ ?>
		<a href="user_board.php?id=<?php echo urlencode($board->board_id);?> ">
		<?php echo $board->name; ?></a>
		<br>
		<?php 
		$ownboardid=$board->board_id;
		$owntacks=$boardid_tacks[$ownboardid];
		foreach($owntacks as $owntack){ ?>
	    <img src= <?php echo $owntack->url;?> width=200px height=200px /> 
	   <?php } 
	}
	?>
  
</div>

<?php include("layouts/footer.php"); ?>