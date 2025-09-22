<?php
/**
 * Template Name: Staff voice  page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SH_Theme
 */

get_header(); ?>


<div class="submenu-tabs-3">
    <div class="container-2">
        <span class="main-title-staff"><?php the_field('staff_voice_page_title') ?></span>
        <span class="subtitle-staff"><?php the_field('staff_voice_page_sub_title') ?></span>
    </div>
</div>

<!-- <nav class="submenu-tabs-1">
    <div class="container">
        <ul>
            <li><a href="募集職種-page.html">募集職種</a></li>
            <li><a href="#スタッフの声TOP-page.html">スタッフの声ＴＯＰ</a></li>
        </ul>
    </div>
</nav> -->

<section class="creation-interview-section">
    <div class="container">
        <div class="interview-slider">
            <button class="slide-interview-btn prev">&#10094;</button>

            <?php if( have_rows('staff_voice_page_user_content') ): ?>
                <div class="interview-stack">
                    <?php 
                        $i = 1;
                        while( have_rows('staff_voice_page_user_content') ) : the_row();
                        $name = get_sub_field('name');
                        $image_before = get_sub_field('image_before');
                    ?>
                        <div class="stack-item" data-popup="#interviewPopup-<?php echo $i; ?>">
                            <div class="stack-name"><?php echo $name; ?></div>
                            <img src="<?php echo $image_before; ?>" alt="Alex">
                        </div>
                    <?php $i++;
                    endwhile; ?>    
                </div>
            <?php endif; ?>

            <button class="slide-interview-btn next">&#10095;</button>
        </div>
    </div>

    <?php if( have_rows('staff_voice_page_user_content') ): 
        $i = 1;
        while( have_rows('staff_voice_page_user_content') ) : the_row();
        $name = get_sub_field('name');
        $job = get_sub_field('job');
        $joined = get_sub_field('joined');
        $image_affter = get_sub_field('image_affter');
    ?>
        <div class="interview-popup-overlay" id="interviewPopup-<?php echo $i; ?>">
            <div class="popup-content">
                <div class="popup-frame">
                    <div class="popup-title">
                        <a class="popup-name" href=""><?php echo $name; ?></a>
                        <p class="popup-producer"><?php echo $job; ?><p>
                        <p class="popup-date"><?php echo $joined; ?></p>
                    </div>
                    <!-- Các khung viền -->
                    <img src="<?php bloginfo('template_directory') ?>/assets/image/長方形 437.png" class="popup-frame-top" alt="Top Frame">
                    <img src="<?php bloginfo('template_directory') ?>/assets/image/長方形 438.png" class="popup-frame-bottom" alt="Bottom Frame">
                    <img src="<?php bloginfo('template_directory') ?>/assets/image/長方形 439.png" class="popup-frame-left" alt="Left Frame">
                    <!-- Khung nền xanh -->
                    <img src="<?php echo $image_affter ?>" class="popup-frame-bg" alt="<?php echo $name; ?>">
                </div>
            </div>
        </div>
    <?php $i++;
    endwhile;
    endif; ?>    
    
    

</section>

<?php
get_footer();