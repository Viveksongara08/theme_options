

			
		<!--<form name="loginform" id="loginform" action="" method=""  >
      <input type="email" id="cusername" class="fadeIn second login_style" name="cusername" placeholder="Email Address">
      <input type="password" id="cpassword" class="fadeIn third login_style" name="cpassword" placeholder="Password">
      <input type="submit" class="fadeIn fourth login_style2" value="Log In">
    </form>-->
	
	
<?php global $smof_data;  ?>	


<div class="page-content--bge5">
<div class="container">
<div class="login-wrap">
<div class="login-content">
<div class="login-logo">

</div>
<div class="login-form">
<form name="loginform" id="loginform" action="" method=""  >
<div class="form-group">
<label>Email Address</label>
<input class="au-input au-input--full" type="email" name="cusername" id="cusername" placeholder="">
</div>
<div class="form-group">
<label>Password</label>
<input class="au-input au-input--full" type="password" name="cpassword" id="cpassword" placeholder="">
</div>
<div class="login-checkbox">
<label>
<input type="checkbox" name="rememberme">Remember Me
</label>
<label>
<a href="<?php echo get_permalink(142); ?>">Forgotten Password?</a>
</label>
</div>
<button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
</form>
<img id="loader_img" src="<?php echo plugin_dir_url(''); ?>theme_options/assets/images/loader.gif" style="height: 50px; display: none;">
<p id="login-modal-password-error" ></p>
<div class="register-link">
<p>
Don't you have account?
<a href="<?php echo get_permalink(14); ?>">Sign Up Here</a>
</p>
</div>
</div>
</div>
</div>
</div>
</div>
			
			