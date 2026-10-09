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
                    Chia sáº»<br>yÃªu thÆ°Æ¡ng
                </h1>
                <p class="vibe-text hero-desc">
                    Triá»ƒn lÃ£m nghá»‡ thuáº­t Ä‘Ã¡nh dáº¥u hÃ nh trÃ¬nh thiá»‡n nguyá»‡n Ä‘áº§y cáº£m há»©ng cá»§a cÃ´ há»a sÄ© nhÃ­ 13 tuá»•i.
                </p>
            </div>
            <div class="hero-img-wrap">
                <img id="hero-random-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/bannerhero.jpg" alt="Cherry Artwork">
                <a href="#gallery" class="circle-btn">KhÃ¡m phÃ¡<br>Gallery<br><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="square" stroke-linejoin="miter" style="margin-top: 5px;"><line x1="5" y1="5" x2="19" y2="19"></line><polyline points="10 19 19 19 19 10"></polyline></svg></a>
            </div>
        </div>
    </section>

    <!-- PROJECT INFO SECTION -->
    <section id="project-info">
        <div class="project-metrics">
            <div class="metric-item metric-item-featured">
                <h3 class="vibe-heading" style="font-size: clamp(2rem, 4vw, 3rem); margin-bottom: 20px;">Chia sáº»<br>YÃªu thÆ°Æ¡ng</h3>
                <p class="metric-desc"><span class="brand-kcoffee">K&nbsp;COFFEE</span> &times; CHERRY</p>
            </div>
            <div class="metric-item">
                <span class="metric-label">ÄÃ³ng gÃ³p</span>
                <h3 class="metric-value">80%</h3>
                <p class="metric-desc">Doanh thu bÃ¡n tranh</p>
            </div>
            <div class="metric-item">
                <span class="metric-label">Quy mÃ´</span>
                <h3 class="metric-value">130+</h3>
                <p class="metric-desc">TÃ¡c pháº©m nghá»‡ thuáº­t</p>
            </div>
            <div class="metric-item">
                <span class="metric-label">Má»¥c tiÃªu</span>
                <h3 class="metric-value" style="font-size: clamp(2rem, 3vw, 2.5rem); line-height: 1.1; margin-top: auto; padding-top: 15px; font-weight: var(--fw-medium);">BV. Nhi Äá»“ng<br>1 & 2</h3>
                <p class="metric-desc">Há»— trá»£ bá»‡nh nhi</p>
            </div>
        </div>
    </section>

    <!-- AUTHOR SECTION -->
    <section id="author">
        <div class="author-split">
            <div class="author-content-wrap">
                <p class="tagline">TÃ¡c giáº£</p>
                <h2 class="vibe-heading hero-title">Cherry</h2>
                <p class="vibe-text" style="color: var(--c-text);">
                    <i>HÃ€NH TRÃŒNH CHIA Sáºº YÃŠU THÆ¯Æ NG</i>
                </p>
                <p class="vibe-text" style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 20px;">
                    Cherry, cÃ´ bÃ© 11 tuá»•i Ä‘áº¿n tá»« TP.HCM, Ä‘Æ°á»£c biáº¿t Ä‘áº¿n nhÆ° má»™t "há»a sÄ© nhÃ­" vá»›i kháº£ nÄƒng sÃ¡ng táº¡o vÃ  tÃ¬nh yÃªu Ä‘áº·c biá»‡t dÃ nh cho há»™i há»a.
                </p>
                <p class="vibe-text" style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 20px;">
                    Cherry báº¯t Ä‘áº§u cáº§m cá» tá»« nÄƒm 3 tuá»•i. Tá»« nhá»¯ng nÃ©t váº½ Ä‘áº§u tiÃªn, há»™i há»a dáº§n trá»Ÿ thÃ nh má»™t pháº§n tá»± nhiÃªn trong cuá»™c sá»‘ng cá»§a em. Äáº¿n nay, Cherry Ä‘Ã£ sÃ¡ng tÃ¡c khoáº£ng 130 bá»©c tranh, mang phong cÃ¡ch giÃ u mÃ u sáº¯c, tá»± do vÃ  phÃ³ng khoÃ¡ng.
                </p>
            </div>
            <div class="author-img-wrap">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cherry-artist.jpg" alt="Há»a sÄ© Cherry" class="author-img-full">
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
                      <p class="tagline">Tráº¡m dá»«ng cáº£m xÃºc</p>
                      <h2 class="vibe-heading">GÃ³c Nhá» <br/>Cá»§a Cherry</h2>
                      <p class="vibe-text">KhÃ¡m phÃ¡ khÃ´ng gian trÆ°ng bÃ y Ä‘á»™c quyá»n, nÆ¡i nghá»‡ thuáº­t hÃ²a quyá»‡n cÃ¹ng sáº» chia. Vuá»‘t ngang Ä‘á»ƒ tham quan phÃ²ng tranh vÃ  cÃ¹ng chÃºng tÃ´i tháº¯p lÃªn hy vá»ng cho cÃ¡c em nhá».</p>
                      <a href="#" class="pill-btn btn-open-gallery mobile-view-all" style="margin-top: 20px;">Xem Táº¥t Cáº£ Tranh</a>
                  </div>
  
                  <?php
                  // Láº¥y danh sÃ¡ch tranh
                  $art_query = new WP_Query(array(
                      'post_type' => 'artwork',
                      'posts_per_page' => 10, // Hiá»ƒn thá»‹ 10 bá»©c trong slider ngang
                      'orderby' => 'date',
                      'order' => 'DESC'
                  ));
                  
                  if ($art_query->have_posts()) :
                      $card_classes = array('', 'art-card-rotate', 'art-card-sepia');
                      $i = 0;
                      while ($art_query->have_posts()) : $art_query->the_post();
                          $status = get_field('status');
                          $sold_text = ($status == 'sold') ? 'ÄÃ£ bÃ¡n' : '';
                          $price = get_field('price');
                          $year = get_field('year');
                          $material = get_field('material');
                          $size = get_field('size');
                          $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                          $class = $card_classes[$i % 3];
                          $i++;
                          
                          $meta_desc = "<div class='meta-title'>" . esc_attr(get_the_title()) . "</div><div class='meta-grid'><div>{$size} - {$material} ({$year})</div><div>{$price}" . ($sold_text ? " / <span style='color: #ff4d4d; font-weight: bold;'>{$sold_text}</span>" : "") . "</div></div>";
                  ?>
                  <!-- Card -->
                  <div class="art-card <?php echo $class; ?>">
                      <div class="art-card-img-wrap">
                          <a href="<?php echo esc_url($img_url); ?>" class="glightbox" data-fancybox="artworks" data-description="<?php echo esc_attr($meta_desc); ?>">
                              <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>">
                          </a>
                          <?php if ($sold_text): ?>
                              <span class="art-card-badge"><?php echo $sold_text; ?></span>
                          <?php endif; ?>
                      </div>
                      <div class="art-card-info">
                          <h3 class="art-card-title"><?php the_title(); ?></h3>
                          <p class="art-card-meta"><?php echo esc_html($year); ?> &bull; <?php echo esc_html($size); ?> &bull; <?php echo esc_html($material); ?></p>
                          <p class="art-card-price"><?php echo esc_html($price); ?></p>
                      </div>
                  </div>
                  <?php 
                      endwhile; 
                      wp_reset_postdata(); 
                  endif; 
                  ?>

                  <!-- Ending Title -->
                  <div class="gallery-ending">
                      <h2 class="gallery-ending-title">YÃªu thÆ°Æ¡ng<br/>Váº«n cÃ²n tiáº¿p ná»‘i</h2>
                      <p class="vibe-text gallery-ending-desc">KhÃ¡m phÃ¡ thÃªm hÃ ng chá»¥c tÃ¡c pháº©m khÃ¡c trong bá»™ sÆ°u táº­p Ä‘áº·c biá»‡t cá»§a Cherry. Má»—i bá»©c tranh lÃ  má»™t tia hy vá»ng má»›i.</p>
                      <a href="#" class="pill-btn btn-open-gallery">Xem Táº¥t Cáº£ Tranh</a>
                  </div>
            </div>
        </div>
    </section>

    <!-- IMPACT / HISTORY SECTION -->
    <section class="section-padding" id="history">
        <div class="container impact-container">
            <p class="tagline">HÃ nh TrÃ¬nh</p>
            <h2 class="vibe-heading impact-heading">Chia sáº» yÃªu thÆ°Æ¡ng</h2>
            <p class="vibe-text impact-desc">
                NÄƒm 2024, Quá»¹ Ä‘Æ°á»£c thÃ nh láº­p, táº¡o nÃªn sá»± káº¿t ná»‘i giá»¯a nghá»‡ thuáº­t vÃ  thiá»‡n nguyá»‡n. Nhá»¯ng bá»©c tranh Ä‘Æ°á»£c lan tá»a Ä‘áº¿n cá»™ng Ä‘á»“ng thÃ´ng qua viá»‡c bÃ¡n tranh vÃ  á»©ng dá»¥ng trÃªn sáº£n pháº©m.
            </p>
            
            <div class="impact-stats-wrap">
                <div class="impact-stat">
                    <h3 class="impact-number vibe-heading">80+</h3>
                    <p class="impact-label">TÃ¡c pháº©m Ä‘Æ°á»£c Ä‘áº¥u giÃ¡</p>
                </div>
                <div class="impact-stat">
                    <h3 class="impact-number vibe-heading">200<span style="font-size: 0.5em">TR</span></h3>
                    <p class="impact-label">GÃ¢y quá»¹ thÃ nh cÃ´ng</p>
                </div>
                <div class="impact-stat">
                    <h3 class="impact-number vibe-heading">03</h3>
                    <p class="impact-label">Dá»± Ã¡n cá»™ng Ä‘á»“ng</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SCHEDULE SECTION -->
    <section class="section-padding" id="schedule">
        <div class="container">
            <p class="tagline">Lá»‹ch trÃ¬nh</p>
            <h2 class="vibe-heading schedule-heading">Triá»ƒn lÃ£m 2026</h2>
            <div class="schedule-timeline">
                <!-- Event 1 -->
                <div class="schedule-item">
                    <div class="schedule-dot schedule-dot-active"></div>
                    <p class="schedule-date schedule-date-active">11/10 - 23/10/2026</p>
                    <h3 class="schedule-venue"><span class="brand-kcoffee">K&nbsp;COFFEE</span> Má»¹ ThÃ¡i</h3>
                    <p class="vibe-text">41 ÄÆ°á»ng 17, Khu phá»‘ Má»¹ ThÃ¡i 2, PhÆ°á»ng TÃ¢n PhÃº, Quáº­n 7, TP.HCM</p>
                </div>
                <!-- Event 2 -->
                <div class="schedule-item">
                    <div class="schedule-dot schedule-dot-upcoming"></div>
                    <p class="schedule-date schedule-date-upcoming">25/10 - 07/11/2026</p>
                    <h3 class="schedule-venue schedule-venue-upcoming"><span class="brand-kcoffee">K&nbsp;COFFEE</span> Nguyá»…n ThÃ¡i BÃ¬nh</h3>
                    <p class="vibe-text">156-158 Nguyá»…n ThÃ¡i BÃ¬nh, PhÆ°á»ng Báº¿n ThÃ nh, Quáº­n 1, TP.HCM</p>
                </div>
            </div>
        </div>
    </section>

    <!-- NEWS SECTION -->
    <section class="section-padding" id="news" style="background: var(--c-bg); position: relative; overflow: hidden;">
        <div class="container">
            <div class="section-header" style="margin-bottom: 50px; display: flex; justify-content: space-between; align-items: flex-end;">
                <div>
                    <p class="tagline">Tin Tá»©c</p>
                    <h2 class="vibe-heading" style="margin-bottom: 0;">Báº£n Tin</h2>
                </div>
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="pill-btn mobile-view-all">Xem Táº¥t Cáº£</a>
            </div>
            
            <div class="news-slider">
                <?php
                $news_query = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                        $img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: get_template_directory_uri() . '/assets/images/bannerhero.jpg';
                ?>
                <div class="news-card">
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>"></a>
                    <div class="news-content">
                        <span class="news-date"><?php echo get_the_date('d/m/Y'); ?></span>
                        <h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <a href="<?php the_permalink(); ?>" class="news-link">Äá»c tiáº¿p <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="square" stroke-linejoin="miter" style="vertical-align: -4px; margin-left: 5px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
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


