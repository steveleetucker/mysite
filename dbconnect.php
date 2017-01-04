<?php
	include($_SERVER['DOCUMENT_ROOT'].'/config.php');
	
	// Create connection
	$conn = mysqli_connect("$ctr_database_host", "$ctr_database_username", "$ctr_database_password", "$ctr_database_name") or die(mysqli_error($connection));
?>