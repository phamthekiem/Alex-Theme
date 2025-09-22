<?php
/**
 * Template for Product Library Archive
 * File: archive-product-library.php
 */

get_header(); 

$taxonomy = 'product-library-category'; 

$top_terms = get_terms([
    'taxonomy'   => $taxonomy,
    'hide_empty' => false,
    'parent'     => 0,
    'orderby'    => 'name',
    'order'      => 'DESC', 
]);

?>
<style>
    .video-wrapper.video-type-file {
        padding: 0;
        width: 100%;
        height: 100%;
        object-fit: contain; 
        aspect-ratio: 16/9;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<div class="submenu-tabs-3">
    <div class="container-2">
        <span class="main-title-staff">
            <?php pll_e('Thư viện video'); ?>
        </span>
    </div>
</div>

<nav class="submenu-tabs-1">
</nav>

<div class="app" id="app">
    
    <div class="sidebar-wrapper">
        <aside class="sidebar" aria-label="Navigation">
            <div class="sidebar__scroll" id="navScroll">
                <button class="help-btn" id="helpBtn" title="Trợ giúp"><span>?</span></button>

                <nav class="catnav" id="catNav" aria-label="Thư mục video">
                    <ul class="catnav-root">
                        <?php if (!empty($top_terms) && !is_wp_error($top_terms)) : ?>
                            <?php $i = 0; foreach ($top_terms as $parent) : ?>
                                <?php
                                $children = get_terms([
                                    'taxonomy'   => $taxonomy,
                                    'hide_empty' => false,
                                    'parent'     => $parent->term_id,
                                    'orderby'    => 'name',
                                    'order'      => 'ASC',
                                ]);
                                $is_open = ($i === 0) ? ' is-open' : '';
                                $aria    = ($i === 0) ? 'true' : 'false';
                                ?>
                                <li class="cat<?php echo $is_open; ?>" data-cat="<?php echo esc_attr($parent->slug); ?>">
                                    <button class="cat-toggle" aria-expanded="<?php echo $aria; ?>">
                                        <span class="label"><?php echo esc_html($parent->name); ?></span>
                                    </button>
                                    <?php if ($children) { ?>
                                        <ul class="sub"<?php echo ($i === 0) ? '' : ' style="display:none;padding-left: 15px;"'; ?>>
                                            <?php if (!empty($children) && !is_wp_error($children)) : ?>
                                                <?php foreach ($children as $child) : ?>
                                                    <li>
                                                        <button class="sub-link"
                                                            data-cat="<?php echo esc_attr($parent->slug); ?>"
                                                            data-sub="<?php echo esc_attr($child->slug); ?>">
                                                            <?php echo esc_html($child->name); ?>
                                                        </button>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    <?php } ?>    
                                </li>
                            <?php $i++; endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- <button class="collapse-btn" id="collapseBtn" aria-label="Thu gọn/ Mở rộng nav" title="Thu gọn/ Mở rộng">
            <i class="fas fa-angle-double-left"></i>
        </button> -->
    </div>

    <main class="content" id="content" aria-live="polite">
        <div class="pager" id="pager"></div>  
        <div class="grid" id="videoGrid">
            <?php
            $args = [
                'post_type'      => 'production-library',
                'posts_per_page' => -1,
            ];
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();

                    $terms = wp_get_post_terms(get_the_ID(), 'product-library-category');
                    $cat_slug = '';
                    $sub_slug = '';
                    if ($terms && !is_wp_error($terms)) {
                        $cat_slug = $terms[0]->slug;
                        if (!empty($terms[0]->parent)) {
                            $parent = get_term($terms[0]->parent, 'product-library-category');
                            $cat_slug = $parent ? $parent->slug : $cat_slug;
                            $sub_slug = $terms[0]->slug;
                        } else {
                            $cat_slug = $terms[0]->slug;
                            $sub_slug = $terms[0]->slug;
                        }
                    }
                    
                    ?>
                    <article class="video-card" 
                            data-cat="<?php echo esc_attr($cat_slug); ?>" 
                            data-sub="<?php echo esc_attr($sub_slug); ?>">
                        <div class="video-card__title"><?php the_title(); ?></div>
                        <?php 
                        $product_video = get_field('product_video_type');
                        if ( $product_video ) {
                            $video_type = $product_video['video_type'] ?? 'url';
                            $wrapper_class = 'video-wrapper video-type-' . $video_type;
                            
                            echo '<div class="'.esc_attr($wrapper_class).'">';
                                $video_type = $product_video['video_type'] ?? 'url';
                                if ( $video_type === 'url' && !empty($product_video['video_url']) ) {
                                    $video_url = $product_video['video_url'];
                                    if (strpos($video_url, 'youtube.com/watch?v=') !== false) {
                                        $video_id  = explode('v=', $video_url)[1];
                                        $video_id  = strtok($video_id, '&'); 
                                        $video_url = 'https://www.youtube.com/embed/' . $video_id;
                                    }
                                    echo '<iframe width="560" height="315" src="'.esc_url($video_url).'" frameborder="0" allowfullscreen></iframe>';
                                }

                                if ( $video_type === 'file' && !empty($product_video['video_file']['url']) ) {
                                    echo '<video controls playsinline preload="metadata" width="560" height="315">
                                            <source src="'.esc_url($product_video['video_file']['url']).'" type="'.$product_video['video_file']['mime_type'].'">
                                        </video>';
                                }
                            echo '</div>';    
                        }
                        ?>
                    </article>
                <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </main>
</div>

<?php get_footer(); ?>