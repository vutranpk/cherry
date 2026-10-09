using System;
using System.IO;
using System.Text;

class Program {
    static void Main() {
        string themeDir = @"D:\antigravity\cherry3\cherry-theme\";

        // 1. 404.php
        string content404 = @"<?php get_header(); ?>
<main style=""padding-top: 150px; padding-bottom: 100px; text-align: center; min-height: 60vh; display: flex; flex-direction: column; justify-content: center; align-items: center;"">
    <div class=""container"">
        <h1 class=""vibe-heading"" style=""font-size: clamp(4rem, 10vw, 8rem); margin-bottom: 1rem; color: var(--c-accent);"">404</h1>
        <h2 style=""font-family: var(--f-sans); font-size: 1.5rem; margin-bottom: 2rem;"">Không tìm thấy trang</h2>
        <p class=""vibe-text"" style=""max-width: 500px; margin: 0 auto 3rem auto;"">Trang bạn đang tìm kiếm có thể đã bị xóa, đổi tên hoặc tạm thời không truy cập được.</p>
        <a href=""<?php echo home_url(); ?>"" class=""pill-btn"">Trở về Trang chủ</a>
    </div>
</main>
<?php get_footer(); ?>";
        File.WriteAllText(themeDir + "404.php", content404, Encoding.UTF8);

        // 2. page.php
        string contentPage = @"<?php get_header(); ?>
<main style=""padding-top: 100px; padding-bottom: 80px;"">
    <div class=""container"" style=""max-width: 800px; margin: 0 auto;"">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id=""post-<?php the_ID(); ?>"" <?php post_class(); ?>>
                <header class=""entry-header"" style=""margin-bottom: 3rem; text-align: center;"">
                    <h1 class=""vibe-heading"" style=""font-size: clamp(2.5rem, 5vw, 4rem);""><?php the_title(); ?></h1>
                </header>
                <div class=""entry-content vibe-text"" style=""line-height: 1.8;"">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; endif; ?>
    </div>
</main>
<?php get_footer(); ?>";
        File.WriteAllText(themeDir + "page.php", contentPage, Encoding.UTF8);

        // 3. archive.php
        string contentArchive = @"<?php get_header(); ?>
<main style=""padding-top: 100px; padding-bottom: 80px;"">
    <div class=""container"">
        <header class=""archive-header"" style=""text-align: center; margin-bottom: 3rem;"">
            <p class=""tagline"">Chuyên mục</p>
            <h1 class=""vibe-heading""><?php the_archive_title(); ?></h1>
            <?php if ( get_the_archive_description() ) : ?>
                <div class=""archive-description vibe-text"" style=""max-width:600px; margin: 1rem auto 0 auto;"">
                    <?php echo get_the_archive_description(); ?>
                </div>
            <?php endif; ?>
        </header>
        <div class=""news-grid"" style=""margin-bottom: 4rem;"">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class=""news-card"">
                    <a href=""<?php the_permalink(); ?>"">
                        <img loading=""lazy"" decoding=""async"" src=""<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?: 'https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?auto=format&fit=crop&w=800&q=80'; ?>"" alt=""<?php the_title(); ?>"">
                    </a>
                    <div class=""news-content"">
                        <span class=""news-date""><?php echo get_the_date('d/m/Y'); ?></span>
                        <h3 class=""news-title""><a href=""<?php the_permalink(); ?>"" style=""color:inherit;text-decoration:none;""><?php the_title(); ?></a></h3>
                        <a href=""<?php the_permalink(); ?>"" class=""news-link"">Đọc tiếp <svg width=""18"" height=""18"" viewBox=""0 0 24 24"" fill=""none"" stroke=""currentColor"" stroke-width=""1.2"" stroke-linecap=""square"" stroke-linejoin=""miter"" style=""vertical-align: -4px; margin-left: 5px;""><line x1=""5"" y1=""12"" x2=""19"" y2=""12""></line><polyline points=""12 5 19 12 12 19""></polyline></svg></a>
                    </div>
                </div>
            <?php endwhile; else : ?>
                <p style=""text-align:center; width:100%;"">Chưa có bài viết nào trong chuyên mục này.</p>
            <?php endif; ?>
        </div>
        <div class=""pagination"" style=""display: flex; justify-content: center; gap: 10px;"">
            <?php echo paginate_links( array('prev_text' => '&laquo; Trước', 'next_text' => 'Sau &raquo;') ); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>";
        File.WriteAllText(themeDir + "archive.php", contentArchive, Encoding.UTF8);

        Console.WriteLine("Missing pages created successfully.");
    }
}
