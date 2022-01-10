@extends('backend.master')

@push('title', 'Edit Contact')

@section('script')
<script type="text/javascript">
    // Active Sidebar
    $('#link-page').parent().addClass('activemenu-is-opening menu-open');
    $('#link-page, #link-contact-page').addClass('active');
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header"style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Cập nhật liên hệ</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.contact.index') }}">Liên hệ</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- .card -->
            <div class="card card-primary">

                <!-- .card-header -->
                <div class="card-header">
                    <h3 class="card-title">Chỉnh sửa liên hệ</h3>
                </div>
                <!-- /.card-header-->

                <form action="{{ route('admin.contact.update', $contact->id) }}" method="post">
                    @csrf
                    <!-- .card-body -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Tên</label>
                            <input type="text" name="name" id="inputName" class="form-control"
                                value="{{ $contact->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Thông tin</label>
                            <textarea id="" class="form-control" name="info" rows="3">{{ $contact->info }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input id="" class="form-control" type="email" name="email" value="{{ $contact->email }}">
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input id="" class="form-control" type="text" name="phone" value="{{ $contact->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input id="" class="form-control" type="text" name="address"
                                value="{{ $contact->address }}">
                        </div>
                        <div class="form-group">
                            <label for="inputCreatedAt">Ngày khởi tạo</label>
                            <input type="" id="inputCreatedAt" class="form-control" disabled
                                value="{{ date('m-d-Y H:i:s', strtotime($contact->created_at)) }}">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <!-- .card-footer -->
                    <div class="card-footer">
                        <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary">Thoát</a>
                        <button type="submit" class="btn btn-success float-right">Cập nhật</button>
                    </div>
                    <!-- /.card-footer -->
                </form>

            </div>
            <!-- /.card -->

        </div>
    </div>
</section>

<!-- /.content -->
@endsection
