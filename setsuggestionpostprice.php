<?php

require_once("../../../wp-load.php");
	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;
	global $smof_data;	

//print_r($_REQUEST); exit;

if(isset($_REQUEST["post_suggestionpost_price"])){




$postID=$_REQUEST["postID"];
$post_suggestionpost_price=$_REQUEST["post_suggestionpost_price"];
$post_suggestion_author=$_REQUEST["post_suggestion_author"];	
$post_author=$_REQUEST["post_author"];

global  $wpdb; 
global $smof_data;
$is_in_database = $wpdb->get_results( "SELECT * FROM wp_suggestionpost  WHERE postid=$postID and userid=$post_suggestion_author ");


if(empty($is_in_database)){
$sql="insert into wp_suggestionpost(price,postid,userid,postauthorid)values($post_suggestionpost_price,$postID,$post_suggestion_author,$post_author)";
$reslt=$wpdb->query($sql);

	             $arr["message"]="Submit Post";
				 $arr["type"]=1;
				 echo json_encode($arr);
	
}else{
	
	             $arr["message"]="You have already set price.";
				 $arr["type"]=1;
				 echo json_encode($arr);
	
}
               
}else{
	            
	             $arr["message"]="Somthing Was Wrong";
				 $arr["type"]=0;
				 echo json_encode($arr);
}



	