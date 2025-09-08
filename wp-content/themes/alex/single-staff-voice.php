<?php
/**
 * The template for displaying all single staff voice
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-staff-voice
 *
 * @package SH_Theme
 */

get_header(); 
?>

<div class="submenu-tabs-3">
    <div class="container-2">
        <span class="main-title-staff">
            <?php if(pll_current_language() == 'ja') {
                echo '社内イベント';
            } else {
                echo 'Sự kiện công ty';
            } ?>
        </span>
        <span class="subtitle-staff">
            <?php if(pll_current_language() == 'ja') {
                echo 'スタッフの声';
            } else {
                echo 'Bình luận của nhân viên';
            } ?>
        </span>
    </div>
</div>

<?php
    $department   = get_field('staff_sections_department');
    $joined_year  = get_field('staff_sections_joined_year');
    $image_after  = get_field('staff_sections_image_affter');
?>

<section class="staff-comment-section">

    <?php if (have_rows('staff_sections')): ?>
        <?php while (have_rows('staff_sections')): the_row(); ?>

            <?php if (get_row_layout() === 'staff_profile_left'): ?>
                <div class="staff-comment-detail">
                    <div class="sf-header">
                        <img class="sf-bg" src="<?php echo get_template_directory_uri(); ?>/assets/image/グループ 293.png" alt="Green Diagonal BG">
                    </div>
                    <div class="container">
                        <div class="staff-block">
                            
                            <!-- Cột trái: Ảnh + khung -->
                            <div class="staff-image">
                                <div class="staff-frame">
                                    <?php $staff_image = get_sub_field('staff_image_frame');
                                        if ($staff_image) : ?>
                                        <img src="<?php echo esc_url($staff_image); ?>" class="staff-frame-bg" alt="<?php the_title(); ?>">
                                    <?php endif; ?>

                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image/長方形 455.png" class="staff-frame-middle" alt="Middle Frame">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image/べた塗り 4.png" class="staff-frame-top" alt="Top Frame">
                                </div>
                                <!-- Box tên nhân viên -->
                                <div class="staff-name-box">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image/長方形 478.png" class="name-bg-white" alt="">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image/長方形 629.png" class="name-bg-green" alt="">
                                    <div class="name-text">
                                        <?php if ($department): ?>
                                            <p class="staff-department"><?php echo esc_html($department); ?></p>
                                        <?php endif; ?>
                                        <p class="staff-name"><?php the_title(); ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Cột phải: Nội dung -->
                            <div class="staff-text">
                                <div class="staff-section-box">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image/長方形 891.png" alt="" class="staff-avatar-bg">
                                    <span class="staff-subtile"><?php the_sub_field('staff_title'); ?></span>
                                    <div><?php the_sub_field('work_description_content'); ?></div>
                                </div>

                                <div class="staff-section-box">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image/長方形 891.png" alt="" class="staff-avatar-bg">
                                    <span class="staff-subtile"><?php the_sub_field('job_appeal_title'); ?></span>
                                    <div><?php the_sub_field('job_appeal_content'); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php elseif (get_row_layout() === 'staff_profile_right'): ?>
                <div class="staff-comment-detail">
                    <div class="sf-header">
                        <img class="sf-bg" src="<?php echo get_template_directory_uri(); ?>/assets/image/グループ 293.png" alt="Green Diagonal BG">
                    </div>
                    <div class="container">
                        <div class="staff-block reverse">
                            <div class="staff-image-reverse">
                                <div class="staff-frame">
                                    <?php $staff_image = get_sub_field('staff_image_frame');
                                        if ($staff_image) : ?>
                                        <img src="<?php echo esc_url($staff_image); ?>" class="staff-frame-brigde" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image/長方形 455.png" class="staff-frame-braved" alt="Middle Frame">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image/べた塗り 4.png" class="staff-frame-bottom" alt="Top Frame">
                                </div>
                            </div>
                            <div class="staff-text">
                                <div class="staff-section-box">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image/長方形 891.png" alt="" class="staff-avatar-bg">
                                    <span class="staff-subtile"><?php the_sub_field('staff_title'); ?></span>
                                    <div><?php the_sub_field('work_description_content'); ?></div>
                                </div>

                                <div class="staff-section-box">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image/長方形 891.png" alt="" class="staff-avatar-bg">
                                    <span class="staff-subtile"><?php the_sub_field('job_appeal_title'); ?></span>
                                    <div><?php the_sub_field('job_appeal_content'); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php elseif (get_row_layout() === 'staff_profile_center'): ?>
                <div class="staff-comment-detail">
                    <div class="container">
                        <div class="staff-block reverse-bg">
                            <div class="staff-image-reverse-bg">
                                <div class="staff-frame">
                                    <?php $staff_image = get_sub_field('staff_image_frame');
                                        if ($staff_image) : ?>
                                        <img src="<?php echo esc_url($staff_image); ?>" class="staff-frame-wrapper" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image/長方形 479.png" class="staff-frame-scrapper" alt="Middle Frame">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image/長方形 999.png" class="staff-frame-underground" alt="Top Frame">
                                </div>
                            </div>
                            <div class="staff-text-bg">
                                <div class="staff-section-box">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image/長方形 891.png" alt="" class="staff-avatar-bg">
                                    <span class="staff-subtile"><?php the_sub_field('staff_title'); ?></span>
                                    <div><?php the_sub_field('work_description_content'); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>

</section>

<?php
get_footer();
