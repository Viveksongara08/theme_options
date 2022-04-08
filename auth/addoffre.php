<?php 
require_once("../../../wp-load.php");
	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;
	global $smof_data;

if(isset($_REQUEST["postId"])){

$fname=$_REQUEST["fname"];
$lname=$_REQUEST["lname"];
$emailaddress=$_REQUEST["emailaddress"];
$phonenmuber=$_REQUEST["phonenmuber"];

$country=$_REQUEST["country"];
$state=$_REQUEST["state"];

$city=$_REQUEST["city"];
$zipcode=$_REQUEST["zipcode"];
$postId=$_REQUEST["postId"];
$user_id=$_REQUEST["user_id"];
$price=$_REQUEST["price"];
$current_user_id=$_REQUEST["current_user_id"];
$message=$_REQUEST["message"];
$postTitle=$_REQUEST["postTitle"];

$state=$_REQUEST["state"];
$country=$_REQUEST["country"];

	$post_arguments=array(
         'post_author' => $current_user_id,
		 'post_title' => $postTitle,
		 'post_content' => $message,
		 'post_status'   => 'publish', // Now it's public
         'post_type'     =>'offers',
		 );
	$insert=wp_insert_post( $post_arguments, $wp_error = false );	
if($insert){

//_wp_attached_file
add_post_meta($insert, 'car_post_id',$postId, false);

add_post_meta($insert, 'offer_fname',$fname, false);
add_post_meta($insert, 'offer_lname',$lname, false);
add_post_meta($insert, 'offer_emailaddress',$emailaddress, false);
add_post_meta($insert, 'offer_phonenmuber',$phonenmuber, false);
add_post_meta($insert, 'offer_city',$city, false);
add_post_meta($insert, 'offer_zipcode',$zipcode, false);
add_post_meta($insert, 'offer_price',$price, false);

add_post_meta($insert, 'offer_state',$state, false);
add_post_meta($insert, 'offer_country',$country, false);


$sql2="insert into wp_offerces(post_id,auther_id,fname,lname,emailaddress,phonenmuber,city,zipcode,price,sender_id,message,inner_post_id)values('$postId','$user_id','$fname','$lname','$emailaddress','$phonenmuber','$city','$zipcode','$price','$current_user_id','$message','$insert')";
$results2 = $wpdb->query($sql2);


$Pdata=get_post($postId);
//echo"<pre>";print_r($Pdata); exit;

$Fname = get_user_meta($Pdata->post_author, 'first_name', true);

$user_email1 = get_the_author_meta( 'user_email', $Pdata->post_author);

$subject11 = $smof_data["rnr_offer_email_subject_seller"];

$headers11 = array('Content-Type: text/html; charset=UTF-8');
$content11='<div style="width:600px; margin:0px auto; font-family:Arial, Helvetica, sans-serif;">
<div style="width:100%; float:left; background-color:#0059b7; padding:15px;">
<div style="width:100%; float:left; background-color:#fff;">
<div style="width:100%; float:left; text-align:center; padding:15px 0px 20px 0px; border-bottom:2px solid #0059b7; margin-bottom:15px;"><img src="'.$smof_data["rnr_upload_logo"].'" alt="" style="max-width:100%;"></div>
<div style="width:100%; float:left; padding:15px;">
<p style="font-weight:600; width:100%; float:left; margin-bottom:5px; margin-top:5px;">Hello '.$Fname.'</p>
<p style="color:#333333; width:98%; float:left; line-height:25px; margin-bottom:25px;">'.$smof_data["rnr_offer_email_message_seller"].'</p>
<p style="width:100%; float:left; margin:30px 0px 10px 0px;"></p>
<p style="width:100%; float:left; line-height:25px; margin-top:25px; margin-bottom:15px;">
<strong>Regards,</strong><br/>
</p>
</div>
</div>
<div style="width:100%; float:left; text-align:center; color:#fff; font-size:14px; padding:25px 0px;">
<span style="width:100%; float:left; text-align:center; padding:15px 0px 0px 0px;">© 2020 ALL RIGHTS RESERVED</span>
</div>
</div>
</div>';

$status = wp_mail( $user_email1, $subject11, $content11,$headers11);


}
if($results2){
$arr["message"]="Send Information successfully";
 echo json_encode($arr);
}
}
?>