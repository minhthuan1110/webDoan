@extends('backend.master')

@push('title', 'Edit Booking')

@section('script')
<script type="text/javascript">
    // Active Sidebar
    $('#link-booking').parent().addClass('activemenu-is-opening menu-open');
    $('#link-booking, #link-booking-manage').addClass('active');
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header"style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Booking</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.booking.index') }}">Booking</a></li>
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
    <div class="card card-primary">
        <!-- .card-header -->
        <div class="card-header">
            <h3 class="card-title">Edit Booking <span class="font-italic">ID: {{ $booking->id }}</span></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->

        <form action="{{ route('admin.booking.update', $booking->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- .card-body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                <label for="">Code:</label> {{ $booking->code }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                <label for="">User:</label> {{ $booking->user_name }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <p>
                                <label for="">Tour:</label> {{ $booking->tour_name }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                <label for="">Status:</label>
                                <select name="status" id="" class="select2cls">
                                    <option {{ $booking->status == 0 ? 'selected' : '' }} value="0">Not Paid</option>
                                    <option {{ $booking->status == 1 ? 'selected' : '' }} value="1">Paid</option>
                                    <option {{ $booking->status == 2 ? 'selected' : '' }} value="2">Error/Cancelled
                                    </option>
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                <label for="">Departure date:</label> {{ $booking->day }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                <label for="">Payment:</label> {{ $booking->payment_name }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                <label for="">Promotion:</label> {{ $booking->promotion_content ?: '(none)' }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                <label for="">Created at:</label> {{ $booking->created_at }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                <label for="">Updated at:</label> {{ $booking->updated_at }}
                            </p>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Adult</th>
                            <th>Youth</th>
                            <th>Child</th>
                            <th>Baby</th>
                            <th class="font-italic">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Price</th>
                            <td>{{ number_format($booking->adult_price, 0, ',', ' ') }}</td>
                            <td>{{ number_format($booking->youth_price, 0, ',', ' ') }}</td>
                            <td>{{ number_format($booking->child_price, 0, ',', ' ') }}</td>
                            <td>{{ number_format($booking->baby_price, 0, ',', ' ') }}</td>
                            <td>
                                <span class="font-italic text-bold" style="color: blue">{{
                                    number_format($booking->total_price, 0, ',', ' ') }}
                                    <sup>đ</sup></span>
                            </td>
                        </tr>
                        <tr>
                            <th>Slot</th>
                            <td>{{ number_format($booking->adult_slot, 0, ',', ' ') }}</td>
                            <td>{{ number_format($booking->youth_slot, 0, ',', ' ') }}</td>
                            <td>{{ number_format($booking->child_slot, 0, ',', ' ') }}</td>
                            <td>{{ number_format($booking->baby_slot, 0, ',', ' ') }}</td>
                            <td>
                                <span class="font-italic text-bold" style="color: blue">{{
                                    number_format($booking->total_slot, 0, ',', ' ')
                                    }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- .card-footer -->
            <div class="card-footer">
                <a href="{{ route('admin.tour.index') }}" class="btn btn-secondary">Cancel</a>
                @if ($booking->status == 0 || $booking->status == 2)
                <button type="submit" class="btn btn-success float-right">Save</button>
                @endif
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection
