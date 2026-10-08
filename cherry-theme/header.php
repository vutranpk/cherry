<?php
// Lấy các thông tin để gán vào Meta
\ = get_bloginfo('name');
\ = get_bloginfo('description');
global \;
\ = home_url(add_query_arg(array(), \->request));

if (is_single() || is_page()) {
    \ = get_the_title() . ' | ' . \;
    \ = has_excerpt() ? wp_trim_words(get_the_excerpt(), 25) : wp_trim_words(get_post_field('post_content', get_the_ID()), 25);
    \ = has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/images/bannerhero.jpg';
} else {
    \ = \ . ' | ' . \;
    \ = \;
    \ = get_template_directory_uri() . '/assets/images/bannerhero.jpg';
}
if(empty(\)) {
    \ = \;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" content="notranslate">
    
    <!-- Primary Meta Tags (Dynamic SEO) -->
    <meta name="title" content="<?php echo esc_attr(\); ?>">
    <meta name="description" content="<?php echo esc_attr(\); ?>">
    <meta name="keywords" content="Cherry, K COFFEE, Triển lãm tranh, Họa sĩ nhí, Từ thiện, Sắc màu yêu thương, Nghệ thuật, Gây quỹ">
    <meta name="author" content="Cherry x K COFFEE">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/LogoKC.png">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url(\); ?>">
    <meta property="og:title" content="<?php echo esc_attr(\); ?>">
    <meta property="og:description" content="<?php echo esc_attr(\); ?>">
    <meta property="og:image" content="<?php echo esc_url(\); ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo esc_url(\); ?>">
    <meta property="twitter:title" content="<?php echo esc_attr(\); ?>">
    <meta property="twitter:description" content="<?php echo esc_attr(\); ?>">
    <meta property="twitter:image" content="<?php echo esc_url(\); ?>">
    
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
            <a href="<?php echo home_url('#about'); ?>">Tác giả</a>
            <a href="<?php echo home_url('#gallery'); ?>">Tác phẩm</a>
            <a href="<?php echo home_url('#history'); ?>">Hành trình</a>
            <a href="<?php echo home_url('#schedule'); ?>">Lịch trình</a>
            <a href="<?php echo home_url('#merch'); ?>">Cửa hàng</a>
            <a href="<?php echo home_url('#contact'); ?>">Liên hệ</a>
        </nav>
        <div class="header-actions">
            <button class="hamburger" id="hamburger" aria-expanded="false" aria-label="Menu điều hướng" aria-controls="nav-links">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>
