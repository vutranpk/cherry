<?php
// Báº­t Thumbnail
add_theme_support('post-thumbnails');

// Báº­t Quáº£n lÃ½ Title
add_theme_support('title-tag');

// Náº¡p CSS vÃ  JS
add_action('wp_enqueue_scripts', 'cherry_enqueue_assets');
function cherry_enqueue_assets() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    wp_enqueue_style('fancybox-css', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css', array(), '5.0');
    wp_enqueue_style('cherry-main-css', get_template_directory_uri() . '/assets/css/main.css', array(), time());

    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), '3.12.2', true);
    wp_enqueue_script('scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap'), '3.12.2', true);
    wp_enqueue_script('lenis', 'https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.19/bundled/lenis.min.js', array(), '1.0.19', true);
    wp_enqueue_script('fancybox-js', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array(), '5.0', true);
    
    wp_enqueue_script('cherry-main-js', get_template_directory_uri() . '/assets/js/main.js', array('gsap', 'scrolltrigger', 'lenis', 'fancybox-js'), time(), true);
}

// KHá»žI Táº O CÃC LOáº I BÃ€I VIáº¾T TÃ™Y CHá»ˆNH (CUSTOM POST TYPES)
add_action('init', 'cherry_register_cpts');
function cherry_register_cpts() {
    // Tranh (Artwork)
    register_post_type('artwork', array(
        'labels' => array('name' => 'Bá»™ SÆ°u Táº­p Tranh', 'singular_name' => 'Tranh', 'add_new_item' => 'ThÃªm Tranh Má»›i'),
        'public' => true, 'has_archive' => true,
        'supports' => array('title', 'thumbnail'),
        'menu_icon' => 'dashicons-art',
    ));
    // GÃ³c nhÃ¬n (Testimonial)
    register_post_type('testimonial', array(
        'labels' => array('name' => 'GÃ³c NhÃ¬n', 'singular_name' => 'Lá»i nháº¯n', 'add_new_item' => 'ThÃªm Lá»i Nháº¯n'),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-testimonial',
    ));
    // Lá»‹ch trÃ¬nh (Schedule)
    register_post_type('schedule', array(
        'labels' => array('name' => 'Lá»‹ch TrÃ¬nh', 'singular_name' => 'Äá»‹a Ä‘iá»ƒm', 'add_new_item' => 'ThÃªm Äá»‹a Äiá»ƒm Má»›i'),
        'public' => true,
        'supports' => array('title', 'thumbnail'),
        'menu_icon' => 'dashicons-calendar-alt',
    ));
    // Sáº£n pháº©m (Merch)
    register_post_type('merch', array(
        'labels' => array('name' => 'Sáº£n Pháº©m', 'singular_name' => 'Sáº£n pháº©m', 'add_new_item' => 'ThÃªm Sáº£n Pháº©m Má»›i'),
        'public' => true,
        'supports' => array('title', 'thumbnail'),
        'menu_icon' => 'dashicons-cart',
    ));
}

