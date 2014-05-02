<?php require_once("../controllers/userFavoriteTacksController.php"); ?>
<!-- The userFavoriteTacksController will set session and object $user,   objects array $favoritetacks -->
<?php include("layouts/header.php"); ?>	
<?php $activeMenu = "user_favorite_tacks"; include("layouts/menu.php"); ?>

<div id="content">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>
  
<?php
if($favoritetacks){ ?>
	<table>
    <tr valign="top"> 
   <?php 
   foreach($favoritetacks as $tack){ ?>
	     
	   <td >  
	      <img src= <?php echo $tack->picture_url;?> width=200px height=200px/>
	      <br><a href= <?php echo $tack->website_url;?> > <?php echo htmlentities($tack->description);?> </a><br>
		  <a href= "user_retack.php?tackid=<?php echo urlencode($tack->tack_id);?>" > ReTack </a> &nbsp;
		  <?php 
		  
			  $output ="<a href= \"../controllers/userDeleteTackFromFavoriteController.php?tackid=".urlencode($tack->tack_id)."\" ";
			  $output.="onclick=\"return confirm('Are you sure?');\"> Delete From Favorite </a>";
			  echo $output;
		  
		  ?> 

	   </td>
		    
  <?php } ?>
   </tr>
    </table>
<?php } ?>
</div>

<?php include("layouts/footer.php"); ?>