<?php

require_once("../wp-load.php");
	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;
		


if(@$_REQUEST['pid']!=""){
wp_trash_post( $_REQUEST['pid'] );
}