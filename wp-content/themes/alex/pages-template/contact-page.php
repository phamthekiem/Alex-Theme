<?php
/**
 * Template Name: Contact page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SH_Theme
 */

// Form submission
if (isset($_POST['submit']) && $_POST['submit'] == 'submit_form') {
    $errors = array();
    $success = false;
    
    // Validate required fields
    if (empty($_POST['name'])) {
        $errors[] = pll__('Name is required field', 'contact-form');
    }
    
    if (empty($_POST['email'])) {
        $errors[] = pll__('Email is required field', 'contact-form');
    } elseif (!is_email($_POST['email'])) {
        $errors[] = pll__('Invalid email format', 'contact-form');
    }
    
    if (empty($_POST['email_confirm'])) {
        $errors[] = pll__('Email confirmation is required field', 'contact-form');
    } elseif ($_POST['email'] !== $_POST['email_confirm']) {
        $errors[] = pll__('Email and confirmation do not match', 'contact-form');
    }
    
    if (empty($_POST['message'])) {
        $errors[] = pll__('Message is required field', 'contact-form');
    }
    
    // Verify nonce
    if (!wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
        $errors[] = pll__('Security verification failed', 'contact-form');
    }
    
    // If no errors, send email
    if (empty($errors)) {
        $to = get_option('admin_email');
        $subject = pll__('Contact Form Message', 'contact-form');
        $name = sanitize_text_field($_POST['name']);
        $furigana = sanitize_text_field($_POST['furigana']);
        $phone = sanitize_text_field($_POST['phone']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field($_POST['message']);
        
        $body = pll__('Name', 'contact-form') . ": {$name}\n";
        if (!empty($furigana)) {
            $body .= pll__('Furigana', 'contact-form') . ": {$furigana}\n";
        }
        if (!empty($phone)) {
            $body .= pll__('Phone', 'contact-form') . ": {$phone}\n";
        }
        $body .= pll__('Email', 'contact-form') . ": {$email}\n\n";
        $body .= pll__('Message', 'contact-form') . ":\n{$message}\n\n";
        $body .= "---\n";
        $body .= pll__('Sent from', 'contact-form') . ": " . home_url() . "\n";
        $body .= pll__('Date', 'contact-form') . ": " . current_time('Y-m-d H:i:s');
        
        $headers = array(
            'Content-Type: text/plain; charset=UTF-8',
            'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
            'Reply-To: ' . $email
        );
        
        if (wp_mail($to, $subject, $body, $headers)) {
            $success = true;
            
            // Send auto-reply email
            send_auto_reply_email($email, $name);
        } else {
            $errors[] = pll__('Failed to send email. Please try again.', 'contact-form');
        }
    }
}


get_header(); 

?>

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
        <!-- Ảnh nền tự động chuyển bằng CSS -->
        <?php 
        $images = get_field('contact_page_banner_image');
        if ($images):
            $total = count($images);
            $count = 1;
            foreach ($images as $image):
                ?>
                <div class="about-bg bg<?php echo $count; ?>" style="background-image:url('<?php echo esc_url($image); ?>');"></div>
                <?php
                $count++;
            endforeach;
        endif;
        ?>

        <div class="overlay-about">
        <!-- Bên trái: câu khẩu hiệu -->
        <div class="about-left-text">
            <h2><?php the_field('contact_page_banner_content') ?></h2>
        </div>
        
        <!-- Bên phải: ABOUT + 会社情報 -->
        <div class="about-right-text">
            <span class="company-info"><?php the_field('contact_page_banner_description') ?></span>
            <h1 class="about-heading text-uppercase"><?php the_title(); ?></h1>
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
            <?php the_field('contact_page_form_title') ?>
            </p>

            <div id="position_box">
                <ul>
                    <li class="active"><span>STEP1　内容入力</span> →</li>
                    <li><span>STEP2　内容確認</span> →</li>
                    <li><span>STEP3　受付完了</span></li>
                </ul>
            </div>

            <div id="form_box" class="line-contact">
                <!-- STEP1 -->
                <form action="" method="post" name="applyform" id="applyform">
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
                                        <?php the_field('contact_page_form_email_address') ?>
                                        ■<a href="<?php the_field('docomo_users_url') ?>" target="_blank">docomoをご使用の方</a>
                                        ■<a href="<?php the_field('for_au_users_url') ?>" target="_blank">auをご使用の方</a>　　
                                        ■<a href="<?php the_field('for_softbank_users') ?>" target="_blank">SoftBankをご使用の方</a>
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

                <!-- Step2 -->
                <div class="submittable">
                    <p>
                        以下の内容で間違いがなければ、「送信」ボタンを押してください。
                    </p>
                    <!-- Step2 -->
                    <form action="contact_form.php" method="POST">

                        <table cellpadding="0" cellspacing="0" class="confirm_table">
                            <tbody><tr><th>お名前</th><td><input type="hidden" name="お名前" value=""></td></tr>
                                <tr><th>フリガナ</th><td><input type="hidden" name="フリガナ" value=""></td></tr>
                                <tr><th>電話番号</th><td><input type="hidden" name="電話番号" value=""></td></tr>
                                <tr><th>メールアドレス</th><td><input type="hidden" name="email" value=""></td></tr>
                                <tr><th>お問い合わせ内容</th><td><input type="hidden" name="お問い合わせ内容" value=""></td></tr>
                            </tbody>
                        </table>
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

                <!-- Step3 -->
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