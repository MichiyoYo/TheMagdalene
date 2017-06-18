<?php

define( 'ONETONE-CHILD_THEME_BASE_URL', get_template_directory_uri());
define( 'ONETONE_OPTIONS_FRAMEWORK', get_template_directory().'/admin/' ); 
define( 'ONETONE_OPTIONS_FRAMEWORK_URI',  ONETONE_THEME_BASE_URL. '/admin/'); 
define('ONETONE_OPTIONS_PREFIXED' ,'onetone_');

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/' );
require_once dirname( __FILE__ ) . '/admin/options-framework.php';
require_once get_template_directory() . '/includes/admin-options.php';

/**
 * Required: include options framework.
 **/
load_template( trailingslashit( get_template_directory() ) . 'admin/options-framework.php' );

/**
 * Mobile Detect Library
 **/
 if(!class_exists("Mobile_Detect")){
   load_template( trailingslashit( get_template_directory() ) . 'includes/Mobile_Detect.php' );
 }
/**
 * Theme setup
 **/
 
load_template( trailingslashit( get_template_directory() ) . 'includes/theme-setup.php' );

/**
 * Theme Functions
 **/
 
load_template( trailingslashit( get_template_directory() ) . 'includes/theme-functions.php' );

/**
 * Theme breadcrumb
 **/
load_template( trailingslashit( get_template_directory() ) . 'includes/class-breadcrumb.php');
/**
 * Theme widget
 **/
 
load_template( trailingslashit( get_template_directory() ) . 'includes/theme-widget.php' );


/*Custom script inclusion*/

/**Including Responsive Framework*/

/*Plugin
function responsive_scripts(){
	wp_register_script('jquery_vendor','/wp-content/themes/onetone-child/responsive/vendor/jquery-2.1.3.min.js',array('jquery'));
	wp_register_script('responsive','/wp-content/themes/onetone-child/responsive/responsive.min.js');

	wp_enqueue_script('jquery_vendor');
	wp_enqueue_script('responsive');
}

add_action('wp_enqueue_scripts','responsive_scripts');

function responsive_styles(){
	wp_register_script('responsive_css','/wp-content/themes/onetone-child/responsive/responsive.css',array(),'all');
	
	wp_enqueue_script('responsive_css');
}
add_action('wp_enqueue_scripts','responsive_styles');*/
function findstrings_script(){
		wp_register_script('findstrings','/wp-content/themes/onetone-child/js/findstrings.js');
		wp_enqueue_script('findstrings');
}

add_action('wp_enqueue_scripts','findstrings_script');

function scrollto(){
	wp_register_script('scroll','/wp-content/themes/onetone-child/js/onetone.js');
	wp_enqueue_script('scroll');
}
add_action('wp_enqueue_scripts','scrollto');

?>
