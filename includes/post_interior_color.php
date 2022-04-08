<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_Interior_Color' );
function icee_Interior_Color() {
	
	$labels = array(
		'name' 				=> _x('Interior Color', 'post type general name'),
		'add_new' 			=> 'Add Interior Color',
		'add_new_item' 		=> 'Add Interior Color',
		'edit_item' 		=> __('Edit Interior Color'),
		'new_item' 			=> __('New Interior Color'),
		'all_items' 		=> __('All Interior Color'),
		'view_item' 		=> __('View Interior Color'),
		'search_items' 		=> __('Search Interior Color'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Interior Color'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Interior Color')
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
	
	register_post_type("Interior Color",$args);
	
	//register_taxonomy("Gallery", array("Gallery"), array("hierarchical" => true, "label" => "Gallery", "singular_label" => "Gallery", "rewrite" => true));
}

?>