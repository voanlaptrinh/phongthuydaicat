document.addEventListener('DOMContentLoaded', function () {

var x, i, j, l, ll, selElmnt, a, b, c;
    /* Đổi class tìm kiếm thành "select-wrapper" */
    x = document.getElementsByClassName("select-wrapper");
    l = x.length;
    for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        
        // Bắt đầu từ 0 để lấy cả placeholder nếu cần, nhưng không hiển thị nó
        for (j = 0; j < ll; j++) {
            if (selElmnt.options[j].disabled) continue; // Bỏ qua option disabled

            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                var y, i, k, s, h, sl, yl;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                sl = s.length;
                h = this.parentNode.previousSibling;
                for (i = 0; i < sl; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        // Cập nhật hiển thị và thêm class để đổi màu chữ
                        h.innerHTML = this.innerHTML;
                        h.classList.add("has-value"); 

                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        yl = y.length;
                        for (k = 0; k < yl; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }

    function closeAllSelect(elmnt) {
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
            if (elmnt != y[i]) {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < x.length; i++) {
            if (elmnt.nextSibling != x[i]) {
                x[i].classList.add("select-hide");
            }
        }
    }
    document.addEventListener("click", closeAllSelect);








     // Lấy các phần tử cần thiết bằng CLASS
    const openPopupButtons = document.querySelectorAll('.js-open-schedule-popup');
    const popupOverlay = document.querySelector('.js-schedule-popup-overlay');
    
    // Nếu không tìm thấy popup, dừng thực thi để tránh lỗi
    if (!popupOverlay) {
        console.error("Không tìm thấy phần tử popup '.js-schedule-popup-overlay'.");
        return;
    }
    
    const popupContent = popupOverlay.querySelector('.schedule-popup-content'); // Lấy phần tử content để rung
    const closePopupButton = popupOverlay.querySelector('.js-close-schedule-popup');

    // --- CÁC HÀM XỬ LÝ ---

    // Hàm để hiển thị popup
    function showPopup() {
        popupOverlay.style.display = 'flex';
        // Xóa class rung mỗi khi mở lại popup để hiệu ứng có thể chạy lại
        if (popupContent) {
            popupContent.classList.remove('shake');
        }
    }

    // Hàm để ẩn popup
    function hidePopup() {
        popupOverlay.style.display = 'none';
    }
    
    // Hàm để rung popup
    function shakePopup() {
        if (popupContent) {
            // Thêm class 'shake' để kích hoạt animation
            popupContent.classList.add('shake');
            // Sau khi animation kết thúc (0.5s), xóa class đi
            // để lần sau có thể rung tiếp
            setTimeout(() => {
                popupContent.classList.remove('shake');
            }, 500); // Thời gian phải khớp với thời gian animation trong CSS
        }
    }

    // --- GÁN SỰ KIỆN ---

    // Gán sự kiện click cho TẤT CẢ các nút mở popup
    openPopupButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn hành vi mặc định (ví dụ: thẻ <a>)
            showPopup();
        });
    });

    // Gán sự kiện click cho nút đóng 'X'
    if (closePopupButton) {
        closePopupButton.addEventListener('click', hidePopup);
    }

    // *** THAY ĐỔI CHÍNH Ở ĐÂY ***
    // Gán sự kiện click vào lớp phủ
    popupOverlay.addEventListener('click', function(event) {
        // Chỉ thực hiện khi người dùng click vào chính lớp phủ (event.target),
        // không phải các phần tử con bên trong nó (như form, text...).
        if (event.target === popupOverlay) {
            // Thay vì gọi hidePopup(), chúng ta gọi shakePopup()
            shakePopup();
        }
    });

    // Thêm: Đóng popup bằng phím "Escape"
    document.addEventListener('keydown', function(event) {
        // Kiểm tra xem popup có đang hiển thị không trước khi đóng
        if (event.key === 'Escape' && popupOverlay.style.display === 'flex') {
            hidePopup();
        }
    });



   /**
 * HÀM KHỞI TẠO SLIDER CHUNG (Hỗ trợ kéo/vuốt và autoplay)
 * @param {string} containerSelector - Selector của container cha bao bọc slider.
 * @param {object} options - Các tùy chọn cho slider.
 * @param {boolean} [options.autoplay=false] - Bật/tắt tự động chạy.
 * @param {number} [options.delay=5000] - Thời gian chờ giữa các lần chuyển slide (ms).
 * @param {boolean} [options.pauseOnHover=true] - Tạm dừng khi di chuột vào.
 */
