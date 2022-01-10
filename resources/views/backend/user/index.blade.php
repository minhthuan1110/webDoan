@extends('backend.master')

@push('title', 'User Manage')

@section('script')
<script type="text/javascript" src="{{ asset('js/custom-function.js') }}"></script>
<script type="text/javascript">
    // Active Sidebar
    // $('#link-user').parent().addClass('activemenu-is-opening menu-open');
    $('#link-user').addClass('active');
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header"style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Khách hàng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">User</li>
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
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="list-data">
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                @if(empty($user->avatar_image_path) && empty($user->profile_photo_path))
                                <p class="font-italic" style="opacity: .3">(None)</p>
                                @else
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <img src="{{ $user->avatar_image_path ? asset($user->avatar_image_path) : $user->profile_photo_path }}"
                                            alt="Image of {{ $user->name }}" style="height: 80px">
                                    </li>
                                </ul>
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" title="Edit"
                                    href="{{ route('admin.user.edit', $user->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                </a>
                                {{-- <a class="btn btn-danger btn-sm btn-delete" title="Delete"
                                    href="{{ route('admin.user.delete', $user->id) }}">
                                    <i class="fas fa-trash">
                                    </i>
                                </a> --}}
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

<!-- .modal -->
<div class="modal fade" id="modal-add" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-add" action="{{ route('admin.user.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" id="inputName" name="name" class="form-control" placeholder="Username"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email"
                            required>
                    </div>
                    <p class="form-text text-muted">
                        Default password is "123456".
                    </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
