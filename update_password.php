<?php 

require_once("../../../wp-load.php");
global $wpdb;


//print_r($_REQUEST["forgetemail"]);
if(@$_REQUEST["new_password"]==$_REQUEST["confirm_new_password"]){

	$password=$_REQUEST["new_password"];
	$user_id=$_REQUEST["user_id"];
	$password1=MD5($password);
	
			  global  $wpdb; 
	$sqll = "update wp_users set user_pass='$password1' WHERE ID='$user_id'";
	//print_r($sqll);
	$reslt=$wpdb->query($sqll);
	//echo"<pre>";print_r($sqll);exit;
	if(!empty($reslt)){
    $arr["type"]=1;
	$arr["message"]="Update password";
    echo json_encode($arr);
	}else{

    $arr["type"]=0;
	$arr["message"]="Somting Was Wrong";
   echo json_encode($arr);
	}
	
}else{
	$arr["type"]=0;
	$arr["message"]="Enter Same password !";
	echo json_encode($arr);
}






?>