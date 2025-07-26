@extends('welcome')
@section('content')
    <section class="section hoi-dap position-relative">
        <div class="decorative-line about-decorative-line"></div>

        <div class="container z-1">
            <div class="section-title-hoi-dap  position-relative d-flex justify-content-center align-items-end">
                <div class="position-absolute   baivietnoibat-1-image" style="">
                    <img src="/assets/images/img_about2.svg" alt="upleft-image" class="img-fluid z-1">
                </div>
                <h2>Bài viết nổi bật</h2>
                <div class="position-absolute   baivietnoibat-2-image" style="">
                    <img src="/assets/images/img_about1.svg" alt="upleft-image" class="img-fluid z-1">
                </div>
            </div>
            <div class="row box-content-hoi-dap g-3 mt-3">
                @foreach ($news as $itemnews)
                     <div class="col-lg-4 col-sm-6">
                    <div class="box-news">
                        <img src="{{ asset('assets/images/top-news-box.svg') }}" alt="top-news-box" class="top-news-box">
                        <img src="{{ asset('assets/images/bottom-news-box.svg') }}" alt="bottom-news-box"
                            class="bottom-news-box">
                        <div class="p-4">
                            <div class="news-images">
                                <img src="{{ asset($itemnews->images ?? 'assets/images/news-images.svg') }}" alt=""
                                    class="img-fluid img-news-fluid">
                            </div>
                            <div class="box-title-noibat">
                                <h5 class="title-noibat">
                                   {{$itemnews->title ?? ''}}
                                </h5>
                            </div>
                            <div class="box-des-noibat">
                                <p class="des-noibat">
                                      {{$itemnews->description ?? ''}}
                                </p>
                            </div>
                            <div class="box-xemthem">
                                    <a href="{{route('newsdetail', $itemnews->id)}}" class="a-xemthem">
                                    Xem thêm
                                    </a>
                                <div class="img-xemthem">
                                    <img src="{{ asset('assets/images/Icons.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
               
          
            </div>
            <div class="col-12 text-center mb-5">
                <div class="btn-hover-default ">
                    <a href="{{route('newslist')}}" class="">Xem tất cả</a>
                </div>
            </div>
    </section>




    <section class="experts-section section">
        <div class="container">
            <div class="gthiu-main-heading-wrapper">
                <div class="heading-decorator"></div>
                <div class="bx-gthiu">
                    <h2 class="section-title-main-heading">Giới thiệu thầy và chuyên gia</h2>
                    <img src="/assets/images/icontitlecamketleft.svg" alt="Họa tiết trang trí"
                        class="gthiu-icontitle-camketleft">
                    <img src="/assets/images/icontitlecamketright.svg" alt="Họa tiết trang trí"
                        class="gthiu-icontitle-camketright">
                </div>


            </div>
        </div>


        <div class="container mt-5">
            <div class="row g-3">
                <div class="col-lg-4 col-sm-6 position-relative">
                    <div class="box-gthieuthay-chuyengia">
                        <div class="box-trong-chuyengia"
                            style="background-image: url('/assets/images/thay_khung_trong.svg');">
                            <div class="photo-area">
                                <div class="photo-bg-details"></div>
                                <div class="person-image"></div>
                            </div>

                        </div>
                        <div class="contentcontent d-flex flex-column align-items-center justify-content-center">
                            <div class="glowing-tag">
                                Chuyên gia phong thủy cổ truyền
                            </div>
                            <div class="gradient-text-thaytintuc">
                                Thầy Trần Đình Long
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 position-relative">
                    <div class="box-gthieuthay-chuyengia">
                        <div class="box-trong-chuyengia">
                            <div class="photo-area">
                                <div class="photo-bg-details"></div>
                                <div class="person-image"></div>
                            </div>

                        </div>
                        <div class="contentcontent d-flex flex-column align-items-center justify-content-center">
                            <div class="glowing-tag">
                                Chuyên gia phong thủy cổ truyền
                            </div>
                            <div class="gradient-text-thaytintuc">
                                Thầy Trần Đình Long
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 position-relative">
                    <div class="box-gthieuthay-chuyengia">
                        <div class="box-trong-chuyengia">
                            <div class="photo-area">
                                <div class="photo-bg-details"></div>
                                <div class="person-image"></div>
                            </div>

                        </div>
                        <div class="contentcontent d-flex flex-column align-items-center justify-content-center">
                            <div class="glowing-tag">
                                Chuyên gia phong thủy cổ truyền
                            </div>
                            <div class="gradient-text-thaytintuc">
                                Thầy Trần Đình Long
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </section>
    <section class="section kienthucphongthuy">
           <div class="position-absolute   caydao-upleft-image">
            <img src="/assets/images/cay_dao.svg" alt="upleft-image" class="img-fluid">
        </div>
        <div class="decorative-line about-decorative-line"></div>

        <div class="container z-1">
            <div class="section-title-phongthuy position-relative d-flex justify-content-center align-items-end">
                <div class="position-absolute   baivietnoibat-1-image" style="">
                    <img src="/assets/images/img_about2.svg" alt="upleft-image" class="img-fluid z-1">
                </div>
                <h2 class="titlekienthucphongthuy">Kiến thức phong thủy</h2>
                <div class="position-absolute   baivietnoibat-2-image" style="">
                    <img src="/assets/images/img_about1.svg" alt="upleft-image" class="img-fluid z-1">
                </div>
            </div>

            <div class="boxkienthucphongthuy">
                <div class="feng-shui-section">
                    <div class="row">

                        <!-- ========== CỘT BÊN TRÁI - BÀI VIẾT CHÍNH ========== -->
                        <div class="col-lg-7">
                            <article class="main-article">
                                <img src="{{asset('assets/images/kienthucphongthuy1.svg')}}" alt="Phòng ngủ được thiết kế theo phong thủy"
                                    class="article-image mb-2">
                                <div class="article-content">
                                    <span class="article-tag">Phong thủy nhà ở</span>
                                    <h3 class="title-kienthuc title-kienthuch3">Ứng dụng vào bố trí không gian sống để tăng cát khí, hóa giải sát khí.</h3>
                                    <hr>
                                    <a href="#" class="read-more-link mt-2">
                                        Xem thêm
                                        <span class="arrow-icon"><img src="{{asset('/assets/images/nexticon.svg')}}" alt="" class="img-fluid"></span>
                                    </a>
                                </div>
                            </article>
                        </div>

                        <!-- ========== CỘT BÊN PHẢI - CÁC BÀI VIẾT PHỤ ========== -->
                        <div class="col-lg-5">
                            <div class="side-articles">

                                <!-- Bài viết phụ 1 -->
                                <article class="side-article">
                                    <img src="{{asset('assets/images/kienthucphongthuy1.svg')}}" alt="Trà và nến" class="article-thumb">
                                    <div class="article-content">
                                        <span class="article-tag">Phong thủy cá nhân</span>
                                        <h4 class="title-kienthuc title-kienthuch4">Chọn màu sắc, trang phục, vật phẩm theo mệnh</h4>
                                        <hr>
                                        <a href="#" class="read-more-link">
                                            Xem thêm
                                            <span class="arrow-icon"><img src="{{asset('/assets/images/nexticon.svg')}}" alt="" class="img-fluid"></span>
                                        </a>
                                    </div>
                                </article>

                                <!-- Bài viết phụ 2 -->
                                <article class="side-article">
                                    <img src="{{asset('assets/images/kienthucphongthuy1.svg')}}" alt="Bonsai và thư pháp"
                                        class="article-thumb">
                                    <div class="article-content">
                                        <span class="article-tag">Phong thủy doanh nghiệp</span>
                                        <h4 class="title-kienthuc title-kienthuch4">Tối ưu không gian làm việc, tăng vận khí kinh doanh.</h4>
                                        <hr>
                                        <a href="#" class="read-more-link">
                                            Xem thêm
                                            <span class="arrow-icon"><img src="{{asset('/assets/images/nexticon.svg')}}" alt="" class="img-fluid"></span>
                                        </a>
                                    </div>
                                </article>

                                <!-- Bài viết phụ 3 -->
                                <article class="side-article">
                                    <img src="{{asset('assets/images/kienthucphongthuy1.svg')}}" alt="Vật phẩm phong thủy"
                                        class="article-thumb">
                                    <div class="article-content">
                                        <span class="article-tag">Tử vi & Vận hạn</span>
                                        <h4 class="title-kienthuc title-kienthuch4">Ứng dụng vào bố trí không gian sống để tăng cát khí, hóa giải sát khí.</h4>
                                        <hr>
                                        <a href="#" class="read-more-link">
                                            Xem thêm
                                            <span class="arrow-icon"><img src="{{asset('/assets/images/nexticon.svg')}}" alt="" class="img-fluid"></span>
                                        </a>
                                    </div>
                                </article>

                            </div>
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
@endsection
