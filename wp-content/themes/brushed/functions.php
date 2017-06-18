<?php
add_action( 'wp_ajax_send_message', 'my_action_callback' );



require_once('custom-posts/portfolio.php');
require_once('custom-posts/team.php');
require_once('framework/bootstrap.php');


require_once 'admin/data_sources.php';

/**
 * Load options, metaboxes, and shortcode generator array templates.
 */


// metaboxes
$metabox1  = get_template_directory() . '/admin/metabox/portfolio.php';
$metabox2  = get_template_directory() . '/admin/metabox/team.php';

function my_init_options()
{

// options
$all_opt  = get_template_directory() . '/admin/option/option.php';
/**
 * Create instance of Options
 */
$theme_options = new VP_Option(array(
    'is_dev_mode'           => false,                                  // dev mode, default to false
    'option_key'            => 'vpt_option',                           // options key in db, required
    'page_slug'             => 'vpt_option',                           // options page slug, required
    'template'              => $all_opt,                              // template file path or array, required
    'menu_page'             => 'themes.php',                           // parent menu slug or supply `array` (can contains 'icon_url' & 'position') for top level menu
    'use_auto_group_naming' => true,                                   // default to true
    'use_util_menu'         => true,                                   // default to true, shows utility menu
    'minimum_role'          => 'edit_theme_options',                   // default to 'edit_theme_options'
    'layout'                => 'fixed',                                // fluid or fixed, default to fixed
    'page_title'            => __( 'Theme Options', 'brushed' ), // page title
    'menu_label'            => __( 'Theme Options', 'brushed' ), // menu label
));

}
// the safest hook to use, since Vafpress Framework may exists in Theme or Plugin
add_action( 'after_setup_theme', 'my_init_options' );

$mb1 = new VP_Metabox($metabox1);
$mb2 = new VP_Metabox($metabox2);



function remove_menus () {
    global $menu;
    $restricted = array( __('Pages', 'brushed') ,  __('Comments', 'brushed'), __('Posts', 'brushed'));
    end ($menu);
    while (prev($menu)){
        $value = explode(' ',$menu[key($menu)][0]);
        if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
    }
}
add_action('admin_menu', 'remove_menus');

// Enable support for Post Thumbnails, and declare two sizes.
if (!function_exists('brushed_setup'))
{
	function brushed_setup(){
		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );
		add_theme_support( "custom-header");
		add_theme_support( "custom-background");
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list',
		) );

	}
}

add_action( 'after_setup_theme', 'brushed_setup' );

if (!function_exists('brushed_register_assets'))
{
	function brushed_register_assets()
	{
//Style
		wp_register_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', null,'3.0.0');
		wp_register_style( 'style', get_template_directory_uri().'/style.css', null,'1.0.0');
		wp_register_style( 'supersized', get_template_directory_uri().'/css/supersized.css', null,'2.0.0');
		wp_register_style( 'supersized_shutter', get_template_directory_uri().'/css/supersized.shutter.css', null,'2.0.0');
		wp_register_style( 'fancybox', get_template_directory_uri().'/css/fancybox/jquery.fancybox.css', null,'3.0.0');
		wp_register_style( 'fonts', get_template_directory_uri().'/css/fonts.css', null,'3.0.0');
		wp_register_style( 'bootstrap_responsive', get_template_directory_uri().'/css/bootstrap-responsive.min.css', null,'3.0.0');
		wp_register_style( 'responsive', get_template_directory_uri().'/css/responsive.css', null,'3.0.0');

// Register Scripts
		wp_register_script( 'modernizr',  get_template_directory_uri().'/js/modernizr.js', null, '2.0.1', false);
		wp_register_script( 'jquery', get_template_directory_uri().'/js/jquery-2.1.0.min.js', null, '2.1.1', true);
		wp_register_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), '2.1.1', true);
		wp_register_script( 'supersized', get_template_directory_uri().'/js/supersized.3.2.7.min.js', array('jquery'), '2.1.1', true);
		wp_register_script( 'waypoints', get_template_directory_uri().'/js/waypoints.js', array('jquery'), '2.1.1', true);
		wp_register_script( 'waypoints_sticky', get_template_directory_uri().'/js/waypoints-sticky.js', array('jquery'), '2.1.1', true);
		wp_register_script( 'isotope', get_template_directory_uri().'/js/jquery.isotope.js', array('jquery'), '2.1.1', true);
		wp_register_script( 'fancybox_pack', get_template_directory_uri().'/js/jquery.fancybox.pack.js', array('jquery'), '2.1.1', true);
		wp_register_script( 'fancybox_media', get_template_directory_uri().'/js/jquery.fancybox-media.js', array('jquery'), '2.1.1', true);
		wp_register_script( 'tweet', get_template_directory_uri().'/js/jquery.tweet.js', array('jquery'), '2.1.1', true);
		wp_register_script( 'plugins', get_template_directory_uri().'/js/plugins.js', array('jquery'), '2.1.1', true);
		wp_register_script( 'main', get_template_directory_uri().'/js/main.js', array('jquery'), '2.1.1', true);
		wp_register_script( 'myscript', get_template_directory_uri().'/js/myscript.js', array('jquery'), '2.1.1', true);

	}

}

add_action('wp_enqueue_scripts', 'brushed_register_assets');


if (!function_exists('brushed_enqueue_assets'))
{
	function brushed_enqueue_assets()
	{
// Enqueue style
		wp_enqueue_style( 'bootstrap' );
		wp_enqueue_style( 'style' );
		wp_enqueue_style( 'supersized' );
		wp_enqueue_style( 'supersized_shutter' );
		wp_enqueue_style( 'fancybox' );
		wp_enqueue_style( 'fonts' );
		wp_enqueue_style( 'bootstrap_responsive' );
		wp_enqueue_style( 'responsive' );

		wp_enqueue_script( 'modernizr' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'bootstrap' );
		wp_enqueue_script( 'supersized' );
		wp_enqueue_script( 'waypoints' );
		wp_enqueue_script( 'waypoints_sticky' );
		wp_enqueue_script( 'isotope' );
		wp_enqueue_script( 'fancybox_pack' );
		wp_enqueue_script( 'fancybox_media' );
		wp_enqueue_script( 'tweet' );
		wp_enqueue_script( 'plugins' );
		wp_enqueue_script( 'main' );
		wp_enqueue_script( 'myscript' );
	}

}
add_action('wp_enqueue_scripts', 'brushed_enqueue_assets');