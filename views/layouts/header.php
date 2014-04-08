<?php 
	if (!isset($layout_context)) {
		$layout_context = "public";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
		<title>FunTack <?php if ($layout_context == "admin") { echo "Admin";}
										 else if ($layout_context == "player") { echo "Player";}?></title>
		<link href="../css/main.css"  rel="stylesheet" type="text/css" />
		<link href="../css/screen.css"  rel="stylesheet" type="text/css" />
		<!-- <link href="../css/print.css"  rel="stylesheet" type="text/css" /> -->
		<link href="../css/form.css"  rel="stylesheet" type="text/css" />
		
</head>
		
<body>

<div class="container" id="page">
			
    <div id="header">
      
     <h1> &nbsp;&nbsp;FunTack <?php if ($layout_context == "admin") { echo "Admin"; } 
		                            else if ($layout_context == "player") { echo "Player";}?> 
     </h1>
      
    </div>
