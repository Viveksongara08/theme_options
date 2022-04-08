<?php 
require_once("../wp-load.php");
	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;


//echo"<pre>";print_r($_FILES);exit;
	///print_r($_FILES["upload_image"]); 
	if(!empty($_FILES["upload_image"]['name'][0])){
		
		//echo count($_FILES['upload_image']['name']);
		  for($j=0; $j < count($_FILES["upload_image"]['name']); $j++){
			  
			  
			  		if ( $_FILES['upload_image']['name'][$j] != '' ) {//if user has uploaded the files
			$image_name = $_FILES['upload_image']['name'][$j];
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
		$uploadedfile = $_FILES['upload_image'];
		$upload_overrides = array( 'test_form' => false );
		
		$file = array(
      'name'     => $uploadedfile['name'][$j],
      'type'     => $uploadedfile['type'][$j],
      'tmp_name' => $uploadedfile['tmp_name'][$j],
      'error'    => $uploadedfile['error'][$j],
      'size'     => $uploadedfile['size'][$j]
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
			$image_data[] =$attach_id;
			  
			  
		  }
		
		if(!empty($_REQUEST['image_data1'])){
		$data=json_decode($_REQUEST['image_data1']);
		$image_data1=array_merge($image_data,$data);
		$gallerydata=json_encode($image_data1);
		
		}else{
		$gallerydata=json_encode($image_data); 
		}
	}

//print_r($image_data); exit;
if(!empty($image_data)){
	 $arr["type"]=1;
	 $arr["message_data"]=$gallerydata;
	for($i=0;$i<count($image_data);$i++){
   $imagelink =get_post_meta ( $image_data[$i], $key = '_wp_attached_file', $single = false );
//   print_r($imagelink);
//$arr['message'].="<a id=post_".$image_data[$i]." href='javascript:;'><span class='remove_image' id=".$image_data[$i].">Remove</span><img src=".site_url()."/wp-content/uploads/".$imagelink[0]." /></a>";
	
$arr['message'].="<div style='height:70px; width:70px;float: left;border: solid 3px #000;margin: 10px;' id=post_".$image_data[$i]." ><img src=".site_url()."/wp-content/uploads/".$imagelink[0]."  class='img-responsive'>
<div class='uni-upload-de-fix'><button type='button' style='cursor: pointer;'  id=".$image_data[$i]." class='delete remove_image'> <i class='fa fa-trash-o' aria-hidden='true'></i>Remove</button></div></div>";
	
	}
	 
   echo json_encode($arr);
}

?>