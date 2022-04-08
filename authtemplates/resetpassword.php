
	
<?php 
$encodedUrl=$_REQUEST["poiuytrewd"];
$email=urldecode($encodedUrl);
?>	

<div class="page-wrapper">
<div class="page-content--bge5">
<div class="container">
<div class="login-wrap">
<div class="login-content">
<div class="login-logo">
<a href="<?php echo site_url(); ?>">
<img src="<?php echo $smof_data["rnr_upload_logo_mobile"]; ?>" alt="">
</a>
</div>
<div class="login-form">
<form name="resetpassword" id="resetpassword" method="post" method="post">
<div class="form-group">
<label>Password</label>
<input class="au-input au-input--full" type="password" name="passwordvv" id="passwordvv" placeholder="">
</div>
<div class="form-group">
<label>Confirm Password</label>
<input class="au-input au-input--full" type="password" name="cpasswordvv" id="cpasswordvv" placeholder="">
</div>
<input type="hidden" id="wedl" name="wedl" value="<?php echo $email; ?>" />
<button class="au-btn au-btn--block au-btn--green m-b-20" name="reset" id="reset" type="submit">Reset Password</button>
</form>
<img id="loader_img" src="<?php echo plugin_dir_url(''); ?>theme_options/assets/images/loader.gif" style="height: 50px; display: none;">
<p id="confirm_password_error" ></p>	
</div>
</div>
</div>
</div>
</div>
</div>			
