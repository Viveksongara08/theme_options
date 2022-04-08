<?php
/*************************************************/
/*** Strepo Faq
/**************************************************/
add_action( 'init', 'icee_other_areas' );
function icee_other_areas() {
	
	$labels = array(
		'name' 				=> _x('Other Areas To Seek Resources', 'post type general name'),
		'add_new' 			=> 'Add Other Areas To Seek Resources',
		'add_new_item' 		=> 'Add Other Areas To Seek Resources',
		'edit_item' 		=> __('Edit Other Areas To Seek Resources'),
		'new_item' 			=> __('New Other Areas To Seek Resources'),
		'all_items' 		=> __('All Other Areas To Seek Resources'),
		'view_item' 		=> __('View Other Areas To Seek Resources'),
		'search_items' 		=> __('Search Other Areas To Seek Resources'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Other Areas To Seek Resources'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Other Areas To Seek Resources')
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
	
	register_post_type("otherareas",$args);
	
	//register_taxonomy("mapcate", array("housing"), array("hierarchical" => true, "label" => "Map Category", "singular_label" => "Map Category", "rewrite" => true));
	
	//register_taxonomy("governmentindustry", array("governmentprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
	
	//register_post_type("counselingprojects",$args);
	
	//register_taxonomy("counselingcat", array("counselingprojects"), array("hierarchical" => true, "label" => "Government Category", "singular_label" => "Government Category", "rewrite" => true));
	
	//register_taxonomy("counselingindustry", array("counselingprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
}
?>