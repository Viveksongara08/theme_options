<?php
/*************************************************/
/*** Strepo Testimonials
/**************************************************/
add_action( 'init', 'icee_Payments' );
function icee_Payments() {
	
	$labels = array(
		'name' 				=> _x('Payments', 'post type general name'),
		'add_new' 			=> 'Add Payments',
		'add_new_item' 		=> 'Add Payments',
		'edit_item' 		=> __('Edit Payments'),
		'new_item' 			=> __('New Payments'),
		'all_items' 		=> __('All Payments'),
		'view_item' 		=> __('View Payments'),
		'search_items' 		=> __('Search Payments'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Payments'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Payments')
	);

	$args = array(
		'labels' 			=> $labels,
		'public' 			=> true,
		'publicly_queryable'=> false,
		'exclude_from_search'=> true,
		'show_ui' 			=> true, 
		'show_in_menu' 		=> true, 
		'query_var' 		=> true,
		'rewrite'			=> true,
		'capability_type' 	=> 'post',
		'has_archive' 		=> true, 
		'hierarchical'		=> false,
		'menu_position' 	=> NULL,
		'supports' 			=> array( 'title','editor'),
	);
	
	register_post_type("Payments",$args);
	
	//register_taxonomy("Testimonial", array("Testimonial"), array("hierarchical" => true, "label" => "Testimonial", "singular_label" => "Testimonial", "rewrite" => true));
}


function wpse_add_custom_meta_box_12() {
   add_meta_box(
       'custom_meta_box-12',       // $id
       'Payment Section',                  // $title
       'show_custom_meta_box_12',  // $callback
       'payments',                 // $page
       'normal',                  // $context
       'high'                     // $priority
   );
}
add_action('add_meta_boxes', 'wpse_add_custom_meta_box_12');

function show_custom_meta_box_12() {
	global $smof_data;
	global $wpdb;
	$postId=$_REQUEST["post"];
$sql="select * from wp_payment where post_payment_id=$postId";
$results = $wpdb->get_results($sql);
//echo"<pre>";print_r($results[0]);

$tx_id=$results[0]->tx_id;
$post_id=$results[0]->post_id;
$user_id=$results[0]->user_id;
$payment_type=$results[0]->payment_type;

$userdata=get_userdata($user_id );

$Fname = get_user_meta($user_id, 'first_name', true);
$lname = get_user_meta($user_id, 'last_name', true);
$phone_number = get_user_meta($user_id, 'phone_number', true);
$description = get_user_meta($user_id, 'description', true);
$email=$userdata->user_email; 
$username=$userdata->user_login; 

$country = get_user_meta($user_id, 'country', true);
$state = get_user_meta($user_id, 'state', true);
$city = get_user_meta($user_id, 'city', true);
$zipcode = get_user_meta($user_id, 'zipcode', true);


$postTitle=get_the_title($post_id);
	
?>
<div class="form-group">
<table border=1 style="width:100%;text-align: center;" >
<tr><td style="width:40%" >Post Title:</td><td style="width:60%" ><?php echo $postTitle; ?></td></tr>
<tr><td style="width:40%" >First Name:</td><td style="width:60%" ><?php echo $Fname; ?></td></tr>
<tr><td style="width:40%" >last Name:</td><td style="width:60%" ><?php echo $lname; ?></td></tr>
<tr><td style="width:40%" >Email Address:</td><td style="width:60%" ><?php echo $email; ?></td></tr>
<tr><td style="width:40%" >Phone Number:</td><td style="width:60%" ><?php echo $phone_number; ?></td></tr>
<tr><td style="width:40%" >Country:</td><td style="width:60%" ><?php echo $country; ?></td></tr>
<tr><td style="width:40%" >State:</td><td style="width:60%" ><?php echo $state; ?></td></tr>
<tr><td style="width:40%" >City:</td><td style="width:60%" ><?php echo $city; ?></td></tr>
<tr><td style="width:40%" >Zip Code:</td><td style="width:60%" ><?php echo $zipcode; ?></td></tr>
<tr><td style="width:40%" >Payment Type:</td><td style="width:60%" ><?php echo $payment_type; ?></td></tr>
<tr><td style="width:40%" >Transaction ID:</td><td style="width:60%" ><?php echo $tx_id; ?></td></tr>

</table>
</div>
<?php
	}
?>