// KHá»žI Táº O TRÆ¯á»œNG Dá»® LIá»†U Äá»˜NG (ACF FIELDS)
add_action('acf/init', 'cherry_acf_add_local_field_groups');
function cherry_acf_add_local_field_groups() {
    // Artwork Meta
    acf_add_local_field_group(array(
        'key' => 'group_artwork_meta',
        'title' => 'ThÃ´ng tin Tranh',
        'fields' => array(
            array('key' => 'field_art_meta', 'label' => 'NÄƒm sÃ¡ng tÃ¡c / kÃ­ch thÆ°á»›c / cháº¥t liá»‡u', 'name' => 'art_meta', 'type' => 'text'),
            array('key' => 'field_art_price', 'label' => 'GiÃ¡', 'name' => 'art_price', 'type' => 'text'),
            array('key' => 'field_art_sold', 'label' => 'ÄÃ£ bÃ¡n?', 'name' => 'art_sold', 'type' => 'true_false', 'ui' => 1),
            array('key' => 'field_art_online', 'label' => 'Hiá»ƒn thá»‹ Online?', 'name' => 'art_online', 'type' => 'true_false', 'ui' => 1, 'default_value' => 1),
        ),
        'location' => array(array(array('param' => 'post_type', 'operator' => '==', 'value' => 'artwork'))),
    ));

    // Testimonial Meta
    acf_add_local_field_group(array(
        'key' => 'group_testimonial_meta',
        'title' => 'ThÃ´ng tin',
        'fields' => array(
            array('key' => 'field_testi_role', 'label' => 'CÃ´ng viá»‡c / Chá»©c vá»¥', 'name' => 'testi_role', 'type' => 'text'),
        ),
        'location' => array(array(array('param' => 'post_type', 'operator' => '==', 'value' => 'testimonial'))),
    ));

    // Schedule Meta
    acf_add_local_field_group(array(
        'key' => 'group_schedule_meta',
        'title' => 'ThÃ´ng tin',
        'fields' => array(
            array('key' => 'field_schedule_time', 'label' => 'Thá»i gian', 'name' => 'schedule_time', 'type' => 'text'),
            array('key' => 'field_schedule_address', 'label' => 'Äá»‹a chá»‰ cá»¥ thá»ƒ', 'name' => 'schedule_address', 'type' => 'text'),
        ),
        'location' => array(array(array('param' => 'post_type', 'operator' => '==', 'value' => 'schedule'))),
    ));

    // Merch Meta
    acf_add_local_field_group(array(
        'key' => 'group_merch_meta',
        'title' => 'ThÃ´ng tin Sáº£n pháº©m',
        'fields' => array(
            array('key' => 'field_merch_link', 'label' => 'Link liÃªn káº¿t', 'name' => 'merch_link', 'type' => 'url'),
        ),
        'location' => array(array(array('param' => 'post_type', 'operator' => '==', 'value' => 'merch'))),
    ));

    // Hero Meta (Front Page)
    acf_add_local_field_group(array(
        'key' => 'group_hero_meta',
        'title' => 'Hero Banner',
        'fields' => array(
            array('key' => 'field_hero_bg_pc', 'label' => 'Background PC', 'name' => 'hero_bg_pc', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_hero_bg_mobile', 'label' => 'Background Mobile', 'name' => 'hero_bg_mobile', 'type' => 'image', 'return_format' => 'url'),
        ),
        'location' => array(array(array('param' => 'page_type', 'operator' => '==', 'value' => 'front_page'))),
    ));
}

// ==========================================
// CHáº¾ Äá»˜ Báº¢O TRÃŒ (MAINTENANCE MODE)
// ==========================================
$cherry_maintenance_mode = false; 

if ($cherry_maintenance_mode) {
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
        $strings = array(
            'Triá»ƒn lÃ£m nghá»‡ thuáº­t Vá»‹ NhÃ¢n Sinh',
            'Lan tá»a yÃªu thÆ°Æ¡ng qua tá»«ng nÃ©t váº½. Má»—i tÃ¡c pháº©m lÃ  má»™t cÃ¢u chuyá»‡n, má»™t hy vá»ng gá»­i Ä‘áº¿n cÃ¡c em nhá» cÃ³ hoÃ n cáº£nh khÃ³ khÄƒn.',
            'KhÃ¡m PhÃ¡ Bá»™ SÆ°u Táº­p',
            'Cuá»™n xuá»‘ng',
            'CÃ¢u Chuyá»‡n',
            'Cherry lÃ ',
            'ai?',
            'Sinh nÄƒm 2012, cÃ´ bÃ© há»a sÄ© nhÃ­',
            'khÃ´ng chá»‰ cÃ³ tÃ i nÄƒng nghá»‡ thuáº­t báº©m sinh mÃ  cÃ²n sá»Ÿ há»¯u má»™t trÃ¡i tim nhÃ¢n Ã¡i rá»™ng lá»›n.',
            'Ngay tá»« nhá»¯ng nÃ©t cá» Ä‘áº§u Ä‘á»i, Cherry Ä‘Ã£ áº¥p á»§ Æ°á»›c mÆ¡ dÃ¹ng há»™i há»a Ä‘á»ƒ lan tá»a yÃªu thÆ°Æ¡ng. Vá»›i em, má»—i bá»©c tranh khÃ´ng chá»‰ lÃ  sá»± pha trá»™n cá»§a sáº¯c mÃ u, mÃ  lÃ ',
            'má»™t thÃ´ng Ä‘iá»‡p, má»™t cÃ¡nh tay chÃ¬a ra',
            'vá»›i nhá»¯ng sá»‘ pháº­n kÃ©m may máº¯n hÆ¡n mÃ¬nh.',
            'HÃ nh TrÃ¬nh YÃªu ThÆ°Æ¡ng',
            'BST Tranh',
            'Sáº¯c mÃ u<br/>Hy vá»ng',
            'Nhá»¯ng tÃ¡c pháº©m Ä‘Æ°á»£c váº½ tá»« trÃ¡i tim, mang theo Æ°á»›c mÆ¡ vá» má»™t tÆ°Æ¡ng lai tÆ°Æ¡i sÃ¡ng hÆ¡n cho cÃ¡c em nhá».',
            'ÄÃ£ BÃ¡n',
            'Äang cáº­p nháº­t tranh...',
            'YÃªu thÆ°Æ¡ng<br/>Váº«n cÃ²n tiáº¿p ná»‘i',
            'KhÃ¡m phÃ¡ thÃªm hÃ ng chá»¥c tÃ¡c pháº©m khÃ¡c trong bá»™ sÆ°u táº­p Ä‘áº·c biá»‡t cá»§a Cherry. Má»—i bá»©c tranh lÃ  má»™t tia hy vá»ng má»›i.',
            'Xem Táº¥t Cáº£ Tranh',
            'HÃ nh TrÃ¬nh',
            'Chia sáº» yÃªu thÆ°Æ¡ng',
            'NÄƒm 2024, Quá»¹ Ä‘Æ°á»£c thÃ nh láº­p, táº¡o nÃªn sá»± káº¿t ná»‘i giá»¯a nghá»‡ thuáº­t vÃ  thiá»‡n nguyá»‡n. Nhá»¯ng bá»©c tranh Ä‘Æ°á»£c lan tá»a Ä‘áº¿n cá»™ng Ä‘á»“ng thÃ´ng qua viá»‡c bÃ¡n tranh vÃ  á»©ng dá»¥ng trÃªn sáº£n pháº©m.',
            'TÃ¡c pháº©m<br/>Ä‘Ã£ sÃ¡ng tÃ¡c',
            'Triá»ƒn lÃ£m<br/>gÃ¢y quá»¹',
            'Tráº» em<br/>Ä‘Æ°á»£c há»— trá»£',
            'á»¨ng dá»¥ng',
            'Sáº£n pháº©m<br/>GÃ¢y quá»¹',
            'á»¦ng há»™ quá»¹',
            'Xem toÃ n bá»™ sáº£n pháº©m',
            'Tin Tá»©c',
            'BÃ¡o ChÃ­ &<br/>Sá»± kiá»‡n',
            'Äá»c tiáº¿p',
            'Xem Táº¥t Cáº£ Tin Tá»©c & Sá»± Kiá»‡n',
            'GÃ³c NhÃ¬n',
            'Lá»i Nháº¯n Nhá»§',
            'Lá»‹ch trÃ¬nh',
            'Triá»ƒn lÃ£m 2026',
            'Káº¿t Ná»‘i',
            'Lan tá»a<br/>YÃªu thÆ°Æ¡ng',
            'Má»i sá»± quan tÃ¢m, Ä‘Ã³ng gÃ³p cá»§a báº¡n Ä‘á»u lÃ  Ä‘á»™ng lá»±c to lá»›n giÃºp Quá»¹ Cherry mang Ä‘áº¿n nhiá»u ná»¥ cÆ°á»i hÆ¡n cho tráº» thÆ¡.',
            'LiÃªn Há»‡ Há»— Trá»£',
            'TÃ¡c giáº£',
            'TÃ¡c pháº©m',
            'Cá»­a hÃ ng',
            'LiÃªn há»‡',
            'Báº£n quyá»n thuá»™c vá» K COFFEE & Cherry. Má»i quyá»n Ä‘Æ°á»£c báº£o lÆ°u.',
            'Má»›i hÆ¡n',
            'CÅ© hÆ¡n',
            'ChÆ°a cÃ³ bÃ i viáº¿t nÃ o.',
            'GÃ³c BÃ¡o ChÃ­',
            'Tin Tá»©c & Sá»± Kiá»‡n',
            'Äá»c bÃ i chi tiáº¿t',
            'ChuyÃªn má»¥c',
            'Trá»Ÿ vá» Tin Tá»©c',
            'Chia sáº»:',
            'KhÃ´ng tÃ¬m tháº¥y trang',
            'Trang báº¡n Ä‘ang tÃ¬m kiáº¿m cÃ³ thá»ƒ Ä‘Ã£ bá»‹ xÃ³a, Ä‘á»•i tÃªn hoáº·c táº¡m thá»i khÃ´ng truy cáº­p Ä‘Æ°á»£c.',
            'Trá»Ÿ vá» Trang chá»§'
        );
        foreach($strings as $str) {
            pll_register_string('cherry_theme', $str, 'Cherry Theme');
        }
    }
}
add_action('init', 'cherry_register_strings');

