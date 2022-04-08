
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
<form action="#" name="forgetpassword" id="forgetpassword" method="post">
<div class="form-group">
<label>Email Address</label>
<input class="au-input au-input--full" type="email" name="forgetemail" id="forgetemail" placeholder="Email">
</div>
<button class="au-btn au-btn--block au-btn--green m-b-20" name="forget" id="forget" type="submit">submit</button>
</form>
<img id="loader_img" src="<?php echo plugin_dir_url(''); ?>theme_options/assets/images/loader.gif" style="height: 50px; display: none;">
<p id="forgot_error" ></p>
</div>
</div>
</div>
</div>
</div>
</div>


			