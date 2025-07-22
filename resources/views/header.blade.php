 <header class="site-header fbs__net-navbar">
     <div class="container d-flex align-items-center justify-content-between">
         <div class="site-logo d-flex align-items-center">
             <a href="#">
                 <img src="{{ asset('assets/images/logo.svg') }}" alt="Logo Phong Thủy Đại Cát" class="img-fluid img-logo">
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
                 <li><a href="{{route('faqs')}}">Hỏi đáp</a></li>
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
 <!-- Menu cho Mobile (ẩn mặc định) -->
 <div class="mobile-navigation" id="mobile-navigation">

     <!-- 1. Header của Menu Mobile -->
     <div class="mobile-nav-header">
         <a href="#" class="mobile-nav-logo">
             <!-- Thay bằng logo của bạn -->
             <img src="{{ asset('assets/images/logomobie.svg') }}" alt="Logo">
             <span class="gradient-text">Phong Thủy Đại Cát</span>
         </a>
         <button class="mobile-nav-close" id="mobile-nav-close" aria-label="Đóng menu">
             <i class="fas fa-times"></i>
         </button>
     </div>

     <!-- 2. Phần thân Menu (các link chính) -->
     <nav class="mobile-nav-main">
         <ul>
             <li><a href="#" class="active">Giới thiệu</a></li>
             <li><a href="#">Dịch vụ</a></li>
             <li><a href="#">Tin tức</a></li>
             <li><a href="#">Liên hệ</a></li>
             <li><a href="#">Hỏi đáp</a></li>
         </ul>
     </nav>

     <!-- 3. Footer của Menu Mobile -->
     <div class="mobile-nav-footer">
         <a href="#" class="mobile-nav-button btn-movbie1 ">
             <i class="fas fa-headset"></i> Hỗ trợ
         </a>
         <a href="#" class="mobile-nav-button btn-movbie2">
             <i class="fas fa-home"></i> Về Trang chủ
         </a>
     </div>

 </div>

 <!-- Lớp phủ nền (ẩn mặc định) -->
 <div class="menu-overlay" id="menu-overlay"></div>
