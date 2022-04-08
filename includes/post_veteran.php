<?php
/*************************************************/
/*** Strepo Faq
/**************************************************/
add_action( 'init', 'icee_Veteran' );
function icee_Veteran() {
	
	$labels = array(
		'name' 				=> _x('Veteran Owned Businesses', 'post type general name'),
		'add_new' 			=> 'Add Veteran Owned Businesses',
		'add_new_item' 		=> 'Add Veteran Owned Businesses',
		'edit_item' 		=> __('Edit Veteran Owned Businesses'),
		'new_item' 			=> __('New Veteran Owned Businesses'),
		'all_items' 		=> __('All Veteran Owned Businesses'),
		'view_item' 		=> __('View Veteran Owned Businesses'),
		'search_items' 		=> __('Search Veteran Owned Businesses'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Veteran Owned Businesses'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Veteran Owned Businesses')
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
	
	register_post_type("veteran",$args);
	
	register_taxonomy("mapcate", array("housing"), array("hierarchical" => true, "label" => "Map Category", "singular_label" => "Map Category", "rewrite" => true));
	
	//register_taxonomy("governmentindustry", array("governmentprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
	
	//register_post_type("counselingprojects",$args);
	
	//register_taxonomy("counselingcat", array("counselingprojects"), array("hierarchical" => true, "label" => "Government Category", "singular_label" => "Government Category", "rewrite" => true));
	
	//register_taxonomy("counselingindustry", array("counselingprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
}
?>