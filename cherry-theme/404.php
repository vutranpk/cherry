<?php get_header(); ?>
<main style="padding-top: 150px; padding-bottom: 100px; text-align: center; min-height: 60vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <div class="container">
        <h1 class="vibe-heading" style="font-size: clamp(4rem, 10vw, 8rem); margin-bottom: 1rem; color: var(--c-accent);">404</h1>
        <h2 style="font-family: var(--f-sans); font-size: 1.5rem; margin-bottom: 2rem;">Không tìm thấy trang</h2>
        <p class="vibe-text" style="max-width: 500px; margin: 0 auto 3rem auto;">Trang bạn đang tìm kiếm có thể đã bị xóa, đổi tên hoặc tạm thời không truy cập được.</p>
        <a href="<?php echo home_url(); ?>" class="pill-btn">Trở về Trang chủ</a>
    </div>
</main>
<?php get_footer(); ?>