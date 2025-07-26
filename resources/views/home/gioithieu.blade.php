    <section class="section gioi-thieu-section position-relative">
        <button id="open-schedule-popup" class="position-absolute  top-0 end-0 btn">
            <img src="{{ asset('assets/images/schedule.svg') }}" alt="" class="schedule img-fluid w-70">
        </button>
        <div class="position-absolute   about-upleft-image">
            <img src="{{ asset('assets/images/1.svg') }}" alt="upleft-image" class="img-fluid">
        </div>
        <div class="decorative-line about-decorative-line"></div>
        <div class="container">


            <div class=" position-relative d-flex justify-content-center align-items-center z-0 box-about-text">
                <div class="position-absolute   about-2-image" style="margin-top: 20px;margin-left: -200px;">
                    <img src="{{ asset('assets/images/img_about2.svg') }}" alt="upleft-image" class="img-fluid z-1">
                </div>
                <div class="text-center text-dark title-gioi-thieu">
                    Giới thiệu
                </div>
                <div class="position-absolute   about-1-image" style="margin-top: 20px; margin-right: -200px;">
                    <img src="{{ asset('assets/images/img_about1.svg') }}" alt="upleft-image" class="img-fluid z-1">
                </div>
            </div>

            <div class="gioi-thieu-content">
                <p class="">
                    Đại Cát là nền tảng phong thủy chính thống, được xây dựng dựa trên nền tảng học thuật chuẩn mực
                    và giá trị văn hóa phương Đông. Chúng tôi tin rằng phong thủy không chỉ là một môn khoa học cổ
                    truyền, mà còn là chiếc chìa khóa giúp con người cân bằng cuộc sống, khơi thông tài lộc và hướng
                    tới sự an khang - thịnh vượng.

                </p>
                {{-- <a href="" class="xem-them fst-italic">Xem thêm</a> --}}
            </div>
            <div class="pt-5 d-flex justify-content-center align-items-center">
                <img src="{{ asset('assets/images/video_gioi_thieu.svg') }}" class="img-fluid z-2" alt="...">
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
  
    <!-- Popup Đặt Lịch Tư Vấn -->
    <div id="schedule-popup-overlay" class="schedule-popup-overlay">
        <div class="schedule-popup-content">
            <div class="schedule-popup-header">
                <h2>LIÊN HỆ ĐẶT LỊCH TƯ VẤN</h2>
                <button id="close-schedule-popup" class="close-button">×</button>
            </div>
            <div class="schedule-popup-body">
                <form action="#" method="POST">
                    <div class="form-group">
                        <input type="tel" id="phone" name="phone" placeholder="Số điện thoại"
                            class="form-control input-contact" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="fullname" name="fullname" placeholder="Họ và tên"
                            class="form-control input-contact" required>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="Email"
                            class="form-control input-contact" required>
                    </div>
                    <div class="form-group">
                        <textarea id="message" name="message" placeholder="Nội dung câu hỏi" class="form-control input-contact"
                            rows="4"></textarea>
                    </div>
                    <div class="col-12 text-center">
                        <div class="btn-hover-default">
                            <button type="submit" class="btn">Đặt lịch</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Lấy các phần tử cần thiết
            const openPopupButton = document.getElementById('open-schedule-popup');
            const closePopupButton = document.getElementById('close-schedule-popup');
            const popupOverlay = document.getElementById('schedule-popup-overlay');

            // Hàm để hiển thị popup
            function showPopup() {
                if (popupOverlay) {
                    popupOverlay.style.display = 'flex';
                }
            }

            // Hàm để ẩn popup
            function hidePopup() {
                if (popupOverlay) {
                    popupOverlay.style.display = 'none';
                }
            }

            // Gán sự kiện click để mở popup
            if (openPopupButton) {
                openPopupButton.addEventListener('click', function(event) {
                    event.preventDefault(); // Ngăn hành vi mặc định của button nếu có
                    showPopup();
                });
            }

            // Gán sự kiện click cho nút đóng 'X'
            if (closePopupButton) {
                closePopupButton.addEventListener('click', hidePopup);
            }

            // Gán sự kiện click vào lớp phủ để đóng popup
            if (popupOverlay) {
                popupOverlay.addEventListener('click', function(event) {
                    // Chỉ đóng khi click vào chính lớp phủ, không phải nội dung bên trong
                    if (event.target === popupOverlay) {
                        hidePopup();
                    }
                });
            }

        });
    </script>
