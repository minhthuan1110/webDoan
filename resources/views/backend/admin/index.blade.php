@extends('backend.master')

@push('title', 'Admin Manage')

@section('script')
<script type="text/javascript" src="{{ asset('js/custom-function.js') }}"></script>
<script type="text/javascript">
    // Active Sidebar
    // $('#link-admin').parent().addClass('activemenu-is-opening menu-open');
    $('#link-admin').addClass('active');
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header"style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Admin</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Admin</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<section class="content">
    <div class="container">
        <!-- .card -->
        <div class="card">
            <!-- .card-header -->
            <div class="card-header">
                <h3 class="card-title">
                    <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal-add">
                        <i class="fas fa-plus-circle"></i>&nbsp;
                        Thêm mới
                    </button>
                </h3>
                <div class="card-tools">
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" id="search" class="form-control float-right" placeholder="Tìm kiếm">
                                <div class="input-group-append float-right">
                                    <button type="button" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->

            <!-- .card-body -->
            <div class="card-body table-responsive p-0 d-block">
                <table class="table table-hover table-striped table-head-fixed projects text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ảnh đại diện</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="list-data">
                        @foreach ($admins as $admin)
                        <tr>
                            <td>{{ $admin->id }}</td>
                            <td>
                                @empty($admin->avatar_image_path)
                                <p class="font-italic" style="opacity: .3">(None)</p>
                                @else
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <img src="{{ asset($admin->avatar_image_path) }}"
                                            alt="Image of {{ $admin->name }}" style="height: 80px">
                                    </li>
                                </ul>
                                @endempty
                            </td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" title="Chỉnh sửa"
                                    href="{{ route('admin.manage.edit', $admin->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                </a>
                                <a class="btn btn-secondary btn-sm" title="Phân quyền"
                                    href="{{ route('admin.manage.edit.permission', $admin->id) }}">
                                    <i class="fas fa-sitemap">
                                    </i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</section>
<!-- /.section -->

<!-- .modal -->
<div class="modal fade" id="modal-add" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tạo thêm người quản lý</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-add" action="{{ route('admin.manage.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputName">Tên</label>
                        <input type="text" id="inputName" name="name" class="form-control" placeholder="Username"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email"
                            required>
                    </div>
                    <p class="form-text text-muted">
                        Mật khẩu mặc định là: "123456".
                    </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Tạo</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
