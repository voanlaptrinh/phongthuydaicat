<div class="row g-2">
    <div class="row">
        <div class="col-lg-2">
            <div class="d-flex flex-column align-items-center">
                <label for="images" class="form-label">Ảnh đại diện</label>

                <label class="image-upload-wrapper" for="images">
                    @if (!empty($dichvu->images))
                        <img id="preview-image" src="{{ asset($dichvu->images) }}" alt="Preview">
                    @else
                        <img id="preview-image" src="#" alt="Preview" style="display: none;">
                        <span class="plus-icon" id="plus-icon">+</span>
                    @endif
                </label>

                <input type="file" name="images" id="images" accept="image/*">
            </div>
            @error('images')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="d-flex flex-column align-items-center mb-3">
                <label for="images2" class="form-label">Ảnh phụ</label>

                <label class="image-upload-wrapper" for="images2">
                    @if (!empty($dichvu->images2))
                        <img id="preview-image-2" src="{{ asset($dichvu->images2) }}" alt="Preview">
                    @else
                        <img id="preview-image-2" src="#" alt="Preview" style="display: none;">
                        <span class="plus-icon" id="plus-icon-2">+</span>
                    @endif
                </label>

                <input type="file" name="images2" id="images2" accept="image/*">
                @error('images2')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <div class="col-lg-10">
            <div class="row g-3">
                <div class="col-lg-12">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input type="text" class="form-control" name="title"
                        value="{{ old('title', $dichvu->title ?? '') }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-12">
                    <label for="tag" class="form-label">Tag</label>
                    <input type="text" class="form-control" name="tag"
                        value="{{ old('tag', $dichvu->tag ?? '') }}">
                    @error('tag')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-12">
                    <label for="description" class="form-label">Mô tả ngắn</label>
                    <textarea class="form-control" name="description">{{ old('description', $dichvu->description ?? '') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>
        <div class="col-lg-12">
            <label for="title" class="form-label">Nội dung</label>
            <textarea class="form-control" name="content" id="tyni">{{ old('content', $dichvu->content ?? '') }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
















<div class="text-end mt-4">
    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{{ route('news.admin.index') }}" class="btn btn-secondary">Quay lại</a>
</div>
<style>
    .image-upload-wrapper {
        width: 120px;
        height: 120px;
        border: 2px dashed #ccc;
        border-radius: 8px;
        cursor: pointer;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background-color: #f8f9fa;
    }

    .image-upload-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-upload-wrapper .plus-icon {
        font-size: 32px;
        color: #888;
        position: absolute;
    }

    input[type="file"] {
        display: none;
    }
</style>
<script>
    const input = document.getElementById('images');
    const preview = document.getElementById('preview-image');
    const plusIcon = document.getElementById('plus-icon');

    input.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                if (plusIcon) plusIcon.style.display = 'none';
            };
            reader.readAsDataURL(file);
        }
    });
    const input2 = document.getElementById('images2');
    const preview2 = document.getElementById('preview-image-2');
    const plusIcon2 = document.getElementById('plus-icon-2');

    input2.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview2.src = e.target.result;
                preview2.style.display = 'block';
                if (plusIcon2) plusIcon2.style.display = 'none';
            };
            reader.readAsDataURL(file);
        }
    });
</script>
