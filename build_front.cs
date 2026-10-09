using System;
using System.IO;
using System.Text;

class Program {
    static void Main() {
        string target = @"D:\antigravity\cherry3\cherry-theme\front-page.php";
        StringBuilder sb = new StringBuilder();

        sb.AppendLine("<?php get_header(); ?>");
        sb.AppendLine("<main>");

        // Hero Section
        sb.AppendLine(@"
    <?php 
     = get_field('hero_bg_pc') ?: get_template_directory_uri() . '/assets/images/bannerhero.jpg';
     = get_field('hero_bg_mobile') ?: get_template_directory_uri() . '/assets/images/bannerhero.jpg';
    ?>
    <section class=""hero-section"" id=""home"">
        <div class=""hero-bg desktop-bg"" style=""background-image: url('<?php echo esc_url(); ?>');""></div>
        <div class=""hero-bg mobile-bg"" style=""background-image: url('<?php echo esc_url(); ?>');""></div>
        <div class=""hero-overlay""></div>
        <div class=""hero-content"">
            <p class=""hero-tagline"">Triển lãm nghệ thuật Vị Nhân Sinh</p>
            <h1 class=""hero-title"">Cherry<br/>&times;<br/><span class=""brand-kcoffee"">K&nbsp;COFFEE</span></h1>
            <p class=""hero-desc"">Lan tỏa yêu thương qua từng nét vẽ. Mỗi tác phẩm là một câu chuyện, một hy vọng gửi đến các em nhỏ có hoàn cảnh khó khăn.</p>
            <div class=""hero-cta"">
                <a href=""#gallery"" class=""pill-btn"">Khám Phá Bộ Sưu Tập</a>
            </div>
            <div class=""hero-scroll-indicator"">
                <span class=""scroll-text"">Cuộn xuống</span>
                <div class=""scroll-line""></div>
            </div>
        </div>
    </section>
        ");

        // Introduction
        sb.AppendLine(@"
    <section class=""section-padding intro-section"" id=""about"">
        <div class=""container"">
            <p class=""tagline"">Câu Chuyện</p>
            <h2 class=""vibe-heading"">Cherry là <span class=""text-accent"">ai?</span></h2>
            
            <div class=""author-block"">
                <div class=""author-image"">
                    <img src=""<?php echo get_template_directory_uri(); ?>/assets/images/cherry-avatar.jpg"" alt=""Họa sĩ nhí Cherry"">
                </div>
                <div class=""author-content"">
                    <p class=""vibe-text"">
                        Sinh năm 2012, cô bé họa sĩ nhí <strong style=""color:var(--c-text)"">Cherry</strong> (tên thật là Trần Cẩm Nhung) không chỉ có tài năng nghệ thuật bẩm sinh mà còn sở hữu một trái tim nhân ái rộng lớn. 
                    </p>
                    <p class=""vibe-text"">
                        Ngay từ những nét cọ đầu đời, Cherry đã ấp ủ ước mơ dùng hội họa để lan tỏa yêu thương. Với em, mỗi bức tranh không chỉ là sự pha trộn của sắc màu, mà là <em>một thông điệp, một cánh tay chìa ra</em> với những số phận kém may mắn hơn mình.
                    </p>
                    <div style=""margin-top: 2rem;"">
                        <a href=""#history"" class=""pill-btn outline"">Hành Trình Yêu Thương</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
        ");

        // Gallery
        sb.AppendLine(@"
    <section class=""section-padding"" id=""gallery"" style=""padding-top: 0;"">
        <div class=""gallery-container"">
            <div class=""sticky-wrapper"">
                <div class=""horizontal-track"">
                    <!-- Intro Title -->
                    <div class=""gallery-intro"">
                        <p class=""tagline"">BST Tranh</p>
                        <h2 class=""vibe-heading"">Sắc màu<br/>Hy vọng</h2>
                        <p class=""vibe-text"" style=""margin-top:var(--sp-md); max-width:80%;"">Những tác phẩm được vẽ từ trái tim, mang theo ước mơ về một tương lai tươi sáng hơn cho các em nhỏ.</p>
                    </div>

                    <?php
                     = array(
                        'post_type' => 'artwork',
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array('key' => 'art_online', 'value' => '1', 'compare' => '==')
                        ),
                        'orderby' => 'rand'
                    );
                     = new WP_Query();
                     = 0;
                    if (->have_posts()) :
                        while (->have_posts()) : ->the_post();
                            ++;
                             = get_the_post_thumbnail_url() ?: '';
                             = get_field('art_meta') ?: 'Đang cập nhật';
                             = get_field('art_price') ?: 'Liên hệ';
                             = get_field('art_sold');
                             =  ? '<span class=""art-card-badge"">Đã Bán</span>' : '';
                            
                             = ( <= 10) ? '' : 'style=""display:none;""';
                            ?>
                            <div class=""art-card"" <?php echo ; ?>>
                                <div class=""art-card-img-wrap"">
                                    <a href=""<?php echo esc_url(); ?>"" class=""glightbox"" data-gallery=""cherry-gallery"">
                                        <img src=""<?php echo esc_url(); ?>"" alt=""<?php the_title(); ?>"">
                                    </a>
                                    <?php echo ; ?>
                                </div>
                                <div class=""art-card-info"">
                                    <h3 class=""art-card-title""><?php the_title(); ?></h3>
                                    <p class=""art-card-meta""><?php echo esc_html(); ?></p>
                                    <p class=""art-card-price""><?php echo esc_html(); ?></p>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else:
                        echo '<p>Đang cập nhật tranh...</p>';
                    endif;
                    ?>

                    <!-- Ending Title -->
                    <div class=""gallery-ending"">
                        <h2 class=""gallery-ending-title"">Yêu thương<br/>Vẫn còn tiếp nối</h2>
                        <p class=""vibe-text gallery-ending-desc"">Khám phá thêm hàng chục tác phẩm khác trong bộ sưu tập đặc biệt của Cherry. Mỗi bức tranh là một tia hy vọng mới.</p>
                        <a href=""#"" class=""pill-btn btn-open-gallery"">Xem Tất Cả Tranh</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
        ");

        // History
        sb.AppendLine(@"
    <section class=""section-padding"" id=""history"">
        <div class=""container impact-container"">
            <p class=""tagline"">Hành Trình</p>
            <h2 class=""vibe-heading impact-heading"">Chia sẻ yêu thương</h2>
            <p class=""vibe-text impact-desc"">
                Năm 2024, Quỹ được thành lập, tạo nên sự kết nối giữa nghệ thuật và thiện nguyện. Những bức tranh được lan tỏa đến cộng đồng thông qua việc bán tranh và ứng dụng trên sản phẩm.
            </p>
            <div class=""impact-stats-wrap"">
                <div class=""impact-stat-item"">
                    <div class=""impact-number stat-counter"" data-target=""51"">0</div>
                    <div class=""impact-label"">Tác phẩm<br/>đã sáng tác</div>
                </div>
                <div class=""impact-stat-item"">
                    <div class=""impact-number""><span class=""stat-counter"" data-target=""3"">0</span><span class=""plus"">+</span></div>
                    <div class=""impact-label"">Triển lãm<br/>gây quỹ</div>
                </div>
                <div class=""impact-stat-item"">
                    <div class=""impact-number stat-counter"" data-target=""100"">0</div>
                    <div class=""impact-label"">Trẻ em<br/>được hỗ trợ</div>
                </div>
            </div>
        </div>
    </section>
        ");

        // Merchandise
        sb.AppendLine(@"
    <section class=""section-padding"" style=""background: var(--c-bg-alt);"">
        <div class=""container"">
            <p class=""tagline"">Ứng dụng</p>
            <h2 class=""vibe-heading"" style=""margin-bottom: var(--sp-lg);"">Sản phẩm<br/>Gây quỹ</h2>
            
            <div class=""merch-grid"" id=""merch-grid"">
                <?php
                 = array('post_type' => 'merch', 'posts_per_page' => -1);
                 = new WP_Query();
                if (->have_posts()) :
                    while (->have_posts()) : ->the_post();
                         = get_field('merch_link') ?: 'https://kcoffee.vn/phu-kien-tui/';
                         = get_the_post_thumbnail_url() ?: '';
                        ?>
                        <div class=""merch-card"">
                            <img src=""<?php echo esc_url(); ?>"" alt=""<?php the_title(); ?>"">
                            <div class=""merch-overlay"">
                                <h3><?php the_title(); ?></h3>
                                <a href=""<?php echo esc_url(); ?>"" target=""_blank"" class=""pill-btn outline"">Ủng hộ quỹ</a>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            
            <div style=""text-align: center; margin-top: var(--sp-lg);"">
                <a href=""https://kcoffee.vn/phu-kien-tui/"" target=""_blank"" class=""pill-btn"">Xem toàn bộ sản phẩm</a>
            </div>
        </div>
    </section>
        ");

        // News
        sb.AppendLine(@"
    <section class=""section-padding"" id=""news"">
        <div class=""container"">
            <div style=""display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: var(--sp-lg);"">
                <div>
                    <p class=""tagline"">Tin Tức</p>
                    <h2 class=""vibe-heading"">Báo Chí &<br/>Sự kiện</h2>
                </div>
                <div class=""hide-mobile"">
                    <a href=""<?php echo get_permalink(get_option('page_for_posts')); ?>"" class=""pill-btn outline"">Xem tất cả</a>
                </div>
            </div>
            
            <div class=""news-grid"">
                <?php
                 = array('post_type' => 'post', 'posts_per_page' => 4);
                 = new WP_Query();
                if (->have_posts()) :
                    while (->have_posts()) : ->the_post();
                        ?>
                        <div class=""news-card"">
                            <a href=""<?php the_permalink(); ?>"">
                                <img src=""<?php echo get_the_post_thumbnail_url() ?: 'https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?auto=format&fit=crop&w=800&q=80'; ?>"" alt=""<?php the_title(); ?>"">
                            </a>
                            <div class=""news-content"">
                                <span class=""news-date""><?php echo get_the_date('d/m/Y'); ?></span>
                                <h3 class=""news-title""><a href=""<?php the_permalink(); ?>"" style=""color:inherit;text-decoration:none;""><?php the_title(); ?></a></h3>
                                <a href=""<?php the_permalink(); ?>"" class=""news-link"">Đọc tiếp <svg width=""18"" height=""18"" viewBox=""0 0 24 24"" fill=""none"" stroke=""currentColor"" stroke-width=""1.2"" stroke-linecap=""square"" stroke-linejoin=""miter"" style=""vertical-align: -4px; margin-left: 5px;""><line x1=""5"" y1=""12"" x2=""19"" y2=""12""></line><polyline points=""12 5 19 12 12 19""></polyline></svg></a>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <div class=""show-mobile"" style=""margin-top: var(--sp-md); text-align: center; display: none;"">
                <a href=""<?php echo get_permalink(get_option('page_for_posts')); ?>"" class=""pill-btn outline"">Xem tất cả</a>
            </div>
        </div>
    </section>
        ");

        // Testimonial
        sb.AppendLine(@"
    <section class=""section-padding"" id=""testimonials"" style=""background: var(--c-bg-alt); position: relative; overflow: hidden;"">
        <div class=""container"" style=""position: relative; z-index: 2;"">
            <p class=""tagline"" style=""text-align:center;"">Góc Nhìn</p>
            <h2 class=""vibe-heading"" style=""margin-bottom: var(--sp-md); text-align:center;"">Lời Nhắn Nhủ</h2>
            <div class=""testimonial-wrapper"" style=""position: relative;"">
                <div class=""testimonial-slider"" id=""testi-slider"">
                    <?php
                     = array('post_type' => 'testimonial', 'posts_per_page' => 6);
                     = new WP_Query();
                    if (->have_posts()) :
                        while (->have_posts()) : ->the_post();
                             = get_field('testi_role');
                             = get_the_post_thumbnail_url() ?: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=200&q=80';
                            ?>
                            <div class=""testi-item"">
                                <div style=""color: var(--c-accent); margin-bottom: 15px;"">
                                    <svg width=""32"" height=""32"" viewBox=""0 0 24 24"" fill=""currentColor"" xmlns=""http://www.w3.org/2000/svg""><path d=""M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z""/></svg>
                                </div>
                                <div class=""testi-quote""><?php the_content(); ?></div>
                                <div class=""testi-author-wrap"">
                                    <span class=""avata-testimonials""><img src=""<?php echo esc_url(); ?>"" alt=""<?php the_title(); ?>""></span>
                                    <div class=""testi-author-info"">
                                        <p class=""testi-author""><?php the_title(); ?></p>
                                        <p class=""testi-role""><?php echo esc_html(); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
                <div class=""testi-nav"">
                    <button id=""testi-prev"" class=""testi-nav-btn""><svg width=""20"" height=""20"" viewBox=""0 0 24 24"" fill=""none"" stroke=""currentColor"" stroke-width=""1.2"" stroke-linecap=""square"" stroke-linejoin=""miter"" style=""vertical-align: middle;""><polyline points=""15 18 9 12 15 6""></polyline></svg></button>
                    <button id=""testi-next"" class=""testi-nav-btn""><svg width=""20"" height=""20"" viewBox=""0 0 24 24"" fill=""none"" stroke=""currentColor"" stroke-width=""1.2"" stroke-linecap=""square"" stroke-linejoin=""miter"" style=""vertical-align: middle;""><polyline points=""9 18 15 12 9 6""></polyline></svg></button>
                </div>
            </div>
        </div>
    </section>
        ");

        // Schedule
        sb.AppendLine(@"
    <section class=""section-padding"" id=""schedule"">
        <div class=""container"">
            <p class=""tagline"">Lịch trình</p>
            <h2 class=""vibe-heading schedule-heading"">Triển lãm 2026</h2>
            <div class=""schedule-timeline"">
                <?php
                 = array('post_type' => 'schedule', 'posts_per_page' => -1);
                 = new WP_Query();
                 = 0;
                if (->have_posts()) :
                    while (->have_posts()) : ->the_post();
                        ++;
                         = get_field('schedule_time');
                         = get_field('schedule_address');
                         = get_the_post_thumbnail_url() ?: 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=800&q=80';
                         = ( == 1) ? 'schedule-dot-active' : 'schedule-dot-upcoming';
                         = ( == 1) ? 'schedule-date-active' : 'schedule-date-upcoming';
                         = ( == 1) ? '' : 'schedule-venue-upcoming';
                        ?>
                        <div class=""news-card"">
                            <img src=""<?php echo esc_url(); ?>"" alt=""<?php the_title(); ?>"">
                            <div class=""news-content"">
                                <div class=""schedule-dot <?php echo ; ?>""></div>
                                <p class=""schedule-date <?php echo ; ?>""><?php echo esc_html(); ?></p>
                                <h3 class=""schedule-venue <?php echo ; ?>""><?php the_title(); ?></h3>
                                <p class=""vibe-text""><?php echo esc_html(); ?></p>
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
        ");

        // Contact
        sb.AppendLine(@"
    <section class=""section-padding contact-section"" id=""contact"">
        <div class=""container contact-grid"">
            <div class=""contact-info"">
                <p class=""tagline"">Kết Nối</p>
                <h2 class=""vibe-heading"">Lan tỏa<br/>Yêu thương</h2>
                <p class=""vibe-text"" style=""margin-top:var(--sp-md); max-width:85%;"">Mọi sự quan tâm, đóng góp của bạn đều là động lực to lớn giúp Quỹ Cherry mang đến nhiều nụ cười hơn cho trẻ thơ.</p>
                
                <div class=""contact-details"">
                    <p class=""vibe-text""><strong>Hotline:</strong> 1900 3009</p>
                    <p class=""vibe-text""><strong>Email:</strong> quynghethuat@cherry.vn</p>
                </div>
            </div>
            <div class=""contact-form-wrap"">
                <?php echo do_shortcode('[contact-form-7 id=""b5579e5"" title=""Email phản hồi""]'); ?>
            </div>
        </div>
    </section>
        ");

        sb.AppendLine("</main>");
        sb.AppendLine("<?php get_footer(); ?>");

        File.WriteAllText(target, sb.ToString(), Encoding.UTF8);
        Console.WriteLine("front-page.php created.");
    }
}
