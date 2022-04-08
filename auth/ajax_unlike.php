<?php 
require_once("../../../wp-load.php");
	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;


$pid=$_REQUEST["pid"];
$uid=$_REQUEST["uid"];

if($uid!=0){

$phone_image_1=get_post_meta ( $pid, $key = 'post_unlikes', $single = false );
$phone_image_2=get_post_meta ( $pid, $key = 'post_likes', $single = false );

/*
echo"<pre>";
print_r($phone_image_2);
echo"<br/>";
print_r($phone_image_1);
exit; */
if(!empty($phone_image_1) or !empty($phone_image_2) ){

if(in_array($uid,$phone_image_1) or in_array($uid,$phone_image_2) ){

$post_unlikes_new=get_post_meta ( $pid, $key = 'post_unlikes_new', $single = false );

}else{
  add_post_meta($pid, 'post_unlikes',$uid, false);
  $post_unlikes_new=get_post_meta ( $pid, $key = 'post_unlikes_new', $single = false );
  $count=$post_unlikes_new[0]+1;
  update_post_meta($pid, "post_unlikes_new", $count); 
  $post_unlikes_new=get_post_meta ( $pid, $key = 'post_unlikes_new', $single = false );
}	
	
}else{
add_post_meta($pid, 'post_unlikes',$uid, false);
$count=1;
update_post_meta($pid, "post_unlikes_new", $count); 
$post_unlikes_new=get_post_meta ( $pid, $key = 'post_unlikes_new', $single = false );
		
}

}

 $arr["message"]="unlike";
 $arr["count"]=$post_unlikes_new[0];
 echo json_encode($arr);



 ?>