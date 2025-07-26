@extends('admin.index')
@section('contentadmin')
    <div class="pagetitle">
        <h1>Phong thủy</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Chi tiết Phong thủy</li>
            </ol>
        </nav>
    </div>
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ asset($phongthuy->images) }}" alt="Profile" class="">
                        <h2>{{ $phongthuy->title ?? '' }}</h2>
                        <p>{{ $phongthuy->description ?? '' }}</p>

                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview"
                                    aria-selected="true" role="tab">Nội dung</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit"
                                    aria-selected="false" tabindex="-1" role="tab">Câu hỏi thường gặp</button>
                            </li>


                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview contentbox1" id="profile-overview"
                                role="tabpanel">
                                {!! $phongthuy->content !!}

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">

                                @if ($phongthuy->faqs->count())
                                    <div class="accordion" id="accordionFaq">
                                        @foreach ($phongthuy->faqs as $index => $faq)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{ $index }}">
                                                    <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $index }}"
                                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                                        aria-controls="collapse{{ $index }}">
                                                        {{ $faq->question }}
                                                    </button>
                                                </h2>
                                                <div id="collapse{{ $index }}"
                                                    class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                                    aria-labelledby="heading{{ $index }}"
                                                    data-bs-parent="#accordionFaq">
                                                    <div class="accordion-body">
                                                        {!! nl2br(e($faq->answer)) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                            </div>


                        </div>



                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
