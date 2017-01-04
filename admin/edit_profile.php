<?php
	//includes
	require($_SERVER['DOCUMENT_ROOT'].'/admin/includes/admin-head.php');
?>

<div class="ctr-admin-edit_profile-title">Edit Profile</div>
<div class="ctr-admin-edit_profile-desc">Curabitur sed laoreet ex. Nam at porttitor felis, hendrerit blandit leo. Donec sed lectus tincidunt, posuere orci eu, venenatis sem. Nulla et eros massa. Fusce eget risus metus. Sed varius varius ex in porta. Aenean aliquet diam sed felis egestas, a hendrerit lorem aliquam. Vestibulum congue dui at enim fermentum, et interdum libero malesuada. Quisque vitae sem dolor. Mauris aliquet justo vitae eleifend auctor. Nam eu tellus varius, vulputate sapien vitae, blandit lectus. Pellentesque eget tempus ipsum.</div>
<p>
<form action="edit_profile.php" method="post">
Username: *********** | <a href="">Change Password</a><br>
Email: *********** | <a href="">Change Email</a><br>
User Level: *********** | <a href="">Change User Level</a>
<p>
<input type="submit" value="Update">
</form>

<?php
	//includes
	require($_SERVER['DOCUMENT_ROOT'].'/admin/includes/admin-foot.php');
?>