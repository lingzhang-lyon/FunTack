<?php require_once("../controllers/userDashboardController.php"); ?>
<!-- The userDashboardController will set session and object $user,  tack objects array $tacks -->
<?php include("layouts/header.php"); ?>	
<?php $activeMenu = "user_dashboard"; include("layouts/menu.php"); ?>	

<div id="content">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>

	<br />
	<br />
	
	<form action="user_dashboard.php" method="post">
		<p>Search By Category		
		<select name="categoryid" >
		<?php
			foreach($categories as $category) { 
				echo "<option value ={$category->id}> {$category->category_name} </option>";
		}?>
		</select>
		<input type="submit" name="submit" value="Search"/>	
	</p>
	</form>
	<h3> New Boards:</h3>	
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
	 
	<!-- <?php foreach($tacks as $tack){ ?>
	<img src= <?php echo $tack->picture_url;?> width=200px height=200px />
	<?php } ?> -->
	

	


	
	

<?php include("layouts/footer.php"); ?>