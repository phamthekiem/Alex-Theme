<?php
/**
 * Template for Staff voice Archive
 * File: archive-staff-voice.php
 */

get_header(); ?>


<div class="submenu-tabs-3">
    <div class="container-2">
        <span class="main-title-staff">
            <?php pll_e('Sự kiện công ty'); ?>
        </span>
        <span class="subtitle-staff">
            <?php pll_e('Bình luận của nhân viên'); ?>
        </span>
    </div>
</div>
<a class="popup-name" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<!-- <nav class="submenu-tabs-1">
    <div class="container">
        <ul>
            <li><a href="job-openings-page.html">募集職種</a></li>
            <li><a href="comments-top-page.html">スタッフの声ＴＯＰ</a></li>
        </ul>
    </div>
</nav> -->

<section class="creation-interview-section">
    <div class="container">
        <div class="interview-slider">
            <button class="slide-interview-btn prev">&#10094;</button>
            <div class="interview-stack">
                <?php
                if (have_posts()) :
                $popup_id = 1;
                while (have_posts()) : the_post();
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    ?>
                    <div class="stack-item" data-popup="#interviewPopup-<?php echo $popup_id; ?>">
                        <div class="stack-name"><?php the_title(); ?></div>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <?php $popup_id++;
                endwhile;
                endif;
                ?>
            </div>
            <button class="slide-interview-btn next">&#10095;</button>
        </div>
    </div>

    <?php
    // Reset loop 
    if (have_posts()) :
        rewind_posts();
        $popup_id = 1;
        while (have_posts()) : the_post();
        $position = get_field('staff_sections_department'); 
        $joined_year = get_field('staff_sections_joined_year'); 
        $popup_bg = get_field('staff_sections_image_affter'); 
        ?>
        <div class="interview-popup-overlay" id="interviewPopup-<?php echo $popup_id; ?>">
            <div class="popup-content">
                <div class="popup-frame">
                    <div class="popup-title">
                        <a class="popup-name" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <p class="popup-producer"><?php echo esc_html($position); ?></p>
                        <p class="popup-date"><?php echo esc_html($joined_year); ?></p>
                    </div>

                    <!-- Các khung viền -->
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image/長方形 437.png" class="popup-frame-top" alt="Top Frame">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image/長方形 438.png" class="popup-frame-bottom" alt="Bottom Frame">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image/長方形 439.png" class="popup-frame-left" alt="Left Frame">
                    <!-- Khung nền xanh -->
                    <?php if ($popup_bg): ?>
                    <img src="<?php echo esc_url($popup_bg); ?>" class="popup-frame-bg" alt="Popup BG">
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php $popup_id++;
        endwhile;
    endif;
    ?>
</section>

<?php get_footer(); ?>