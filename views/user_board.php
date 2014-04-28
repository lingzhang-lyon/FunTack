<?php require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?> 
<?php
$board = Board::find_by_id($_GET["id"]);
$tacks = Tack::find_tacks_by_board_id($_GET["id"]);
?>
<?php include("layouts/header.php"); ?>	
<?php include("layouts/menu.php"); ?>

<div id="content">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>
  
  <?php if($board->user_id == $_SESSION["user_id"]) { ?> 
  <!-- if this board own by the user, then allow to create new tack -->
  <a href="user_create_tack.php?boardid=<?php echo urlencode($board->board_id);?> "> + Create New Tack In This Board </a><br></br>
  <?php } ?>
  
  <h3><?php echo $board->name; ?></h3>
    Category: 
	<?php 
	$category = Category::find_by_id($board->category_id); 
	echo  htmlentities($category->category_name); 
	?><br>
  <?php foreach($tacks as $tack){ ?>
   <img src= <?php echo $tack->picture_url;?> width=200px height=200px /> 
  <?php } ?>
  
</div>

<?php include("layouts/footer.php"); ?>
	  