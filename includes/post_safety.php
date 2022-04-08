<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_Safety');
function icee_Safety() {
	
	$labels = array(
		'name' 				=> _x('Safety', 'post type general name'),
		'add_new' 			=> 'Add Safety ',
		'add_new_item' 		=> 'Add Safety ',
		'edit_item' 		=> __('Edit Safety '),
		'new_item' 			=> __('New Safety '),
		'all_items' 		=> __('All Safety '),
		'view_item' 		=> __('View Safety '),
		'search_items' 		=> __('Search Safety '),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Safety '), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Safety')
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
		'show_in_menu' => 'edit.php?post_type=years',
		'supports' 			=> array( 'title'),
	);
	
	register_post_type("Safety",$args);
	
	//register_taxonomy("Gallery", array("Gallery"), array("hierarchical" => true, "label" => "Gallery", "singular_label" => "Gallery", "rewrite" => true));
}

?>