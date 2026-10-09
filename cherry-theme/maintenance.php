<?php
/**
 * Maintenance Mode Template
 * Cinematic Light Theme
 */
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K COFFEE & Cherry | <?php cherry_e('Đang cập nhật'); ?></title>
    <style>
        :root {
            --bg-color: #ffffff;
            --text-color: #1a1a1a;
            --accent-color: #ff6b00; /* K Coffee / Cherry Orange */
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: 'Helvetica Neue', Arial, sans-serif;
            text-align: center;
            overflow: hidden;
            position: relative;
        }

        /* Ambient Glow Effect */
        .ambient-glow {
            position: absolute;
            width: 40vmax;
            height: 40vmax;
            background: radial-gradient(circle, rgba(255, 107, 0, 0.08) 0%, rgba(255,255,255,0) 70%);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 0;
            animation: pulse-glow 6s ease-in-out infinite alternate;
        }

        @keyframes pulse-glow {
            0% { transform: translate(-50%, -50%) scale(0.8); opacity: 0.5; }
            100% { transform: translate(-50%, -50%) scale(1.2); opacity: 1; }
        }

        .content-wrapper {
            position: relative;
            z-index: 1;
            max-width: 600px;
            padding: 2rem;
        }

        .logo {
            font-size: 2rem;
            font-weight: 300;
            letter-spacing: 4px;
            margin-bottom: 3rem;
            text-transform: uppercase;
        }

        .logo span {
            font-weight: 700;
            color: var(--accent-color);
        }

        h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 300;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            letter-spacing: -1px;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #666;
            margin-bottom: 2.5rem;
            font-weight: 300;
        }

        /* Minimalist Progress Indicator */
        .progress-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-top: 2rem;
        }

        .dot {
            width: 6px;
            height: 6px;
            background-color: var(--text-color);
            border-radius: 50%;
            opacity: 0.2;
            animation: pulse-dot 1.5s infinite ease-in-out;
        }

        .dot:nth-child(1) { animation-delay: 0s; }
        .dot:nth-child(2) { animation-delay: 0.2s; }
        .dot:nth-child(3) { animation-delay: 0.4s; }

        @keyframes pulse-dot {
            0%, 100% { transform: scale(1); opacity: 0.2; }
            50% { transform: scale(1.5); opacity: 0.8; background-color: var(--accent-color); }
        }

        .footer-note {
            position: absolute;
            bottom: 2rem;
            font-size: 0.8rem;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
    </style>
</head>
<body>
    <div class="ambient-glow"></div>
    
    <div class="content-wrapper">
        <div class="logo">
            K COFFEE <span>&times;</span> CHERRY
        </div>
        
        <h1>Chuẩn Bị<br>Ra Mắt</h1>
        
        <p>Hành trình kết nối nghệ thuật và thiện nguyện đang được chúng tôi chăm chút những nét cọ cuối cùng. Cảm ơn sự chờ đợi của bạn.</p>
        
        <div class="progress-indicator">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>

    <div class="footer-note">
        &copy; <?php echo date('Y'); ?> K COFFEE. All rights reserved.
    </div>
</body>
</html>