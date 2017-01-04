<?php
	//includes
	require($_SERVER['DOCUMENT_ROOT'].'/admin/includes/admin-head.php');
	
	if(isset($_GET['id'])) {
		$page_id = $_GET['id'];
		include($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');
		if(isset($_GET['action'])) {
			$ctr_admin_page_title = $_POST['ctr_admin_page_title'];
			$ctr_admin_page_name = $_POST['ctr_admin_page_name'];
			$ctr_admin_page_content = $_POST['ctr_admin_page_content'];
			$sql = "UPDATE ctr_pages SET page_title='$ctr_admin_page_title', page_name='$ctr_admin_page_name', page_content='$ctr_admin_page_content' WHERE id=$page_id";
			if ($conn->query($sql) === TRUE) {
				$message = "Page Saved.";
			} else {
				$message = "Error updating page: ".$conn->error;
			}
		}
		
		$sql = mysqli_query($conn,"SELECT * FROM ctr_pages WHERE id=$page_id");
		$results = mysqli_fetch_array($sql);
		$page_title = $results['page_title'];
		$page_name = $results['page_name'];
		$page_author = $results['page_author'];
		$page_content = $results['page_content'];
		
		//author
		$sql2 = mysqli_query($conn,"SELECT username FROM ctr_users WHERE id=$page_author");
		$results2 = mysqli_fetch_array($sql2);
		$page_author = $results2['username'];
				
		include($_SERVER['DOCUMENT_ROOT'].'/dbclose.php');
	} else {
		header("location:../admin/pages.php");
	}
?>

<div class="ctr-admin-edit-page-title">Edit Page</div>
<div class="ctr-admin-edit-page-desc">Curabitur sed laoreet ex. Nam at porttitor felis, hendrerit blandit leo. Donec sed lectus tincidunt, posuere orci eu, venenatis sem. Nulla et eros massa. Fusce eget risus metus. Sed varius varius ex in porta. Aenean aliquet diam sed felis egestas, a hendrerit lorem aliquam. Vestibulum congue dui at enim fermentum, et interdum libero malesuada. Quisque vitae sem dolor. Mauris aliquet justo vitae eleifend auctor. Nam eu tellus varius, vulputate sapien vitae, blandit lectus. Pellentesque eget tempus ipsum.</div>
<p>
<div id="" style="color: green;"><?php if(isset($_GET['id'])){print "$message";} ?></div>
<p>
<form method="post" action="edit_page.php?id=<?php echo "$page_id"; ?>&action=1">
Page Title<br><input type="text" name="ctr_admin_page_title" value="<?php echo "$page_title"; ?>"><p>
Page Name<br><input type="text" name="ctr_admin_page_name" value="<?php echo "$page_name"; ?>"><p>
Author: <?php echo "$page_author"; ?><p>
Content<br><textarea name="ctr_admin_page_content" cols="100" rows="25"><?php echo "$page_content"; ?></textarea><p>
<input type="submit" value="Update">
</form>

<?php
	//includes
	require($_SERVER['DOCUMENT_ROOT'].'/admin/includes/admin-foot.php');
?>