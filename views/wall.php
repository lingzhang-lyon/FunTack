<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
		<title>FunTack </title>
		<link rel="shortcut icon" href="../images/logo.png">
		 <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
		
</head>
		
<body style="background:url(../images/background.jpg);">
<div class="container-fluid" id="page">
	<div class="jumbotron" style="background:rgba(255,255,255,0.6);">
			

<?php require_once("../controllers/userDashboardController.php"); ?>
<!-- The userDashboardController will set session and object $user,  tack objects array $tacks -->
<?php $activeMenu = "user_dashboard"; include("layouts/menu.php"); ?>	

<div id="content">
  <?php echo Session::message(); ?>
  <?php echo Session::form_errors(Session::$errors); ?>

	<br />
	<br />
<!-- Single button -->

	
	<form action="user_dashboard2.php" method="post" style="margin-bottom:15px">
		<div class="input-group">
		  <span class="input-group-addon">Search By Category: </span>
		  <select class="form-control" name="categoryid" >
		<?php
			foreach($categories as $category) { 
				echo "<option value ={$category->id}> {$category->category_name} </option>";
		}?>
		</select>
		  <input type="submit" name="submit" class="btn btn-primary form-control" value="Search"/>
		</div>

	</form>
<?php 
$i=0;
$Strings=array('','','','','',''); 
?>	
	<?php
	foreach($boards as $board){ ?>
		
		<?php 
		$ownboardid=$board->board_id;
		$owntacks=$boardid_tacks[$ownboardid];
		foreach($owntacks as $owntack){ 
		$Strings[$i%6]= $Strings[$i%6].'	
		<div class="thumbnail" style="margin-top: 10px;">
			<a href="'.$owntack->website_url.'">
			<img src='.$owntack->picture_url.' class="img-responsive img-rounded"></a>
			<div class="caption">
				'.$owntack->description.' 
			</div>		
		</div>';
		$i++;
		} 
		} 

	 ?> 
<div class="row row-fluid" style="padding:0; margin-top:0;margin-bottom:0;">
	<div class="col-xs-3 col-sm-2 sidebar-offcanvas panel panel-default" id="Div2" role="navigation" >
	<?php print($Strings[0]);?>
	</div>
	<div class="col-xs-3 col-sm-2 sidebar-offcanvas panel panel-default" id="Div2" role="navigation" >
	<?php print($Strings[1]);?>
	</div>
	<div class="col-xs-3 col-sm-2 sidebar-offcanvas panel panel-default" id="Div2" role="navigation" >
	<?php print($Strings[2]);?>
	</div>
	<div class="col-xs-3 col-sm-2 sidebar-offcanvas panel panel-default" id="Div2" role="navigation" >
	<?php print($Strings[3]);?>
	</div>
	<div class="col-xs-3 col-sm-2 sidebar-offcanvas panel panel-default" id="Div2" role="navigation" >
	<?php print($Strings[4]);?>
	</div>
	<div class="col-xs-3 col-sm-2 sidebar-offcanvas panel panel-default" id="Div2" role="navigation" >
	<?php print($Strings[5]);?>
	</div>
</div>
<?php include("layouts/footer.php"); ?>

	
