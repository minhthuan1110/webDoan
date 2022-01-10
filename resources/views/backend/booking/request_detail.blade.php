@extends('backend.master')

@push('title', 'Request Detail')

@section('script')
<script type="text/javascript" src="{{ asset('/js/custom-function.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/booking-calculator.js') }}"></script>
<script type="text/javascript">
    // Active Sidebar
    $('#link-booking').parent().addClass('activemenu-is-opening menu-open');
    $('#link-booking, #link-booking-request').addClass('active');
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header" style="margin-top:50px;">
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
                    <li class="breadcrumb-item"><a href="{{ route('admin.booking.request.index') }}">Request</a></li>
                    <li class="breadcrumb-item active">Detail</li>
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
            <h3 class="card-title">Booking request detail <span class="font-italic">ID: {{ $booking->booking_id
                    }}</span></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->

        <form action="{{ route('admin.booking.request.update', $booking->booking_id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <!-- .card-body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                <label for="">Booking code:</label> {{ $booking->booking_code }}
                            </p>
                            <input type="hidden" name="booking_code" value="{{ $booking->booking_code }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                <label for="">User:</label> {{ $booking->full_name }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                <label for="">Phone:</label> {{ $booking->phone }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                <label for="">Email:</label> {{ $booking->email }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                <label for="">Address:</label> {{ $booking->address }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                <label for="">Note:</label> {{ $booking->note }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                <label for="">Tour:</label> {{ $booking->tour_name }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <p>
                                <label for="">Tour code:</label> {{ $booking->tour_code }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <p>
                                <label for="">Tour slot:</label> {{ $booking->tour_slot }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                <label for="">Status:</label>
                                {{ $booking->status == 0 ? 'Unpaid' : ($booking->status == 1 ? 'Paid' : 'Cancelled') }}
                                {{-- <select name="status" id="" class="select2cls">
                                    <option value="0">Unpaid</option>
                                    <option {{ $booking->status == 1 ? 'selected' : '' }} value="1">Paid</option>
                                    <option {{ $booking->status == 2 ? 'selected' : '' }} value="2">Cancelled
                                    </option>
                                </select> --}}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                <!-- {{ $booking->other_day }} -->
                                <label for="">Departure date:</label> {{ $booking->day }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                {{-- <label for="">Promotion:</label> {{ $booking->promotion_content ?: '(none)' }} --}}
                                <select name="promotion_id" class="promotion" id="">
                                    <option value="1">--Choose a promotion--</option>
                                    @isset($promotions)
                                    @foreach ($promotions as $prm)
                                    <option {{ $booking->promotion_id === $prm->id ? 'selected' : '' }}
                                        value="{{ $prm->id }}">{{ $prm->content }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>
                                <label for="">Created at:</label> {{ $booking->created_at }}
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
                            <td>
                                {{ number_format($booking->adult_price, 0, ',', ' ') }}
                                <input type="hidden" id="adultPrice" value="{{ $booking->adult_price }}">
                            </td>
                            <td>
                                {{ number_format($booking->youth_price, 0, ',', ' ') }}
                                <input type="hidden" id="youthPrice" value="{{ $booking->youth_price }}">
                            </td>
                            <td>
                                {{ number_format($booking->child_price, 0, ',', ' ') }}
                                <input type="hidden" id="childPrice" value="{{ $booking->child_price }}">
                            </td>
                            <td>
                                {{ number_format($booking->baby_price, 0, ',', ' ') }}
                                <input type="hidden" id="babyPrice" value="{{ $booking->baby_price }}">
                            </td>
                            <td>
                                <input id="totalPrice" type="hidden" name="total_price" readonly="readonly"
                                    value="{{ $booking->total_price }}">
                                <span class="font-italic text-bold" style="color: blue" id="viewTotalPrice">
                                    {{ number_format($booking->total_price, 0, ',', ' ') }}
                                </span><sup>đ</sup>
                            </td>
                        </tr>
                        <tr>
                            <th>Slot</th>
                            <td>
                                <input type="number" name="adult_slot" id="adultSlot"
                                    value="{{ number_format($booking->adult_slot, 0, ',', ' ') }}">
                            </td>
                            <td>
                                <input type="number" name="youth_slot" id="youthSlot"
                                    value="{{ number_format($booking->youth_slot, 0, ',', ' ') }}">
                            </td>
                            <td>
                                <input type="number" name="child_slot" id="childSlot"
                                    value="{{ number_format($booking->child_slot, 0, ',', ' ') }}">
                            </td>
                            <td>
                                <input type="number" name="baby_slot" id="babySlot"
                                    value="{{ number_format($booking->baby_slot, 0, ',', ' ') }}">
                            </td>
                            <td>
                                <input id="totalSlot" type="hidden" name="total_slot" readonly="readonly"
                                    value="{{ $booking->total_slot }}">
                                <span class="font-italic text-bold" style="color: blue" id="viewTotalSlot">
                                    {{ number_format($booking->total_slot, 0, ',', ' ') }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- .card-footer -->
            <div class="card-footer">
                <a href="{{ route('admin.booking.request.index') }}" class="btn btn-secondary">Back</a>
                @if ($booking->status == 0)
                <button type="submit" class="btn btn-success float-right" name="btn_accept"
                    value="1">Accept</button>&nbsp;
                <button type="submit" class="btn btn-warning float-right" name="btn_remove" value="1">Remove</button>
                @endif
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection
