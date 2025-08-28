<?php
/**
 * SH Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SH_Theme
 */

add_filter( 'use_widgets_block_editor', '__return_false' );
add_filter('use_block_editor_for_post', '__return_false');


if ( ! function_exists( 'shtheme_setup' ) ) :
	function shtheme_setup() {
		
		load_theme_textdomain( 'shtheme', get_template_directory() . '/languages' );

		// Load Theme Options

		// Add theme support
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'shtheme' ),
		) );

		// Image
		// add_filter('wp_nav_menu_objects', 'add_images_to_menu_items', 10, 2);
		function add_images_to_menu_items($items, $args) {
			foreach ($items as &$item) {
				$image = get_field('menu_image', $item); 

				if ($image) {
					$img_html = '<img src="' . esc_url($image) . '" alt="' . esc_attr($item->title) . '" class="menu-icon">';
					$item->title = $img_html . $item->title;
				}
			}

			return $items;
		}


		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption',) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'shtheme_custom_background_args', array('default-color' => 'ffffff','default-image' => '',) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'shtheme_setup' );

function sh_constants() {
	define( 'PARENT_DIR', get_template_directory() );
	define( 'SH_DIR',  get_template_directory_uri() );
	define( 'SH_FUNCTIONS_DIR', PARENT_DIR . '/inc/functions' );
}
add_action( 'init', 'sh_constants' );

function sh_load_framework() {
	// Load Functions.
	require_once( SH_FUNCTIONS_DIR . '/init.php' );
	require_once( SH_FUNCTIONS_DIR . '/formatting.php' );
	require_once( SH_FUNCTIONS_DIR . '/breadcrumbs.php' );
	require_once( SH_FUNCTIONS_DIR . '/dashboard.php' );
	require_once( SH_FUNCTIONS_DIR . '/mobilemenu.php' );
}
add_action( 'init','sh_load_framework' );

/**
 * Register Widget Area
 */
function shtheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'shtheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'shtheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Language Sidebar', 'shtheme' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'shtheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'shtheme_widgets_init' );


/**
 * Load File
 */
// Load Plugin Activation File.
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

// Load Custom Post Type
// require get_template_directory() . '/inc/cpt/cpt-abstract.php';
// require get_template_directory() . '/inc/cpt/khach-hang.php';
// require get_template_directory() . '/inc/cpt/cpt.php';
	
// Load Custom Taxonomy
// require get_template_directory() . '/inc/taxonomies/custom-taxonomy-abstract.php';
// require get_template_directory() . '/inc/taxonomies/khach-hang-cat.php';
// require get_template_directory() . '/inc/taxonomies/custom-taxonomy.php';

// Load Shortcode
require get_template_directory() . '/inc/shortcode/shortcode-blog.php';


// Add Shortcode
require get_template_directory() . '/inc/function-shortcode.php';
require get_template_directory() . '/inc/custom-function.php';

// Load Widget
require get_template_directory() . '/inc/widgets/wg-post-list.php';
require get_template_directory() . '/inc/widgets/wg-support.php';
require get_template_directory() . '/inc/widgets/wg-fblikebox.php';
require get_template_directory() . '/inc/widgets/wg-page.php';
require get_template_directory() . '/inc/widgets/wg-view-post-list.php';
require get_template_directory() . '/inc/widgets/wg-information.php';
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/widgets/wg-product-slider.php';
}

