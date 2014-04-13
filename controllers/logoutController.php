<?php require_once("../helper/initializeHelper.php"); ?>
<?php 
session_destroy(); 
BasicHelper::redirect_to("../views/index.php");
?>