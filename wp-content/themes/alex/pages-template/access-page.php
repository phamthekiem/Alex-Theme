<?php

/**

 * Template Name: Access page

 *

 *

 * @link https://codex.wordpress.org/Template_Hierarchy

 *

 * @package SH_Theme

 */



get_header(); ?>


<section class="about">
	<div class="about-avatar">
		<div class="access-bg" style="background-image:url('<?php the_field('access_page_banner') ?>');"></div>
		<div class="overlay-about">
			<div class="about-left-text">
				<h2><?php the_field('access_page_banner_content') ?></h2>
			</div>
			<div class="about-right-text">
				<span class="company-info"><?php the_field('access_page_banner_description') ?></span>
				<h1 class="about-heading text-uppercase"><?php the_title() ?></h1>
			</div>
		</div>
	</div>
</section>
<nav class="submenu-tabs">
	<div class="container">
		<ul>
			<li>
				<a href="#tokyo-head-office">
					<?php pll_e('Trụ sở chính Tokyo'); ?>
				</a>
			</li>
			<li>
				<a href="#shimane-branch">
					<?php pll_e('Chi nhánh Shimane'); ?>
				</a>
			</li>
			<li>
				<a href="#vietnam-studio">
					<?php pll_e('Văn phòng Việt Nam'); ?>
				</a>
			</li>
		</ul>
	</div>
</nav>

<section class="access-map">
    <div class="container">
		<div data-wow-delay=".2s">
			<div class="footer-classic-gmap">
				<div class="google-map-container" style="height: 500px; overflow: hidden;">
					<?php 
					$gmap = get_field('access_page_gg_map');
					echo $gmap;
					?>
				</div>
			</div>
		</div>
    </div>
</section>

<!-- Location -->
<section class="recruit-heading" id="tokyo-head-office">
	<div class="recruit-header">
		<img class="recruit-bg" src="<?php bloginfo('template_directory') ?>/assets/image/グループ 19.png" alt="帯背景">
	</div>

	<div class="subtitle-frame-wrapper-recruit">
		<img class="subtitle-frame-recruit" src="<?php bloginfo('template_directory') ?>/assets/image/グループ 27.png" alt="Subtitle Frame">
		<span class="subtitle-text-recruit">
			<?php pll_e('Trụ sở chính tại Tokyo'); ?>
		</span>
	</div>
    <div class="container">
		<div class="address-wrapper">
			<div class="address-box">
				<div class="address-main"><?php the_field('tokyo_head_office_address') ?></div>
				<?php if( have_rows('tokyo_head_office_travel') ) : ?>
					<div class="station-list">
						<?php 
						$i = 0;
						while( have_rows('tokyo_head_office_travel') ) : the_row();
						$metro = get_sub_field('metro');
						$line = get_sub_field('line');
						$time = get_sub_field('time');
						$video_youtube_iframe = get_sub_field('video_youtube_iframe');
						?>
							<div class="station-item">
								<span class="linestream"><?php echo $metro; ?></span>
								<span class="station"><?php echo $line ?></span>
								<span class="time"><?php echo $time; ?></span>
								<img src="<?php bloginfo('template_directory') ?>/assets/image/グループ 213.png"
								class="arrow-icon" data-index="<?php echo $i; ?>" data-start="0">
							</div>
						<?php $i++; endwhile; ?>	
					</div>
				<?php endif; ?>
				<p class="note">
					<?php the_field('tokyo_head_office_note') ?>
				</p>
			</div>

			<?php if( have_rows('tokyo_head_office_travel') ) : ?>
				<div class="building-video">
					<div class="video-wrapper">
						<img src="<?php the_field('tokyo_head_office_banner') ?>" alt="Building" class="default-building-img">
						<!-- iframe YouTube -->
						<div class="station-list">
							<?php 
							while( have_rows('tokyo_head_office_travel') ) : the_row();
								$video_youtube_iframe = get_sub_field('video_youtube_iframe');
								echo $video_youtube_iframe;
							endwhile; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>	
		</div>
	</div>
</section>

