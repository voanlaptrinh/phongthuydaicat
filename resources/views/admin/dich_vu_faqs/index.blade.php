@extends('admin.index')
@section('contentadmin')
    <div class="pagetitle">
        <h1>Câu hỏi Dịch vụ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Câu hỏi thường gặp - {{ $dichvu->title }}</li>
            </ol>
        </nav>
    </div>




    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <div class="col-12 d-sm-flex justify-content-between align-items-center">
                        <h5 class="card-title">Câu hỏi thường gặp - {{ $dichvu->title }}</h5>

                        <a href="{{ route('admin.dichvu.faqs.create', $dichvu->id) }}" class="btn btn-success rounded-pill">Thêm
                            mới</a>

                    </div>
                    <hr>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Câu hỏi</th>
                                        <th>Câu trả lời</th>
                                       
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($faqs as $faq)
                                        <tr>
                                            <td>{{ $faq->question }}</td>
                                            <td>{!! Str::limit($faq->answer, 100) !!}</td>
                    
                                            <td>
                                               <a href="{{ route('admin.dichvu.faqs.edit', [$dichvu->id, $faq->id]) }}"
                                                    class="btn btn-sm btn-primary"><i class="bi bi-wrench"></i></a>
                                               <form action="{{ route('admin.dichvu.faqs.destroy', [$dichvu->id, $faq->id]) }}"
                                                    method="POST" style="display:inline-block;"
                                                    onsubmit="return confirm('Bạn chắc chắn muốn xóa?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"><i
                                                            class="bi bi-trash text-white"></i></button>
                                                </form> 
                                            </td>
                                        </tr>
                                     @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted">Không có dữ liệu câu hỏi.
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
