@extends('backend.master')

@push('title', 'About Us')

@section('script')
<script src="{{ asset('js/custom-function.js') }}"></script>
<script type="text/javascript">
    // Active Sidebar
    $('#link-page').parent().addClass('activemenu-is-opening menu-open');
    $('#link-page, #link-about-page').addClass('active');
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header"style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">About Us</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">About Us</li>
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
            <div class="card card-primary card-outline card-outline-tabs">
                <!-- .card-header -->
                {{-- <h3 class="card-title">About Us</h3> --}}
                <div id="tabs">
                    <ul>
                        <li><a href="#tabs-1">About Us page</a></li>
                        <li><a href="#tabs-2">Social link</a></li>
                    </ul>
                <!-- /.card-header-->
                <!-- .card-body -->
                    <div id="tabs-1">
                        <!-- tab about us -->
                        <form action="{{ route('admin.about.update', $about->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="summernote">About us</label>
                                <textarea id="summernote" class="form-control" name="about_us"
                                    rows="10">{{ $about->about_us }}</textarea>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right">Save</button>
                            </div>
                        </form>
                    </div>
                    <div id="tabs-2">
                        <!-- tab social link -->
                        <form action="{{ route('admin.about.update', $about->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Facebook link</label>
                                <input type="text" class="form-control" name="facebook" id=""
                                    value="{{ $about->facebook }}">
                            </div>
                            <div class="form-group">
                                <label for="">Youtube link</label>
                                <input type="text" class="form-control" name="youtube" id=""
                                    value="{{ $about->youtube }}">
                            </div>
                            <div class="form-group">
                                <label for="">Instagram link</label>
                                <input id="" class="form-control" type="text" name="instagram"
                                    value="{{ $about->instagram }}">
                            </div>
                            <div class="form-group">
                                <label for="">Twitter link</label>
                                <input id="" class="form-control" type="text" name="twitter"
                                    value="{{ $about->twitter }}">
                            </div>
                            <div class="form-group">
                                <label for="">Pinterest link</label>
                                <input id="" class="form-control" type="text" name="pinterest"
                                    value="{{ $about->pinterest }}">
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
                <!-- .card-footer -->
                {{-- <div class="card-footer">
                    <button type="submit" class="btn btn-success float-right">Save</button>
                </div> --}}
                <!-- /.card-footer -->

            </div>
            <!-- /.card -->

        </div>
    </div>
</section>
<!-- /.content -->

@endsection
