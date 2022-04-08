<?php 

$current_id=get_current_user_id();
$userdata=get_userdata($current_id );

$Fname = get_user_meta($current_id, 'first_name', true);
$lname = get_user_meta($current_id, 'last_name', true);
$phone_number = get_user_meta($current_id, 'phone_number', true);
$description = get_user_meta($current_id, 'description', true);
$email=$userdata->user_email; 
$username=$userdata->user_login; 

$avatar_id = get_user_meta($current_id, 'wp_user_avatar', true);
$imagelink =get_post_meta ( $avatar_id, $key = '_wp_attached_file', $single = false );

?>



<div class="row">

<div class="col-lg-12">
<div class="card">
<div class="card-header">
<strong>Edit </strong> Profile
</div>
<div class="card-body card-block">
<form action="#" method="post" id="uploadForm" name="uploadForm" enctype="multipart/form-data" class="form-horizontal">

<div class="row form-group">
<div class="col col-md-3">
<label for="text-input" class=" form-control-label">Name</label>
</div>
<div class="col-12 col-md-5">
<input readonly type="text" id="username"  name="username" class="form-control" value="<?php echo $username; ?>" >
</div>
</div>

<div class="row form-group">
<div class="col col-md-3">
<label for="text-input" class=" form-control-label">Email</label>
</div>
<div class="col-12 col-md-5">
<input type="text" id="email" name="email" class="form-control" value="<?php echo $email; ?>" >
</div>
</div>

<div class="row form-group">
<div class="col col-md-3">
<label for="textarea-input" class=" form-control-label">Description</label>
</div>
<div class="col-12 col-md-9">
<textarea name="description" id="description" rows="9" class="form-control"><?php echo $description; ?></textarea>
</div>
</div>

<div class="row form-group">
<div class="col col-md-3">
<label for="text-input" class=" form-control-label">Password</label>
</div>
<div class="col-12 col-md-5">
<input type="text" id="password" name="password" class="form-control">
</div>
</div>

<div class="row form-group">
<div class="col col-md-3">
<label for="text-input" class=" form-control-label">Confirm Password</label>
</div>
<div class="col-12 col-md-5">
<input type="text" id="confirm_password" name="confirm_password" class="form-control">
</div>
</div>

<div class="row form-group">
<div class="col col-md-3">
<label for="file-input" class=" form-control-label">Change Profile Image</label>
</div>
<div class="col-12 col-md-9 change_blog">
<?php if(!empty($imagelink)){ ?>
<img id="blah" class="img-fluid" src="<?php echo site_url().'/wp-content/uploads/'.$imagelink[0];  ?>" alt="" />
<?php }else{ ?>
<img id="blah" class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/tel/profile.png" alt="" />
<?php } ?>
<input type="file" id="ap_form_post_image" name="ap_form_post_image" class="form-control-file">
</div>
</div>

<div class="row form-group">
<div class="col col-md-3">
<label for="file-input" class=" form-control-label"></label>
</div>
<div class="col-12 col-md-9">
<input type="hidden" name="user_id" name="user_id" value="<?php echo $current_id; ?>"  />
<button type="submit" class="btn btn-primary btn-sm bt_add">Update</button>
</div>
</div>
</form>
<img id="loader_img" src="<?php echo plugin_dir_url(''); ?>theme_options/assets/images/loader.gif" style="height: 50px; display: none;">
<p id="update_pro" ></p>
</div>
</div>
</div>

</div>




<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

	//alert();
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
	  
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }else{
	$('#blah').attr('src', '#');
	$("#blah").hide();
  }
}

$("#ap_form_post_image").change(function() {
	$("#blah").show();
  readURL(this);
});
</script>
