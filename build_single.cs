using System;
using System.IO;
using System.Text;

class Program {
    static void Main() {
        string target = @"D:\antigravity\cherry3\cherry-theme\single.php";
        StringBuilder sb = new StringBuilder();

        sb.AppendLine("<?php get_header(); ?>");
        sb.AppendLine(@"
<main style=""padding-top: 100px; padding-bottom: 80px;"">
    <div class=""container"" style=""max-width: 800px; margin: 0 auto;"">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id=""post-<?php the_ID(); ?>"" <?php post_class(); ?>>
                <header class=""entry-header"" style=""margin-bottom: 2rem; text-align: center;"">
                    <p class=""tagline""><?php echo get_the_date('d/m/Y'); ?></p>
                    <h1 class=""vibe-heading"" style=""margin-bottom: 1rem; font-size: clamp(2rem, 5vw, 3.5rem);""><?php the_title(); ?></h1>
                    
                    <?php
                     = get_the_category();
                    if ( ! empty(  ) ) {
                        echo '<p style=""font-family: var(--f-sans); font-size: 0.9rem; text-transform: uppercase; color: var(--c-accent);"">';
                        echo esc_html( [0]->name );
                        echo '</p>';
                    }
                    ?>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class=""entry-thumbnail"" style=""margin-bottom: 3rem; border-radius: var(--br-md); overflow: hidden;"">
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; display: block;')); ?>
                    </div>
                <?php endif; ?>

                <div class=""entry-content vibe-text"" style=""line-height: 1.8;"">
                    <?php the_content(); ?>
                </div>

                <footer class=""entry-footer"" style=""margin-top: 4rem; padding-top: 2rem; border-top: 1px solid var(--c-border); display: flex; justify-content: space-between; align-items: center;"">
                    <div>
                        <strong>Chia sẻ:</strong>
                        <a href=""https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"" target=""_blank"" style=""margin-left: 10px; color: var(--c-text); text-decoration: none;"">Facebook</a>
                    </div>
                    <div>
                        <a href=""<?php echo get_permalink(get_option('page_for_posts')); ?>"" class=""pill-btn outline"">Trở về Tin Tức</a>
                    </div>
                </footer>
            </article>
        <?php endwhile; endif; ?>
    </div>
</main>
        ");
        sb.AppendLine("<?php get_footer(); ?>");

        File.WriteAllText(target, sb.ToString(), Encoding.UTF8);
        Console.WriteLine("single.php created.");
    }
}
