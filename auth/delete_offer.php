<?php 
require_once("../../../wp-load.php");
	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;



if(isset($_REQUEST["offid"])){

$offid=$_REQUEST["offid"];

 wp_delete_post($offid);
		

if($results2){
$arr["message"]="Delete offer";
 echo json_encode($arr);
}

}
?>