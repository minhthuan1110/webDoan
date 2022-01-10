@extends('backend.master')

@push('title', 'Edit Payment')

@section('script')
<script type="text/javascript">
    // Active Sidebar
    // $('#link-dashboard').parent().addClass('activemenu-is-opening menu-open');
    $('#link-payment').addClass('active');
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header"style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Payment</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.payment.index') }}">Payment</a></li>
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
                    <h3 class="card-title">Edit Payment</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header-->

                <form action="{{ route('admin.payment.update', $payment->id) }}" method="post">
                    @csrf
                    <!-- .card-body -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" id="inputName" name="name" class="form-control"
                                placeholder="Enter the name of the payment" value="{{ $payment->name }}">
                        </div>
                        <div class="form-group">
                            <label for="textDescription">Description</label>
                            <textarea name="description" id="textDescription" rows="10"
                                class="form-control">{{ $payment->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputCreatedAt">Created at</label>
                            <input type="text" id="inputCreatedAt" class="form-control" disabled
                                value="{{ date('d-m-Y H:i:s', strtotime($payment->created_at)) }}">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <!-- .card-footer -->
                    <div class="card-footer">
                        <a href="{{ route('admin.payment.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success float-right">Save</button>
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
