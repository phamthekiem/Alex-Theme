<?php
/**
 * Template Name: Home page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SH_Theme
 */

get_header(); ?>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/top-page.css">
	<!-- Banner -->
	<section class="hero">
		<div class="hero-bg" style="background-image: url('<?php the_field('home_banner_image') ?>')"></div>
		<div class="overlay">
			<div class="hero-content">
				<?php the_field('home_banner_content') ?>
			</div>
		</div>
		<div class="recruit-banner">
			<img src="<?php bloginfo('template_directory') ?>/assets/image/ライン.png" alt="Line" class="layer line">
			<img src="<?php bloginfo('template_directory') ?>/assets/image/バナー.png" alt="Banner" class="layer banner">
			<img src="<?php bloginfo('template_directory') ?>/assets/image/半透明.png" alt="Overlay" class="layer overlay-1">
			<div class="overlay-box-side">
				<?php the_field('home_banner_recruit') ?>
			</div>
			</div>
	</section>

	<!-- News -->
	<section class="news-section">
		<div class="container">
			<div class="news-grid">
				<div class="news-box">
					<h2 class="news-title">
						<?php if(pll_current_language() == 'ja') {
						echo 'NEWS';
						} else {
							echo 'Tin tức';
						} ?>
					</h2>
					<div class="news-scroll-wrapper">
						<div class="news-list" id="newsList">
							<?php 
							$args = array( 
								'post_type' => 'post',
								'posts_per_page' => 10,
							);
							$getposts = new WP_query( $args);
							while ($getposts->have_posts()) : $getposts->the_post(); 
							?>
								<div class="news-item">
									<div class="news-date"><?php the_time('Y.m.d') ?></div>
									<div class="news-content">
										<?php the_title() ?>
									</div>
								</div>
							<?php endwhile;  wp_reset_postdata(); ?>
						</div>
						<div class="scroll-buttons">
							<button class="scroll-btn up" onclick="scrollNews(-1)">
								<svg viewBox="0 0 10 6"><path d="M1 5L5 1L9 5"/></svg>
							</button>
							<button class="scroll-btn down" onclick="scrollNews(1)">
								<svg viewBox="0 0 10 6"><path d="M1 1L5 5L9 1"/></svg>
							</button>
						</div>
					</div>
				</div>

				<?php if( have_rows('home_access') ): ?>
					<div class="news-side">
						<?php 
						while( have_rows('home_access') ) : the_row();
						$title = get_sub_field('title');
						$description = get_sub_field('description');
						$image = get_sub_field('image');
						$url = get_sub_field('url');
						?>
							<a href="<?php echo $url; ?>" class="side-link with-text">
								<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
								<div class="overlay-box">
									<div class="line1"><?php echo $title; ?></div>
									<div class="line2"><?php echo $description; ?></div>
								</div>
							</a>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>	
			</div>
		</div>
	</section> 

	<!-- List page -->
	<?php if( have_rows('home_page_items') ): ?> 
		<section class="top-page-menu">
			<div class="container-menu">
				<div class="menu-grid">
					<?php 
					while( have_rows('home_page_items') ) : the_row();
					$title = get_sub_field('title');
					$sub_title = get_sub_field('sub_title');
					$image = get_sub_field('image');
					$url = get_sub_field('url');
					?>
						<a class="menu-item" href="<?php echo $url; ?>" style="background-image: url(<?php bloginfo('template_directory') ?>/assets/image/元素材.png)">
							<div class="menu-left">
								<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" class="about-avatar">
								<img src="<?php bloginfo('template_directory') ?>/assets/image/長方形 4.png" alt="About" class="layer about-layer">
							</div>
							<div class="menu-right">
								<p class="sub-title"><?php echo $sub_title; ?></p>
								<h2 class="menu-title" data-text="ABOUT"><?php echo $title; ?></h2> 
							</div>
						</a>
					<?php endwhile; ?>
				</div>
			</div>
		</section> 
	<?php endif; ?>	
	
	<script>
	document.addEventListener("DOMContentLoaded", function () {
		const list = document.getElementById("newsList");
		let isScrolling = false;

		window.scrollNews = function (direction) {
		if (!list || isScrolling) return;

		const scrollAmount = 100;
		isScrolling = true;

		list.scrollBy({
			top: direction * scrollAmount,
			behavior: 'smooth'
		});

		// Khoảng delay nhẹ để tránh spam cuộn
		setTimeout(() => {
			isScrolling = false;
		}, 300); // khớp với smooth animation
		};
	});
	</script>

<?php
get_footer();
