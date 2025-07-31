@extends('admin.index')
@section('contentadmin')
    <div class="pagetitle">
        <h1>Phản hồi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Phản hồi</li>
            </ol>
        </nav>
    </div>




    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <div class="col-12 d-sm-flex justify-content-between align-items-center">
                        <h5 class="card-title">Danh sách phản hồi</h5>
                        @if (auth()->user()->hasPermissionTo('Thêm phản hồi'))
                            <a href="{{ route('phanhoi.admin.create') }}" class="btn btn-success rounded-pill">Thêm mới</a>
                        @endif
                    </div>
                    <hr>
                    <form action="{{ route('phanhoi.admin.index') }}" method="GET"
                        class="row mb-3 d-flex justify-content-center align-items-center">
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control" placeholder="Tìm tiêu đề"
                                    value="{{ request('name') }}">
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
                                        <th>Ảnh</th>
                                        <th>Tiêu đề</th>

                                        <th>Ngày tạo</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($phanHois as $tt)
                                        <tr>
                                            <th scope="row"><a href="#"><img src="{{ asset($tt->avatar) }}"
                                                        alt="" class="img-fluid"
                                                        style="width: 60px; height: 60px; overflow: hidden;"></a>
                                            </th>
                                            <td>{{ $tt->name }}</td>

                                            <td>{{ $tt->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                @if (auth()->user()->hasPermissionTo('Sửa phản hồi'))
                                                    <a href="{{ route('phanhoi.admin.edit', $tt->id) }}"
                                                        class="btn btn-warning btn-sm"><i class="bi bi-wrench"></i></a>
                                                @endif
                                                @if (auth()->user()->hasPermissionTo('Xóa phản hồi'))
                                                    <form action="{{ route('phanhoi.admin.destroy', $tt->id) }}"
                                                        method="POST" style="display:inline-block;">
                                                        @csrf @method('DELETE')
                                                        <button class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Xóa phản hồi này?')"><i
                                                                class="bi bi-trash text-white"></i></button>
                                                    </form>
                                                @endif
                                                <button type="button" class="btn btn-info btn-sm btn-xem-chi-tiet"
                                                    data-bs-toggle="modal" data-bs-target="#modalChiTiet"
                                                    data-tieude="{{ $tt->name }}" data-mota="{{ $tt->note }}" data-danhmuc="{{ $tt->danhmuc }}"
                                                    data-anh="{{ asset($tt->avatar) }}">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">Không có dữ liệu phản hồi.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class=" p-nav text-end d-flex justify-content-end">
                    {{ $phanHois->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="modalChiTiet" tabindex="-1" aria-labelledby="modalChiTietLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chi tiết phản hồi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">

                            <p class="text-muted"><span id="ct-tac-gia"></span></p>
                            <img id="ct-hinh-anh" src="" class="img-fluid mb-3">
                        </div>
                        <div class="col-lg-8">
                            <h4 class="text-muted"><span id="ct-tieu-de"></span></h4>
                            <p>Dịch vụ <span id="ct-danhmuc"></span></p>
                            <label for="ta">Mô tả ngắn:</label>
                            <p id="ct-mo-ta" class="fst-italic text-secondary"></p>
                        </div>
                    </div>

                    <hr>
                    <div id="ct-noi-dung" style="max-height: 400px; overflow-y: auto; word-wrap: break-word;"></div>

                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('modalChiTiet');
            modal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;

                document.getElementById('ct-tieu-de').textContent = "Tiêu đề: " + button.getAttribute(
                    'data-tieude');

                document.getElementById('ct-mo-ta').textContent = button.getAttribute('data-mota');
                document.getElementById('ct-danhmuc').textContent = button.getAttribute('data-danhmuc');

                document.getElementById('ct-hinh-anh').src = button.getAttribute('data-anh');
            });
        });
    </script>
@endsection
