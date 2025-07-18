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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- 2. CSS Theme của Slick (Tùy chọn nhưng nên có để có style mũi tên, dấu chấm) -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

</head>
<style>
    /* Tùy chỉnh mũi tên điều hướng cho đẹp hơn */
    .slick-prev:before,
    .slick-next:before {
        color: #860002;
    }
</style>

<body>


    <header class="site-header fbs__net-navbar">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="site-logo d-flex align-items-center">
                <a href="#">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Logo Phong Thủy Đại Cát"
                        class="img-fluid img-logo">
                </a>
                <span class="text-center title-logo">Phong thủy
                    <br> đại cát</span>
            </div>

            <!-- Menu cho Desktop -->
            <nav class="main-navigation">
                <ul>
                    <li><a href="#" class="active">Giới thiệu</a></li>
                    <li><a href="#">Dịch vụ</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Liên hệ</a></li>
                    <li><a href="#">Hỏi đáp</a></li>
                </ul>
            </nav>

            <!-- Icon Hamburger cho Mobile -->
            <div class="mobile-menu-toggle" id="mobile-menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>
    <div id="header-placeholder"></div>

    <!-- Menu cho Mobile (ẩn mặc định) -->
    <div class="mobile-navigation" id="mobile-navigation">
        <div class="mobile-nav-close" id="mobile-nav-close">
            <i class="fas fa-times"></i>
        </div>
        <nav>
            <ul>
                <li><a href="#" class="active">Giới thiệu</a></li>
                <li><a href="#">Dịch vụ</a></li>
                <li><a href="#">Tin tức</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Hỏi đáp</a></li>
            </ul>
        </nav>
    </div>

    <!-- Lớp phủ nền (ẩn mặc định) -->
    <div class="menu-overlay" id="menu-overlay"></div>
    <!-- Bỏ thẻ <section> cũ đi và thay bằng khối này -->
    <div class="scroll-container" id="header-placeholder">
        <section class="section section-1 position-relative hero__v6">
            <div class="position-absolute   upleft-image">
                <img src="{{ asset('assets/images/up_left.svg') }}" alt="upleft-image" class="img-fluid">

            </div>
            <div class="position-absolute   upright-image">
                <img src="{{ asset('assets/images/up_right.svg') }}" alt="upright-image" class="img-fluid">

            </div>
            <div class="container">
                <div class="row g-2">
                    <div class="col-lg-6">
                        {{-- <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/images/tu_van.svg') }}" alt=""
                                class="img-fluid img-banner-tu-van">

                        </div> --}}
                        {{-- <div class="menu-container gap-4  phong-thuyh1">
                            <h1 class="text-center title-chuyengiatuvan">Chuyên gia tư vấn <br>
                                phong thủy</h1>
                        </div> --}}

                        <h1 class="h1-chuyen-gia">
                            {{-- <div class="chuyen-gia1">PHONG THỦY ĐẠI CÁT</div> --}}
                            <div class="chuyen-gia2">PHONG THỦY ĐẠI CÁT</div>
                        </h1>
                        <div class="phong-thuyh1">
                            <div class="title-chuyengiatuvan fst-italic">Chuyên gia tư vấn </br> phong thủy </div>
                        </div>
                        <div class="btn-hover-default btn-banner-pc">
                            <a href="#" class="">Đặt lịch tư vấn</a>
                        </div>
                    </div>
                    <div class="col-lg-6  d-flex flex-column justify-content-center align-items-center">
                        <div class="">
                            <div class="menu-container gap-4">
                                <img src="{{ asset('assets/images/dich_vu.svg') }}" alt=""
                                    class="img-fluid img-banner-dich-vu">
                            </div>

                            <div class="btn-hover-default btn-banner-mobile">
                                <a href="#" class="">Đặt lịch tư vấn</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="position-absolute   bottom-image">
                <img src="{{ asset('assets/images/bottom_right.svg') }}" alt="bottom-image" class="img-fluid">

            </div>
            <div class="position-absolute bottom-0  bird-image">
                <img src="{{ asset('assets/images/bird.svg') }}" alt="bird-image" class="img-fluid bird-images">

            </div>
        </section>
        <section class="section gioi-thieu-section position-relative">
            <div class="position-absolute   about-upleft-image">
                <img src="{{ asset('assets/images/1.svg') }}" alt="upleft-image" class="img-fluid">
            </div>
            <div class="decorative-line about-decorative-line"></div>
            <div class="container">


                <div class=" position-relative d-flex justify-content-center align-items-center z-0 box-about-text">
                    <div class="position-absolute   about-2-image" style="margin-top: 20px;margin-left: -200px;">
                        <img src="{{ asset('assets/images/img_about2.svg') }}" alt="upleft-image"
                            class="img-fluid z-1">
                    </div>
                    <div class="text-center text-dark title-gioi-thieu">
                        Giới thiệu
                    </div>
                    <div class="position-absolute   about-1-image" style="margin-top: 20px; margin-right: -200px;">
                        <img src="{{ asset('assets/images/img_about1.svg') }}" alt="upleft-image"
                            class="img-fluid z-1">
                    </div>
                </div>

                <div class="gioi-thieu-content">
                    <p class="">
                        Đại Cát là nền tảng phong thủy chính thống, được xây dựng dựa trên nền tảng học thuật chuẩn mực
                        và giá trị văn hóa phương Đông. Chúng tôi tin rằng phong thủy không chỉ là một môn khoa học cổ
                        truyền, mà còn là chiếc chìa khóa giúp con người cân bằng cuộc sống, khơi thông tài lộc và hướng
                        tới sự an khang - thịnh vượng.

                    </p>
                    <a href="" class="xem-them fst-italic">Xem thêm</a>
                </div>
                <div class="pt-5 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('assets/images/video_gioi_thieu.svg') }}" class="img-fluid z-2"
                        alt="...">
                </div>
            </div>
            <div class="position-absolute   songabout-upright-image">
                <img src="{{ asset('assets/images/sog_about.svg') }}" alt="songabout-image" class="img-fluid z-1">
            </div>
            <div class="position-absolute   song2about-upright-image">
                <img src="{{ asset('assets/images/sog2_about.svg') }}" alt="song2about-image" class="img-fluid z-1">
            </div>
            <div class="position-absolute   about-upright-image">
                <img src="{{ asset('assets/images/4.svg') }}" alt="about-upright-image" class="img-fluid z-1">
            </div>
        </section>
        <!-- Bắt đầu Section Sứ mệnh -->
        <section class="section mission-section position-relative">
            <!-- 1. KHỐI TIÊU ĐỀ -->

            <div class="container">

                <div class="title-wrapper ">
                    <div class="decoration-dot"></div>

                    <div class="position-absolute sumenh-2-image" style="">
                        <img src="/assets/images/img_about2.svg" alt="upleft-image" class="img-fluid z-1">
                    </div>
                    <h2 class="section-title">Sứ mệnh</h2>
                    <div class="position-absolute   sumenh-1-image" style="">
                        <img src="/assets/images/img_about1.svg" alt="upleft-image" class="img-fluid z-1">
                    </div>
                </div>

                <!-- 2. KHỐI NỘI DUNG CHÍNH (Row của Bootstrap) -->
                <div class="mission-content row gx-5 g-2 align-items-center mt-5">

                    <!-- Cột bên trái: Hình ảnh -->
                    <div class="mission-image col-lg-6 ">
                        <img src="{{ asset('assets/images/anh_phat.svg') }}" alt="Tượng Phật và cây bonsai"
                            class="img-fluid rounded-3">
                    </div>

                    <!-- Cột bên phải: Chữ và 3 thẻ -->
                    <div class="mission-text col-lg-6 ">
                        <div class="mission-text-content">
                            <h3 class="sub-title">
                                <img src="{{ asset('assets/images/flower_left.svg') }}" alt="icon hoa"
                                    class="deco-icon">
                                “Tâm – Trí – Tín”
                                <img src="{{ asset('assets/images/flower_right.svg') }}" alt="icon hoa"
                                    class="deco-icon">
                            </h3>
                            <p class="text-dess-su-menh">
                                Sứ mệnh của Phong Thủy Đại Cát là trở thành người bạn đồng hành đáng tin cậy trong hành
                                trình kiến tạo cuộc sống hanh thông, thuận lợi – giúp mỗi người “Hiểu vận – Biết mệnh –
                                Chủ động cải mệnh – Vững bước thành công.”
                            </p>
                        </div>
                        <!-- Container cho 3 thẻ "Tâm - Trí - Tín" -->
                        <div class="card-container-miss">
                            <!-- Thẻ TÂM -->
                            <div class="card-item-miss card-highlight">
                                <p class="mb-0">Tâm<br>mình<br>hướng<br>đạo</p>
                            </div>
                            <!-- Thẻ TRÍ -->
                            <div class=" card-item-miss">
                                <p class="mb-0">Trí<br>sáng<br>soi<br>đường</p>
                            </div>
                            <!-- Thẻ TÍN -->
                            <div class=" card-item-miss">
                                <p class="mb-0">Tín<br>dựng<br>thành<br>công</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- Kết thúc Section Sứ mệnh -->
        <section class="section section-3 position-relative">
            <div class="position-absolute   caydao-upleft-image">
                <img src="{{ asset('assets/images/cay_dao.svg') }}" alt="upleft-image" class="img-fluid">
            </div>
            <div class="decorative-line about-decorative-line"></div>
            <div class="container">


                <div class=" position-relative d-flex justify-content-center align-items-center z-0 mt-5">
                    <div class="position-absolute   quytrinh-2-image" style="">
                        <img src="{{ asset('assets/images/img_about2.svg') }}" alt="upleft-image"
                            class="img-fluid z-1">
                    </div>
                    <div class="text-center text-dark title-quytrinh">
                        Quy trình đặt hàng <br>
                        cho khách
                    </div>
                    <div class="position-absolute   quytrinh-1-image" style="">
                        <img src="{{ asset('assets/images/img_about1.svg') }}" alt="upleft-image"
                            class="img-fluid z-1">
                    </div>
                </div>

                <div class="row d-flex align-items-center justify-content-center ">
                    <div class="col-lg-10 slider-quytrinh">
                        <div class="steps-slider ">

                            <!-- BẮT ĐẦU SLIDER -->
                            <div class="my-manual-slider">
                                <div class="slider-viewport">
                                    <div class="slider-track">
                                        <!-- Thêm nhiều slide hơn để thấy rõ hiệu ứng -->
                                        <div class="slide">
                                            <div class="slide-content">1</div>
                                        </div>
                                        <div class="slide">
                                            <div class="slide-content">2</div>
                                        </div>
                                        <div class="slide">
                                            <div class="slide-content">3</div>
                                        </div>
                                      
                                    </div>
                                </div>
                                <button class="slider-btn prev-btn">
                                   < </button>
                                        <button class="slider-btn next-btn">></button>
                            </div>
                            <!-- KẾT THÚC SLIDER -->

                        </div>
                    </div>
                </div>

            </div>

        </section>
   
    </div>

    <script>
        // === PHẦN CODE THÊM VÀO ĐỂ XỬ LÝ HEADER KHI CUỘN ===
        document.addEventListener("DOMContentLoaded", function() {
            var header = document.querySelector(".fbs__net-navbar");
            var placeholder = document.getElementById("header-placeholder");

            function updateHeaderOnScroll() {
                if (window.scrollY > 0) {
                    if (!header.classList.contains("active")) {
                        header.classList.add("active");
                        placeholder.style.height = header.offsetHeight + "px";
                    }
                } else {
                    header.classList.remove("active");
                    placeholder.style.height = "0px";
                }
            }

            // Gọi một lần khi load
            updateHeaderOnScroll();

            // Lắng nghe sự kiện scroll
            window.addEventListener("scroll", updateHeaderOnScroll);
            var cards = document.querySelectorAll(".card-container-miss .card-item-miss");
            var currentIndex = 0;

            function highlightNextCard() {
                // Xóa class hiện tại
                cards[currentIndex].classList.remove("card-highlight");

                // Tăng chỉ số (và quay về 0 nếu hết)
                currentIndex = (currentIndex + 1) % cards.length;

                // Thêm class vào phần tử tiếp theo
                cards[currentIndex].classList.add("card-highlight");
            }

            // Lặp mỗi 2 giây
            setInterval(highlightNextCard, 3000);
        });

        // Lấy các element cần thiết
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mobileNavigation = document.getElementById('mobile-navigation');
        const mobileNavClose = document.getElementById('mobile-nav-close');
        const menuOverlay = document.getElementById('menu-overlay');

        // Hàm để mở menu
        function openMenu() {
            mobileNavigation.classList.add('is-open');
            menuOverlay.classList.add('is-open');
        }

        // Hàm để đóng menu
        function closeMenu() {
            mobileNavigation.classList.remove('is-open');
            menuOverlay.classList.remove('is-open');
        }

        // Gán sự kiện click
        mobileMenuToggle.addEventListener('click', openMenu);
        mobileNavClose.addEventListener('click', closeMenu);
        menuOverlay.addEventListener('click', closeMenu);



    const slider = document.querySelector('.my-manual-slider');
    const track = slider.querySelector('.slider-track');
    const prevButton = slider.querySelector('.prev-btn');
    const nextButton = slider.querySelector('.next-btn');
    const originalSlidesHTML = track.innerHTML;

    // --- Biến cấu hình và trạng thái ---
    let slidesToShow = 3; // Mặc định cho desktop
    const transitionSpeed = 500;
    let isAnimating = false;
    let slideWidth = 0;
    let currentIndex = 0;

    // --- HÀM KHỞI TẠO HOẶC CẬP NHẬT LẠI SLIDER ---
    function initializeSlider() {
        // === THAY ĐỔI CHÍNH Ở ĐÂY ===
        // 1. Xác định số slide cần hiển thị dựa trên kích thước màn hình
        const screenWidth = window.innerWidth;
        if (screenWidth <= 768) {
            slidesToShow = 1; // Mobile
        } else if (screenWidth <= 1024) {
            slidesToShow = 2; // Tablet
        } else {
            slidesToShow = 3; // Desktop
        }

        // 2. Reset track và nhân bản slide
        track.innerHTML = originalSlidesHTML;
        let originalSlides = Array.from(track.children);
        
        for (let i = 0; i < slidesToShow; i++) {
            const cloneEnd = originalSlides[i].cloneNode(true);
            track.appendChild(cloneEnd);
            const cloneStart = originalSlides[originalSlides.length - 1 - i].cloneNode(true);
            track.insertBefore(cloneStart, track.firstChild);
        }
        
        // 3. Cập nhật kích thước và vị trí ban đầu
        updateDimensions();
    }

    function updateDimensions() {
        slideWidth = track.querySelector('.slide').getBoundingClientRect().width;
        currentIndex = slidesToShow;
        track.style.transition = 'none';
        track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
        setTimeout(() => {
            track.style.transition = `transform ${transitionSpeed}ms ease-in-out`;
        }, 20);
    }
    
    const moveTo = (index) => {
        if(isAnimating) return;
        isAnimating = true;
        track.style.transform = `translateX(-${index * slideWidth}px)`;
        currentIndex = index;
    };

    nextButton.addEventListener('click', () => moveTo(currentIndex + 1));
    prevButton.addEventListener('click', () => moveTo(currentIndex - 1));

    // Xử lý vòng lặp vô tận
    track.addEventListener('transitionend', () => {
        isAnimating = false;
        let originalSlidesCount = track.querySelectorAll('.slide').length - (slidesToShow * 2);

        if (currentIndex >= originalSlidesCount + slidesToShow) {
            track.style.transition = 'none';
            currentIndex = slidesToShow;
            track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
        }
        if (currentIndex < slidesToShow) {
            track.style.transition = 'none';
            currentIndex = originalSlidesCount + slidesToShow - 1;
            track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
        }
        
        setTimeout(() => {
            track.style.transition = `transform ${transitionSpeed}ms ease-in-out`;
        }, 20);
    });

    // Thêm chức năng vuốt (swipe)
    let touchStartX = 0;
    let touchMoveX = 0;

    track.addEventListener('touchstart', (e) => {
        if (isAnimating) return;
        touchStartX = e.touches[0].clientX;
        track.style.transition = 'none';
    }, { passive: true });

    track.addEventListener('touchmove', (e) => {
        if (isAnimating) return;
        touchMoveX = e.touches[0].clientX;
        const diff = touchMoveX - touchStartX;
        track.style.transform = `translateX(-${currentIndex * slideWidth - diff}px)`;
    }, { passive: true });

    track.addEventListener('touchend', () => {
        if (isAnimating) return;
        const diff = touchMoveX - touchStartX;
        track.style.transition = `transform ${transitionSpeed}ms ease-in-out`;

        if (diff > 50) {
            moveTo(currentIndex - 1);
        } else if (diff < -50) {
            moveTo(currentIndex + 1);
        } else {
            track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
        }
        // Reset touchMoveX
        touchMoveX = 0;
    });

    // Lắng nghe sự kiện resize
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(initializeSlider, 250); 
    });

    // Khởi tạo slider lần đầu tiên
    initializeSlider();
    </script>

</body>

</html>
