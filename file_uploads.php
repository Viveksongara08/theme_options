<?php 

function file_uploads($name){

if(!empty($name['name'][0])){
		
		//echo count($_FILES['upload_image']['name']);
		  for($j=0; $j < count($name['name']); $j++){
			  
			  
			  		if ( $name['name'][$j] != '' ) {//if user has uploaded the files
			$image_name = $name['name'][$j];
			$ext_array = explode( '.', $image_name );
			
			$ext = end( $ext_array );
			/*if ( !($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg' || $ext == 'gif' || $ext == 'JPEG' || $ext == 'PNG' || $ext == 'JPG') )
				{
				$error->image = __( 'Invalid File Type', 'accesspress-anonymous-post' );
				$error_flag = 1;
				$image_error_flag = 1;
			} */
		}
	
		if ( !function_exists( 'wp_handle_upload' ) )
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
		$uploadedfile = $name;
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
		
		return $attach_id;
		
	}
}
?>