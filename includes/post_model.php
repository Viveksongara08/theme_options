<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_model' );
function icee_model() {
	
	$labels = array(
		'name' 				=> _x('Model', 'post type general name'),
		'add_new' 			=> 'Add Model',
		'add_new_item' 		=> 'Add Model',
		'edit_item' 		=> __('Edit Model'),
		'new_item' 			=> __('New Model'),
		'all_items' 		=> __('All Model'),
		'view_item' 		=> __('View Model'),
		'search_items' 		=> __('Search Model'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Model'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Model')
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
		'supports' 			=> array( 'title'),
	);
	
	register_post_type("Model",$args);
	
	//register_taxonomy("Gallery", array("Gallery"), array("hierarchical" => true, "label" => "Gallery", "singular_label" => "Gallery", "rewrite" => true));
}

function wpse_add_custom_meta_box_3() {
   add_meta_box(
       'custom_meta_box-3',       // $id
       'Makes Section',                  // $title
       'show_custom_meta_box_3',  // $callback
       'model',                 // $page
       'normal',                  // $context
       'high'                     // $priority
   );
}
add_action('add_meta_boxes', 'wpse_add_custom_meta_box_3');

function show_custom_meta_box_3() {
 global $post;
 global $wpdb;
    // Use nonce for verification to secure data sending
    wp_nonce_field( basename( __FILE__ ), 'wpse_our_nonce' );
?>
<div class="form-group">
 <label>Makes</label><br/>
<select style="width:100%;" class="" name="make_for" id="make_for">

<option value="" >Select make</option>
<?php 
 $select_make = get_post_meta( $_REQUEST["post"], 'select_make', true ); 

//print_r( $select_model);
$args1 = array( 'post_type' => 'makes', 'posts_per_page' => -1,'orderby' => 'date',
    'order' => 'desc' );
            
            $testimonialQuery = new WP_Query($args1);
            if($testimonialQuery->have_posts()): 
            $i=0;
            while($testimonialQuery->have_posts()): $testimonialQuery->the_post(); 
            $thumbnail = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'full');
            $titles=get_the_title( $post->ID );
            setup_postdata($post);
             $titles;?>
			<option <?php if($post->ID==$select_make){ echo"selected"; } ?> value="<?php echo $post->ID; ?>" ><?php echo $post->post_title; ?></option>
			  <?php $i++; endwhile; endif; ?>
<?php wp_reset_query(); ?>
</select>
</div>
<?php 	
}
function wpse_save_meta_fields3( $post_id ) {
	
if(@$_REQUEST["post_type"]=='model'){
	update_post_meta($post_id, "select_make", $_REQUEST["make_for"]);

}	
}
add_action( 'save_post', 'wpse_save_meta_fields3' );
add_action( 'new_to_publish', 'wpse_save_meta_fields3' );



// Add the custom columns to the book post type:
add_filter( 'manage_model_posts_columns', 'set_custom_edit_model_columns' );
function set_custom_edit_model_columns($columns) {
    unset( $columns['author'] );
    $columns['model_make'] = __( 'Make', 'your_text_domain' );
   
    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_model_posts_custom_column' , 'custom_model_column', 10, 2 );
function custom_model_column( $column, $post_id ) {
    switch ( $column ) {

        
        case 'model_make' :
            echo get_the_title(get_post_meta( $post_id , 'select_make' , true )); 
            break;

    }
}
?>