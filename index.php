<?php
/*
 * Plugin Name: Registration Plugin 
 * Description: A simple WordPress plugin that allows user to create account and login 
 * Version: 1.0
 * Author: Rajarshi
 * Author URI: https://rajarshi.com
 * Text Domain: recipe
 */

define( 'RECIPE_PLUGIN_URL', __FILE__ );

if( !function_exists( 'add_action' ) ){
    echo "Hi there! I'm just a plugin, not much I can do when called directly.";
    exit;
}

// Includes 

include( 'includes/front/enqueue.php' );
include( 'includes/shortcodes/auth-form.php' );
include( 'process/create-account.php' );
include( 'process/login.php' );
include( 'includes/front/logout-link.php' );

// Hooks 
add_action( 'wp_enqueue_scripts', 'r_enqueue_scripts', 100 );
//  file is in process/create-account.php .This file has 
//  callback which process the ajax request for registrtaion . 
add_action( 'wp_ajax_nopriv_r_create_account', 'r_create_account' );
//  file is in process/login.php .This file has 
//  callback which process the ajax request for login .
add_action( 'wp_ajax_nopriv_r_user_login', 'r_user_login' );
// this is a dynamic hook , secondary is the menu name where you want the menu
// priority should be high 'cos we want to add to the end of the menu 

add_filter( 'wp_nav_menu_secondary_items', 'r_new_nav_menu_items', 999 ); 


// Shortcodes 
add_shortcode( 'auth_form', 'rlogin_auth_form_shortcode' );

