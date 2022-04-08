<?php
/*************************************************/
/*** Strepo Faq
/**************************************************/
add_action( 'init', 'icee_SolutionCritical' );
function icee_SolutionCritical() {
	
	$labels = array(
		'name' 				=> _x('Solution Critical', 'post type general name'),
		'add_new' 			=> 'Add Solution Critical',
		'add_new_item' 		=> 'Add Solution Critical',
		'edit_item' 		=> __('Edit Solution Critical'),
		'new_item' 			=> __('New Solution Critical'),
		'all_items' 		=> __('All Solution Critical'),
		'view_item' 		=> __('View Solution Critical'),
		'search_items' 		=> __('Search Solution Critical'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Solution Critical'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Solution Critical Power')
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
	
	register_post_type("solutioncp",$args);
	
	//register_taxonomy("cate", array("shortcourses"), array("hierarchical" => true, "label" => "Product Category", "singular_label" => "Product Category", "rewrite" => true));
	
	//register_taxonomy("governmentindustry", array("governmentprojects"), array("hierarchical" => true, "label" => "Government Industry", "singular_label" => "Government Industry", "rewrite" => true));
	
	//register_post_type("counselingprojects",$args);
	
	register_taxonomy("solutioncpcategory", array("solutioncp"), array("hierarchical" => true, "label" => "Solution Critical Category", "singular_label" => "Solution Critical Category", "rewrite" => true));
	
	//register_taxonomy("freecourseuniversity", array("freecourses"), array("hierarchical" => true, "label" => "Free University", "singular_label" => "Free University", "rewrite" => true));
}
?>