<?php

/**

 * Template Name: Works page

 *

 *

 * @link https://codex.wordpress.org/Template_Hierarchy

 *

 * @package SH_Theme

 */



get_header(); ?>


<section class="about">

    <div class="about-avatar">

        <!-- Ảnh nền tự động chuyển bằng CSS -->

        <?php 

        $images = get_field('works_page_banner');

        if ($images):

            $total = count($images);

            $count = 1;

            foreach ($images as $image):

                ?>

                <div class="about-bg bg<?php echo $count; ?>" style="background-image:url('<?php echo esc_url($image); ?>');"></div>

                <?php

                $count++;

            endforeach;

        endif;

        ?> 

        <div class="overlay-about">

        <!-- Bên trái: câu khẩu hiệu -->

        <div class="about-left-text">

            <!-- <h2>成長に終わりはない<br>常に先を見て<br>常に変わっていく<br></h2> -->

            <h2><?php the_field('works_page_content') ?></h2>

        </div>

        

        <!-- Bên phải: ABOUT + 会社情報 -->

        <div class="about-right-text">

            <span class="company-info"><?php the_field('works_page_description') ?></span>

            <h1 class="about-heading text-uppercase"><?php the_title() ?></h1>

        </div>

        </div>

    </div>

    </section>



<nav class="submenu-tabs">

    <div class="container"></div>

</nav>



<section class="works-section" style="background-image: url(<?php bloginfo('template_directory') ?>/assets/image/用紙配置.png);">

    <div class="works-content">

        <div class="works-image-wrapper">

            <a href="<?php the_field('production_library_url') ?>" class="works-image-link">

                <img class="works-main" src="<?php the_field('production_library_image') ?>" alt="<?php the_field('production_library_title') ?>">

                <div class="works-title"><?php the_field('production_library_title') ?></div>

            </a>

        </div>



        <a class="works-text" href="<?php the_field('past_development_projects_url') ?>">≫≫ <?php the_field('past_development_projects_title') ?></a>



        <!-- Nút nhỏ đặt ngay trong content -->

        <div class="work-link-wrapper">

            <a href="<?php the_field('internal_events_url') ?>" class="work-link with-text">

                <img src="<?php the_field('internal_events_image') ?>" alt="社内イベント">

                <div class="overlay-box-work">

                <div class="line5"><?php the_field('internal_events_title') ?></div>

                <div class="line6"><?php the_field('internal_events_description') ?></div>

                </div>

            </a>

        </div>

    </div>

</section>



<?php

get_footer();