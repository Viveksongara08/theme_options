<?php
/*************************************************/
/*** Strepo Testimonials
/**************************************************/
add_action( 'init', 'icee_Slider' );
function icee_Slider() {
	
	$labels = array(
		'name' 				=> _x('Slider', 'post type general name'),
		'add_new' 			=> 'Add Slider',
		'add_new_item' 		=> 'Add Slider',
		'edit_item' 		=> __('Edit Slider'),
		'new_item' 			=> __('New Slider'),
		'all_items' 		=> __('All Slider'),
		'view_item' 		=> __('View Slider'),
		'search_items' 		=> __('Search Slider'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Slider'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Slider')
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
	
	register_post_type("Slider",$args);
	
	//register_taxonomy("Testimonial", array("Testimonial"), array("hierarchical" => true, "label" => "Testimonial", "singular_label" => "Testimonial", "rewrite" => true));
}
?>