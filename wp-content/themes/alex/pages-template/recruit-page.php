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

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/recruit-page.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/results-page.css">

<section class="about">
    <div class="about-avatar">
        <!-- Ảnh nền tự động chuyển bằng CSS -->
        <div class="service-bg" style="background-image:url('../image/画像_RECRUIT.png');"></div>

        <div class="overlay-about">
        <!-- Bên trái: câu khẩu hiệu -->
        <div class="about-left-text">
            <h2>あなたの想像を超える未来を<br>私たちと共に創りませんか？<br></h2> 
        </div>
        <!-- Bên phải: RECRUIT + 事業内容 -->
        <div class="about-right-text">
            <span class="company-info">事業内容</span>
            <h1 class="about-heading">RECRUIT</h1>
        </div>
        </div>
    </div>
</section>

<nav class="submenu-tabs-1">
    <div class="container">
        <ul>
        <li><a href="募集職種-page.html">募集職種</a></li>
        <li><a href="スタッフの声TOP-page.html">スタッフの声ＴＯＰ</a></li>
        </ul>
    </div>
</nav>

<section class="recruit-heading" id="代表メッセージ">
    <div class="recruit-header">
        <img class="recruit-bg" src="../image/グループ 19.png" alt="帯背景">
    </div>
    <!-- Subtitle frame được đưa vào trong box-wrapper để giữ đúng vị trí -->
    <div class="subtitle-frame-wrapper-recruit">
        <img class="subtitle-frame-recruit" src="../image/グループ 27.png" alt="Subtitle Frame">
        <span class="subtitle-text-recruit">募集職種</span>
    </div>
    <div class="container">
        <div class="creation-recruit-box">
            <div class="creation-recruit-left">
                <div class="image-frame">
                <img src="../image/写真.png" alt="Alex">
                </div>
            </div>
            <div class="creation-recruit-right">
                <h4 class="creation-recruit-title">
                    プロデューサー・映像ディレクター
                </h4>
                <div class="creation-recruit-content">
                    <p><strong>プロデューサー</strong><br>
                    社外案件の予算・進行管理、社内外のリソース管理などプロデュース業務をお任せします。</p>

                    <p><strong>映像ディレクター</strong><br>
                    ゲーム、CM、ぱちんこ・パチスロなどの映像企画・開発のディレクションをお任せします。</p>

                    <ul>
                    <li>映像制作チームのまとめ、制作進行管理。</li>
                    <li>協力会社とのディレクション。</li>
                    <li>映像品質管理</li>
                    
                    </ul>
            </div>
            <a href="募集職種-page.html" class="recruit-detail-btn">詳細はこちら</a>
        </div>
    </div>
    <div class="creation-recruit-box">
        <div class="creation-recruit-left">
            <div class="image-frame">
            <img src="../image/写真-301.png" alt="Alex">
            </div>
        </div>
        <div class="creation-recruit-right">
            <h4 class="creation-recruit-title">
                エフェクトデザイナー・コンポジター
            </h4>
            <div class="creation-recruit-content">
                <p>ゲーム、CM、ぱちんこ・パチスロなどの映像制作をお任せします。<br>
                2Dデザイナーや3Dデザイナーとも連携し、映像をより良く見せるためのエフェクト制作～<br>
                最終コンポジットまでの仕上げの部分をメインに担当いただきます。</p>

            </div>
            <a href="募集職種-page.html" class="recruit-detail-btn">詳細はこちら</a>
        </div>
    </div>
        <div class="creation-recruit-box">
    <div class="creation-recruit-left">
        <div class="image-frame">
            <img src="../image/写真-205.png" alt="Alex">
        </div>
    </div>
    <div class="creation-recruit-right">
        <h4 class="creation-recruit-title">
            2DCGデザイナー
        </h4>
        <div class="creation-recruit-content">
            <p>ゲーム、CM、ぱちんこ・パチスロなどの映像制作をお任せします。<br>
        背景、キャラ、インターフェイス、ロゴなど2D素材制作を担当いただきます。<br>
        演出企画では絵コンテ制作や見せ方考案にも関わっていただく場合もあります。<br>
        ※どれか1つでも得意分野があれば問題ありません。</p>
        </div>
        <a href="募集職種-page.html" class="recruit-detail-btn">詳細はこちら</a>
    </div>
    </div>
        <div class="creation-recruit-box">
    <div class="creation-recruit-left">
        <div class="image-frame">
        <img src="../image/写真-501.png" alt="Alex">
        </div>
    </div>
    <div class="creation-recruit-right">
        <h4 class="creation-recruit-title">
            3DCGデザイナー
        </h4>
        <div class="creation-recruit-content">
            <p>ゲーム、CM、ぱちんこ・パチスロなどの映像制作をお任せします。<br>
            小物、キャラ、背景、ロゴなど3Dモデリングからコンポジットまで担当いただきます。<br>
            コンテからのシーン構築など演出企画にも関わっていただくこともあります。
            ※どれか1つでも得意分野があれば問題ありません。</p>
        </div>
        <a href="募集職種-page.html" class="recruit-detail-btn">詳細はこちら</a>
    </div>
    </div>
        <div class="creation-recruit-box">
    <div class="creation-recruit-left">
        <div class="image-frame">
            <img src="../image/写真-220.png" alt="Alex">
        </div>
    </div>
    <div class="creation-recruit-right">
        <h4 class="creation-recruit-title">
            プログラマー
        </h4>
        <div class="creation-recruit-content">
            <p>大手メーカー様から直接ご依頼をいただき、演出企画、映像企画、出玉企画と連携しながら<br>
            プログラム開発を担当していただきます。</p>
        </div>
        <a href="募集職種-page.html" class="recruit-detail-btn">詳細はこちら</a>
    </div>
    </div>
        <div class="creation-recruit-box">
    <div class="creation-recruit-left">
        <div class="image-frame">
        <img src="../image/写真-491.png" alt="Alex">
        </div>
    </div>
    <div class="creation-recruit-right">
        <h4 class="creation-recruit-title">
            企画設計
        </h4>
        <div class="creation-recruit-content">
            <p>メーカーからの受託によるぱちんこ・パチスロ開発・管理に携わります。<br>
                新しいアイディアを出すだけでなく、完成まで司令塔として各担当と連携して開発を進めていきます。<br>
                情熱が命の仕事です。</p>

        </div>
        <a href="募集職種-page.html" class="recruit-detail-btn">詳細はこちら</a>
    </div>
    </div>
        <div class="creation-recruit-box">
    <div class="creation-recruit-left">
        <div class="image-frame">
        <img src="../image/写真-500.png" alt="Alex">
        </div>
    </div>
    <div class="creation-recruit-right">
        <h4 class="creation-recruit-title">
            出玉設計
        </h4>
        <div class="creation-recruit-content">
            <p>パチスロ機の出玉数・機械割などの計算。<br>
            数学的知識、統計学等の基礎知識のある方(数学に強い方)が最適です。</p>
        </div>
        <a href="募集職種-page.html" class="recruit-detail-btn">詳細はこちら</a>
    </div>
    </div>
    </div>
</section>

<?php
get_footer();