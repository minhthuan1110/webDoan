@extends('backend.master')

@push('title', 'Tour Plan')

@section('script')
<script src="{{ asset('backend/tour-plan.js') }}"></script>
<script type="text/javascript">
    $('#link-tour').parent().addClass('activemenu-is-opening menu-open');
    $('#link-tour, #link-tour-manage').addClass('active');
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header"style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tour Plan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.tour.index') }}">Tour</a></li>
                    <li class="breadcrumb-item active">Plan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div id="list-plan">

                    @if (count($plans) > 0)

                    @foreach ($plans as $plan)
                    <div class="card card-info">
                        <div class="card-header">
                            <div class="card-title">Day: {{ $plan->day }}</div>
                        </div>
                        <form action="{{ route('admin.tour.plan.update', $plan->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="tour_id" value="{{ $tourId }}">
                                <div class="form-group col-sm-12">
                                    <label for="inputDay">Day</label>
                                    <input type="number" id="inputDay" name="day" class="form-control" min="1" required
                                        placeholder="Enter the date number of the tour" value="{{ $plan->day }}">
                                </div>
                                <div class="form-group col-12 col-sm-12">
                                    <label for="summernote">Content</label>
                                    <textarea id="summernote" name="content" class="form-control" rows="5" required
                                        placeholder="Enter the content of the day">{{ $plan->content }}</textarea>
                                </div>
                                <div class="form-group col-12 col-sm-12">
                                    <label for="inputNote">Note</label>
                                    <textarea id="inputNote" name="note" class="form-control" rows="2"
                                        placeholder="Enter the note of the day">{{ $plan->note }}</textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="btn btn-sm btn-success float-right btn-save-plan">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endforeach

                    @else

                    <div class="card card-info">
                        <div class="card-header">
                            <div class="card-title">Add new plan</div>
                        </div>
                        <form action="{{ route('admin.tour.plan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="tour_id" value="{{ $tourId }}">
                                <div class="form-group col-sm-12">
                                    <label for="inputDay">Day</label>
                                    <input type="number" id="inputDay" name="day" class="form-control" min="1" required
                                        placeholder="Enter the date number of the tour">
                                </div>
                                <div class="form-group col-12 col-sm-12">
                                    <label for="summernote">Content</label>
                                    <textarea id="summernote" name="content" class="form-control" rows="5" required
                                        placeholder="Enter the content of the day"></textarea>
                                </div>
                                <div class="form-group col-12 col-sm-12">
                                    <label for="inputNote">Note</label>
                                    <textarea id="inputNote" name="note" class="form-control" rows="2"
                                        placeholder="Enter the note of the day"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="btn btn-sm btn-success float-right btn-save-plan">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    @endif
                </div>
                <!-- button add form plan -->
            </div>
        </div>
        <div class="row">
            <div class="col" style="margin: 10px 20px 20px 20px">
                <a href="{{ route('admin.tour.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                <button type="button" class="btn btn-sm btn-info add-form float-right">Add form</button>
            </div>
        </div>
    </div>
</section>
@endsection
