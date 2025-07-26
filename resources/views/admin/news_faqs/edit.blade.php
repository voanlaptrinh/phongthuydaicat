@extends('admin.index')
@section('contentadmin')
    <div class="pagetitle">
        <h1>Phản hồi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Sửa Phản hồi</li>
            </ol>
        </nav>
    </div>


    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="col-12 d-sm-flex justify-content-between align-items-center">
                        <h5 class="card-title">Sửa Phản hồi</h5>

                    </div>
                    <form action="{{ route('admin.news.faqs.update', [$news->id, $faq->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="question" class="form-label">Câu hỏi</label>
                            <input type="text" class="form-control" name="question"
                                value="{{ old('question', $faq->question) }}" required>
                            @error('question')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="answer" class="form-label">Câu trả lời</label>
                            <textarea class="form-control" name="answer" rows="5" required>{{ old('answer', $faq->answer) }}</textarea>
                            @error('answer')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" name="active" class="form-check-input" id="active"
                                {{ $faq->active ? 'checked' : '' }}>
                            <label class="form-check-label" for="active">Hiển thị</label>
                        </div>

<div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <a href="{{ route('admin.news.faqs.index', $news->id) }}" class="btn btn-secondary">Quay lại</a>
</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
