@extends('welcome')
@section('content')
    <section class="section container article-container">
        <div class="row g-4">
            <!-- ========== CỘT BÊN TRÁI - NỘI DUNG CHÍNH ========== -->
            <div class="col-lg-8">
                <article class="article-content">
                    <h1 class="titledetailtintuc">{{ $news->title ?? '' }}</h1>
                    <span class="article-tag">{{ $news->tag ?? '' }}</span>

                    <div class="contet-detail-tintuwc">
                        {!! $news->content ?? '' !!}
                </article>

                <!-- ========== KHU VỰC CÂU HỎI THƯỜNG GẶP ========== -->
                <div class="accordion-box-hoidap">
                    <!-- ===== BẮT ĐẦU PHẦN HTML ===== -->
                    <div class="accordion-container">
                        <h5 class="cauhoithuonggap-news">
                            Câu hỏi thường gặp
                        </h5>
                        <div class="accordion-box">

                            @if ($news->faqs->count())
                                @foreach ($news->faqs as $index => $faq)
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
                            @else
                                <div class="alert alert-secondary text-center">
                                    Không có câu hỏi.
                                </div>
                            @endif
                            <!-- Item 1 - Mặc định mở -->



                        </div>
                    </div>
                </div>
            </div>

            <!-- ========== CỘT BÊN PHẢI - SIDEBAR & FORM ========== -->
            <div class="col-lg-4">
                <aside class="sidebar-datlich">
                    {{-- <div class="form-widget">
                        <div class="form-widget-header">
                           <span> LIÊN HỆ ĐẶT LỊCH TƯ VẤN</span>
                        </div>
                        <div class="form-widget-body">
                            <form>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Số điện thoại">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Họ và tên">
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="mb-4">
                                    <textarea class="form-control" rows="4" placeholder="Nội dung cần hỏi"></textarea>
                                </div>
                               <div class="col-12 text-center">
                                       <div class="btn-hover-default ">
                            <a href="#" class="">Đặt lịch</a>
                        </div>
                                    </div>
                            </form>
                        </div>
                    </div> --}}
                    <div class="form-widget">
                        <div class="form-widget-header">
                            <span>LIÊN HỆ ĐẶT LỊCH TƯ VẤN</span>
                        </div>
                        <div class="form-widget-body">
                             @csrf
          
                            <form id="schedule-form-widget" class="schedule-form-js" action="{{ route('schedule.store') }}"
                                method="POST">
                                @csrf

                                <!-- Div để hiển thị thông báo chung -->
                                <div class="form-message-js mb-3" style="display: none;"></div>

                                <div class="mb-3">
                                    <!-- Thêm name="phone" -->
                                    <input type="tel" name="phone" class="form-control" placeholder="Số điện thoại">
                                    <!-- Thêm div hiển thị lỗi -->
                                    <div class="error-text" data-field-error="phone"></div>
                                </div>
                                <div class="mb-3">
                                    <!-- Thêm name="fullname" -->
                                    <input type="text" name="fullname" class="form-control" placeholder="Họ và tên">
                                    <div class="error-text" data-field-error="fullname"></div>
                                </div>
                                <div class="mb-3">
                                    <!-- Thêm name="email" -->
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                    <div class="error-text" data-field-error="email"></div>
                                </div>
                                <div class="mb-4">
                                    <!-- Thêm name="message" -->
                                    <textarea name="message" class="form-control" rows="4" placeholder="Nội dung cần hỏi"></textarea>
                                    <div class="error-text" data-field-error="message"></div>
                                </div>
                                <div class="col-12 text-center">
                                    <div class="btn-hover-default">
                                    
                                        <button type="submit" class="btn submit-button-js">Đặt lịch</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
