<?php
/*************************************************/
/*** Strepo Testimonials
/**************************************************/
add_action( 'init', 'icee_Newsletter' );
function icee_Newsletter() {
	
	$labels = array(
		'name' 				=> _x('Newsletter', 'post type general name'),
		'add_new' 			=> 'Add Newsletter',
		'add_new_item' 		=> 'Add Newsletter',
		'edit_item' 		=> __('Edit Newsletter'),
		'new_item' 			=> __('New Newsletter'),
		'all_items' 		=> __('All Newsletter'),
		'view_item' 		=> __('View Newsletter'),
		'search_items' 		=> __('Search Newsletter'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Newsletter'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Newsletter')
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
		'supports' 			=> array( 'title',),
	);
	
	register_post_type("Newsletter",$args);
	
	//register_taxonomy("Testimonial", array("Testimonial"), array("hierarchical" => true, "label" => "Testimonial", "singular_label" => "Testimonial", "rewrite" => true));
}
?>