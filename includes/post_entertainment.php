<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_Entertainment');
function icee_Entertainment() {
	
	$labels = array(
		'name' 				=> _x('Entertainment', 'post type general name'),
		'add_new' 			=> 'Add Entertainment',
		'add_new_item' 		=> 'Add Entertainment',
		'edit_item' 		=> __('Edit Entertainment'),
		'new_item' 			=> __('New Entertainment'),
		'all_items' 		=> __('All Entertainment'),
		'view_item' 		=> __('View Entertainment'),
		'search_items' 		=> __('Search Entertainment'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Entertainment'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Entertainment')
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
	
	register_post_type("Entertainment",$args);
	
	//register_taxonomy("Gallery", array("Gallery"), array("hierarchical" => true, "label" => "Gallery", "singular_label" => "Gallery", "rewrite" => true));
}

?>