function cherry_e($string) {
    if (function_exists('pll_e')) {
        pll_e($string);
    } else {
        echo $string;
    }
}
function cherry__($string) {
    if (function_exists('pll__')) {
        return pll__($string);
    }
    return $string;
}

// ==========================================
// TÃ™Y CHá»ˆNH HIá»‚N THá»Š Cá»˜T TRONG Báº¢NG ADMIN
// ==========================================
add_filter('manage_artwork_posts_columns', 'cherry_set_custom_edit_artwork_columns');
function cherry_set_custom_edit_artwork_columns($columns) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['art_thumb'] = 'HÃ¬nh Tranh';
    $new_columns['title'] = $columns['title'];
    $new_columns['art_meta'] = 'ThÃ´ng tin (NÄƒm/Cháº¥t liá»‡u)';
    $new_columns['art_price'] = 'GiÃ¡ bÃ¡n';
    $new_columns['art_sold'] = 'TÃ¬nh tráº¡ng';
    $new_columns['art_online'] = 'Hiá»ƒn thá»‹ Web';
    $new_columns['date'] = $columns['date'];
    return $new_columns;
}

add_action('manage_artwork_posts_custom_column', 'cherry_custom_artwork_column', 10, 2);
function cherry_custom_artwork_column($column, $post_id) {
    switch ($column) {
        case 'art_thumb':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, array(60, 60));
            } else {
                echo '<span style="color:#999;">ChÆ°a cÃ³ áº£nh</span>';
            }
            break;
        case 'art_meta':
            echo esc_html(get_field('art_meta', $post_id));
            break;
        case 'art_price':
            echo '<strong>' . esc_html(get_field('art_price', $post_id)) . '</strong>';
            break;
        case 'art_sold':
            $sold = get_field('art_sold', $post_id);
            echo $sold ? '<span style="color:red; font-weight:bold;">ðŸ”´ ÄÃ£ BÃ¡n</span>' : '<span style="color:green; font-weight:bold;">ðŸŸ¢ CÃ²n Trá»‘ng</span>';
            break;
        case 'art_online':
            $online = get_field('art_online', $post_id);
            echo $online ? '<span style="color:blue; font-weight:bold;">ðŸŒ Äang Online</span>' : '<span style="color:gray;">áº¨n (Offline)</span>';
            break;
    }
}

