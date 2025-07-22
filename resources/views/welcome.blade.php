<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Font Awesome cho icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Link CSS của bạn -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/repont.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <!-- 1. CSS của Slick -->
  

</head>


<body>


    @include('header')
    <!-- Bỏ thẻ <section> cũ đi và thay bằng khối này -->
    <div class="scroll-container" id="header-placeholder">
        @yield('content')
    </div>

    @include('footer')
    <!-- ===== BẮT ĐẦU PHẦN JAVASCRIPT ĐÃ SỬA LỖI ===== -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            /**
             * HÀM KHỞI TẠO SLIDER CHUNG (Hỗ trợ kéo/vuốt)
             * @param {string} containerSelector - Selector của container cha bao bọc slider.
             */
            function initGenericSlider(containerSelector) {
                const sliderContainer = document.querySelector(containerSelector);
                if (!sliderContainer) return;

                const track = sliderContainer.querySelector('.slider-track, .slider-track-phanhoi');
                const prevButton = sliderContainer.querySelector('.prev-btn, #prev-btn2');
                const nextButton = sliderContainer.querySelector('.next-btn, #next-btn2');

                if (!track || !prevButton || !nextButton) {
                    console.error(`Slider "${containerSelector}" thiếu các phần tử cần thiết.`);
                    return;
                }

                const slides = Array.from(track.children);
                if (slides.length === 0) return;

                let currentIndex = 0;
                let slideWidthWithGap = 0;

                // --- NÂNG CẤP: Biến cho chức năng kéo/vuốt ---
                let isDragging = false;
                let startPos = 0;
                let currentTranslate = 0;
                let prevTranslate = 0;
                let animationID = 0;

                function updateDimensions() {
                    const firstSlide = slides[0];
                    if (!firstSlide) return;
                    const gap = parseFloat(window.getComputedStyle(track).gap) || 0;
                    slideWidthWithGap = firstSlide.offsetWidth + gap;

                    // Reset vị trí khi resize
                    track.style.transform = `translateX(-${currentIndex * slideWidthWithGap}px)`;
                    prevTranslate = -currentIndex * slideWidthWithGap;
                }

                function moveToSlide(index) {
                    if (slideWidthWithGap > 0) {
                        currentTranslate = -index * slideWidthWithGap;
                        prevTranslate = currentTranslate;
                        setSliderPosition();
                        currentIndex = index;
                    }
                }

                function getVisibleSlidesCount() {
                    if (slideWidthWithGap === 0) return 1;
                    return Math.round(track.parentElement.offsetWidth / slideWidthWithGap);
                }

                // --- NÂNG CẤP: Các hàm xử lý sự kiện kéo/vuốt ---

                function dragStart(event) {
                    isDragging = true;
                    startPos = getPositionX(event);
                    // Dùng requestAnimationFrame để tối ưu hiệu năng
                    animationID = requestAnimationFrame(animation);
                    track.style.transition = 'none'; // Tắt transition khi đang kéo
                    track.classList.add('grabbing');
                }

                function dragMove(event) {
                    if (isDragging) {
                        const currentPosition = getPositionX(event);
                        currentTranslate = prevTranslate + currentPosition - startPos;
                    }
                }

                function dragEnd() {
                    cancelAnimationFrame(animationID);
                    isDragging = false;
                    const movedBy = currentTranslate - prevTranslate;

                    // Nếu kéo đủ xa (hơn 50px) thì chuyển slide
                    if (movedBy < -50 && currentIndex < slides.length - getVisibleSlidesCount()) {
                        handleNext();
                    } else if (movedBy > 50 && currentIndex > 0) {
                        handlePrev();
                    } else {
                        // Nếu không kéo đủ xa, quay lại vị trí cũ
                        moveToSlide(currentIndex);
                    }

                    track.style.transition = 'transform 0.5s ease-in-out';
                    track.classList.remove('grabbing');
                }

                function getPositionX(event) {
                    return event.type.includes('mouse') ? event.pageX : event.touches[0].clientX;
                }

                function animation() {
                    setSliderPosition();
                    if (isDragging) requestAnimationFrame(animation);
                }

                function setSliderPosition() {
                    track.style.transform = `translateX(${currentTranslate}px)`;
                }

                // Hàm xử lý nút
                function handleNext() {
                    const visibleSlides = getVisibleSlidesCount();
                    const maxIndex = Math.max(0, slides.length - visibleSlides);
                    let nextIndex = currentIndex + 1;
                    if (nextIndex > maxIndex) nextIndex = 0;
                    moveToSlide(nextIndex);
                }

                function handlePrev() {
                    let prevIndex = currentIndex - 1;
                    if (prevIndex < 0) {
                        const visibleSlides = getVisibleSlidesCount();
                        const maxIndex = Math.max(0, slides.length - visibleSlides);
                        prevIndex = maxIndex;
                    }
                    moveToSlide(prevIndex);
                }

                // Gán sự kiện
                nextButton.addEventListener('click', handleNext);
                prevButton.addEventListener('click', handlePrev);

                // Sự kiện cho chuột
                track.addEventListener('mousedown', dragStart);
                track.addEventListener('mouseup', dragEnd);
                track.addEventListener('mouseleave', dragEnd);
                track.addEventListener('mousemove', dragMove);

                // Sự kiện cho chạm (mobile)
                track.addEventListener('touchstart', dragStart, {
                    passive: true
                });
                track.addEventListener('touchend', dragEnd);
                track.addEventListener('touchmove', dragMove, {
                    passive: true
                });

                // Ngăn chặn hành vi kéo ảnh mặc định của trình duyệt
                slides.forEach(slide => {
                    slide.querySelector('img')?.addEventListener('dragstart', (e) => e.preventDefault());
                });

                // Xử lý resize
                window.addEventListener('resize', () => {
                    track.style.transition = 'none';
                    updateDimensions();
                    moveToSlide(currentIndex); // Cập nhật lại vị trí
                });

                // Khởi tạo
                setTimeout(updateDimensions, 100);
            }

            // --- KHỞI TẠO CÁC CHỨC NĂNG CỤ THỂ ---

            initGenericSlider('#quy-trinh-slider');
            initGenericSlider('#phan-hoi-slider');

            // --- Code cho Header và Menu Mobile (giữ nguyên) ---
            const header = document.querySelector(".site-header");
            const placeholder = document.getElementById("header-placeholder");
            if (header && placeholder) {
                const updateHeaderOnScroll = () => {
                    const isScrolled = window.scrollY > 50;
                    header.classList.toggle("active", isScrolled);
                    placeholder.style.height = isScrolled ? `${header.offsetHeight}px` : "0px";
                };
                window.addEventListener("scroll", updateHeaderOnScroll, {
                    passive: true
                });
                updateHeaderOnScroll();
            }

            const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
            const mobileNavigation = document.getElementById('mobile-navigation');
            const mobileNavClose = document.getElementById('mobile-nav-close');
            const menuOverlay = document.getElementById('menu-overlay');
            if (mobileMenuToggle && mobileNavigation) {
                const toggleMenu = (isOpen) => {
                    mobileNavigation.classList.toggle('is-open', isOpen);
                    if (menuOverlay) menuOverlay.classList.toggle('is-open', isOpen);
                };
                mobileMenuToggle.addEventListener('click', () => toggleMenu(true));
                if (mobileNavClose) mobileNavClose.addEventListener('click', () => toggleMenu(false));
                if (menuOverlay) menuOverlay.addEventListener('click', () => toggleMenu(false));
            }

            // --- Code cho hiệu ứng thẻ Sứ mệnh (giữ nguyên) ---
            const missionCards = document.querySelectorAll(".card-container-miss .card-item-miss");
            if (missionCards.length > 0) {
                let cardIndex = 0;
                setInterval(() => {
                    missionCards.forEach(card => card.classList.remove("card-highlight"));
                    cardIndex = (cardIndex + 1) % missionCards.length;
                    missionCards[cardIndex].classList.add("card-highlight");
                }, 3000);
            }
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
</body>

</html>
