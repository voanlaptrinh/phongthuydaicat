@extends('admin.index')
@section('contentadmin')
    <div class="pagetitle">
        <h1>Phong thủy</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Sửa Phong thủy</li>
            </ol>
        </nav>
    </div>


    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="col-12 d-sm-flex justify-content-between align-items-center">
                        <h5 class="card-title">Sửa mới Phong thủy</h5>

                    </div>
                    <form action="{{ route('phongthuy.admin.update', $phongthuy) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.phong_thuy._form', ['phongthuy' => $phongthuy])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
