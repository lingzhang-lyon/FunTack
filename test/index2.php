<?php  
require_once("../models/database.php");


include("layouts/header.php");	

if(isset($database)) echo "true ";
else echo "false";

		$sql  = "SELECT * ";
		$sql .= "FROM users ";
		$sql .= "ORDER BY last_name ASC";
		$user_set = $database->query($sql);
		$user=mysqli_fetch_array($user_set);
		echo $user['last_name'];
		
		
?>

		
		