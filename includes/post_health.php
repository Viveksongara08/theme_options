<?php
/*************************************************/
/*** Strepo Faq
/**************************************************/
add_action( 'init', 'icee_health' );
function icee_health() {
	
	$labels = array(
		'name' 				=> _x('Health', 'post type general name'),
		'add_new' 			=> 'Add Health',
		'add_new_item' 		=> 'Add Health',
		'edit_item' 		=> __('Edit Health'),
		'new_item' 			=> __('New Health'),
		'all_items' 		=> __('All Health'),
		'view_item' 		=> __('View Health'),
		'search_items' 		=> __('Search Health'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Health'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Health')
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
	
	register_post_type("health",$args);
	
	register_taxonomy("mapcate1", array("health"), array("hierarchical" => true, "label" => "Map Category", "singular_label" => "Map Category", "rewrite" => true));
	
	//register_taxonomy("governmentindustry", array("governmentprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
	
	//register_post_type("counselingprojects",$args);
	
	//register_taxonomy("counselingcat", array("counselingprojects"), array("hierarchical" => true, "label" => "Government Category", "singular_label" => "Government Category", "rewrite" => true));
	
	//register_taxonomy("counselingindustry", array("counselingprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
}
?>