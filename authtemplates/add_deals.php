
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header">
<strong>Create </strong> Blog
</div>
<div class="card-body card-block">
<form action="#" method="post" name="addpost" id="addpost" enctype="multipart/form-data" class="form-horizontal">
<div class="row form-group">
<div class="col col-md-3">
<label for="text-input" class=" form-control-label">Title</label>
</div>
<div class="col-12 col-md-9">
<input type="text" name="post_title" id="post_title"  class="form-control">
</div>
</div>

<div class="row form-group">
<div class="col col-md-3">
<label for="textarea-input" class=" form-control-label">Description</label>
</div>
<div class="col-12 col-md-9">
<textarea name="post_description" id="post_description" rows="9" class="form-control"></textarea>
</div>
</div>


<div class="row form-group">
<div class="col col-md-3">
<label for="textarea-input" class=" form-control-label">Price</label>
</div>
<div class="col-12 col-md-9">
<input type="text" name="post_price" id="post_price"  class="form-control">
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
<input type="checkbox" value="<?php echo $cat->term_id;  ?>" name="pcta[]" id="cat_<?php echo $cat->term_id;  ?>"  class="form-check-input">
<?php echo $cat->name;  ?>
</label>
	<?php } } ?>

</div>
</div>
</div>

<?php /* ?> <div class="row form-group">
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
<input type="checkbox" name="ptag[]" id="ptag_<?php echo $tag->slug; ?>" value="<?php echo $tag->slug;  ?>"  class="form-check-input">
<?php echo $tag->name;  ?>
</label>
<?php 
}	
}
?>
</div>
</div>
</div>
 <?php */ ?>




<div class="row form-group">
<div class="col col-md-3">
<label for="file-input" class=" form-control-label">
Image Upload
</label>
</div>
<div class="col-12 col-md-9">
<input type="file" name="thumbimage[]" id="thumbimage" accept="image/*"  class="form-control-file">
<img id="blah" style="height:70px; width:70px;display:none;border: solid 3px #000;margin: 10px;" src="#" />

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

<div id="review_images" >
</div>
</div>
</div>



<div class="row form-group">
<div class="col col-md-3">
<label for="file-input" class=" form-control-label">
Video Upload
</label>
</div>
<div class="col-12 col-md-9">
<input type="file" name="file[]" class="file_multi_video" accept="video/*" class="form-control-file">
<video width="400" controls id="vd" style="display:none;" >
  <source src="#" id="video_here">
    Your browser does not support HTML5 video.
</video>
</div>
</div>



<div class="row form-group">
<div class="col col-md-3">
<label for="file-input" class=" form-control-label"></label>
</div>
<div class="col-12 col-md-9">
<button type="submit" class="btn btn-primary btn-sm bt_add">Submit</button>
</div>
</div>
<input type="hidden" id="image_data" name="image_data" value="" />
</form>
<img id="loader_img" src="<?php echo plugin_dir_url(''); ?>theme_options/assets/images/loader.gif" style="height: 50px; display: none;">
<p id="targetLayer" ></p>


<form name="upload_files" id="upload_files" action="" method="" >

<input style="opacity:0;"  type="file"  name="upload_image[]" id="upload_image" multiple />
<input type="hidden" id="image_data1" name="image_data1" value="" />
<input id="fileup" style="opacity:0;" type="submit" value="sub" style="" />
</form>
	 
</div>
</div>
</div>
</div>
	
		
			

<script>

var j = jQuery.noConflict();
j(document).on("change", ".file_multi_video", function(evt) {
	
  j("#vd").show();
  var $source = j('#video_here');
  jsource[0].src = URL.createObjectURL(this.files[0]);
  jsource.parent()[0].load();
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
	console.log(php_script_response);
	var obj =j.parseJSON(php_script_response);
	
				if(obj.type==0){
				j('#update_pro').html("<span style='color:red;'>"+obj.message+"</span>");
				j('#loader_upload_img').hide();
				}else{
				j('#review_images').append(obj.message);
				j('#image_data').val(obj.message_data);
				j('#image_data1').val(obj.message_data);
				j('#loader_upload_img').hide();
				//setTimeout(function(){ window.location = "<?php echo get_permalink(); ?>"; }, 3000);
				j("#upload_files")[0].reset()
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
	
		var obj =j.parseJSON(html);
		
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

var post_title=j("#post_title").val();
if(post_title==""){
	    j("#post_title").addClass('error');
}else{	
j('#loader_img').show();	
j.ajax({
url: "<?php echo plugin_dir_url(''); ?>theme_options/add_listing.php",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){
		var stringified = JSON.stringify(data);
var obj = JSON.parse(stringified);
var obj =j.parseJSON(data);
	
				if(obj.type==0){
				j('#targetLayer').html("<span style='color:red;'>"+obj.message+"</span>");
				j('#loader_img').hide();
				}else{
				j('#targetLayer').html("<span style='color:green;'>"+obj.message+"</span>");
				j('#loader_img').hide();
				 setTimeout(function(){ window.location = "<?php echo get_permalink() ?>"; }, 3000); 		
					} 
},
error: function(){} 	        
});

}

}));
});
</script>

<script>
/*
j('#upload_image').on('change', function(){
    j("#upload_files").submit();
});
*/

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
