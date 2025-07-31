@extends('admin.index')
@section('contentadmin')
    <div class="pagetitle">
        <h1>Liên hệ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Liên hệ</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    {{-- Form tìm kiếm --}}
                    <form method="GET" action="{{ route('contacts.admin.index') }}" class="row g-2 mb-4 mt-2">
                        <div class="col-md-5">
                            <input type="text" name="username" class="form-control" placeholder="Tìm theo tên"
                                value="{{ request('username') }}">
                        </div>
                        <div class="col-md-5">
                            <input type="email" name="email" class="form-control" placeholder="Tìm theo Email"
                                value="{{ request('email') }}">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            <a href="{{ route('contacts.admin.index') }}" class="btn btn-secondary">Xóa lọc</a>
                        </div>
                    </form>

                    {{-- Bảng dữ liệu --}}
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>SĐT</th>
                                    <th>Loại dịch vụ</th>
                                    <th>Thời gian</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dsLienHe as $lh)
                                    <tr>
                                        <td>{{ $lh->username ?? 'Không có' }}</td>
                                        <td>{{ $lh->email ?? 'Không có' }}</td>
                                        <td>{{ $lh->phone ?? 'Không có' }}</td>
                                        <td>{{ $lh->loai_dich_vu ?? 'Không có' }}</td>
                                        <td>{{ $lh->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            {{-- SỬA LỖI & CẢI TIẾN: Truyền toàn bộ đối tượng dưới dạng JSON --}}
                                            <button class="btn btn-sm btn-info btn-xem-chi-tiet"
                                                data-contact='{{ $lh->toJson() }}'>
                                                Xem chi tiết
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Không có liên hệ nào</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Phân trang --}}
                <div class="card-footer d-flex justify-content-end">
                    {{ $dsLienHe->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    {{-- Modal chi tiết liên hệ --}}
    <div class="modal fade" id="modalChiTietLienHe" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chi tiết liên hệ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Họ tên:</strong> <span id="ct-ten"></span></p>
                    <p><strong>Email:</strong> <span id="ct-email"></span></p>
                    <p><strong>Số điện thoại:</strong> <span id="ct-sdt"></span></p>
                    <p><strong>Loại dịch vụ:</strong> <span id="ct-dvu"></span></p>
                    <p><strong>Địa chỉ:</strong> <span id="ct-address"></span></p>
                    <p><strong>Thời gian gửi:</strong> <span id="ct-thoigian"></span></p>
                    <p style="max-height: 400px; overflow-y: auto; word-wrap: break-word;">
                        <strong>Nội dung:</strong> <span id="ct-noidung"></span>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    {{-- SỬA LỖI & CẢI TIẾN: Cập nhật Javascript để đọc dữ liệu từ JSON --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.btn-xem-chi-tiet');
            const modalEl = document.getElementById('modalChiTietLienHe');
            const modal = new bootstrap.Modal(modalEl);

            buttons.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Lấy chuỗi JSON từ thuộc tính data-contact và chuyển thành đối tượng Javascript
                    const contactData = JSON.parse(this.dataset.contact);
                    
                    // Định dạng lại ngày tháng từ chuỗi ISO 8601 (mặc định của toJson())
                    const thoiGianGui = new Date(contactData.created_at);
                    const formattedDate = `${thoiGianGui.getDate().toString().padStart(2, '0')}/${(thoiGianGui.getMonth() + 1).toString().padStart(2, '0')}/${thoiGianGui.getFullYear()} ${thoiGianGui.getHours().toString().padStart(2, '0')}:${thoiGianGui.getMinutes().toString().padStart(2, '0')}`;


                    // Điền dữ liệu vào modal
                    document.getElementById('ct-ten').textContent = contactData.username || 'Không có';
                    document.getElementById('ct-email').textContent = contactData.email || 'Không có';
                    document.getElementById('ct-sdt').textContent = contactData.phone || 'Không có';
                    document.getElementById('ct-dvu').textContent = contactData.loai_dich_vu || 'Không có';
                    // Sửa lỗi chính tả: addrress -> address
                    document.getElementById('ct-address').textContent = contactData.address || 'Không có'; 
                    document.getElementById('ct-noidung').textContent = contactData.mo_ta || 'Không có';
                    document.getElementById('ct-thoigian').textContent = formattedDate;

                    // Hiển thị modal
                    modal.show();
                });
            });
        });
    </script>
@endsection