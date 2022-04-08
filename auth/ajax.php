<?php 
require_once("../../../wp-load.php");
	$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;


//echo"<pre>";print_r($_REQUEST);exit;

$category_id = $_REQUEST["pcat"];
$taxonomy1 = 'category';
$orderby1 = 'id';
$show_count1 = 0; // 1 for yes, 0 for no
$pad_counts1 = 0; // 1 for yes, 0 for no
$hierarchical1 = 1; // 1 for yes, 0 for no
$title1 = '';
$empty1 = 0;

$args1 = array(
'taxonomy' => $taxonomy1,
'orderby' => $orderby1,
'show_count' => $show_count1,
'parent' => $category_id,
'pad_counts' => $pad_counts1,
'hierarchical' => $hierarchical1,
'title_li' => $title1,
'hide_empty' => $empty1
);
$all_categories1 = get_categories( $args1 );

//print_r($all_categories1);
?>
<p>Sub Category</p>
<?php 
if(!empty($all_categories1)){
    foreach ($all_categories1 as $cat)
		{

		?>
<label><input value="<?php echo $cat->term_id;  ?>" name="ccta" id="ccat_<?php echo $cat->term_id;  ?>" type="radio"  />
		<?php echo $cat->name;  ?></label>
		<br/>

		<?php 
        }			
	
}



 ?>