<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_year' );
function icee_year() {
	
	$labels = array(
		'name' 				=> _x('Year', 'post type general name'),
		'add_new' 			=> 'Add Year',
		'add_new_item' 		=> 'Add Years',
		'edit_item' 		=> __('Edit Years'),
		'new_item' 			=> __('New Years'),
		'all_items' 		=> __('All Years'),
		'view_item' 		=> __('View Years'),
		'search_items' 		=> __('Search Years'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Years'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Years')
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
	
	register_post_type("Years",$args);
	
	//register_taxonomy("Gallery", array("Gallery"), array("hierarchical" => true, "label" => "Gallery", "singular_label" => "Gallery", "rewrite" => true));
}
?>