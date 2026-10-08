<?php get_header(); ?>
<main style="padding-top: 100px; padding-bottom: 80px;">
    <div class="container" style="max-width: 800px; margin: 0 auto;">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header" style="margin-bottom: 3rem; text-align: center;">
                    <h1 class="vibe-heading" style="font-size: clamp(2.5rem, 5vw, 4rem);"><?php the_title(); ?></h1>
                </header>
                <div class="entry-content vibe-text" style="line-height: 1.8;">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; endif; ?>
    </div>
</main>
<?php get_footer(); ?>