<?php
/*************************************************/
/*** Strepo Faq
/**************************************************/
add_action( 'init', 'icee_referencerenewableenergy' ); //post_referencerenewableenergy.php 
function icee_referencerenewableenergy() {
	
	$labels = array(
		'name' 				=> _x('Reference Renewable Energy', 'post type general name'),
		'add_new' 			=> 'Add Reference Renewable Energy',
		'add_new_item' 		=> 'Add Reference Renewable Energy',
		'edit_item' 		=> __('Edit Reference Renewable Energy'),
		'new_item' 			=> __('New Reference Renewable Energy'),
		'all_items' 		=> __('All Reference Renewable Energy'),
		'view_item' 		=> __('View Reference Renewable Energy'),
		'search_items' 		=> __('Search Reference Renewable Energy'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Reference Renewable Energy'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Reference Renewable Energy')
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
	
	register_post_type("referencere",$args);
	
	//register_taxonomy("cate", array("shortcourses"), array("hierarchical" => true, "label" => "Product Category", "singular_label" => "Product Category", "rewrite" => true));
	
	//register_taxonomy("governmentindustry", array("governmentprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
	
	//register_post_type("counselingprojects",$args);
	
	register_taxonomy("referencerecategory", array("referencere"), array("hierarchical" => true, "label" => "Reference Renewable Energy Category", "singular_label" => "Reference Renewable Energy Category", "rewrite" => true));
	
	//register_taxonomy("freecourseuniversity", array("freecourses"), array("hierarchical" => true, "label" => "Free University", "singular_label" => "Free University", "rewrite" => true));
}
?>