function shtheme_lib_scripts(){

	// Bootstrap
	wp_enqueue_script( 'popper-js', SH_DIR . '/lib/js/bootstrap5/bootstrap.bundle.min.js', array('jquery'), '5.3.5', true );
	wp_enqueue_script( 'bootstrap-js', SH_DIR . '/lib/js/bootstrap5/bootstrap.min.js', array('jquery'), '5.3.5', true );
	wp_enqueue_style( 'bootstrap-style', SH_DIR .'/lib/css/bootstrap5/bootstrap.min.css' );

	// Custom Theme
	wp_enqueue_style( 'custom-style', SH_DIR .'/assets/css/custom.css' );
	// wp_enqueue_style( 'custom-style-style', SH_DIR .'/assets/css/style.css' );
	wp_enqueue_style( 'custom-fonts', SH_DIR .'/assets/css/fonts.css' );

	// Page CSS
	wp_enqueue_style( 'comments-top-page-style', SH_DIR .'/assets/css/comments-top-page.css' );
	wp_enqueue_style( 'company-events-page-style', SH_DIR .'/assets/css/company-events-page.css' );
	wp_enqueue_style( 'job-openings-page-style', SH_DIR .'/assets/css/job-openings-page.css' );
	wp_enqueue_style( 'production-library-page-style', SH_DIR .'/assets/css/production-library-page.css' );
	wp_enqueue_style( 'voices-page-style', SH_DIR .'/assets/css/voices-page.css' );


	// Page JS
	wp_enqueue_script( 'about-page-js', SH_DIR .'/assets/js/about-page.js', array('jquery') );
	wp_enqueue_script( 'access-page-js', SH_DIR .'/assets/js/access-page.js', array('jquery') );
	wp_enqueue_script( 'contact-page-js', SH_DIR .'/assets/js/contact-page.js', array('jquery') );
	wp_enqueue_script( 'top-page-js', SH_DIR .'/assets/js/top-page.js', array('jquery') );
	wp_enqueue_script( 'top-page2-js', SH_DIR .'/assets/js/top-page2.js', array('jquery') );
	wp_enqueue_script( 'detail-page-js', SH_DIR .'/assets/js/detail-page.js', array('jquery') );
	wp_enqueue_script( 'detail-page2-js', SH_DIR .'/assets/js/detail-page2.js', array('jquery') );
	wp_enqueue_script( 'detail-page3-js', SH_DIR .'/assets/js/detail-page3.js', array('jquery') );

	wp_enqueue_script( 'custom-js', SH_DIR . '/assets/js/custom.js', array('jquery'), '1.0', true );
	// wp_enqueue_script( 'custom-script-js', SH_DIR . '/assets/js/script.js', array('jquery'), '1.0', true );
	// wp_enqueue_script( 'core-script-js', SH_DIR . '/assets/js/core.min.js', array('jquery') );

	// Main js
	wp_enqueue_script( 'main-js', SH_DIR . '/lib/js/main.js', array('jquery'), '1.0', true );
	wp_localize_script(	'main-js', 'ajax', array( 'url' => admin_url('admin-ajax.php') ) );

	// Slick Slider

	// Font Awesome
	// wp_enqueue_style( 'fontawesome-style', SH_DIR .'/lib/css/font-awesome-all.css' );

	// Fancybox
	wp_register_script( 'fancybox-js', SH_DIR .'/lib/js/gallery-product/jquery.fancybox.min.js',array('jquery'),'3.5.7', true);
	wp_register_style( 'fancybox-css', SH_DIR .'/lib/css/gallery-product/fancybox.min.css' );

	wp_register_script( 'validate-js', SH_DIR .'/lib/js/jquery.validate.min.js',array('jquery'),'1.19.0', true);

	// Ring Phone
	wp_register_style( 'phonering-style', SH_DIR .'/lib/css/phone-ring.css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'shtheme_lib_scripts' , 1 );

/**
 * Optimize
 */
function remove_head_scripts() { 
   remove_action('wp_head', 'wp_print_scripts'); 
   remove_action('wp_head', 'wp_print_head_scripts', 9); 
   remove_action('wp_head', 'wp_enqueue_scripts', 1);
   add_action('wp_footer', 'wp_print_scripts', 5);
   add_action('wp_footer', 'wp_enqueue_scripts', 5);
   add_action('wp_footer', 'wp_print_head_scripts', 5);
} 
// add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );

/**
 * Add Thumb Size
**/
add_image_size( 'sh_thumb300x200', 300, 200, array( 'center', 'center' ) );

/** Check tel: * */
function custom_filter_wpcf7_is_tel($result, $tel) {
    $result = preg_match('/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/', $tel);
    return $result;
}
// add_filter('wpcf7_is_tel', 'custom_filter_wpcf7_is_tel', 10, 2);


// SMTP
// add_action( 'phpmailer_init', function( $phpmailer ) {
//     if ( !is_object( $phpmailer ) )
//     $phpmailer = (object) $phpmailer;
//     $phpmailer->Mailer     = 'smtp';
//     $phpmailer->Host       = 'smtp.gmail.com';
//     $phpmailer->SMTPAuth   = 1;
//     $phpmailer->Port       = 587;
//     $phpmailer->Username   = 'phamthekiem193@gmail.com';
//     $phpmailer->Password   = 'wjekertxpwdjchda';
//     $phpmailer->SMTPSecure = 'TLS';
//     $phpmailer->From       = 'phamthekiem193@gmail.com';
//     $phpmailer->FromName   = 'Lotto - ';
// });