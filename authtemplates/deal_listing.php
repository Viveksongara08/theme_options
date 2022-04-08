<?php 

$user_id=get_current_user_id();
?>


<div class="row">
<div class="col-md-12">
<div class="overview-wrap">
<h2 class="title-1">Blog List</h2>
</div>
</div>

<div class="col-md-12">
 <div class="table-responsive table-responsive-data2">
 <form name="Sendtosuppliersform" id="Sendtosuppliersform" method="" action="" >
<table class="table table-data2">
<thead>
<tr>
<th></th>
<th></th>
<th>Title</th>
<th>category</th>
<th>Send to suppliers</th>
</tr>
</thead>
<tbody>				

										<?php 
										
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

$args1 = array( 'post_type' => 'post', 'posts_per_page' => 12,'orderby' => 'date',
    'order' => 'desc','author'=>$user_id, 'post_status' => array('publish', 'pending', 'draft'),'paged'=>$paged, 'nopaging' => false);
            
            $testimonialQuery = new WP_Query($args1);
            if($testimonialQuery->have_posts()){ 
            $i=0;
            while($testimonialQuery->have_posts()): $testimonialQuery->the_post(); 
            $thumbnail1 = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'full');
            $titles=get_the_title( $post->ID );
            setup_postdata($post);
             $titles;
$categories = get_the_category($post->ID);

$send_to_suppliers=get_post_meta ( $post->ID, $key = 'send_to_suppliers', $single = true );
$post_price=get_post_meta ( $post->ID, $key = 'post_price', $single = true );

 ?>


<tr class="tr-shadow">
<td ><input type="checkbox" id="selectposts<?php echo $post->ID;  ?>" name="selectposts[]" value="<?php echo $post->ID;  ?>" /></td>
<td class="blog_img"><img style="width:40px;" src="<?php echo $thumbnail1[0]; ?>" alt="" /></td>
<td class="blog_title"><?php echo $post->post_title; ?></td>
<td class="desc"><?php echo $categories[0]->name; ?></td>
<td class="desc"><?php if($send_to_suppliers==""){ echo"NO"; }else{ echo"Yes"; } ?></td>
<td class="desc">
<?php echo $post_price; ?></td>
<td>
<div class="table-data-feature">
<a target="blank" href="<?php echo get_permalink(); ?>" class="item" data-toggle="tooltip" data-placement="top" title="View">
<i class="zmdi zmdi-eye"></i>
</a>
<a href="<?php echo get_permalink(98); ?>?did=<?php echo $post->ID; ?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
<i class="zmdi zmdi-edit"></i> Edit
</a>
<a onclick="DeletePost(<?php echo $post->ID; ?>)" href="javascript:;" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
<i class="zmdi zmdi-delete"></i> Delete
</a>
<a href="<?php echo get_permalink(116); ?>?did=<?php echo $post->ID; ?>&aid=<?php echo $post->post_author; ?>">View suggestion prices</a>

</div>
</td>
</tr>
<tr class="spacer"></tr>


<?php $i++; endwhile;  ?>
<?php }else{ ?>
<tr class="tr-shadow">
<td colspan="3" class="blog_title">NOT FOUND !</td>
</tr>

<?php } ?>
<?php wp_reset_query();  ?>	




<tr class="tr-shadow">
<td></td>
<td></td>
<td></td>
<td></td>
<td><button type="submit" name="sendto" id="sendto" >Send to suppliers </button> </td>

</tr>
</tbody>


</table>

</form>
<p id="targetLayer" >  </p>
</div>
 
</div>
</div>
								
								


<script>
var j = jQuery.noConflict();
function DeletePost(pid){
	   j.ajax({
            type:'POST',
            url:'<?php echo plugin_dir_url(''); ?>theme_options/delete_post.php',
            data:{pid:pid},
            success:function(html){
				//var obj =j.parseJSON(html);
				//j('#message_'+pid).html(obj.message);
				//j('#count_'+pid).html(obj.count);
                //j('#subcat').html(html);
				//alert(html);
				location.reload();
            }
        });	
	
}




</script>
<script>
	var j = jQuery.noConflict();
j(document).ready(function (e){
j("#Sendtosuppliersform").on('submit',(function(e){
e.preventDefault();
	j('#loader_img').show();
j.ajax({
url: "<?php echo plugin_dir_url(''); ?>theme_options/sendtosuppliers.php",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){
//console.log(data);

	var stringified = JSON.stringify(data);
var obj = JSON.parse(stringified);
var obj =j.parseJSON(data);
				if(obj.type==0){
				j('#targetLayer').html("<span style='color:red;'>"+obj.message+"</span>");
				j('#loader_img').hide();
				}else{
				j('#targetLayer').html("<span style='color:green;'>"+obj.message+"</span>");
				j('#loader_img').hide();
				 setTimeout(function(){ window.location = "" }, 3000); 		
					} 
},
error: function(){} 	        
});

}));
});
</script>