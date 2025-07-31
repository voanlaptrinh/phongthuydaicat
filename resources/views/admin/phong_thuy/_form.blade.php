<div class="row g-2">
    <div class="row">
        <div class="col-lg-2">
            <div class="d-flex flex-column align-items-center">
                <label for="images" class="form-label">Ảnh đại diện</label>

                <label class="image-upload-wrapper" for="images">
                    @if (!empty($phongthuy->images))
                        <img id="preview-image" src="{{ asset($phongthuy->images) }}" alt="Preview">
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
        </div>
        <div class="col-lg-10">
            <div class="row g-3">
                <div class="col-lg-6">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input type="text" class="form-control" name="title"
                        value="{{ old('title', $phongthuy->title ?? '') }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <label for="tag" class="form-label">Tag</label>
                    <input type="text" class="form-control" name="tag"
                        value="{{ old('tag', $phongthuy->tag ?? '') }}">
                    @error('tag')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-12">
                    <label for="metatitle" class="form-label">Metatitle</label>
                    <input type="text" class="form-control" name="metatitle"
                        value="{{ old('metatitle', $phongthuy->metatitle ?? '') }}">
                    @error('metatitle')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-12">
                    <label for="metadescription" class="form-label">Meta Description</label>
                     <textarea class="form-control" name="metadescription">{{ old('metadescription', $phongthuy->metadescription ?? '') }}</textarea>
                    @error('metadescription')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-12">
                    <label for="description" class="form-label">Mô tả ngắn</label>
                    <textarea class="form-control" name="description">{{ old('description', $phongthuy->description ?? '') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>
        <div class="col-lg-12">
            <label for="title" class="form-label">Nội dung</label>
            <textarea class="form-control" name="content" id="tyni">{{ old('content', $phongthuy->content ?? '') }}</textarea>
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
</script>
