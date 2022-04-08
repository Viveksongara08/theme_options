<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_News' );
function icee_News() {
	
	$labels = array(
		'name' 				=> _x('Blogs', 'post type general name'),
		'add_new' 			=> 'Add Blogs',
		'add_new_item' 		=> 'Add Blogs',
		'edit_item' 		=> __('Edit Blogs'),
		'new_item' 			=> __('New Blogs'),
		'all_items' 		=> __('All Blogs'),
		'view_item' 		=> __('View Blogs'),
		'search_items' 		=> __('Search Blogs'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Blogs'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Blogs')
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
		'supports' 			=> array( 'title','thumbnail','editor'),
	);
	
	register_post_type("blogs",$args);
	
	//register_taxonomy("Blogs", array("news"), array("hierarchical" => true, "label" => "Gallery", "singular_label" => "Gallery", "rewrite" => true));
}
?>