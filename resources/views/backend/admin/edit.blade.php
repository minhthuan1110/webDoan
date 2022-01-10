@extends('backend.master')

@push('title', 'Edit Admin')

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
                <h1 class="m-0">Edit Admin</h1>
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
                        <h3 class="card-title">Edit admin</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header-->

                    <form action="{{ route('admin.manage.update', $admin->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- .card-body -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" id="inputName" name="name" class="form-control"
                                    placeholder="Username" required value="{{ $admin->name }}">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" name="email" id="inputEmail" class="form-control"
                                    placeholder="Email" required value="{{ $admin->email }}">
                            </div>
                            <p class="form-text text-muted">
                                Default password is "123456".
                            </p>
                            <div class="form-group">
                                <label for="inputPhone">Phone</label>
                                <input type="tel" name="phone" id="inputPhone" class="form-control"
                                    placeholder="Phone number" value="{{ $admin->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" id="" class="form-control" placeholder="Address"
                                    value="{{ $admin->address }}">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <!-- .card-footer -->
                        <div class="card-footer">
                            <a href="{{ route('admin.manage.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success float-right">Save</button>
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
