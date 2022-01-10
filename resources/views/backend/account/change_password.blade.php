@extends('backend.master')

@push('title', 'Đổi mật khẩu')

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header" style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Đổi mật khẩu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ url('/admin/account') }}">My Account</a></li>
                    <li class="breadcrumb-item active">Đổi mật khẩu</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container">
        <!-- Default box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Đặt lại mật khẩu</h3>
            </div>
            <form action="{{ url('/admin/update-password') }}" method="post">
                @csrf
                <div class="card-body">

                    <!-- Validate error message -->
                    @if (session('errors'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="password">Mật khẩu cũ</label>
                        <input type="password" name="password" id="password" class="form-control" required
                            placeholder="Nhập mật khẩu hiện tại">
                    </div>
                    <div class="form-group">
                        <label for="newPassword">Mật khẩu mới</label>
                        <input type="password" name="new_password" id="newPassword" class="form-control" required
                            placeholder="Nhập mật khẩu mới">
                    </div>
                    <div class="form-group">
                        <label for="rePassword">Nhập lại mật khẩu mới</label>
                        <input type="password" name="re_new_password" id="rePassword" class="form-control" required
                            placeholder="Nhập lại mật khẩu mới">
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('/admin/account') }}" class="btn btn-sm btn-secondary">Quay lại My Account</a>
                    <button type="submit" class="btn btn-sm btn-success float-right">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
