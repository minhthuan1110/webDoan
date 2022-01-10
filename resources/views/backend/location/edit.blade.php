@extends('backend.master')

@push('title', 'Edit Location')

@section('script')
<script type="text/javascript">
    // Active Sidebar
    $('#link-area-location').parent().addClass('activemenu-is-opening menu-open');
    $('#link-area-location, #link-location').addClass('active');
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header"style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Cập nhật địa điểm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.location.index') }}">Địa điểm</a></li>
                    <li class="breadcrumb-item active">Cập nhật</li>
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
                    <h3 class="card-title">Chỉnh sửả địa điểm</h3>
                </div>
                <!-- /.card-header-->

                <form action="{{ route('admin.location.update', $location->id) }}" method="post">
                    @csrf
                    <!-- .card-body -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Tên địa điểm</label>
                            <input class="form-control" type="text" name="name" id="name"
                                placeholder="Nhập tên Địa điểm" required="" value="{{ $location->name }}">
                        </div>
                        <div class="form-group">
                            <label for="selectArea">Thuộc khu vực</label>
                            <select name="area_id" id="selectArea" class="form-control custom-select" required>
                                <option value="">-- Chọn khu vực --</option>
                                @foreach ($areas as $item)
                                <option {{ $location->area_id === $item->id ? 'selected' : '' }}
                                    value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Nội dung</label>
                            <textarea name="description" id="description" class="form-control" rows="9"
                                placeholder="Nhập mô tả về khu vực">{{ $location->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputCreatedAt">Created at</label>
                            <input type="" id="inputCreatedAt" class="form-control" disabled
                                value="{{ date('m-d-Y H:i:s', strtotime($location->created_at)) }}">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <!-- .card-footer -->
                    <div class="card-footer">
                        <a href="{{ route('admin.location.index') }}" class="btn btn-secondary">Thoát</a>
                        <button type="submit" class="btn btn-success float-right">Cập nhật</button>
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
