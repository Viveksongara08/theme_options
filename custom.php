<?php 
	global $wpdb, $PasswordHash, $current_user, $user_ID;
	global $smof_data;	
?>

<section id="ts-working-process" class="ts-working-process">


      <div class="container">

         <div class="row">

            <div class="col-md-12">
  <table class="wp-list-table widefat fixed striped table-view-list posts" >
  <tr>
  <th>Name</th>
  <th>Shortcodes</th>
  </tr>
  
  <tr>
  <td>Login Form</td>
  <td>[auth_login_form]</td>
  </tr>
  
    <tr>
  <td>Registration Form</td>
  <td>[auth_registaration_form]</td>
  </tr>
  
    <tr>
  <td>Frogotpassword Form</td>
  <td>[auth_frogotpassword_form]</td>
  </tr>
  
    <tr>
  <td>Resetpassword Form</td>
  <td>[auth_resetpassword_form]</td>
  </tr>
  
    <tr>
  <td>Profile Form</td>
  <td>[auth_profile_form]</td>
  </tr>
  
    <tr>
  <td>Adddeal Form</td>
  <td>[auth_add_deals_form]</td>
  </tr>
  
    <tr>
  <td>Editdeal Form</td>
  <td>[auth_edit_deals_form]</td>
  </tr>
  
    <tr>
  <td>Deallisting</td>
  <td>[auth_deal_listing]</td>
  </tr>
  
  </table>
	 
	     </div>

         </div>
<?php 
$generalsettings = get_option('generalsettings');
$homesettings = get_option('homesettings');
$emailssettings = get_option('emailssettings');
$footersettings = get_option('footersettings');
$socialsharing = get_option('socialsharing');
?>
<div class="row">
 <div class="col-md-12">
 <?php     print "<h1>Theme option setting</h1>"; ?>
  <table class="wp-list-table widefat fixed striped table-view-list posts" >
  <tr>
  <th>General Settings </th>
  <td><input <?php if($generalsettings==1){ echo"checked"; } ?> type="checkbox" name="generalsettings" id="generalsettings" /></td>
  </tr>
   <tr>
  <th>Home Settings</th>
  <td><input <?php if($homesettings==1){ echo"checked"; } ?> type="checkbox" name="homesettings" id="homesettings"  /></td>
  </tr>
   <tr>
  <th>Emails Settings</th>
  <td><input <?php if($emailssettings==1){ echo"checked"; } ?> type="checkbox" name="emailssettings" id="emailssettings"  /></td>
  </tr>
   <tr>
  <th>Footer Settings</th>
  <td><input <?php if($footersettings==1){ echo"checked"; } ?> type="checkbox" name="footersettings" id="footersettings" /></td>
  </tr>
   <tr>
  <th>Social Sharing Settings</th>
  <td><input <?php if($socialsharing==1){ echo"checked"; } ?> type="checkbox" name="socialsharing" id="socialsharing"  /></td>
  </tr>
  </table>
</div>		 
     </section>
	 
	 <script>
	 var j = jQuery.noConflict();
	 j("#generalsettings").on('change', function() {
		 if(j('#generalsettings').is(':checked')) {
			 
			    j.ajax({
            type:'POST',
            url:'<?php echo plugin_dir_url(''); ?>theme_options/optionsetting.php',
            data:{generalsettings:1},
            success:function(html){
				
            }
        });
		 }else{
			    j.ajax({
            type:'POST',
            url:'<?php echo plugin_dir_url(''); ?>theme_options/optionsetting.php',
            data:{generalsettings:0},
            success:function(html){
				
            }
        });
		 } 
      });
	  
	  
	   j("#homesettings").on('change', function() {
		 if(j('#homesettings').is(':checked')) {
			 
			    j.ajax({
            type:'POST',
            url:'<?php echo plugin_dir_url(''); ?>theme_options/optionsetting.php',
            data:{homesettings:1},
            success:function(html){
				
            }
        });
		 }else{
			    j.ajax({
            type:'POST',
            url:'<?php echo plugin_dir_url(''); ?>theme_options/optionsetting.php',
            data:{homesettings:0},
            success:function(html){
				
            }
        });
		 } 
      });
	  
	  
	  j("#emailssettings").on('change', function() {
		 if(j('#emailssettings').is(':checked')) {
			 
			    j.ajax({
            type:'POST',
            url:'<?php echo plugin_dir_url(''); ?>theme_options/optionsetting.php',
            data:{emailssettings:1},
            success:function(html){
				
            }
        });
		 }else{
			    j.ajax({
            type:'POST',
            url:'<?php echo plugin_dir_url(''); ?>theme_options/optionsetting.php',
            data:{emailssettings:0},
            success:function(html){
				
            }
        });
		 } 
      });
	  
	    j("#footersettings").on('change', function() {
		 if(j('#footersettings').is(':checked')) {
			 
			    j.ajax({
            type:'POST',
            url:'<?php echo plugin_dir_url(''); ?>theme_options/optionsetting.php',
            data:{footersettings:1},
            success:function(html){
				
            }
        });
		 }else{
			    j.ajax({
            type:'POST',
            url:'<?php echo plugin_dir_url(''); ?>theme_options/optionsetting.php',
            data:{footersettings:0},
            success:function(html){
				
            }
        });
		 } 
      });
	  
	  j("#socialsharing").on('change', function() {
		 if(j('#socialsharing').is(':checked')) {
			 
			    j.ajax({
            type:'POST',
            url:'<?php echo plugin_dir_url(''); ?>theme_options/optionsetting.php',
            data:{socialsharing:1},
            success:function(html){
				
            }
        });
		 }else{
			    j.ajax({
            type:'POST',
            url:'<?php echo plugin_dir_url(''); ?>theme_options/optionsetting.php',
            data:{socialsharing:0},
            success:function(html){
				
            }
        });
		 } 
      });
	  
	 
	 </script>