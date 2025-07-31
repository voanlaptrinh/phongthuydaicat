@extends('admin.index')
@section('contentadmin')
    <div class="pagetitle">
        <h1>Câu hỏi tin tức</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Câu hỏi thường gặp - {{ $news->title }}</li>
            </ol>
        </nav>
    </div>




    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <div class="col-12 d-sm-flex justify-content-between align-items-center">
                        <h5 class="card-title">Câu hỏi thường gặp - {{ $news->title }}</h5>
                        @if (auth()->user()->hasPermissionTo('Thêm câu hỏi tin tức'))
                            <a href="{{ route('admin.news.faqs.create', $news->id) }}"
                                class="btn btn-success rounded-pill">Thêm
                                mới</a>
                        @endif
                    </div>
                    <hr>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Câu hỏi</th>
                                        <th>Câu trả lời</th>
                                        <th>Hiển thị</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($faqs as $faq)
                                        <tr>
                                            <td>{{ $faq->question }}</td>
                                            <td>{!! Str::limit($faq->answer, 100) !!}</td>
                                            <td>{{ $faq->active ? '✔️' : '❌' }}</td>
                                            <td>
                                                @if (auth()->user()->hasPermissionTo('Sửa câu hỏi tin tức'))
                                                    <a href="{{ route('admin.news.faqs.edit', [$news->id, $faq->id]) }}"
                                                        class="btn btn-sm btn-primary"><i class="bi bi-wrench"></i></a>
                                                @endif
                                                @if (auth()->user()->hasPermissionTo('Xóa câu hỏi tin tức'))
                                                    <form
                                                        action="{{ route('admin.news.faqs.destroy', [$news->id, $faq->id]) }}"
                                                        method="POST" style="display:inline-block;"
                                                        onsubmit="return confirm('Bạn chắc chắn muốn xóa?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger"><i
                                                                class="bi bi-trash text-white"></i></button>
                                                    </form>
                                                @endif

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">Không có dữ liệu câu hỏi tin
                                                tức.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>
                <div class=" p-nav text-end d-flex justify-content-end">
                    {{ $faqs->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

    </div>
@endsection
