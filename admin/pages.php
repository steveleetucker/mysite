<?php
	//includes
	require($_SERVER['DOCUMENT_ROOT'].'/admin/includes/admin-head.php');
?>

<style>
.ctr_admin_pages_table{
  display: table;         
  width: auto;         
  background-color: #eee;         
  border: 1px solid #666666;         
  border-spacing: 1px; /*cellspacing:poor IE support for  this*/
}

.ctr_admin_pages_table_head{
  display: table-row;
  width: auto;
  clear: both;
}

.ctr_admin_pages_table_cell_id {
  float:left;/*fix for  buggy browsers*/
  display:table-column;       
  width: 25px;
  background-color:#ccc;
}

.ctr_admin_pages_table_cell_name {
  float:left;/*fix for  buggy browsers*/
  display:table-column;       
  width: 125px;
  background-color:#ccc;
}

.ctr_admin_pages_table_cell_author {
  float:left;/*fix for  buggy browsers*/
  display:table-column;       
  width: 125px;
  background-color:#ccc;
}

.ctr_admin_pages_table_cell_content {
  float: left; /*fix for buggy browsers*/
  display: table-column;        
  width: 400px;
  background-color:#ccc;
}

.ctr_admin_pages_table_cell_edit {
  float: left; /*fix for buggy browsers*/
  display: table-column;
  width: 50px;
  background-color:#ccc;
}

.ctr_admin_pages_table_cell_view {
  float: left; /*fix for buggy browsers*/
  display: table-column;        
  width: 50px;
  background-color:#ccc;
}
</style>

<div class="ctr-admin-pages-title">Pages</div>
<div class="ctr-admin-pages-desc">Curabitur sed laoreet ex. Nam at porttitor felis, hendrerit blandit leo. Donec sed lectus tincidunt, posuere orci eu, venenatis sem. Nulla et eros massa. Fusce eget risus metus. Sed varius varius ex in porta. Aenean aliquet diam sed felis egestas, a hendrerit lorem aliquam. Vestibulum congue dui at enim fermentum, et interdum libero malesuada. Quisque vitae sem dolor. Mauris aliquet justo vitae eleifend auctor. Nam eu tellus varius, vulputate sapien vitae, blandit lectus. Pellentesque eget tempus ipsum.</div>
<p>

<?php print '<a href="'.$ctr_site['url'].'/admin/create_page.php">+ Create Page</a>'; ?>

<?php
	include($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');
	$sql = mysqli_query($conn,"SELECT * FROM `ctr_pages` ORDER BY page_name ASC");
	if (mysqli_num_rows($sql) > 0){
		print '<div class="ctr_admin_pages_table">';
		print '<div class="ctr_admin_pages_table_head">';
		print '<div class="ctr_admin_pages_table_cell_id">ID</div>';
		print '<div class="ctr_admin_pages_table_cell_name">Name</div>';
		print '<div class="ctr_admin_pages_table_cell_author">Author</div>';
		print '<div class="ctr_admin_pages_table_cell_content">Content</div>';
		print '<div class="ctr_admin_pages_table_cell_edit">Edit</div>';
		print '<div class="ctr_admin_pages_table_cell_view">View</div>';
		print '</div>';
		while($results = mysqli_fetch_array($sql)){
			$page_id = $results['id'];
			$page_name = $results['page_name'];
			$page_author = $results['page_author'];
			//figure out author
			$page_content = substr($results['page_content'], 0, 50)."...";
			
			print '<div class="ctr_admin_pages_table_row">';
			print '<div class="ctr_admin_pages_table_cell_id">'.$page_id.'</div>';
			print '<div class="ctr_admin_pages_table_cell_name">'.$page_name.'</div>';
			print '<div class="ctr_admin_pages_table_cell_author">'.$page_author.'</div>';
			print '<div class="ctr_admin_pages_table_cell_content">'.$page_content.'</div>';
			
			print '<div class="ctr_admin_pages_table_cell_edit"><a href="'.$ctr_site['url'].'/admin/edit_page.php?id='.$page_id.'">Edit</a></div>';
			print '<div class="ctr_admin_pages_table_cell_view"><a href="'.$ctr_site['url'].'/index.php?id='.$page_id.'">View</a><br></div>';
			print '</div>';
		}
	} else {
		print 'There is no pages available. Please add one.';
	}
	include($_SERVER['DOCUMENT_ROOT'].'/dbclose.php');
	print '</div>';
?>

<?php
	//includes
	require($_SERVER['DOCUMENT_ROOT'].'/admin/includes/admin-foot.php');
?>