<?php
// Hook form
add_action('admin_post_nopriv_send_contact_form', 'sh_handle_contact_form');
add_action('admin_post_send_contact_form', 'sh_handle_contact_form');

function sh_handle_contact_form() {
    if ( ! isset($_POST['send_contact_form_nonce']) 
         || ! wp_verify_nonce($_POST['send_contact_form_nonce'], 'send_contact_form_action') ) {
        wp_die('Security check failed');
    }

    $name    = sanitize_text_field($_POST['name']);
    $furigana= sanitize_text_field($_POST['furigana']);
    $phone   = sanitize_text_field($_POST['phone']);
    $email   = sanitize_email($_POST['email']);
    $content = sanitize_textarea_field($_POST['content']);

    // Confirmation email to user
    if ( ! empty($email) ) {
        $subject_user = "【". get_bloginfo('name') ."】お問い合わせありがとうございます";
        $body_user = "こんにちは $name 様\n\n".
                    "以下の内容でお問い合わせを承りました。\n\n".
                    "--------------------------\n".
                    "お名前: $name\n".
                    "フリガナ: $furigana\n".
                    "電話番号: $phone\n".
                    "メール: $email\n".
                    "お問い合わせ内容:\n$message\n".
                    "--------------------------\n\n".
                    "担当者よりご連絡いたしますので、しばらくお待ちください。\n\n".
                    get_bloginfo('name');

        $headers_user = [ 'Content-Type: text/plain; charset=UTF-8' ];
        wp_mail($email, $subject_user, $body_user, $headers_user);
    }


    // gửi mail
    $to = get_option('admin_email');
    $subject = "Contact form from " . $name;
    $body = "Name: $name\nFurigana: $furigana\nPhone: $phone\nEmail: $email\n\nMessage:\n$content";
    $headers = ["Reply-To: $email"];

    wp_mail($to, $subject, $body, $headers);

    // lưu vào admin (post type hoặc option, tuỳ bạn đã setup)
    wp_insert_post([
        'post_type'   => 'contact_form',
        'post_status' => 'publish',
        'post_title'  => $name . " - " . current_time('mysql'),
        'post_content'=> $body,
        'meta_input'  => [
            'furigana' => $furigana,
            'phone'    => $phone,
            'email'    => $email,
        ]
    ]);

    // redirect về Step3
    wp_redirect(home_url('/contact?contact=success'));
    exit;
}



// Register CPT
add_action('init', function() {
    register_post_type('contact', [
        'labels' => [
            'name' => 'Contacts',
            'singular_name' => 'Contact',
        ],
        'public' => false,
        'show_ui' => true,
        'supports' => ['title', 'editor'],
        'menu_icon' => 'dashicons-email',
    ]);
});

// Columns in admin
add_filter('manage_contact_posts_columns', function($columns) {
    $columns['email'] = 'Email';
    $columns['phone'] = 'Phone';
    return $columns;
});
add_action('manage_contact_posts_custom_column', function($column, $post_id) {
    if ($column === 'email') echo esc_html(get_post_meta($post_id, 'email', true));
    if ($column === 'phone') echo esc_html(get_post_meta($post_id, 'phone', true));
}, 10, 2);

// Dashboard widget
add_action('wp_dashboard_setup', function() {
    wp_add_dashboard_widget('contact_stats', 'Contact Statistics', 'sh_contact_stats_widget');
});
function sh_contact_stats_widget() {
    $total = wp_count_posts('contact')->publish ?? 0;
    echo "<p><strong>Total contacts:</strong> $total</p>";
    global $wpdb;
    $recent = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type='contact' AND post_date > DATE_SUB(NOW(), INTERVAL 30 DAY)");
    echo "<p><strong>In the last 30 days:</strong> $recent</p>";
}
