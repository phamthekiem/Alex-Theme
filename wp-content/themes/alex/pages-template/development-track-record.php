<?php
/**
 * Template Name: Development track record page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SH_Theme
 */

get_header(); ?>
<!-- <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/results-page.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/work-page.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/service-page.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/about-page.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/top-page.css"> -->


<section class="schedule-heading">
    <div class="container">
        <div class="schedule-block-wrapper" id="main_contents">
            <div class="box">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    </div>
</section>

<?php
get_footer();