<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_How_it_work' );
function icee_How_it_work() {
	
	$labels = array(
		'name' 				=> _x('How it work', 'post type general name'),
		'add_new' 			=> 'Add How it work',
		'add_new_item' 		=> 'Add How it work',
		'edit_item' 		=> __('Edit How it work'),
		'new_item' 			=> __('New How it work'),
		'all_items' 		=> __('All How it work'),
		'view_item' 		=> __('View How it work'),
		'search_items' 		=> __('Search How it work'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty How it work'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('How it work')
	);

	$args = array(
		'labels' 			=> $labels,
		'public' 			=> true,
		'publicly_queryable'=> true,
		'exclude_from_search'=> true,
		'show_ui' 			=> true, 
		'show_in_menu' 		=> true, 
		'query_var' 		=> true,
		'rewrite'			=> true,
		'capability_type' 	=> 'post',
		'has_archive' 		=> true, 
		'hierarchical'		=> false,
		'menu_position' 	=> NULL,
		'supports' 			=> array( 'title', 'editor', 'thumbnail'),
	);
	
	register_post_type("How it work",$args);
	
	//register_taxonomy("Gallery", array("Gallery"), array("hierarchical" => true, "label" => "Gallery", "singular_label" => "Gallery", "rewrite" => true));
}
?>