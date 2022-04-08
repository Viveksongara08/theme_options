<?php
/*************************************************/
/*** Strepo Faq
/**************************************************/
add_action( 'init', 'icee_download' );
function icee_download() {
	
	$labels = array(
		'name' 				=> _x('Download', 'post type general name'),
		'add_new' 			=> 'Add Download',
		'add_new_item' 		=> 'Add Download',
		'edit_item' 		=> __('Edit Download'),
		'new_item' 			=> __('New Download'),
		'all_items' 		=> __('All Download'),
		'view_item' 		=> __('View Download'),
		'search_items' 		=> __('Search Download'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Download'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Download')
	);

	$args = array(
		'labels' 			=> $labels,
		'public' 			=> true,
		'publicly_queryable'=> false,
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
	
	register_post_type("download",$args);
	
	//register_taxonomy("downloadcategory", array("download"), array("hierarchical" => true, "label" => "Download Category", "singular_label" => "Download Category", "rewrite" => true));
	
	//register_taxonomy("governmentindustry", array("governmentprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
	
	//register_post_type("counselingprojects",$args);
	
	//register_taxonomy("counselingcat", array("counselingprojects"), array("hierarchical" => true, "label" => "Government Category", "singular_label" => "Government Category", "rewrite" => true));
	
	//register_taxonomy("counselingindustry", array("counselingprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
}
?>