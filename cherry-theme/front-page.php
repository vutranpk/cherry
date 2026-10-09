<?php
/**
 * Template Name: Homepage
 */
get_header(); ?>

<main>
    <!-- HERO SECTION -->
    <?php
    $hero_pc = get_field('hero_bg_pc') ?: get_template_directory_uri() . '/assets/images/bannerhero.jpg';
    $hero_mobile = get_field('hero_bg_mobile') ?: get_template_directory_uri() . '/assets/images/bannerheromb.jpg';
    ?>
    <section class="hero-section" id="hero">
        <picture>
            <source media="(max-width: 767px)" srcset="<?php echo esc_url($hero_mobile); ?>">
            <img src="<?php echo esc_url($hero_pc); ?>" alt="Cherry Artwork Background" class="hero-bg" loading="lazy" decoding="async">
        </picture>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="vibe-heading hero-title">
                <span style="font-size: 0.5em; display: block; margin-bottom: 10px; font-weight: 300; letter-spacing: 2px; text-transform: uppercase;"><?php cherry_e('Triển lãm nghệ thuật Vị Nhân Sinh'); ?></span>
                Cherry <span style="font-family: var(--f-sans); font-weight: 300; opacity: 0.7;">&times;</span> K COFFEE
            </h1>
            <p class="hero-subtitle"><?php cherry_e('Lan tỏa yêu thương qua từng nét vẽ. Mỗi tác phẩm là một câu chuyện, một hy vọng gửi đến các em nhỏ có hoàn cảnh khó khăn.'); ?></p>
            <a href="#gallery" class="pill-btn hero-cta"><?php cherry_e('Khám Phá Bộ Sưu Tập'); ?></a>
        </div>
        <div class="scroll-indicator">
            <span><?php cherry_e('Cuộn xuống'); ?></span>
            <div class="scroll-line"></div>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section class="section-padding" id="about" style="background: var(--c-bg);">
        <div class="container about-grid">
            <div class="about-image-wrap">
                <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/images/cherry-artist.jpg" alt="Họa sĩ nhí Cherry" class="about-img">
            </div>
            <div class="about-text-wrap">
                <p class="tagline"><?php cherry_e('Câu Chuyện'); ?></p>
                <h2 class="vibe-heading about-heading" style="font-size: clamp(2.5rem, 5vw, 4rem); margin-bottom: 20px;"><?php cherry_e('Cherry là'); ?> <i style="color: var(--c-accent); font-family: 'Playfair Display', serif;"><?php cherry_e('ai?'); ?></i></h2>
                <div class="vibe-text">
                    <p><strong><?php cherry_e('Sinh năm 2012, cô bé họa sĩ nhí'); ?> Cherry</strong> <?php cherry_e('không chỉ có tài năng nghệ thuật bẩm sinh mà còn sở hữu một trái tim nhân ái rộng lớn.'); ?></p>
                    <p><?php cherry_e('Ngay từ những nét cọ đầu đời, Cherry đã ấp ủ ước mơ dùng hội họa để lan tỏa yêu thương. Với em, mỗi bức tranh không chỉ là sự pha trộn của sắc màu, mà là'); ?> <span style="color: var(--c-accent); font-weight: 600;"><?php cherry_e('một thông điệp, một cánh tay chìa ra'); ?></span> <?php cherry_e('với những số phận kém may mắn hơn mình.'); ?></p>
                </div>
                <div style="margin-top: 40px;">
                    <a href="#history" class="pill-btn" style="background: transparent; color: var(--c-text); border: 1px solid var(--c-border);"><?php cherry_e('Hành Trình Yêu Thương'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <!-- GALLERY SECTION (ARTWORKS) -->
    <section class="section-padding" id="gallery" style="background: var(--c-bg-alt);">
        <div class="container">
            <div class="section-header" style="margin-bottom: 50px;">
                <div>
                    <p class="tagline"><?php cherry_e('BST Tranh'); ?></p>
                    <h2 class="vibe-heading" style="font-size: clamp(2.5rem, 5vw, 4rem);"><?php cherry_e('Sắc màu'); ?><br/><i style="color: var(--c-accent);"><?php cherry_e('Hy vọng'); ?></i></h2>
                </div>
                <div class="section-desc">
                    <p class="vibe-text"><?php cherry_e('Những tác phẩm được vẽ từ trái tim, mang theo ước mơ về một tương lai tươi sáng hơn cho các em nhỏ.'); ?></p>
                </div>
            </div>

            <div class="gallery-masonry" id="gallery-masonry">
                <?php
                $art_query = new WP_Query(array(
                    'post_type'      => 'artwork',
                    'posts_per_page' => 12,
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                ));
                if ($art_query->have_posts()) :
                    while ($art_query->have_posts()) : $art_query->the_post();
                        $status = get_field('status'); // 'available' or 'sold'
                        $sold_text = ($status == 'sold') ? cherry_e('Đã Bán', false) : '';
                        $price = get_field('price');
                        $year = get_field('year') ?: date('Y');
                        $material = get_field('material');
                        $size = get_field('size');
                        $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        
                        $meta_desc = "<div>{$size} - {$material} ({$year})</div><div>{$price}" . ($sold_text ? " / <span style='color: #ff4d4d; font-weight: bold;'>{$sold_text}</span>" : "") . "</div>";
                        ?>
                        <div class="art-card">
                            <a href="<?php echo esc_url($img_url); ?>" class="glightbox" data-gallery="cherry-gallery" data-description="<div class='meta-title'><?php echo esc_attr(get_the_title()); ?></div><div class='meta-grid'><?php echo esc_attr($meta_desc); ?></div>">
                                <img loading="lazy" src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>" class="art-img">
                                <?php if ($status == 'sold'): ?>
                                    <span class="status-badge"><?php echo $sold_text; ?></span>
                                <?php endif; ?>
                                <div class="art-overlay">
                                    <h3 style="font-family: var(--f-serif); font-size: 1.5rem; margin-bottom: 5px;"><?php the_title(); ?></h3>
                                    <p style="font-size: 0.85rem; opacity: 0.8;"><?php echo esc_html($size); ?> | <?php echo esc_html($material); ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php else: ?>
                    <p style="text-align: center; width: 100%; color: var(--c-text-mut);"><?php cherry_e('Đang cập nhật tác phẩm mới...'); ?></p>
                <?php endif; ?>
            </div>
            
            <?php if ($art_query->found_posts > 12): ?>
            <div style="text-align: center; margin-top: 60px;">
                <button class="pill-btn" id="load-more-btn"><?php cherry_e('TẢI THÊM TRANH'); ?></button>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- TESTIMONIALS SECTION -->
    <section class="section-padding" id="testimonials" style="background: var(--c-bg);">
        <div class="container">
            <p class="tagline text-center" style="text-align: center;"><?php cherry_e('Cảm Nhận'); ?></p>
            <h2 class="vibe-heading text-center" style="text-align: center; font-size: clamp(2.5rem, 5vw, 4rem); margin-bottom: 50px;"><?php cherry_e('Tiếng Vọng'); ?></h2>
            
            <div class="testi-slider-wrap">
                <div class="testi-track" id="testi-track">
                    <?php
                    $testi_query = new WP_Query(array(
                        'post_type'      => 'testimonial',
                        'posts_per_page' => 5,
                        'orderby'        => 'date',
                        'order'          => 'DESC'
                    ));
                    if ($testi_query->have_posts()) :
                        while ($testi_query->have_posts()) : $testi_query->the_post();
                            $role = get_field('role');
                            $avatar = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') ?: get_template_directory_uri() . '/assets/images/default-avatar.png';
                            ?>
                            <div class="testi-item">
                                <p class="testi-quote">"<?php echo strip_tags(get_the_content()); ?>"</p>
                                <div class="testi-author-wrap">
                                    <div class="avata-testimonials">
                                        <img loading="lazy" src="<?php echo esc_url($avatar); ?>" alt="<?php the_title_attribute(); ?>">
                                    </div>
                                    <div>
                                        <h4 style="font-family: var(--f-sans); font-size: 1.1rem; margin: 0;"><?php the_title(); ?></h4>
                                        <p style="font-size: 0.85rem; color: var(--c-text-mut); margin: 0;"><?php echo esc_html($role); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- HISTORY / STATS SECTION -->
    <section class="section-padding" id="history" style="background: var(--c-bg-alt);">
        <div class="container history-grid">
            <div class="history-content">
                <p class="tagline"><?php cherry_e('Hành Trình'); ?></p>
                <h2 class="vibe-heading" style="font-size: clamp(2.5rem, 5vw, 4rem); margin-bottom: 20px;"><?php cherry_e('Lan Tỏa'); ?></h2>
                <p class="vibe-text mb-lg" style="margin-bottom: 40px;"><?php cherry_e('Những con số biết nói minh chứng cho một hành trình nghệ thuật đầy ý nghĩa, nơi mỗi tác phẩm là một niềm hy vọng được thắp lên.'); ?></p>
                <a href="<?php echo get_permalink(get_page_by_path('gioi-thieu')); ?>" class="pill-btn"><?php cherry_e('Tìm Hiểu Thêm'); ?></a>
            </div>
            
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number">130+</span>
                    <span class="stat-label"><?php cherry_e('Tác Phẩm'); ?></span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">80%</span>
                    <span class="stat-label"><?php cherry_e('Quyên Góp'); ?></span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">2+</span>
                    <span class="stat-label"><?php cherry_e('Bệnh Viện'); ?></span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">1000+</span>
                    <span class="stat-label"><?php cherry_e('Trẻ Em'); ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- NEWS & BLOG SECTION -->
    <section class="section-padding" id="news" style="background: var(--c-bg);">
        <div class="container">
            <div class="section-header" style="margin-bottom: 50px; display: flex; justify-content: space-between; align-items: flex-end;">
                <div>
                    <p class="tagline"><?php cherry_e('Tin Tức'); ?></p>
                    <h2 class="vibe-heading" style="font-size: clamp(2.5rem, 5vw, 4rem); margin: 0;"><?php cherry_e('Bản Tin'); ?></h2>
                </div>
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="pill-btn" style="background: transparent; color: var(--c-text); border: 1px solid var(--c-border);"><?php cherry_e('Xem Tất Cả'); ?></a>
            </div>

            <div class="news-grid">
                <?php
                $news_query = new WP_Query(array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                ));
                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                        $img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: get_template_directory_uri() . '/assets/images/bannerhero.jpg';
                        ?>
                        <article class="news-card">
                            <a href="<?php the_permalink(); ?>">
                                <img loading="lazy" src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>">
                            </a>
                            <div class="news-content">
                                <span class="news-date"><?php echo get_the_date('d/m/Y'); ?></span>
                                <h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <a href="<?php the_permalink(); ?>" class="news-link"><?php cherry_e('Đọc Tiếp'); ?> <i class="fas fa-arrow-right" style="margin-left: 5px;"></i></a>
                            </div>
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php else: ?>
                    <p style="text-align: center; width: 100%; color: var(--c-text-mut);"><?php cherry_e('Chưa có bản tin nào.'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>