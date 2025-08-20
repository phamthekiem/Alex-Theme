<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SH_Theme
 */

get_header(); ?>

	<div id="primary" class="content-sidebar-wrap">

		<?php do_action( 'before_main_content' ) ?>
		
		<main id="main" class="site-main" role="main">

			<?php do_action( 'before_loop_main_content' ) ?>

			<?php
			if ( have_posts() ) : 

				// Title 
				echo '<h1 class="page-title">';
				single_term_title();
				echo '</h1>';
				the_archive_description( '<div class="archive-description">', '</div>' );
				
				// Settings Loop
				$new_post = new sh_blog_shortcode();
				$post_class = array( 'element', 'hentry', 'post-item', 'item-new' );
				$image_size = 'large';
				$atts['hide_category'] 		= '0';
				$atts['hide_desc'] 			= '1';
				$atts['hide_meta']			= '1';
				$atts['btn_viewmore']		= '0';
				$atts['number_character']	= '300';
				$post_class[] 				= 'col-md-12';
				$style 						= 'style-1';

				// Check hierarchy in theme options
				
				/* Start the Loop */
				echo '<div class="sh-blog-shortcode '. $style .'"><div class="row">';
					while ( have_posts() ) : the_post();
						echo $new_post->sh_general_post_html_style_2( $post_class, $atts, $image_size );
					endwhile;
				echo '</div></div>';
				shtheme_pagination();
				wp_reset_postdata();
				
				
			else :

				echo '<div class="mb-4 alert alert-info">' . __('The content is being updated','shtheme') . '</div>';
				
			endif; ?>

		</main><!-- #main -->

		<?php do_action( 'sh_after_content' );?>

	</div><!-- #primary -->

<?php
get_footer();
