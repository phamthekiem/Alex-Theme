<?php

// Ajax login
function ajax_login_handler() {
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user = wp_signon( $info, false );
    if ( is_wp_error( $user ) ) {
        echo json_encode( array( 'loggedin' => false, 'message' => 'Thông tin đăng nhập không đúng.' ) );
    } else {
        echo json_encode( array( 'loggedin' => true, 'message' => 'Đăng nhập thành công' ) );
    }
    wp_die();
}
add_action( 'wp_ajax_nopriv_ajax_login', 'ajax_login_handler' );


// Login redirect
if ( ! is_user_logged_in() && is_page('my-account') ) {
    wp_redirect( home_url( '/?login_redirect=1' ) );
    exit;
}


// Google login

// Thêm nút đăng nhập Google và Facebook vào form WooCommerce
add_action('woocommerce_login_form_end', 'custom_social_login_buttons');
add_action('woocommerce_register_form_end', 'custom_social_login_buttons');

function custom_social_login_buttons() {
    $google_login_url = site_url('/wp-login.php?google_login=1');

    echo '<div class="social-login-buttons">';
        echo '<a href="' . esc_url($google_login_url) . '" class="button google-login">
        <div class="nsl-button-svg-container"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#4285F4" d="M20.64 12.2045c0-.6381-.0573-1.2518-.1636-1.8409H12v3.4814h4.8436c-.2086 1.125-.8427 2.0782-1.7959 2.7164v2.2581h2.9087c1.7018-1.5668 2.6836-3.874 2.6836-6.615z"></path><path fill="#34A853" d="M12 21c2.43 0 4.4673-.806 5.9564-2.1805l-2.9087-2.2581c-.8059.54-1.8368.859-3.0477.859-2.344 0-4.3282-1.5831-5.036-3.7104H3.9574v2.3318C5.4382 18.9832 8.4818 21 12 21z"></path><path fill="#FBBC05" d="M6.964 13.71c-.18-.54-.2822-1.1168-.2822-1.71s.1023-1.17.2823-1.71V7.9582H3.9573A8.9965 8.9965 0 0 0 3 12c0 1.4523.3477 2.8268.9573 4.0418L6.964 13.71z"></path><path fill="#EA4335" d="M12 6.5795c1.3214 0 2.5077.4541 3.4405 1.346l2.5813-2.5814C16.4632 3.8918 14.426 3 12 3 8.4818 3 5.4382 5.0168 3.9573 7.9582L6.964 10.29C7.6718 8.1627 9.6559 6.5795 12 6.5795z"></path></svg></div>
        <span>Tiếp tục với <b>Google</b></span>
        </a>';
    echo '</div>';
}



add_action('init', 'handle_google_login');

function handle_google_login() {
    if (isset($_GET['google_login'])) {
        $client_id = '386595088396-ab4ktka2epjf2ssts8i9vmeotnt2mpeh.apps.googleusercontent.com';
        $redirect_uri = site_url('/wp-login.php?google_login=1');
        $auth_url = "https://accounts.google.com/o/oauth2/auth?client_id=$client_id&redirect_uri=$redirect_uri&scope=email&response_type=code";

        wp_redirect($auth_url);
        exit;
    }

    if (isset($_GET['google_callback'])) {
        $code = $_GET['code'];
        $client_id = '386595088396-ab4ktka2epjf2ssts8i9vmeotnt2mpeh.apps.googleusercontent.com';
        $client_secret = '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';
        $redirect_uri = site_url('/wp-login.php?google_login=1');

        $response = wp_remote_post('https://oauth2.googleapis.com/token', [
            'body' => [
                'code' => $code,
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'redirect_uri' => $redirect_uri,
                'grant_type' => 'authorization_code',
            ],
        ]);

        $body = json_decode(wp_remote_retrieve_body($response), true);
        if (isset($body['access_token'])) {
            $user_info = wp_remote_get('https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . $body['access_token']);
            $user_data = json_decode(wp_remote_retrieve_body($user_info), true);

            $email = $user_data['email'];
            $name = $user_data['name'];

            if (email_exists($email)) {
                $user = get_user_by('email', $email);
                wp_set_auth_cookie($user->ID);
            } else {
                $user_id = wp_create_user($email, wp_generate_password(), $email);
                wp_update_user(['ID' => $user_id, 'display_name' => $name]);
                wp_set_auth_cookie($user_id);
            }

            wp_redirect(site_url('/my-account/'));
            exit;
        }
    }
}



// Re-name
function custom_change_product_brand_labels() {
    global $wp_taxonomies;

    if (isset($wp_taxonomies['product_brand'])) {
        $labels = &$wp_taxonomies['product_brand']->labels;

        $labels->name = 'Bộ sưu tập';
        $labels->singular_name = 'Bộ sưu tập';
        $labels->menu_name = 'Bộ sưu tập';
        $labels->all_items = 'Tất cả Bộ sưu tập';
        $labels->edit_item = 'Chỉnh sửa Bộ sưu tập';
        $labels->view_item = 'Xem Bộ sưu tập';
        $labels->update_item = 'Cập nhật Bộ sưu tập';
        $labels->add_new_item = 'Thêm mới Bộ sưu tập';
        $labels->new_item_name = 'Tên Bộ sưu tập mới';
        $labels->search_items = 'Tìm kiếm Bộ sưu tập';
        $labels->popular_items = 'Bộ sưu tập phổ biến';
        $labels->separate_items_with_commas = 'Ngăn cách các Bộ sưu tập bằng dấu phẩy';
        $labels->add_or_remove_items = 'Thêm hoặc xóa Bộ sưu tập';
        $labels->choose_from_most_used = 'Chọn từ các Bộ sưu tập được dùng nhiều nhất';
        $labels->not_found = 'Không tìm thấy Bộ sưu tập nào';
        
    }
}
// add_action('init', 'custom_change_product_brand_labels', 100);


// ACF Province
add_action('wpcf7_init', 'register_custom_form_tag_provinces');

function register_custom_form_tag_provinces() {
    wpcf7_add_form_tag('provinces', 'custom_provinces_form_tag_handler');
}

add_action('wp_enqueue_scripts', 'enqueue_select2_for_cf7');
function enqueue_select2_for_cf7() {
    wp_enqueue_style('select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css');

    wp_enqueue_script('select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array('jquery'), null, true);

    // JS custom 
    wp_add_inline_script('select2-js', "
        jQuery(document).ready(function($) {
            $('#province-select').select2({
                placeholder: 'Chọn tỉnh/thành',
                width: '100%'
            });
        });
    ");
}

function custom_provinces_form_tag_handler($tag) {
    $file_path = get_template_directory() . '/lib/vn-provinces.json'; 
    if (!file_exists($file_path)) return '<select><option>Không tìm thấy dữ liệu</option></select>';

    $json = file_get_contents($file_path);
    $provinces = json_decode($json, true);

    if (!is_array($provinces)) return '<select><option>Dữ liệu không hợp lệ</option></select>';

    $html = '<select id="province-select" name="province" class="wpcf7-form-control wpcf7-select">';

    foreach ($provinces as $province) {
        $html .= '<option value="' . esc_attr($province) . '">' . esc_html($province) . '</option>';
    }
    $html .= '</select>';

    return $html;
}
