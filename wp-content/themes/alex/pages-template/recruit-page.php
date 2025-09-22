<?php

/**

 * Template Name: Recruit page

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

        <div class="service-bg" style="background-image:url('<?php the_field('recruit_page_banner') ?>');"></div>



        <div class="overlay-about">

        <!-- Bên trái: câu khẩu hiệu -->

        <div class="about-left-text">

            <h2><?php the_field('recruit_page_banner_content') ?></h2> 

        </div>

        <!-- Bên phải: RECRUIT + 事業内容 -->

        <div class="about-right-text">

            <span class="company-info"><?php the_field('recruit_page_banner_description') ?></span>

            <h1 class="about-heading text-uppercase"><?php the_title() ?></h1>

        </div>

        </div>

    </div>

</section>



<?php if( have_rows('recruit_page_menu_item') ): ?>

<nav class="submenu-tabs-1">

    <div class="container">

        <ul>

            <?php 

            while( have_rows('recruit_page_menu_item') ) : the_row();

                $title = get_sub_field('title');

                $url = get_sub_field('url');

            ?>

                <li><a href="<?php echo $url; ?>"><?php echo $title; ?></a></li>

            <?php endwhile; ?>    

        </ul>

    </div>

</nav>

<?php endif; ?>



<section class="recruit-heading" id="代表メッセージ">

    <div class="recruit-header">

        <img class="recruit-bg" src="<?php bloginfo('template_directory') ?>/assets/image/グループ 19.png" alt="帯背景">

    </div>

    <!-- Subtitle frame được đưa vào trong box-wrapper để giữ đúng vị trí -->

    <div class="subtitle-frame-wrapper-recruit">

        <img class="subtitle-frame-recruit" src="<?php bloginfo('template_directory') ?>/assets/image/グループ 27.png" alt="Subtitle Frame">

        <span class="subtitle-text-recruit"><?php the_field('recruit_page_list_title') ?></span>

    </div>

    <div class="container">



        <?php

        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

        $args = array(

            'post_type'      => 'recruit',   

            'posts_per_page' => get_field('recruit_list_number'),          

            'order'          => 'DESC',      

            'orderby'        => 'date',      

            'paged'          => $paged,

        );



        $query = new WP_Query( $args );



        if ( $query->have_posts() ) :

            while ( $query->have_posts() ) : $query->the_post(); ?>

                <div class="creation-recruit-box">

                    <div class="creation-recruit-left">

                        <div class="image-frame">

                            <?php the_post_thumbnail('large'); ?>

                        </div>

                    </div>

                    <div class="creation-recruit-right">

                        <h4 class="creation-recruit-title">

                            <?php the_title(); ?>

                        </h4>

                        <div class="creation-recruit-content">

                            <?php the_field('recruit_post_description') ?>

                        </div>

                        <a href="<?php the_permalink() ?>" class="recruit-detail-btn text-decoration-none">
                            <?php pll_e('Xem thêm'); ?>
                        </a>

                    </div>

                </div>

            <?php endwhile;

            wp_reset_postdata();

        else :

            echo '';

        endif;

        ?>



    </div>

</section>



<?php

get_footer();