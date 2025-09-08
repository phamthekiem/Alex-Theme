<?php

/**

 * Template Name: About page

 *

 *

 * @link https://codex.wordpress.org/Template_Hierarchy

 *

 * @package SH_Theme

 */



get_header(); ?>

<!-- <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/about-page.css"> -->





<section class="about">

    <div class="about-avatar">

        <!-- Ảnh nền tự động chuyển bằng CSS -->

        <?php 

        $images = get_field('about_page_banner');

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

                <h2><?php the_field('about_page_content') ?></h2>

            </div>

            

            <!-- Bên phải: ABOUT + 会社情報 -->

            <div class="about-right-text">

                <span class="company-info"><?php the_field('about_page_description') ?></span>

                <h1 class="about-heading text-uppercase"><?php the_title(); ?></h1>

            </div>

        </div>

    </div>

</section>



<nav class="submenu-tabs" style="background-image:url('<?php bloginfo('template_directory') ?>/assets/image/サブメニュー.png')">

    <div class="container">

        <ul>

            <li>

                <a href="#message-from-the-ceo">

                    <?php if(pll_current_language() == 'ja') {

                        echo '代表メッセージ';

                    } else {

                        echo 'Thông điệp từ CEO';

                    } ?>

                </a>

            </li>

            <li>

                <a href="#company-profile">

                    <?php if(pll_current_language() == 'ja') {

                        echo '会社概要';

                    } else {

                        echo 'Hồ sơ công ty';

                    } ?>

                </a>

            </li>

            <li>

                <a href="#history">

                    <?php if(pll_current_language() == 'ja') {

                        echo '沿革';

                    } else {

                        echo 'Lịch sử hình thành';

                    } ?>

                </a>

            </li>

            <li>

                <a href="#organization-chart">

                    <?php if(pll_current_language() == 'ja') {

                        echo '組織図';

                    } else {

                        echo 'Sơ đồ tổ chức';

                    } ?>

                </a>

                

                </a>

            </li>

            <li>

                <a href="#major-clients">

                    <?php if(pll_current_language() == 'ja') {

                        echo '主要取引先';

                    } else {

                        echo 'Khách hàng của chúng tôi';

                    } ?>

                </a>

            </li>

        </ul>

    </div>

</nav>





<section class="section-heading" id="message-from-the-ceo">

    <div class="section-header">

        <img class="section-bg" src="<?php bloginfo('template_directory') ?>/assets/image/帯.png" alt="帯背景">

    </div>

    <div class="container">

        <h2 class="section-title"><?php the_field('message_from_ceo_title') ?></h2>

        <div class="message-block-wrapper">

            <div class="message-image-wrapper">

                <!-- Ảnh chính -->

                <img src="<?php the_field('message_from_ceo_banner') ?>" alt="<?php the_field('message_from_ceo_title') ?>" class="message-photo">

                <!-- Text overlay -->

                <div class="message-overlay-wrapper">

                    <div class="message-overlay">

                        <?php the_field('message_from_ceo_banner_content') ?>

                    </div>

                </div>

                <!-- Viền trang trí -->

                <img src="<?php bloginfo('template_directory') ?>/assets/image/長方形 5.png" alt="viền trên" class="overlay-decor overlay-bottom">

                <img src="<?php bloginfo('template_directory') ?>/assets/image/長方形 6.png" alt="viền dưới" class="overlay-decor-top overlay-top">

            </div>



            <div class="message-box">

                <?php the_field('message_from_ceo_message') ?>

            </div>

        </div>

    </div>



</section>



<section class="section-heading-table" id="company-profile">

    <div class="section-header">

        <img class="section-bg" src="<?php bloginfo('template_directory') ?>/assets/image/帯.png" alt="帯背景">

    </div>

    <div class="container">

        <h2 class="section-title"><?php the_field('company_profile_title') ?></h2>

        <div class="company-table-wrapper">

            <?php the_field('company_profile_content') ?>

        </div>

    </div>

</section>



<section class="section-heading-history" id="history">

    <div class="section-header">

        <img class="section-bg" src="<?php bloginfo('template_directory') ?>/assets/image/帯.png" alt="帯背景">

    </div>

    <div class="container">

        <h2 class="section-title"><?php the_field('about_history_title') ?></h2>

        <div class="history-table-wrapper">

            <?php the_field('about_history_content') ?>

        </div>

    </div>

</section>



<section class="section-orgchart" id="organization-chart">

    <div class="section-header">

        <img class="section-bg" src="<?php bloginfo('template_directory') ?>/assets/image/帯.png" alt="背景">

    </div>

    <div class="container">

        <h2 class="section-title"><?php the_field('organization_chart_title') ?></h2>

        <div class="route-block-wrapper">

            <div class="org-chart">

                <div class="org-node ceo"><?php the_field('organization_chart_level_1') ?></div>

                <div class="org-branches">

                    <?php 

                    if( have_rows('organization_chart_level_2') ):

                        while( have_rows('organization_chart_level_2') ) : the_row();

                            $title = get_sub_field('title');

                            echo '<div class="org-node mid">'. $title .'</div>';

                        endwhile;

                    endif;

                    ?>

                </div>

                <div class="org-branches lower">

                    <?php 

                    if( have_rows('organization_chart_level_3') ):

                        while( have_rows('organization_chart_level_3') ) : the_row();

                            $title = get_sub_field('title');

                            echo '<div class="org-node">'. $title .'</div>';

                        endwhile;

                    endif;

                    ?>

                </div>

            </div>

        </div>

    </div>

</section>





<section class="section-customer" id="major-clients">

    <div class="section-header">

        <img class="section-bg" src="<?php bloginfo('template_directory') ?>/assets/image/帯.png" alt="背景">

    </div>

    <div class="container">

        <h2 class="section-title"><?php the_field('major_clients_title') ?></h2>

        <div class="route-block-wrapper">

            

        </div>

    </div>

</section>





<?php

get_footer();

