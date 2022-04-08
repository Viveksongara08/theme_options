<?php 
require_once("../../../wp-load.php");
	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;
	

	$remove_image_id=$_REQUEST["remove_image_id"];
	$data=json_decode($_REQUEST['image_data']);
	$gallerydata=json_encode($data);
	
			
		 //delete_post_meta($remove_image_id, 'my_postmeta_key_1');
		 wp_delete_post($remove_image_id);
		 
		 $key = array_search($remove_image_id, $data);
if (false !== $key) {
    unset($data[$key]);
}
$data=array_values($data);
$gallerydata=json_encode($data);

    $arr["message"]=$gallerydata;
	$arr["remove_image_id"]=$remove_image_id;
	
echo json_encode($arr);	

	
?>