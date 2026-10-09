<?php
/**
 * Template Name: Homepage
 */
get_header(); ?>
<main>
<!-- HERO SECTION -->
    <section class="hero" id="hero">
        <div class="watermark">Cherry</div>
        <div class="container hero-inner">
            <div class="hero-content">
                <p class="tagline"><span class="brand-kcoffee">K&nbsp;COFFEE</span> x Cherry</p>
                <h1 class="vibe-heading hero-title">
                    Chia sẻ<br>yêu thương
                </h1>
                <p class="vibe-text hero-desc">
                    Triển lãm nghệ thuật đánh dấu hành trình thiện nguyện đầy cảm hứng của cô họa sĩ nhí 13 tuổi.
                </p>
            </div>
            <div class="hero-img-wrap">
                <img id="hero-random-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/bannerhero.jpg" alt="Cherry Artwork">
                <a href="#gallery" class="circle-btn">Khám phá<br>Gallery<br><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="square" stroke-linejoin="miter" style="margin-top: 5px;"><line x1="5" y1="5" x2="19" y2="19"></line><polyline points="10 19 19 19 19 10"></polyline></svg></a>
            </div>
        </div>
    </section>

    <!-- PROJECT INFO SECTION -->
    <section id="project-info">
        <div class="project-metrics">
            <div class="metric-item metric-item-featured">
                <h3 class="vibe-heading" style="font-size: clamp(2rem, 4vw, 3rem); margin-bottom: 20px;">Chia sẻ<br>Yêu thương</h3>
                <p class="metric-desc"><span class="brand-kcoffee">K&nbsp;COFFEE</span> &times; CHERRY</p>
            </div>
            <div class="metric-item">
                <span class="metric-label">Đóng góp</span>
                <h3 class="metric-value">80%</h3>
                <p class="metric-desc">Doanh thu bán tranh</p>
            </div>
            <div class="metric-item">
                <span class="metric-label">Quy mô</span>
                <h3 class="metric-value">130+</h3>
                <p class="metric-desc">Tác phẩm nghệ thuật</p>
            </div>
            <div class="metric-item">
                <span class="metric-label">Mục tiêu</span>
                <h3 class="metric-value" style="font-size: clamp(2rem, 3vw, 2.5rem); line-height: 1.1; margin-top: auto; padding-top: 15px; font-weight: var(--fw-medium);">BV. Nhi Đồng<br>1 & 2</h3>
                <p class="metric-desc">Hỗ trợ bệnh nhi</p>
            </div>
        </div>
    </section>

    <!-- AUTHOR SECTION -->
    <section id="author">
        <div class="author-split">
            <div class="author-content-wrap">
                <p class="tagline">Tác giả</p>
                <h2 class="vibe-heading hero-title">Cherry</h2>
                <p class="vibe-text" style="color: var(--c-text);">
                    <i>HÀNH TRÌNH CHIA SẺ YÊU THƯƠNG</i>
                </p>
                <p class="vibe-text" style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 20px;">
                    Cherry, cô bé 11 tuổi đến từ TP.HCM, được biết đến như một "họa sĩ nhí" với khả năng sáng tạo và tình yêu đặc biệt dành cho hội họa.
                </p>
                <p class="vibe-text" style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 20px;">
                    Cherry bắt đầu cầm cọ từ năm 3 tuổi. Từ những nét vẽ đầu tiên, hội họa dần trở thành một phần tự nhiên trong cuộc sống của em. Đến nay, Cherry đã sáng tác khoảng 130 bức tranh, mang phong cách giàu màu sắc, tự do và phóng khoáng.
                </p>
            </div>
            <div class="author-img-wrap">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cherry-artist.jpg" alt="Họa sĩ Cherry" class="author-img-full">
            </div>
        </div>
    </section>

    <!-- VIBE GALLERY SECTION (HORIZONTAL SCROLL) -->
    <section id="gallery" class="sticky-container">
        <div class="watermark" style="top: -10%; right: -5%; left: auto; transform: none; text-align: right;">ART</div>
        <div class="sticky-wrapper">
            <div class="horizontal-track">
                  
                  <!-- Intro Title -->
                  <div class="gallery-intro">
                      <p class="tagline">Trạm dừng cảm xúc</p>
                      <h2 class="vibe-heading">Góc Nhỏ <br/>Của Cherry</h2>
                      <p class="vibe-text">Khám phá không gian trưng bày độc quyền, nơi nghệ thuật hòa quyện cùng sẻ chia. Vuốt ngang để tham quan phòng tranh và cùng chúng tôi thắp lên hy vọng cho các em nhỏ.</p>
                      <a href="#" class="pill-btn btn-open-gallery mobile-view-all" style="margin-top: 20px;">Xem Tất Cả Tranh</a>
                  </div>
  
                  <?php
                  // Lấy danh sách tranh
                  \ = new WP_Query(array(
                      'post_type' => 'artwork',
                      'posts_per_page' => 10, // Hiển thị 10 bức trong slider ngang
                      'orderby' => 'date',
                      'order' => 'DESC'
                  ));
                  
                  if (\->have_posts()) :
                      \ = array('', 'art-card-rotate', 'art-card-sepia');
                      \ = 0;
                      while (\->have_posts()) : \->the_post();
                          \ = get_field('status');
                          \ = (\ == 'sold') ? 'Đã bán' : '';
                          \ = get_field('price');
                          \ = get_field('year');
                          \ = get_field('material');
                          \ = get_field('size');
                          \ = get_the_post_thumbnail_url(get_the_ID(), 'full');
                          \ = \[\ % 3];
                          \++;
                          
                          \ = "<div class='meta-title'>" . esc_attr(get_the_title()) . "</div><div class='meta-grid'><div>{\} - {\} ({\})</div><div>{\}" . (\ ? " / <span style='color: #ff4d4d; font-weight: bold;'>{\}</span>" : "") . "</div></div>";
                  ?>
                  <!-- Card -->
                  <div class="art-card <?php echo \; ?>">
                      <div class="art-card-img-wrap">
                          <a href="<?php echo esc_url(\); ?>" class="glightbox" data-gallery="cherry-gallery" data-description="<?php echo esc_attr(\); ?>">
                              <img src="<?php echo esc_url(\); ?>" alt="<?php the_title_attribute(); ?>">
                          </a>
                          <?php if (\): ?>
                              <span class="art-card-badge"><?php echo \; ?></span>
                          <?php endif; ?>
                      </div>
                      <div class="art-card-info">
                          <h3 class="art-card-title"><?php the_title(); ?></h3>
                          <p class="art-card-meta"><?php echo esc_html(\); ?> &bull; <?php echo esc_html(\); ?> &bull; <?php echo esc_html(\); ?></p>
                          <p class="art-card-price"><?php echo esc_html(\); ?></p>
                      </div>
                  </div>
                  <?php 
                      endwhile; 
                      wp_reset_postdata(); 
                  endif; 
                  ?>

                  <!-- Ending Title -->
                  <div class="gallery-ending">
                      <h2 class="gallery-ending-title">Yêu thương<br/>Vẫn còn tiếp nối</h2>
                      <p class="vibe-text gallery-ending-desc">Khám phá thêm hàng chục tác phẩm khác trong bộ sưu tập đặc biệt của Cherry. Mỗi bức tranh là một tia hy vọng mới.</p>
                      <a href="#" class="pill-btn btn-open-gallery">Xem Tất Cả Tranh</a>
                  </div>
            </div>
        </div>
    </section>

    <!-- IMPACT / HISTORY SECTION -->
    <section class="section-padding" id="history">
        <div class="container impact-container">
            <p class="tagline">Hành Trình</p>
            <h2 class="vibe-heading impact-heading">Chia sẻ yêu thương</h2>
            <p class="vibe-text impact-desc">
                Năm 2024, Quỹ được thành lập, tạo nên sự kết nối giữa nghệ thuật và thiện nguyện. Những bức tranh được lan tỏa đến cộng đồng thông qua việc bán tranh và ứng dụng trên sản phẩm.
            </p>
            
            <div class="impact-stats-wrap">
                <div class="impact-stat">
                    <h3 class="impact-number vibe-heading">80+</h3>
                    <p class="impact-label">Tác phẩm được đấu giá</p>
                </div>
                <div class="impact-stat">
                    <h3 class="impact-number vibe-heading">200<span style="font-size: 0.5em">TR</span></h3>
                    <p class="impact-label">Gây quỹ thành công</p>
                </div>
                <div class="impact-stat">
                    <h3 class="impact-number vibe-heading">03</h3>
                    <p class="impact-label">Dự án cộng đồng</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SCHEDULE SECTION -->
    <section class="section-padding" id="schedule">
        <div class="container">
            <p class="tagline">Lịch trình</p>
            <h2 class="vibe-heading schedule-heading">Triển lãm 2026</h2>
            <div class="schedule-timeline">
                <!-- Event 1 -->
                <div class="schedule-item">
                    <div class="schedule-dot schedule-dot-active"></div>
                    <p class="schedule-date schedule-date-active">11/10 - 23/10/2026</p>
                    <h3 class="schedule-venue"><span class="brand-kcoffee">K&nbsp;COFFEE</span> Mỹ Thái</h3>
                    <p class="vibe-text">41 Đường 17, Khu phố Mỹ Thái 2, Phường Tân Phú, Quận 7, TP.HCM</p>
                </div>
                <!-- Event 2 -->
                <div class="schedule-item">
                    <div class="schedule-dot schedule-dot-upcoming"></div>
                    <p class="schedule-date schedule-date-upcoming">25/10 - 07/11/2026</p>
                    <h3 class="schedule-venue schedule-venue-upcoming"><span class="brand-kcoffee">K&nbsp;COFFEE</span> Nguyễn Thái Bình</h3>
                    <p class="vibe-text">156-158 Nguyễn Thái Bình, Phường Bến Thành, Quận 1, TP.HCM</p>
                </div>
            </div>
        </div>
    </section>

    <!-- NEWS SECTION -->
    <section class="section-padding" id="news" style="background: var(--c-bg); position: relative; overflow: hidden;">
        <div class="container">
            <div class="section-header" style="margin-bottom: 50px; display: flex; justify-content: space-between; align-items: flex-end;">
                <div>
                    <p class="tagline">Tin Tức</p>
                    <h2 class="vibe-heading" style="margin-bottom: 0;">Bản Tin</h2>
                </div>
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="pill-btn mobile-view-all">Xem Tất Cả</a>
            </div>
            
            <div class="news-grid">
                <?php
                \ = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                if (\->have_posts()) :
                    while (\->have_posts()) : \->the_post();
                        \ = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: get_template_directory_uri() . '/assets/images/bannerhero.jpg';
                ?>
                <div class="news-card">
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url(\); ?>" alt="<?php the_title_attribute(); ?>"></a>
                    <div class="news-content">
                        <span class="news-date"><?php echo get_the_date('d/m/Y'); ?></span>
                        <h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <a href="<?php the_permalink(); ?>" class="news-link">Đọc tiếp <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="square" stroke-linejoin="miter" style="vertical-align: -4px; margin-left: 5px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
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

</main>
<?php get_footer(); ?>
