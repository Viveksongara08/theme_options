<?php 
require_once("../../../wp-load.php");
	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;





$compare_post_id=$_REQUEST["compare_post_id"];
$session_id=$_REQUEST["session_id"];

$sql="select  * from wp_compare where post_id=$compare_post_id and user_id='$session_id'";
$results = $wpdb->get_results($sql);

if(empty($results)){
$sql1="select  count(*) from wp_compare where user_id='$session_id'";
$results1 = $wpdb->get_var($sql1);	
if($results1<3){
$sql2="insert into wp_compare(post_id,user_id)values('$compare_post_id','$session_id')";
$results2 = $wpdb->query($sql2);	
$sql0="select  count(*) from wp_compare where user_id='$session_id'";
$results0 = $wpdb->get_var($sql0);
$arr["count"]=$results0;
$arr["btn_text"]="In Compare";
$arr["post_id"]=$compare_post_id;
 echo json_encode($arr);
}	
}else{
$sql3="delete from wp_compare where post_id='$compare_post_id' and user_id='$session_id'";
$results3 = $wpdb->query($sql3);

$sql4="select  count(*) from wp_compare where user_id='$session_id'";
$results4 = $wpdb->get_var($sql4);	
$arr["count"]=$results4;
$arr["btn_text"]="Add Compare";
$arr["post_id"]=$compare_post_id;
 echo json_encode($arr);	
}

?>