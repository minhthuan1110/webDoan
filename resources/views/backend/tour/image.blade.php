@extends('backend.master')

@push('title', 'Tour Image')

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header"style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Tour Image</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.tour.index') }}">Tour</a></li>
                    <li class="breadcrumb-item active">Image</li>
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
        <div class="row">
            <div class="col-md-12">

                <!-- .card -->
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title">Tour Image</div>
                    </div>
                    <div class="card-body">
                        {{-- content --}}
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.tour.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- Main content -->
@endsection
