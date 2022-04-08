<?php
/*************************************************/
/*** Strepo Testimonials
/**************************************************/
add_action( 'init', 'icee_subscriber_list' );
function icee_subscriber_list() {
	
	$labels = array(
		'name' 				=> _x('Subscriber list', 'post type general name'),
		'add_new' 			=> 'Add Subscriber list',
		'add_new_item' 		=> 'Add Subscriber list',
		'edit_item' 		=> __('Edit Subscriber list'),
		'new_item' 			=> __('New Subscriber list'),
		'all_items' 		=> __('All Subscriber list'),
		'view_item' 		=> __('View Subscriber list'),
		'search_items' 		=> __('Search Subscriber list'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Subscriber list'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Subscriber list')
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
		'supports' 			=> array( 'title'),
	);
	
	register_post_type("Subscriberlist",$args);
	
	//register_taxonomy("Testimonial", array("Testimonial"), array("hierarchical" => true, "label" => "Testimonial", "singular_label" => "Testimonial", "rewrite" => true));
}
?>