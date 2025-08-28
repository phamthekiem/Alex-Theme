<?php
/**
 * Template Name: Service page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SH_Theme
 */

get_header(); ?>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/service-page.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/about-page.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/top-page.css">

<section class="about">
    <div class="about-avatar">
        <!-- Ảnh nền tự động chuyển bằng CSS -->
        <div class="service-bg" style="background-image:url('<?php the_field('service_page_image') ?>');"></div>

        <div class="overlay-about">
            <!-- Bên trái: câu khẩu hiệu -->
            <div class="about-left-text">
                <h2 class="text-uppercase"><?php the_field('service_page_content') ?></h2> 
            </div>
            <!-- Bên phải: SERVICE + 事業内容 -->
            <div class="about-right-text">
                <span class="company-info"><?php the_field('service_page_description') ?></span>
                <h1 class="about-heading text-uppercase"><?php the_title() ?></h1>
            </div>
        </div>
    </div>
</section>

<nav class="submenu-tabs">
    <div class="container"></div>
</nav>

<section class="creation-tech-section">
    <div class="container">
        <div class="creation-tech-box">
            <h2 class="creation-title"><?php the_field('creation_tech_title') ?></h2>
            <div class="creation-description">
                <?php the_field('creation_tech_description') ?>
            </div>
        </div>
    </div>
</section>

<?php 
if( have_rows('video_section_content') ):
    while( have_rows('video_section_content') ) : the_row();
        $title = get_sub_field('title');
        $description = get_sub_field('description');
?>
    <section class="video-section">
        <div class="sg-header">
            <img class="sg-bg" src="<?php bloginfo('template_directory') ?>/assets/image/グループ 19.png" alt="Green Diagonal BG">
        </div>
        <div class="container">
            <div class="box-wrapper">
                <div class="subtitle-frame-wrapper">
                    <img class="subtitle-frame" src="<?php bloginfo('template_directory') ?>/assets/image/グループ 27.png" alt="Subtitle Frame">
                    <span class="subtitle-text"><?php echo $title; ?></span>
                </div>
                <img class="box-bg" src="<?php bloginfo('template_directory') ?>/assets/image/グループ 28.png" alt="Box Frame BG">
                <div class="subtitle-spacer"></div>
                <div class="info-box">
                    <div class="info-content">
                        <div>
                            <?php echo $description; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php 
    endwhile;
endif;    
?>


<?php
get_footer();