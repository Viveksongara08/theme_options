<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_Three_phase_Online_UPS' );
function icee_Three_phase_Online_UPS() {
	
	$labels = array(
		'name' 				=> _x('Three phase Online UPS', 'post type general name'),
		'add_new' 			=> 'Add Three phase Online UPS',
		'add_new_item' 		=> 'Add Three phase Online UPS',
		'edit_item' 		=> __('Edit Three phase Online UPS'),
		'new_item' 			=> __('New Three phase Online UPS'),
		'all_items' 		=> __('All Three phase Online UPS'),
		'view_item' 		=> __('View Three phase Online UPS'),
		'search_items' 		=> __('Search Three phase Online UPS'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Three phase Online UPS'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Three phase Online UPS')
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
	
	register_post_type("threephaseonlineups",$args);
	
	register_taxonomy("application", array("threephaseonlineups"), array("hierarchical" => true, "label" => "Application", "singular_label" => "Application", "rewrite" => true));
	register_taxonomy("capacity", array("threephaseonlineups"), array("hierarchical" => true, "label" => "Capacity", "singular_label" => "Capacity", "rewrite" => true));
	register_taxonomy("phase", array("threephaseonlineups"), array("hierarchical" => true, "label" => "Phase", "singular_label" => "Phase", "rewrite" => true));
	register_taxonomy("inputvoltge", array("threephaseonlineups"), array("hierarchical" => true, "label" => "Input voltage", "singular_label" => "Input voltage", "rewrite" => true));
	register_taxonomy("outputvoltage", array("threephaseonlineups"), array("hierarchical" => true, "label" => "Output voltage", "singular_label" => "Output voltage", "rewrite" => true));
register_taxonomy("type", array("threephaseonlineups"), array("hierarchical" => true, "label" => "Type", "singular_label" => "Type", "rewrite" => true));

}
?>