<?php
/**
 * Theme options plugin for use for theme options
 * Take this as a base plugin and modify as per your need.
 *
 * @package Theme options
 * @author vivek songara
 * @license GPL-2.0+
 * @link http://expertwebinfotech.com
 * @copyright 2019 Vivek songara, LLC. All rights reserved.
 *
 *            @wordpress-plugin
 *            Plugin Name: Theme options
 *            Plugin URI: http://expertwebinfotech.com
 *            Description: Theme Options Plugin
 *            Version: 3.1
 *            Author: Vivek Songara
 *            Author URI: 
 *            Text Domain: Theme options
 *            Contributors: Vivek Songara
 *            License: GPL-2.0+
 *            License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
 
/**
 * Adding Album Gallery Setting Menu
 *
 * @since 1.0
 */
 
 
 //*************//Theme options//***************//
function AddThemeOptions(){
global $smof_data;
define('RNR_FUNCTIONS', plugin_dir_path(__FILE__)  . '/includes');
require_once ('admin/index.php');
add_theme_support( 'post-formats', array('gallery', 'link', 'quote', 'audio', 'video')); 
define( 'RWMB_URL', trailingslashit( plugin_dir_path(__FILE__)  . '/includes/metaboxes' ) );
define( 'RWMB_DIR', trailingslashit( plugin_dir_path(__FILE__)  . '/includes/metaboxes' ) );
require_once RWMB_DIR . 'meta-box.php';
include_once RNR_FUNCTIONS.'/metaboxes.php';
//include_once(RNR_FUNCTIONS.'/post_testimonial.php');
//include_once(RNR_FUNCTIONS.'/post_profile.php');
//include_once(RNR_FUNCTIONS.'/post_coffee_price.php');
//include_once(RNR_FUNCTIONS.'/post_icons.php');
//include_once(RNR_FUNCTIONS.'/post_how_it_work.php');
//include_once(RNR_FUNCTIONS.'/post_year.php');
//include_once(RNR_FUNCTIONS.'/post_make.php');
//include_once(RNR_FUNCTIONS.'/post_model.php');
//include_once(RNR_FUNCTIONS.'/post_body_style.php');
//include_once(RNR_FUNCTIONS.'/post_transmission.php');
//include_once(RNR_FUNCTIONS.'/post_exterior_color.php');
//include_once(RNR_FUNCTIONS.'/post_interior_color.php');
//include_once(RNR_FUNCTIONS.'/post_fuel_type.php');
//include_once(RNR_FUNCTIONS.'/post_car_features.php');
//include_once(RNR_FUNCTIONS.'/post_seats.php');
//include_once(RNR_FUNCTIONS.'/post_safety.php');
//include_once(RNR_FUNCTIONS.'/post_windows.php');
//include_once(RNR_FUNCTIONS.'/post_entertainment.php');
//include_once(RNR_FUNCTIONS.'/post_health.php');
//include_once(RNR_FUNCTIONS.'/post_housing.php');
//include_once(RNR_FUNCTIONS.'/post_veteran.php');
//include_once(RNR_FUNCTIONS.'/post_employment.php');
//include_once(RNR_FUNCTIONS.'/post_education.php');
//include_once(RNR_FUNCTIONS.'/post_governement.php');
//include_once(RNR_FUNCTIONS.'/post_legal.php');
//include_once(RNR_FUNCTIONS.'/post_unique.php');
//include_once(RNR_FUNCTIONS.'/post_never.php');
//include_once(RNR_FUNCTIONS.'/post_other_areas.php');
//include_once(RNR_FUNCTIONS.'/post_shortcourse.php');
//include_once(RNR_FUNCTIONS.'/post_freecourse.php');
include_once(RNR_FUNCTIONS.'/post_slider.php');
//include_once(RNR_FUNCTIONS.'/post_company_logo.php');
//include_once(RNR_FUNCTIONS.'/post_offers.php');
//include_once(RNR_FUNCTIONS.'/post_payment.php');

}
add_action( 'after_setup_theme', 'AddThemeOptions' );

 if ( get_option( 'users_can_register' ) ) {
add_action( 'admin_menu', 'wpse_91693_register' );
 }
function wpse_91693_register()
{
    add_menu_page(
        'Auth setting',     // page title
        'Auth setting',     // menu title
        'manage_options',   // capability
        'auth-setting',     // menu slug
        'wpse_91693_render' // callback function
    );
}
function wpse_91693_render()
{
    global $title;

    print '<div class="wrap">';
    print "<h1>$title</h1>";

    //$file = plugin_dir_path( __FILE__ ) . "custom.php";
	include('custom.php');

  //  if ( file_exists( $file ) )
       // require $file;

   // print "<p class='description'>Included from <code>$file</code></p>";

    print '</div>';
}
 
 
// ********* // Login Shortcode [auth_login_form] // ******** //
function auth_login_form_shortcode() {
	ob_start(); 
	global $post;

include('authtemplates/login.php');
return ob_get_clean();
}
add_shortcode( 'auth_login_form', 'auth_login_form_shortcode' );

// ********* // Registration Shortcode [auth_registaration_form] // ******** //
function auth_registration_form_shortcode() {
	ob_start(); 
	global $post;

include('authtemplates/registration.php');
return ob_get_clean();
}
add_shortcode( 'auth_registaration_form', 'auth_registration_form_shortcode' );


// ********* // Frogotpassword Shortcode [auth_frogotpassword_form] // ******** //
function auth_frogotpassword_form_shortcode() {
	ob_start(); 
	global $post;

include('authtemplates/frogotpassword.php');
return ob_get_clean();
}
add_shortcode( 'auth_frogotpassword_form', 'auth_frogotpassword_form_shortcode' );


// ********* // Resetpassword Shortcode [auth_resetpassword_form] // ******** //
function auth_resetpassword_form_shortcode() {
	ob_start(); 
	global $post;

include('authtemplates/resetpassword.php');
return ob_get_clean();
}
add_shortcode( 'auth_resetpassword_form', 'auth_resetpassword_form_shortcode' );


// ********* // Profile Shortcode [auth_profile_form] // ******** //
function auth_profile_form_shortcode() {
	ob_start(); 
	global $post;

include('authtemplates/profile.php');
return ob_get_clean();
}
add_shortcode( 'auth_profile_form', 'auth_profile_form_shortcode' );


// ********* // Adddeal Shortcode [auth_add_deals_form] // ******** //

function auth_add_deals_form_shortcode() {
	ob_start(); 
	global $post;

include('authtemplates/add_deals.php');
return ob_get_clean();
}
add_shortcode( 'auth_add_deals_form', 'auth_add_deals_form_shortcode' );



// ********* // Editdeal Shortcode [auth_edit_deals_form] // ******** //

function auth_edit_deals_form_shortcode() {
	ob_start(); 
	global $post;

include('authtemplates/edit_deals.php');
return ob_get_clean();
}
add_shortcode( 'auth_edit_deals_form', 'auth_edit_deals_form_shortcode' );


// ********* // Deallisting Shortcode [auth_deal_listing] // ******** //

function auth_deal_listing_shortcode() {
	ob_start(); 
	global $post;

include('authtemplates/deal_listing.php');
return ob_get_clean();
}
add_shortcode( 'auth_deal_listing', 'auth_deal_listing_shortcode' );


include('custom-js.php');
