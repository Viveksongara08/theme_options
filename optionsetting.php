<?php 
require_once("../../../wp-load.php");
	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;


if(isset($_REQUEST["generalsettings"])){
update_option( "generalsettings",$_REQUEST["generalsettings"]);	
}
if(isset($_REQUEST["homesettings"])){
update_option( "homesettings",$_REQUEST["homesettings"]);	
}
if(isset($_REQUEST["emailssettings"])){
update_option( "emailssettings",$_REQUEST["emailssettings"]);	
}
if(isset($_REQUEST["footersettings"])){
update_option( "footersettings",$_REQUEST["footersettings"]);	
}
if(isset($_REQUEST["socialsharing"])){
update_option( "socialsharing",$_REQUEST["socialsharing"]);	
}


 ?>