<!--  -->
<section class="recruit-heading" id="shimane-branch">
	<div class="recruit-header">
		<img class="recruit-bg" src="<?php bloginfo('template_directory') ?>/assets/image/グループ 19.png" alt="帯背景">
	</div>
	<div class="subtitle-frame-wrapper-recruit">
		<img class="subtitle-frame-recruit" src="<?php bloginfo('template_directory') ?>/assets/image/グループ 27.png" alt="Subtitle Frame">
		<span class="subtitle-text-recruit">
			<?php pll_e('Chi nhánh Shimane'); ?>
		</span>
	</div>

    <div class="container">
		<div class="address-wrapper">
			<div class="address-box">
				<div class="address-main"><?php the_field('shimane_branch_address') ?></div>
				<?php if( have_rows('shimane_branch_travel') ) : ?>
					<div class="station-list">
						<?php 
						$i = 0;
						while( have_rows('shimane_branch_travel') ) : the_row();
						$metro = get_sub_field('metro');
						$line = get_sub_field('line');
						$time = get_sub_field('time');
						$video_youtube_iframe = get_sub_field('video_youtube_iframe');
						?>
							<div class="station-item">
								<span class="linestream"><?php echo $metro; ?></span>
								<span class="station"><?php echo $line ?></span>
								<span class="time"><?php echo $time; ?></span>
								<img src="<?php bloginfo('template_directory') ?>/assets/image/グループ 213.png"
								class="arrow-icon" data-index="<?php echo $i; ?>" data-start="0">
							</div>
						<?php $i++; endwhile; ?>	
					</div>
				<?php endif; ?>	
			</div>
		</div>

		<div class="address-wrapper-001">
			<div class="address-box-001">
				<div data-wow-delay=".2s">
					<div class="footer-classic-gmap">
						<div class="google-map-container" style="height: 350px; overflow: hidden;">
							<?php 
							$shimane_branch_ggmap = get_field('shimane_branch_ggmap');
							echo $shimane_branch_ggmap;
							?>
						</div>
					</div>
				</div>
			</div>

			<?php if( have_rows('shimane_branch_travel') ) : ?>
				<div class="building-video">
					<div class="video-wrapper">
						<img id="defaultImage"
						src="<?php the_field('shimane_branch_banner') ?>"
						alt="Building"
						class="default-building-img">
						<!-- iframe YouTube -->
						<div class="station-list">
							<?php 
							while( have_rows('shimane_branch_travel') ) : the_row();
								$video_youtube_iframe = get_sub_field('video_youtube_iframe');
								echo $video_youtube_iframe;
							endwhile; ?>
						</div>	
					</div>
				</div>
			<?php endif; ?>	
		</div>
	</div>
</section>

<section class="recruit-heading" id="vietnam-studio">
	<div class="recruit-header">
		<img class="recruit-bg" src="<?php bloginfo('template_directory') ?>/assets/image/グループ 19.png" alt="帯背景">
	</div>
	<div class="subtitle-frame-wrapper-recruit">
		<img class="subtitle-frame-recruit" src="<?php bloginfo('template_directory') ?>/assets/image/グループ 27.png" alt="Subtitle Frame">
		<span class="subtitle-text-recruit">
			<?php pll_e('Văn phòng Việt Nam'); ?>
		</span>
	</div>

    <div class="container">
		<div class="address-wrapper">
			<div class="address-box">
				<div class="address-main" style="border-bottom: none;padding:0;margin:0;">
					<?php the_field('vietnam_studio_address') ?>
				</div>
			</div>
		</div>
    	<div class="address-wrapper-001">
			<div class="address-box-001">
				<div data-wow-delay=".2s">
					<div class="footer-classic-gmap">
						<div class="google-map-container" style="height: 350px; overflow: hidden;">
							<?php 
							$vietnam_studio_ggmap = get_field('vietnam_studio_ggmap');
							echo $vietnam_studio_ggmap;
							?>
						</div>
					</div>
				</div>
			</div>

      		<div class="building-video">
				<div class="video-wrapper">
					<img src="<?php the_field('vietnam_studio_banner') ?>" 
					alt="Building" 
					class="default-building-img">
				</div>
      		</div>
      	</div>
    </div>
</section>


<?php

get_footer();