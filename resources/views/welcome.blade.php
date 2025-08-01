<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phong thủy đại cát</title>
    <!-- Font Awesome cho icons -->
    <!-- Link CSS của bạn -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css?v=1.1') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/repont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- 1. CSS của Slick -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/source/image/icon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/source/image/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/source/image/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="144x144"
        href="{{ asset('/source/image/android-chrome-144x144.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('/source/image/android-chrome-192x192.png') }}">

    <link rel="apple-touch-icon" sizes="114x114"
        href="{{ asset('/source/image/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120"
        href="{{ asset('/source/image/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144"
        href="{{ asset('/source/image/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152"
        href="{{ asset('/source/image/apple-touch-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/source/image/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/source/image/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/source/image/apple-touch-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/source/image/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/source/image/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-startup-image" href="{{ asset('/source/image/apple-touch-icon-180x180.png') }}" />



    <meta property="og:type" content="website">
    {{-- <meta property="og:title" content="{{ $controller->metaTile }}">
    <meta property="og:description" content="{{ $controller->metaDescription }}"> --}}
    <meta property="og:image" content="{{ asset('/source/image/512x512.png') }}">
    <meta property="og:locale" content="{{ app()->getLocale() }}">

</head>


<body>


    @include('header')
    <!-- Bỏ thẻ <section> cũ đi và thay bằng khối này -->
    <div class="scroll-container" id="header-placeholder">
        @yield('content')
    </div>
    {{-- <div id="toast-container">
        <div class="toast-show" style="background-color: rgb(40, 167, 69);">Gửi liên hệ thành công!</div>
    </div> --}}
    <div id="toast-container">
        {{-- 
        <div class="toast-show toast-success">
            <div class="icon-toast">
                <i class="fas fa-check"></i>
            </div>
            <span class="toast-message">Gửi liên hệ thành công!</span>  
        </div> --}}
    </div>
    @include('footer')





    <!-- Cấu trúc HTML đã được cập nhật -->
    <div class="position-fixed bottom-0 end-0 d-flex align-items-center gap-3 p-3" style="z-index: 999">
           <!-- Thêm class 'arrow-box' vào đây -->
    <div class="schedule-text arrow-box shadow px-3 py-2 text-white">
        {{-- <strong id="typing-text"></strong> --}}
        <strong>Liên hệ tư vấn</strong>
    </div>

        <!-- Nút bấm giờ đây là KHUNG BỌC -->
        <button class="schedule-button gradient-button-wrapper js-open-schedule-popup">
            <!-- SPAN bên trong là MẶT NÚT BẤM -->
            <span class="button-content">
                <img src="{{ asset('assets/images/phone-account.svg') }}" alt="Lịch tư vấn" class="button-icon">
            </span>
        </button>
    </div>


    @include('partials.schedule-popup')



    <script src="{{ asset('assets/js/style.js?v=1.0') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

</body>

</html>
