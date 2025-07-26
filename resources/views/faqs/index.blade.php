@extends('welcome')
@section('content')
    <section class="section hoi-dap position-relative">
        <div class="decorative-line about-decorative-line"></div>
        <div class="position-absolute   caydao-upleft-image">
            <img src="/assets/images/cay_dao.svg" alt="upleft-image" class="img-fluid">
        </div>

        <div class="container z-1">
            <div class="section-title-hoi-dap  position-relative d-flex justify-content-center align-items-end">
                <div class="position-absolute   hoi-dap-1-image" style="">
                    <img src="/assets/images/img_about2.svg" alt="upleft-image" class="img-fluid z-1">
                </div>
                <h2>Hỏi đáp</h2>
                <div class="position-absolute   hoi-dap-2-image" style="">
                    <img src="/assets/images/img_about1.svg" alt="upleft-image" class="img-fluid z-1">
                </div>
            </div>
            <div class="row box-content-hoi-dap g-4">
                <div class="col-lg-4 image-column-hoidap">


                    {{-- Thay thế bằng ảnh thật của bạn, không phải SVG trang trí --}}
                    <img src="{{ asset('assets/images/hoidap1.svg') }}" alt="Trầm hương phong thủy"
                        class="img-fluid rounded shadow-sm img-hoidap1">
                    <img src="{{ asset('assets/images/hoidap2.svg') }}" alt="Vật phẩm phong thủy để bàn"
                        class="img-fluid rounded shadow-sm img-hoidap2">

                </div>
                <div class="col-lg-8">
                    <div class="accordion-box-hoidap">
                        <!-- ===== BẮT ĐẦU PHẦN HTML ===== -->
                        <div class="accordion-container">
                            <div class="accordion-box">     
                                @if ($faqs->count())
                                    @foreach ($faqs as $index => $faq)
                                        <!-- Item 1 - Mặc định mở -->
                                       <div class="accordion-item {{ $index === 0 ? 'is-open' : '' }}">

                                            <button class="accordion-header">
                                                <span>{{ $faq->question }}</span>
                                                <span class="accordion-icon"></span>
                                            </button>
                                            <div class="accordion-content">
                                                <!-- THÊM WRAPPER NÀY -->
                                                <div class="accordion-body-wrapper">
                                                    <div class="accordion-body-box">
                                                        {!! $faq->answer !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <div class="box-cah-hoi-dap ">
        <img src="{{ asset('assets/images/trangtrihoidapright.svg') }}" alt="trangtrihoidapright"
            class="trangtrihoidapright">
        <img src="{{ asset('assets/images/trangtrihoidapleft.svg') }}" alt="trangtrihoidapleft" class="trangtrihoidapleft">
        <img src="{{ asset('assets/images/trangtri2thanh1.svg') }}" alt="trangtri2thanh1" class="trangtri2thanh1">
        <img src="{{ asset('assets/images/trangtri2thanh2.svg') }}" alt="trangtri2thanh2" class="trangtri2thanh2">
        <img src="{{ asset('assets/images/trangtri2hoidap.svg') }}" alt="trangtri2hoidap" class="trangtri2hoidap">
    </div>
    @include('home.lienhe')
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script> --}}
@endsection
