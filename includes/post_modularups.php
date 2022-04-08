<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_modularups' );
function icee_modularups() {
	
	$labels = array(
		'name' 				=> _x('Modular UPS', 'post type general name'),
		'add_new' 			=> 'Add Modular UPS',
		'add_new_item' 		=> 'Add Modular UPS',
		'edit_item' 		=> __('Edit Modular UPS'),
		'new_item' 			=> __('New Modular UPS'),
		'all_items' 		=> __('All Modular UPS'),
		'view_item' 		=> __('View Modular UPS'),
		'search_items' 		=> __('Search Modular UPS'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Modular UPS'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Modular UPS')
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
	
	register_post_type("modularups",$args);
	
	register_taxonomy("application", array("modularups"), array("hierarchical" => true, "label" => "Application", "singular_label" => "Application", "rewrite" => true));
	register_taxonomy("capacity", array("modularups"), array("hierarchical" => true, "label" => "Capacity", "singular_label" => "Capacity", "rewrite" => true));
	register_taxonomy("phase", array("modularups"), array("hierarchical" => true, "label" => "Phase", "singular_label" => "Phase", "rewrite" => true));
	register_taxonomy("inputvoltge", array("modularups"), array("hierarchical" => true, "label" => "Input voltage", "singular_label" => "Input voltage", "rewrite" => true));
	register_taxonomy("outputvoltage", array("modularups"), array("hierarchical" => true, "label" => "Output voltage", "singular_label" => "Output voltage", "rewrite" => true));
register_taxonomy("type", array("modularups"), array("hierarchical" => true, "label" => "Type", "singular_label" => "Type", "rewrite" => true));

}
?>