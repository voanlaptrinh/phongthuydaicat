   <section class="testimonial-section section" id="phan-hoi-slider">
            <div class="decorative-line about-decorative-line"></div>
            <div class="container">
                <!-- TIÊU ĐỀ -->
                <div class="section-title-phanhoi  position-relative d-flex justify-content-center align-items-end">
                    <div class="position-absolute   phanhoi-2-image" style="">
                        <img src="{{ asset('assets/images/img_about2.svg') }}" alt="upleft-image"
                            class="img-fluid z-1">
                    </div>
                    <h2>Phản hồi của khách hàng</h2>
                    <div class="position-absolute   phanhoi-1-image" style="">
                        <img src="{{ asset('assets/images/img_about1.svg') }}" alt="upleft-image"
                            class="img-fluid z-1">
                    </div>
                </div>

                <!-- SLIDER -->
                <div class="slider-container">
                    <!-- Nút điều hướng trái -->
                    <button class="slider-btn" id="prev-btn2">
                        <img src="{{ asset('assets/images/previcon.svg') }}" alt="" class="img-fluid">
                    </button>

                    <!-- Viewport để "cắt" các slide -->
                    <div class="slider-viewport">
                        <!-- Track chứa tất cả các card và sẽ di chuyển -->
                        <div class="slider-track-phanhoi" id="slider-track-phanhoi">

                            <!-- Card 1 -->
                            <article class="testimonial-card">
                                <span class="card-deco-top"></span>
                                <span class="card-deco-bottom"></span>

                                <div class="card-header">
                                    <img src="https://i.imgur.com/3YQ5Yf1.png" alt="Avatar Chị Hà Trang"
                                        class="avatar">
                                    <div class="author-info">
                                        <h3>Chị Hà Trang</h3>
                                        <p>06/04/2025</p>
                                    </div>
                                </div>
                                <p class="testimonial-text">
                                    Tôi đặc biệt thích cách tư vấn được trình bày dễ hiểu, kết hợp giữa phong thủy
                                    truyền thống và hiện đại. Không mê tín, mà rất thực tế. Thông tin rõ ràng, chuyên
                                    Không mê tín, mà rất thực tế. Thông tin rõ ràng, chuyên Không mê tín, mà rất thực
                                    tế. Thông tin rõ ràng, chuyên Không mê tín, mà rất thực tế. Thông tin rõ ràng,
                                    chuyên Không mê tín, mà rất thực tế. Thông tin rõ ràng, chuyên
                                </p>
                            </article>

                            <!-- Card 2 -->
                            <article class="testimonial-card">
                                <span class="card-deco-top"></span>
                                <span class="card-deco-bottom"></span>

                                <div class="card-header">
                                    <img src="https://i.imgur.com/h5rD7O3.png" alt="Avatar Anh Thế Hưng"
                                        class="avatar">
                                    <div class="author-info">
                                        <h3>Anh Thế Hưng</h3>
                                        <p>10/04/2025</p>
                                    </div>
                                </div>
                                <p class="testimonial-text">
                                    Trang web Phong Thủy Đại Cát có thiết kế rất đẹp, dễ hiểu và mang tính truyền thống.
                                    Tôi cảm nhận được sự chỉn chu, có chiều sâu trong từng câu chữ.
                                </p>
                            </article>

                            <!-- Card 3 -->
                            <article class="testimonial-card">
                                <span class="card-deco-top"></span>
                                <span class="card-deco-bottom"></span>

                                <div class="card-header">
                                    <img src="https://i.imgur.com/e8p1f82.png" alt="Avatar Anh Hiếu Trần"
                                        class="avatar">
                                    <div class="author-info">
                                        <h3>Anh Hiếu Trần</h3>
                                        <p>09/06/2025</p>
                                    </div>
                                </div>
                                <p class="testimonial-text">
                                    Sau khi áp dụng một số điều chỉnh nhỏ theo gợi ý của chuyên gia, tôi cảm nhận được
                                    sự thay đổi tích cực rõ rệt trong năng lượng sống và công việc. Cảm ơn đội ngũ Phong
                                    Thủy Đại Cát rất nhiều!
                                </p>
                            </article>

                            <!-- Card 4 (Để slider có thể trượt) -->
                            <article class="testimonial-card">
                                <span class="card-deco-top"></span>
                                <span class="card-deco-bottom"></span>

                                <div class="card-header">
                                    <img src="https://i.imgur.com/3YQ5Yf1.png" alt="Avatar Khách hàng"
                                        class="avatar">
                                    <div class="author-info">
                                        <h3>Khách hàng mới</h3>
                                        <p>15/07/2025</p>
                                    </div>
                                </div>
                                <p class="testimonial-text">
                                    Đây là một phản hồi khác để slider có thể trượt qua khi có nhiều hơn 3 card.
                                </p>
                            </article>

                        </div>
                    </div>

                    <!-- Nút điều hướng phải -->
                    <button class="slider-btn" id="next-btn2">
                        <img src="{{ asset('assets/images/nexticon.svg') }}" alt="" class="img-fluid">
                    </button>
                </div>
            </div>
        </section>
