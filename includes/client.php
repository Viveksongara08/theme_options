<?php
//error_reporting(0);
function Clients_custom_post_quote()
{
	$labels = array(
		'name'               => _x( 'Brand', 'post type general name' ),
		'singular_name'      => _x( 'Brand', 'post type singular name' ),
		'add_new'            => __( 'Add Brand' ), 
		'edit_item'          => __( 'Edit Brand' ),
		'view_item'          => __( 'View Brand' ),
		'search_items'       => __( 'Search Brand' ),
		'not_found'          => __( 'No quotes found' ),
		'not_found_in_trash' => __( 'No quotes found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Brand'
	);
	$args = array(
		'labels'        => $labels,
		'publicly_queryable'  => false,
		'public'        => true,
		'supports'      => array( 'title', 'thumbnail' ),
		'has_archive'   => true,
	);
	register_post_type( 'Brands', $args );	
}
function Clients_custom_post_quote_meta_box()
{}
function Clients_custom_post_quote_meta_box_field( $post )
{}
function Clients_custom_post_quote_meta_box_save( $post_id )
{}
function Clients_custom_post_quote_init()
{
	add_action( 'save_post', 'Clients_custom_post_quote_meta_box_save' );
	add_action( 'add_meta_boxes', 'Clients_custom_post_quote_meta_box' );
}
add_action( 'init', 'Clients_custom_post_quote' );
add_action( 'init', 'Clients_custom_post_quote_init' );