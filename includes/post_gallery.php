<?php
/*************************************************/
/*** Strepo Testimonials
/**************************************************/
add_action( 'init', 'icee_Governess' );
function icee_Governess() {
	
	$labels = array(
		'name' 				=> _x('Featured office', 'post type general name'),
		'add_new' 			=> 'Add Featured office',
		'add_new_item' 		=> 'Add Featured office',
		'edit_item' 		=> __('Edit Featured office'),
		'new_item' 			=> __('New Featured office'),
		'all_items' 		=> __('All Featured office'),
		'view_item' 		=> __('View Featured office'),
		'search_items' 		=> __('Search Featured office'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Featured office'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Featured office')
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
	
	register_post_type("featuredoffice",$args);
	
	//register_taxonomy("Testimonial", array("Testimonial"), array("hierarchical" => true, "label" => "Testimonial", "singular_label" => "Testimonial", "rewrite" => true));
}
?>