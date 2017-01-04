<?php
	//start session
	session_start();
	
	//Check for install mode, maintenance mode, or running mode.
	$directoryName = $_SERVER['DOCUMENT_ROOT'].'/install/';
	$ctr_site_status = 'running'; //MYSQL
	
	//Check if the directory already exists.
	if(is_dir($directoryName)){
		echo 'Welcome to CTR MySite! Please click <a href="/install/">here</a> to install.';
		die();
	} else {
		if ($ctr_site_status == 'maintenance') {
			echo 'Site is currently under maintenance. Please come back soon.';
		}
	}
	
	//require
	require($_SERVER['DOCUMENT_ROOT'].'/includes/functions.php');	
	
	//check to see if logged in as administrator
	if(isset($_SESSION['username'])){
		$myusername = $_SESSION['username'];
		
		//connect to database
		include($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');
		$sql = mysqli_query($conn,"SELECT * FROM ctr_users WHERE username='$myusername'");
		$result = mysqli_fetch_array($sql);
		$level = $result['user_level'];
		$email = $result['email'];
		$ctr_user_id = $result['id'];
		
		//close connnection to database
		include($_SERVER['DOCUMENT_ROOT'].'/dbclose.php');
		
		//build admin bar
		if($level=='0') {
			?>
			<div id="admin_bar" style="width: 100%; border-bottom: solid black 1px; margin-bottom: 10px;">
				<div id="admin_bar_right" style="float: right;"><?php echo $myusername ?> | <?php echo $email ?> | <a href="<?php echo $ctr_site['url']; ?>/admin/edit_profile.php">Edit Profile</a> | <a href="<?php echo $ctr_site_url; ?>/logout.php">Logout</a></div>
				<div id="admin_bar_left" style="">Welcome to $SiteName | <a href="<?php echo $ctr_site_url; ?>/admin/index.php">Console</a> | <a href="<?php echo $ctr_site_url; ?>/admin/posts.php">Posts</a> | <a href="<?php echo $ctr_site_url; ?>/admin/pages.php">Pages</a> | <a href="<?php echo $ctr_site_url; ?>/admin/users.php">Users</a> | <a href="<?php echo $ctr_site_url; ?>/admin/edit_site.php">Site Settings</a></div> 
			</div>
			<?php
		} else {
			?>
			<div id="top_bar" style="width: 100%; text-align: right; border-bottom: solid black 1px; margin-bottom: 10px;">
				<?php echo $myusername ?> | <?php echo $email ?> | <a href="<?php echo $ctr_site['url']; ?>/admin/edit_profile.php">Edit Profile</a> | <a href="<?php echo $ctr_site_url; ?>/logout.php">Logout</a>
			</div>
			<?php
		}
	} else {
		?>
		<div id="top_bar" style="width: 100%; text-align: right; border-bottom: solid black 1px; margin-bottom: 10px;">
			You are not logged in. | <a href="<?php echo $ctr_site['url']; ?>/login.php">Login</a>
		</div>
		<?php
	}

?>