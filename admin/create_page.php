<?php
	//includes
	require($_SERVER['DOCUMENT_ROOT'].'/admin/includes/admin-head.php');
	
	//if SETS exist
	if(isset($_GET['action'])){
		include($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');
		$ctr_admin_page_title = $_POST['ctr_admin_page_title'];
		$ctr_admin_page_name = $_POST['ctr_admin_page_name'];
		$ctr_admin_page_content = $_POST['ctr_admin_page_content'];
		$ctr_admin_page_author = "$ctr_admin_user_id";
		$ctr_admin_page_level = "$level";
		
		$sql = "INSERT INTO ctr_pages (page_title, page_name, page_author, page_content, page_type, page_category, page_level) VALUES ('$ctr_admin_page_title','$ctr_admin_page_name','$ctr_admin_page_author','$ctr_admin_page_content','ctr_page','0','0')";
		
		if ($conn->query($sql) === TRUE) {
			header("location:".$ctr_site['url']."/admin/pages.php");
		} else {
			echo "Error: " . $sql . "<p>" . $conn->error;
		}
		include($_SERVER['DOCUMENT_ROOT'].'/dbclose.php');
	}
?>

<div class="ctr-admin-create-page-title">Create Page</div>
<div class="ctr-admin-create-page-desc">Curabitur sed laoreet ex. Nam at porttitor felis, hendrerit blandit leo. Donec sed lectus tincidunt, posuere orci eu, venenatis sem. Nulla et eros massa. Fusce eget risus metus. Sed varius varius ex in porta. Aenean aliquet diam sed felis egestas, a hendrerit lorem aliquam. Vestibulum congue dui at enim fermentum, et interdum libero malesuada. Quisque vitae sem dolor. Mauris aliquet justo vitae eleifend auctor. Nam eu tellus varius, vulputate sapien vitae, blandit lectus. Pellentesque eget tempus ipsum.</div>
<p>
<div id="" style="color: green;"></div>
<p>
<form method="post" action="create_page.php?action=1">
Page Title<br><input type="text" name="ctr_admin_page_title" value=""><p>
Page Name<br><input type="text" name="ctr_admin_page_name" value=""><p>
Content<br><textarea name="ctr_admin_page_content" cols="100" rows="25"></textarea><p>
<input type="submit" value="Update">
</form>

<?php
	//includes
	require($_SERVER['DOCUMENT_ROOT'].'/admin/includes/admin-foot.php');
?>