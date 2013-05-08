<?php
/*
Plugin Name: Nginx Hacks
Author: wokamoto
Plugin URI: http://ninjax.cc/
Description: Nginx Hacks
Version: 0.0.2
Author URI: http://ninjax.cc/
*/

add_filter('got_rewrite','__return_true');

function auto_reverse_proxy_pre_comment_user_ip() {
	if ( isset($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
		$X_FORWARDED_FOR = explode(",", $_SERVER['HTTP_X_FORWARDED_FOR']);
		$REMOTE_ADDR=trim($X_FORWARDED_FOR[0]);
	} else {
		$REMOTE_ADDR=$_SERVER['REMOTE_ADDR'];
	}
	return $REMOTE_ADDR;
}
add_filter ( 'pre_comment_user_ip','auto_reverse_proxy_pre_comment_user_ip');
