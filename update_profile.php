<?php

require_once("../../../wp-load.php");
	$error= '';
	$success = '';
 
global $wpdb, $PasswordHash, $current_user, $user_ID;
	

	
if(!empty($_FILES["ap_form_post_image1"]['name'])){
		
		//echo count($_FILES['ap_form_post_image1']['name']);
			  
			  
			if ( $_FILES['ap_form_post_image1']['name'] != '' ) {//if user has uploaded the files
			$image_name = $_FILES['ap_form_post_image1']['name'];
			$ext_array = explode( '.', $image_name );
			$ext = end( $ext_array );
			if ( !($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg' || $ext == 'gif' || $ext == 'JPEG' || $ext == 'PNG' || $ext == 'JPG') ) {//if users upload invalid file type
				$error->image = __( 'Invalid File Type', 'accesspress-anonymous-post' );
				$error_flag = 1;
				$image_error_flag = 1;
			}
		}
	
		if ( !function_exists( 'wp_handle_upload' ) )
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
		$uploadedfile = $_FILES['ap_form_post_image1'];
		$upload_overrides = array( 'test_form' => false );
		
		$file = array(
      'name'     => $uploadedfile['name'],
      'type'     => $uploadedfile['type'],
      'tmp_name' => $uploadedfile['tmp_name'],
      'error'    => $uploadedfile['error'],
      'size'     => $uploadedfile['size']
    );
		
		
		$movefile = wp_handle_upload( $file, $upload_overrides );
		
		
		
		if ( isset( $movefile['error'] ) ) {
			$error_flag = 1;
			echo $error->image = $movefile['error'];
			exit;
		} else {
			if ( !function_exists( 'wp_crop_image' ) )
				require_once( ABSPATH . 'wp-admin/includes/image.php' );
			//include( ABSPATH . 'wp-admin/includes/image.php' );
			$wp_filetype = $movefile['type'];
			$filename = $movefile['file'];
			$wp_upload_dir = wp_upload_dir();
			$attachment = array(
				'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
				'post_mime_type' => $wp_filetype,
				'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
				'post_content' => '',
				'post_status' => 'inherit'
			);
			$attach_id = wp_insert_attachment( $attachment, $filename );
			//var_dump($attach_id);die();
			$attach_data = wp_generate_attachment_metadata( $attach_id, $movefile['file'] );
			wp_update_attachment_metadata( $attach_id, $attach_data );
		}
			$gallerydata =$attach_id;
			  
			  
		
		
		
		
	}
		
	// print_r($_REQUEST);exit;	
 if( isset($_REQUEST['full_name'])) 
	{
	
	
$full_name=$_REQUEST["full_name"];
$title=$_REQUEST["title"];
$personallink=$_REQUEST["personallink"];
$about_you=$_REQUEST["about_you"];
$your_story=$_REQUEST["your_story"];
$website=$_REQUEST["website"];
$post_id=$_REQUEST["post_id"];
$youtube=$_REQUEST["youtube"];

$facebook_url=$_REQUEST["facebook_url"];
$twitter_url=$_REQUEST["twitter_url"];
$instagram_url=$_REQUEST["instagram_url"];
$pinterest_url=$_REQUEST["pinterest_url"];


	
		global  $wpdb;
		
		
		if ( $_FILES['ap_form_post_image']['name'] != '' ) {
			if ( $_FILES['ap_form_post_image']['name'] != '' ) {//if user has uploaded the files
			$image_name = $_FILES['ap_form_post_image']['name'];
			$ext_array = explode( '.', $image_name );
			$ext = end( $ext_array );
			if ( !($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg' || $ext == 'gif' || $ext == 'JPEG' || $ext == 'PNG' || $ext == 'JPG') ) {//if users upload invalid file type
				$error->image = __( 'Invalid File Type', 'accesspress-anonymous-post' );
				$error_flag = 1;
				$image_error_flag = 1;
			}
		}
	
		if ( !function_exists( 'wp_handle_upload' ) )
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
		$uploadedfile = $_FILES['ap_form_post_image'];
		$upload_overrides = array( 'test_form' => false );
		$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
		if ( isset( $movefile['error'] ) ) {
			$error_flag = 1;
			echo $error->image = $movefile['error'];
			exit;
		} else {
			if ( !function_exists( 'wp_crop_image' ) )
				require_once( ABSPATH . 'wp-admin/includes/image.php' );
			//include( ABSPATH . 'wp-admin/includes/image.php' );
			$wp_filetype = $movefile['type'];
			$filename = $movefile['file'];
			$wp_upload_dir = wp_upload_dir();
			$attachment = array(
				'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
				'post_mime_type' => $wp_filetype,
				'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
				'post_content' => '',
				'post_status' => 'inherit'
			);
			$attach_id1 = wp_insert_attachment( $attachment, $filename );
			//var_dump($attach_id1);die();
			$attach_data = wp_generate_attachment_metadata( $attach_id1, $movefile['file'] );
			wp_update_attachment_metadata( $attach_id1, $attach_data );
		}
		}
		
		
	$post_arguments=array(
         'ID' => $post_id,
		 'post_title' => $full_name,
		 'post_content' => $about_you,
		 'post_status'   => 'publish', // Now it's public
         'post_type'     =>'post',
		 );
	$insert=wp_update_post( $post_arguments, $wp_error = false );	

		if ( $post_id && isset( $attach_id1 ) ) {
			
			update_post_meta( $post_id, '_thumbnail_id', $attach_id1, false ); //adding featured image to post
		}

if($post_id){
	if(!empty($_FILES["ap_form_post_image1"]['name'][0])){
update_post_meta($post_id, 'gallery_images',$gallerydata, false);
	}


if(!empty($title)){
$title_metaid=update_post_meta($post_id, 'title',$title, false);
$wpdb->query("INSERT INTO `".$wpdb->prefix."cfs_values` (`id`, `field_id`, `meta_id`, `post_id`) VALUES (NULL, '1', '".$title_metaid."', '".$post_id."')");
}
if(!empty($about_you)){
$about_you_metaid=update_post_meta($post_id, 'about_you',$about_you, false);
$wpdb->query("INSERT INTO `".$wpdb->prefix."cfs_values` (`id`, `field_id`, `meta_id`, `post_id`) VALUES (NULL, '2', '".$about_you_metaid."', '".$post_id."')");
}
if(!empty($your_story)){
$your_story_metaid=update_post_meta($post_id, 'your_story',$your_story, false);
$wpdb->query("INSERT INTO `".$wpdb->prefix."cfs_values` (`id`, `field_id`, `meta_id`, `post_id`) VALUES (NULL, '3', '".$your_story_metaid."', '".$post_id."')");
}

if(!empty($website)){
$website_metaid=update_post_meta($post_id, 'website',$website, false);
$wpdb->query("INSERT INTO `".$wpdb->prefix."cfs_values` (`id`, `field_id`, `meta_id`, `post_id`) VALUES (NULL, '4', '".$website_metaid."', '".$post_id."')");
}

if(!empty($youtube)){
$youtube_metaid=update_post_meta($post_id, 'youtube',$youtube, false);
$wpdb->query("INSERT INTO `".$wpdb->prefix."cfs_values` (`id`, `field_id`, `meta_id`, `post_id`) VALUES (NULL, '40', '".$youtube_metaid."', '".$post_id."')");
}

if(!empty($facebook_url)){
$facebook_url_metaid=update_post_meta($post_id, 'facebook_url',$facebook_url, false);
$wpdb->query("INSERT INTO `".$wpdb->prefix."cfs_values` (`id`, `field_id`, `meta_id`, `post_id`) VALUES (NULL, '41', '".$facebook_url_metaid."', '".$post_id."')");
}

if(!empty($twitter_url)){
$twitter_url_metaid=update_post_meta($post_id, 'twitter_url',$twitter_url, false);
$wpdb->query("INSERT INTO `".$wpdb->prefix."cfs_values` (`id`, `field_id`, `meta_id`, `post_id`) VALUES (NULL, '42', '".$twitter_url_metaid."', '".$post_id."')");
}

if(!empty($instagram_url)){
$instagram_url_metaid=update_post_meta($post_id, 'instagram_url',$instagram_url, false);
$wpdb->query("INSERT INTO `".$wpdb->prefix."cfs_values` (`id`, `field_id`, `meta_id`, `post_id`) VALUES (NULL, '43', '".$instagram_url_metaid."', '".$post_id."')");
}

if(!empty($pinterest_url)){
$pinterest_url_metaid=update_post_meta($post_id, 'pinterest_url',$pinterest_url, false);
$wpdb->query("INSERT INTO `".$wpdb->prefix."cfs_values` (`id`, `field_id`, `meta_id`, `post_id`) VALUES (NULL, '44', '".$pinterest_url_metaid."', '".$post_id."')");
}
	
//_wp_attached_file
//update_post_meta($post_id, 'full_name',$full_name, false);
//update_post_meta($post_id, 'title',$title, false);
//update_post_meta($post_id, 'about_you',$about_you, false);
//update_post_meta($post_id, 'your_story',$your_story, false);
//update_post_meta($post_id, 'website',$website, false);







                 $arr["message"]="Profile updated successfully.";
								
			     $arr["type"]=1;
				 echo json_encode($arr);
	
}else{
	             $arr["message"]="Somthing Was Wrong";
				  $arr["type"]=0;
				 echo json_encode($arr);
}


	}
	