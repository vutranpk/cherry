<?php get_header(); ?>
<style>
.archive-hero { padding: 180px 0 100px 0; background: var(--c-bg-alt); text-align: center; position: relative; overflow: hidden; }
.archive-hero::after { content: ''; position: absolute; bottom: 0; left: 0; width: 100%; height: 1px; background: var(--c-border); }
.news-featured { display: grid; grid-template-columns: 1.2fr 1fr; gap: var(--sp-lg); align-items: center; margin-bottom: var(--sp-xl); background: var(--c-bg); border: 1px solid var(--c-border); border-radius: var(--br-md); padding: var(--sp-sm); box-shadow: 0 10px 30px rgba(0,0,0,0.02); }
.news-featured-img { border-radius: calc(var(--br-md) - 5px); overflow: hidden; height: 100%; min-height: 450px; position: relative; }
.news-featured-img img { width: 100%; height: 100%; object-fit: cover; position: absolute; top:0; left:0; transition: transform 0.7s ease; }
.news-featured:hover .news-featured-img img { transform: scale(1.05); }
.news-featured-content { padding: var(--sp-md) var(--sp-lg) var(--sp-md) var(--sp-md); }
@media (max-width: 992px) {
    .news-featured { grid-template-columns: 1fr; }
    .news-featured-img { min-height: 300px; }
    .news-featured-content { padding: var(--sp-md); }
}
.pagination .page-numbers { display: inline-flex; align-items: center; justify-content: center; min-width: 44px; height: 44px; padding: 0 15px; border: 1px solid var(--c-border); border-radius: 30px; font-family: var(--f-sans); color: var(--c-text); text-decoration: none; transition: all 0.3s ease; }
.pagination .page-numbers.current, .pagination .page-numbers:hover { background: var(--c-text); color: var(--c-bg); }
</style>
<main>
    <section class="archive-hero">
        <div class="container">
            <p class="tagline">Chuyên mục</p>
            <h1 class="vibe-heading" style="font-size: clamp(3rem, 7vw, 5.5rem);"><?php the_archive_title(); ?></h1>
            <?php if ( get_the_archive_description() ) : ?>
                <div class="vibe-text" style="max-width: 600px; margin: 1.5rem auto 0 auto; opacity: 0.8;">
                    <?php echo get_the_archive_description(); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    
    <section class="section-padding">
        <div class="container">
            <?php if (have_posts()) : ?>
                <?php  = true; ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <?php if ( && !is_paged()) : ?>
                        <div class="news-featured">
                            <div class="news-featured-img">
                                <a href="<?php the_permalink(); ?>">
                                    <img loading="lazy" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?: 'https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?auto=format&fit=crop&w=1200&q=80'; ?>" alt="<?php the_title(); ?>">
                                </a>
                            </div>
                            <div class="news-featured-content">
                                <span class="news-date" style="display:block; margin-bottom:15px; color:var(--c-accent); font-weight:600; text-transform:uppercase; letter-spacing:1px; font-size: 0.85rem;"><?php echo get_the_date('d/m/Y'); ?></span>
                                <h2 class="vibe-heading" style="font-size: clamp(2rem, 4vw, 3rem); margin-bottom: 20px; line-height: 1.1;"><a href="<?php the_permalink(); ?>" style="color:inherit;text-decoration:none;"><?php the_title(); ?></a></h2>
                                <div class="vibe-text" style="margin-bottom: 35px; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; opacity: 0.8;">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="pill-btn">Đọc bài chi tiết</a>
                            </div>
                        </div>
                        <!-- Start Grid for remaining posts -->
                        <div class="news-grid">
                    <?php else : ?>
                        <?php if ( && is_paged()) echo '<div class="news-grid">'; ?>
                        <div class="news-card">
                            <a href="<?php the_permalink(); ?>">
                                <img loading="lazy" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: 'https://images.unsplash.com/photo-1536924940846-227afb31e2a5?auto=format&fit=crop&w=800&q=80'; ?>" alt="<?php the_title(); ?>">
                            </a>
                            <div class="news-content">
                                <span class="news-date"><?php echo get_the_date('d/m/Y'); ?></span>
                                <h3 class="news-title"><a href="<?php the_permalink(); ?>" style="color:inherit;text-decoration:none;"><?php the_title(); ?></a></h3>
                                <a href="<?php the_permalink(); ?>" class="news-link">Đọc tiếp <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="square" stroke-linejoin="miter" style="vertical-align: -4px; margin-left: 5px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php  = false; ?>
                <?php endwhile; ?>
                </div> <!-- End Grid -->
                
                <div class="pagination" style="display: flex; justify-content: center; gap: 10px; margin-top: 5rem;">
                    <?php echo paginate_links( array('prev_text' => 'Mới hơn', 'next_text' => 'Cũ hơn') ); ?>
                </div>

            <?php else : ?>
                <p style="text-align:center; font-family: var(--f-sans);">Chưa có bài viết nào.</p>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>