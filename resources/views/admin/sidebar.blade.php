 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

         <li class="nav-item">
             <a class="nav-link collapsed">
                 <i class="bi bi-grid"></i>
                 <span>Dashboard</span>
             </a>
         </li><!-- End Dashboard Nav -->
         <li class="nav-item">
             <a class="nav-link {{ in_array(Request::route()->getName(), ['khachhangquanly.admin.index', 'khachhangquanly.admin.create', 'khachhangquanly.admin.edit']) ? '' : 'collapsed' }}"
                 href="{{ route('khachhangquanly.admin.index') }}">
                 <i class="bi bi-person-lines-fill"></i>
                 <span>Khách hàng</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link {{ in_array(Request::route()->getName(), ['contacts.admin.index']) ? '' : 'collapsed' }}"
                 href="{{ route('contacts.admin.index') }}">
                 <i class="bi bi-person-lines-fill"></i>
                 <span>Liên hệ</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link {{ in_array(Request::route()->getName(), ['phanhoi.admin.index', 'phanhoi.admin.create', 'phanhoi.admin.edit']) ? '' : 'collapsed' }}"
                 href="{{ route('phanhoi.admin.index') }}">
                 <i class="bi bi-person-lines-fill"></i>
                 <span>Phản hồi</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link {{ in_array(Request::route()->getName(), ['faqs.admin.index', 'faqs.admin.create', 'faqs.admin.edit']) ? '' : 'collapsed' }}"
                 href="{{ route('faqs.admin.index') }}">
                 <i class="bi bi-person-lines-fill"></i>
                 <span>Hỏi đáp</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link {{ in_array(Request::route()->getName(), ['news.admin.index', 'news.admin.create', 'news.admin.edit', 'admin.news.faqs.index', 'admin.news.faqs.create', 'admin.news.faqs.edit']) ? '' : 'collapsed' }}"
                 href="{{ route('news.admin.index') }}">
                 <i class="bi bi-person-lines-fill"></i>
                 <span>Tin tức</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link {{ in_array(Request::route()->getName(), ['phongthuy.admin.index', 'phongthuy.admin.create', 'phongthuy.admin.edit', 'admin.phongthuy.faqs.index', 'admin.phongthuy.faqs.create', 'admin.phongthuy.faqs.edit']) ? '' : 'collapsed' }}"
                 href="{{ route('phongthuy.admin.index') }}">
                 <i class="bi bi-person-lines-fill"></i>
                 <span>Kiến thức phong thủy</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link {{ in_array(Request::route()->getName(), ['dichvu.admin.index', 'dichvu.admin.create', 'dichvu.admin.edit', 'admin.dichvu.faqs.index', 'admin.dichvu.faqs.create', 'admin.dichvu.faqs.edit']) ? '' : 'collapsed' }}"
                 href="{{ route('dichvu.admin.index') }}">
                 <i class="bi bi-person-lines-fill"></i>
                 <span>Dịch vụ</span>
             </a>
         </li>


     </ul>

 </aside>
