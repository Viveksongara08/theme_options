<?php 

require_once("../../../wp-load.php");
global $wpdb;
global $smof_data;



if(@$_REQUEST["forgetemail"]!=""){
	$email=$_REQUEST["forgetemail"];
	//$lang=$_REQUEST["lang"];
	
	$sqll = "select user_email from wp_users where user_email='$email'";
	$reslt=$wpdb->get_results($sqll);
	
if(!empty($reslt)){
	
	$AdminEmail=$reslt[0]->user_email;
	$encodedUrl = urlencode($AdminEmail);
	//echo urldecode($encodedUrl);
	
	//print_r($reslt);exit;

$url=get_permalink(233)."?poiuytrewd=".$encodedUrl;

$subject1 = $smof_data["rnr_forget_email_subject"];



$headers1 = array('Content-Type: text/html; charset=UTF-8');



$content1='<div style="width:600px; margin:0px auto; font-family:Arial, Helvetica, sans-serif;">
<div style="width:100%; float:left; background-color:#000; padding:15px;">
<div style="width:100%; float:left; background-color:#fff;">
<div style="width:100%; float:left; text-align:center; padding:15px 0px 20px 0px; border-bottom:2px solid #0059b7; margin-bottom:15px;"><img src="'.$smof_data["rnr_upload_logo"].'" alt="" style="max-width:100%;"></div>
<div style="width:100%; float:left; padding:15px;">
<p style="font-weight:600; width:100%; float:left; margin-bottom:5px; margin-top:5px;">Hello!</p>
<p style="color:#333333; width:98%; float:left; line-height:25px; margin-bottom:25px;">'.$smof_data["rnr_forget_email_message"].'</p>
<a href="'.$url.'" style="background-color:#000; font-size:15px; color:#fff; text-decoration:none; padding:10px 25px; margin-bottom:15px;">RESET PASSWORD</a>
<p style="width:100%; float:left; margin:30px 0px 10px 0px;">If you did not request a password reset, no further action is required.</p>
<p style="width:100%; float:left; line-height:25px; margin-top:25px; margin-bottom:15px;">
<strong>Regards,</strong><br/>
Continue The Mission
</p>
</div>
</div>
<div style="width:100%; float:left; text-align:center; color:#fff; font-size:14px; padding:25px 0px;">
<span style="width:100%; float:left; text-align:center; padding:15px 0px 0px 0px;">Copyright © Continue The Mission 2021. All rights reserved.</span>
</div>
</div>
</div>';



$status = wp_mail( $AdminEmail, $subject1, $content1,$headers1);



if($status){
		$arr["type"]=1;
	    $arr["message"]="Check your email !";
		 echo json_encode($arr);

	
}else{
	$arr["type"]=0;
	$arr["message"]="Somthing Was Wrong";
	 echo json_encode($arr);


} 
	
	
}else{
	$arr["type"]=0;
	$arr["message"]="Enter Valid Email Address !";
	 echo json_encode($arr);


}
	
}else{
	$arr["type"]=0;
	$arr["message"]="Enter Valid Email Address !";
	 echo json_encode($arr);

}






?>