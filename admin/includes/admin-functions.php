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
		'page_url' => full_url( $_SERVER ),
		'' => "",
		'' => "",
		'' => "",
		'' => ""
	);
?>