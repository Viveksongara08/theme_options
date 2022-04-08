<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_Car_Features');
function icee_Car_Features() {
	
	$labels = array(
		'name' 				=> _x('Car Features', 'post type general name'),
		'add_new' 			=> 'Add Car Features',
		'add_new_item' 		=> 'Add Car Features',
		'edit_item' 		=> __('Edit Car Features'),
		'new_item' 			=> __('New Car Features'),
		'all_items' 		=> __('All Car Features'),
		'view_item' 		=> __('View Car Features'),
		'search_items' 		=> __('Search Car Features'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Car Features'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Car Features')
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
	
	register_post_type("Car Features",$args);
	
	//register_taxonomy("Gallery", array("Gallery"), array("hierarchical" => true, "label" => "Gallery", "singular_label" => "Gallery", "rewrite" => true));
}

?>