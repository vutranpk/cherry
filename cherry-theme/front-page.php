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
                <h3 class="vibe-heading" style="font-size: clamp(2rem, 4vw, 3rem); margin-bottom: 20px;">Chia sẻ<br>Yêu thương</span></h3>
                <p class="metric-desc"><span class="brand-kcoffee">K&nbsp;COFFEE</span> &times; CHERRY</p>
            </div>
            <div class="metric-item">
                <span class="metric-label">Đóng góp</span>
                <h3 class="metric-value">80%</h3>
                <p class="metric-desc">Doanh thu bán tranh</p>
            </div>
            <div class="metric-item">
                <span class="metric-label">Quy mô</span>
                <h3 class="metric-value">80+</h3>
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
                <h2 class="vibe-heading  hero-title">Cherry</h2>
                <p class="vibe-text" style="color: var(--c-text);">
                    <i>HÀNH TRÌNH CHIA SẺ YÊU THƯƠNG</i>
                </p>
                <p class="vibe-text" style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 20px;">
                    Cherry, cô bé 11 tuổi đến từ TP.HCM, được biết đến như một “họa sĩ nhí” với khả năng sáng tạo và tình yêu đặc biệt dành cho hội họa.
                </p>
                <p class="vibe-text" style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 20px;">
                    Cherry bắt đầu cầm cọ từ năm 3 tuổi. Từ những nét vẽ đầu tiên, hội họa dần trở thành một phần tự nhiên trong cuộc sống của em. Đến nay, Cherry đã sáng tác khoảng 130 bức tranh, mang phong cách giàu màu sắc, tự do và phóng khoáng.
                </p>
            </div>
            <div class="author-img-wrap">
                <img src="cherry.jpg" alt="Họa sĩ Cherry" class="author-img-full">
            </div>
        </div>
    </section>

    <!-- VIBE GALLERY SECTION (HORIZONTAL SCROLL) -->
    <section id="gallery" class="sticky-container">
    
        <div class="sticky-wrapper">
            <div class="horizontal-track">
                  <!-- Intro Title -->
                  <div class="gallery-intro">
                      <p class="tagline">Trạm dừng cảm xúc</p>
                      <h2 class="vibe-heading">Góc Nhỏ <br/>Của Cherry</h2>
                      <p class="vibe-text">Khám phá không gian trưng bày độc quyền, nơi nghệ thuật hòa quyện cùng sẻ chia. Vuốt ngang để tham quan phòng tranh và cùng chúng tôi thắp lên hy vọng cho các em nhỏ.</p>
                      <a href="#" class="pill-btn btn-open-gallery mobile-view-all" style="margin-top: 20px;">Xem Tất Cả Tranh</a>
                  </div>

                  <!-- Card 1 -->
                  <div class="art-card">
                      <div class="art-card-img-wrap">
                          <a href="BST TRANH/10.png" class="glightbox" data-gallery="cherry-gallery">
                              <img src="BST TRANH/10.png" alt="Hoàng Hôn Trên Phố">
                          </a>
                          <span class="art-card-badge">Đã Bán</span>
                      </div>
                      <div class="art-card-info">
                          <h3 class="art-card-title">Tưởng tượng / imagine</h3>
                          <p class="art-card-meta">2026 &bull; 40x50cm &bull; Acrylic on Canvas</p>
                          <p class="art-card-price">5.000.000 VNĐ</p>
                      </div>
                  </div>

                  <!-- Card 2 -->
                  <div class="art-card">
                      <div class="art-card-img-wrap">
                          <a href="BST TRANH/13.png" class="glightbox" data-gallery="cherry-gallery">
                              <img src="BST TRANH/13.png" alt="Giấc Mơ Tuổi Thơ">
                          </a>
                      </div>
                      <div class="art-card-info">
                          <h3 class="art-card-title">mẹ tôi / MY MUN</h3>
                          <p class="art-card-meta">2026 &bull; 40x50cm &bull; Acrylic on Canvas</p>
                          <p class="art-card-price">7.000.000 VNĐ</p>
                      </div>
                  </div>

                  <!-- Card 3 -->
                  <div class="art-card">
                      <div class="art-card-img-wrap">
                          <a href="BST TRANH/14.png" class="glightbox" data-gallery="cherry-gallery">
                              <img src="BST TRANH/14.png" alt="Khu Rừng Kỳ Lạ">
                          </a>
                          <span class="art-card-badge">Đã Bán</span>
                      </div>
                      <div class="art-card-info">
                          <h3 class="art-card-title">Sẵn sàng / ready</h3>
                          <p class="art-card-meta">2025 &bull; 50x40cm &bull; Acrylic on Canvas</p>
                          <p class="art-card-price">7.000.000 VNĐ</p>
                      </div>
                  </div>

                  <!-- Card 4 -->
                  <div class="art-card art-card-rotate">
                      <div class="art-card-img-wrap">
                          <a href="BST TRANH/15.png" class="glightbox" data-gallery="cherry-gallery">
                              <img src="BST TRANH/15.png" alt="Chuyến Đi">
                          </a>
                      </div>
                      <div class="art-card-info">
                          <h3 class="art-card-title">Phong cảnh / landscape</h3>
                          <p class="art-card-meta">2025 &bull; 50x40cm &bull; Acrylic on Canvas</p>
                          <p class="art-card-price">7.000.000 VNĐ</p>
                      </div>
                  </div>

                  <!-- Card 5 -->
                  <div class="art-card art-card-sepia">
                      <div class="art-card-img-wrap">
                          <a href="BST TRANH/16.png" class="glightbox" data-gallery="cherry-gallery">
                              <img src="BST TRANH/16.png" alt="Góc Nhỏ">
                          </a>
                          <span class="art-card-badge">Đã Bán</span>
                      </div>
                      <div class="art-card-info">
                          <h3 class="art-card-title">Mèo mơ / a cat dreaming</h3>
                          <p class="art-card-meta">2025 &bull; 40x50cm &bull; Acrylic on Canvas</p>
                          <p class="art-card-price">5.000.000 VNĐ</p>
                      </div>
                  </div>

                  <!-- Card 6 -->
                  <div class="art-card">
                      <div class="art-card-img-wrap">
                          <a href="BST TRANH/22.png" class="glightbox" data-gallery="cherry-gallery">
                              <img src="BST TRANH/22.png" alt="Nhịp Đập Mùa Thu">
                          </a>
                      </div>
                      <div class="art-card-info">
                          <h3 class="art-card-title">Đi đâu? / whwre to go?</h3>
                          <p class="art-card-meta">2026 &bull; 40x50cm &bull; Acrylic on Canvas</p>
                          <p class="art-card-price">5.000.000 VNĐ</p>
                      </div>
                  </div>

                  <!-- Card 7 -->
                  <div class="art-card">
                      <div class="art-card-img-wrap">
                          <a href="BST TRANH/23.png" class="glightbox" data-gallery="cherry-gallery">
                              <img src="BST TRANH/23.png" alt="Đường Chân Trời">
                          </a>
                      </div>
                      <div class="art-card-info">
                          <h3 class="art-card-title">Cô gái và hoa sen / the girl & the lotus</h3>
                          <p class="art-card-meta">2025 &bull; 40x50cm &bull; Acrylic on Canvas</p>
                          <p class="art-card-price">5.000.000 VNĐ</p>
                      </div>
                  </div>

                  <!-- Card 8 -->
                  <div class="art-card">
                      <div class="art-card-img-wrap">
                          <a href="BST TRANH/24.png" class="glightbox" data-gallery="cherry-gallery">
                              <img src="BST TRANH/24.png" alt="Hoa Trong Sương">
                          </a>
                          <span class="art-card-badge">Đã Bán</span>
                      </div>
                      <div class="art-card-info">
                          <h3 class="art-card-title">sapa việt nam/ sapa, viet nam</h3>
                          <p class="art-card-meta">2024 &bull; 50x40cm &bull; Acrylic on Canvas</p>
                          <p class="art-card-price">5.000.000 VNĐ</p>
                      </div>
                  </div>

                  <!-- Card 9 -->
                  <div class="art-card art-card-rotate">
                      <div class="art-card-img-wrap">
                          <a href="BST TRANH/34.png" class="glightbox" data-gallery="cherry-gallery">
                              <img src="BST TRANH/34.png" alt="Bến Bờ Hạnh Phúc">
                          </a>
                      </div>
                      <div class="art-card-info">
                          <h3 class="art-card-title">chim bói cá / kingfisher</h3>
                          <p class="art-card-meta">2025 &bull; 40x30cm &bull; Acrylic on Canvas</p>
                          <p class="art-card-price">5.000.000 VNĐ</p>
                      </div>
                  </div>

                  <!-- Card 10 -->
                  <div class="art-card art-card-sepia">
                      <div class="art-card-img-wrap">
                          <a href="BST TRANH/80.png" class="glightbox" data-gallery="cherry-gallery">
                              <img src="BST TRANH/80.png" alt="Hoài Niệm">
                          </a>
                          <span class="art-card-badge">Đã Bán</span>
                      </div>
                      <div class="art-card-info">
                          <h3 class="art-card-title">những chú mèo nhảy múa / dancing cats</h3>
                          <p class="art-card-meta">2026 &bull; 30x40cm &bull; Acrylic on Canvas</p>
                          <p class="art-card-price">7.000.000 VNĐ</p>
                      </div>
                  </div>

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
            <h2 class="vibe-heading impact-heading">Chia sẻ yêu thương
            </h2>
            <p class="vibe-text impact-desc">
                Năm 2024, Quỹ được thành lập, tạo nên sự kết nối giữa nghệ thuật và thiện nguyện. Những bức tranh được lan tỏa đến cộng đồng thông qua việc bán tranh và ứng dụng trên sản phẩm.
            </p>
            
            <div class="impact-stats-wrap">
                <div class="impact-stat-item">
                    <div class="impact-number stat-counter" data-target="51">0</div>
                    <div class="impact-label" style="font-weight: var(--fw-bold);">Bức tranh đã bán</div>
                    <div class="impact-sub">(2024 - 2025)</div>
                </div>
                <div class="impact-stat-item">
                    <div class="impact-number"><span class="stat-counter" data-target="400">0</span>+</div>
                    <div class="impact-label" style="font-weight: var(--fw-bold);">triệu VNĐ Doanh thu</div>
                    <div class="impact-sub">(Đóng góp 100%)</div>
                </div>
                <div class="impact-stat-item">
                    <div class="impact-number impact-number-accent stat-counter" data-target="53">0</div>
                    <div class="impact-label" style="font-weight: var(--fw-bold);">Ca phẫu thuật</div>
                    <div class="impact-sub">(Được hỗ trợ chi phí)</div>
                </div>
            </div>
            <div class="impact-quote-wrap">
                <p class="impact-quote-text">
                    Và hành trình ấy vẫn<br/>đang tiếp tục...
                </p>
            </div>
        </div>
    </section>

    <!-- NEWS SLIDER SECTION -->
    <section class="section-padding" id="news" style="background: var(--c-bg); position: relative; overflow: hidden;">
        <div class="watermark" style="top: 20%; right: -5%; left: auto; transform: none; text-align: right; letter-spacing: -2px;">News</div>
        <div class="container" style="position: relative; z-index: 2;">
            <p class="tagline">Báo Chí & Tin Tức</p>
            <h2 class="vibe-heading" style="margin-bottom: var(--sp-md);">Chỉa sẻ Hành Trình</h2>
            <div class="news-slider">
                <div class="news-card">
                    <img src="https://images.unsplash.com/photo-1531058020387-3be344556be6?auto=format&fit=crop&w=800&q=80" alt="News 1">
                    <div class="news-content">
                        <span class="news-date">10/10/2026</span>
                        <h3 class="news-title">Triển lãm "Vũ Trụ Sắc Màu" gây quỹ thành công 400 triệu đồng</h3>
                        <a href="#" class="news-link">Đọc tiếp <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="square" stroke-linejoin="miter" style="vertical-align: -4px; margin-left: 5px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                    </div>
                </div>
                <div class="news-card">
                    <img src="https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?auto=format&fit=crop&w=800&q=80" alt="News 2">
                    <div class="news-content">
                        <span class="news-date">05/10/2026</span>
                        <h3 class="news-title">Họa sĩ nhí Cherry: Vẽ tranh bằng tâm hồn trong trẻo</h3>
                        <a href="#" class="news-link">Đọc tiếp <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="square" stroke-linejoin="miter" style="vertical-align: -4px; margin-left: 5px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                    </div>
                </div>
                <div class="news-card">
                    <img src="https://images.unsplash.com/photo-1536924940846-227afb31e2a5?auto=format&fit=crop&w=800&q=80" alt="News 3">
                    <div class="news-content">
                        <span class="news-date">01/10/2026</span>
                        <h3 class="news-title">Sự kết hợp độc đáo giữa K COFFEE và nghệ thuật</h3>
                        <a href="#" class="news-link">Đọc tiếp <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="square" stroke-linejoin="miter" style="vertical-align: -4px; margin-left: 5px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                    </div>
                </div>
                <div class="news-card">
                    <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=800&q=80" alt="News 4">
                    <div class="news-content">
                        <span class="news-date">25/09/2026</span>
                        <h3 class="news-title">Ra mắt bộ sưu tập Merchandise ý nghĩa</h3>
                        <a href="#" class="news-link">Đọc tiếp <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="square" stroke-linejoin="miter" style="vertical-align: -4px; margin-left: 5px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIAL SECTION -->
    <section class="section-padding" id="testimonials" style="background: var(--c-bg-alt); position: relative; overflow: hidden;">
          <div class="container" style="position: relative; z-index: 2;">
              <p class="tagline" style="text-align:center;">Góc Nhìn</p>
              <h2 class="vibe-heading" style="margin-bottom: var(--sp-md); text-align:center;">Lời Nhắn Nhủ</h2>
              <div class="testimonial-wrapper" style="position: relative;">
                  <div class="testimonial-slider" id="testi-slider">
                      <div class="testi-item">
                          <p class="testi-quote">"Những bức tranh không chỉ đẹp về mặt nghệ thuật mà còn mang trong mình một tâm hồn vô cùng trong trẻo, hồn nhiên. Mỗi nét vẽ đều chứa đựng tình yêu thương."</p>
                          <div class="testi-author-wrap">
                              <span class="avata-testimonials"><img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=200&q=80" alt="Author"></span>
                              <div class="testi-author-info">
                                  <p class="testi-author">Họa sĩ Lê Linh</p>
                                  <p class="testi-role">Chuyên gia phê bình nghệ thuật</p>
                              </div>
                          </div>
                      </div>
                      <div class="testi-item">
                          <p class="testi-quote">"Một dự án ý nghĩa giúp thay đổi cuộc đời của biết bao em nhỏ. Nghệ thuật đích thực là nghệ thuật vị nhân sinh, và Cherry đã làm được điều phi thường đó."</p>
                          <div class="testi-author-wrap">
                              <span class="avata-testimonials"><img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=200&q=80" alt="Author"></span>
                              <div class="testi-author-info">
                                  <p class="testi-author">BS. Nguyễn Văn An</p>
                                  <p class="testi-role">Bệnh viện Nhi Đồng</p>
                              </div>
                          </div>
                      </div>
                      <div class="testi-item">
                          <div style="color: var(--c-accent); margin-bottom: 15px;">
                              <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"/></svg>
                          </div>
                          <p class="testi-quote">"Cherry đã truyền cảm hứng lớn cho thế hệ trẻ về lòng nhân ái. Những tác phẩm mang đầy màu sắc của em thực sự chạm đến trái tim người xem."</p>
                          <div class="testi-author-wrap">
                              <span class="avata-testimonials"><img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=200&q=80" alt="Author"></span>
                              <div class="testi-author-info">
                                  <p class="testi-author">Trần Cẩm Nhung</p>
                                  <p class="testi-role">Báo Tuổi Trẻ</p>
                              </div>
                          </div>
                      </div>
                      <div class="testi-item">
                          <div style="color: var(--c-accent); margin-bottom: 15px;">
                              <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"/></svg>
                          </div>
                          <p class="testi-quote">"Đồng hành cùng Cherry, K COFFEE tự hào khi được lan tỏa những giá trị tốt đẹp đến cộng đồng thông qua dự án đầy nhân văn này."</p>
                          <div class="testi-author-wrap">
                              <span class="avata-testimonials"><img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=200&q=80" alt="Author"></span>
                              <div class="testi-author-info">
                                  <p class="testi-author">Đại diện K COFFEE</p>
                                  <p class="testi-role">Đối tác đồng hành</p>
                              </div>
                          </div>
                      </div>
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
            <p class="tagline">Lịch trình</p>
            <h2 class="vibe-heading schedule-heading">Triển lãm 2026</h2>
            <div class="schedule-timeline">
                
                <!-- Event 1 -->
                 <div class="news-card">
                    <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=800&q=80" alt="News 4">
                    <div class="news-content">
                        <div class="schedule-dot schedule-dot-active"></div>
                        <p class="schedule-date schedule-date-active">11/10 - 23/10/2026</p>
                        <h3 class="schedule-venue"><span class="brand-kcoffee">K&nbsp;COFFEE</span><br/>Mỹ Thái</h3>
                        <p class="vibe-text">41 Đường 17, Khu phố Mỹ Thái 2, Phường Tân Phú, Quận 7, TP.HCM</p>
                    </div>
                </div>
                <div class="news-card">
                    <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=800&q=80" alt="News 4">
                    <div class="news-content">
                        <div class="schedule-dot schedule-dot-upcoming"></div>
                        <p class="schedule-date schedule-date-upcoming">25/10 - 07/11/2026</p>
                        <h3 class="schedule-venue schedule-venue-upcoming"><span class="brand-kcoffee">K&nbsp;COFFEE</span><br/>Nguyễn Thái Bình</h3>
                        <p class="vibe-text">156-158 Nguyễn Thái Bình, Phường Bến Thành, Quận 1, TP.HCM</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MERCHANDISE SECTION -->
    <section class="section-padding" id="merch" style="background: var(--c-bg); position: relative; overflow: hidden;">
        <div class="container" style="position: relative; z-index: 2;">
            <p class="tagline" style=" text-align:center;"><span class="brand-kcoffee">K&nbsp;COFFEE</span> x Cherry</p>
            <h2 class="vibe-heading" style="margin-bottom: var(--sp-md); text-align:center;">Sản phẩm</h2>
            <div style="max-width: 600px; margin:0 auto  40px auto; font-size: 1.1rem; color: var(--c-text-mut); text-align:center;">
                <p><span class="brand-kcoffee">K&nbsp;COFFEE</span> vinh dự mang những nét vẽ của bé Cherry lên các sản phẩm túi Canvas và túi PP dệt. Đặc biệt, 50% doanh thu từ việc bán túi sẽ tiếp tục được sử dụng để hỗ trợ các bệnh nhi và trẻ em có hoàn cảnh khó khăn.</p>
            </div>
            
            <div class="merch-carousel-wrapper" style="position: relative;">
                <button class="merch-nav merch-prev"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="square" stroke-linejoin="miter" style="vertical-align: middle;"><polyline points="15 18 9 12 15 6"></polyline></svg></button>
                <div class="merch-product-grid" id="merch-grid">
                    <div class="merch-card">
                        <img src="https://cherry.kcoffee.vn/wp-content/uploads/2024/09/KCoffeeloveCherry_vuong_xanh_2-mat_BoLV-580x580.jpg" alt="Túi Bướm">
                    </div>
                    <div class="merch-card">
                        <img src="https://cherry.kcoffee.vn/wp-content/uploads/2024/09/KCoffeeloveCherry_vuong_xanh_2-mat_BoLV-580x580.jpg" alt="Túi Bé LV">
                    </div>
                    <div class="merch-card">
                        <img src="https://cherry.kcoffee.vn/wp-content/uploads/2024/09/KCoffeeloveCherry_vuong_xanh_2-mat_BoLV-580x580.jpg" alt="Áo Mèo">
                    </div>
                    <div class="merch-card">
                        <img src="https://cherry.kcoffee.vn/wp-content/uploads/2024/09/KCoffeeloveCherry_vuong_xanh_2-mat_BoLV-580x580.jpg" alt="Cốc">
                    </div>
                    <div class="merch-card">
                        <img src="https://cherry.kcoffee.vn/wp-content/uploads/2024/09/KCoffeeloveCherry_vuong_xanh_2-mat_BoLV-580x580.jpg" alt="Sổ">
                    </div>
                    <div class="merch-card">
                        <img src="https://cherry.kcoffee.vn/wp-content/uploads/2024/09/KCoffeeloveCherry_vuong_xanh_2-mat_BoLV-580x580.jpg" alt="Túi Tote">
                    </div>
                    <div class="merch-card">
                        <img src="https://cherry.kcoffee.vn/wp-content/uploads/2024/09/KCoffeeloveCherry_vuong_xanh_2-mat_BoLV-580x580.jpg" alt="Tranh">
                    </div>
                    <div class="merch-card">
                        <img src="https://cherry.kcoffee.vn/wp-content/uploads/2024/09/KCoffeeloveCherry_vuong_xanh_2-mat_BoLV-580x580.jpg" alt="Bình nước">
                    </div>
                </div>
                <button class="merch-nav merch-next"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="square" stroke-linejoin="miter" style="vertical-align: middle;"><polyline points="9 18 15 12 9 6"></polyline></svg></button>
            </div>
            <div style="text-align: center;"><a href="#" class="pill-btn" style="margin-top: 20px;">Đồng hành</a></div>
        </div>
    </section>
      <!-- CONTACT SECTION -->
    <section class="section-padding" id="contact">
        <div class="container">
            <div class="contact-grid">
                <div>
                    <p class="tagline">Kết nối yêu thương</p>
                    <h2 class="vibe-heading" style="margin-bottom: 20px;">Gửi Thông Điệp</h2>
                    <p class="vibe-text contact-desc" style="padding-right: 20px;">
                        Mỗi bức tranh được trao đi là một niềm hy vọng được thắp lên. Nếu bạn muốn sở hữu tác phẩm của Cherry để đồng hành cùng quỹ, hay đơn giản là gửi một lời chúc đến cô họa sĩ nhí, hãy để lại lời nhắn cho chúng tôi.
                    </p>
                </div>
                <div>
                    <form class="contact-form">
                        <div class="contact-inputs-row">
                            <input type="text" placeholder="Họ và tên *" class="contact-field" required>
                            <input type="tel" placeholder="Số điện thoại *" class="contact-field" required>
                        </div>
                        <input type="email" placeholder="Email" class="contact-field">
                        <textarea placeholder="Lời nhắn của bạn..." rows="4" class="contact-field contact-field-textarea"></textarea>
                        
                        <div class="contact-submit-wrap">
                            <button type="submit" class="pill-btn contact-submit-btn">Gửi Thông Điệp</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    
</main>
<?php get_footer(); ?>
