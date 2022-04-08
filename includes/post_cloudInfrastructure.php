<?php
/*************************************************/
/*** Strepo Faq
/**************************************************/
add_action( 'init', 'icee_CloudInfrastructure' );
function icee_CloudInfrastructure() {
	
	$labels = array(
		'name' 				=> _x('Cloud Infrastructure', 'post type general name'),
		'add_new' 			=> 'Add Cloud Infrastructure',
		'add_new_item' 		=> 'Add Cloud Infrastructure',
		'edit_item' 		=> __('Edit Cloud Infrastructure'),
		'new_item' 			=> __('New Cloud Infrastructure'),
		'all_items' 		=> __('All Cloud Infrastructure'),
		'view_item' 		=> __('View Cloud Infrastructure'),
		'search_items' 		=> __('Search Cloud Infrastructure'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Cloud Infrastructure'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Cloud Infrastructure')
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
	
	register_post_type("cloudinfrastructure",$args);
	
	//register_taxonomy("cate", array("shortcourses"), array("hierarchical" => true, "label" => "Product Category", "singular_label" => "Product Category", "rewrite" => true));
	
	//register_taxonomy("governmentindustry", array("governmentprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
	
	//register_post_type("counselingprojects",$args);
	
	register_taxonomy("cloudinfrastructurecategory", array("cloudinfrastructure"), array("hierarchical" => true, "label" => "Cloud Infrastructure Category", "singular_label" => "Cloud Infrastructure Category", "rewrite" => true));
	
	//register_taxonomy("freecourseuniversity", array("freecourses"), array("hierarchical" => true, "label" => "Free University", "singular_label" => "Free University", "rewrite" => true));
}
?>