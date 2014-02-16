<?php
/*
Plugin Name: ODM Pod Events
Plugin URI: 
Description: Events system built using the Pods framework
Version: 1.0
Author: Oxford Digital Marketing
Author URI: http://oxforddigitalmarketing.co.uk
License: GPL2
*/

//


function odm_enqueue_scripts() {
    wp_enqueue_script( 'jquery' );
    wp_register_script('odm_jquery_validate', 'http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js', array('jquery'));
    wp_enqueue_script('odm_jquery_validate');
    wp_register_script('odm_jquery_validate', 'http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js', array('jquery'));
    wp_register_script('odm_script', WP_PLUGIN_URL.'/odm-pod-events/js/script.js', array('jquery','odm_jquery_validate','odm_javascript_cookie_check'));
    wp_enqueue_script('odm_script');
    wp_register_script('odm_javascript_cookie_check', WP_PLUGIN_URL.'/odm-pod-events/js/javascript_cookies.js');
    wp_enqueue_script('odm_javascript_cookie_check');
}
add_action( 'wp_enqueue_scripts', 'odm_enqueue_scripts' );




require_once('pods/odm-pod-events-admin.php');
require_once('includes/odm-pod-event-shortcodes.php');
require_once('includes/odm-field-functions.php');
require_once('includes/odm-paid-event-signup-shortcode.php');
require_once('includes/odm-paid-event-is-processing-api.php');



?>