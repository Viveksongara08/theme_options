<?php
/*************************************************/
/*** Strepo Faq
/**************************************************/
add_action( 'init', 'icee_RenewableEnergy' );
function icee_RenewableEnergy() {
	
	$labels = array(
		'name' 				=> _x('Renewable Energy', 'post type general name'),
		'add_new' 			=> 'Add Renewable Energy',
		'add_new_item' 		=> 'Add Renewable Energy',
		'edit_item' 		=> __('Edit Renewable Energy'),
		'new_item' 			=> __('New Renewable Energy'),
		'all_items' 		=> __('All Renewable Energy'),
		'view_item' 		=> __('View Renewable Energy'),
		'search_items' 		=> __('Search Renewable Energy'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Renewable Energy'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Renewable Energy')
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
	
	register_post_type("renewableenergy",$args);
	
	//register_taxonomy("cate", array("shortcourses"), array("hierarchical" => true, "label" => "Product Category", "singular_label" => "Product Category", "rewrite" => true));
	
	//register_taxonomy("governmentindustry", array("governmentprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
	
	//register_post_type("counselingprojects",$args);
	
	register_taxonomy("renewableenergycategory", array("renewableenergy"), array("hierarchical" => true, "label" => "Renewable Energy Category", "singular_label" => "Renewable Energy Category", "rewrite" => true));
	
	//register_taxonomy("freecourseuniversity", array("freecourses"), array("hierarchical" => true, "label" => "Free University", "singular_label" => "Free University", "rewrite" => true));
}
?>