<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SH_Theme
 */

get_header(); 

$args = array(
    'post_type'      => 'recruit',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
);
$recruit_posts = get_posts($args);
$current_id = get_the_ID();
?>


<style>
    .section-job-heading.hidden {
        display: none;
    }
    .section-job-heading.active {
        display: block;
    }
</style>

<section class="about">
    <div class="about-avatar">
        <div class="service-bg" style="background-image:url('<?php the_field('recruit_post_banner') ?>');"></div>

        <div class="overlay-about">
            <div class="about-left-text">
                <h2><?php the_field('recruit_post_slogan') ?></h2> 
            </div>
            <div class="about-right-text">
                <span class="company-info"><?php the_title() ?></span>
                <h1 class="about-heading">
                    <?php if(pll_current_language() == 'ja') {
                        echo 'RECRUIT';
                    } else {
                        echo 'Tuyển dụng';
                    } ?>
                </h1>
            </div>
        </div>
    </div>
</section>

<nav class="submenu-tabs-1">
    <div class="container"> </div>
</nav>

<section class="job-open-heading">
    <div class="container">
        <div class="job-open-tab-menu">
            <?php foreach ($recruit_posts as $post) : ?>
                <button 
                    class="job-open-detail-btn <?php echo ($post->ID == $current_id) ? 'active' : ''; ?>" 
                    data-target="job-<?php echo esc_attr($post->ID); ?>">
                    <?php echo esc_html(get_the_title($post->ID)); ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php 
$recruits = new WP_Query([
    'post_type' => 'recruit',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
]);

if ($recruits->have_posts()) : 
    while ($recruits->have_posts()) : $recruits->the_post();
        $section_active = (get_the_ID() == get_queried_object_id()) ? 'active' : 'hidden';
        ?>
        <section class="section-job-heading <?php echo $section_active; ?>" id="job-<?php the_ID(); ?>">
            <div class="container">
                <div class="job-block-wrapper">
                    <div class="job-image-wrapper">
                        <div class="job-bg-light">
                            <img src="<?php the_field('recruit_banner_detail') ?>" alt="bg light" class="avatar-job-001">
                        </div>

                        <div class="job-bg-dark">
                            <img src="<?php bloginfo('template_directory') ?>/assets/image/画像-19.png" alt="bg dark" class="avatar-job-002">
                        </div>

                        <div class="job-bg-table">
                            <img src="<?php bloginfo('template_directory') ?>/assets/image/画像-46.png" alt="work table" class="avatar-job-003">
                        </div>
                        <div class="job-title">
                            <?php the_title() ?>
                        </div>
                    </div>

                    <div class="job-box">
                        <?php the_field('recruit_detail_job_description') ?>
                    </div>

                    <div class="job-table-wrapper">
                        <?php the_content() ?>
                    </div>

                    <div class="job-header">
                        <img class="job-bg" src="<?php bloginfo('template_directory') ?>/assets/image/グループ 19.png" alt="帯背景">
                    </div>

                    <div class="subtitle-frame-wrapper-job">
                        <img src="<?php bloginfo('template_directory') ?>/assets/image/グループ 27.png" alt="Subtitle Frame" class="subtitle-frame-job">
                        <span class="subtitle-text-job">
                            <?php echo (pll_current_language() == 'ja') ? '採用プロセス' : 'Quy trình tuyển dụng'; ?>
                        </span>
                    </div>

                    <!-- Recruitment Process -->
                    <div class="job-process-flow">
                        <?php 
                        $steps = get_field('recruit_application_steps');
                        $total = is_array($steps) ? count($steps) : 0;
                        if ($total > 0) :
                            $i = 1;
                            foreach ($steps as $step) :
                                $title = $step['title'];
                                $description = $step['description'];
                                ?>
                                <div class="process-step">
                                    <div class="step-header">
                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/長方形 1140.png" alt="Step BG" class="step-bg">
                                        <span class="step-title">Step <?php echo $i; ?></span>
                                    </div>
                                    <div class="step-content">
                                        <p class="step-main"><?php echo esc_html($title) ?></p>
                                        <p class="step-sub"><?php echo esc_html($description); ?></p>
                                    </div>
                                </div>
                                <?php if ($i < $total) : ?>
                                    <div class="triangle-play"></div>
                                <?php endif; 
                                $i++;
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endwhile;
    wp_reset_postdata();
endif;

get_footer();
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll(".job-open-detail-btn");
        const sections = document.querySelectorAll(".section-job-heading");

        buttons.forEach(btn => {
            btn.addEventListener("click", function() {
                // remove active
                buttons.forEach(b => b.classList.remove("active"));
                sections.forEach(sec => {
                    sec.classList.remove("active");
                    sec.classList.add("hidden");
                });

                // add active
                this.classList.add("active");
                const target = this.dataset.target;
                const targetEl = document.getElementById(target);
                if (targetEl) {
                    targetEl.classList.remove("hidden");
                    targetEl.classList.add("active");
                }
            });
        });
    });
</script>
