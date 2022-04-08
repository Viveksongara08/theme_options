<?php

require_once("../../../wp-load.php");
	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;
	global $smof_data;	

//print_r($_REQUEST); exit;

if(isset($_REQUEST["selectposts"])){

//print_r($_REQUEST["selectposts"]);	
	
foreach($_REQUEST["selectposts"] as $data){
	// echo $postID; echo"<br/>";
	$send_to_suppliers=update_post_meta($data, 'send_to_suppliers','Yes');
	$wpdb->query("INSERT INTO `".$wpdb->prefix."cfs_values` (`id`, `field_id`, `meta_id`, `post_id`) VALUES (NULL, '2', '".$send_to_suppliers."', '".$data."')");

	  
}


	
                 $arr["message"]="Submit Post";
				 $arr["type"]=1;
				 echo json_encode($arr);
}else{
	            
	             $arr["message"]="Somthing Was Wrong";
				 $arr["type"]=0;
				 echo json_encode($arr);
}
