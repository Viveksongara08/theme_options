<?php 
require_once("../../../wp-load.php");
	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;



if(isset($_REQUEST["offerid"])){

$price=$_REQUEST["price"];
$offerid=$_REQUEST["offerid"];

update_post_meta($offerid, "offer_price", $price);

$arr["message"]="Update Price";
 echo json_encode($arr);

}
?>