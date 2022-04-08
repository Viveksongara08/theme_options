<?php
/*************************************************/
/*** Strepo Testimonials
/**************************************************/
add_action( 'init', 'icee_Coffee_price' );
function icee_Coffee_price() {
	
	$labels = array(
		'name' 				=> _x('price', 'post type general name'),
		'add_new' 			=> 'Add price',
		'add_new_item' 		=> 'Add price',
		'edit_item' 		=> __('Edit price'),
		'new_item' 			=> __('New price'),
		'all_items' 		=> __('All price'),
		'view_item' 		=> __('View price'),
		'search_items' 		=> __('Search price'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty price'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('prices')
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
	
	register_post_type("Coffee_price",$args);
	
	//register_taxonomy("Testimonial", array("Testimonial"), array("hierarchical" => true, "label" => "Testimonial", "singular_label" => "Testimonial", "rewrite" => true));
}
?>