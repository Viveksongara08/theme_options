<?php


$postID=$_REQUEST["did"];




$thumbId = get_post_meta( $postID, '_thumbnail_id', true );


//$thumbId=json_encode($thumbId);
//print_r($thumbId);
//exit;
$title=get_the_title($postID);

$Datapost = get_post($postID);



$category = get_the_terms($postID, 'category');

$categorys1[]="";
if(!empty($category)){
foreach($category as $cat1){
	$categorys1[]=$cat1->term_id;
	
}}
$tags1[]="";
  $tag_detail=get_the_tags($postID);
if(!empty($tag_detail)){

  
  foreach($tag_detail as $tag){
	$tags1[]=$tag->term_id;
	
} }

//print_r($category_parent);
//print_r($category_chiled);

$room_gallery_ids = get_post_meta( $postID, 'room_gallery_ids', true );
 
$post_price=get_post_meta ( $postID, $key = 'post_price', $single = false ); 
 ?>



		
		
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header">
<strong>Edit </strong> Blog
</div>
<div class="card-body card-block">
<form action="#" method="post" name="addpost" id="addpost" enctype="multipart/form-data" class="form-horizontal">
<div class="row form-group">
<div class="col col-md-3">
<label for="text-input" class=" form-control-label">Title</label>
</div>
<div class="col-12 col-md-9">
<input type="text" name="post_title" id="post_title" value="<?php echo $title; ?>"  class="form-control">
</div>
</div>

<div class="row form-group">
<div class="col col-md-3">
<label for="textarea-input" class=" form-control-label">Description</label>
</div>
<div class="col-12 col-md-9">
<textarea name="post_description" id="post_description" rows="9" class="form-control">
<?php echo $Datapost->post_content; ?>
</textarea>
</div>
</div>

<div class="row form-group">
<div class="col col-md-3">
<label for="textarea-input" class=" form-control-label">Price</label>
</div>
<div class="col-12 col-md-9">
<input type="text" name="post_price" id="post_price" value="<?php echo $post_price[0]; ?>"  class="form-control">
</div>
</div>



<div class="row form-group">
<div class="col col-md-3">
<label class=" form-control-label">Select Categorys</label>
</div>
<div class="col col-md-9">
<div class="form-check-inline form-check">
	<?php
$category_parent_ids="";
$taxonomy = 'category';
$orderby = 'id';
$show_count = 0; 
$pad_counts = 0; 
$hierarchical = 1; 
$title = '';
$empty = 0;


$args = array(
'taxonomy' => $taxonomy,
'orderby' => $orderby,
'show_count' => $show_count,
'pad_counts' => $pad_counts,
'hierarchical' => $hierarchical,
'title_li' => $title,
'hide_empty' => $empty
);
$all_categories = get_categories( $args );
	?>
		<?php 
		if(!empty($all_categories)){
		foreach($all_categories as $cat){ ?>

<label for="cat_<?php echo $cat->term_id; ?>" class="form-check-label ">
<input <?php if (in_array($cat->term_id, $categorys1)){ echo"checked"; } ?> type="checkbox" value="<?php echo $cat->term_id;  ?>" name="pcta[]" id="cat_<?php echo $cat->term_id;  ?>"  class="form-check-input">
<?php echo $cat->name;  ?>
</label>
	<?php } } ?>

</div>
</div>
</div>
<?php /* ?>
<div class="row form-group">
<div class="col col-md-3">
<label class=" form-control-label">Select Tags</label>
</div>
<div class="col col-md-9">
<div class="form-check-inline form-check">
<?php 
$tags = get_tags(array(
  'hide_empty' => false
));
if(!empty($tags)){
foreach ($tags as $tag) {
?>
<label for="ptag_<?php echo $tag->slug; ?>" class="form-check-label ">
<input <?php if (in_array($tag->term_id, $tags1)){ echo"checked"; } ?> type="checkbox" name="ptag[]" id="ptag_<?php echo $tag->slug; ?>" value="<?php echo $tag->slug;  ?>"  class="form-check-input">
<?php echo $tag->name;  ?>
</label>
<?php 
}	
}
?>
</div>
</div>
</div> <?php */ ?>

<?php
$thumbnail = wp_get_attachment_image_src ( get_post_thumbnail_id ($postID), 'full');

/*
$phone_image_1=get_post_meta ( $postID, $key = '_video_id', $single = false );
$imagelink =get_post_meta ( $phone_image_1[0], $key = '_wp_attached_file', $single = false );
*/
 ?>


<div class="row form-group">
<div class="col col-md-3">
<label for="file-input" class=" form-control-label">
Image Upload
</label>
</div>
<div class="col-12 col-md-9">
<input type="file" name="thumbimage[]" id="thumbimage" accept="image/*"  class="form-control-file">
<img id="blah" style="height:70px; width:70px;<?php if(empty($thumbnail)){ ?>display:none;<?php } ?>border: solid 3px #000;margin: 10px;" src="<?php echo $thumbnail[0]; ?>" />

</div>
</div>

<div class="row form-group">
<div class="col col-md-3">
<label for="file-input" class=" form-control-label">
Image Upload (Multiple)
</label>
</div>
<div class="col-12 col-md-9">
<button type="button"  onclick="opengalley();" class="btn  btn-sm bt_add1" >Choose File</button>
<button type="button" onclick="submitFile();" id="uploadbtn" class="btn  btn-sm bt_add2" >Upload</button>

<img id="loader_upload_img" src="<?php echo plugin_dir_url(''); ?>theme_options/assets/images/loader.gif" style="height: 50px; display: none;">

