<?php
//error_reporting(0);
function Teams_custom_post_quote()
{
	$labels = array(
		'name'               => _x( 'Team', 'post type general name' ),
		'singular_name'      => _x( 'Team', 'post type singular name' ),
		'add_new'            => __( 'Add Team' ), 
		'edit_item'          => __( 'Edit Team' ),
		'view_item'          => __( 'View Team' ),
		'search_items'       => __( 'Search Team' ),
		'not_found'          => __( 'No quotes found' ),
		'not_found_in_trash' => __( 'No quotes found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Team'
	);
	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'supports'      => array( 'title', 'thumbnail','excerpt','comments','editor' ),
		'has_archive'   => true,
	);
	register_post_type( 'Teams', $args );	
}
function Teams_custom_post_quote_meta_box()
{}
function Teams_custom_post_quote_meta_box_field( $post )
{}
function Teams_custom_post_quote_meta_box_save( $post_id )
{}
function Teams_custom_post_quote_init()
{
	add_action( 'save_post', 'Teams_custom_post_quote_meta_box_save' );
	add_action( 'add_meta_boxes', 'Teams_custom_post_quote_meta_box' );
}
add_action( 'init', 'Teams_custom_post_quote' );
add_action( 'init', 'Teams_custom_post_quote_init' );