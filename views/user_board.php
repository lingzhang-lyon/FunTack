<?php require_once("../helper/initializeHelper.php"); ?>
<?php Session::confirm_logged_in(); ?> 
<?php
$board = Board::find_by_id($_GET["id"]);
$tacks = Tack::find_tacks_by_board_id($_GET["id"]);
?>
<?php include("layouts/header.php"); ?>	
<?php 
if($board->user_id == $_SESSION["user_id"]){
	$activeMenu = "user_myboards";
} 
//else $activeMenu = "user_followed_boards"; 
include("layouts/menu.php"); ?>

<div id="content">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>
  
  <?php if($board->user_id == $_SESSION["user_id"]) { ?> 
  <!-- if this board own by the user, then allow to create new tack -->
  <a href="user_create_tack.php?boardid=<?php echo urlencode($board->board_id);?> "> + Create New Tack In This Board </a> <br>
  <a href="user_myboards.php"> Back to My Boards </a>
  <br></br>
  
  <?php } ?>
  
  <h3><?php echo $board->name; ?></h3>
    Category: 
	<?php 
	$category = Category::find_by_id($board->category_id); 
	echo  htmlentities($category->category_name); 
	?><br>
	
	
	<table>
    <tr valign="top"> 
  <?php foreach($tacks as $tack){ ?>
	     
	   <td >  
	      <img src= <?php echo $tack->picture_url;?> width=200px height=200px/>
	      <a href= <?php echo $tack->website_url;?> > <?php echo htmlentities($tack->description);?> </a><br>
		  <a href= "user_retack.php?tackid=<?php echo urlencode($tack->tack_id);?>" > ReTack </a> &nbsp;
		  <?php if($board->user_id == $_SESSION["user_id"]) { ?> 
		  <a href= "user_edit_tack.php?tackid=<?php echo urlencode($tack->tack_id);?>" > Edit </a>&nbsp;
		  <a href= "../controllers/userDeleteTackController.php?tackid=<?php
		   echo urlencode($tack->tack_id);?>&boardid=<?php echo urlencode($board->board_id);?>" onclick="return confirm('Are you sure?');"> Delete </a>
		  <?php } ?>
	   </td>
		    
  <?php } ?>
   </tr>
    </table>
  
</div>

<?php include("layouts/footer.php"); ?>
	  