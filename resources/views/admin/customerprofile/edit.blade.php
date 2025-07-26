@extends('admin.index')
@section('contentadmin')
    <div class="pagetitle">
        <h1>Khách hàng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Sửa khách hàng</li>
            </ol>
        </nav>
    </div>


    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="col-12 d-sm-flex justify-content-between align-items-center">
                        <h5 class="card-title">Sửa khách hàng</h5>

                    </div>
                    <form action="{{ route('khachhangquanly.admin.update', $khachhangquanly) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.customerprofile._form', ['khachhangquanly' => $khachhangquanly])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
