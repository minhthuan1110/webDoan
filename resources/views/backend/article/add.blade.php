@extends('backend.master')

@push('title', 'Add Article')

@section('script')
<script type="text/javascript">
    // Active Sidebar
    $('#link-article').parent().addClass('activemenu-is-opening menu-open');
    $('#link-article, #link-add-article').addClass('active');
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header" style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Thêm bài viết </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.article.index') }}">Bài viết</a></li>
                    <li class="breadcrumb-item active">Tạo bài viết</li>
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
                    <h3 class="card-title">Tạo bài viết mới.</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header-->

                <form action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="admin_id" value="{{ auth('admin')->id() }}">
                    <!-- .card-body -->
                    <div class="card-body">
                        <div class="form-group d-flex justify-content-center">
                            <div class="form-group text-center" style="margin-bottom:50px">
                                <label for="exampleInputFile">Ảnh tiêu đề</label>
                                <div class="input-group">
                                    <label class="show-img_add" for="exampleInputFile" style="width:100%;height:100%">
                                        <div class="text-center" width="100%">
                                            <div class="img-tour_add disabled" style="height:300px;position: inherit;">
                                                <div class="img-tour_add-show">
                                                    <img src="" alt="" id="image" width="100%" height="100%">
                                                </div>
                                                <span class="img-tour_link"> </span>
                                            </div>
                                            <div class="img-tour_file ">
                                                <i class="fas fa-plus icon-add_tour" style="font-size:20px;">600 x
                                                    600</i>
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    onChange="chooseFile(this)" name="image"
                                                    accept="image/gif,image/jpeg,image/png">
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Tiêu đề</label>
                            <input type="text" id="inputName" name="title" class="form-control"
                                placeholder="Enter article title">
                        </div>
                        <div class="form-group">
                            <label for="summernote">Nội dung</label>
                            <textarea id="summernote" name="content" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Trạng thái</label>
                            <select id="inputStatus" name="display" class="form-control custom-select">
                                <option selected="" value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <!-- .card-footer -->
                    <div class="card-footer">
                        <a href="{{ route('admin.article.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success float-right">Save</button>
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
