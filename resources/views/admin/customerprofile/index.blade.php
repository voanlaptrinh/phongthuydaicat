@extends('admin.index')
@section('contentadmin')
    <div class="pagetitle">
        <h1>Hồ sơ khách hàng và quản lý</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Hồ sơ khách hàng và quản lý</li>
            </ol>
        </nav>
    </div>
    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <div class="col-12 d-sm-flex justify-content-between align-items-center">
                        <h5 class="card-title">Danh sách phản hồi</h5>

                        <a href="{{ route('khachhangquanly.admin.create') }}" class="btn btn-success rounded-pill">Thêm
                            mới</a>

                    </div>
                    <hr>
                    <form action="{{ route('khachhangquanly.admin.index') }}" method="GET"
                        class="row mb-3 d-flex justify-content-center align-items-center">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" name="name" class="form-control" placeholder="Tìm tên khách hàng"
                                    value="{{ request('name') }}">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="email" class="form-control" placeholder="Tìm email"
                                    value="{{ request('email') }}">
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="phone" class="form-control" placeholder="Tìm số điện thoại"
                                    value="{{ request('phone') }}">
                            </div>
                            <div class="col-md-2">
                                <select name="status" id="status" class="form-select">
                                    <option value="">-- Tất cả tình trạng --</option>
                                    @foreach ($statuses as $key => $value)
                                        {{-- Giữ lại giá trị đã chọn sau khi submit --}}
                                        <option value="{{ $key }}"
                                            {{ ($searchStatus ?? '') == $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2 d-flex gap-2">
                                <button type="submit" class="btn btn-primary  w-100"><i class="bi bi-search"></i> Tìm
                                    kiếm</button>
                            </div>
                        </div>
                    </form>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>

                                        <th>Tên khách hàng</th>

                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th>Loại dịch vụ</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($customerProfiles as $cpr)
                                        <tr>

                                            <td>{{ $cpr->name }}</td>
                                            <td>{{ $cpr->phone }}</td>
                                            <td>{{ $cpr->email }}</td>
                                            <td>{{ $cpr->service_type }}</td>
                                            <td>{{ $statuses[$cpr->status] ?? $cpr->status }}</td>



                                            <td>

                                                <a href="{{ route('khachhangquanly.admin.edit', $cpr->id) }}"
                                                    class="btn btn-warning btn-sm"><i class="bi bi-wrench"></i></a>


                                                <form action="{{ route('khachhangquanly.admin.destroy', $cpr->id) }}"
                                                    method="POST" style="display:inline-block;">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Xóa khách hàng này?')"><i
                                                            class="bi bi-trash text-white"></i></button>
                                                </form>

                                                <button type="button" class="btn btn-sm btn-info view-details-btn"
                                                    data-bs-toggle="modal" data-bs-target="#customerDetailModal"
                                                    data-id="{{ $cpr->id }}">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">Không có dữ liệu.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class=" p-nav text-end d-flex justify-content-end">
                    {{ $customerProfiles->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="customerDetailModal" tabindex="-1" aria-labelledby="customerDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerDetailModalLabel">Chi Tiết Hồ Sơ Khách Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Spinner hiển thị trong lúc tải dữ liệu --}}
                    <div id="modal-loading" class="text-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>

                    {{-- Nội dung chi tiết sẽ được điền vào đây bằng JavaScript --}}
                    <div id="modal-content-display" style="display: none;">
                        <div class="row">
                            <div class="col-md-6 mb-2"><strong>Mã khách hàng:</strong> <span
                                    id="modal-customer-code"></span></div>
                            <div class="col-md-6 mb-2"><strong>Tên khách hàng:</strong> <span id="modal-name"></span></div>
                            <div class="col-md-6 mb-2"><strong>Điện thoại:</strong> <span id="modal-phone"></span></div>
                            <div class="col-md-6 mb-2"><strong>Zalo:</strong> <span id="modal-zalo"></span></div>
                            <div class="col-md-6 mb-2"><strong>Email:</strong> <span id="modal-email"></span></div>
                            <div class="col-md-6 mb-2"><strong>Facebook:</strong> <a id="modal-facebook-url" href="#"
                                    target="_blank"></a></div>
                            <div class="col-md-6 mb-2"><strong>Loại dịch vụ:</strong> <span
                                    id="modal-service-type"></span>
                            </div>
                            <div class="col-md-6 mb-2"><strong>Tình trạng:</strong> <span id="modal-status"
                                    class="badge"></span></div>
                            <div class="col-md-6 mb-2"><strong>Ngày tiếp nhận:</strong> <span
                                    id="modal-reception-date"></span></div>
                            <div class="col-md-6 mb-2"><strong>Ngày tạo:</strong> <span id="modal-created-at"></span>
                            </div>
                        </div>
                        <hr>
                        <h6><strong>Ghi chú:</strong></h6>
                        <p id="modal-note" style="white-space: pre-wrap;"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- ======================================================= --}}
{{-- JAVASCRIPT ĐỂ XỬ LÝ MODAL - ĐẶT Ở ĐÂY --}}
{{-- ======================================================= --}}
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lắng nghe sự kiện click trên tất cả các nút có class 'view-details-btn'
            const viewButtons = document.querySelectorAll('.view-details-btn');

            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const customerId = this.dataset.id; // Lấy ID khách hàng từ data-id của nút

                    const modalLoading = document.getElementById('modal-loading');
                    const modalContent = document.getElementById('modal-content-display');

                    // 1. Hiển thị spinner và ẩn nội dung cũ
                    modalLoading.style.display = 'block';
                    modalContent.style.display = 'none';

                    // 2. Gọi API để lấy dữ liệu
                    fetch(`/admin/khach-hang-quan-ly/details/${customerId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            // 3. Điền dữ liệu vào modal
                            document.getElementById('modal-customer-code').textContent = data
                                .customer_code || 'N/A';
                            document.getElementById('modal-name').textContent = data.name ||
                                'N/A';
                            document.getElementById('modal-phone').textContent = data.phone ||
                                'N/A';
                            document.getElementById('modal-zalo').textContent = data.zalo ||
                                'N/A';
                            document.getElementById('modal-email').textContent = data.email ||
                                'N/A';

                            const fbLink = document.getElementById('modal-facebook-url');
                            if (data.facebook_url) {
                                fbLink.href = data.facebook_url;
                                fbLink.textContent = data.facebook_url;
                                fbLink.style.display = 'inline';
                            } else {
                                fbLink.style.display = 'none';
                            }

                            document.getElementById('modal-service-type').textContent = data
                                .service_type || 'N/A';
                            document.getElementById('modal-status').textContent = data.status ||
                                'N/A';
                            // Thêm class cho badge status
                            document.getElementById('modal-status').className =
                                'badge bg-success';
                            document.getElementById('modal-reception-date').textContent = data
                                .reception_date || 'N/A';
                            document.getElementById('modal-created-at').textContent = data
                                .created_at || 'N/A';
                            document.getElementById('modal-note').textContent = data.note ||
                                'Không có ghi chú.';

                            // 4. Ẩn spinner và hiển thị nội dung
                            modalLoading.style.display = 'none';
                            modalContent.style.display = 'block';
                        })
                        .catch(error => {
                            console.error('Lỗi khi lấy dữ liệu chi tiết:', error);
                            modalLoading.style.display = 'none';
                            // Hiển thị thông báo lỗi trong modal nếu muốn
                            modalContent.innerHTML =
                                '<p class="text-danger">Không thể tải dữ liệu. Vui lòng thử lại.</p>';
                            modalContent.style.display = 'block';
                        });
                });
            });
        });
    </script>
@endpush
