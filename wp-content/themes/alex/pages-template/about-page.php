<?php
/**
 * Template Name: About page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SH_Theme
 */

get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/about-page.css">


<section class="about">
    <div class="about-avatar">
        <!-- Ảnh nền tự động chuyển bằng CSS -->
        <div class="about-bg bg1" style="background-image:url('../image/レイヤー 854.png');"></div>
        <div class="about-bg bg2" style="background-image:url('../image/レイヤー 851.png');"></div>

        <div class="overlay-about">
        <!-- Bên trái: câu khẩu hiệu -->
        <div class="about-left-text">
            <h2>成長に終わりはない<br>常に先を見て<br>常に変わっていく<br></h2>
        </div>
        
        <!-- Bên phải: ABOUT + 会社情報 -->
        <div class="about-right-text">
            <span class="company-info">会社情報</span>
            <h1 class="about-heading">ABOUT</h1>
        </div>
        </div>
    </div>
    </section>

    <nav class="submenu-tabs">
    <div class="container">
        <ul>
        <li><a href="#代表メッセージ">代表メッセージ</a></li>
        <li><a href="#会社概要">会社概要</a></li>
        <li><a href="#沿革">沿革</a></li>
        <li><a href="#組織図">組織図</a></li>
        <li><a href="#主要取引先">主要取引先</a></li>
        </ul>
    </div>
    </nav>


    <section class="section-heading" id="代表メッセージ">
    <div class="section-header">
        <img class="section-bg" src="../image/帯.png" alt="帯背景">
    </div>
    <div class="container">
        <h2 class="section-title">代表メッセージ</h2>
        <div class="message-block-wrapper">
        <div class="message-image-wrapper">
            <!-- Ảnh chính -->
            <img src="../image/社長写真.png" alt="代表者画像" class="message-photo">
            <!-- Text overlay -->
        <div class="message-overlay-wrapper">
            <div class="message-overlay">
                <p class="message-role">代表取締役社長</p>
                <p class="message-name"><strong>阿出川 敏朗</strong></p>
            </div>
        </div>
            <!-- Viền trang trí -->
            <img src="../image/長方形 5.png" alt="viền trên" class="overlay-decor overlay-bottom">
            <img src="../image/長方形 6.png" alt="viền dưới" class="overlay-decor-top overlay-top">
        </div>

        <div class="message-box">
            <p class="message-text">
            企画立案・プログラム開発・映像制作・音響制作を一貫して行います。<br>
            それぞれの部門にはプロフェッショナルな社員ばかりなので、<br>
            完成度はどれを取っても業界トップレベル。<br>

            その精度の高さが評価され<br>
            現在では大手メーカーからも絶大な信頼を獲得しています。<br>
            アレックスの商品レベルと会社の成長スピードに<br>
            業界の中では驚異だと恐れられています。<br><br>

            <span class="highlight">
                「私達にはまだまだやるべきことがあり、<br>
                私達アレックスにしか出来ない事がある！！」
            </span><br>

            今までの実績が私たちの自信に繋がっています!!<br>
            まだまだ私達には無限大の可能性が待っています!!<br><br>

            現在日本で100年以上続いている企業は一万は越えています。<br>
            アレックスの技術レベルを100年後も世に伝え続ける為、<br>
            世に愛される会社をこの仲間達と共に創り上げます！
            </p>
        </div>
        </div>
    </div>

    </section>

    <section class="section-heading-table" id="会社概要">
    <div class="section-header">
        <img class="section-bg" src="../image/帯.png" alt="帯背景">
    </div>
    <div class="container">
        <h2 class="section-title">会社概要</h2>
        <div class="company-table-wrapper">
        <table class="company-table">
            <tbody>
            <tr>
                <th>名称</th>
                <td>株式会社 ALEX</td>
            </tr>
            <tr>
                <th>設立</th>
                <td>2003年 4月</td>
            </tr>
            <tr>
                <th>代表</th>
                <td>阿出川 敏朗</td>
            </tr>
            <tr>
                <th>所在地</th>
                <td>
                【本社】<br>
                東京都北区西ケ原1-46-13 横河駒込ビル1F<br><br>
                【島根支社】<br>
                島根県松江市朝日町字伊勢宮477-17 松江SUNビル2F<br><br>
                【ベトナムスタジオ】<br>
                5F, AC Building, No.3, Lane 78, Duy Tan Str, Dich Vong Hau Ward, Cau Giay Dist, Hanoi, Vietnam
                </td>
            </tr>
            <tr>
                <th>TEL</th>
                <td>03-5972-1888（本社）<br>0852-25-7775（島根支社）</td>
            </tr>
            <tr>
                <th>FAX</th>
                <td>03-5972-1890</td>
            </tr>
            <tr>
                <th>資本金</th>
                <td>3000万円</td>
            </tr>
            <tr>
                <th>社員数</th>
                <td>68人</td>
            </tr>
            <tr>
                <th>取引先銀行</th>
                <td>三菱東京UFJ銀行<br>巣鴨信用金庫大塚支店</td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
    </section>

    <section class="section-heading-history" id="沿革">
    <div class="section-header">
        <img class="section-bg" src="../image/帯.png" alt="帯背景">
    </div>
    <div class="container">
        <h2 class="section-title">沿革</h2>
        <div class="history-table-wrapper">
        <table class="history-table">
            <tbody>
            <tr>
                <td class="year"><strong>2003年</strong><br><span>（平成15年）</span></td>
                <td class="month">4月</td>
                <td class="content">浅草橋にて有限会社アレックス設立</td>
            </tr>
            <tr>
                <td class="year"><strong>2004年</strong><br><span>（平成16年）</span></td>
                <td class="month">3月</td>
                <td class="content">大塚事務所に業務拡張のため、移転</td>
            </tr>
            <tr>
                <td class="year"><strong>2005年</strong><br><span>（平成17年）</span></td>
                <td class="month">7月</td>
                <td class="content">巣鴨事務所に業務拡張のため、移転</td>
            </tr>
            <tr>
                <td class="year"><strong>2007年</strong><br><span>（平成19年）</span></td>
                <td class="month">8月</td>
                <td class="content">西日暮里事務所に業務拡張のため、移転</td>
            </tr>
            <tr>
                <td class="year"><strong>2007年</strong><br><span>（平成19年）</span></td>
                <td class="month">10月</td>
                <td class="content">株式会社に登記変更</td>
            </tr>
            <tr>
                <td class="year"><strong>2011年</strong><br><span>（平成23年）</span></td>
                <td class="month">2月</td>
                <td class="content">大塚事務所に業務拡張のため、移転</td>
            </tr>
            <tr>
                <td class="year"><strong>2013年</strong><br><span>（平成25年）</span></td>
                <td class="month">2月</td>
                <td class="content">島根支社設立</td>
            </tr>
            <tr>
                <td class="year"><strong>2017年</strong><br><span>（平成29年）</span></td>
                <td class="month">8月</td>
                <td class="content">業務拡張のため、島根支社を朝日町に移転</td>
            </tr>
            <tr>
                <td class="year"><strong>2019年</strong><br><span>（令和1年）</span></td>
                <td class="month">6月</td>
                <td class="content">駒込事務所に業務拡張のため、移転</td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
    </section>

    <section class="section-orgchart" id="組織図">
    <div class="section-header">
        <img class="section-bg" src="../image/帯.png" alt="背景">
    </div>
    <div class="container">
        <h2 class="section-title">組織図</h2>
            <div class="route-block-wrapper">
        <div class="org-chart">
    <div class="org-node ceo">代表取締役</div>
    <div class="org-branches">
        <div class="org-node mid">総務部</div>
        <div class="org-node mid">事業推進部</div>
    </div>
    <div class="org-branches lower">
        <div class="org-node">企画開発部</div>
        <div class="org-node">ソフト開発部</div>
        <div class="org-node">映像開発部</div>
        <div class="org-node">映像制作部</div>
    </div>
    </div>
    </div>
    </div>
    </section>


    <section class="section-customer" id="主要取引先">
    <div class="section-header">
        <img class="section-bg" src="../image/帯.png" alt="背景">
    </div>
    <div class="container">
        <h2 class="section-title">主要取引先</h2>
    <div class="route-block-wrapper">
        
    </div>
    </div>
    </section>
    </div>

<?php
get_footer();
