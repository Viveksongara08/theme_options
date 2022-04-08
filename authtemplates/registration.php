


<div class="page-content--bge5">
<div class="container">
<div class="login-wrap">
<div class="login-content">
<div class="login-logo">
<a href="<?php echo site_url(); ?>">
<img src="<?php echo $smof_data["rnr_upload_logo_mobile_rg"]; ?>" alt="">
</a>
</div>
<div class="login-form">
<form name="register" id="register" action="" method="" >
<div class="form-group">
<label>Username</label>
<input class="au-input au-input--full" type="text" name="username" id="username">
</div>
<div class="form-group">
<label>Email Address</label>
<input class="au-input au-input--full" type="email" name="emailaddress" id="emailaddress"  >
</div>
<div class="form-group">
<label>Password</label>
<input class="au-input au-input--full" type="password" name="password" id="password" >
</div>
<div class="login-checkbox">
</div>
<input type="hidden" name="usertype" id="usertype" value='2' />
<button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
</form>
<img id="loader_img" src="<?php echo plugin_dir_url(''); ?>theme_options/assets/images/loader.gif" style="height: 50px; display: none;">
<p id="message" ></p>
<div class="register-link">
<p>
Already have account?
<a href="<?php echo get_permalink(183); ?>">Sign In</a>
</p>
</div>
</div>
</div>
</div>
</div>
</div>
