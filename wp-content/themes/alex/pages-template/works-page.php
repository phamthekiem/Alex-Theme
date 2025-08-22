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

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/work-page.css">

<section class="about">
    <div class="about-avatar">
        <!-- Ảnh nền tự động chuyển bằng CSS -->
        <div class="about-bg bg1" style="background-image:url('../image/レイヤー 852.png');"></div>
        <div class="about-bg bg2" style="background-image:url('../image/レイヤー 851.png');"></div>
        <div class="about-bg bg3" style="background-image:url('../image/グループ 2.png');"></div>
        <div class="overlay-about">
        <!-- Bên trái: câu khẩu hiệu -->
        <div class="about-left-text">
            <!-- <h2>成長に終わりはない<br>常に先を見て<br>常に変わっていく<br></h2> -->
        </div>
        
        <!-- Bên phải: ABOUT + 会社情報 -->
        <div class="about-right-text">
            <span class="company-info">制作実績</span>
            <h1 class="about-heading">WORK</h1>
        </div>
        </div>
    </div>
    </section>

    <nav class="submenu-tabs">
    <div class="container"></div>
    </nav>

    <section class="works-section">
    <div class="works-content">
        <div class="works-image-wrapper">
        <a href="制作ライブラリ-page.html" class="works-image-link">
            <img class="works-main" src="../image/制作ライブラリ.png" alt="制作ライブラリ">
            <div class="works-title">制作ライブラリ</div>
        </a>
        </div>

        <a class="works-text" href="過去開発実績-page.html">≫≫ 過去開発実績はこちら</a>

        <!-- Nút nhỏ đặt ngay trong content -->
        <div class="work-link-wrapper">
        <a href="社内イベント-page.html" class="work-link with-text">
            <img src="./image/グループ 11.png" alt="社内イベント">
            <div class="overlay-box-work">
            <div class="line5">社内イベント</div>
            <div class="line6">ページはこちら</div>
            </div>
        </a>
        </div>
    </div>
</section>

<?php
get_footer();