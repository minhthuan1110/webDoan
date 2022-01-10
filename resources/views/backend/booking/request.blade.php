@extends('backend.master')

@push('title', 'Booking Request')

@section('script')
<script src="{{ asset('js/custom-function.js') }}"></script>
<script type="text/javascript">
    // Active Sidebar
    $('#link-booking').parent().addClass('activemenu-is-opening menu-open');
    $('#link-booking, #link-booking-request').addClass('active');
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header"style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Booking Request</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.booking.index') }}">Booking</a></li>
                    <li class="breadcrumb-item active">Request</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="card">
        <!-- .card-header -->
        <div class="card-header">
            <h3 class="card-title">
                Request from customer
                {{-- <a href="{{ route('admin.booking.add') }}" class="btn btn-xs btn-success">
                    <i class="fas fa-plus-circle"></i>&nbsp;
                    Thêm mới
                </a> --}}
            </h3>

            <div class="card-tools">
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" id="search" class="form-control float-right" placeholder="Search">
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
        <div class="card-body table-responsive p-0" style="height: 73vh;">
            @if (count($bookings) > 0)
            <table class="table table-sm table-bordered table-striped table-hover table-head-fixed text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tour</th>
                        <th>Tên khách hàng</th>
                        <th>Số lượng vé</th>
                        <th>Day</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody  id="list-data">
                    @foreach ($bookings as $booking)
                    <tr class="form-group-action-card"> 
                        <td>{{ $booking->id }}</td>
                        <td class="text-wrap">{{ $booking->tour_name }}</td>
                        <td class="text-wrap">{{ $booking->full_name }}</td>
                        <td>{{ $booking->total_slot }}</td>
                        <td>{{ $booking->other_day }}</td>
                        <td class="project-actions">
                            <div class="row">
                                <div class="col">
                                    <a class="btn btn-info btn-xs" title="Detail"
                                        href="{{ route('admin.booking.request.detail', $booking->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            @else
            <h2>No booking request</h2>
            @endif
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection
