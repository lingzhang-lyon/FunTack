<?php require_once("../controllers/userFollowedBoardsController.php"); ?>
<!-- The userFollowedBoardsController will set session and object $user,  board objects array $followedboards, boardid with tacks objects array $boards_tacks -->
<?php include("layouts/header.php"); ?>	
<?php $activeMenu = "user_followed_boards"; include("layouts/menu.php"); ?>

<div id="content">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>
  
<?php
if($followedboards){
	foreach($followedboards as $board){ ?>
		<br><a href="user_board.php?id=<?php echo urlencode($board->board_id);?> ">
		<?php echo $board->name; ?></a>
	    Category: 
		<?php 
		$category = Category::find_by_id($board->category_id); 
		echo  htmlentities($category->category_name); 
		$output ="&nbsp;<a href= \"../controllers/userDeleteBoardFromFollowedController.php?boardid=".urlencode($board->board_id)."\" ";
		$output.="onclick=\"return confirm('Are you sure?');\"> Delete From Followed </a>";
		echo $output;
		?>		
		<br>
		<?php 
		$ownboardid=$board->board_id;
		$owntacks=$boardid_tacks[$ownboardid];
		foreach($owntacks as $owntack){ ?>
	    <img src= <?php echo $owntack->picture_url;?> width=200px height=200px /> 
	   <?php } 
	}
}
	?>
  
</div>

<?php include("layouts/footer.php"); ?>