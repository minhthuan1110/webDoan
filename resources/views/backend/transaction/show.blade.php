@extends('backend.master')

@push('title', 'Show trấnction')

@section('script')
<script type="text/javascript">
    // Active Sidebar
    // $('#link-dashboard').parent().addClass('activemenu-is-opening menu-open');
    $('#link-transaction').addClass('active');
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header"style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Show Transaction</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.transaction.index') }}">Transaction</a>
                    </li>
                    <li class="breadcrumb-item active">Show</li>
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
                    <h3 class="card-title">Detail transaction</h3>
                </div>
                <!-- /.card-header-->

                {{-- <form action="{{ route('admin.tag.update', $tag->id) }}" method="post"> --}}
                    {{-- @csrf --}}
                    <!-- .card-body -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Booking Code:</label>
                            {{ $transaction->booking_code }}
                        </div>
                        <div class="form-group">
                            <label for="">Phương thức thanh toán:</label>
                            {{ $transaction->payment_method }}
                        </div>
                        <div class="form-group">
                            <label for="">Mã giao dịch
                                <i class="far fa-question-circle" style="opacity: .3"
                                    title="Mã giao dịch tại phương thức thanh toán. Ví dụ: phương thức thanh toán là VNPAY thì đây là mã giao dịch tại VNPAY (không phải Mã GD tại ngân hàng)"></i>:</label>
                            {{ $transaction->transaction_no }}
                        </div>
                        <div class="form-group">
                            <label for="">Mã Ngân hàng:</label>
                            {{ $transaction->bank_code }}
                        </div>
                        <div class="form-group">
                            <label for="">Mã giao dịch tại ngân hàng:</label>
                            {{ $transaction->bank_no }}
                        </div>
                        <div class="form-group">
                            <label for="">Số tiền:</label>
                            {{ number_format($transaction->amount, 0, ',',' ') }} <sup>đ</sup>
                        </div>
                        <div class="form-group">
                            <label for="">Loại thẻ/tài khoản:</label>
                            {{ $transaction->card_type }}
                        </div>
                        <div class="form-group">
                            <label for="">Trạng thái:</label>
                            @if ($transaction->status === 1)
                            <span class="badge badge-success">Thành công</span>
                            @else
                            <span class="badge badge-secondary">Thất bại</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung thanh toán:</label>
                            {{ $transaction->content }}
                        </div>
                        <div class="form-group">
                            <label for="">Ngày thanh toán:</label>
                            {{ $transaction->pay_date }}
                        </div>
                        <div class="form-group">
                            <label for="inputCreatedAt">Created at:</label>
                            {{ date('m-d-Y H:i:s', strtotime($transaction->created_at)) }}
                        </div>
                        <div class="form-group">
                            <label for="inputCreatedAt">Updated at:</label>
                            {{ date('m-d-Y H:i:s', strtotime($transaction->updated_at)) }}
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <!-- .card-footer -->
                    <div class="card-footer">
                        <a href="{{ route('admin.transaction.index') }}" class="btn btn-secondary">Back</a>
                        {{-- <button type="submit" class="btn btn-success float-right">Save</button> --}}
                    </div>
                    <!-- /.card-footer -->
                    {{--
                </form> --}}

            </div>
            <!-- /.card -->

        </div>
    </div>
</section>

<!-- /.content -->
@endsection
