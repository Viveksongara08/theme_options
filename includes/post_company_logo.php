<?php
/*************************************************/
/*** Strepo Testimonials
/**************************************************/
add_action( 'init', 'icee_company_logos' );
function icee_company_logos() {
	
	$labels = array(
		'name' 				=> _x('Company Logos', 'post type general name'),
		'add_new' 			=> 'Add Company Logos',
		'add_new_item' 		=> 'Add Company Logos',
		'edit_item' 		=> __('Edit Company Logos'),
		'new_item' 			=> __('New Company Logos'),
		'all_items' 		=> __('All Company Logos'),
		'view_item' 		=> __('View Company Logos'),
		'search_items' 		=> __('Search Company Logos'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Company Logos'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Company Logos')
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
		'supports' 			=> array( 'title','thumbnail'),
	);
	
	register_post_type("Companylogos",$args);
	
	//register_taxonomy("Testimonial", array("Testimonial"), array("hierarchical" => true, "label" => "Testimonial", "singular_label" => "Testimonial", "rewrite" => true));
}
?>