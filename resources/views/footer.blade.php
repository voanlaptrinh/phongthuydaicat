 <footer class="site-footer position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                      <div class="footer-logo">
                        <!-- Thay thế bằng ảnh logo của bạn -->
                        <img src="{{asset('assets/images/logofooter.svg')}}" alt="Logo">
                    </div>
                </div>
                <!-- Cột 1: Logo và Giới thiệu ngắn -->
                <div class="col-lg-4 col-md-12 footer-col">
                  
                    <p class="footer-about">
                        <b>Phong Thủy Đại Cát</b> là đơn vị cung cấp dịch vụ tư vấn Phong Thủy - Tử Vi tận tâm, uy tín, chuẩn chính phái nhất cho người Việt Nam. 
                       <br>
                        Mọi ý kiến đóng góp xin vui lòng liên hệ <a href="{{route('contact')}}">tại đây</a>!
                    </p>
                    <p class="footer-contact-info">SĐT: <a href="tel:0987654321" class="text-white">0987 654 321</a></p>
                    <p class="footer-contact-info">Địa chỉ: Số 9, Ngõ 11 Dịch Vọng Hậu, Cầu Giấy, Hà Nội</p>
                </div>

                <!-- Cột 2: Giới thiệu -->
                <div class="col-lg-2 col-md-4 col-6 footer-col">
                    <h5 class="footer-title">Giới thiệu</h5>
                    <ul class="footer-links">
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Sứ mệnh</a></li>
                        <li><a href="#">Cam kết</a></li>
                        <li><a href="#">Giá trị cốt lõi</a></li>
                        <li><a href="#">Quy trình</a></li>
                    </ul>
                </div>

                <!-- Cột 3: Trợ giúp -->
                <div class="col-lg-3 col-md-4 col-6 footer-col">
                     <h5 class="footer-title">Trợ giúp</h5>
                     <ul class="footer-links">
                        <li><a href="#">Trung tâm trợ giúp</a></li>
                        <li><a href="#">Hướng dẫn sử dụng</a></li>
                        <li><a href="#">Phản hồi</a></li>
                        <li><a href="#">KH nói về chúng tôi</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
                
                <!-- Cột 4: Kết nối -->
                <div class="col-lg-3 col-md-4 col-12 footer-col">
                     <h5 class="footer-title">Kết nối với chúng tôi</h5>
                     <div class="social-icons">
                        <a href="#" class="social-icon facebook" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon youtube" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="social-icon zalo" aria-label="Zalo">
                            <!-- SVG Zalo có thể nhúng trực tiếp hoặc dùng ảnh -->
                             <svg viewBox="0 0 24 24" fill="currentColor" height="1em" width="1em">
                                 <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm3.877 12.358c-1.185 0-2.37.01-3.556.01-.137 0-.273.013-.41.04-.33.064-.537.33-.537.668 0 .285.19.537.47.625.176.055.353.055.53.055h2.89c.19 0 .38.01.57.01.275 0 .55 0 .825.01 1.135 0 2.27-.01 3.405-.01.17 0 .34 0 .51.01.25.013.437-.16.485-.41.05-.285-.125-.537-.41-.598-.2-.042-.4-.042-.6-.042h-3.21zm-1.125-1.577c-.575-.013-1.15-.013-1.725-.013-1.225 0-2.45.01-3.675.01-.22 0-.44.013-.66.04-.26.04-.448.24-.495.5s.085.524.33.625c.19.08.38.08.57.08h5.68c.22 0 .44-.013.66-.04.26-.04.448-.24.495-.5s-.085-.524-.33-.625a.86.86 0 00-.57-.08h-.22zM7.42 8.783a.933.933 0 011.02-.915c.5.074.785.55.695 1.058-.09.508-.565.783-1.065.71a.933.933 0 01-.915-1.02.99.99 0 01.265-.833zm8.385.833c.09-.508-.195-1.01-.7-1.083a.933.933 0 00-1.05.915c.075.533.565.867 1.09.8a.933.933 0 00.915-1.02.99.99 0 00-.255-.612zM12 4.013c4.418 0 8 3.582 8 8s-3.582 8-8 8-8-3.582-8-8 3.582-8 8-8z"/>
                             </svg>
                        </a>
                     </div>
                </div>

            </div>
        </div>
        <img src="{{asset('assets/images/img-leftfooter.svg')}}" alt="" class="position-absolute bottom-0 start-0">
        <img src="{{asset('assets/images/img-right-footer.svg')}}" alt="" class="position-absolute bottom-0 end-0">
    </footer>