<?php
$ctr_database_name = $_POST['ctr_database_name'];
$ctr_database_username = $_POST['ctr_database_username'];
$ctr_database_password = $_POST['ctr_database_password'];
$ctr_database_host = $_POST['ctr_database_host'];
$ctr_database_prefix = $_POST['ctr_database_prefix'];

// Create connection
$conn = new mysqli($ctr_database_host, $ctr_database_username, $ctr_database_password, $ctr_database_name);

// Check connection
if ($conn->connect_error) {
    die("MySQL connection failed: " . $conn->connect_error);
} else {
	echo 'MySQL connection successful!<p>';
	
	//create ctr_users table
	$sql = "CREATE TABLE `ctr_users` (
		`id` int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		`username` varchar(100) NOT NULL,
		`password` CHAR(255) NOT NULL,
		`egg` varchar(255) NOT NULL,
		`email` varchar(100) NOT NULL,
		`user_level` varchar(10) NOT NULL,
		reg_date TIMESTAMP
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
		
	if ($conn->query($sql) === TRUE) {
		echo "Users table created successfully.<br>";
	} else {
		echo "Error creating table: ".$conn->error.'<br>';
	}
	
	//create ctr_posts table
	$sql = "CREATE TABLE `ctr_posts` (
		`id` int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		`post_title` text NOT NULL,
		`post_name` varchar(200) NOT NULL,
		`post_author` bigint(20) NOT NULL,
		`post_content` longtext NOT NULL,
		`post_type` varchar(20) NOT NULL,
		`post_category` int(10) NOT NULL,
		`post_level` int(10) NOT NULL,
		reg_date TIMESTAMP
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
		
	if ($conn->query($sql) === TRUE) {
		echo "Posts table created successfully.<br>";
	} else {
		echo "Error creating table: ".$conn->error.'<br>';
	}
	
	//create ctr_pages table
	$sql = "CREATE TABLE `ctr_pages` (
		`id` int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		`page_title` text NOT NULL,
		`page_name` varchar(200) NOT NULL,
		`page_author` bigint(20) NOT NULL,
		`page_content` longtext NOT NULL,
		`page_type` varchar(20) NOT NULL,
		`page_menu_order` int(10) NOT NULL,
		`page_parent_id` bigint(20) NOT NULL,
		`page_level` int(10) NOT NULL,
		reg_date TIMESTAMP
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
		
	if ($conn->query($sql) === TRUE) {
		echo "Pages table created successfully.<br>";
	} else {
		echo "Error creating table: ".$conn->error.'<br>';
	}
	
	//create egg
	$egg = sha1($admin_password);
	
	//encrypt admin password
	$admin_password = 'F0p9o8i7u!';
	$admin_password = crypt($admin_password, $egg);
	
	//add admin account to ctr_users table
	$sql = "INSERT INTO ctr_users (username, password, email, user_level, egg) VALUES ('admin','".$admin_password."','admin@admin.com','0', '".$egg."')";
	
	if ($conn->query($sql) === TRUE) {
		echo "<p>New ctr_users record created successfully.";
	} else {
		echo "Error: " . $sql . "<p>" . $conn->error;
	}
	
	//create post content via lorem ipsum
	$post_content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse gravida suscipit sapien, sit amet hendrerit nisl euismod at. Nulla vehicula sem sed ultricies laoreet. Ut libero magna, sagittis eget velit nec, elementum mollis odio. Quisque at egestas augue. Nulla congue nibh tellus, a sodales risus tincidunt a. Vivamus blandit venenatis consequat. Phasellus et commodo odio. Nulla in purus lectus.<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum dapibus diam ut diam imperdiet, vitae venenatis lectus ultrices. Morbi vitae vehicula mi, quis varius purus. Nulla commodo pulvinar nulla in placerat. Vestibulum vehicula quam id viverra rutrum. Morbi convallis tempus vestibulum. Proin fermentum diam pulvinar finibus varius. In lacinia urna purus.<p>Sed mattis erat et justo aliquet, at efficitur nibh tristique. Curabitur at posuere ex. Aenean tempor hendrerit justo ut imperdiet. Fusce fermentum metus et mollis fringilla. Nunc tincidunt urna posuere tellus posuere pulvinar. Proin volutpat malesuada neque ut sollicitudin. Maecenas viverra dictum facilisis. Vivamus feugiat est lacus, at maximus nisi convallis eu. Donec quis elit non felis blandit fringilla. Sed mollis hendrerit est, id dictum neque tincidunt nec. Mauris tempus velit libero, in venenatis risus pulvinar vitae. Phasellus lacinia blandit urna, quis accumsan erat molestie id. Cras eu accumsan nisi.";
	
	//add post to ctr_posts table
	$sql = "INSERT INTO ctr_posts (post_title, post_name, post_author, post_content, post_type, post_category, post_level) VALUES ('Posting with CTRMysite','Posting with CTRMysite','1','".$post_content."','ctr_post','0','0')";
	
	if ($conn->query($sql) === TRUE) {
		echo "<br>New ctr_posts record created successfully.";
	} else {
		echo "Error: " . $sql . "<p>" . $conn->error;
	}
	
	//create page content via lorem ipsum
	$page_content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse gravida suscipit sapien, sit amet hendrerit nisl euismod at. Nulla vehicula sem sed ultricies laoreet. Ut libero magna, sagittis eget velit nec, elementum mollis odio. Quisque at egestas augue. Nulla congue nibh tellus, a sodales risus tincidunt a. Vivamus blandit venenatis consequat. Phasellus et commodo odio. Nulla in purus lectus.<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum dapibus diam ut diam imperdiet, vitae venenatis lectus ultrices. Morbi vitae vehicula mi, quis varius purus. Nulla commodo pulvinar nulla in placerat. Vestibulum vehicula quam id viverra rutrum. Morbi convallis tempus vestibulum. Proin fermentum diam pulvinar finibus varius. In lacinia urna purus.<p>Sed mattis erat et justo aliquet, at efficitur nibh tristique. Curabitur at posuere ex. Aenean tempor hendrerit justo ut imperdiet. Fusce fermentum metus et mollis fringilla. Nunc tincidunt urna posuere tellus posuere pulvinar. Proin volutpat malesuada neque ut sollicitudin. Maecenas viverra dictum facilisis. Vivamus feugiat est lacus, at maximus nisi convallis eu. Donec quis elit non felis blandit fringilla. Sed mollis hendrerit est, id dictum neque tincidunt nec. Mauris tempus velit libero, in venenatis risus pulvinar vitae. Phasellus lacinia blandit urna, quis accumsan erat molestie id. Cras eu accumsan nisi.";
	
	//add page to ctr_pages table
	$sql = "INSERT INTO ctr_pages (page_title, page_name, page_author, page_content, page_type, page_menu_order, page_parent_id, page_level) VALUES ('Welcome to CTRMysite.','Home','1','".$page_content."','ctr_menu','1','0','1')";
	
	if ($conn->query($sql) === TRUE) {
		echo "<br>New ctr_tables record created successfully.";
	} else {
		echo "Error: " . $sql . "<p>" . $conn->error;
	}
	
	//create database connection file
	$config = fopen($_SERVER['DOCUMENT_ROOT'].'/config.php', "w") or die('Unable to open config file.');
	$txt = '<?php'."\n".'$ctr_database_name = '."'$ctr_database_name'".
				";\n".'$ctr_database_username = '."'$ctr_database_username'".
				";\n".'$ctr_database_password = '."'$ctr_database_password'".
				";\n".'$ctr_database_host = '."'$ctr_database_host'".
				";\n".'$ctr_database_prefix = '."'$ctr_database_prefix'".
				";\n".'?>';
	fwrite($config, $txt);
	fclose($config);
	
	//remove all files from install directory
	array_map('unlink', glob($_SERVER["DOCUMENT_ROOT"].'/install/*'));
	
	//remove install directory
	rmdir($_SERVER['DOCUMENT_ROOT'].'/install/');
	
	//redirect after successful install
	echo '<p>Welcome to your new site! Please continue to the front page by clicking <a href="../index.php">here</a>.';
}

$conn->close();
?>