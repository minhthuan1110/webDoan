@extends('backend.master')

@push('title', 'Transaction')

@section('script')
<script src="{{ asset('js/custom-function.js') }}"></script>
<script type="text/javascript">
    // Active Sidebar
    // $('#link-transaction').parent().addClass('activemenu-is-opening menu-open');
    $('#link-transaction, #link-transaction-manage').addClass('active');
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header"style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Transaction</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Transaction</li>
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
                {{-- <a href="{{ route('admin.booking.add') }}" class="btn btn-xs btn-success">
                    <i class="fas fa-plus-circle"></i>&nbsp;
                    Thêm mới
                </a> --}}
                All transactions
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
        <div class="card-body table-responsive p-0" style="height: 73vh;">
            <table class="table table-sm table-bordered table-striped table-hover table-head-fixed text-center">
                <thead>
                    <tr>
                        <th class="text-wrap">BookingCode</th>
                        <th class="text-wrap">Pthức TT</th>
                        <th class="text-wrap">Mã GD</th>
                        <th class="text-wrap">Ngân hàng</th>
                        <th class="text-wrap">Mã GD tại ngân hàng</th>
                        <th class="text-wrap">Số tiền</th>
                        <th class="text-wrap">Loại thẻ/tài khoản</th>
                        <th class="text-wrap">Trạng thái TT</th>
                        <th class="text-wrap">Nội dung TT</th>
                        <th class="text-wrap">Ngày TT</th>
                        <th class="text-wrap"></th>
                    </tr>
                </thead>

                <tbody id="list-data">
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td class="text-wrap">{{ $transaction->booking_code }}</td>
                        <td class="text-wrap">{{ $transaction->payment_method }}</td>
                        <td class="text-wrap">{{ $transaction->transaction_no }}</td>
                        <td class="text-wrap">{{ $transaction->bank_code }}</td>
                        <td class="text-wrap">{{ $transaction->bank_no }}</td>
                        <td class="text-wrap">{{ $transaction->amount }}</td>
                        <td class="text-wrap">{{ $transaction->card_type }}</td>
                        <td class="text-wrap">
                            @if ($transaction->status === 1)
                            <span class="badge badge-sm badge-success">Thành công</span>
                            @else
                            <span class="badge badge-sm badge-secondary">Thất bại</span>
                            @endif
                        </td>
                        <td class="text-wrap">{{ $transaction->content }}</td>
                        <td class="text-wrap">{{ $transaction->pay_date }}</td>
                        <td class="project-actions">
                            <div class="row">
                                <div class="col">
                                    <a class="btn btn-info btn-xs" title="View"
                                        href="{{ route('admin.transaction.show', $transaction->id)}}">
                                        <i class="fas fa-eye">
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection
