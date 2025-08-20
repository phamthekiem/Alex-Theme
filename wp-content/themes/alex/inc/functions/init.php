<?php
/**
 * SH Theme Init functions
 *
 * @package SH_Theme
 */

/**
 * Add Header Class
 */
function header_class( ) {
	$array_class_header = array('site-header');
    echo 'class="' . join( ' ', $array_class_header ) . '"';
}



/**
 * Enqueue Script File And Css File
 */
function shtheme_scripts() {
	wp_enqueue_style( 'shtheme-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shtheme_scripts' );

/**
 * Remove Title
 */
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    }
    return $title;
});

/**
 * Plugin Require Install
 */
function sh_plugin_activation() {

    $plugins = array(
        array(
            'name' 		=> 'Redux Framework',
            'slug' 		=> 'redux-framework',
            'required' 	=> true
        ),
        array(
            'name' 		=> 'WooCommerce',
            'slug' 		=> 'woocommerce',
        ),
        array(
            'name' 		=> 'Duplicate post',
            'slug' 		=> 'duplicate-post',
        ),
        array(
            'name' 		=> 'Contact form 7',
            'slug' 		=> 'contact-form-7',
        ),
        array(
            'name' 		=> 'Tinymce advanced',
            'slug' 		=> 'tinymce-advanced',
        ),
        array(
            'name' 		=> 'User role editor',
            'slug' 		=> 'user-role-editor',
        ),
        array(
            'name' 		=> 'Wp smtp',
            'slug' 		=> 'wp-smtp',
        ),
        array(
            'name' 		=> 'Yoast SEO',
            'slug' 		=> 'wordpress-seo',
        ),
        array(
            'name' 		=> 'MetaSlider',
            'slug' 		=> 'ml-slider',
        ),
    );

    $configs = array(
        'menu' 			=> 'tp_plugin_install',
        'has_notice' 	=> true,
        'dismissable' 	=> false,
        'is_automatic' 	=> true
    );
    tgmpa( $plugins, $configs );

}
// add_action('tgmpa_register', 'sh_plugin_activation');

/**
 * Security
 */
/* Disable Rest API */
function disable_rest_api(){
	if(!is_user_logged_in()){
		return new WP_Error('Error!', __('Unauthorized access is denied!','rest-api-error'), array('status' => rest_authorization_required_code()));
	}
}
// add_filter('rest_authentication_errors','disable_rest_api');
/* Disable XML RPC */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Optimize
 */
function shtheme_optimize() {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
    add_filter('the_generator', '__return_false');
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
}
add_action('after_setup_theme', 'shtheme_optimize');

/**
 * Add Body Class
 */



/**
 * Display Pagination
**/
if ( ! function_exists( 'shtheme_pagination' ) ) {
	function shtheme_pagination() {
		global $wp_query;
		$big = 999999999;
		echo '<div class="page_nav">';
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		) );
		echo '</div>';
	}
}

/**
 * Custom Pagination
**/
if ( ! function_exists( 'shtheme_custom_pagination' ) ) {
	function shtheme_custom_pagination( $custom_query ) {
		$total_pages = $custom_query->max_num_pages;
		$big = 999999999;
		echo '<div class="page_nav">';
			if ($total_pages > 1){
		        $current_page = max(1, get_query_var('paged'));

		        echo paginate_links(array(
		            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		            'format' => '?paged=%#%',
		            'current' => $current_page,
		            'total' => $total_pages,
		        ));
		    }
		echo '</div>';
	}
}

/**
 * Count view post
**/
function postview_set( $postID ) {
    $count_key 	= 'postview_number';
    $count 		= get_post_meta( $postID, $count_key, true );
    if( $count == '' ) {
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    } else {
        $count++;
        update_post_meta( $postID, $count_key, $count );
    }
}

function postview_get( $postID ){
    $count_key 	= 'postview_number';
    $count 		= get_post_meta( $postID, $count_key, true );
    if ( $count == '' ){
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
        return '0 '.__( 'views', 'shtheme' );
    }
    return $count.' '. __( 'views', 'shtheme' );
}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/**
 * Get term name
 */
function get_dm_name( $cat_id, $taxonomy ) {
	$cat_id 	= (int) $cat_id;
	$category 	= get_term( $cat_id, $taxonomy );
	if ( ! $category || is_wp_error( $category ) )
	return '';
	return $category->name;
}

/**
 * Get term link
 */
function get_dm_link( $category, $taxonomy ) {
	if ( ! is_object( $category ) )
	$category = (int) $category;
	$category = get_term_link( $category, $taxonomy );
	if ( is_wp_error( $category ) )
	return '';
	return $category;
}