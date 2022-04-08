<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_Exterior_Color' );
function icee_Exterior_Color() {
	
	$labels = array(
		'name' 				=> _x('Exterior Color', 'post type general name'),
		'add_new' 			=> 'Add Exterior Color',
		'add_new_item' 		=> 'Add Exterior Color',
		'edit_item' 		=> __('Edit Exterior Color'),
		'new_item' 			=> __('New Exterior Color'),
		'all_items' 		=> __('All Exterior Color'),
		'view_item' 		=> __('View Exterior Color'),
		'search_items' 		=> __('Search Exterior Color'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Exterior Color'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Exterior Color')
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
	
	register_post_type("Exterior Color",$args);
	
	//register_taxonomy("Gallery", array("Gallery"), array("hierarchical" => true, "label" => "Gallery", "singular_label" => "Gallery", "rewrite" => true));
}

?>