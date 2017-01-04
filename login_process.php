<?php
	//start session
	session_start();

	//connect to database
	include($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');

	// username and password sent from form 
	$myusername=$_POST['username'];
	$mypassword=$_POST['password'];
	
	$sql = mysqli_query($conn,"SELECT * FROM ctr_users WHERE username='$myusername'");
	$result = mysqli_fetch_array($sql);
	$hashed_password = $result['password'];
	$egg = $result['egg'];
	$mypassword = crypt($mypassword, $egg);
	
	if($hashed_password === $mypassword) {
		// Register $myusername, $mypassword and redirect to file "admin/index.php"
		$_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = "$myusername";
		header("location:/index.php");
	} else {
		echo "Wrong username or password. Please try again.";
		echo "<br>$myusername | $mypassword";
		echo "<br>$hashed_password";
		echo "<br>$egg";
		echo "Error: %s\n", mysqli_error($conn);
	}
	
	//close connnection to database
	include($_SERVER['DOCUMENT_ROOT'].'/dbclose.php');
?>