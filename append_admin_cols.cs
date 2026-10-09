using System;
using System.IO;
using System.Text;

class Program {
    static void Main() {
        string themeDir = @"D:\antigravity\cherry3\cherry-theme\";
        string funcPath = themeDir + "functions.php";
        string funcPhp = File.ReadAllText(funcPath);

        if (!funcPhp.Contains("cherry_set_custom_edit_artwork_columns")) {
            string adminColumnsCode = @"
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
                echo '<span style=""color:#999;"">Chưa có ảnh</span>';
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
            echo  ? '<span style=""color:red; font-weight:bold;"">🔴 Đã Bán</span>' : '<span style=""color:green; font-weight:bold;"">🟢 Còn Trống</span>';
            break;
        case 'art_online':
             = get_field('art_online', );
            echo  ? '<span style=""color:blue; font-weight:bold;"">🌐 Đang Online</span>' : '<span style=""color:gray;"">Ẩn (Offline)</span>';
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
                echo '<a href=""'.esc_url().'"" target=""_blank"" style=""color:#0071a1; font-weight:500;"">🔗 Click xem link</a>';
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
";
            File.AppendAllText(funcPath, adminColumnsCode, Encoding.UTF8);
            Console.WriteLine("Admin columns appended to functions.php");
        } else {
            Console.WriteLine("Admin columns already exist in functions.php");
        }
    }
}
