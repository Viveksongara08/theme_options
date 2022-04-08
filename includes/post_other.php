<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_others' );
function icee_others() {
	
	$labels = array(
		'name' 				=> _x('OTHERS', 'post type general name'),
		'add_new' 			=> 'Add OTHERS',
		'add_new_item' 		=> 'Add OTHERS',
		'edit_item' 		=> __('Edit OTHERS'),
		'new_item' 			=> __('New OTHERS'),
		'all_items' 		=> __('All OTHERS'),
		'view_item' 		=> __('View OTHERS'),
		'search_items' 		=> __('Search OTHERS'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty OTHERS'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Others')
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
		'supports' 			=> array( 'title','thumbnail','editor'),
	);
	
	register_post_type("others",$args);
	
	register_taxonomy("application", array("others","singlephaseonlineups","threephaseonlineups","modularups"), array("hierarchical" => true, "label" => "Application", "singular_label" => "Application", "rewrite" => true));
	register_taxonomy("capacity", array("others","singlephaseonlineups","threephaseonlineups","modularups"), array("hierarchical" => true, "label" => "Capacity", "singular_label" => "Capacity", "rewrite" => true));
	register_taxonomy("phase", array("others","singlephaseonlineups","threephaseonlineups","modularups"), array("hierarchical" => true, "label" => "Phase", "singular_label" => "Phase", "rewrite" => true));
	register_taxonomy("inputvoltge", array("others","singlephaseonlineups","threephaseonlineups","modularups"), array("hierarchical" => true, "label" => "Input voltage", "singular_label" => "Input voltage", "rewrite" => true));
	register_taxonomy("outputvoltage", array("others","singlephaseonlineups","threephaseonlineups","modularups"), array("hierarchical" => true, "label" => "Output voltage", "singular_label" => "Output voltage", "rewrite" => true));
    register_taxonomy("type", array("others","singlephaseonlineups","threephaseonlineups","modularups"), array("hierarchical" => true, "label" => "Type", "singular_label" => "Type", "rewrite" => true));

}
?>