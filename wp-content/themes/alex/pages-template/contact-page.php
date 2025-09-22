<?php
/**
 * Template Name: Contact Page 1
 */

get_header();
?>

<style>
    span.error {
        color: red;
        font-size: 13px;
    }
    #form_box table td input, #form_box table td textarea {
        width: 300px;
        padding: 3px 4px;
        font-size: 1em;
        background: #FFFFFF;
        box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.4) inset;
        -moz-box-shadow: 0px 0px 3px rgba(0,0,0,0.4) inset;
        -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.4) inset;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        border: 2px solid #EEEEEE;
    }
    .formActiveConfirm {
        display: block !important;
    }
    @media (max-width: 768px) {
        #form_box table td input, #form_box table td textarea, #form_box table td #comment {
            width: 100%;
        }
    }
</style>

<section class="about">
    <div class="about-avatar">
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
        <div class="about-left-text">
            <h2><?php the_field('contact_page_banner_content') ?></h2>
        </div>
        <div class="about-right-text">
            <span class="company-info"><?php the_field('contact_page_banner_description') ?></span>
            <h1 class="about-heading text-uppercase"><?php the_title(); ?></h1>
        </div>
        </div>
    </div>
</section>

<nav class="submenu-tabs">
</nav>

<!-- Main -->
<section class="contact-heading">
    <div class="container">
        <div class="contact-block-wrapper" id="main_contents">
            <p><?php the_field('contact_page_form_title') ?></p>

            <!-- STEP indicators -->
            <div id="position_box">
                <ul>
                    <li class="active"><span><?php echo pll__('step1'); ?></span> →</li>
                    <li><span><?php echo pll__('step2'); ?></span> →</li>
                    <li><span><?php echo pll__('step3'); ?></span></li>
                </ul>
            </div>

            <div id="form_box" class="line-contact">
                <!-- STEP1 -->
                <form method="post" name="applyform" id="applyform">
                    <table>
                        <tbody>
                            <tr>
                                <th><?php echo pll__('form_name'); ?><span class="required">※必須</span></th>
                                <td><input name="name" type="text" size="40" required></td>
                            </tr>
                            <tr>
                                <th><?php echo pll__('form_furigana'); ?></th>
                                <td><input name="furigana" type="text" size="40"></td>
                            </tr>
                            <tr>
                                <th><?php echo pll__('form_phone'); ?></th>
                                <td><input name="phone" type="tel" size="11" maxlength="11"></td>
                            </tr>
                            <tr>
                                <th><?php echo pll__('form_email'); ?><span class="required">※必須</span></th>
                                <td>
                                    <input name="email" type="email" size="40" required>
                                    <div class="plus_txt">
                                        <?php the_field('contact_page_form_email_address') ?>
                                        ■<a href="<?php the_field('docomo_users_url') ?>" target="_blank"><?php echo pll__('Dành cho người dùng Docomo'); ?></a>
                                        ■<a href="<?php the_field('for_au_users_url') ?>" target="_blank"><?php echo pll__('Dành cho người dùng AU'); ?></a>
                                        ■<a href="<?php the_field('for_softbank_users') ?>" target="_blank"><?php echo pll__('Dành cho người dùng SoftBank'); ?></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo pll__('form_email_confirm'); ?><span class="required">※必須</span></th>
                                <td><input name="email-confirm" type="email" size="40" required></td>
                            </tr>
                            <tr>
                                <th><?php echo pll__('form_content'); ?><span class="required">※必須</span></th>
                                <td><textarea name="content" id="comment" required></textarea></td>
                            </tr>
                        </tbody>
                    </table>  
                    <p id="sub_btn">
                        <button type="button" class="contact-detail-btn submit">
                            <?php echo pll__('btn_check'); ?>
                        </button>
                    </p>
                </form>

                <!-- Step2 -->
                <div class="submittable" style="display:none;">
                    <p><?php echo pll__('msg_confirm'); ?></p>
                    <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST" id="confirmform">
                        <table cellpadding="0" cellspacing="0" class="confirm_table">
                            <tbody>
                                <tr>
                                    <th><?php echo pll__('form_name'); ?></th>
                                    <td data-field="name"></td>
                                    <input type="hidden" name="name" value="">
                                </tr>
                                <tr>
                                    <th><?php echo pll__('form_furigana'); ?></th>
                                    <td data-field="furigana"></td>
                                    <input type="hidden" name="furigana" value="">
                                </tr>
                                <tr>
                                    <th><?php echo pll__('form_phone'); ?></th>
                                    <td data-field="phone"></td>
                                    <input type="hidden" name="phone" value="">
                                </tr>
                                <tr>
                                    <th><?php echo pll__('form_email'); ?></th>
                                    <td data-field="email"></td>
                                    <input type="hidden" name="email" value="">
                                </tr>
                                <tr>
                                    <th><?php echo pll__('form_content'); ?></th>
                                    <td data-field="content"></td>
                                    <input type="hidden" name="content" value="">
                                </tr>
                            </tbody>
                        </table>

                        <input type="hidden" name="email-confirm" value="">
                        <input type="hidden" name="action" value="send_contact_form">
                        <?php wp_nonce_field('send_contact_form_action', 'send_contact_form_nonce'); ?>

                        <div id="confirm_btn">
                            <button type="button" class="h_back contact-detail-btn">
                                <?php echo pll__('btn_back'); ?>
                            </button>
                            <button type="submit" name="submit-a" class="submit-a confirm-detail-btn">
                                <?php echo pll__('btn_send'); ?>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Step3 -->
                <div class="step-3" style="display:none;">
                    <p class="success">
                        <?php echo pll__('msg_success'); ?>
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>
