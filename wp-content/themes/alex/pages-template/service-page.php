<?php
/**
 * Template Name: Service page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SH_Theme
 */

get_header(); ?>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/service-page.css">

<section class="about">
    <div class="about-avatar">
        <!-- Ảnh nền tự động chuyển bằng CSS -->
        <div class="service-bg" style="background-image:url('../image/レイヤー 735.png');"></div>

        <div class="overlay-about">
        <!-- Bên trái: câu khẩu hiệu -->
        <div class="about-left-text">
            <h2>枠にとらわれない<br>創造力で<br>未来をデザイン<br></h2> 
        </div>
        <!-- Bên phải: SERVICE + 事業内容 -->
        <div class="about-right-text">
            <span class="company-info">事業内容</span>
            <h1 class="about-heading">SERVICE</h1>
        </div>
        </div>
    </div>
    </section>

    <nav class="submenu-tabs">
    <div class="container"></div>
    </nav>

    <section class="creation-tech-section">
    <div class="container">
        <div class="creation-tech-box">
        <h2 class="creation-title">CREATION<span class="symbol">X</span>TECHNOLOGY</h2>
        <p class="creation-description">
            ALEXは企画立案から映像制作、プログラムまで全ての作業をワンストップで対応できます。<br>
            しがらみにとらわれない自由な発想と作業効率を考えたシステム・アプリ開発。<br>
            クリエイティブとテクノロジーの融合により、常に新しい価値を生み出し続けます。
        </p>
        </div>
    </div>
    </section>
    <section class="video-section">
    <div class="sg-header">
        <img class="sg-bg" src="../image/グループ 19.png" alt="Green Diagonal BG">
    </div>
    <div class="container">
        <div class="box-wrapper">
        
        <div class="subtitle-frame-wrapper">
            <img class="subtitle-frame" src="../image/グループ 27.png" alt="Subtitle Frame">
            <span class="subtitle-text">映像制作</span>
        </div>

        <img class="box-bg" src="../image/グループ 28.png" alt="Box Frame BG">
        <div class="subtitle-spacer"></div>
        <div class="info-box">
            <div class="info-content">
            <p>
                映像・演出提案含め映像完成まで全ての工程において対応可能です。<br>
                2Dアニメーション制作のみ協力会社様と連携し制作いたします。
            </p>
            </div>
        </div>
        </div>
    </div>
    </section>

    <section class="video-section">
    <div class="sg-header">
        <img class="sg-bg" src="../image/グループ 19.png" alt="Green Diagonal BG">
    </div>
    <div class="container">
        <div class="box-wrapper">
        
        <div class="subtitle-frame-wrapper">
            <img class="subtitle-frame" src="../image/グループ 27.png" alt="Subtitle Frame">
            <span class="subtitle-text">実装・プログラミング</span>
        </div>

        <img class="box-bg" src="../image/グループ 28.png" alt="Box Frame BG">
        <div class="subtitle-spacer"></div>
        <div class="info-box">
            <div class="info-content">
            <p>
            市場動向に応じて仕様が頻繁に変更されるプログラム開発において、実装スピードと品質確保の両立が極めて重要です。<br>
            効率的な役割分担とツール活用による柔軟な開発体制、<br>
            そして多層的な品質管理プロセスによって、迅速かつ不具合のない実装を実現します。
            </p>
            
            </div>
        </div>
        </div>
    </div>
    </section>

    <section class="video-section">
    <div class="sg-header">
        <img class="sg-bg" src="../image/グループ 19.png" alt="Green Diagonal BG">
    </div>
    <div class="container">
        <div class="box-wrapper">
        
        <div class="subtitle-frame-wrapper">
            <img class="subtitle-frame" src="../image/グループ 27.png" alt="Subtitle Frame">
            <span class="subtitle-text">システム・ツール開発</span>
        </div>

        <img class="box-bg" src="../image/グループ 28.png" alt="Box Frame BG">
        <div class="subtitle-spacer"></div>
        <div class="info-box">
            <div class="info-content">
            <p>
            高品質な製品開発の実現に向けツール活用による効率化と人的ミス低減に注力しています。<br>
            その取り組みとして、先進的なツールを開発しています。
            </p>
            </div>
        </div>
        </div>
    </div>
    </section>

    <section class="video-section">
    <div class="sg-header">
        <img class="sg-bg" src="../image/グループ 19.png" alt="Green Diagonal BG">
    </div>
    <div class="container">
        <div class="box-wrapper">
        
        <!-- Subtitle frame được đưa vào trong box-wrapper để giữ đúng vị trí -->
        <div class="subtitle-frame-wrapper">
            <img class="subtitle-frame" src="../image/グループ 27.png" alt="Subtitle Frame">
            <span class="subtitle-text">企画</span>
        </div>

        <img class="box-bg" src="../image/グループ 28.png" alt="Box Frame BG">
        <div class="subtitle-spacer"></div>
        <div class="info-box">
            <div class="info-content">
            <p>
            豊富な経験に裏打ちされた企画力で、ゲーム性・演出・出玉設計から仕様・申請書類の作成まで、すべての工程に対応可能。<br> 
            市場動向やユーザー志向をふまえた提案で、確実な開発と高い完成度を実現します。<br>
            リリースまで一貫してお任せいただける安心の体制で、ヒット機種づくりをサポートします。 
            </p>
            </div>
        </div>
        </div>
    </div>
</section>

<?php
get_footer();