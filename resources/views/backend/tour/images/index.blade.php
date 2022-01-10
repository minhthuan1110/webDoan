@extends('backend.master')
@push('title', 'Anh Tour')
@section('header')
<!-- Content Header (Page header) -->
<div class="content-header " style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tạo tour du lịch </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.tour.index') }}">Tour</a></li>
                    <li class="breadcrumb-item active">Tạo tour</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal-add">
                        <i class="fas fa-plus-circle"></i>&nbsp;
                        Thêm mới
                    </button>
                </h3>
            </div>
            <div class="card-body">
                <div class="container">
                    <div id="list-image">
                        @foreach ($images as $img)
                        <div class="list-image__wrap">
                            <img src="{{ asset($img->image_path) }}" alt="{{ $img->id }}">
                            <a href="{{ url('/tour/image/'.$img->id) }}" class="btn btn-secondary">Xoa</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Submit</button>
            </div>
        </div>
    </div>
<!-- .modal -->
<div class="modal fade" id="modal-add" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm ảnh</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add" method="POST"  action="{{ url('/image/save') }}" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="file" name="images[]" placeholder="Choose images" multiple >
                            </div>
                            <input type="hidden" name="tour_id" value="{{ $tourId }}" data-id="{{ $tourId }}">
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection



