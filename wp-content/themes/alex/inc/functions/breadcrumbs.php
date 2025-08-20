<?php
/**
 * Breadcrumbs
 * @package SH_Theme
 * @author  KiemPT
 * @license 
 * @link    
 */

function sh_create_breadcrumb(){
    if ( ! is_front_page() ) {
        echo '<div class="wtb-breadcrumb">';
            echo '<div class="container-">';
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<div class="breadcrumb">','</div>');
                }
            echo '</div>';
        echo '</div>';
    }
}
add_action( 'before_content','sh_create_breadcrumb' );