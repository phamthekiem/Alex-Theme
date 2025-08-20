<?php

// Short code search for
function custom_menu_search() {
    ob_start(); ?>
    <form action="<?php echo esc_url(home_url('/')); ?>" method="GET" role="form">
        <input type="hidden" name="post_type" value="product">
        <input type="text" class="form-control" id="name" name="s" placeholder="Nhập tên sản phẩm...">
        <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
    <?php
    return ob_get_clean();
}

add_shortcode( 'menu_search_shortcode', 'custom_menu_search' );


// Short code login
function custom_woocommerce_login() {
    ob_start();
    if ( is_user_logged_in() ) : 
        $current_user = wp_get_current_user();
        $avatar = get_avatar_url($current_user->ID);
?>
<div class="dropdown">
    <a href="#" id="userDropdown" class="d-flex align-items-center dropdown-toggle">
        <img src="<?php echo esc_url($avatar); ?>" alt="Avatar" class="rounded-circle" width="32" height="32">
        <span class="ms-2"><?php echo esc_html($current_user->display_name); ?></span>
    </a>
    <ul class="dropdownMenu" aria-labelledby="userDropdown">
        <li><a class="dropdown-item" href="<?php echo esc_url( wc_get_account_endpoint_url( 'dashboard' ) ); ?>">Tài khoản</a></li>
        <li><a class="dropdown-item" href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>">Đăng xuất</a></li>
    </ul>
</div>
<?php else: ?>
    <button class="btn-login" data-bs-toggle="modal" data-bs-target="#authModal">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#111"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="#111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
    </button>
<?php endif; ?>

<!-- Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <ul class="nav nav-tabs mb-3" id="authTabs">
                <li class="nav-item">
                    <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login">Đăng nhập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="register-tab" data-bs-toggle="tab" href="#register">Đăng ký</a>
                </li>
            </ul>
            <div class="tab-content">
                <!-- Login Form -->
                <div class="tab-pane fade show active" id="login">
                    <form class="woocommerce-form woocommerce-form-login login" method="post">

                        <?php do_action( 'woocommerce_login_form_start' ); ?>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
                            <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" required aria-required="true" />
                        </p>

                        <?php do_action( 'woocommerce_login_form' ); ?>

                        <p class="form-row">
                            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
                            </label>
                            <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                            <button type="submit" class="woocommerce-button button woocommerce-form-login__submit<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
                        </p>
                        <p class="woocommerce-LostPassword lost_password">
                            <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
                        </p>

                        <?php do_action( 'woocommerce_login_form_end' ); ?>

                    </form>
                </div>

                <!-- Register Form -->
                <div class="tab-pane fade" id="register">
                    <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

                        <?php do_action( 'woocommerce_register_form_start' ); ?>

                        <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
                            </p>

                        <?php endif; ?>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
                            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
                        </p>

                        <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
                                <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" required aria-required="true" />
                            </p>

                        <?php else : ?>

                            <p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>

                        <?php endif; ?>

                        <?php do_action( 'woocommerce_register_form' ); ?>

                        <p class="woocommerce-form-row form-row">
                            <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                            <button type="submit" class="woocommerce-Button woocommerce-button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
                        </p>

                        <?php do_action( 'woocommerce_register_form_end' ); ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    return ob_get_clean();
}
add_shortcode( 'woo_login_shortcode', 'custom_woocommerce_login' );