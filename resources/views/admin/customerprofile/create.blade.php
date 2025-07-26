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
                        <h5 class="card-title">Thêm mới khách hàng và quản lý</h5>

                    </div>
                    <form action="{{ route('khachhangquanly.admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.customerprofile._form', ['khachhangquanly' => null])

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
