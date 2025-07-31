@extends('admin.index')
@section('contentadmin')
    <div class="pagetitle">
        <h1>Dịch vụ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Dịch vụ</li>
            </ol>
        </nav>
    </div>




    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <div class="col-12 d-sm-flex justify-content-between align-items-center">
                        <h5 class="card-title">Danh sách dịch vụ</h5>
                        @if (auth()->user()->hasPermissionTo('Thêm kiến thức dịch vụ'))
                            <a href="{{ route('dichvu.admin.create') }}" class="btn btn-success rounded-pill">Thêm mới</a>
                        @endif
                    </div>
                    <hr>
                    <form action="{{ route('phongthuy.admin.index') }}" method="GET"
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
                                        @if (auth()->user()->hasPermissionTo('Xem câu hỏi kiến thức dịch vụ') ||
                                                auth()->user()->hasPermissionTo('Thêm câu hỏi kiến thức dịch vụ') ||
                                                auth()->user()->hasPermissionTo('Sửa câu hỏi kiến thức dịch vụ') ||
                                                auth()->user()->hasPermissionTo('Xóa câu hỏi kiến thức dịch vụ'))
                                            <th>Câu hỏi</th>
                                        @endif
                                        <th>Ngày tạo</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($newsList as $tt)
                                        <tr>
                                            <th scope="row">
                                                <a href="#"><img src="{{ asset($tt->images) }}" alt=""
                                                        class="img-fluid"
                                                        style="width: 60px; height: 60px; overflow: hidden;"></a>
                                            </th>
                                            <td>{{ $tt->title }}</td>
                                            <td>
                                                @if (auth()->user()->hasPermissionTo('Xem câu hỏi kiến thức dịch vụ') ||
                                                        auth()->user()->hasPermissionTo('Thêm câu hỏi kiến thức dịch vụ') ||
                                                        auth()->user()->hasPermissionTo('Sửa câu hỏi kiến thức dịch vụ') ||
                                                        auth()->user()->hasPermissionTo('Xóa câu hỏi kiến thức dịch vụ'))
                                                    <a href="{{ route('admin.dichvu.faqs.index', $tt->id) }}"
                                                        class="btn btn-outline-secondary">Thêm câu hỏi</a>
                                                @endif
                                            </td>
                                            <td>{{ $tt->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                @if (auth()->user()->hasPermissionTo('Sửa kiến thức dịch vụ'))
                                                    <a href="{{ route('dichvu.admin.edit', $tt->id) }}"
                                                        class="btn btn-warning btn-sm"><i class="bi bi-wrench"></i></a>
                                                @endif
                                                @if (auth()->user()->hasPermissionTo('Xóa kiến thức dịch vụ'))
                                                    <form action="{{ route('dichvu.admin.destroy', $tt->id) }}"
                                                        method="POST" style="display:inline-block;">
                                                        @csrf @method('DELETE')
                                                        <button class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Xóa dịch vụ này này?')"><i
                                                                class="bi bi-trash text-white"></i></button>
                                                    </form>
                                                @endif
                                                <a href="{{ route('dichvu.admin.detail', $tt->id) }}"
                                                    class="btn btn-info btn-sm"> <i class="bi bi-eye"></i></a>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">Không có dữ liệu dịch vụ phong
                                                thủy.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class=" p-nav text-end d-flex justify-content-end">
                    {{ $newsList->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

    </div>
@endsection
