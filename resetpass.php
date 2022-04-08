<?php 

require_once("../../../wp-load.php");
global $wpdb;
global $smof_data;

//print_r($_REQUEST["forgetemail"]);
if(@$_REQUEST["passwordvv"]!=""){
	
	$password=$_REQUEST["passwordvv"];
	$email=$_REQUEST["wedl"];

	$password1=MD5($password);
	
			  global  $wpdb; 
	$sqll = "update wp_users set user_pass='$password1' WHERE user_email='$email'";

	
	$result=$wpdb->query($sqll);
	if(!empty($result)){

$subject1 = $smof_data["rnr_reset_email_subject"];

$headers1 = array('Content-Type: text/html; charset=UTF-8');
$content1='<div style="width:600px; margin:0px auto; font-family:Arial, Helvetica, sans-serif;">
<div style="width:100%; float:left; background-color:#000; padding:15px;">
<div style="width:100%; float:left; background-color:#fff;">
<div style="width:100%; float:left; text-align:center; padding:15px 0px 20px 0px; border-bottom:2px solid #0059b7; margin-bottom:15px;"><img src="'.$smof_data["rnr_upload_logo"].'" alt="" style="max-width:100%;"></div>
<div style="width:100%; float:left; padding:15px;">
<p style="font-weight:600; width:100%; float:left; margin-bottom:5px; margin-top:5px;">Hello! &nbsp;&nbsp; '.$email.' </p>
<p style="color:#333333; width:98%; float:left; line-height:25px; margin-bottom:25px;">'.$smof_data["rnr_reset_email_message"].'</p>
<p style="width:100%; float:left; margin:30px 0px 10px 0px;">
Email : '.$email.'<br/>
Password : '.$password.'<br/>

</p>
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



$status = wp_mail( $email, $subject1, $content1,$headers1);
		

		
$arr["type"]=1;
$arr["message"]="Reset your password !";
echo json_encode($arr);

	}else{
$arr["type"]=0;
	$arr["message"]="Somting Was Wrong";
	 echo json_encode($arr);
	}
	
}else{
	$arr["type"]=0;
	$arr["message"]="Enter Valid Email Address !";
	 echo json_encode($arr);
	
	
}






?>