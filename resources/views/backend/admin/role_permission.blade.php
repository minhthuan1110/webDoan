@extends('backend.master')

@push('title', 'Phân quyền Admin')

@section('script')
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
                <h1 class="m-0">Phân quyền Admin</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.manage.index') }}">Admin</a></li>
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- .card -->
                <div class="card card-primary">
                    <!-- .card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Phân quyền admin</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header-->

                    <form action="{{ route('admin.manage.update.permission', $admin->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- .card-body -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input id="inputName" class="form-control" type="text" name=""
                                    value="{{ $admin->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="roleId">Vai trò</label>
                                <select name="role_id[]" id="roleId" class="form-control select2cls"
                                    data-placeholder="Chọn vai trò" multiple>
                                    @php
                                    $adRolesIds = $admin->roles->pluck('id')->toArray();
                                    @endphp
                                    @foreach ($roles as $role)
                                    <option {{ in_array($role->id, $adRolesIds)?'selected':'' }} value="{{
                                        $role->id }}">
                                        {{ $role->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="permissionId">Quyền</label>
                                <select name="permission_id[]" id="permissionId" class="form-control select2cls"
                                    data-placeholder="Chọn quyền" multiple>
                                    @php
                                    $adPermissionsIds = $admin->permissions->pluck('id')->toArray();
                                    @endphp
                                    @foreach ($permissions as $permission)
                                    <option {{ in_array($permission->id, $adPermissionsIds)?'selected':'' }}
                                        value="{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <!-- .card-footer -->
                        <div class="card-footer">
                            <a href="{{ route('admin.manage.index') }}" class="btn btn-secondary">Quay lại</a>
                            <button type="submit" class="btn btn-success float-right">Lưu</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>

                </div>
                <!-- /.card -->

            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection
