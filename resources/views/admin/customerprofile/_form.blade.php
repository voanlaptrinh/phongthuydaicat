<div class="row g-4">


    <div class="col-lg-6">
        <label for="name" class="form-label">Tên khách hàng</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $khachhangquanly->name ?? '') }}">
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6">
        <label for="phone" class="form-label">Số điện thoại</label>
        <input type="number" class="form-control" name="phone"
            value="{{ old('phone', $khachhangquanly->phone ?? '') }}">
        @error('phone')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6">
        <label for="zalo" class="form-label">Zalo</label>
        <input type="text" class="form-control" name="zalo"
            value="{{ old('zalo', $khachhangquanly->zalo ?? '') }}">
        @error('zalo')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email"
            value="{{ old('email', $khachhangquanly->email ?? '') }}">
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6">
        <label for="facebook_url" class="form-label">facebook_url</label>
        <input type="text" class="form-control" name="facebook_url"
            value="{{ old('facebook_url', $khachhangquanly->facebook_url ?? '') }}">
        @error('facebook_url')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6">
        <label for="service_type" class="form-label">Loại dịch vụ</label>
        <input type="text" class="form-control" name="service_type"
            value="{{ old('service_type', $khachhangquanly->service_type ?? '') }}">
        @error('service_type')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
     <div class="col-lg-6">
            <label for="reception_date" class="form-label">Ngày tiếp nhận hồ sơ</label>
            <input type="date" class="form-control" name="reception_date" value="{{ old('reception_date', isset($khachhangquanly->reception_date) ? $khachhangquanly->reception_date->format('Y-m-d') : '') }}">
            @error('reception_date') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

    <div class="col-lg-6">
        <label for="status" class="form-label">Trạng thái hồ sơ</label>
        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
            {{-- Vòng lặp để hiển thị các lựa chọn --}}
            @foreach ($statuses as $key => $value)
                <option value="{{ $key }}" {{-- Logic để chọn đúng trạng thái khi edit hoặc khi có lỗi validation --}}
                    {{ old('status', $khachhangquanly->status ?? 'waiting') == $key ? 'selected' : '' }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>
        @error('status')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-lg-12">
        <label for="note" class="form-label">Mô tả ngắn</label>
        <textarea class="form-control" name="note">{{ old('note', $khachhangquanly->note ?? '') }}</textarea>
        @error('note')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="text-end mt-4">
    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{{ route('khachhangquanly.admin.index') }}" class="btn btn-secondary">Quay lại</a>
</div>
