@extends('backend.master')

@push('title', 'My Account')

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header" style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tài khoản của tôi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">My Account</li>
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
                <h3 class="card-title">Thông tin cá nhân</h3>
            </div>
            <form action="{{ url('/admin/account/update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group text-center"
                                style="margin-bottom:50px;width:300px;margin-left: 50%;transform: translateX(-50%);">
                                <label for="exampleInputFile">Ảnh đại diện</label>
                                <div class="input-group">
                                    <label class="show-img_add edit-img_admin" for="exampleInputFile"
                                        style="border: initial;">
                                        <div class="text-center" width="100%">
                                            <div class="img-tour_add disabled img-admin"
                                                style="width:250px;height:250px;border-radius:50%">
                                                <div class="img-tour_add-show">
                                                    <img src="" alt="" id="image" class="img-admin" width="100%"
                                                        height="100%"
                                                        style="width:250px;height:250px;border-radius:50%;border: 2px solid blue;transform: translateX(-50%); ">
                                                </div>
                                                <span class="img-tour_link" style="display:none"> </span>
                                            </div>
                                            <div class="img-tour_file ">
                                                <img src="{{ $account->avatar_image_path }}"
                                                    onerror="this.onerror=null;this.src='{{ asset('/images/blank-profile-picture-215x215.png') }}'"
                                                    class="fas fa-plus icon-add_tour" id="show_edit-img" alt="tour img"
                                                    style="width:250px;height:250px;border-radius:50%;border: 2px solid blue;">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    onChange="chooseFile(this)" name="image"
                                                    accept="image/gif,image/jpeg,image/png">
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="change-text_input" for="name"><i class="fas fa-edit"></i></label>
                                <input type="text" name="name" id="name" class="form-control text-center"
                                    placeholder="Username" style="border: inherit;
    font-size: 2rem;" value="{{ $account->name }}">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="example@email.com" value="{{ $account->email }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    placeholder="Phone number" value="{{ $account->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    placeholder="Address" value="{{ $account->address }}">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="created">Created at</label>
                                        <input type="text" id="created" class="form-control" disabled
                                            placeholder="Ngày tạo" value="{{ $account->created_at }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="updated">Updated at</label>
                                        <input type="text" id="updated" class="form-control" disabled
                                            placeholder="Ngày cập nhật" value="{{ $account->updated_at }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <a href="{{ url('/admin/dashboard') }}" class="btn btn-sm btn-secondary">Trang chủ</a>
                    <button type="submit" class="btn btn-sm btn-success float-right">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
