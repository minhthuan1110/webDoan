@extends('backend.master')

@push('title', 'Tạo đơn Booking')

@section('script')
<script>
    // Active Sidebar
    $('#link-booking').parent().addClass('activemenu-is-opening menu-open');
    $('#link-booking, #link-add-booking').addClass('active');

// BS-Stepper Init
document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
});
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header" style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tạo đơn đặt tour</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.booking.index') }}">Booking</a></li>
                    <li class="breadcrumb-item active">Add</li>
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
                    <!-- .card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Tạo đơn đặt tour</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header-->

                    <form action="{{ route('admin.booking.store1') }}" method="post">
                        @csrf
                        <!-- .card-body -->
                        <div class="card-body">
                            <!-- conten cua form -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="selectUser">Khách hàng</label>
                                        <select name="user_id" id="selectUser" class="form-control" required>
                                            <option value="">-- Select user --</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="selectPayment">Phương thức thanh toán</label>
                                                <select name="payment_id" id="selectPayment" class="form-control"
                                                    required>
                                                    <option value="">-- Select Payment --</option>
                                                    @foreach ($payments as $payment)
                                                    <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputStatus">Trạng thái</label>
                                                <select id="inputStatus" name="status"
                                                    class="form-control custom-select">
                                                    <option selected="" value="1">Đã t.toán</option>
                                                    <option value="0">Chưa t.toán</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="selectTour">Tour</label>
                                <select name="tour_id" id="selectTour" class="form-control" required>
                                    <option value="">-- Chọn Tour --</option>
                                    @foreach ($tours as $tour)
                                    <option {{ $tour->id == $tourId ? 'selected' : '' }} value="{{ $tour->id }}">
                                        {{ $tour->name }} --- {{ $tour->slot }} slot
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <!-- .card-footer -->
                        <div class="card-footer">
                            <a href="{{ route('admin.booking.index') }}" class="btn btn-secondary">Quay lại quản lý</a>
                            <button type="submit" class="btn btn-success float-right">Tiếp</button>
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
