<?php get_header(); ?>

<main style="padding-top: 100px; padding-bottom: 80px;">
    <div class="container">
        <header class="archive-header" style="text-align: center; margin-bottom: 3rem;">
            <p class="tagline">Cập Nhật</p>
            <h1 class="vibe-heading">Tin Tức & Sự Kiện</h1>
        </header>

        <div class="news-grid" style="margin-bottom: 4rem;">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="news-card">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url() ?: 'https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?auto=format&fit=crop&w=800&q=80'; ?>" alt="<?php the_title(); ?>">
                    </a>
                    <div class="news-content">
                        <span class="news-date"><?php echo get_the_date('d/m/Y'); ?></span>
                        <h3 class="news-title"><a href="<?php the_permalink(); ?>" style="color:inherit;text-decoration:none;"><?php the_title(); ?></a></h3>
                        <a href="<?php the_permalink(); ?>" class="news-link">Đọc tiếp <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="square" stroke-linejoin="miter" style="vertical-align: -4px; margin-left: 5px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                    </div>
                </div>
            <?php endwhile; else : ?>
                <p>Chưa có bài viết nào.</p>
            <?php endif; ?>
        </div>
        
        <!-- Pagination -->
        <div class="pagination" style="display: flex; justify-content: center; gap: 10px;">
            <?php
            echo paginate_links( array(
                'prev_text' => '&laquo; Trước',
                'next_text' => 'Sau &raquo;',
            ) );
            ?>
        </div>
    </div>
</main>
        
<?php get_footer(); ?>
