<?php get_header(); ?>

<main style="padding-top: 100px; padding-bottom: 80px;">
    <div class="container" style="max-width: 800px; margin: 0 auto;">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header" style="margin-bottom: 2rem; text-align: center;">
                    <p class="tagline"><?php echo get_the_date('d/m/Y'); ?></p>
                    <h1 class="vibe-heading" style="margin-bottom: 1rem; font-size: clamp(2rem, 5vw, 3.5rem);"><?php the_title(); ?></h1>
                    
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo '<p style="font-family: var(--f-sans); font-size: 0.9rem; text-transform: uppercase; color: var(--c-accent);">';
                        echo esc_html( $categories[0]->name );
                        echo '</p>';
                    }
                    ?>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="entry-thumbnail" style="margin-bottom: 3rem; border-radius: var(--br-md); overflow: hidden;">
                        <img loading="lazy" decoding="async" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title(); ?>" style="width: 100%; height: auto; display: block;">
                    </div>
                <?php endif; ?>

                <div class="entry-content vibe-text" style="line-height: 1.8;">
                    <?php the_content(); ?>
                </div>

                <footer class="entry-footer" style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid var(--c-border); display: flex; justify-content: space-between; align-items: center;">
                    <div class="post-tags">
                        <?php the_tags('<span style="font-family: var(--f-sans); font-size: 0.85rem; font-weight: 500; text-transform: uppercase; margin-right: 10px;">Tags:</span> ', ', ', ''); ?>
                    </div>
                    <div class="post-share">
                        <span style="font-family: var(--f-sans); font-size: 0.85rem; font-weight: 500; text-transform: uppercase; margin-right: 10px;">Chia sẻ:</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" style="color: var(--c-text); margin-left: 10px;"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" style="color: var(--c-text); margin-left: 10px;"><i class="fab fa-twitter"></i></a>
                    </div>
                </footer>
            </article>
            
            <div class="post-navigation" style="margin-top: 3rem; display: flex; justify-content: space-between; font-family: var(--f-sans); font-size: 0.9rem; text-transform: uppercase; font-weight: 600;">
                <div class="nav-previous"><?php previous_post_link('%link', '&larr; Bài cũ hơn'); ?></div>
                <div class="nav-next"><?php next_post_link('%link', 'Bài mới hơn &rarr;'); ?></div>
            </div>

        <?php endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>
