 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

         <li class="nav-item">
             <a class="nav-link {{ in_array(Request::route()->getName(), ['dashboard.index']) ? '' : 'collapsed' }}"
                 href="{{ route('dashboard.index') }}">
                 <i class="bi bi-speedometer2"></i>
                 <span>Dashboard</span>
             </a>
         </li><!-- End Dashboard Nav -->
         @if (auth()->user()->hasPermissionTo('Xem hồ sơ khách hàng quản lý') ||
                 auth()->user()->hasPermissionTo('Thêm hồ sơ khách hàng quản lý') ||
                 auth()->user()->hasPermissionTo('Sửa hồ sơ khách hàng quản lý') ||
                 auth()->user()->hasPermissionTo('Xóa hồ sơ khách hàng quản lý'))
             <li class="nav-item">
                 <a class="nav-link {{ in_array(Request::route()->getName(), ['khachhangquanly.admin.index', 'khachhangquanly.admin.create', 'khachhangquanly.admin.edit']) ? '' : 'collapsed' }}"
                     href="{{ route('khachhangquanly.admin.index') }}">
                     <i class="bi bi-people"></i>
                     <span>Khách hàng</span>
                 </a>
             </li>
         @endif

         @if (auth()->user()->hasPermissionTo('Xem liên hệ'))
             <li class="nav-item">
                 <a class="nav-link {{ in_array(Request::route()->getName(), ['contacts.admin.index']) ? '' : 'collapsed' }}"
                     href="{{ route('contacts.admin.index') }}">
                     <i class="bi bi-envelope"></i>
                     <span>Liên hệ</span>
                 </a>
             </li>
         @endif

         @if (auth()->user()->hasPermissionTo('Xem phản hồi') ||
                 auth()->user()->hasPermissionTo('Thêm phản hồi') ||
                 auth()->user()->hasPermissionTo('Sửa phản hồi') ||
                 auth()->user()->hasPermissionTo('Xóa phản hồi'))
             <li class="nav-item">
                 <a class="nav-link {{ in_array(Request::route()->getName(), ['phanhoi.admin.index', 'phanhoi.admin.create', 'phanhoi.admin.edit']) ? '' : 'collapsed' }}"
                     href="{{ route('phanhoi.admin.index') }}">
                     <i class="bi bi-chat-dots"></i>
                     <span>Phản hồi</span>
                 </a>
             </li>
         @endif

         @if (auth()->user()->hasPermissionTo('Xem hỏi đáp') ||
                 auth()->user()->hasPermissionTo('Thêm hỏi đáp') ||
                 auth()->user()->hasPermissionTo('Sửa hỏi đáp') ||
                 auth()->user()->hasPermissionTo('Xóa hỏi đáp'))
             <li class="nav-item">
                 <a class="nav-link {{ in_array(Request::route()->getName(), ['faqs.admin.index', 'faqs.admin.create', 'faqs.admin.edit']) ? '' : 'collapsed' }}"
                     href="{{ route('faqs.admin.index') }}">
                     <i class="bi bi-question-circle"></i>
                     <span>Hỏi đáp</span>
                 </a>
             </li>
         @endif
         @if (auth()->user()->hasPermissionTo('Xem tin tức') ||
                 auth()->user()->hasPermissionTo('Thêm tin tức') ||
                 auth()->user()->hasPermissionTo('Sửa tin tức') ||
                 auth()->user()->hasPermissionTo('Xóa tin tức'))
             <li class="nav-item">
                 <a class="nav-link {{ in_array(Request::route()->getName(), ['news.admin.index', 'news.admin.create', 'news.admin.edit', 'news.admin.detail', 'admin.news.faqs.index', 'admin.news.faqs.create', 'admin.news.faqs.edit']) ? '' : 'collapsed' }}"
                     href="{{ route('news.admin.index') }}">
                     <i class="bi bi-newspaper"></i>
                     <span>Tin tức</span>
                 </a>
             </li>
         @endif

         @if (auth()->user()->hasPermissionTo('Xem kiến thức phong thủy') ||
                 auth()->user()->hasPermissionTo('Thêm kiến thức phong thủy') ||
                 auth()->user()->hasPermissionTo('Sửa kiến thức phong thủy') ||
                 auth()->user()->hasPermissionTo('Xóa kiến thức phong thủy'))
             <li class="nav-item">
                 <a class="nav-link {{ in_array(Request::route()->getName(), ['phongthuy.admin.index', 'phongthuy.admin.create', 'phongthuy.admin.edit', 'phongthuy.admin.detail', 'admin.phongthuy.faqs.index', 'admin.phongthuy.faqs.create', 'admin.phongthuy.faqs.edit']) ? '' : 'collapsed' }}"
                     href="{{ route('phongthuy.admin.index') }}">
                     <i class="bi bi-compass"></i>
                     <span>Kiến thức phong thủy</span>
                 </a>
             </li>
         @endif
         @if (auth()->user()->hasPermissionTo('Xem kiến thức dịch vụ') ||
                 auth()->user()->hasPermissionTo('Thêm kiến thức dịch vụ') ||
                 auth()->user()->hasPermissionTo('Sửa kiến thức dịch vụ') ||
                 auth()->user()->hasPermissionTo('Xóa kiến thức dịch vụ'))
             <li class="nav-item">
                 <a class="nav-link {{ in_array(Request::route()->getName(), ['dichvu.admin.index', 'dichvu.admin.create', 'dichvu.admin.edit', 'admin.dichvu.faqs.index', 'admin.dichvu.faqs.create', 'admin.dichvu.faqs.edit']) ? '' : 'collapsed' }}"
                     href="{{ route('dichvu.admin.index') }}">
                     <i class="bi bi-briefcase"></i>
                     <span>Dịch vụ</span>
                 </a>
             </li>
         @endif
         @if (auth()->user()->hasPermissionTo('Xem lịch tư vấn của khách hàng') ||
                 auth()->user()->hasPermissionTo('Sửa trạng thái lịch tư vấn khách hàng'))
             <li class="nav-item">
                 <a class="nav-link {{ in_array(Request::route()->getName(), ['lichtuvan.admin.index', 'lichtuvan.admin.updateStatus']) ? '' : 'collapsed' }}"
                     href="{{ route('lichtuvan.admin.index') }}">
                     <i class="bi 	bi-calendar-check"></i>
                     <span>Lịch tư vấn</span>
                 </a>
             </li>
         @endif
         @if (auth()->user()->hasPermissionTo('Xem vai trò') ||
                 auth()->user()->hasPermissionTo('Thêm vai trò') ||
                 auth()->user()->hasPermissionTo('Sửa vai trò') ||
                 auth()->user()->hasPermissionTo('Xóa vai trò'))
             <li class="nav-item">
                 <a class="nav-link {{ in_array(Request::route()->getName(), ['admin.roles.index', 'admin.roles.create', 'admin.roles.edit']) ? '' : 'collapsed' }}"
                     href="{{ route('admin.roles.index') }}">
                     <i class="bi bi-shield-lock"></i>
                     <span>Vai trò</span>
                 </a>
             </li>
         @endif
         @if (auth()->user()->hasPermissionTo('Xem người dùng') ||
                 auth()->user()->hasPermissionTo('Thêm người dùng') ||
                 auth()->user()->hasPermissionTo('Sửa người dùng') ||
                 auth()->user()->hasPermissionTo('Xóa người dùng'))
             <li class="nav-item">
                 <a class="nav-link {{ in_array(Request::route()->getName(), ['admin.users.index', 'admin.users.create', 'admin.users.edit']) ? '' : 'collapsed' }}"
                     href="{{ route('admin.users.index') }}">
                     <i class="bi bi-person-circle"></i>
                     <span>Khách hàng</span>
                 </a>
             </li>
         @endif

     </ul>

 </aside>
