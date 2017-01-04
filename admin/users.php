<?php
	//includes
	require($_SERVER['DOCUMENT_ROOT'].'/admin/includes/admin-head.php');
?>

<style>
.ctr_admin_users_table{
  display: table;         
  width: auto;         
  background-color: #eee;         
  border: 1px solid #666666;         
  border-spacing: 1px; /*cellspacing:poor IE support for  this*/
}

.ctr_admin_users_table_head{
  display: table-row;
  width: auto;
  clear: both;
}

.ctr_admin_users_table_cell_id {
  float:left;/*fix for  buggy browsers*/
  display:table-column;       
  width: 25px;
  background-color:#ccc;
}

.ctr_admin_users_table_cell_name {
  float:left;/*fix for  buggy browsers*/
  display:table-column;       
  width: 125px;
  background-color:#ccc;
}

.ctr_admin_users_table_cell_author {
  float:left;/*fix for  buggy browsers*/
  display:table-column;       
  width: 125px;
  background-color:#ccc;
}

.ctr_admin_users_table_cell_content {
  float: left; /*fix for buggy browsers*/
  display: table-column;        
  width: 400px;
  background-color:#ccc;
}

.ctr_admin_users_table_cell_edit {
  float: left; /*fix for buggy browsers*/
  display: table-column;
  width: 50px;
  background-color:#ccc;
}

.ctr_admin_users_table_cell_view {
  float: left; /*fix for buggy browsers*/
  display: table-column;        
  width: 50px;
  background-color:#ccc;
}
</style>

<div class="ctr-admin-users-title">Users</div>
<div class="ctr-admin-users-desc">Curabitur sed laoreet ex. Nam at porttitor felis, hendrerit blandit leo. Donec sed lectus tincidunt, posuere orci eu, venenatis sem. Nulla et eros massa. Fusce eget risus metus. Sed varius varius ex in porta. Aenean aliquet diam sed felis egestas, a hendrerit lorem aliquam. Vestibulum congue dui at enim fermentum, et interdum libero malesuada. Quisque vitae sem dolor. Mauris aliquet justo vitae eleifend auctor. Nam eu tellus varius, vulputate sapien vitae, blandit lectus. Pellentesque eget tempus ipsum.</div>
<p>

<?php
	//includes
	require($_SERVER['DOCUMENT_ROOT'].'/admin/includes/admin-foot.php');
?>