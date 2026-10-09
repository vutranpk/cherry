document.addEventListener('DOMContentLoaded', () => {

        (function() {
            try {
                var savedTheme = localStorage.getItem('theme') || 'light';
                document.documentElement.setAttribute('data-theme', savedTheme);
            } catch (e) {
                document.documentElement.setAttribute('data-theme', 'light');
            }
        })();
    

        // Theme Toggle Logic
        const themeBtn = document.getElementById('theme-toggle');
        if (themeBtn) {
            themeBtn.addEventListener('click', () => {
                const html = document.documentElement;
                const current = html.getAttribute('data-theme');
                const next = current === 'dark' ? 'light' : 'dark';
                html.setAttribute('data-theme', next);
                localStorage.setItem('theme', next);
            });
        }

        // Hamburger Menu Logic
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.getElementById('nav-links');
        if (hamburger && navLinks) {
            hamburger.addEventListener('click', () => {
                hamburger.classList.toggle('active');
                navLinks.classList.toggle('active');
            });
            // Close menu when a link is clicked
            const links = navLinks.querySelectorAll('a');
            links.forEach(link => {
                link.addEventListener('click', () => {
                    hamburger.classList.remove('active');
                    navLinks.classList.remove('active');
                });
            });
        }

        // 1. Fancybox Advanced Initialization (No HTML changes needed)
        if (typeof Fancybox !== 'undefined') {
            
            // Loop through GLightbox links and format them for Fancybox
            const galleryLinks = document.querySelectorAll('.art-card a.glightbox');
            galleryLinks.forEach(link => {
                link.setAttribute('data-fancybox', 'artworks');
                // Use the image src as thumb
                const img = link.querySelector('img');
                if (img) link.setAttribute('data-thumb', img.src);
            });

            Fancybox.bind('[data-fancybox="artworks"]', {
                Hash: false, // Prevent URL hash from opening lightbox
                Images: { zoom: false }, // Disable image zooming
                compact: false, // Ensure full UI
                idle: false, // Don't hide toolbar
                Thumbs: {
                    type: "classic",
                    position: "bottom" // Thumbnails at the bottom
                },
                caption: function (fancybox, slide) {
                    // Extract caption dynamically from the art-card-info on the page
                    const card = slide.triggerEl?.closest('.art-card');
                    if (card) {
                        const info = card.querySelector('.art-card-info');
                        const badge = card.querySelector('.art-card-badge');
                        if (info) {
                            const title = info.querySelector('.art-card-title')?.innerText || '';
                            const meta = info.querySelector('.art-card-meta')?.innerText || '';
                            const price = info.querySelector('.art-card-price')?.innerText || '';
                            const badgeHTML = badge ? `<span style="color: #ff4d4d; font-weight: bold;">Đã bán</span>` : "";
                            return `<div class="meta-title">` + title + `</div><div class="meta-grid"><div>` + meta + `</div><div>` + price + (badgeHTML ? " / " + badgeHTML : "") + `</div></div>`;
                        }
                    }
                    return slide.triggerEl?.getAttribute("data-description") || "";
                },
                on: {
                    done: (fancybox, slide) => {
                        // Check if sold via badge presence
                        const card = slide.triggerEl?.closest('.art-card');
                        const isSold = card && card.querySelector('.art-card-badge') !== null;
                        
                        if (isSold && slide.$content) {
                            if (!slide.$content.querySelector('.fancybox-sold-sticker')) {
                                const sticker = document.createElement('div');
                                sticker.className = 'fancybox-sold-sticker';
                                sticker.innerHTML = 'SOLD';
                                const imgContainer = slide.$content; 
                                imgContainer.style.position = 'relative';
                                imgContainer.appendChild(sticker);
                            }
                        }
                    }
                }
            });
        }

        // 2. Open Gallery Button Trigger
        const openGalleryBtns = document.querySelectorAll('.btn-open-gallery');
        openGalleryBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const firstArt = document.querySelector('[data-fancybox="artworks"]');
                if (firstArt) {
                    firstArt.click();
                }
            });
        });

        // 3. Horizontal Scroll Logic for Gallery (Synced)
        const stickyContainer = document.querySelector('.sticky-container');
        const stickyWrapper = document.querySelector('.sticky-wrapper');
        const horizontalTrack = document.querySelector('.horizontal-track');

        if (stickyContainer && stickyWrapper && horizontalTrack) {
            function updateScroll() {
                const containerRect = stickyContainer.getBoundingClientRect();
                const containerTop = containerRect.top;
                
                if (containerTop <= 0) {
                    const maxScroll = stickyContainer.offsetHeight - window.innerHeight;
                    const currentScroll = Math.abs(containerTop);
                    
                    let progress = currentScroll / maxScroll;
                    progress = Math.max(0, Math.min(1, progress));
                    
                    const maxTranslate = horizontalTrack.scrollWidth - window.innerWidth;
                    const translateX = progress * maxTranslate;
                    
                    horizontalTrack.style.transform = `translate3d(-${translateX}px, 0, 0)`;
                } else {
                    horizontalTrack.style.transform = `translate3d(0, 0, 0)`;
                }
            }

            window.addEventListener('scroll', updateScroll, { passive: true });
            window.addEventListener('resize', updateScroll);
            updateScroll();

            // Ánh xạ vuốt ngang/scroll ngang thành cuộn dọc để giữ đồng bộ tiến trình (CÓ QUÁN TÍNH)
            let touchStartX = 0;
            let touchStartY = 0;
            let lastX = 0;
            let lastTime = 0;
            let velocityX = 0;
            let isHorizontalSwipe = false;
            let isTouching = false;
            
            stickyWrapper.addEventListener('touchstart', (e) => {
                touchStartX = e.touches[0].clientX;
                touchStartY = e.touches[0].clientY;
                lastX = touchStartX;
                lastTime = performance.now();
                velocityX = 0;
                isHorizontalSwipe = false;
                isTouching = true;
            }, { passive: true });

            stickyWrapper.addEventListener('touchmove', (e) => {
                if (!isTouching) return;
                
                const x = e.touches[0].clientX;
                const y = e.touches[0].clientY;
                const now = performance.now();
                
                const totalDeltaX = Math.abs(touchStartX - x);
                const totalDeltaY = Math.abs(touchStartY - y);

                // Khóa hướng vuốt ngang nếu người dùng lướt ngang vượt ngưỡng
                if (!isHorizontalSwipe && totalDeltaX > 10 && totalDeltaX > totalDeltaY) {
                    isHorizontalSwipe = true;
                }

                if (isHorizontalSwipe) {
                    const dt = Math.max(1, now - lastTime);
                    const instantDeltaX = lastX - x;
                    
                    velocityX = instantDeltaX / dt; // tính vận tốc pixels/ms
                    
                    window.scrollBy(0, instantDeltaX * 2.5); // Nhân hệ số để vuốt nhanh hơn
                    e.preventDefault(); // Chặn hành vi vuốt dọc của trang
                }
                
                lastX = x;
                lastTime = now;
            }, { passive: false });

            // Xử lý quán tính (momentum) khi nhấc ngón tay lên
            stickyWrapper.addEventListener('touchend', () => {
                isTouching = false;
                if (isHorizontalSwipe && Math.abs(velocityX) > 0.5) {
                    applyInertia(velocityX * 16); // Chuẩn hóa vận tốc
                }
            });

            function applyInertia(speed) {
                if (isTouching || Math.abs(speed) < 0.5) return; // Dừng lại nếu chạm tiếp hoặc tốc độ quá nhỏ
                
                window.scrollBy(0, speed * 2.5);
                
                // Giảm tốc dần đều (Friction)
                requestAnimationFrame(() => applyInertia(speed * 0.92));
            }

            // Hỗ trợ chuột có con lăn ngang hoặc trackpad trên PC (Hệ điều hành đã có sẵn quán tính cho wheel)
            stickyWrapper.addEventListener('wheel', (e) => {
                if (Math.abs(e.deltaX) > Math.abs(e.deltaY)) {
                    window.scrollBy(0, e.deltaX * 2);
                    e.preventDefault();
                }
            }, { passive: false });
        }
        // 4. Testimonial Nav Logic
        const testiSlider = document.getElementById('testi-slider');
        const testiPrev = document.getElementById('testi-prev');
        const testiNext = document.getElementById('testi-next');
        if (testiSlider && testiPrev && testiNext) {
            testiNext.addEventListener('click', () => {
                testiSlider.scrollBy({ left: 300, behavior: 'smooth' });
            });
            testiPrev.addEventListener('click', () => {
                testiSlider.scrollBy({ left: -300, behavior: 'smooth' });
            });
        }

        // Merch Carousel Logic
        const merchGrid = document.getElementById('merch-grid');
        const merchPrev = document.querySelector('.merch-prev');
        const merchNext = document.querySelector('.merch-next');
        if (merchGrid && merchPrev && merchNext) {
            merchPrev.addEventListener('click', () => {
                merchGrid.scrollBy({ left: -merchGrid.clientWidth, behavior: 'smooth' });
            });
            merchNext.addEventListener('click', () => {
                merchGrid.scrollBy({ left: merchGrid.clientWidth, behavior: 'smooth' });
            });
        }

        // 5. Number Animation
        const counters = document.querySelectorAll('.stat-counter');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = +entry.target.getAttribute('data-target');
                    let count = 0;
                    const updateCount = () => {
                        const inc = target / 50;
                        if (count < target) {
                            count += inc;
                            entry.target.innerText = Math.ceil(count).toLocaleString('en-US');
                            setTimeout(updateCount, 20);
                        } else {
                            entry.target.innerText = target.toLocaleString('en-US');
                        }
                    };
                    updateCount();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        counters.forEach(counter => observer.observe(counter));
    

        const lenis = new Lenis({
            duration: 1.2,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
            smooth: true,
            mouseMultiplier: 1,
            smoothTouch: false
        });

        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);

        // --- ADVANCED GSAP ANIMATIONS & EFFECTS ---
        gsap.registerPlugin(ScrollTrigger);

        // Sync Lenis with GSAP ScrollTrigger
        lenis.on('scroll', ScrollTrigger.update);
        gsap.ticker.add((time) => { lenis.raf(time * 1000) });
        gsap.ticker.lagSmoothing(0);

        // 1. Text Split Reveal for Hero Title
        const heroTitle = document.querySelector('.hero-title');
        if (heroTitle) {
            const lines = heroTitle.innerHTML.split(/<br\s*\/?>/i);
            heroTitle.innerHTML = lines.map(line => `<span style="display:block; overflow:hidden; padding-bottom: 10px;"><span class="hero-line-inner" style="display:block; transform: translateY(115%);">${line}</span></span>`).join('');
        }

        const tlHero = gsap.timeline();
        tlHero.to(".hero-line-inner", { y: "0%", duration: 1.2, stagger: 0.15, ease: "expo.out", delay: 0.2 })
              .from(".hero-desc", { y: 30, opacity: 0, duration: 1, ease: "power3.out" }, "-=0.8")
              .from(".hero .pill-btn", { y: 30, opacity: 0, duration: 1, ease: "power3.out" }, "-=0.9")
              .fromTo(".hero-img-wrap img", { clipPath: "inset(20% 20% 20% 20%)", filter: "blur(10px)", scale: 1.3 }, { clipPath: "inset(0% 0% 0% 0%)", filter: "blur(0px)", scale: 1, duration: 1.8, ease: "expo.inOut", clearProps: "clipPath,filter" }, "-=1.2")
              .from(".circle-btn", { scale: 0, opacity: 0, duration: 0.8, ease: "back.out(1.7)", clearProps: "all" }, "-=1");

        // 2. Magnetic Buttons (Interactive Physics)
        const magnetBtns = document.querySelectorAll('.circle-btn');
        magnetBtns.forEach(btn => {
            btn.addEventListener('mousemove', (e) => {
                const rect = btn.getBoundingClientRect();
                const x = (e.clientX - rect.left - rect.width / 2) * 0.4;
                const y = (e.clientY - rect.top - rect.height / 2) * 0.4;
                gsap.to(btn, { x: x, y: y, duration: 0.4, ease: "power2.out" });
            });
            btn.addEventListener('mouseleave', () => {
                gsap.to(btn, { x: 0, y: 0, duration: 0.8, ease: "elastic.out(1, 0.3)" });
            });
        });

        // 3. Velocity Skew Effect (Scroll-driven inertia)
        lenis.on('scroll', (e) => {
            const skewY = Math.max(-3, Math.min(3, e.velocity * 0.15));
            gsap.to('.news-card, .merch-card', { 
                skewY: skewY, 
                duration: 0.2, 
                overwrite: "auto",
                transformOrigin: "center center"
            });
            // Snap back
            gsap.to('.news-card, .merch-card', { skewY: 0, duration: 0.6, ease: "power3.out", delay: 0.1 });
        });

        // Horizontal velocity skew for gallery
        let lastHScroll = 0;
        let lastHTime = Date.now();
        const hTrack = document.querySelector('.horizontal-track');
        if (hTrack) {
            hTrack.addEventListener('scroll', () => {
                const now = Date.now();
                const dx = hTrack.scrollLeft - lastHScroll;
                const dt = now - lastHTime;
                const vel = dx / (dt || 1);
                const skewX = Math.max(-5, Math.min(5, vel * -1.5));
                
                gsap.to('.art-card img', { skewX: skewX, scale: 1.02, duration: 0.3, overwrite: "auto" });
                gsap.to('.art-card img', { skewX: 0, scale: 1, duration: 0.8, ease: "elastic.out(1, 0.4)", delay: 0.1 });
                
                lastHScroll = hTrack.scrollLeft;
                lastHTime = now;
            });
        }

        // 4. Infinite Marquee + Parallax Watermarks
        gsap.utils.toArray('.watermark').forEach(wm => {
            const text = wm.innerText.trim();
            // Duplicate text to create a seamless loop (adding a bullet dot for aesthetics)
            const repeatCount = 8;
            let trackHTML = '<div class="wm-track">';
            for(let i=0; i<repeatCount; i++) {
                trackHTML += `<span style="padding-right: 5vw;">${text} &bull;</span>`;
            }
            trackHTML += '</div>';
            wm.innerHTML = trackHTML;

            const track = wm.querySelector('.wm-track');
            
            // Infinite horizontal crawl (-50% because we doubled the necessary width)
            gsap.to(track, { xPercent: -50, duration: 25, repeat: -1, ease: "none" });
            
            // Vertical parallax on scroll
            gsap.to(wm, {
                y: 150, 
                ease: "none",
                scrollTrigger: { trigger: wm.parentElement, start: "top bottom", end: "bottom top", scrub: true }
            });
        });

        // 5. Cinematic Image Reveals (Clip-Path + Image Scale Parallax)
        gsap.utils.toArray('.author-img-wrap').forEach(wrap => {
            const img = wrap.querySelector('img');
            const tl = gsap.timeline({
                scrollTrigger: { trigger: wrap, start: "top 80%" }
            });
            tl.fromTo(wrap, { clipPath: "polygon(0% 20%, 100% 20%, 100% 80%, 0% 80%)", filter: "grayscale(100%) blur(5px)" },
                            { clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)", filter: "grayscale(0%) blur(0px)", duration: 1.6, ease: "expo.inOut" })
              .fromTo(img, { scale: 1.4 }, { scale: 1, duration: 2, ease: "power3.out" }, "-=1.6");
        });

        // 6. Global Section Titles Reveal (Words Stagger)
        gsap.utils.toArray('.vibe-heading:not(.hero-title)').forEach(heading => {
            const text = heading.innerText;
            heading.innerHTML = text.split(' ').map(word => `<span style="display:inline-block; overflow:hidden;"><span class="vibe-word" style="display:inline-block; transform: translateY(110%);">${word}</span></span>`).join(' ');
            
            gsap.to(heading.querySelectorAll('.vibe-word'), {
                scrollTrigger: { trigger: heading, start: "top 85%" },
                y: "0%", duration: 1, stagger: 0.08, ease: "power4.out"
            });
        });

        // 7. Staggered Elements Reveal
        gsap.from(".news-card", { scrollTrigger: { trigger: ".news-slider", start: "top 85%" }, y: 80, opacity: 0, duration: 1, stagger: 0.15, ease: "expo.out" });
        
        // Impact stats stagger
        gsap.from(".impact-stat-item", { scrollTrigger: { trigger: ".impact-stats-wrap", start: "top 85%" }, y: 50, opacity: 0, duration: 1, stagger: 0.2, ease: "power3.out" });
        
        // Vibe text fade ups
        gsap.utils.toArray(".vibe-text, .tagline").forEach(text => {
            gsap.from(text, { scrollTrigger: { trigger: text, start: "top 90%" }, y: 30, opacity: 0, duration: 1.2, ease: "power2.out" });
        });
        
        // Content blocks (author content, merch grid)
        gsap.from(".author-content > *", { scrollTrigger: { trigger: ".author-content", start: "top 80%" }, y: 40, opacity: 0, duration: 1, stagger: 0.15, ease: "power3.out" });
        gsap.from(".merch-card", { scrollTrigger: { trigger: ".merch-grid", start: "top 85%" }, y: 60, opacity: 0, duration: 1, stagger: 0.15, ease: "power4.out" });
        gsap.from(".schedule-item", { scrollTrigger: { trigger: ".schedule-timeline", start: "top 85%" }, x: -40, opacity: 0, duration: 1, stagger: 0.2, ease: "power3.out" });

        // Xá»­ lÃ½ cÃ¡c link neo (anchor) mÆ°á»£t mÃ  vá»›i Lenis
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                if (targetId !== '#') {
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        e.preventDefault();
                        lenis.scrollTo(targetElement);
                        
                        // ÄÃ³ng menu trÃªn mobile
                        const navLinks = document.getElementById('nav-links');
                        const hamburger = document.getElementById('hamburger');
                        if (navLinks && navLinks.classList.contains('active')) {
                            navLinks.classList.remove('active');
                            hamburger.classList.remove('active');
                            document.body.style.overflow = '';
                        }
                    }
                } else {
                    // Xá»­ lÃ½ click href="#" (Logo hoáº·c nÃºt Go Top)
                    e.preventDefault();
                    lenis.scrollTo(0);
                }
            });
        });

        // Hiá»ƒn thá»‹/áº¨n nÃºt Go Top khi cuá»™n
        const goTopBtn = document.getElementById('gotop-btn');
        if (goTopBtn) {
            lenis.on('scroll', (e) => {
                if (window.scrollY > 500) {
                    goTopBtn.classList.add('is-visible');
                } else {
                    goTopBtn.classList.remove('is-visible');
                }
            });
        }
    

});
