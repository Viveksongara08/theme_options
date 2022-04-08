<?php

require_once("../../../wp-load.php");
	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;
	include('file_uploads.php');
	
 if( isset($_REQUEST['post_title'])) 
	{
$post_id=$_REQUEST["post_id"];
$post_title=$_REQUEST["post_title"];
$post_description=$_REQUEST["post_description"];
$cta=$_REQUEST["pcta"];
$post_price=$_REQUEST["post_price"];
//$ptag=$_REQUEST["ptag"];
//echo"<pre>";print_r($cta);exit;
if(!empty($_FILES["thumbimage"]['name'][0])){
	$attachid=file_uploads($_FILES["thumbimage"]);
	
}	
if(!empty($_FILES["file"]['name'][0])){
	$attachid1=file_uploads($_FILES["file"]);
	
}


$image_data=$_REQUEST["image_data"];

	
	$imgData=json_decode($image_data);

global $wpdb;
		
	$post_arguments=array(
         'ID' => $post_id,
		 'post_title' => $post_title,
		 'post_content' => $post_description,
		 'post_status'   => 'publish', // Now it's public
         'post_type'     =>'post',
		 'post_category'=>$cta,
		 //'tax_input'=>$custom_tax,
		//  'tags_input' => $ptag
		 );
	$insert=wp_update_post( $post_arguments, $wp_error = false );	

	if ( $insert && !empty( $attachid ) ) {
			update_post_meta( $insert, '_thumbnail_id', $attachid); //adding featured image to post
		} 
		
 if ( $insert && !empty( $attachid1 ) ) {
//add_post_meta( $insert, '_video_id', $attachid1, true ); //adding featured image to post
/* $number=update_post_meta($insert, '_video_id', $attachid1);
$wpdb->query("INSERT INTO `".$wpdb->prefix."cfs_values` (`id`, `field_id`, `meta_id`, `post_id`) VALUES (NULL, '15', '".$number."', '".$insert."')");
	 */		
		} 	
	
	

if($post_id){
    
    update_post_meta($post_id, "room_gallery_ids",$image_data);

$post_price1=update_post_meta($insert, 'post_price', $post_price);
$wpdb->query("INSERT INTO `".$wpdb->prefix."cfs_values` (`id`, `field_id`, `meta_id`, `post_id`) VALUES (NULL, '1', '".$post_price1."', '".$insert."')");
		
	
 
       $arr["message"]="Update your blog sucessfully";
             $arr["type"]=1;
				 echo json_encode($arr);
	
}else{
	             $arr["message"]="Somthing Was Wrong";

			     $arr["type"]=0;
				 echo json_encode($arr);
}


} 
	