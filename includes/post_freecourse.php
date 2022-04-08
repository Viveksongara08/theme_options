<?php
/*************************************************/
/*** Strepo Faq
/**************************************************/
add_action( 'init', 'icee_Freecourse' );
function icee_Freecourse() {
	
	$labels = array(
		'name' 				=> _x('Free Courses', 'post type general name'),
		'add_new' 			=> 'Add Free Courses',
		'add_new_item' 		=> 'Add Free Courses',
		'edit_item' 		=> __('Edit Free Courses'),
		'new_item' 			=> __('New Free Courses'),
		'all_items' 		=> __('All Free Courses'),
		'view_item' 		=> __('View Free Courses'),
		'search_items' 		=> __('Search Free Courses'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Free Courses'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Free Courses')
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
	
	register_post_type("Free Courses",$args);
	
	//register_taxonomy("cate", array("shortcourses"), array("hierarchical" => true, "label" => "Product Category", "singular_label" => "Product Category", "rewrite" => true));
	
	//register_taxonomy("governmentindustry", array("governmentprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
	
	//register_post_type("counselingprojects",$args);
	
	register_taxonomy("freecoursecat", array("freecourses"), array("hierarchical" => true, "label" => "Free Category", "singular_label" => "Free Category", "rewrite" => true));
	
	register_taxonomy("freecourseuniversity", array("freecourses"), array("hierarchical" => true, "label" => "Free University", "singular_label" => "Free University", "rewrite" => true));
}
?>