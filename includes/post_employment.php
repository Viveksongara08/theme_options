<?php
/*************************************************/
/*** Strepo Faq
/**************************************************/
add_action( 'init', 'icee_employment' );
function icee_employment() {
	
	$labels = array(
		'name' 				=> _x('Employment', 'post type general name'),
		'add_new' 			=> 'Add Employment',
		'add_new_item' 		=> 'Add Employment',
		'edit_item' 		=> __('Edit Employment'),
		'new_item' 			=> __('New Employment'),
		'all_items' 		=> __('All Employment'),
		'view_item' 		=> __('View Employment'),
		'search_items' 		=> __('Search Employment'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Employment'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Employment')
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
		'supports' 			=> array( 'title', 'editor', 'thumbnail',),
        //'taxonomies'          => array( 'category' ),
		
		
	);
	
	register_post_type("employment",$args);
	
	register_taxonomy("mapcate", array("housing"), array("hierarchical" => true, "label" => "Map Category", "singular_label" => "Map Category", "rewrite" => true));
	
	//register_taxonomy("governmentindustry", array("governmentprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
	
	//register_post_type("counselingprojects",$args);
	
	//register_taxonomy("counselingcat", array("counselingprojects"), array("hierarchical" => true, "label" => "Government Category", "singular_label" => "Government Category", "rewrite" => true));
	
	//register_taxonomy("counselingindustry", array("counselingprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
}
?>