<?php
/*************************************************/
/*** Strepo Faq
/**************************************************/
add_action( 'init', 'icee_referencecriticalpower' ); //post_referencecriticalpower.php 
function icee_referencecriticalpower() {
	
	$labels = array(
		'name' 				=> _x('Reference Critical Power', 'post type general name'),
		'add_new' 			=> 'Add Reference Critical Power',
		'add_new_item' 		=> 'Add Reference Critical Power',
		'edit_item' 		=> __('Edit Reference Critical Power'),
		'new_item' 			=> __('New Reference Critical Power'),
		'all_items' 		=> __('All Reference Critical Power'),
		'view_item' 		=> __('View Reference Critical Power'),
		'search_items' 		=> __('Search Reference Critical Power'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Reference Critical Power'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Reference Critical Power')
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
	
	register_post_type("referencecp",$args);
	
	//register_taxonomy("cate", array("shortcourses"), array("hierarchical" => true, "label" => "Product Category", "singular_label" => "Product Category", "rewrite" => true));
	
	//register_taxonomy("governmentindustry", array("governmentprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
	
	//register_post_type("counselingprojects",$args);
	
	register_taxonomy("referencecpcategory", array("referencecp"), array("hierarchical" => true, "label" => "Reference Critical Power Category", "singular_label" => "Reference Critical Power Category", "rewrite" => true));
	
	//register_taxonomy("freecourseuniversity", array("freecourses"), array("hierarchical" => true, "label" => "Free University", "singular_label" => "Free University", "rewrite" => true));
}
?>