add_filter('manage_merch_posts_columns', 'cherry_set_custom_edit_merch_columns');
function cherry_set_custom_edit_merch_columns($columns) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['merch_thumb'] = 'áº¢nh Sáº£n Pháº©m';
    $new_columns['title'] = $columns['title'];
    $new_columns['merch_link'] = 'Link trá» vá»';
    $new_columns['date'] = $columns['date'];
    return $new_columns;
}

add_action('manage_merch_posts_custom_column', 'cherry_custom_merch_column', 10, 2);
function cherry_custom_merch_column($column, $post_id) {
    switch ($column) {
        case 'merch_thumb':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, array(60, 60));
            }
            break;
        case 'merch_link':
            $link = get_field('merch_link', $post_id);
            if ($link) {
                echo '<a href="'.esc_url($link).'" target="_blank" style="color:#0071a1; font-weight:500;">ðŸ”— Click xem link</a>';
            }
            break;
    }
}

add_action('admin_head', 'cherry_custom_admin_css');
function cherry_custom_admin_css() {
    echo '<style>
        .column-art_thumb, .column-merch_thumb { width: 80px; text-align:center; }
        .column-art_thumb img, .column-merch_thumb img { border-radius: 4px; object-fit: cover; border: 1px solid #ddd; }
        .column-art_price { width: 120px; }
        .column-art_sold, .column-art_online { width: 110px; }
    </style>';
}

