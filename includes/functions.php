<?php
	function url_origin( $s, $use_forwarded_host = false ) {
			$ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
			$sp       = strtolower( $s['SERVER_PROTOCOL'] );
			$protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
			$port     = $s['SERVER_PORT'];
			$port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
			$host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
			$host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
			return $protocol . '://' . $host;
	}

	function full_url( $s, $use_forwarded_host = false ) {
			return url_origin( $s, $use_forwarded_host ) . $s['REQUEST_URI'];
	}
	
	// http://stackoverflow.com/questions/4383914/how-to-get-single-value-from-php-array
	$ctr_site = array(
		'url' => url_origin( $_SERVER ),
		'' => "",
		'' => "",
		'' => "",
		'' => "",
		'' => ""
	);
	
	//page ID
	if(isset($_GET['id'])) {
		$ctr_page_id = $_GET['id'];
	} else {
		$ctr_page_id = '1';
	}
	
	//collect page data
	include($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');
	$sql = mysqli_query($conn,"SELECT * FROM `ctr_pages` WHERE id='$ctr_page_id'");
	$result = mysqli_fetch_array($sql);
	$ctr_page = array(
		'content' => $result['page_content'],
		'title' => $result['page_title'],
		'' => "",
		'' => "",
		'' => "",
		'' => ""
	);
	include($_SERVER['DOCUMENT_ROOT'].'/dbclose.php');
	
	//site menu function <UPDATE TO HANDLE MORE SUBS> - http://stackoverflow.com/questions/10924127/two-mysqli-queries
	function ctr_site_menu(){
		include($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');
		$sql = mysqli_query($conn,"SELECT id, page_name FROM `ctr_pages` WHERE page_type='ctr_menu' AND !(page_menu_order=0) ORDER BY page_menu_order ASC");
		print '<ul>';
		while($result = mysqli_fetch_array($sql)){
				$menuID = $result['id'];
				$menuName = $result['page_name'];
				$menuParentID = $result['page_parent_id'];
				print '<li>';
				print '<a href="'.$ctr_site['url'].'/index.php?id='.$menuID.'">'.$menuName.'</a>';
				$sql_sub = mysqli_query($conn,"SELECT id, page_name FROM `ctr_pages` WHERE page_type='ctr_menu' AND page_parent_id='$menuID'");
				if ( mysqli_num_rows($sql_sub) > 0){
					print '<ul>';
					while($result_sub = mysqli_fetch_array($sql_sub)){
						$menuID_sub = $result_sub['id'];
						$menuName_sub = $result_sub['page_name'];
						print '<li>';
						print '<a href="'.$ctr_site['url'].'/index.php?id='.$menuID_sub.'">'.$menuName_sub.'</a>';
						print '</li>';
					}
					print '</ul>';
				}
				print '</li>';
		}
		print '</ul>';
		include($_SERVER['DOCUMENT_ROOT'].'/dbclose.php');
	}
?>