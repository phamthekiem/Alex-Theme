<?php
/**
 * Template Name: Contact Page
 *
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
			while ( have_posts() ) : the_post();

				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						
						<div class="row">
							<div class="col-sm-5 col-12">
								<div class="contact-page-form">
									<?php echo do_shortcode( '[contact-form-7 id="b2630e2" title="Contact"]' );?>
								</div>
							</div>
							<div class="col-sm-7 col-12">
									
							</div>
						</div>
					</div><!-- .entry-content -->
					
				</article><!-- #post-## -->
				<?php

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
		
		<?php do_action( 'sh_after_content' );?>

	</div><!-- #primary -->

<?php
get_footer();
