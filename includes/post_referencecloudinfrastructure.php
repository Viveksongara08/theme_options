<?php
/*************************************************/
/*** Strepo Faq
/**************************************************/
add_action( 'init', 'icee_reference' ); //icee_referencecloudinfrastructure.php 
function icee_reference() {
	
	$labels = array(
		'name' 				=> _x('Reference ', 'post type general name'),
		'add_new' 			=> 'Add Reference ',
		'add_new_item' 		=> 'Add Reference ',
		'edit_item' 		=> __('Edit Reference '),
		'new_item' 			=> __('New Reference '),
		'all_items' 		=> __('All Reference '),
		'view_item' 		=> __('View Reference '),
		'search_items' 		=> __('Search Reference '),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Reference '), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Reference ')
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
	
	register_post_type("referenceci",$args);
	
	//register_taxonomy("cate", array("shortcourses"), array("hierarchical" => true, "label" => "Product Category", "singular_label" => "Product Category", "rewrite" => true));
	
	//register_taxonomy("governmentindustry", array("governmentprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
	
	//register_post_type("counselingprojects",$args);
	
	//register_taxonomy("referencecicategory", array("referenceci"), array("hierarchical" => true, "label" => "Reference Cloud Infrastructure Category", "singular_label" => "Reference Cloud Infrastructure Category", "rewrite" => true));
	
	//register_taxonomy("freecourseuniversity", array("freecourses"), array("hierarchical" => true, "label" => "Free University", "singular_label" => "Free University", "rewrite" => true));
}
?>