function initGenericSlider(containerSelector, options = {}) {
    // --- CÀI ĐẶT MẶC ĐỊNH VÀ TÙY CHỌN ---
    const settings = {
        autoplay: false,
        delay: 5000, // 5 giây
        pauseOnHover: true,
        ...options // Ghi đè cài đặt mặc định bằng các tùy chọn được truyền vào
    };

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
    let isDragging = false;
    let startPos = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;
    let animationID = 0;

    // --- BIẾN MỚI CHO AUTOPLAY ---
    let autoplayInterval = null;

    function updateDimensions() {
        const firstSlide = slides[0];
        if (!firstSlide) return;
        const gap = parseFloat(window.getComputedStyle(track).gap) || 0;
        slideWidthWithGap = firstSlide.offsetWidth + gap;
        track.style.transform = `translateX(-${currentIndex * slideWidthWithGap}px)`;
        prevTranslate = -currentIndex * slideWidthWithGap;
    }

    function moveToSlide(index) {
        if (slideWidthWithGap > 0) {
            const visibleSlides = getVisibleSlidesCount();
            const maxIndex = Math.max(0, slides.length - visibleSlides);

            // Xử lý vòng lặp (loop)
            if (index > maxIndex) {
                index = 0;
            }
            if (index < 0) {
                index = maxIndex;
            }

            currentTranslate = -index * slideWidthWithGap;
            prevTranslate = currentTranslate;
            setSliderPosition();
            currentIndex = index;
        }
    }

    function getVisibleSlidesCount() {
        if (slideWidthWithGap === 0) return 1;
        // Thêm Math.max để tránh chia cho 0
        return Math.round(track.parentElement.offsetWidth / Math.max(1, slideWidthWithGap));
    }

    // --- CÁC HÀM XỬ LÝ AUTOPLAY ---

    function startAutoplay() {
        // Chỉ bắt đầu nếu chưa có interval và bật autoplay
        if (settings.autoplay && autoplayInterval === null) {
            autoplayInterval = setInterval(handleNext, settings.delay);
        }
    }

    function stopAutoplay() {
        clearInterval(autoplayInterval);
        autoplayInterval = null;
    }

    function resetAutoplay() {
        stopAutoplay();
        startAutoplay();
    }


    // --- Các hàm xử lý sự kiện kéo/vuốt ---

    function dragStart(event) {
        stopAutoplay(); // Dừng tự chạy khi người dùng tương tác
        isDragging = true;
        startPos = getPositionX(event);
        animationID = requestAnimationFrame(animation);
        track.style.transition = 'none';
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

        if (movedBy < -50 && currentIndex < slides.length - getVisibleSlidesCount()) {
            currentIndex++;
        } else if (movedBy > 50 && currentIndex > 0) {
            currentIndex--;
        }
        
        moveToSlide(currentIndex);
        track.style.transition = 'transform 0.5s ease-in-out';
        track.classList.remove('grabbing');
        
        startAutoplay(); // Khởi động lại autoplay sau khi kéo xong
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
        moveToSlide(currentIndex + 1);
    }

    function handlePrev() {
        moveToSlide(currentIndex - 1);
    }

    // Gán sự kiện
    nextButton.addEventListener('click', () => {
        handleNext();
        resetAutoplay(); // Reset timer khi click
    });
    prevButton.addEventListener('click', () => {
        handlePrev();
        resetAutoplay(); // Reset timer khi click
    });

    // Sự kiện cho chuột
    track.addEventListener('mousedown', dragStart);
    track.addEventListener('mouseup', dragEnd);
    track.addEventListener('mouseleave', dragEnd);
    track.addEventListener('mousemove', dragMove);

    // Sự kiện cho chạm (mobile)
    track.addEventListener('touchstart', dragStart, { passive: true });
    track.addEventListener('touchend', dragEnd);
    track.addEventListener('touchmove', dragMove, { passive: true });
    
    // Xử lý tạm dừng khi hover
    if (settings.autoplay && settings.pauseOnHover) {
        sliderContainer.addEventListener('mouseenter', stopAutoplay);
        sliderContainer.addEventListener('mouseleave', startAutoplay);
    }


    // Ngăn chặn hành vi kéo ảnh mặc định
    slides.forEach(slide => {
        slide.querySelector('img')?.addEventListener('dragstart', (e) => e.preventDefault());
    });

    // Xử lý resize
    window.addEventListener('resize', () => {
        track.style.transition = 'none';
        updateDimensions();
        moveToSlide(currentIndex);
    });

    // Khởi tạo
    setTimeout(() => {
        updateDimensions();
        startAutoplay(); // Bắt đầu tự chạy sau khi khởi tạo
    }, 100);
}

// --- KHỞI TẠO CÁC CHỨC NĂNG CỤ THỂ ---

// Slider quy trình: không có tùy chọn, sẽ không tự chạy
initGenericSlider('#quy-trinh-slider');

