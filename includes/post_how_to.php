<?php
/*************************************************/
/*** Strepo Testimonials
/**************************************************/
add_action( 'init', 'icee_How_to' );
function icee_How_to() {
	
	$labels = array(
		'name' 				=> _x('How To', 'post type general name'),
		'add_new' 			=> 'Add How To',
		'add_new_item' 		=> 'Add How To',
		'edit_item' 		=> __('Edit How To'),
		'new_item' 			=> __('New How To'),
		'all_items' 		=> __('All How To'),
		'view_item' 		=> __('View How To'),
		'search_items' 		=> __('Search How To'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty How To'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('How To')
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
		'supports' 			=> array( 'title', 'thumbnail'),
	);
	
	register_post_type("How To",$args);
	
	//register_taxonomy("Testimonial", array("Testimonial"), array("hierarchical" => true, "label" => "Testimonial", "singular_label" => "Testimonial", "rewrite" => true));
}
?>