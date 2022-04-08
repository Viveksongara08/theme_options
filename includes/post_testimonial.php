<?php
/*************************************************/
/*** Strepo Testimonials
/**************************************************/
add_action( 'init', 'icee_Testimonials' );
function icee_Testimonials() {
	
	$labels = array(
		'name' 				=> _x('Testimonials', 'post type general name'),
		'add_new' 			=> 'Add Testimonials',
		'add_new_item' 		=> 'Add Testimonials',
		'edit_item' 		=> __('Edit Testimonials'),
		'new_item' 			=> __('New Testimonials'),
		'all_items' 		=> __('All Testimonials'),
		'view_item' 		=> __('View Testimonials'),
		'search_items' 		=> __('Search Testimonials'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Testimonials'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Testimonials')
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
		'supports' 			=> array( 'title', 'editor','thumbnail'),
	);
	
	register_post_type("Testimonials",$args);
	
	//register_taxonomy("Testimonial", array("Testimonial"), array("hierarchical" => true, "label" => "Testimonial", "singular_label" => "Testimonial", "rewrite" => true));
}
?>