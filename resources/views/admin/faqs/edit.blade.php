@extends('admin.index')
@section('contentadmin')
    <div class="pagetitle">
        <h1>Câu hỏi thường gặp</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Sửa câu hỏi thường gặp</li>
            </ol>
        </nav>
    </div>


    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="col-12 d-sm-flex justify-content-between align-items-center">
                        <h5 class="card-title">Sửa câu hỏi thường gặp</h5>

                    </div>
                    <form action="{{ route('faqs.admin.update', $faq) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         @method('PUT')
                        @include('admin.faqs._form', ['faq' => $faq])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
