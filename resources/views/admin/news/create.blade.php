@extends('admin.index')
@section('contentadmin')
    <div class="pagetitle">
        <h1>Tin tức</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Thêm Tin tức</li>
            </ol>
        </nav>
    </div>


    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="col-12 d-sm-flex justify-content-between align-items-center">
                        <h5 class="card-title">Thêm mới Tin tức</h5>

                    </div>
                    <form action="{{ route('news.admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.news._form', ['news' => null])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
