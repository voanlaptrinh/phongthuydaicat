    <section class="contact-section section">
            <!-- Các họa tiết trang trí bên ngoài -->
            <img src="{{ asset('assets/images/hoa_van_ngoai_1.svg') }}" alt="Họa tiết trang trí" class="deco-left">
            <img src="{{ asset('assets/images/hoa_van_ngoai_2.svg') }}" alt="Họa tiết trang trí" class="deco-right">

            <div class="container">
                <div class="contact-box">
                    <!-- 4 thẻ span này dùng để vẽ các góc trang trí cho khung -->
                    <span class="corner-deco corner-top-left">
                        <img src="{{ asset('assets/images/hoa_van_khung_1.svg') }}" alt=""
                            class="img-fluid">
                    </span>
                    <span class="corner-deco corner-top-right">
                        <img src="{{ asset('assets/images/hoa_van_khung_2.svg') }}" alt=""
                            class="img-fluid">
                    </span>
                    <span class="corner-deco corner-bottom-left">
                        <img src="{{ asset('assets/images/hoa_van_khung_3.svg') }}" alt=""
                            class="img-fluid">
                    </span>
                    <span class="corner-deco corner-bottom-right">
                        <img src="{{ asset('assets/images/hoa_van_khung_4.svg') }}" alt=""
                            class="img-fluid">
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
                            <form action="#" method="POST" class="contact-form">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control input-contact"
                                            placeholder="Họ và tên" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="tel" class="form-control input-contact"
                                            placeholder="Số điện thoại" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="email" class="form-control input-contact" placeholder="Email">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control input-contact"
                                            placeholder="Địa chỉ liên hệ">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control input-contact"
                                            placeholder="Loại hình dịch vụ">
                                    </div>
                                    <div class="col-12 mb-4">
                                        <textarea class="form-control input-contact" rows="4" placeholder="Mô tả nhu cầu dịch vụ"></textarea>
                                    </div>
                                    <div class="col-12 text-center">
                                       <div class="btn-hover-default ">
                            <a href="#" class="">Đặt lịch</a>
                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <img src="{{ asset('assets/images/hoa_van_ngoai_3.svg') }}" alt="" class="deco-hoatietbottomleft">
            <img src="{{ asset('assets/images/hoa_van_ngoai_4.svg') }}" alt=""  class="deco-hoatietbottomright">

        </section>