@extends('welcome')
@section('content')
    <section class="section  article-container dichvudetail-section">
        <div class="container">
            <div class="row g-4">
                <!-- Thẻ cha chứa toàn bộ khối -->
                <div class="article-layout">

                    <!-- 1. Hình ảnh được đặt trước -->
                    <img src="{{ asset($dichvu->images2 ?? 'assets/images/demo.svg') }}" alt="Mô tả hình ảnh"
                        class="article-image">

                    <!-- 2. Khối chứa văn bản -->
                    <div class="article-text">
                        <h1 class="titledetailtintuc">{{ $dichvu->title ?? '' }}</h1>
                        <span class="article-tag">{{ $dichvu->tag ?? '' }}</span>
                        <div>
                            <p>
                                {!! $dichvu->content ?? '' !!}
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Ví dụ với text ngắn hơn -->
                <div class="col-12">
                    <!-- ========== KHU VỰC CÂU HỎI THƯỜNG GẶP ========== -->
                    <div class="accordion-box-hoidap">
                        <!-- ===== BẮT ĐẦU PHẦN HTML ===== -->
                        <div class="accordion-container">
                            <h5 class="cauhoithuonggap-news">
                                Nội dung dịch vụ
                            </h5>
                            <div class="accordion-box">
                                @if ($dichvu->faqs->count())
                                    @foreach ($dichvu->faqs as $index => $faq)
                                        <div class="accordion-item {{ $index === 0 ? 'is-open' : '' }}">

                                            <button class="accordion-header">
                                                <span>{{ $faq->question }}</span>
                                                <span class="accordion-icon"></span>
                                            </button>
                                            <div class="accordion-content">

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
        </div>

    </section>
    @include('home.lienhe')
@endsection
