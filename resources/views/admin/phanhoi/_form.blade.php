<div class="row g-2">
    <div class="row">
        <div class="col-lg-2">
            <div class="d-flex flex-column align-items-center">
                <label for="avatar" class="form-label">Ảnh đại diện</label>

                <label class="image-upload-wrapper" for="avatar">
                    @if (!empty($phanhoi->avatar))
                        <img id="preview-image" src="{{ asset($phanhoi->avatar) }}" alt="Preview">
                    @else
                        <img id="preview-image" src="#" alt="Preview" style="display: none;">
                        <span class="plus-icon" id="plus-icon">+</span>
                    @endif
                </label>

                <input type="file" name="avatar" id="avatar" accept="image/*">
            </div>
            @error('avatar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-10">
            <div class="row g-3">
                <div class="col-lg-6">
                    <label for="name" class="form-label">Tiêu đề</label>
                    <input type="text" class="form-control" name="name"
                        value="{{ old('name', $phanhoi->name ?? '') }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <label for="name" class="form-label">Dịch vụ</label>
                    <input type="text" class="form-control" name="danhmuc"
                        value="{{ old('danhmuc', $phanhoi->danhmuc ?? '') }}">
                    @error('danhmuc')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-12">
                    <label for="note" class="form-label">Mô tả ngắn</label>
                <textarea class="form-control" name="note">{{ old('note', $phanhoi->note ?? '') }}</textarea>
                @error('note')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>

        </div>
    </div>
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










<div class="text-end mt-4">
    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{{ route('phanhoi.admin.index') }}" class="btn btn-secondary">Quay lại</a>
</div>
<script>
    const input = document.getElementById('avatar');
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
