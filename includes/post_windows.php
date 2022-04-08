<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_Windows');
function icee_Windows() {
	
	$labels = array(
		'name' 				=> _x('Windows', 'post type general name'),
		'add_new' 			=> 'Add Windows ',
		'add_new_item' 		=> 'Add Windows ',
		'edit_item' 		=> __('Edit Windows '),
		'new_item' 			=> __('New Windows '),
		'all_items' 		=> __('All Windows '),
		'view_item' 		=> __('View Windows '),
		'search_items' 		=> __('Search Windows '),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Windows '), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Windows')
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
		'show_in_menu' => 'themes.php?page=optionsframework',
		'supports' 			=> array( 'title'),
	);
	
	register_post_type("Windows",$args);
	
	//register_taxonomy("Gallery", array("Gallery"), array("hierarchical" => true, "label" => "Gallery", "singular_label" => "Gallery", "rewrite" => true));
}

?>