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
                <h2 class="vibe-heading about-heading"><?php cherry_e('Cherry là'); ?><br/><i style="color: var(--c-accent); font-family: 'Playfair Display', serif;"><?php cherry_e('ai?'); ?></i></h2>
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
            <div class="section-header">
                <div>
                    <p class="tagline"><?php cherry_e('BST Tranh'); ?></p>
                    <h2 class="vibe-heading"><?php cherry_e('Sắc màu<br/>Hy vọng'); ?></h2>
                </div>
                <div class="section-desc">
                    <p class="vibe-text"><?php cherry_e('Những tác phẩm được vẽ từ trái tim, mang theo ước mơ về một tương lai tươi sáng hơn cho các em nhỏ.'); ?></p>
                </div>
            </div>

            <div class="gallery-masonry" id="gallery-masonry">
                <?php
                $art_args = array(
                    'post_type' => 'artwork',
                    'posts_per_page' => -1, // Lấy hết để cho vào Fancybox
                    'orderby' => 'rand' // Lấy ngẫu nhiên
                );
                $art_query = new WP_Query($art_args);
                $count = 0;
                
                if ($art_query->have_posts()) :
                    while ($art_query->have_posts()) : $art_query->the_post();
                        $count++;
                        // Nếu là tranh online thì mới hiện
                        if (get_field('art_online') !== false && !get_field('art_online')) continue;

                        $is_sold = get_field('art_sold');
                        $art_meta = get_field('art_meta');
                        $art_price = get_field('art_price');
                        $img_url = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: 'https://images.unsplash.com/photo-1541961017774-22349e4a1262?auto=format&fit=crop&w=800&q=80';
                        $full_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full') ?: $img_url;
                        
                        // Chỉ hiển thị 10 tranh đầu tiên, còn lại ẩn đi nhưng vẫn cho vào Fancybox gallery
                        $display_style = ($count > 10) ? 'display: none;' : '';
                        ?>
                        <div class="art-card" style="<?php echo $display_style; ?>">
                            <a href="<?php echo esc_url($full_img_url); ?>" 
                               data-fancybox="gallery" 
                               data-caption="<strong><?php the_title(); ?></strong><br/><?php echo esc_attr($art_meta); ?><br/><?php echo esc_attr($art_price); ?>">
                                
                                <img loading="lazy" decoding="async" src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>" class="art-img">
                                <div class="art-overlay">
                                    <div class="art-info">
                                        <h3 class="art-title"><?php the_title(); ?></h3>
                                        <p class="art-meta"><?php echo esc_html($art_meta); ?></p>
                                        <p class="art-price"><?php echo esc_html($art_price); ?></p>
                                    </div>
                                </div>
                                <?php if($is_sold): ?>
                                    <span class="status-badge sold"><?php cherry_e('Đã Bán'); ?></span>
                                <?php endif; ?>
                            </a>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    echo '<p>'.cherry__('Đang cập nhật tranh...').'</p>';
                endif;
                ?>
            </div>
            
            <?php if($count > 10): ?>
            <div style="text-align: center; margin-top: var(--sp-xl);">
                <p class="vibe-text" style="margin-bottom: 20px; font-style: italic; opacity: 0.7;"><?php cherry_e('Khám phá thêm hàng chục tác phẩm khác trong bộ sưu tập đặc biệt của Cherry. Mỗi bức tranh là một tia hy vọng mới.'); ?></p>
                <button class="pill-btn" id="load-more-art"><?php cherry_e('Xem Tất Cả Tranh'); ?></button>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const loadBtn = document.getElementById('load-more-art');
                    if(loadBtn) {
                        loadBtn.addEventListener('click', function() {
                            const hiddenArts = document.querySelectorAll('.art-card[style="display: none;"]');
                            hiddenArts.forEach(art => {
                                art.style.display = 'block';
                            });
                            this.style.display = 'none';
                        });
                    }
                });
            </script>
            <?php endif; ?>
        </div>
    </section>

    <!-- HISTORY / STATS SECTION -->
    <section class="section-padding" id="history">
        <div class="container history-grid">
            <div class="history-text">
                <p class="tagline"><?php cherry_e('Hành Trình'); ?></p>
                <h2 class="vibe-heading"><?php cherry_e('Chia sẻ yêu thương'); ?></h2>
                <p class="vibe-text" style="margin-top: 20px;"><?php cherry_e('Năm 2024, Quỹ được thành lập, tạo nên sự kết nối giữa nghệ thuật và thiện nguyện. Những bức tranh được lan tỏa đến cộng đồng thông qua việc bán tranh và ứng dụng trên sản phẩm.'); ?></p>
            </div>
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number">130</span>
                    <span class="stat-label"><?php cherry_e('Tác phẩm<br/>đã sáng tác'); ?></span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">2</span>
                    <span class="stat-label"><?php cherry_e('Triển lãm<br/>gây quỹ'); ?></span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label"><?php cherry_e('Trẻ em<br/>được hỗ trợ'); ?></span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">10+</span>
                    <span class="stat-label"><?php cherry_e('Ứng dụng<br/>Sản phẩm'); ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- MERCHANDISE SECTION -->
    <section class="section-padding" id="merch" style="background: var(--c-bg-alt); overflow: hidden;">
        <div class="container">
            <div class="section-header">
                <div>
                    <p class="tagline"><?php cherry_e('Sản phẩm'); ?></p>
                    <h2 class="vibe-heading"><?php cherry_e('Gây quỹ'); ?></h2>
                </div>
                <div class="section-desc">
                    <a href="#" class="pill-btn" style="background: transparent; color: var(--c-text); border: 1px solid var(--c-border);"><?php cherry_e('Xem toàn bộ sản phẩm'); ?></a>
                </div>
            </div>

            <div class="merch-slider" id="merch-slider">
                <div class="merch-track">
                    <?php
                    $merch_args = array('post_type' => 'merch', 'posts_per_page' => -1);
                    $merch_query = new WP_Query($merch_args);
                    if ($merch_query->have_posts()) :
                        while ($merch_query->have_posts()) : $merch_query->the_post();
                            $merch_link = get_field('merch_link') ?: '#';
                            $merch_img = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=400&q=80';
                            ?>
                            <div class="merch-item">
                                <a href="<?php echo esc_url($merch_link); ?>" target="_blank">
                                    <img loading="lazy" decoding="async" src="<?php echo esc_url($merch_img); ?>" alt="<?php the_title(); ?>">
                                </a>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- NEWS & MEDIA SECTION -->
    <section class="section-padding" id="news">
        <div class="container">
            <p class="tagline" style="text-align: center;"><?php cherry_e('Tin Tức'); ?></p>
            <h2 class="vibe-heading" style="text-align: center; margin-bottom: var(--sp-xl);"><?php cherry_e('Báo Chí &<br/>Sự kiện'); ?></h2>
            
            <div class="news-grid">
                <?php
                $news_args = array('post_type' => 'post', 'posts_per_page' => 3);
                $news_query = new WP_Query($news_args);
                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                        ?>
                        <div class="news-card">
                            <a href="<?php the_permalink(); ?>">
                                <img loading="lazy" decoding="async" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: 'https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?auto=format&fit=crop&w=800&q=80'; ?>" alt="<?php the_title(); ?>">
                            </a>
                            <div class="news-content">
                                <span class="news-date"><?php echo get_the_date('d/m/Y'); ?></span>
                                <h3 class="news-title"><a href="<?php the_permalink(); ?>" style="color:inherit;text-decoration:none;"><?php the_title(); ?></a></h3>
                                <a href="<?php the_permalink(); ?>" class="news-link"><?php cherry_e('Đọc tiếp'); ?> <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="square" stroke-linejoin="miter" style="vertical-align: -4px; margin-left: 5px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <div style="text-align: center; margin-top: var(--sp-xl);">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="pill-btn"><?php cherry_e('Xem Tất Cả Tin Tức & Sự Kiện'); ?></a>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS SECTION -->
    <section class="section-padding" id="testimonials" style="background: var(--c-bg-alt); position: relative; overflow: hidden;">
        <div class="container" style="position: relative; z-index: 2;">
            <p class="tagline" style="text-align:center;"><?php cherry_e('Góc Nhìn'); ?></p>
            <h2 class="vibe-heading" style="margin-bottom: var(--sp-md); text-align:center;"><?php cherry_e('Lời Nhắn Nhủ'); ?></h2>
            <div class="testimonial-wrapper" style="position: relative;">
                <div class="testimonial-slider" id="testi-slider">
                    <?php
                    $testi_args = array('post_type' => 'testimonial', 'posts_per_page' => 6);
                    $testi_query = new WP_Query($testi_args);
                    if ($testi_query->have_posts()) :
                        while ($testi_query->have_posts()) : $testi_query->the_post();
                            $role = get_field('testi_role');
                            $avatar = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') ?: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=200&q=80';
                            ?>
                            <div class="testi-item">
                                <div style="color: var(--c-accent); margin-bottom: 15px;">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"/></svg>
                                </div>
                                <div class="testi-quote"><?php the_content(); ?></div>
                                <div class="testi-author-wrap">
                                    <span class="avata-testimonials"><img src="<?php echo esc_url($avatar); ?>" alt="<?php the_title(); ?>"></span>
                                    <div class="testi-author-info">
                                        <p class="testi-author"><?php the_title(); ?></p>
                                        <p class="testi-role"><?php echo esc_html($role); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
                <div class="testi-nav">
                    <button id="testi-prev" class="testi-nav-btn"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="square" stroke-linejoin="miter" style="vertical-align: middle;"><polyline points="15 18 9 12 15 6"></polyline></svg></button>
                    <button id="testi-next" class="testi-nav-btn"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="square" stroke-linejoin="miter" style="vertical-align: middle;"><polyline points="9 18 15 12 9 6"></polyline></svg></button>
                </div>
            </div>
        </div>
    </section>

    <!-- SCHEDULE SECTION -->
    <section class="section-padding" id="schedule">
        <div class="container">
            <p class="tagline"><?php cherry_e('Lịch trình'); ?></p>
            <h2 class="vibe-heading schedule-heading"><?php cherry_e('Triển lãm 2026'); ?></h2>
            <div class="schedule-timeline">
                <?php
                $sched_args = array('post_type' => 'schedule', 'posts_per_page' => -1);
                $sched_query = new WP_Query($sched_args);
                $i = 0;
                if ($sched_query->have_posts()) :
                    while ($sched_query->have_posts()) : $sched_query->the_post();
                        $i++;
                        $time = get_field('schedule_time');
                        $address = get_field('schedule_address');
                        $img = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=800&q=80';
                        $dot_class = ($i == 1) ? 'schedule-dot-active' : 'schedule-dot-upcoming';
                        $date_class = ($i == 1) ? 'schedule-date-active' : 'schedule-date-upcoming';
                        $venue_class = ($i == 1) ? '' : 'schedule-venue-upcoming';
                        ?>
                        <div class="news-card">
                            <img loading="lazy" decoding="async" src="<?php echo esc_url($img); ?>" alt="<?php the_title(); ?>">
                            <div class="news-content">
                                <div class="schedule-dot <?php echo $dot_class; ?>"></div>
                                <p class="schedule-date <?php echo $date_class; ?>"><?php echo esc_html($time); ?></p>
                                <h3 class="schedule-venue <?php echo $venue_class; ?>"><?php the_title(); ?></h3>
                                <p class="vibe-text"><?php echo esc_html($address); ?></p>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section class="section-padding contact-section" id="contact">
        <div class="container contact-grid">
            <div class="contact-info">
                <p class="tagline"><?php cherry_e('Kết Nối'); ?></p>
                <h2 class="vibe-heading"><?php cherry_e('Lan tỏa<br/>Yêu thương'); ?></h2>
                <p class="vibe-text" style="margin-top:var(--sp-md); max-width:85%;"><?php cherry_e('Mọi sự quan tâm, đóng góp của bạn đều là động lực to lớn giúp Quỹ Cherry mang đến nhiều nụ cười hơn cho trẻ thơ.'); ?></p>
                
                <div class="contact-details">
                    <p class="vibe-text"><strong>Hotline:</strong> 1900 3009</p>
                    <p class="vibe-text"><strong>Email:</strong> quynghethuat@cherry.vn</p>
                </div>
            </div>
            <div class="contact-form-wrap">
                <?php echo do_shortcode('[contact-form-7 id="b5579e5" title="Email phản hồi"]'); ?>
            </div>
        </div>
    </section>

</main>
<?php get_footer(); ?>