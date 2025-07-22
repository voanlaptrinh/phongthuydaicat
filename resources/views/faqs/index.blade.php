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

                                <!-- Item 1 - Mặc định mở -->
                                <div class="accordion-item is-open">
                                    <button class="accordion-header">
                                        <span>Tôi nên xem phong thủy vào thời điểm nào là tốt nhất?</span>
                                        <span class="accordion-icon"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <!-- THÊM WRAPPER NÀY -->
                                        <div class="accordion-body-wrapper">
                                            <div class="accordion-body-box">
                                                Bạn nên xem phong thủy vào các thời điểm quan trọng trong cuộc sống, khi
                                                chuẩn bị thực hiện một việc lớn có ảnh hưởng đến vận mệnh, tài lộc, sức khỏe
                                                hoặc hạnh phúc gia đình. Xác định hướng nhà, vị trí đất, bố cục phòng ốc,
                                                bếp, nhà vệ sinh...
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Item 2 -->
                                <!-- Item 2 (Đã sửa) -->
                                <div class="accordion-item">
                                    <button class="accordion-header">
                                        <span>Tôi có thể xem phong thủy nhà ở online được không?</span>
                                        <span class="accordion-icon"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <!-- SỬA DÒNG NÀY: từ "-box-wrapper" thành "accordion-body-wrapper" -->
                                        <div class="accordion-body-wrapper">
                                            <div class="accordion-body-box">
                                                Có, bạn hoàn toàn có thể xem phong thủy online. Với công nghệ hiện đại,
                                                chuyên gia có thể phân tích thông qua bản vẽ, hình ảnh, video và các công cụ
                                                đo đạc từ xa để đưa ra những luận giải chính xác.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Item 3 (Ví dụ, cũng cần có wrapper đúng) -->
                                <div class="accordion-item">
                                    <button class="accordion-header">
                                        <span>Xem tuổi vợ chồng, sinh con hợp tuổi có thực sự cần thiết không?</span>
                                        <span class="accordion-icon"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <!-- Đảm bảo wrapper này cũng đúng tên -->
                                        <div class="accordion-body-wrapper">
                                            <div class="accordion-body-box">
                                                Việc này mang tính tham khảo và hỗ trợ nhiều hơn là quyết định...
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Thêm các item khác nếu cần -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <div class="box-cah-hoi-dap ">
        <img src="{{asset('assets/images/trangtrihoidapright.svg')}}" alt="trangtrihoidapright" class="trangtrihoidapright">
        <img src="{{asset('assets/images/trangtrihoidapleft.svg')}}" alt="trangtrihoidapleft" class="trangtrihoidapleft">
        <img src="{{asset('assets/images/trangtri2thanh1.svg')}}" alt="trangtri2thanh1" class="trangtri2thanh1">
        <img src="{{asset('assets/images/trangtri2thanh2.svg')}}" alt="trangtri2thanh2" class="trangtri2thanh2">
        <img src="{{asset('assets/images/trangtri2hoidap.svg')}}" alt="trangtri2hoidap" class="trangtri2hoidap">
    </div>
    @include('home.lienhe')
    <script>
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
    </script>
@endsection
