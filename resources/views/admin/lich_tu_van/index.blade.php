@extends('admin.index')
@section('contentadmin')
    <div class="pagetitle">
        <h1>Đặt lịch tư vấn</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Đặt lịch tư vấn</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 d-sm-flex justify-content-between align-items-center">
                        <h5 class="card-title">Danh sách Đặt lịch tư vấn</h5>
                    </div>
                    <hr>
                    <form method="GET" action="{{ url()->current() }}" class="mb-4">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="fullname" class="form-label">Tên</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="{{ request('fullname') }}" placeholder="Nhập tên...">
                            </div>
                            <div class="col-md-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ request('email') }}" placeholder="Nhập email...">
                            </div>
                            <div class="col-md-2">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ request('phone') }}" placeholder="Nhập SĐT...">
                            </div>
                            <div class="col-md-2">
                                <label for="search-status" class="form-label">Trạng thái</label>
                                <select id="search-status" name="status" class="form-select">
                                    <option value="">Tất cả</option>
                                    <option value="Mới" {{ request('status') == 'Mới' ? 'selected' : '' }}>Mới</option>
                                    <option value="Đã tư vấn" {{ request('status') == 'Đã tư vấn' ? 'selected' : '' }}>Đã tư vấn</option>
                                    <option value="Đã hủy" {{ request('status') == 'Đã hủy' ? 'selected' : '' }}>Đã hủy</option>
                                </select>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary me-2">Tìm kiếm</button>
                                <a href="{{ url()->current() }}" class="btn btn-secondary">Xóa</a>
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>SDT</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th>Hành động</th> {{-- Thêm cột mới --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($lichtuvans as $lichtuvan)
                                        {{-- Thêm ID cho mỗi dòng để JS dễ dàng cập nhật --}}
                                        <tr id="row-{{ $lichtuvan->id }}">
                                            <td>{{ $lichtuvan->fullname }}</td>
                                            <td>{{ $lichtuvan->email }}</td>
                                            <td>{{ $lichtuvan->phone }}</td>
                                            {{-- Thêm class để JS tìm được ô trạng thái này --}}
                                            <td class="status-cell">{{ $lichtuvan->status }}</td>
                                            <td>{{ $lichtuvan->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                {{-- NÚT XEM CHI TIẾT --}}
                                                <button class="btn btn-info btn-sm js-view-details"
                                                        {{-- Truyền toàn bộ dữ liệu vào data-attribute --}}
                                                        data-details="{{ $lichtuvan->toJson() }}">
                                                    <i class="bi bi-eye"></i>
                                                </button>

                                                {{-- NÚT SỬA TRẠNG THÁI --}}
                                                <button class="btn btn-warning btn-sm js-edit-status"
                                                        data-id="{{ $lichtuvan->id }}"
                                                        data-status="{{ $lichtuvan->status }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">Không có dữ liệu.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="p-nav text-end d-flex justify-content-end">
                    {{ $lichtuvans->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <!-- =============================================================== -->
    <!-- ==== MODALS - Đặt ở đây để không làm ảnh hưởng layout ==== -->
    <!-- =============================================================== -->

    <!-- Modal Xem Chi Tiết -->
    <div class="modal fade" id="viewDetailsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chi tiết lịch tư vấn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-2"><strong>Họ và tên:</strong> <span id="details-fullname"></span></div>
                        <div class="col-md-6 mb-2"><strong>Email:</strong> <span id="details-email"></span></div>
                        <div class="col-md-6 mb-2"><strong>Số điện thoại:</strong> <span id="details-phone"></span></div>
                        <div class="col-md-6 mb-2"><strong>Trạng thái:</strong> <span id="details-status"></span></div>
                        <div class="col-md-6 mb-2"><strong>Ngày tạo:</strong> <span id="details-created_at"></span></div>
                    </div>
                    <hr>
                    <div>
                        <strong>Nội dung câu hỏi:</strong>
                        <p id="details-message" class="mt-2" style="white-space: pre-wrap;"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Sửa Trạng Thái -->
    <div class="modal fade" id="editStatusModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editStatusForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Cập nhật trạng thái</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="lichtuvan-id" name="id">
                        <div class="form-group">
                            <label for="status-select">Chọn trạng thái mới</label>
                            <select class="form-select" id="status-select" name="status">
                                <option value="Mới">Mới</option>
                                <option value="Đã tư vấn">Đã tư vấn</option>
                                <option value="Đã hủy">Đã hủy</option>
                            </select>
                        </div>
                        <div id="edit-error" class="text-danger mt-2"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const viewDetailsModal = new bootstrap.Modal(document.getElementById('viewDetailsModal'));
        const editStatusModal = new bootstrap.Modal(document.getElementById('editStatusModal'));

        document.body.addEventListener('click', function(event) {
            
            // ---- Xử lý nút XEM CHI TIẾT ----
            if (event.target.closest('.js-view-details')) {
                const button = event.target.closest('.js-view-details');
                const details = JSON.parse(button.dataset.details);

                document.getElementById('details-fullname').textContent = details.fullname;
                document.getElementById('details-email').textContent = details.email;
                document.getElementById('details-phone').textContent = details.phone;
                document.getElementById('details-status').textContent = details.status;
                document.getElementById('details-message').textContent = details.message || 'Không có nội dung.';
                
                // Format lại ngày tháng
                const createdAt = new Date(details.created_at);
                document.getElementById('details-created_at').textContent = createdAt.toLocaleDateString('vi-VN');
                
                viewDetailsModal.show();
            }

            // ---- Xử lý nút SỬA TRẠNG THÁI ----
            if (event.target.closest('.js-edit-status')) {
                const button = event.target.closest('.js-edit-status');
                document.getElementById('lichtuvan-id').value = button.dataset.id;
                document.getElementById('status-select').value = button.dataset.status;
                document.getElementById('edit-error').textContent = ''; // Xóa lỗi cũ
                editStatusModal.show();
            }
        });

        // ---- Xử lý submit form SỬA TRẠNG THÁI ----
        const editStatusForm = document.getElementById('editStatusForm');
        editStatusForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const form = e.target;
            const formData = new FormData(form);
            const id = formData.get('id');
            const status = formData.get('status');
            const url = `lich-tu-van/${id}/update-status`; // URL để cập nhật
            const token = formData.get('_token');
            const submitButton = form.querySelector('button[type="submit"]');
            submitButton.disabled = true;

            fetch(url, {
                method: 'POST', // Dùng POST và Laravel sẽ hiểu là PATCH/PUT nhờ _method
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    _method: 'PATCH', // Giả lập phương thức PATCH
                    status: status
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Cập nhật trạng thái trên bảng mà không cần tải lại trang
                    const row = document.getElementById(`row-${id}`);
                    if (row) {
                        row.querySelector('.status-cell').textContent = status;
                    }
                    editStatusModal.hide();
                    // Có thể thêm thông báo thành công ở đây (toast)
                } else {
                    document.getElementById('edit-error').textContent = data.message || 'Có lỗi xảy ra.';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('edit-error').textContent = 'Lỗi kết nối đến máy chủ.';
            })
            .finally(() => {
                submitButton.disabled = false;
            });
        });
    });
</script>
@endpush