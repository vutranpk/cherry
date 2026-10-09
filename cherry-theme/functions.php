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

// ==========================================
// POLYLANG MULTILINGUAL SUPPORT
// ==========================================
function cherry_register_strings() {
    if (function_exists('pll_register_string')) {
        \ = array(
            'Triển lãm nghệ thuật Vị Nhân Sinh',
            'Lan tỏa yêu thương qua từng nét vẽ. Mỗi tác phẩm là một câu chuyện, một hy vọng gửi đến các em nhỏ có hoàn cảnh khó khăn.',
            'Khám Phá Bộ Sưu Tập',
            'Cuộn xuống',
            'Câu Chuyện',
            'Cherry là',
            'ai?',
            'Sinh năm 2012, cô bé họa sĩ nhí',
            'không chỉ có tài năng nghệ thuật bẩm sinh mà còn sở hữu một trái tim nhân ái rộng lớn.',
            'Ngay từ những nét cọ đầu đời, Cherry đã ấp ủ ước mơ dùng hội họa để lan tỏa yêu thương. Với em, mỗi bức tranh không chỉ là sự pha trộn của sắc màu, mà là',
            'một thông điệp, một cánh tay chìa ra',
            'với những số phận kém may mắn hơn mình.',
            'Hành Trình Yêu Thương',
            'BST Tranh',
            'Sắc màu<br/>Hy vọng',
            'Những tác phẩm được vẽ từ trái tim, mang theo ước mơ về một tương lai tươi sáng hơn cho các em nhỏ.',
            'Đã Bán',
            'Đang cập nhật tranh...',
            'Yêu thương<br/>Vẫn còn tiếp nối',
            'Khám phá thêm hàng chục tác phẩm khác trong bộ sưu tập đặc biệt của Cherry. Mỗi bức tranh là một tia hy vọng mới.',
            'Xem Tất Cả Tranh',
            'Hành Trình',
            'Chia sẻ yêu thương',
            'Năm 2024, Quỹ được thành lập, tạo nên sự kết nối giữa nghệ thuật và thiện nguyện. Những bức tranh được lan tỏa đến cộng đồng thông qua việc bán tranh và ứng dụng trên sản phẩm.',
            'Tác phẩm<br/>đã sáng tác',
            'Triển lãm<br/>gây quỹ',
            'Trẻ em<br/>được hỗ trợ',
            'Ứng dụng',
            'Sản phẩm<br/>Gây quỹ',
            'Ủng hộ quỹ',
            'Xem toàn bộ sản phẩm',
            'Tin Tức',
            'Báo Chí &<br/>Sự kiện',
            'Đọc tiếp',
            'Xem Tất Cả Tin Tức & Sự Kiện',
            'Góc Nhìn',
            'Lời Nhắn Nhủ',
            'Lịch trình',
            'Triển lãm 2026',
            'Kết Nối',
            'Lan tỏa<br/>Yêu thương',
            'Mọi sự quan tâm, đóng góp của bạn đều là động lực to lớn giúp Quỹ Cherry mang đến nhiều nụ cười hơn cho trẻ thơ.',
            'Liên Hệ Hỗ Trợ',
            'Tác giả',
            'Tác phẩm',
            'Cửa hàng',
            'Liên hệ',
            'Bản quyền thuộc về K COFFEE & Cherry. Mọi quyền được bảo lưu.',
            'Mới hơn',
            'Cũ hơn',
            'Chưa có bài viết nào.',
            'Góc Báo Chí',
            'Tin Tức & Sự Kiện',
            'Đọc bài chi tiết',
            'Chuyên mục',
            'Trở về Tin Tức',
            'Chia sẻ:',
            'Không tìm thấy trang',
            'Trang bạn đang tìm kiếm có thể đã bị xóa, đổi tên hoặc tạm thời không truy cập được.',
            'Trở về Trang chủ'
        );
        foreach(\ as \) {
            pll_register_string('cherry_theme', \, 'Cherry Theme');
        }
    }
}
add_action('init', 'cherry_register_strings');

function cherry_e(\) {
    if (function_exists('pll_e')) {
        pll_e(\);
    } else {
        echo \;
    }
}
function cherry__(\) {
    if (function_exists('pll__')) {
        return pll__(\);
    }
    return \;
}

// ==========================================
// TÙY CHỈNH HIỂN THỊ CỘT TRONG BẢNG ADMIN
// ==========================================
// 1. CỘT CHO BỘ SƯU TẬP TRANH
add_filter('manage_artwork_posts_columns', 'cherry_set_custom_edit_artwork_columns');
function cherry_set_custom_edit_artwork_columns() {
     = array();
    ['cb'] = ['cb'];
    ['art_thumb'] = 'Hình Tranh';
    ['title'] = ['title'];
    ['art_meta'] = 'Thông tin (Năm/Chất liệu)';
    ['art_price'] = 'Giá bán';
    ['art_sold'] = 'Tình trạng';
    ['art_online'] = 'Hiển thị Web';
    ['date'] = ['date'];
    return ;
}

add_action('manage_artwork_posts_custom_column', 'cherry_custom_artwork_column', 10, 2);
function cherry_custom_artwork_column(, ) {
    switch () {
        case 'art_thumb':
            if (has_post_thumbnail()) {
                echo get_the_post_thumbnail(, array(60, 60));
            } else {
                echo '<span style="color:#999;">Chưa có ảnh</span>';
            }
            break;
        case 'art_meta':
            echo esc_html(get_field('art_meta', ));
            break;
        case 'art_price':
            echo '<strong>' . esc_html(get_field('art_price', )) . '</strong>';
            break;
        case 'art_sold':
             = get_field('art_sold', );
            echo  ? '<span style="color:red; font-weight:bold;">🔴 Đã Bán</span>' : '<span style="color:green; font-weight:bold;">🟢 Còn Trống</span>';
            break;
        case 'art_online':
             = get_field('art_online', );
            echo  ? '<span style="color:blue; font-weight:bold;">🌐 Đang Online</span>' : '<span style="color:gray;">Ẩn (Offline)</span>';
            break;
    }
}

// 2. CỘT CHO SẢN PHẨM
add_filter('manage_merch_posts_columns', 'cherry_set_custom_edit_merch_columns');
function cherry_set_custom_edit_merch_columns() {
     = array();
    ['cb'] = ['cb'];
    ['merch_thumb'] = 'Ảnh Sản Phẩm';
    ['title'] = ['title'];
    ['merch_link'] = 'Link trỏ về';
    ['date'] = ['date'];
    return ;
}

add_action('manage_merch_posts_custom_column', 'cherry_custom_merch_column', 10, 2);
function cherry_custom_merch_column(, ) {
    switch () {
        case 'merch_thumb':
            if (has_post_thumbnail()) {
                echo get_the_post_thumbnail(, array(60, 60));
            }
            break;
        case 'merch_link':
             = get_field('merch_link', );
            if () {
                echo '<a href="'.esc_url().'" target="_blank" style="color:#0071a1; font-weight:500;">🔗 Click xem link</a>';
            }
            break;
    }
}

// 3. CHỈNH CSS CHO BẢNG ADMIN
add_action('admin_head', 'cherry_custom_admin_css');
function cherry_custom_admin_css() {
    echo '<style>
        .column-art_thumb, .column-merch_thumb { width: 80px; text-align:center; }
        .column-art_thumb img, .column-merch_thumb img { border-radius: 4px; object-fit: cover; border: 1px solid #ddd; }
        .column-art_price { width: 120px; }
        .column-art_sold, .column-art_online { width: 110px; }
    </style>';
}
