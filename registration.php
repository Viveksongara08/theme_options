<?php

require_once("../../../wp-load.php");

	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;
global $smof_data;
      //$arr = explode("@", $_POST['emailaddress'], 2);

		$first_name = trim($_POST['username']);
		$last_name = "";
		$email = trim($_POST['emailaddress']);
		$password = trim($_POST['password']);
		if($_POST['password']==1){
		$user_roal = "subscriber";
		}else{
		$user_roal = "author";
		}
		//echo"<pre>";print_r($_REQUEST); exit;
		
		if( $email == "" || $password == "" ||  $first_name == "" || $password =="" ) {
			$error= 'Please don\'t leave the required fields.';
			
		} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error= 'Invalid email address.';
		} else if(email_exists($email) ) {
			$error= 'Email already exist.';
			
			
		}else if(username_exists($first_name)){ $error= 'User name exists.'; }else{
 
			$user_id = wp_insert_user( array ('first_name' => apply_filters('pre_user_first_name', $first_name),'last_name' => apply_filters('pre_user_first_name', $last_name), 'user_pass' => apply_filters('pre_user_user_pass', $password), 'user_login' => apply_filters('pre_user_user_login', $first_name), 'user_email' => apply_filters('pre_user_user_email', $email), 'role' => $user_roal ) );
			
			if( is_wp_error($user_id) ) {
				if(!empty($user_id->errors["existing_user_login"][0])){
					$error= $user_id->errors["existing_user_login"][0];
				}else{
					$error= 'Error on user creation.';
					
				}
				
			} else {
				
			//	update_user_meta( $user_id, 'orgnozation_name',$none_organizatiom_name);
				$subject1 = $smof_data["rnr_regsiter_email_subject"];
				$headers1 = array('Content-Type: text/html; charset=UTF-8');
				
$content1='<div style="width:600px; margin:0px auto; font-family:Arial, Helvetica, sans-serif;">
<div style="width:100%; float:left; background-color:#000; padding:15px;">
<div style="width:100%; float:left; background-color:#fff;">
<div style="width:100%; float:left; text-align:center; padding:15px 0px 20px 0px; border-bottom:2px solid #0059b7; margin-bottom:15px;"><img src="'.$smof_data["rnr_upload_logo"].'" alt="" style="max-width:100%;"/></div>
<div style="width:100%; float:left; padding:15px;">
<p style="font-weight:600; width:100%; float:left; margin-bottom:5px; margin-top:5px;">Hello! &nbsp;&nbsp;'.$first_name.' </p>
<p style="color:#333333; width:98%; float:left; line-height:25px; margin-bottom:25px;">'.$smof_data["rnr_regsiter_email_message"].'</p>
<a href="'.site_url().'" style="background-color:#000; font-size:15px; color:#fff; text-decoration:none; padding:10px 25px; margin-bottom:15px;">Log-in now</a>
<p style="width:100%; float:left; margin:30px 0px 10px 0px;"></p>
<p style="width:100%; float:left; line-height:25px; margin-top:25px; margin-bottom:15px;">
<strong>Thanks & Regards, </strong><br/>
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
				
				do_action('user_register', $user_id);
				
				//if($user_roal=='seller'){
                $login_data = array(); 
				$login_data['user_login'] = $first_name; 
                $login_data['user_password'] = $password;
				$user_verify = wp_signon( $login_data, false ); 
				$success = 'Account Successfully Created';
				//}else{
//$success = 'Account successfully created you can login after admin approve account.';
//}
				
				
		
				
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
	