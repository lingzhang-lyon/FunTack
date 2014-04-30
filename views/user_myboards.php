<?php require_once("../controllers/userMyBoardsController.php"); ?>
<!-- The userMyBoardsController will set session and object $user,  board objects array $boards, boardid with tacks objects array  $boards_tacks, object array $categories-->
<?php include("layouts/header.php"); ?>	
<?php $activeMenu = "user_myboards"; include("layouts/menu.php"); ?>	
	
<div id="content">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>


	<br />
	<br />
	
	<h2>Your Boards: <?php echo htmlentities($user->first_name); ?></h2>
		
		<form action="user_create_board.php" method= "LINK">
		<p> + Create New Board :		
		<button type ="submit">Create</button>		
		</p>
		</form>
		
		<form action="user_myboards.php" method = "post" >
		<p> + Choose A Board :		
		<select name="newtack_boardid" >
		<?php
			foreach($boards as $board) { 
				echo "<option value ={$board->board_id}> {$board->name} </option>";
		}?>
		</select>
		<input type="submit" name="newtacksubmit" value="Create New Tack"/>
		</p>
		</form>

	
	
	
	<?php
	foreach($boards as $board){ ?>
		<a href="user_board.php?id=<?php echo urlencode($board->board_id);?> ">
		<?php echo $board->name; ?></a> 
		Category: <?php 
		    $category = Category::find_by_id($board->category_id); 
			echo  htmlentities($category->category_name); ?>
		<br></br>
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