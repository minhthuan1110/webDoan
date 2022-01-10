@extends('backend.master')

@push('title', 'Tag')

@section('script')
<script src="{{ asset('js/custom-function.js') }}"></script>
<script type="text/javascript">
    // Active Sidebar
    // $('#link-dashboard').parent().addClass('activemenu-is-opening menu-open');
    $('#link-tag').addClass('active');
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header"style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tag</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Tag</li>
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
                <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal-add">
                    <i class="fas fa-plus-circle"></i>&nbsp;
                    Thêm mới
                </button>
            </h3>

            <div class="card-tools">
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" id="search" class="form-control float-right" placeholder="Search">
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
        <div class="card-body table-responsive p-0" style="display: block;">
            <table class="table table-striped table-hover table-head-fixed projects text-center">
                <thead>
                    <tr>
                        <th style="width: 20%">
                            ID
                        </th>
                        <th style="width: 40%">
                            Tên Tag
                        </th>
                        <th style="20">
                            Ngày Tạo 
                        </th>
                        <th style="width: 20%">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody id="list-data">
                    @foreach ($tags as $tag)
                    <tr>
                        <td style="opacity: .5">{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->created_at }}</td>
                        <td class="project-actions">
                            <div class="row">
                                <div class="col">
                                    <a class="btn btn-info btn-sm" title="Edit"
                                        href="{{ route('admin.tag.edit', $tag->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                    </a>
                                    <a class="btn btn-danger btn-sm btn-delete" title="Delete"
                                        href="{{ route('admin.tag.delete', $tag->id) }}">
                                        <i class="fas fa-trash">
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

<!-- .modal -->
<div class="modal fade" id="modal-add" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Tag</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add" action="{{  route('admin.tag.store')  }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <input class="form-control" type="text" name="name" id="name" placeholder="Nhập tên tag"
                                required="">
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
