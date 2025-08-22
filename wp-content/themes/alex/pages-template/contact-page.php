<?php
/**
 * Template Name: Contact page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SH_Theme
 */

get_header(); ?>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/contact-page.css">

<section class="about">
    <div class="about-avatar">
        <!-- Ảnh nền tự động chuyển bằng CSS -->
        <div class="about-bg bg1" style="background-image:url('../image/レイヤー 853.png');"></div>
        <div class="about-bg bg2" style="background-image:url('../image/レイヤー 851.png');"></div>

        <div class="overlay-about">
        <!-- Bên trái: câu khẩu hiệu -->
        <div class="about-left-text">
            <h2>枠にとらわれない <br>創造力で<br>未来をデザイン<br></h2>
        </div>
        
        <!-- Bên phải: ABOUT + 会社情報 -->
        <div class="about-right-text">
            <span class="company-info">お問い合わせ</span>
            <h1 class="about-heading">CONTACT</h1>
        </div>
        </div>
    </div>
    </section>
    <nav class="submenu-tabs">
    </nav>

    <section class="contact-heading" >
    <div class="container">
        <div class="contact-block-wrapper" id="main_contents">
    <p>
    以下のフォームにお問い合わせ内容をご記入いただき、送信してください
    </p>


    <div id="position_box">
    <ul>
        <li class="active"><span>STEP1　内容入力</span> →</li>
        <li><span>STEP2　内容確認</span> →</li>
        <li><span>STEP3　受付完了</span></li>
        </ul>
    </div>


    <div id="form_box" class="line-contact">
    <form action="system/contact_form.php" method="post" name="applyform" id="applyform">
        
    <table>
    <tbody>
        <tr>
        <th>お名前
            <span class="required">※必須</span>
        </th>
    <td>
        <input name="お名前" type="text" size="7">
    </td>
    </tr>
        
    <tr>
        <th>フリガナ</th>
    <td>
        <input name="フリガナ" type="text" size="7">
    </td>
    </tr>
        
    <tr>
        <th>電話番号</th>
    <td>
        <input name="電話番号" type="text" size="11" maxlength="11" style="ime-mode: disabled">
    </td>
    </tr>
        
    <tr>
        <th>メールアドレス
        <span class="required">※必須</span>
        </th>
    <td>
    <input name="email" type="text" size="40" title="info@example.com" style="ime-mode: disabled">
    <div class="plus_txt">
        ドメイン指定受信の設定をされている方は、「alex7.co.jp」を<br>
        指定メールアドレスに追加してください。<br>
        【ドメイン指定の方法】<br>
        ■<a href="https://www.nttdocomo.co.jp/info/spam_mail/measure/url/index.html" target="_blank">docomoをご使用の方</a>
        ■<a href="http://www.au.kddi.com/support/mobile/trouble/forestalling/mail/anti-spam/fillter/" target="_blank">auをご使用の方</a>　　
        ■<a href="http://www.softbank.jp/mobile/support/antispam/settings/indivisual/whiteblack/" target="_blank">SoftBankをご使用の方</a>
    </div>
    </td>
    </tr>
        
    <tr>
        <th>メールアドレス確認用
        <span class="required">※必須</span>
        </th>
    <td>
        <input name="email2" type="text" size="40" title="info@example.com" style="ime-mode: disabled">
    </td>
    </tr>
        
    <tr>
    <th>
        お問い合わせ内容<span class="required">※必須</span>
    </th>
    <td>
        <textarea name="お問い合わせ内容" id="comment"></textarea>
    </td>
    </tr>
    </tbody>
    </table>  
    <p id="sub_btn">
        <input type="image" name="submit" class="submit" value="入力内容を確認する" src="image/btn_confirm.png">
    </p>
    </form>
    <div class="errm">
    <h4>未入力項目があります</h4>
    <font color="#ff0000">「お名前」は必須入力項目です。</font><br>
    <font color="#ff0000">「メールアドレス」は必須入力項目です。</font><br>
    <font color="#ff0000">「メールアドレス：確認用」は必須入力項目です。</font><br>
    <font color="#ff0000">「お問い合わせ内容」は必須入力項目です。</font><br>
    </div>
    <div id="confirm_btn">
    <img src="../image/btn_back.png" onclick="history.back()" class="h_back">
    </div>

    <div class="submittable">
    <p>
    以下の内容で間違いがなければ、「送信」ボタンを押してください。
    </p>
    <form action="contact_form.php" method="POST">

    <table cellpadding="0" cellspacing="0" class="confirm_table">
    <tbody><tr><th>お名前</th><td><input type="hidden" name="お名前" value=""></td></tr>
    <tr><th>フリガナ</th><td><input type="hidden" name="フリガナ" value=""></td></tr>
    <tr><th>電話番号</th><td><input type="hidden" name="電話番号" value=""></td></tr>
    <tr><th>メールアドレス</th><td><input type="hidden" name="email" value=""></td></tr>
    <tr><th>お問い合わせ内容</th><td><input type="hidden" name="お問い合わせ内容" value=""></td></tr>
    </tbody></table>
    <div class="hide">
    <input type="hidden" name="email2" value="">
    </div>

    <div id="confirm_btn">
    <input type="hidden" name="eweb_set" value="eweb_submit">
    <img src="../image/btn_back.png" onclick="history.back()" class="h_back">
    <input type="image" src="../image/btn_send.png" name="submit" value="送信する" class="submit">
    </div>
    </form>
    </div>
    <p>
    お問い合わせありがとうございました。<br>
    送信は無事に完了しました。
    </p>
    </div>
    </div>
    </div>
</section>

<?php
get_footer();