<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_Fuel_type' );
function icee_Fuel_type() {
	
	$labels = array(
		'name' 				=> _x('Fuel Type', 'post type general name'),
		'add_new' 			=> 'Add Fuel Type',
		'add_new_item' 		=> 'Add Fuel Type',
		'edit_item' 		=> __('Edit Fuel Type'),
		'new_item' 			=> __('New Fuel Type'),
		'all_items' 		=> __('All Fuel Type'),
		'view_item' 		=> __('View Fuel Type'),
		'search_items' 		=> __('Search Fuel Type'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Fuel Type'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Fuel Type')
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
	
	register_post_type("Fuel Type",$args);
	
	//register_taxonomy("Gallery", array("Gallery"), array("hierarchical" => true, "label" => "Gallery", "singular_label" => "Gallery", "rewrite" => true));
}

?>