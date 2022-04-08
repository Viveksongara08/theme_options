<?php 
require_once("../../../wp-load.php");
	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;


$cid=$_REQUEST["cid"];
$uid=$_REQUEST["uid"];


if($uid!=0){

$comment_likes=get_comment_meta ( $cid, $key = 'comment_like', $single = false );

//echo"<pre>";print_r($comment_likes);exit;

if(!empty($comment_likes)){
if(in_array($uid,$comment_likes)){

 delete_comment_meta($cid,'comment_like',$uid);
  $comment_likes=get_comment_meta( $cid, $key = 'comment_likes', $single = false );
  $count=$comment_likes[0]-1;
  update_comment_meta($cid, "comment_likes", $count); 
  $comment_likes=get_comment_meta ( $cid, $key = 'comment_likes', $single = false );
	
	 $arr["message"]="like";
 $arr["count"]=$comment_likes[0];
}else{

add_comment_meta($cid, 'comment_like',$uid, false);

$comment_likes=get_comment_meta ( $cid, $key = 'comment_likes', $single = false );
$count=$comment_likes[0]+1;
update_comment_meta($cid, "comment_likes", $count); 
$comment_likes=get_comment_meta ( $cid, $key = 'comment_likes', $single = false );
 $arr["message"]="Unlike";
 $arr["count"]=$comment_likes[0];	
}	
	
	
}else{
  
add_comment_meta($cid, 'comment_like',$uid, false);
$count=1;
update_comment_meta($cid, "comment_likes", $count); 
$comment_likes=get_comment_meta ( $cid, $key = 'comment_likes', $single = false );

 $arr["message"]="Unlike";
 $arr["count"]=$comment_likes[0];	
}
}


 echo json_encode($arr);



 ?>