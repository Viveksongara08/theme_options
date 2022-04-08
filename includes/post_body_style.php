<?php
/*************************************************/
/*** Strepo Gallerys
/**************************************************/
add_action( 'init', 'icee_body_style' );
function icee_body_style() {
	
	$labels = array(
		'name' 				=> _x('Body style', 'post type general name'),
		'add_new' 			=> 'Add Body style',
		'add_new_item' 		=> 'Add Body style',
		'edit_item' 		=> __('Edit Body style'),
		'new_item' 			=> __('New Body style'),
		'all_items' 		=> __('All Body style'),
		'view_item' 		=> __('View Body style'),
		'search_items' 		=> __('Search Body style'),
		'not_found' 		=>  __('Empty'),
		'not_found_in_trash'=> __('Empty Body style'), 
		'parent_item_colon' => '',
		'menu_name' 		=> __('Body style')
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
	
	register_post_type("Body style",$args);
	
	//register_taxonomy("Gallery", array("Gallery"), array("hierarchical" => true, "label" => "Gallery", "singular_label" => "Gallery", "rewrite" => true));
}

function wpse_add_custom_meta_box_4() {
   add_meta_box(
       'custom_meta_box-4',       // $id
       'Models Section',                  // $title
       'show_custom_meta_box_4',  // $callback
       'bodystyle',                 // $page
       'normal',                  // $context
       'high'                     // $priority
   );
}
add_action('add_meta_boxes', 'wpse_add_custom_meta_box_4');

function show_custom_meta_box_4() {
 global $post;
 global $wpdb;
    // Use nonce for verification to secure data sending
    wp_nonce_field( basename( __FILE__ ), 'wpse_our_nonce' );
?>
<div class="form-group">
 <label>Model</label><br/>
<select style="width:100%;" class="" name="model_for" id="model_for">

<option value="" >Select Model</option>
<?php 
 $select_model = get_post_meta( $_REQUEST["post"], 'select_model', true ); 

//print_r( $select_model);
$args1 = array( 'post_type' => 'model', 'posts_per_page' => -1,'orderby' => 'date',
    'order' => 'desc' );
            
            $testimonialQuery = new WP_Query($args1);
            if($testimonialQuery->have_posts()): 
            $i=0;
            while($testimonialQuery->have_posts()): $testimonialQuery->the_post(); 
            $thumbnail = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'full');
            $titles=get_the_title( $post->ID );
            setup_postdata($post);
             $titles;?>
			<option <?php if($post->ID==$select_model){ echo"selected"; } ?> value="<?php echo $post->ID; ?>" ><?php echo $post->post_title; ?></option>
			  <?php $i++; endwhile; endif; ?>
<?php wp_reset_query(); ?>
</select>
</div>
<?php 	
}
function wpse_save_meta_fields4( $post_id ) {
	
if(@$_REQUEST["post_type"]=='bodystyle'){
	update_post_meta($post_id, "select_model", $_REQUEST["model_for"]);
}	
}
add_action( 'save_post', 'wpse_save_meta_fields4' );
add_action( 'new_to_publish', 'wpse_save_meta_fields4' );



// Add the custom columns to the book post type:
add_filter( 'manage_bodystyle_posts_columns', 'set_custom_edit_bodystyle_columns' );
function set_custom_edit_bodystyle_columns($columns) {
    unset( $columns['author'] );
    $columns['bodystyle_model'] = __( 'Model', 'your_text_domain' );
   
    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_bodystyle_posts_custom_column' , 'custom_bodystyle_column', 10, 2 );
function custom_bodystyle_column( $column, $post_id ) {
    switch ( $column ) {

        
        case 'bodystyle_model' :
            echo get_the_title(get_post_meta( $post_id , 'select_model' , true )); 
            break;

    }
}
?>