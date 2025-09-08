<?php
/**
 * Template for Company Events Archive
 * File: archive-company-events.php
 */

get_header(); ?>


<div class="submenu-tabs-2">
    <div class="container-2">
        <span class="main-title">
            <?php if (function_exists('pll_current_language') && pll_current_language() == 'ja') {
                echo '社内イベント';
            } else {
                echo 'Sự kiện công ty';
            } ?>
        </span>
    </div>
</div>

<nav class="submenu-tabs-1">
    <div class="container"></div>
</nav>

<?php

$terms = get_terms(array(
    'taxonomy'   => 'event',
    'hide_empty' => true,
));

if (!empty($terms) && !is_wp_error($terms)) {
    foreach ($terms as $term) : ?>
        
        <section class="interview-heading" id="term-<?php echo esc_attr($term->slug); ?>">
            <div class="interview-header">
                <img class="interview-bg" src="<?php echo get_template_directory_uri(); ?>/assets/image/グループ 19.png" alt="帯背景">
            </div>

            <div class="subtitle-frame-wrapper-interview">
                <img class="subtitle-frame-interview" src="<?php echo get_template_directory_uri(); ?>/assets/image/グループ 27.png" alt="Subtitle Frame">
                <span class="subtitle-text-interview"><?php echo esc_html($term->name); ?></span>
            </div>

            <div class="container">
                <?php
                $args = array(
                    'post_type'      => 'company-events',
                    'posts_per_page' => -1,
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'event',
                            'field'    => 'term_id',
                            'terms'    => $term->term_id,
                        ),
                    ),
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); ?>
                        
                        <div class="creation-interview-box">
                            <div class="creation-interview-left">
                                <div class="image-frame-popper">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail('medium');
                                    } ?>
                                </div>
                            </div>
                            <div class="creation-interview-right">
                                <h4 class="creation-interview-title"><?php the_title(); ?></h4>
                                <div class="creation-interview-content">
                                    <?php the_excerpt(); ?>
                                </div>

                                <?php 
                                $images = get_field('events_image');
                                if( $images ):
                                ?>
                                    <div class="interview-overwhole-wrapper">
                                        <button class="overwhole-btn prev">&#10094;</button>
                                        <div class="interview-overwhole">
                                            <?php foreach( $images as $image ): ?>
                                                <div class="overwhole-item">
                                                    <img src="<?php echo esc_url($image) ?>" alt="Image" >   
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <button class="overwhole-btn next">&#10095;</button>
                                    </div>
                                <?php endif; ?>

                                <!-- <a class="interview-readmore" href="<?php //the_permalink(); ?>">
                                    <?php //if (function_exists('pll_current_language') && pll_current_language() == 'ja') {
                                    //     echo '続きを読む';
                                    // } else {
                                    //     echo 'Xem chi tiết';
                                    //} ?>
                                </a> -->
                            </div>
                        </div>

                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>
                        <?php if (function_exists('pll_current_language') && pll_current_language() == 'ja') {
                            echo 'イベントは見つかりませんでした。';
                        } else {
                            echo 'Không tìm thấy sự kiện nào.';
                        } ?>
                    </p>
                <?php endif; ?>
            </div>
        </section>

    <?php endforeach;
}
?>

<?php get_footer(); ?>
