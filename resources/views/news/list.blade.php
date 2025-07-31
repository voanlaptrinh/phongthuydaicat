@extends('welcome')
@section('content')
    <section class="section hoi-dap position-relative">
        <div class="decorative-line about-decorative-line"></div>

        <div class="container z-1">
            <div class="section-title-hoi-dap  position-relative d-flex justify-content-center align-items-end">
                <div class="position-absolute   baivietnoibat-1-image" style="">
                    <img src="/assets/images/img_about2.svg" alt="upleft-image" class="img-fluid z-1">
                </div>
                <h2>Danh sách Bài viết</h2>
                <div class="position-absolute   baivietnoibat-2-image" style="">
                    <img src="/assets/images/img_about1.svg" alt="upleft-image" class="img-fluid z-1">
                </div>
            </div>
            <div class="row box-content-hoi-dap g-3 mt-3">
                @forelse ($news as $item)
                    <div class="col-lg-4 col-sm-6">
                        <div class="box-news">
                            <img src="{{ asset('/assets/images/top-news-box.svg') }}" alt="top-news-box"
                                class="top-news-box">
                            <img src="{{ asset('/assets/images/bottom-news-box.svg') }}" alt="bottom-news-box"
                                class="bottom-news-box">
                            <div class="p-4">
                                <div class="news-images">
                                    <img src="{{ asset($item->images ?? '/assets/images/news-images.svg') }}" alt=""
                                        class="img-fluid img-news-fluid">
                                </div>
                                <div class="box-title-noibat">
                                    <h5 class="title-noibat">
                                        {{ $item->title ?? '' }}
                                    </h5>
                                </div>
                                <div class="box-des-noibat">
                                    <p class="des-noibat">
                                        {{ $item->description ?? '' }}
                                    </p>
                                </div>
                                <div class="box-xemthem">
                                    <a href="{{ route('newsdetail', $item->id) }}" class="a-xemthem">
                                        Xem thêm
                                    </a>
                                    <div class="img-xemthem">
                                        <img src="{{ asset('/assets/images/Icons.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-secondary text-center">
                        Không có bài viết phụ nào để hiển thị.
                    </div>
                @endforelse


            </div>
            <style>
                
            </style>
            <div class=" p-nav text-end d-flex justify-content-end mt-3">
                {{ $news->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
@endsection
