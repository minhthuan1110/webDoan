@extends('backend.master')

@push('title', 'Report')

@section('script')
<script src="{{ asset('js/custom-function.js') }}"></script>
<script type="text/javascript">
    // Active Sidebar
    // $('#link-report').parent().addClass('activemenu-is-opening menu-open');
    $('#link-report, #link-report-manage').addClass('active');
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header"style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Report</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Report</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<!-- Main content -->
<section class="container">
    <!-- Default box -->
    <div class="card">
        <!-- .card-header -->
        <div class="card-header">
            <h3 class="card-title">
                {{-- <a href="{{ route('admin.report.pdf') }}" class="btn btn-xs btn-success">
                    <i class="fas fa-plus-circle"></i>&nbsp;
                    Export PDF
                </a> --}}
                Báo cáo doanh thu trong 30 ngày qua
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
        <form action="{{ route('admin.report.pdf') }}" method="post">
            @csrf
            <!-- .card-body -->
            <div class="card-body table-responsive p-0" style="min-height: 65vh;">
                <input type="hidden" name="stat" value="{{ $stats }}">
                <input type="hidden" name="total_number_of_booking" value="{{ $totalNumberOfBooking }}">
                <input type="hidden" name="total_price" value="{{ $totalPrice }}">

                <table class="table table-sm table-bordered table-striped table-hover table-head-fixed text-center">
                    <thead>
                        <tr>
                            <th class="text-wrap">Ngày</th>
                            <th class="text-wrap">Số đơn book</th>
                            <th class="text-wrap">Số tiền</th>
                        </tr>
                    </thead>
                    <tbody id="list-data">
                        @foreach ($stats as $stat)
                        <tr>
                            <td class="text-wrap">{{ $stat->date }}</td>
                            <td class="text-wrap">{{ $stat->number_of_booking }}</td>
                            <td class="text-wrap">{{ number_format($stat->price, 0, ',', ' ') }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td>Tổng số đơn book: {{ $totalNumberOfBooking }}</td>
                            <td>Tổng tiền: {{ number_format($totalPrice, 0, ',', ' ') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Xuất PDF</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection
