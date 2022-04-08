<?php
/*************************************************/
/*** Strepo Faq
/**************************************************/
add_action( 'init', 'icee_housing' );
function icee_housing() {
	
	$labels = array(
		'name' 				=> _x('Housing', 'post type general name'),
		'add_new' 			=> 'Add Housing',
		'add_new_item' 		=> 'Add Housing',
		'edit_item' 		=> __('Edit Housing'),
		'new_item' 			=> __('New Housing'),
		'all_items' 		=> __('All Housing'),
		'view_item' 		=> __('View Housing'),
		'search_items' 		=> __('Search Housing'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Housing'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Housing')
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
	
	register_post_type("housing",$args);
	
	register_taxonomy("mapcate", array("housing"), array("hierarchical" => true, "label" => "Map Category", "singular_label" => "Map Category", "rewrite" => true));
	
	//register_taxonomy("governmentindustry", array("governmentprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
	
	//register_post_type("counselingprojects",$args);
	
	//register_taxonomy("counselingcat", array("counselingprojects"), array("hierarchical" => true, "label" => "Government Category", "singular_label" => "Government Category", "rewrite" => true));
	
	//register_taxonomy("counselingindustry", array("counselingprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
}
?>