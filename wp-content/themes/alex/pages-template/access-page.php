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

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/contact-page.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/access-page.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/voices-page.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/job-openings-page.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/comments-top-page.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/company-events-page.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/recruit-page.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/results-page.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/work-page.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/service-page.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/about-page.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/top-page.css">

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
					<?php if(pll_current_language() == 'ja') {
						echo '東京本社';
					} else {
						echo 'Trụ sở chính Tokyo';
					} ?>
				</a>
			</li>
			<li>
				<a href="#shimane-branch">
					<?php if(pll_current_language() == 'ja') {
						echo '島根支社';
					} else {
						echo 'Chi nhánh Shimane';
					} ?>
				</a>
			</li>
			<li>
				<a href="#vietnam-studio">
					<?php if(pll_current_language() == 'ja') {
						echo 'ベトナムスタジオ';
					} else {
						echo 'Văn phòng Việt Nam';
					} ?>
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

<section class="recruit-heading" id="tokyo-head-office">
	<div class="recruit-header">
		<img class="recruit-bg" src="../image/グループ 19.png" alt="帯背景">
	</div>

	<div class="subtitle-frame-wrapper-recruit">
		<img class="subtitle-frame-recruit" src="../image/グループ 27.png" alt="Subtitle Frame">
		<span class="subtitle-text-recruit">東京本社</span>
	</div>
    <div class="container">
		<div class="address-wrapper">
		<div class="address-box">
			<p class="address-main">〒114-0024<br>東京都北区西ケ原1-46-13 横河駒込ビル1F</p>
			<div class="station-list">
				<div class="station-item">
				<span class="linestream">東京メトロ南北線</span>
				<span class="station">西ケ原駅</span>
				<span class="time">徒歩 7分</span>
				<img src="../image/グループ 213.png" 
					alt="icon" 
					class="arrow-icon" 
					data-video="JTw-zfq0j6c">
			</div>

			<div class="station-item">
				<span class="linestream">JR京浜東北線</span>
				<span class="station">上中里駅</span>
				<span class="time">徒歩10分</span>
				<img src="../image/グループ 213.png" 
					alt="icon" 
					class="arrow-icon" 
					data-video="vRphJf_s7jM">
			</div>

			<div class="station-item">
				<span class="linestream">JR山手線</span>
				<span class="station">駒込駅</span>
				<span class="time">徒歩10分</span>
				<img src="../image/グループ 213.png" 
					alt="icon" 
					class="arrow-icon" 
					data-video="TFi7vk8NPls">
			</div>
			</div>
			<p class="note">
			<span class="highlight">※ 当社ビルには駐車場のご用意がございません</span><br>
			お車でお越しの際は、近隣のコインパーキングをご利用下さい。
			</p>
		</div>

		<div class="building-video">
			<div class="video-wrapper">
			<img id="defaultImage" src="../image/レイヤー 850.png" alt="Building" class="default-building-img">
			<iframe
				id="officeVideo"
				src="https://www.youtube.com/embed/JTw-zfq0j6c?rel=0"
				title="Office video"
				allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
				allowfullscreen
				loading="lazy"
				style="display:none;"
			></iframe>
			</div>
		</div>
		</div>
  	</div>
</section>

<section class="recruit-heading" id="shimane-branch">
  <div class="recruit-header">
    <img class="recruit-bg" src="../image/グループ 19.png" alt="帯背景">
  </div>

  <div class="subtitle-frame-wrapper-recruit">
    <img class="subtitle-frame-recruit" src="../image/グループ 27.png" alt="Subtitle Frame">
    <span class="subtitle-text-recruit">島根支社</span>
  </div>
    <div class="container">
    <div class="address-wrapper">
      <div class="address-box">
        <p class="address-main">〒690-0003<br> 島根県松江市朝日町字伊勢宮477-17 松江SUNビル2F</p>
        <div class="station-list">
            <div class="station-item">
            <span class="linestream">ＪＲ山陰本線</span>
            <span class="station">松江駅</span>
            <span class="time">徒歩 2分</span>
            <img src="../image/グループ 213.png" 
                alt="icon" 
                class="arrow-icon" 
                data-video="h5B4Rvo3W9Q">
          </div>

          <div class="station-item">
            <span class="linestream">出雲縁結び空港</span>
            <span class="station">高速バス</span>
            <span class="time">40分</span>
            <img src="../image/グループ 213.png" 
                alt="icon" 
                class="arrow-icon" 
                data-video="rBUeLYgzTOo">
          </div>

          <div class="station-item">
            <span class="linestream">米子鬼太郎空港</span>
            <span class="station">高速バス</span>
            <span class="time">45分</span>
            <img src="../image/グループ 213.png" 
                alt="icon" 
                class="arrow-icon" 
                data-video="bQL2VQRdLzI">
          </div>
        </div>
        </div>
    </div>
    <div class="address-wrapper-001">
        <div class="address-box-001">
            <div data-wow-delay=".2s">
            <div class="footer-classic-gmap">
              <div class="google-map-container" style="height: 350px; overflow: hidden;">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d406.1992811001661!2d133.06221558295513!3d35.46483833605955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x355705c0e42c45dd%3A0xaf4da2ec82489406!2z5p2-5rGfU1VO44OT44Or!5e0!3m2!1sja!2s!4v1754984215155!5m2!1sja!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
            </div>
        </div>
      <div class="building-video">
        <div class="video-wrapper">
              <img id="defaultImage" 
         src="../image/レイヤー 893.png" 
         alt="Building" 
         class="default-building-img">
          <iframe
            id="officeVideo"
            src="https://www.youtube.com/embed/JTw-zfq0j6c?rel=0"
            title="Office video"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
            loading="lazy"
            style="display:none;"
          ></iframe>
        </div>
      </div>
      </div>
    </div>
</section>

<section class="recruit-heading" id="vietnam-studio">
  <div class="recruit-header">
    <img class="recruit-bg" src="../image/グループ 19.png" alt="帯背景">
  </div>

  <div class="subtitle-frame-wrapper-recruit">
    <img class="subtitle-frame-recruit" src="../image/グループ 27.png" alt="Subtitle Frame">
    <span class="subtitle-text-recruit">ベトナムスタジオ</span>
  </div>
    <div class="container">
    <div class="address-wrapper">
      <div class="address-box">
        <p class="address-main" style="border-bottom: none;padding:0;margin:0;">5F, AC Building, No.3, Lane 78, Duy Tan Str,<br>Dich Vong Hau Ward, Cau Giay Dist, Hanoi, Vietnam</p>
        </div>
    </div>
    <div class="address-wrapper-001">
        <div class="address-box-001">
            <div data-wow-delay=".2s">
            <div class="footer-classic-gmap">
              <div class="google-map-container" style="height: 350px; overflow: hidden;">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0069106653827!2d105.78050717596975!3d21.03240948765185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4b44cd1fa1%3A0x128bd46360fd9b79!2sAC%20Building!5e0!3m2!1sen!2s!4v1754990366467!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
            </div>
        </div>
      <div class="building-video">
        <div class="video-wrapper">
              <img src="../image/レイヤー 895.png" 
         alt="Building" 
         class="default-building-img">
        </div>
      </div>
      </div>
    </div>
</section>

<?php
get_footer();