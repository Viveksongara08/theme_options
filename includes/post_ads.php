<?php
/*************************************************/
/*** Strepo Faq
/**************************************************/
add_action( 'init', 'icee_Ads' );
function icee_Ads() {
	
	$labels = array(
		'name' 				=> _x('Ads', 'post type general name'),
		'add_new' 			=> 'Add Ads',
		'add_new_item' 		=> 'Add Ads',
		'edit_item' 		=> __('Edit Ads'),
		'new_item' 			=> __('New Ads'),
		'all_items' 		=> __('All Ads'),
		'view_item' 		=> __('View Ads'),
		'search_items' 		=> __('Search Ads'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Ads'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Ads')
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
		'supports' 			=> array( 'title', 'editor', 'thumbnail','excerpt','comments'),
       // 'taxonomies'          => array( 'category' ),
		
		
	);
	


	register_post_type("Ads",$args);
	
	//register_taxonomy("cate", array("Ads"), array("hierarchical" => true, "label" => "Ads Category", "singular_label" => "Ads Category", "rewrite" => true));
	
	//register_taxonomy("governmentindustry", array("governmentprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
	
	//register_post_type("counselingprojects",$args);
	
	register_taxonomy("ads", array("ads"), array("hierarchical" => true, "label" => "Ads Category", "singular_label" => "Ads Category", "rewrite" => true));
	
	//register_taxonomy("counselingindustry", array("counselingprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
}
?>