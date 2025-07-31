@extends('admin.index')
@section('contentadmin')
    <div class="pagetitle">
        <h1>Quản lý tài khoản</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active">Tài khoản người dùng</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="col-12 d-sm-flex justify-content-between align-items-center">
                            <h5 class="card-title">Quản lý vai trò web </h5>
                            @if (auth()->user()->hasPermissionTo('Thêm người dùng'))
                                <a href="{{ route('admin.users.create') }}" class="btn btn-success">
                                    <i class="bi bi-check-circle"></i>
                                    Thêm tài khoản
                                </a>
                            @endif
                        </div>

                        <div class="table-responsive">
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Quyền</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                                            <td>
                                                {{-- =============================================== --}}
                                                {{-- ==== THÊM ĐIỀU KIỆN KIỂM TRA EMAIL TẠI ĐÂY ==== --}}
                                                {{-- =============================================== --}}
                                                @if ($user->email != 'superadmin@example.com')
                                                    {{-- Chỉ hiển thị nút nếu email KHÔNG phải là email superadmin --}}
                                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-sm">Sửa</a>
                                                    
                                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Xóa người dùng này?')" class="btn btn-danger btn-sm">Xóa</button>
                                                    </form>
                                                @else
                                                    <span class="text-muted fst-italic">Không thể sửa</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class=" p-nav text-end d-flex justify-content-center">
                                {{ $users->appends(request()->query())->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection