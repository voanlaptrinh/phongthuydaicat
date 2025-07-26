    <section class="contact-section section">
        <!-- Các họa tiết trang trí bên ngoài -->
        <img src="{{ asset('assets/images/hoa_van_ngoai_1.svg') }}" alt="Họa tiết trang trí" class="deco-left">
        <img src="{{ asset('assets/images/hoa_van_ngoai_2.svg') }}" alt="Họa tiết trang trí" class="deco-right">

        <div class="container">
            <div class="contact-box">
                <!-- 4 thẻ span này dùng để vẽ các góc trang trí cho khung -->
                <span class="corner-deco corner-top-left">
                    <img src="{{ asset('assets/images/hoa_van_khung_1.svg') }}" alt="" class="img-fluid">
                </span>
                <span class="corner-deco corner-top-right">
                    <img src="{{ asset('assets/images/hoa_van_khung_2.svg') }}" alt="" class="img-fluid">
                </span>
                <span class="corner-deco corner-bottom-left">
                    <img src="{{ asset('assets/images/hoa_van_khung_3.svg') }}" alt="" class="img-fluid">
                </span>
                <span class="corner-deco corner-bottom-right">
                    <img src="{{ asset('assets/images/hoa_van_khung_4.svg') }}" alt="" class="img-fluid">
                </span>

                <div class="row g-4">
                    <!-- Cột thông tin bên trái -->
                    <div class="col-lg-5 contact-info p-0">
                        <h2 class="contact-title">Liên hệ chúng tôi</h2>
                        <p class="contact-description">Quý khách vui lòng liên hệ để đặt lịch tư vấn phong thủy của
                            chúng tôi.</p>
                        <p class="contact-hours">Thời gian phản hồi: 8h - 18h Thứ 2 đến Chủ nhật</p>
                        <ul class="contact-list">
                            <li><i class="fas fa-phone-alt"></i> 190011234</li>
                            <li><i class="fas fa-mobile-alt"></i> 023464765456</li>
                            <li><i class="fas fa-envelope"></i> phongthuydaicat@gmail.com</li>
                        </ul>
                    </div>

                    <!-- Cột form bên phải -->
                    <div class="col-lg-7 contact-form-wrapper p-0">

                        <form id="contactForm" method="POST" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input name="username" type="text" class="form-control input-contact"
                                        placeholder="Họ và tên" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input name="phone" type="tel" class="form-control input-contact"
                                        placeholder="Số điện thoại" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input name="email" type="email" class="form-control input-contact"
                                        placeholder="Email">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input name="address" type="text" class="form-control input-contact"
                                        placeholder="Địa chỉ liên hệ">
                                </div>
                                <div class="col-12 mb-3">
                                    <input name="loai_dich_vu" type="text" class="form-control input-contact"
                                        placeholder="Loại hình dịch vụ">
                                </div>
                                <div class="col-12 mb-4">
                                    <textarea name="mo_ta" class="form-control input-contact" rows="4" placeholder="Mô tả nhu cầu dịch vụ"></textarea>
                                </div>
                                <div class="col-12 text-center">
                                    <div class="btn-hover-default">
                                        <button type="submit" class="btn">Đặt lịch</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/images/hoa_van_ngoai_3.svg') }}" alt="" class="deco-hoatietbottomleft">
        <img src="{{ asset('assets/images/hoa_van_ngoai_4.svg') }}" alt="" class="deco-hoatietbottomright">

    </section>
    <script>
        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
console.log(container);

            const toast = document.createElement('div');
            toast.classList.add('toast-show');
            toast.textContent = message;

            // Thêm class theo loại nếu cần (success, error...)
            if (type === 'error') toast.style.backgroundColor = '#dc3545';
            if (type === 'warning') toast.style.backgroundColor = '#ffc107';
            if (type === 'info') toast.style.backgroundColor = '#17a2b8';

            container.appendChild(toast);

            // Xóa sau 2s
            setTimeout(() => {
                toast.remove();
            }, 2000);
        }
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contactForm');

            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(contactForm);

                fetch("{{ url('/lien-he') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            showToast(data.message);
                            // contactForm.reset();
                        } else {
                            alert("Đã xảy ra lỗi!");
                        }
                    })
                    .catch(error => {
                        console.error('Lỗi:', error);
                        alert("Lỗi kết nối server!");
                    });
            });
        });
    </script>
