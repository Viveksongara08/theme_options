<?php 
add_action( 'wp_footer', 'my_footer_scripts' );
function my_footer_scripts(){
?>

<style>
.error{
    border: solid 1px #FF0000;
}
</style>
<script>
// login 

var j = jQuery.noConflict();
j(document).ready(function(){
	
});

var j = jQuery.noConflict();
j(document).ready(function(){

j("#loginform").on('submit',(function(e){	
e.preventDefault();

var cusername=j("#cusername").val();
var cpassword=j("#cpassword").val();
 var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

if(cusername==""){
	j("#cusername").addClass("error");
}else if(!pattern.test(cusername)){
	j("#cusername").addClass("error");
	
}else if(cpassword==""){
j("#cpassword").addClass("error");
j("#cusername").removeClass("error");
}else{
	j(".email-tip").hide();
	j(".password-tip").hide();
	j('#loader_img').show();
	    j.ajax({
                url: '<?php echo plugin_dir_url(''); ?>theme_options/login.php', // point to server-side PHP script 
                dataType: 'json',  // what to expect back from the PHP script, if anything
                data:j('#loginform').serialize(),                         
                type: 'post',
                success: function(php_script_response){
				//var obj =JSON.parse(php_script_response);
				
				
				
				var stringified = JSON.stringify(php_script_response);
var obj = JSON.parse(stringified);

				
				if(obj.type==0){
				j('#login-modal-password-error').html("<span style='color:red;'>"+obj.message+"</span>");
				j('#loader_img').hide();
				j(".password-tip").show();
				}else{
				j('#login-modal-password-error').html("<span style='color:green;'>"+obj.message+"</span>");
				j('#loader_img').hide();
				j(".password-tip").show();
				 setTimeout(function(){ window.location = "<?php echo get_permalink(614); ?>"; }, 3000);
				}

  }
   });
}


}));


j("#loginform1").on('submit',(function(e){	
e.preventDefault();

var cusername=j("#cusername").val();
var cpassword=j("#cpassword").val();
 var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

if(cusername==""){
	j("#cusername").addClass("error");
}else if(!pattern.test(cusername)){
	j("#cusername").addClass("error");
	
}else if(cpassword==""){
j("#cpassword").addClass("error");
j("#cusername").removeClass("error");
}else{
	j(".email-tip").hide();
	j(".password-tip").hide();
	j('#loader_img').show();
	    j.ajax({
                url: '<?php echo plugin_dir_url(''); ?>theme_options/login.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                data:j('#loginform1').serialize(),                         
                type: 'post',
                success: function(php_script_response){
							var stringified = JSON.stringify(php_script_response);
var obj = JSON.parse(stringified);
				if(obj.type==0){
				j('#login-modal-password-error').html("<span style='color:red;'>"+obj.message+"</span>");
				j('#loader_img').hide();
				j(".password-tip").show();
				}else{
				j('#login-modal-password-error').html("<span style='color:green;'>"+obj.message+"</span>");
				j('#loader_img').hide();
				j(".password-tip").show();
				 setTimeout(function(){ window.location = ""; }, 3000);
				}

  }
   });
}


}));	
	
});

// login end



//registration 
var j = jQuery.noConflict();
j(document).ready(function(){

j("#register").on('submit',(function(e){	
e.preventDefault();

 var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

var emailaddress=j("#emailaddress").val();
var username=j("#username").val();
var password=j("#password").val();

if(username==""){
    j("#username").addClass('error');
	j("#emailaddress").removeClass("error");
	
}else if(emailaddress==""){
	j("#emailaddress").addClass('error');
	
}else if(!pattern.test(emailaddress)){
	j("#emailaddress").addClass('error');

		
}else if(password==""){
	j("#password").addClass('error');
	j("#emailaddress").removeClass("error");
	j("#username").removeClass("error");
}else{
	j('#loader_img').show();
	j("#password").removeClass('error');
	j("#username").removeClass("error");
	j("#emailaddress").removeClass('error');
	    j.ajax({
                url: '<?php echo plugin_dir_url(''); ?>theme_options/registration.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                data:j('#register').serialize(),                         
                type: 'post',
                success: function(php_script_response){
					//console.log(php_script_response);
							var stringified = JSON.stringify(php_script_response);
var obj = JSON.parse(stringified);
				if(obj.type==0){
				j('#message').html("<span style='color:red;'>"+obj.message+"</span>");
				j('#loader_img').hide();
				}else{
				j('#message').html("<span style='color:green;'>"+obj.message+"</span>");
				j('#loader_img').hide();
				//setTimeout(function(){ window.location = "<?php echo get_permalink(614); ?>"; }, 3000);
					}

  }
   });
}


}));
	
	
});
// registration end

/*
function openfile(){
	j( "#ap_form_post_image" ).trigger( "click" );
}

function previewImages() {
	
  var jpreview = j('#preview1').empty();
  j('#thumb1').hide();
  if (this.files) j.each(this.files, readAndPreview);

  function readAndPreview(i, file) {
    
    if (!/\.(jpe?g|png|gif)j/i.test(file.name)){
      return alert(file.name +" is not an image");
    } // else...
    
    var reader = new FileReader();

    j(reader).on("load", function() {
      jpreview.append(j("<img />", {src:this.result, height:62}));
    });

    reader.readAsDataURL(file);
    
  }

}

j('#ap_form_post_image').on("change", previewImages); */

// update profile
j(document).ready(function (e){
j("#uploadForm").on('submit',(function(e){
e.preventDefault();
 var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

var username=j("#username").val();
var email=j("#email").val();
var description=j("#description").val();
var password=j("#password").val();
var confirm_password=j("#confirm_password").val();


//alert(lastname);

if(username==""){
	    j("#username").addClass('error');
		
}else if(email==""){
	 j("#email").addClass('error');
	 j("#username").removeClass('error');
	
			
}else if(!pattern.test(email)){
	j("#email").addClass('error');
	j("#username").removeClass('error');

}else if(description==""){
	
	j("#description").addClass('error');
	j("#email").removeClass('error');
	
}else if(password!=confirm_password){
	j("#password").addClass('error'); 
	j("#confirm_password").addClass('error'); 
	
}else{

j('#loader_img').show();
j("#password").removeClass('error');
j("#confirm_password").removeClass('error');

j.ajax({
url: "<?php echo plugin_dir_url(''); ?>theme_options/update_user.php",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(php_script_response){
				var stringified = JSON.stringify(php_script_response);
var obj = JSON.parse(stringified);
				if(obj.type==0){
				j('#update_pro').html("<span style='color:red;'>"+obj.message+"</span>");
				j('#loader_img').hide();
				}else{
				j('#update_pro').html("<span style='color:green;'>"+obj.message+"</span>");
				j('#loader_img').hide();
				setTimeout(function(){ window.location = ""; }, 3000);
					}


},
error: function(){} 	        
});

}

}));
});

// end update profile



// add to compare

function AddtoCompare(cId,sId){
	
   j.ajax({
            type:'POST',
            url:'<?php echo plugin_dir_url(''); ?>theme_options/ajax_compare.php',
            data:{compare_post_id:cId,session_id:sId},
            success:function(html){
				var obj =j.parseJSON(html);
	
                j('#post_'+obj.post_id).text(obj.btn_text);
                j('#remove_post_'+obj.post_id).remove();
				j('.number-item').text(obj.count);
               
				
				
            }
        });
	
}

// End compare


j(document).ready(function(){
j("#OfferForm").on('submit',(function(e){
e.preventDefault();
  var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

var fname=j("#fname").val();
var lname=j("#lname").val();
var emailaddress=j("#emailaddress").val();
var phonenmuber=j("#phonenmuber").val();
var message=j("#message").val();
var price=j("#price").val();
var city=j("#city").val();

var country=j("#country").val();
var state=j("#state").val();
var zipcode=j("#zipcode").val();

if(fname==""){
	j("#fname").addClass('error');
}else if(lname==""){
	j("#lname").addClass('error');
	j("#fname").removeClass('error');
}else if(emailaddress==""){
	j("#emailaddress").addClass('error');
	j("#fname").removeClass('error');
	j("#lname").removeClass('error');
}else if(phonenmuber==""){
	j("#phonenmuber").addClass('error');
	j("#emailaddress").removeClass('error');
	j("#fname").removeClass('error');
	j("#lname").removeClass('error');

}else if(country==""){
	j("#country").addClass('error');
	j("#phonenmuber").removeClass('error');

}else if(state==""){
	j("#state").addClass('error');
	j("#country").removeClass('error');
	
}else if(city==""){
	j("#city").addClass('error');
	j("#state").removeClass('error');
	
}else if(price==""){
	j("#price").addClass('error');
	j("#phonenmuber").removeClass('error');
	j("#emailaddress").removeClass('error');
	j("#fname").removeClass('error');
	j("#lname").removeClass('error');
	j("#city").removeClass('error');

}else if(zipcode==""){
	j("#zipcode").addClass('error');
	j("#price").removeClass('error');
	
}else if(message==""){
	j("#message").addClass('error');
	j("#phonenmuber").removeClass('error');
	j("#emailaddress").removeClass('error');
	j("#fname").removeClass('error');
	j("#lname").removeClass('error');
   j("#price").removeClass('error');	

}else{
	j("#message").removeClass('error');
	j("#loader_img").show();
		    j.ajax({
                url: '<?php echo plugin_dir_url(''); ?>theme_options/addoffre.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                data:j('#OfferForm').serialize(),                         
                type: 'post',
                success: function(php_script_response){
					//console.log(php_script_response);
							var stringified = JSON.stringify(php_script_response);
var obj = JSON.parse(stringified);
				if(obj.type==0){
					j("#loader_img").hide();
				j('#offermsg').html("<span style='color:red;'>"+obj.message+"</span>");
								}else{
				j("#loader_img").hide();
				j('#offermsg').html("<span style='color:green;'>"+obj.message+"</span>");
				 setTimeout(function(){ window.location = ""; }, 3000) 		
					}

  }
   });
	
	
}


}));	
});

j(document).ready(function(){

j("#forgetpassword").on('submit',(function(e){
e.preventDefault();
  var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

var forgetemail=j("#forgetemail").val();
 
 
if(forgetemail==""){
	j("#forgetemail").addClass('error');
	//j("#city").removeClass('error');

}else if(!pattern.test(forgetemail)){
	j("#forgetemail").addClass('error');
}else{
	j('#loader_img').show();
	j("#forgetemail").removeClass('error');
	  e.preventDefault();
	    j.ajax({
                url: '<?php echo plugin_dir_url(''); ?>theme_options/forgetpassword.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                data:j('#forgetpassword').serialize(),                         
                type: 'post',
                success: function(php_script_response){
					//console.log(php_script_response);
							var stringified = JSON.stringify(php_script_response);
var obj = JSON.parse(stringified);
				if(obj.type==0){
				j('#forgot_error').html("<span style='color:red;'>"+obj.message+"</span>");
				j('#loader_img').hide();
				j(".email-tip").show();
				}else{
				j('#forgot_error').html("<span style='color:green;'>"+obj.message+"</span>");
				j('#loader_img').hide();
				j(".email-tip").show();
				// setTimeout(function(){ window.location = "<?php echo get_permalink(239); ?>"; }, 3000) 		
					}

  }
   });
}


}));	
	
	
});


var j = jQuery.noConflict();
j(document).ready(function(){

	
j("#resetpassword").on('submit',(function(e){
 e.preventDefault();
 var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

var passwordvv=j("#passwordvv").val();
var cpasswordvv=j("#cpasswordvv").val();

 
if(passwordvv==""){
	j("#passwordvv").addClass('error');
	
}else if(cpasswordvv==""){
		j("#cpasswordvv").addClass('error');
		j("#passwordvv").removeClass('error');
		
}else if(passwordvv!=cpasswordvv){
	j("#cpasswordvv").addClass('error');

}else{
	j("#cpasswordvv").removeClass('error');
	j('#loader_img').show();
	  e.preventDefault();
	    j.ajax({
                url: '<?php echo plugin_dir_url(''); ?>theme_options/resetpass.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                data:j('#resetpassword').serialize(),                         
                type: 'post',
                success: function(php_script_response){
					console.log(php_script_response);
								var stringified = JSON.stringify(php_script_response);
var obj = JSON.parse(stringified);
				if(obj.type==0){
				j('#confirm_password_error').html("<span style='color:red;'>"+obj.message+"</span>");
				j('#loader_img').hide();
				}else{
				j('#confirm_password_error').html("<span style='color:green;'>"+obj.message+"</span>");
				j('#loader_img').hide();
				 setTimeout(function(){ window.location = "<?php echo site_url(); ?>"; }, 3000); 		
					}

  }
   });
}


}));	
	
	
});



</script>
<?php
}
 ?>