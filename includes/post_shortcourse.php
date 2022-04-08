<?php
/*************************************************/
/*** Strepo Faq
/**************************************************/
add_action( 'init', 'icee_Shortcourse' );
function icee_Shortcourse() {
	
	$labels = array(
		'name' 				=> _x('Short Courses', 'post type general name'),
		'add_new' 			=> 'Add Short Courses',
		'add_new_item' 		=> 'Add Short Courses',
		'edit_item' 		=> __('Edit Short Courses'),
		'new_item' 			=> __('New Short Courses'),
		'all_items' 		=> __('All Short Courses'),
		'view_item' 		=> __('View Short Courses'),
		'search_items' 		=> __('Search Short Courses'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Short Courses'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Short Courses')
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
	
	register_post_type("Short Courses",$args);
	
	//register_taxonomy("cate", array("shortcourses"), array("hierarchical" => true, "label" => "Product Category", "singular_label" => "Product Category", "rewrite" => true));
	
	//register_taxonomy("governmentindustry", array("governmentprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
	
	//register_post_type("counselingprojects",$args);
	
	register_taxonomy("counselingcat", array("shortcourses"), array("hierarchical" => true, "label" => "Short Category", "singular_label" => "Short Category", "rewrite" => true));
	
//	register_taxonomy("counselingindustry", array("shortcourses"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
}
?>