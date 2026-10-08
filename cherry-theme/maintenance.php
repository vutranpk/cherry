<?php
if (!defined('ABSPATH')) exit;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống đang bảo trì | Cherry x K COFFEE</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
    <style>
        :root {
            --c-bg: #fffdfa;
            --c-text: #1a1a1a;
            --c-accent: #e25e3b;
            --f-sans: 'Space Grotesk', sans-serif;
            --f-serif: 'Instrument Serif', serif;
        }
        body {
            margin: 0;
            padding: 0;
            background-color: var(--c-bg);
            color: var(--c-text);
            font-family: var(--f-sans);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
            overflow: hidden;
            position: relative;
        }
        .glow {
            position: absolute;
            width: 50vw;
            height: 50vw;
            max-width: 600px;
            max-height: 600px;
            background: var(--c-accent);
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.15;
            animation: pulse 4s infinite alternate ease-in-out;
            z-index: 1;
        }
        @keyframes pulse {
            0% { transform: scale(0.8); opacity: 0.1; }
            100% { transform: scale(1.2); opacity: 0.2; }
        }
        .content {
            position: relative;
            z-index: 2;
            max-width: 600px;
            padding: 40px;
        }
        .logo-wrap { margin-bottom: 2rem; }
        .logo-wrap img { height: 60px;  }
        h1 {
            font-family: var(--f-serif);
            font-style: italic;
            font-weight: 400;
            font-size: clamp(3rem, 8vw, 6rem);
            margin: 0 0 1rem 0;
            line-height: 1.1;
        }
        p {
            font-size: 1.1rem;
            line-height: 1.6;
            opacity: 0.8;
            margin: 0 0 3rem 0;
        }
        .pill-btn {
            display: inline-block;
            padding: 14px 35px;
            border: 1px solid rgba(0,0,0,0.2);
            border-radius: 50px;
            color: var(--c-text);
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 0.8rem;
            transition: all 0.3s ease;
        }
        .pill-btn:hover {
            background: var(--c-text);
            color: var(--c-bg);
            border-color: var(--c-text);
        }
    </style>
</head>
<body>
    <div class="glow"></div>
    <div class="content">
        <div class="logo-wrap">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="K COFFEE">
        </div>
        <h1>Đang bảo trì</h1>
        <p>Hệ thống Quỹ nghệ thuật Cherry x K COFFEE đang tạm dừng để nâng cấp và cập nhật thêm các tác phẩm hội họa mới. Vui lòng quay lại sau ít phút.</p>
        <a href="mailto:quynghethuat@cherry.vn" class="pill-btn">Liên Hệ Hỗ Trợ</a>
    </div>
</body>
</html>