<?php
/*************************************************/
/*** Strepo Testimonials
/**************************************************/
add_action( 'init', 'icee_WhyChoose' );
function icee_WhyChoose() {
	
	$labels = array(
		'name' 				=> _x('Why Choose', 'post type general name'),
		'add_new' 			=> 'Add Why Choose',
		'add_new_item' 		=> 'Add Why Choose',
		'edit_item' 		=> __('Edit Why Choose'),
		'new_item' 			=> __('New Why Choose'),
		'all_items' 		=> __('All Why Choose'),
		'view_item' 		=> __('View Why Choose'),
		'search_items' 		=> __('Search Why Choose'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Why Choose'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Why Choose')
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
		'supports' 			=> array( 'title','thumbnail','editor'),
	);
	
	register_post_type("whychoose",$args);
	
	//register_taxonomy("Testimonial", array("Testimonial"), array("hierarchical" => true, "label" => "Testimonial", "singular_label" => "Testimonial", "rewrite" => true));
}
?>