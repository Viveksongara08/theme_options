<?php
/*************************************************/
/*** Strepo Testimonials
/**************************************************/
add_action( 'init', 'icee_Offers' );
function icee_Offers() {
	
	$labels = array(
		'name' 				=> _x('Offers', 'post type general name'),
		'add_new' 			=> 'Add Offers',
		'add_new_item' 		=> 'Add Offers',
		'edit_item' 		=> __('Edit Offers'),
		'new_item' 			=> __('New Offers'),
		'all_items' 		=> __('All Offers'),
		'view_item' 		=> __('View Offers'),
		'search_items' 		=> __('Search Offers'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Offers'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Offers')
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
	
	register_post_type("Offers",$args);
	
	//register_taxonomy("Testimonial", array("Testimonial"), array("hierarchical" => true, "label" => "Testimonial", "singular_label" => "Testimonial", "rewrite" => true));
}

function wpse_add_custom_meta_box_11() {
   add_meta_box(
       'custom_meta_box-11',       // $id
       'Offers Section',                  // $title
       'show_custom_meta_box_11',  // $callback
       'offers',                 // $page
       'normal',                  // $context
       'high'                     // $priority
   );
}
add_action('add_meta_boxes', 'wpse_add_custom_meta_box_11');

function show_custom_meta_box_11() {
	global $smof_data;
	$offer_fname = get_post_meta( $_REQUEST["post"], 'offer_fname', true );
	$offer_lname = get_post_meta( $_REQUEST["post"], 'offer_lname', true );
	$offer_emailaddress = get_post_meta( $_REQUEST["post"], 'offer_emailaddress', true );
	$offer_phonenmuber = get_post_meta( $_REQUEST["post"], 'offer_phonenmuber', true );
	$offer_city = get_post_meta( $_REQUEST["post"], 'offer_city', true );
	$offer_zipcode = get_post_meta( $_REQUEST["post"], 'offer_zipcode', true );
	$offer_price = get_post_meta( $_REQUEST["post"], 'offer_price', true );
	
	
	

?>
<div class="form-group">
<table border=1 style="width:100%;text-align: center;" >
<tr><td style="width:40%" >First Name:</td><td style="width:60%" ><?php echo $offer_fname; ?></td></tr>
<tr><td style="width:40%" >last Name:</td><td style="width:60%" ><?php echo $offer_lname; ?></td></tr>
<tr><td style="width:40%" >Email Address:</td><td style="width:60%" ><?php echo $offer_emailaddress; ?></td></tr>
<tr><td style="width:40%" >Phone Number:</td><td style="width:60%" ><?php echo $offer_phonenmuber; ?></td></tr>
<tr><td style="width:40%" >City:</td><td style="width:60%" ><?php echo $offer_city; ?></td></tr>
<tr><td style="width:40%" >Zip Code:</td><td style="width:60%" ><?php echo $offer_zipcode; ?></td></tr>
<tr><td style="width:40%" >Price:</td><td style="width:60%" ><?php echo $smof_data["rnr_offer_price_symbole"]; ?><?php echo $offer_price; ?></td></tr>

</table>

 
 
 
 
 
 
</div>
<?php
	}
?>