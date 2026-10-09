<?php
// Lấy các thông tin để gán vào Meta
$site_name = get_bloginfo('name');
$site_desc = get_bloginfo('description');
global $wp;
$current_url = home_url(add_query_arg(array(), $wp->request));

if (is_single() || is_page()) {
    $meta_title = get_the_title() . ' | ' . $site_name;
    $meta_desc = has_excerpt() ? wp_trim_words(get_the_excerpt(), 25) : wp_trim_words(get_post_field('post_content', get_the_ID()), 25);
    $meta_image = has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/images/bannerhero.jpg';
} else {
    $meta_title = $site_name . ' | ' . $site_desc;
    $meta_desc = $site_desc;
    $meta_image = get_template_directory_uri() . '/assets/images/bannerhero.jpg';
}
if(empty($meta_desc)) {
    $meta_desc = $site_name;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" content="notranslate">
    
    <!-- Primary Meta Tags (Dynamic SEO) -->
    <meta name="title" content="<?php echo esc_attr($meta_title); ?>">
    <meta name="description" content="<?php echo esc_attr($meta_desc); ?>">
    <meta name="keywords" content="Cherry, K COFFEE, Triển lãm tranh, Họa sĩ nhí, Từ thiện, Sắc màu yêu thương, Nghệ thuật, Gây quỹ">
    <meta name="author" content="Cherry x K COFFEE">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/LogoKC.png">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url($current_url); ?>">
    <meta property="og:title" content="<?php echo esc_attr($meta_title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($meta_desc); ?>">
    <meta property="og:image" content="<?php echo esc_url($meta_image); ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo esc_url($current_url); ?>">
    <meta property="twitter:title" content="<?php echo esc_attr($meta_title); ?>">
    <meta property="twitter:description" content="<?php echo esc_attr($meta_desc); ?>">
    <meta property="twitter:image" content="<?php echo esc_url($meta_image); ?>">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <!-- HEADER -->
    <header class="header">
        <a href="<?php echo home_url(); ?>" class="logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="K COFFEE Logo">
        </a>
        <nav class="nav-links" id="nav-links">
            <a href="<?php echo home_url('#about'); ?>"><?php cherry_e('Tác giả'); ?></a>
            <a href="<?php echo home_url('#gallery'); ?>"><?php cherry_e('Tác phẩm'); ?></a>
            <a href="<?php echo home_url('#history'); ?>"><?php cherry_e('Hành trình'); ?></a>
            <a href="<?php echo home_url('#schedule'); ?>"><?php cherry_e('Lịch trình'); ?></a>
            <a href="<?php echo home_url('#merch'); ?>"><?php cherry_e('Cửa hàng'); ?></a>
            <a href="<?php echo home_url('#contact'); ?>"><?php cherry_e('Liên hệ'); ?></a>
        </nav>
        <div class="header-actions">
            <button class="hamburger" id="hamburger" aria-expanded="false" aria-label="Menu điều hướng" aria-controls="nav-links">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>
