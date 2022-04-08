<?php

require_once("../wp-load.php");
	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;
	global $smof_data;	
include('file_uploads.php');
	
if(isset($_REQUEST['post_title'])) 
{
	
//echo"<pre>";print_r($_REQUEST);	exit;

$title=$_REQUEST["post_title"];	
$cta=$_REQUEST["pcta"];
$ptag=$_REQUEST["ptag"];
$description=$_REQUEST["post_description"];
$image_data=$_REQUEST["image_data"];
$imgData=json_decode($image_data);



//$custom_tax = array('Types' => $type,'Merchants'=>$post_marchant);

//echo"<pre>";print_r($_REQUEST);exit;	
		
if(!empty($_FILES["thumbimage"]['name'][0])){
	$attachid=file_uploads($_FILES["thumbimage"]);
	
}	
if(!empty($_FILES["file"]['name'][0])){
	$attachid1=file_uploads($_FILES["file"]);
	
}
		
		
	$post_arguments=array(
         'post_author' => get_current_user_id(),
		 'post_title' => $title,
		 'post_content' => $description,
		 'post_status'   => 'publish', // Now it's public
         'post_type'     =>'post',
		 'post_category'=>$cta,
		 //'tax_input'=>$custom_tax,
		 'tags_input' => $ptag
		 );
	$insert=wp_insert_post( $post_arguments, $wp_error = false );	

	if ( $insert && !empty( $attachid ) ) {
			add_post_meta( $insert, '_thumbnail_id', $attachid, true ); //adding featured image to post
		} 
		
 if ( $insert && !empty( $attachid1 ) ) {
//add_post_meta( $insert, '_video_id', $attachid1, true ); //adding featured image to post
$number=add_post_meta($insert, '_video_id', $attachid1, false);
$wpdb->query("INSERT INTO `".$wpdb->prefix."cfs_values` (`id`, `field_id`, `meta_id`, `post_id`) VALUES (NULL, '15', '".$number."', '".$insert."')");
			
		} 


if($insert){
	
add_post_meta($insert, "room_gallery_ids",$image_data);

$admin_email = get_option('admin_email');

$Data=get_userdata(get_current_user_id());
$first_name=$Data->display_name;
$email=$Data->user_email;

			$subject1 = $smof_data["rnr_new_post_email_subject"];
				
$content1='<div style="width:600px; margin:0px auto; font-family:Arial, Helvetica, sans-serif;">
<div style="width:100%; float:left; background-color:#000; padding:15px;">
<div style="width:100%; float:left; background-color:#fff;">
<div style="width:100%; float:left; text-align:center; padding:15px 0px 20px 0px; border-bottom:2px solid #f6861f; margin-bottom:15px;"><img src="'.$smof_data["rnr_upload_logo"].'" alt="" style="max-width:100%;"/></div>
<div style="width:100%; float:left; padding:15px;">
<p style="font-weight:600; width:100%; float:left; margin-bottom:5px; margin-top:5px;">Hello! &nbsp;&nbsp;'.$first_name.' </p>
<p style="color:#333333; width:98%; float:left; line-height:25px; margin-bottom:25px;">'.$smof_data["rnr_new_post_email_message"].'</p>
<a href="'.get_permalink($insert).'" style="background-color:#000; font-size:15px; color:#fff; text-decoration:none; padding:10px 25px; margin-bottom:15px;">Blog Url</a>
<p style="width:100%; float:left; margin:30px 0px 10px 0px;"></p>
<p style="width:100%; float:left; line-height:25px; margin-top:25px; margin-bottom:15px;">
<strong>Best Regards, </strong><br/>
Continue The Mission
</p>
</div>
</div>
<div style="width:100%; float:left; text-align:center; color:#fff; font-size:14px; padding:25px 0px;">
<span style="width:100%; float:left; text-align:center; padding:15px 0px 0px 0px;">Copyright © Continue The Mission 2021. All rights reserved</span>
</div>
</div>
</div>';
$headers1 = array('Content-Type: text/html; charset=UTF-8');
				
$status = wp_mail( $email, $subject1, $content1,$headers1);
	
	
                 $arr["message"]="Submit Post";
				 $arr["type"]=1;
				 echo json_encode($arr);
}else{
	            
	             $arr["message"]="Somthing Was Wrong";
				 $arr["type"]=0;
				 echo json_encode($arr);
}


}
	