<?php
//echo"<pre>";print_r($_REQUEST);exit;
require_once("../../../wp-load.php");
	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;
 global $smof_data;
//echo"<pre>";print_r($_REQUEST);exit;


//We shall SQL escape all inputs 
$username = $wpdb->escape($_REQUEST['cusername']); 
$password = $wpdb->escape($_REQUEST['cpassword']); 
$remember = $wpdb->escape($_REQUEST['rememberme']); 
//$lang = $wpdb->escape($_REQUEST['lang']); 
//$login_data=wp_authenticate($username,$password);

	if($remember) $remember = "true"; 
else $remember = "false"; 

$login_data = array(); 
$login_data['user_login'] = $username; 
$login_data['user_password'] = $password; 
$login_data['remember'] = $remember; 

$user_verify = wp_signon( $login_data, false ); 

if( is_wp_error($user_verify) ) {
	        	$error= 'Invalid User Name and Password ';
			
				
			} else {
				
				//do_action('user_register', $user_id);
				$success = 'You have successfully logged in. Please wait we will redirect you to your account';
			}
	




if(! empty($error) ) :
			   $arr["message"]=$error;
			   $arr["type"]=0;
			   echo json_encode($arr);
			endif;

if(! empty($success) ) :
				
				 $arr["message"]=$success;
			     $arr["type"]=1;
				 echo json_encode($arr);
			endif;			

		?>
		