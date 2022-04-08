
	<?php 
	$user_id=get_current_user_id();
		
$args1 = array( 'post_type' => 'post', 'posts_per_page' => -1,
'meta_query'=> array(array('key' => 'post_favorites','value' => $user_id)),
'orderby' => 'date','order' => 'desc' );
            
            $testimonialQuery = new WP_Query($args1);
            if($testimonialQuery->have_posts()): 
            $i=0;
            while($testimonialQuery->have_posts()): $testimonialQuery->the_post(); 
            $thumbnail = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'full');
            $titles=get_the_title( $post->ID );
            setup_postdata($post);
             $titles;
			$phone_image_1=get_post_meta ( $post->ID, $key = 'post_likes', $single = false );
            $post_favorites=get_post_meta ( $post->ID, $key = 'post_favorites', $single = false );
                
		$user_id=get_current_user_id();
			
			if(!empty($post_favorites)){
				if(in_array($user_id,$post_favorites)){
					$msg1="Unfavorite";
				}else{
					$msg1="Favorite";
				}
			}else{
				$msg1="Favorite";
			} 
			// print_r($phone_image_1);
			
$phone_image_1=get_post_meta ( $post->ID, $key = 'post_likes_new', $single = false );
            			
			 ?>
			<div style="width:33%;float:left;">
	        <p><?php echo $post->post_title; ?></p><br/>
           <p><?php echo $post->post_content; ?></p>			
			
			<p>
			<a id="favorite_<?php echo $post->ID;  ?>" onclick="PostFavorite(<?php echo $user_id; ?>,<?php echo $post->ID; ?>);" href="javascript:void(0)">
			<span id="fav_msg_<?php echo $post->ID; ?>" ><?php echo $msg1; ?><span>
			</a>
			</p>			
    		</div>
			
            <?php $i++; endwhile; endif; ?>
<?php wp_reset_query(); ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<script>
function PostLike(uid,pid){
	
	   $.ajax({
            type:'POST',
            url:'<?php echo plugin_dir_url(''); ?>theme_options/ajax_like.php',
            data:{uid:uid,pid:pid},
            success:function(html){
				var obj =$.parseJSON(html);
				$('#message_'+pid).html(obj.message);
				$('#count_'+pid).html(obj.count);
                //$('#subcat').html(html);
				//alert(html);
            }
        });	
	
}

function PostFavorite(uid,pid){
	
	 $.ajax({
            type:'POST',
            url:'<?php echo plugin_dir_url(''); ?>auth/ajax_favorite.php',
            data:{uid:uid,pid:pid},
            success:function(html){
				var obj =$.parseJSON(html);
				$('#fav_msg_'+pid).html(obj.message);
				//$('#count_'+pid).html(obj.count);
                //$('#subcat').html(html);
				//alert(html);
            }
        });	
	
	
}

</script>