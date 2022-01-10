@extends('backend.master')

@push('title', 'Add Promotion')

@section('script')
<script type="text/javascript">
    // Active Sidebar
    $('#link-promotion').parent().addClass('activemenu-is-opening menu-open');
    $('#link-promotion, #link-add-promotion').addClass('active');
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header"style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tạo khuyến mại </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.promotion.index') }}">Khuyến mại</a></li>
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
    <div class="row">
        <div class="col-md-12">
            <!-- .card -->
            <div class="card card-primary">
                <!-- .card-header -->
                <div class="card-header">
                    <h3 class="card-title">Tạo khuyến mại mới</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header-->

                <form action="{{ route('admin.promotion.store') }}" method="POST">
                    @csrf
                    <!-- .card-body -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputContent">Tên nội dung khuyến mại</label>
                            <input type="text" id="inputContent" name="content" class="form-control"
                                placeholder="Enter the content of the promotion">
                        </div>
                        <div class="form-group">
                            <label for="inputCode"> Mã Code
                                <i class="far fa-question-circle"
                                    title="Mã code viết liền không dấu, có phân biệt chữ hoa và chữ thường"
                                    style="opacity: .3; font-size: 12px"></i>
                            </label>
                            <input type="text" id="inputCode" name="code" class="form-control"
                                placeholder="Example: GiamGia100k">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputStartDate">Ngày bắt đầu khuyến mại</label>
                                    <input type="date" name="start_date" id="inputStartDate" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEndDate">Ngày kết thúc</label>
                                    <input type="date" name="end_date" id="inputEndDate" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNumber">Số lượng </label>
                            <input type="number" name="number" id="inputNumber" class="form-control" min="0" value="0">
                        </div>
                        <div class="form-group">
                            <label for="inputType">Định dạng</label>
                            <select id="inputType" name="type" class="form-control custom-select">
                                <option selected="" value="VND">VND</option>
                                <option value="%">%</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputAmount">Số lượng mã</label>
                            <input type="number" name="amount" id="inputAmount" class="form-control" min="0" value="0">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <!-- .card-footer -->
                    <div class="card-footer">
                        <a href="{{ route('admin.promotion.index') }}" class="btn btn-secondary">Thoát</a>
                        <button type="submit" class="btn btn-success float-right">Tạo</button>
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