// Slider phản hồi: BẬT tự động chạy với các tùy chọn
initGenericSlider('#phan-hoi-slider', {
    autoplay: true,
    delay: 4000,      // Chuyển slide sau mỗi 4 giây
    pauseOnHover: true // Tự động dừng khi di chuột vào
});

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

    const accordionItems = document.querySelectorAll('.accordion-item');

    accordionItems.forEach(item => {
        const header = item.querySelector('.accordion-header');

        header.addEventListener('click', () => {
            const isOpen = item.classList.contains('is-open');

            // Đóng tất cả các item khác
            accordionItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('is-open');
                }
            });

            // Toggle item hiện tại
            item.classList.toggle('is-open');
        });
    });



      /**
     * Hàm chính để khởi tạo logic cho một form.
     * @param {HTMLFormElement} formElement - Phần tử DOM của form cần xử lý.
     */
    function initializeScheduleForm(formElement) {
        // Tìm các phần tử quan trọng bên trong form hiện tại
        const submitButton = formElement.querySelector('.submit-button-js');
        const formMessage = formElement.querySelector('.form-message-js');
        const inputs = formElement.querySelectorAll('input[name], textarea[name]');

        if (!submitButton) return;

        // Xóa lỗi khi người dùng nhập liệu
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                if (this.classList.contains('is-invalid')) {
                    this.classList.remove('is-invalid');
                    const errorElement = formElement.querySelector(`[data-field-error="${this.name}"]`);
                    if (errorElement) {
                        errorElement.textContent = '';
                    }
                }
            });
        });
        
        // Xử lý sự kiện submit
        formElement.addEventListener('submit', function (event) {
            event.preventDefault();

            clearErrors(formElement);
            submitButton.disabled = true;
            submitButton.textContent = 'Đang gửi...';
            if(formMessage) {
                formMessage.style.display = 'none';
                // Xóa timer cũ nếu có, để tránh việc nó ẩn thông báo mới quá sớm
                if (formElement.successTimer) {
                    clearTimeout(formElement.successTimer);
                }
            }
            
            const formData = new FormData(formElement);
            const data = Object.fromEntries(formData.entries());
            delete data['_token'];

            const errors = validateForm(data);

            if (Object.keys(errors).length > 0) {
                displayErrors(formElement, errors);
                submitButton.disabled = false;
                submitButton.textContent = 'Đặt lịch';
                return;
            }

            fetch(formElement.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': formData.get('_token')
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json().then(body => ({ ok: response.ok, body })))
            .then(({ ok, body }) => {
                if (ok) { // Mã 2xx thành công
                    if (formMessage) {
                        formMessage.textContent = body.message;
                        formMessage.className = 'form-message-js success';
                        formMessage.style.display = 'block';
                        
                        // =================================================================
                        // PHẦN MỚI: TỰ ĐỘNG ẨN THÔNG BÁO THÀNH CÔNG SAU 5 GIÂY
                        // =================================================================
                        // Đặt một bộ đếm thời gian. Sau 5000ms (5 giây), hàm bên trong sẽ được thực thi.
                        formElement.successTimer = setTimeout(() => {
                            formMessage.style.display = 'none';
                        }, 5000); 
                        // =================================================================

                    }
                    formElement.reset(); // Xóa dữ liệu trong form
                } else { // Mã 4xx, 5xx lỗi
                    handleServerError(formElement, body);
                }
            })
            .catch(error => {
                console.error('Fetch Error:', error);
                handleServerError(formElement, { message: 'Không thể kết nối đến máy chủ. Vui lòng thử lại.' });
            })
            .finally(() => {
                submitButton.disabled = false;
                submitButton.textContent = 'Đặt lịch';
            });
        });
    }

    // --- CÁC HÀM HỖ TRỢ (không đổi) ---

    function handleServerError(formElement, error) {
        const formMessage = formElement.querySelector('.form-message-js');
        if (error && error.errors) {
            displayErrors(formElement, error.errors);
        } else if (formMessage) {
            const message = error.message || 'Đã có lỗi xảy ra.';
            formMessage.textContent = message;
            formMessage.className = 'form-message-js error';
            formMessage.style.display = 'block';
        }
    }
    
    function displayErrors(formElement, errors) {
        for (const field in errors) {
            const inputElement = formElement.querySelector(`[name="${field}"]`);
            const errorElement = formElement.querySelector(`[data-field-error="${field}"]`);
            if (inputElement) {
                inputElement.classList.add('is-invalid');
            }
            if (errorElement) {
                errorElement.textContent = Array.isArray(errors[field]) ? errors[field][0] : errors[field];
            }
        }
    }

    function clearErrors(formElement) {
        formElement.querySelectorAll('.error-text').forEach(el => el.textContent = '');
        formElement.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    }

    function validateForm(data) {
        const errors = {};
        if (!data.fullname?.trim()) errors.fullname = 'Vui lòng nhập họ và tên.';
        if (!data.phone?.trim()) {
            errors.phone = 'Vui lòng nhập số điện thoại.';
        } else if (!/^[0-9]{10,11}$/.test(data.phone.replace(/[\s-()+]/g, ''))) {
            errors.phone = 'Số điện thoại không hợp lệ.';
        }
        if (!data.email?.trim()) {
            errors.email = 'Vui lòng nhập email.';
        } else if (!/^\S+@\S+\.\S+$/.test(data.email)) {
            errors.email = 'Địa chỉ email không hợp lệ.';
        }
        return errors;
    }

    // --- KHỞI TẠO (không đổi) ---
    const allScheduleForms = document.querySelectorAll('.schedule-form-js');
    allScheduleForms.forEach(form => {
        initializeScheduleForm(form);
    });
});