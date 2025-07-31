@extends('admin.index')
@section('contentadmin')
    <div class="pagetitle">
        <h1>Tài khoản</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Sửa Tài khoản</li>
            </ol>
        </nav>
    </div>


    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="col-12 d-sm-flex justify-content-between align-items-center">
                        <h5 class="card-title">Sửa mới Tài khoản</h5>

                    </div>
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @method('PUT')
        @include('admin.users._form')
      </form>
                </div>
            </div>
        </div>
    </div>
@endsection
