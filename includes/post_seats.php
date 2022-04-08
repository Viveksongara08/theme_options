<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_Seats');
function icee_Seats() {
	
	$labels = array(
		'name' 				=> _x('Seats', 'post type general name'),
		'add_new' 			=> 'Add Seats ',
		'add_new_item' 		=> 'Add Seats ',
		'edit_item' 		=> __('Edit Seats '),
		'new_item' 			=> __('New Seats '),
		'all_items' 		=> __('All Seats '),
		'view_item' 		=> __('View Seats '),
		'search_items' 		=> __('Search Seats '),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Seats '), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Seats')
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
	
	register_post_type("Seats",$args);
	
	//register_taxonomy("Gallery", array("Gallery"), array("hierarchical" => true, "label" => "Gallery", "singular_label" => "Gallery", "rewrite" => true));
}

?>