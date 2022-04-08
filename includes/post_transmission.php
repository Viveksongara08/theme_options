<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_Transmission' );
function icee_Transmission() {
	
	$labels = array(
		'name' 				=> _x('Transmission', 'post type general name'),
		'add_new' 			=> 'Add Transmission',
		'add_new_item' 		=> 'Add Transmission',
		'edit_item' 		=> __('Edit Transmission'),
		'new_item' 			=> __('New Transmission'),
		'all_items' 		=> __('All Transmission'),
		'view_item' 		=> __('View Transmission'),
		'search_items' 		=> __('Search Transmission'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Transmission'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Transmission')
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
	
	register_post_type("Transmission",$args);
	
	//register_taxonomy("Gallery", array("Gallery"), array("hierarchical" => true, "label" => "Gallery", "singular_label" => "Gallery", "rewrite" => true));
}

?>