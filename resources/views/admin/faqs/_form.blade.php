<div class="row g-2">
    <div class="row">

        <div class="col-lg-12">
            <div class="row g-3">
                <div class="col-lg-12">
                    <label for="question" class="form-label">Tiêu đề</label>
                    <input type="text" class="form-control" name="question"
                        value="{{ old('question', $faq->question ?? '') }}">
                    @error('question')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-12">
                    <label for="answer" class="form-label">Mô tả</label>
                    <textarea class="form-control" name="answer">{{ old('answer', $faq->answer ?? '') }}</textarea>
                    @error('answer')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>
    </div>
</div>
<div class="text-end mt-4">
    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{{ route('faqs.admin.index') }}" class="btn btn-secondary">Quay lại</a>
</div>