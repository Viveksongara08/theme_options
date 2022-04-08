<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_make' );
function icee_make() {
	
	$labels = array(
		'name' 				=> _x('Make', 'post type general name'),
		'add_new' 			=> 'Add Make',
		'add_new_item' 		=> 'Add Makes',
		'edit_item' 		=> __('Edit Makes'),
		'new_item' 			=> __('New Makes'),
		'all_items' 		=> __('All Makes'),
		'view_item' 		=> __('View Makes'),
		'search_items' 		=> __('Search Makes'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Makes'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Makes')
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
		'show_in_menu' => 'edit.php?post_type=years',

		'supports' 			=> array( 'title','thumbnail'),
	);
	
	register_post_type("Makes",$args);
	
	//register_taxonomy("Gallery", array("Gallery"), array("hierarchical" => true, "label" => "Gallery", "singular_label" => "Gallery", "rewrite" => true));
}

function wpse_add_custom_meta_box_2() {
   add_meta_box(
       'custom_meta_box-2',       // $id
       'Years Section',                  // $title
       'show_custom_meta_box_2',  // $callback
       'makes',                 // $page
       'normal',                  // $context
       'high'                     // $priority
   );
}
add_action('add_meta_boxes', 'wpse_add_custom_meta_box_2');

function show_custom_meta_box_2() {
 global $post;
 global $wpdb;
    // Use nonce for verification to secure data sending
    wp_nonce_field( basename( __FILE__ ), 'wpse_our_nonce' );
?>
<div class="form-group">
 <label>Years</label><br/>
<select style="width:100%;" class="" name="years_for" id="years_for">

<option value="" >Select year</option>
<?php 
 $select_year = get_post_meta( $_REQUEST["post"], 'select_year', true ); 

//print_r( $select_year);
$args1 = array( 'post_type' => 'years', 'posts_per_page' => -1,'orderby' => 'date',
    'order' => 'desc' );
            
            $testimonialQuery = new WP_Query($args1);
            if($testimonialQuery->have_posts()): 
            $i=0;
            while($testimonialQuery->have_posts()): $testimonialQuery->the_post(); 
            $thumbnail = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'full');
            $titles=get_the_title( $post->ID );
            setup_postdata($post);
             $titles;?>
			<option <?php if($post->ID==$select_year){ echo"selected"; } ?> value="<?php echo $post->ID; ?>" ><?php echo $post->post_title; ?></option>
			  <?php $i++; endwhile; endif; ?>
<?php wp_reset_query(); ?>
</select>
</div>
<?php 	
}
function wpse_save_meta_fields( $post_id ) {
	
if(@$_REQUEST["post_type"]=='makes'){
	update_post_meta($post_id, "select_year", $_REQUEST["years_for"]);

}	
}
add_action( 'save_post', 'wpse_save_meta_fields' );
add_action( 'new_to_publish', 'wpse_save_meta_fields' );



// Add the custom columns to the book post type:
add_filter( 'manage_makes_posts_columns', 'set_custom_edit_makes_columns' );
function set_custom_edit_makes_columns($columns) {
    unset( $columns['author'] );
    $columns['makes_year'] = __( 'Years', 'your_text_domain' );
   
    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_makes_posts_custom_column' , 'custom_makes_column', 10, 2 );
function custom_makes_column( $column, $post_id ) {
    switch ( $column ) {

        
        case 'makes_year' :
            echo get_the_title(get_post_meta( $post_id , 'select_year' , true )); 
            break;

    }
}
?>