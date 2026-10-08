<?php
// Tắt Gutenberg cho các CPT nếu cần, hoặc để mặc định
add_action('after_setup_theme', 'cherry_theme_setup');
function cherry_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    // Khai báo kích thước ảnh nếu cần
}

add_action('wp_enqueue_scripts', 'cherry_enqueue_assets');
function cherry_enqueue_assets() {
    // CSS
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Instrument+Serif:ital@0;1&display=swap', array(), null);
    wp_enqueue_style('fancybox-css', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css', array(), '5.0');
    wp_enqueue_style('cherry-main-css', get_template_directory_uri() . '/assets/css/main.css', array(), time());
    wp_enqueue_style('cherry-style', get_stylesheet_uri(), array(), time());

    // JS
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), '3.12.2', true);
    wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap'), '3.12.2', true);
    wp_enqueue_script('lenis', 'https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.27/bundled/lenis.min.js', array(), '1.0.27', true);
    wp_enqueue_script('fancybox-js', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array(), '5.0', true);
    wp_enqueue_script('cherry-main-js', get_template_directory_uri() . '/assets/js/main.js', array('gsap', 'lenis', 'fancybox-js'), time(), true);
}

// Đăng ký Custom Post Types
add_action('init', 'cherry_register_cpts');
function cherry_register_cpts() {
    // 1. Artwork (Tranh)
    register_post_type('artwork', array(
        'labels' => array(
            'name' => 'Bộ Sưu Tập Tranh',
            'singular_name' => 'Tranh',
            'add_new_item' => 'Thêm Tranh Mới',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'thumbnail'),
        'menu_icon' => 'dashicons-art',
    ));

    // 2. Testimonial (Lời Nhắn Nhủ)
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => 'Góc Nhìn',
            'singular_name' => 'Lời nhắn',
            'add_new_item' => 'Thêm Lời Nhắn',
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-testimonial',
    ));

    // 3. Schedule (Lịch Trình)
    register_post_type('schedule', array(
        'labels' => array(
            'name' => 'Lịch Trình',
            'singular_name' => 'Địa điểm',
            'add_new_item' => 'Thêm Địa Điểm Mới',
        ),
        'public' => true,
        'supports' => array('title', 'thumbnail'),
        'menu_icon' => 'dashicons-calendar-alt',
    ));

    // 4. Merch (Sản Phẩm Liên Kết)
    register_post_type('merch', array(
        'labels' => array(
            'name' => 'Sản Phẩm',
            'singular_name' => 'Sản phẩm',
            'add_new_item' => 'Thêm Sản Phẩm Mới',
        ),
        'public' => true,
        'supports' => array('title', 'thumbnail'),
        'menu_icon' => 'dashicons-cart',
    ));
}
?>
<?php
// Thêm file export ACF nếu có
add_action('acf/init', 'cherry_acf_add_local_field_groups');
function cherry_acf_add_local_field_groups() {
    
    // Artwork Meta
    acf_add_local_field_group(array(
        'key' => 'group_artwork_meta',
        'title' => 'Thông tin Tranh',
        'fields' => array(
            array(
                'key' => 'field_art_meta',
                'label' => 'Năm sáng tác / kích thước / chất liệu',
                'name' => 'art_meta',
                'type' => 'text',
            ),
            array(
                'key' => 'field_art_price',
                'label' => 'Giá',
                'name' => 'art_price',
                'type' => 'text',
            ),
            array(
                'key' => 'field_art_sold',
                'label' => 'Đã bán?',
                'name' => 'art_sold',
                'type' => 'true_false',
                'ui' => 1,
            ),
            array(
                'key' => 'field_art_online',
                'label' => 'Hiển thị Online?',
                'name' => 'art_online',
                'type' => 'true_false',
                'ui' => 1,
                'default_value' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'artwork',
                ),
            ),
        ),
    ));

    // Testimonial Meta
    acf_add_local_field_group(array(
        'key' => 'group_testimonial_meta',
        'title' => 'Thông tin Tác giả Lời nhắn',
        'fields' => array(
            array(
                'key' => 'field_testi_role',
                'label' => 'Công việc / Chức vụ',
                'name' => 'testi_role',
                'type' => 'text',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'testimonial',
                ),
            ),
        ),
    ));

    // Schedule Meta
    acf_add_local_field_group(array(
        'key' => 'group_schedule_meta',
        'title' => 'Thông tin Lịch trình',
        'fields' => array(
            array(
                'key' => 'field_schedule_time',
                'label' => 'Thời gian',
                'name' => 'schedule_time',
                'type' => 'text',
            ),
            array(
                'key' => 'field_schedule_address',
                'label' => 'Địa chỉ cụ thể',
                'name' => 'schedule_address',
                'type' => 'text',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'schedule',
                ),
            ),
        ),
    ));

    // Merch Meta
    acf_add_local_field_group(array(
        'key' => 'group_merch_meta',
        'title' => 'Thông tin Sản phẩm',
        'fields' => array(
            array(
                'key' => 'field_merch_link',
                'label' => 'Link liên kết',
                'name' => 'merch_link',
                'type' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'merch',
                ),
            ),
        ),
    ));

    // Hero Meta (Front Page)
    acf_add_local_field_group(array(
        'key' => 'group_hero_meta',
        'title' => 'Hero Banner',
        'fields' => array(
            array(
                'key' => 'field_hero_bg_pc',
                'label' => 'Background PC',
                'name' => 'hero_bg_pc',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_hero_bg_mobile',
                'label' => 'Background Mobile',
                'name' => 'hero_bg_mobile',
                'type' => 'image',
                'return_format' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
    ));
}
?>


// ==========================================
// CHẾ ĐỘ BẢO TRÌ (MAINTENANCE MODE)
// ==========================================
// Đổi giá trị false thành true để bật trang bảo trì cho khách vãng lai.
// Quản trị viên (đã đăng nhập) vẫn sẽ xem được website bình thường để test.
 = false; 

if () {
    add_action('template_redirect', 'cherry_enable_maintenance_mode');
}
function cherry_enable_maintenance_mode() {
    if (!current_user_can('edit_themes') || !is_user_logged_in()) {
        require_once get_template_directory() . '/maintenance.php';
        die();
    }
}
