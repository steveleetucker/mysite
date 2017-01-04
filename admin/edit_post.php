<?php
	//includes
	require($_SERVER['DOCUMENT_ROOT'].'/admin/includes/admin-head.php');
	
	if(isset($_GET['id'])) {
		$post_id = $_GET['id'];
		include($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');
		if(isset($_GET['action'])) {
			$ctr_admin_post_title = $_POST['ctr_admin_post_title'];
			$ctr_admin_post_name = $_POST['ctr_admin_post_name'];
			$ctr_admin_post_content = $_POST['ctr_admin_post_content'];
			$sql = "UPDATE ctr_posts SET post_title='$ctr_admin_post_title', post_name='$ctr_admin_post_name', post_content='$ctr_admin_post_content' WHERE id=$post_id";
			if ($conn->query($sql) === TRUE) {
				$message = "Post Saved.";
			} else {
				$message = "Error updating post: ".$conn->error;
			}
		}
		
		$sql = mysqli_query($conn,"SELECT * FROM ctr_posts WHERE id=$post_id");
		$results = mysqli_fetch_array($sql);
		$post_title = $results['post_title'];
		$post_name = $results['post_name'];
		$post_author = $results['post_author'];
		$post_content = $results['post_content'];
		
		//author
		$sql2 = mysqli_query($conn,"SELECT username FROM ctr_users WHERE id=$post_author");
		$results2 = mysqli_fetch_array($sql2);
		$post_author = $results2['username'];
				
		include($_SERVER['DOCUMENT_ROOT'].'/dbclose.php');
	} else {
		header("location:../admin/posts.php");
	}
?>

<div class="ctr-admin-edit-post-title">Edit Post</div>
<div class="ctr-admin-edit-post-desc">Curabitur sed laoreet ex. Nam at porttitor felis, hendrerit blandit leo. Donec sed lectus tincidunt, posuere orci eu, venenatis sem. Nulla et eros massa. Fusce eget risus metus. Sed varius varius ex in porta. Aenean aliquet diam sed felis egestas, a hendrerit lorem aliquam. Vestibulum congue dui at enim fermentum, et interdum libero malesuada. Quisque vitae sem dolor. Mauris aliquet justo vitae eleifend auctor. Nam eu tellus varius, vulputate sapien vitae, blandit lectus. Pellentesque eget tempus ipsum.</div>
<p>
<div id="" style="color: green;"><?php if(isset($_GET['id'])){print "$message";} ?></div>
<p>
<form method="post" action="edit_post.php?id=<?php echo "$post_id"; ?>&action=1">
Post Title<br><input type="text" name="ctr_admin_post_title" value="<?php echo "$post_title"; ?>"><p>
Post Name<br><input type="text" name="ctr_admin_post_name" value="<?php echo "$post_name"; ?>"><p>
Author: <?php echo "$post_author"; ?><p>
Content<br><textarea name="ctr_admin_post_content" cols="100" rows="25"><?php echo "$post_content"; ?></textarea><p>
<input type="submit" value="Update">
</form>

<?php
	//includes
	require($_SERVER['DOCUMENT_ROOT'].'/admin/includes/admin-foot.php');
?>