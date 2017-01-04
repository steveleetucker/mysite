<?php
	//includes
	require($_SERVER['DOCUMENT_ROOT'].'/admin/includes/admin-head.php');
?>

<h1>Edit Site</h1>
<form>
<i>General Settings</i>
<hr>
Site Name<br>
<input type="text" value="CTR MySite"><p>
Copyright<br>
<input type="text" value="&copy; CTR MySite 2017"><p>
Site Mode<br>
<select name="ctr_admin_site_mode">
    <option value="" selected="selected">Normal</option>
    <option value="">Maintenance</option>
</select><p>
Select Theme<br>
<select name="ctr_admin_site_theme">
    <option value="" selected="selected">CTR MySite</option>
    <option value="">CrazyTheme1</option>
	<option value="">CrazyTheme2</option>
</select><p>
</form>
<?php
	//includes
	include($_SERVER['DOCUMENT_ROOT'].'/admin/includes/admin-foot.php');
?>