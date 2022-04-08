<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_Profile' );
function icee_Profile() {
	
	$labels = array(
		'name' 				=> _x('Profile', 'post type general name'),
		'add_new' 			=> 'Add Profile',
		'add_new_item' 		=> 'Add Profile',
		'edit_item' 		=> __('Edit Profile'),
		'new_item' 			=> __('New Profile'),
		'all_items' 		=> __('All Profile'),
		'view_item' 		=> __('View Profile'),
		'search_items' 		=> __('Search Profile'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Profile'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Profiles')
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
		'supports' 			=> array( 'title', 'editor', 'thumbnail'),
	);
	
	register_post_type("Profile",$args);
	
	//register_taxonomy("Gallery", array("Gallery"), array("hierarchical" => true, "label" => "Gallery", "singular_label" => "Gallery", "rewrite" => true));
}
?>