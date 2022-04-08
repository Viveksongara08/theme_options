<?php
//error_reporting(0);
function sliders_custom_post_quote()
{
	$labels = array(
		'name'               => _x( 'slider', 'post type general name' ),
		'singular_name'      => _x( 'slider', 'post type singular name' ),
		'add_new'            => __( 'Add Slide' ), 
		'edit_item'          => __( 'Edit Slide' ),
		'view_item'          => __( 'View Slide' ),
		'search_items'       => __( 'Search Slide' ),
		'not_found'          => __( 'No quotes found' ),
		'not_found_in_trash' => __( 'No quotes found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Slider'
	);
	$args = array(
		'labels'        => $labels,
		'publicly_queryable'  => false,
		'exclude_from_search'=> true,
		'public'        => true,
		'supports'      => array( 'title', 'thumbnail' ),
		'has_archive'   => true,
	);
	register_post_type( 'sliders', $args );	
}
function sliders_custom_post_quote_meta_box()
{
	global $post;
	add_meta_box( 
        'sliders_custom_post_quote_meta_box',
        'slider Fields',
        'sliders_custom_post_quote_meta_box_field',
        'sliders',
        'normal',
        'high'
    );	
}

	function sliders_custom_post_quote_meta_box_field( $post )
	{
		$post_id = $post->ID;
		wp_nonce_field( plugin_basename( __FILE__ ), 'sliders_custom_post_quote_meta_box_field_nonce' );
	?>
    
    <!--<table width="100%" cellspacing="5" cellpadding="2" border="0">
	<style>
.slider_item{
color:#00C;
font-size:14px;
}

input[type="email"], input[type="number"], input[type="password"], input[type="search"], input[type="tel"], input[type="text"], input[type="url"], select, textarea{ width:100%;}
</style>
        
        <tr>
		    <td class="slider_item" valign="top">First Level  :</td>
            <td>
				<input type="text" name="slide_first_level" value="<?php echo @get_post_meta($post_id, 'slide_first_level','true') ?>" />				
            </td>
        </tr>
        
        
         <tr>
		    <td class="slider_item" valign="top">Second Level   :</td>
            <td>
				<input type="text" name="slide_second_level" value="<?php echo @get_post_meta($post_id, 'slide_second_level','true') ?>" />				
            </td>
        </tr>
        
         <tr>
		    <td class="slider_item" valign="top">Third Level :</td>
            <td>
				<input type="text" name="slide_third_level" value="<?php echo @get_post_meta($post_id, 'slide_third_level','true') ?>" />				
            </td>
        </tr>
         
    </table>-->
<?php
}
function sliders_custom_post_quote_meta_box_save( $post_id )
{
	
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		return $post_id;

	if ( !wp_verify_nonce( $_POST['sliders_custom_post_quote_meta_box_field_nonce'], plugin_basename( __FILE__ ) ) )
		return $post_id;;
	if ( 'sliders' != $_POST['post_type'] )
		return $post_id;
	
	if ( !wp_is_post_revision( $post_id ) )
	{
		remove_action('save_post', 'sliders_custom_post_quote_meta_box_save');
		if ($_FILES["quote_bulk_upload"]["error"] == 0)
		{	
			update_post_meta( $post_id, '_imscpromotemepro_general_message', $quotes );
			
		}
		 
	update_post_meta( $post_id, 'slide_first_level',$_POST['slide_first_level']); 
	update_post_meta( $post_id, 'slide_second_level',$_POST['slide_second_level']); 
	update_post_meta( $post_id, 'slide_third_level',$_POST['slide_third_level']); 
	}
}
function sliders_custom_post_quote_init()
{
	add_action( 'save_post', 'sliders_custom_post_quote_meta_box_save' );
	add_action( 'add_meta_boxes', 'sliders_custom_post_quote_meta_box' );
}
add_action( 'init', 'sliders_custom_post_quote' );
add_action( 'init', 'sliders_custom_post_quote_init' );