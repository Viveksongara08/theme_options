<?php

require_once("../wp-load.php");
	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;
	global $smof_data;	
	
if(isset($_REQUEST['post_title'])) 
{
	
	//echo"<pre>";print_r($_REQUEST);	exit;
$title=$_REQUEST["post_title"];	
$cta=$_REQUEST["pcta"];
$ccta=$_REQUEST["ccta"];
$type=$_REQUEST["type"];

$post_voucher_code=$_REQUEST["post_voucher_code"];

$description=$_REQUEST["post_description"];
$post_url=$_REQUEST["post_url"];
$post_price=$_REQUEST["post_price"];
$post_best_price=$_REQUEST["post_best_price"];
$post_description=$_REQUEST["post_description"];

$post_start_deal=$_REQUEST["post_start_deal"];
$post_start_min=$_REQUEST["post_start_min"];
$post_start_sec=$_REQUEST["post_start_sec"];

$post_expire_deal=$_REQUEST["post_expire_deal"];
$post_expire_min=$_REQUEST["post_expire_min"];
$post_expire_sec=$_REQUEST["post_expire_sec"];

$post_percentage=$_REQUEST["post_percentage"];
$post_pound=$_REQUEST["post_pound"];

$post_shipping_from=$_REQUEST["post_shipping_from"];
$post_local_deal=$_REQUEST["post_local_deal"];


$dealisnsfw=$_REQUEST["dealisnsfw"];

$image_data=$_REQUEST["image_data"];

$imgData=json_decode($image_data);
//print_r($imgData);exit;
$post_marchant=$_REQUEST["post_marchant"];

$pcat=array($cta,$ccta);
//$custom_tax = array('Types' => $type);
$custom_tax = array('Types' => $type,'Merchants'=>$post_marchant);

//echo"<pre>";print_r($_REQUEST);exit;	
		
		
	$post_arguments=array(
         'post_author' => get_current_user_id(),
		 'post_title' => $title,
		 'post_content' => $description,
		 'post_status'   => 'draft', // Now it's public
         'post_type'     =>'post',
		 'post_category'=>$pcat,
		 'tax_input'=>$custom_tax,
		 );
	$insert=wp_insert_post( $post_arguments, $wp_error = false );	

	if ( $insert && !empty( $imgData ) ) {
			add_post_meta( $insert, '_thumbnail_id', $imgData[0], true ); //adding featured image to post
		} 

if($insert){


if(!empty($post_shipingfree)){
add_post_meta($insert, "post_shipingfree", $post_shipingfree,false);
delete_post_meta($insert,'post_percentage');
delete_post_meta($insert,'post_pound');
}

if(!empty($post_pound)){
add_post_meta($insert, "post_pound", $post_pound,false);
delete_post_meta($insert,'post_percentage');
delete_post_meta($insert,'post_shipingfree');
}

if(!empty($post_percentage)){
add_post_meta($insert, "post_percentage", $post_percentage,false);  
delete_post_meta($insert,'post_pound');
delete_post_meta($insert,'post_shipingfree');
}

add_post_meta($insert, 'post_url',$post_url, false);
add_post_meta($insert, 'post_voucher_code',$post_voucher_code, false);

add_post_meta($insert, 'post_start_deal',$post_start_deal, false);
add_post_meta($insert, 'post_start_min',$post_start_min, false);
add_post_meta($insert, 'post_start_sec',$post_start_sec, false);

add_post_meta($insert, 'post_expire_deal',$post_expire_deal, false);
add_post_meta($insert, 'post_expire_min',$post_expire_min, false);
add_post_meta($insert, 'post_expire_sec',$post_expire_sec, false);

add_post_meta($insert, 'post_deal_nsfw',$dealisnsfw, false);
add_post_meta($insert, 'post_shipping_from',$post_shipping_from, false);
add_post_meta($insert, 'post_local_deal',$post_local_deal, false);

	
                 $arr["message"]="Submit Post";
				 $arr["type"]=1;
				 echo json_encode($arr);
}else{
	            
	             $arr["message"]="Somthing Was Wrong";
				 $arr["type"]=0;
				 echo json_encode($arr);
}


	}
	