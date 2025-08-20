<?php
/**
 * Custom Login Page
 */
function sh_login_logo() {
	wp_enqueue_style( 'login-custom-style', get_template_directory_uri() .'/lib/css/login.css' );
}
add_action( 'login_enqueue_scripts', 'sh_login_logo' );

/**
 * Dashboard
 */
function custom_dashboard_help() {
	echo '<p style="font-size:15px;line-height:1.5">Welcome to the Website Management system.<br/>
The system is developed by <strong>KiemPT</strong> on the <strong>Wordpress</strong> platform.<br />
Thank you for trusting and using our products.
	</p>';
}

function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_help_widget', 'Thông tin Hệ Thống Admin', 'custom_dashboard_help');
}

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets',1,2);


/**
 * Remove Dashboard
**/
function disable_default_dashboard_widgets() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['high']['redux_dashboard_widget']);

}
add_action('wp_dashboard_setup', 'disable_default_dashboard_widgets', 999);

/**
 * Remove Admin Bar
**/
function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node('wp-logo');
	$wp_admin_bar->remove_node('comments');
}
add_action('admin_bar_menu', 'remove_wp_logo', 999);

/**
 * Hide Menu Page If User Not kiempt
**/
function remove_menus() {
	global $current_user;
	$username = $current_user->user_login;
	if( $username != 'kiempt' ) {
		remove_menu_page( 'plugins.php' );
	 	remove_menu_page( 'tools.php' );
	 	remove_menu_page( 'options-general.php' );
	 	remove_menu_page( 'edit-comments.php' );
	 	remove_menu_page( 'edit.php?post_type=acf-field-group' );
    	remove_menu_page( 'wpcf7' );
    	remove_menu_page( 'users.php' );
    	remove_menu_page( 'themes.php' );
    	// remove_menu_page( 'wpcf7' );
	}
}
add_action( 'admin_menu', 'remove_menus', 999 );

function remove_unnecessary_wordpress_menus(){
	global $current_user, $submenu;
	$username = $current_user->user_login;
	if ( $username != 'kiempt' ) {
		unset($submenu['index.php'][10]);
	    unset($submenu['themes.php'][5]);
	    unset($submenu['themes.php'][20]);
	    unset($submenu['themes.php'][22]);
	}
}
add_action('admin_menu', 'remove_unnecessary_wordpress_menus', 999);

function yoursite_pre_user_query($user_search) {
	global $current_user;
	$username = $current_user->user_login;
	if ( $username != 'kiempt' ) {
		global $wpdb;
		
	}
}
add_action('pre_user_query','yoursite_pre_user_query');