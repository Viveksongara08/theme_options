<?php 
require_once("../../../wp-load.php");
	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;


$pid=$_REQUEST["pid"];
$uid=$_REQUEST["uid"];

if($uid!=0){

$phone_image_1=get_post_meta ( $pid, $key = 'post_favorites', $single = false );

//print_r($phone_image_1); exit;
if(!empty($phone_image_1)){

if(in_array($uid,$phone_image_1)){
	delete_post_meta($pid,'post_favorites',$uid);
	$phone_image_1=get_post_meta ( $pid, $key = 'post_favorites', $single = false );
 
                 $arr["message"]="Favorite";
				 $arr["count"]=count($phone_image_1);
				 echo json_encode($arr);

}else{
	add_post_meta($pid, 'post_favorites',$uid, false);
		$phone_image_1=get_post_meta ( $pid, $key = 'post_favorites', $single = false );

 $arr["message"]="Unfavorite";
 $arr["count"]=count($phone_image_1);
 echo json_encode($arr);
}

}else{
	add_post_meta($pid, 'post_favorites',$uid, false);
	$phone_image_1=get_post_meta ( $pid, $key = 'post_favorites', $single = false );

 $arr["message"]="Unfavorite";
 $arr["count"]=count($phone_image_1);
 echo json_encode($arr);

}
 
}





 ?>