<div  id="review_images">
						<?php $room_gallerys=json_decode($room_gallery_ids); ?>
						<?php 
if(!empty($room_gallerys)){
for($i=0;$i<count($room_gallerys);$i++){ 
$ima_gallery =get_post_meta ( $room_gallerys[$i], $key = '_wp_attached_file', $single = false );
?>

<div  style='height:70px; width:70px;float: left;border: solid 3px #000;margin: 10px;' id="post_<?php echo $room_gallerys[$i]; ?>">
<img  src="<?php echo site_url().'/wp-content/uploads/'.$ima_gallery[0];  ?>" class="img-responsive">
<div class="uni-upload-de-fix">
<button type="button" href="javascript:;" id="<?php echo $room_gallerys[$i]; ?>" class="delete remove_image"> <i class="fa fa-trash-o" aria-hidden="true"></i>Remove</button></div>
</div>
<?php } } ?>
</div>

</div>
</div>

<?php /* ?>
<div class="row form-group">
<div class="col col-md-3">
<label for="file-input" class=" form-control-label">
Video Upload
</label>
</div>

<div class="col-12 col-md-9">
<input type="file" name="file[]" class="file_multi_video" accept="video/*" class="form-control-file">
<video width="400" controls id="vd" <?php if(empty($phone_image_1[0])){ ?> style="display:none;" <?php } ?> >
  <source src="<?php echo site_url().'/wp-content/uploads/'.$imagelink[0];  ?>" id="video_here">
    Your browser does not support HTML5 video.
</video>
</div>

</div> <?php */ ?>



<div class="row form-group">
<div class="col col-md-3">
<label for="file-input" class=" form-control-label"></label>
</div>
<div class="col-12 col-md-9">
<input type="hidden" name="post_id" id="post_id" value="<?php echo $postID; ?>" />
<button type="submit" class="btn btn-primary btn-sm bt_add">Submit</button>
</div>
</div>
<input type="hidden" id="image_data" name="image_data" value="<?php echo $room_gallery_ids;?>" />
</form>
<img id="loader_img" src="<?php echo plugin_dir_url(''); ?>theme_options/assets/images/loader.gif" style="height: 50px; display: none;" />
<p id="targetLayer" ></p>
</div>
</div>
</div>
</div>		

<form name="upload_files" id="upload_files" action="" method="" >
<input style="opacity:0;" type="file"  name="upload_image[]" id="upload_image"  multiple />
<input type="hidden" id="image_data1" name="image_data1" value="<?php echo $room_gallery_ids;?>" />
<input  id="fileup" style="opacity:0;"  type="submit" value="sub" style="" />
</form>	
		
			
		

	
<script>

var j = jQuery.noConflict();

j(document).on("change", ".file_multi_video", function(input) {
	
	if (this.files && this.files[0]) {
		//alert(1);
	j("#vd").show();
  var jsource = j('#video_here');
  jsource[0].src = URL.createObjectURL(this.files[0]);
	jsource.parent()[0].load(); 
	}else{
		j("#vd").hide();
		jsource[0].src="#";
		jsource.parent()[0].load(); 
	}
});


j(document).ready(function(){
	
j("#upload_files").on('submit',(function(e){
e.preventDefault();
j('#loader_upload_img').show();
j.ajax({
url: "<?php echo plugin_dir_url(''); ?>theme_options/upload_image.php",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(php_script_response){

		var stringified = JSON.stringify(php_script_response);
var obj = JSON.parse(stringified);
	//console.log(php_script_response);
				if(obj.type==0){
				j('#update_pro').html("<span style='color:red;'>"+obj.message+"</span>");
				j('#loader_upload_img').hide();
				}else{
				j('#review_images').append(obj.message);
				j('#image_data').val(obj.message_data);
				j('#image_data1').val(obj.message_data);
				j('#loader_upload_img').hide();
					j("#upload_files")[0].reset()
				//setTimeout(function(){ window.location = "<?php echo get_permalink(); ?>"; }, 3000);
					} 


},
error: function(){} 	        
});
}));
	

 });
 

 
 
 j(document).ready(function(){
	 j('#review_images').on('click', '.remove_image', function() {

		 var remove_image_id = j(this).attr('id');
		 var image_data = j("#image_data").val();
		 j('#loader_upload_img').show();
		   j.ajax({
            type:'POST',
            url:'<?php echo plugin_dir_url(''); ?>theme_options/delete_image.php',
            data:{remove_image_id:remove_image_id,image_data:image_data},
            success:function(html){
					var stringified = JSON.stringify(html);
var obj = JSON.parse(stringified);
	
                j('#post_'+obj.remove_image_id).remove();
                j('#image_data').val(obj.message);
				j('#image_data1').val(obj.message);
				j('#loader_upload_img').hide();
				
            }
        });
		
	});	
	
});


</script>

<script>
	var j = jQuery.noConflict();
j(document).ready(function (e){
j("#addpost").on('submit',(function(e){
e.preventDefault();
	j('#loader_img').show();
j.ajax({
url: "<?php echo plugin_dir_url(''); ?>theme_options/update_listing.php",
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


<script>
/*
j('#upload_image').on('change', function(){
    j("#upload_files").submit();
}); */


function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

	//alert();
    reader.onload = function(e) {
      j('#blah').attr('src', e.target.result);
	  
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }else{
	j('#blah').attr('src', '#');
	j("#blah").hide();
  }
}

j("#thumbimage").change(function() {
	

	j("#blah").show();
  readURL(this);
});



function opengalley(){
	j("#upload_image").click();
}

function  submitFile(){
	j('#fileup').click();
}

</script>