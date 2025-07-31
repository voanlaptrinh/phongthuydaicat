@extends('admin.index')
@section('contentadmin')
    <div class="pagetitle">
        <h1>Tài khoản</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Thêm Tài khoản</li>
            </ol>
        </nav>
    </div>


    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="col-12 d-sm-flex justify-content-between align-items-center">
                        <h5 class="card-title">Thêm mới Tài khoản</h5>

                    </div>
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @include('admin.users._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
