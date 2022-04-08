<?php

require_once("../../../wp-load.php");

	$error= '';
	$success = '';
 
// echo"<pre>";print_r($_REQUEST);exit;
	global $wpdb, $PasswordHash, $current_user, $user_ID;

		
		$first_name = $wpdb->escape(trim($_POST['username']));
		//$lastname = $wpdb->escape(trim($_POST['lastname1']));
	//	$phone = $wpdb->escape(trim($_POST['phone']));
		$email = $wpdb->escape(trim($_POST['email']));
		$description = $wpdb->escape(trim($_POST['description']));
		$user_id = $wpdb->escape(trim($_POST['user_id']));
		$password1 = $wpdb->escape(trim($_POST['password']));
		$confirm_password = $wpdb->escape(trim($_POST['confirm_password']));
		//$password=md5($password1);
		
		if( $email == "" ||  $first_name == "" ) {
			$error= 'Please don\'t leave the required fields.';
			
			
		} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error= 'Invalid email address.';
			
		} else{
			
	if(!empty($password1)){		
   $user_data =  wp_update_user( array(
        'ID' => $user_id,
        'user_email' => $email,
		'user_pass' =>$password1
	) );   }else{
		
	 $user_data =  wp_update_user( array(
        'ID' => $user_id,
        'user_email' => $email		
	) );	
		
	}
   update_user_meta( $user_id, 'first_name',$first_name);
  // update_user_meta( $user_id, 'last_name',$lastname);
   update_user_meta( $user_id, 'phone_number',$phone);
   update_user_meta( $user_id, 'description',$description);
      
   
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
			$attach_id = wp_insert_attachment( $attachment, $filename );
			//var_dump($attach_id);die();
			$attach_data = wp_generate_attachment_metadata( $attach_id, $movefile['file'] );
			wp_update_attachment_metadata( $attach_id, $attach_data );
			 update_user_meta( $user_id, 'wp_user_avatar',$attach_id);
		} }
   	
			if( is_wp_error($user_data) ) {
				if(!empty($user_id->errors["existing_user_login"][0])){
					$error= $user_id->errors["existing_user_login"][0];
				}else{
					$error= 'Error on user creation.';
					
				
				}
				
			} else {
				
				$success = 'Update profile';
			
				
				
				
				
				
			}
			
		}
		?>
		<?php 
			if(! empty($error) ) :
			   $arr["message"]=$error;
			   $arr["type"]=0;
			   echo json_encode($arr);
			endif;
		?>
		
		<?php 
			if(! empty($success) ) :
				
				 $arr["message"]=$success;
			     $arr["type"]=1;
				 echo json_encode($arr);
			endif;
			
	


		?>
	