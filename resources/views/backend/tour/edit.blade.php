@extends('backend.master')

@push('title', 'Sửa Tour')

@section('script')
<script src="{{ asset('backend/tour-plan.js') }}"></script>
<script type="text/javascript">
    // Active Sidebar
    $('#link-tour').parent().addClass('activemenu-is-opening menu-open');
    $('#link-tour, #link-tour-manage').addClass('active');
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header" style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Sửa Tour</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.tour.index') }}">Tour</a></li>
                    <li class="breadcrumb-item active">Sửa</li>
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
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-tabs">
                    <div id="tabs">
                        <!-- .card-header -->
                        <ul>
                            <li><a href="#tabs-1">Sửa tour</a></li>
                            <li><a href="#tabs-2">Kế hoạch</a></li>
                            <li><a href="#tabs-3">Ảnh</a></li>
                        </ul>
                        <!-- /.card-header -->
                        <!-- .card-body -->
                        <!-- tab 1 -->
                        <div id="tabs-1">
                            <form action="{{ route('admin.tour.update', $tour->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="inputName">Nhập tên tour *</label>
                                                <input type="text" id="inputName" name="name" class="form-control"
                                                    placeholder="Nhập tên tour" required value="{{ $tour->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="inputStatus">Trạng thái</label>
                                                <select id="inputStatus" name="display"
                                                    class="form-control custom-select">
                                                    <option {{ $tour->display === 1 ? 'selected' : '' }} value="1">Hiển
                                                        thị
                                                    </option>
                                                    <option {{ $tour->display !== 1 ? 'selected' : '' }} value="0">Ẩn
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group text-center" style="margin-bottom:50px">
                                                <label for="exampleInputFile">Ảnh tour</label>
                                                <div class="input-group">
                                                    <label class="show-img_add" for="exampleInputFile">
                                                        <div class="text-center" width="100%">
                                                            <div class="img-tour_add disabled">
                                                                <div class="img-tour_add-show">
                                                                    <img src="" alt="" id="image" width="100%"
                                                                        height="100%">
                                                                </div>
                                                                <span class="img-tour_link"> </span>
                                                            </div>
                                                            <div class="img-tour_file ">
                                                                <img src="{{ $tour->image_path??'none' }}"
                                                                    class="fas fa-plus icon-add_tour" id="show_edit-img"
                                                                    alt="tour img">
                                                                <input type="file" class="custom-file-input"
                                                                    id="exampleInputFile" onChange="chooseFile(this)"
                                                                    name="image"
                                                                    accept="image/gif,image/jpeg,image/png">
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Giá người lớn:(từ 12 tuổi trở lên)*</label>
                                                        <input type="number" name="adult_price" min="0"
                                                            class="form-control" required
                                                            value="{{ $tour->adult_price }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Giá trẻ em:(từ 5 tuổi đến 11 tuổi)</label>
                                                        <input type="number" name="youth_price" min="0"
                                                            class="form-control" required
                                                            value="{{ $tour->youth_price }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Giá trẻ nhỏ:(từ 2 tuổi đến 4 tuổi)</label>
                                                        <input type="number" name="child_price" min="0"
                                                            class="form-control" required
                                                            value="{{ $tour->child_price }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Giá em bé:(dưới 2 tuổi)</label>
                                                        <input type="number" name="baby_price" min="0"
                                                            class="form-control" required
                                                            value="{{ $tour->baby_price }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Số lượng vé:</label>
                                                        <input type="number" name="slot" class="form-control" min="0"
                                                            required value="{{ $tour->slot }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="">Những ngày khởi hành:</label>
                                                        <input type="text" name="other_day" class="form-control date"
                                                            placeholder="Ngày khởi hành khác" required
                                                            value="{{ $tour->other_day }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputCode">Code
                                                    <i class="far fa-question-circle"
                                                        title="Mã code chỉ được tạo khi thêm mới tour."
                                                        style="opacity: .3; font-size: 12px"></i>
                                                </label>
                                                <input type="text" id="inputCode" name="code" class="form-control"
                                                    disabled required
                                                    placeholder="Click vào nút bên cạnh để tạo mã code"
                                                    value="{{ $tour->code }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Địa Điểm xuất phát *</label>
                                                <input type="text" name="departure_location" class="form-control"
                                                    placeholder="Địa điểm xuất phát" required
                                                    value="{{ $tour->departure_location }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Điểm đến *</label>
                                                <input type="text" name="destination" class="form-control"
                                                    placeholder="Đích đến" required value="{{ $tour->destination }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Thời gian khởi hành</label>
                                                <input type="text" name="departure_time" class="form-control"
                                                    placeholder="Thời gian khởi hành"
                                                    value="{{ $tour->departure_time }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Thời gian trở về</label>
                                                <input type="text" name="return_time" class="form-control"
                                                    placeholder="Thời gian trở về" value="{{ $tour->return_time }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Hành trình:</label>
                                        <input type="text" name="itinerary" class="form-control"
                                            placeholder="Hành trình" required value="{{ $tour->itinerary }}">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="selectArea">Khu vực *</label>
                                                <select name="area_id" id="selectArea"
                                                    class="form-control custom-select" required>
                                                    <option value="">-- Choose an area --</option>
                                                    @foreach ($areas as $area)
                                                    <option {{ $area->id === $tour->area_id ? 'selected' : '' }}
                                                        value="{{ $area->id }}">{{ $area->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="selectLocation">Địa điểm *</label>
                                                <select name="location_id" id="selectLocation"
                                                    class="form-control custom-select" required>
                                                    <option value="">-- Choose an location --</option>
                                                    @foreach ($locations as $location)
                                                    <option {{ $location->id === $tour->location_id ? 'selected' : '' }}
                                                        value="{{ $location->id }}">{{ $location->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="textDescription">Mô tả:</label>
                                        <textarea id="textDescription" name="description" class="form-control" rows="4"
                                            placeholder="Nhập mô tả ngẵn cho tour"
                                            required>{{ $tour->description }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group" data-select2-id="111">
                                                <label for="selectPromotion">Áp dụng khuyến mãi</label>
                                                <div class="select2-purple" data-select2-id="101">
                                                    <select name="promotion_id[]" id="selectPromotion"
                                                        class="select2 select2-hidden-accessible" multiple=""
                                                        data-placeholder="Lựa chọn khuyến mãi..."
                                                        data-dropdown-css-class="select2-purple" style="width: 100%;"
                                                        data-select2-id="15" tabindex="-1" aria-hidden="true">
                                                        @php
                                                        $promotionIds = $tour->promotions->pluck('id')->toArray();
                                                        @endphp
                                                        @foreach ($promotions as $promotion)
                                                        <option {{ in_array($promotion->id, $promotionIds) ? 'selected'
                                                            : '' }}
                                                            value="{{ $promotion->id }}">
                                                            {{ $promotion->content }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" data-select2-id="54">
                                                <label for="selectTag">Nhãn</label>
                                                <select name="tag_id[]" id="selectTag"
                                                    class="select2 select2-hidden-accessible" multiple=""
                                                    data-placeholder="Lựa chọn hình thức tour..." style="width: 100%;"
                                                    data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                    @php
                                                    $tagIds = $tour->tags->pluck('id')->toArray();
                                                    @endphp
                                                    @foreach ($tags as $tag)
                                                    <option {{ in_array($tag->id, $tagIds) ? 'selected' : '' }}
                                                        value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" data-select2-id="54">
                                                <label for="selectVehicle">Phương tiện di chuyển</label>
                                                <select name="vehicle_id[]" id="selectVehicle"
                                                    class="select2 select2-hidden-accessible" multiple=""
                                                    data-placeholder="Lựa chọn hình thức tour..." style="width: 100%;"
                                                    data-select2-id="10" tabindex="-1" aria-hidden="true">
                                                    @php
                                                    $vehicleIds = $tour->vehicles->pluck('id')->toArray();
                                                    @endphp
                                                    @foreach ($vehicles as $vehicle)
                                                    <option {{ in_array($vehicle->id, $vehicleIds) ? 'selected' : '' }}
                                                        value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="include">Dịch vụ được kèm theo:</label>
                                                <input type="hidden" name="include_value_id"
                                                    value="{{ $includes ? $includes->id : '' }}">
                                                <select name="include[]" id="include"
                                                    class="form-control select2tagging" multiple
                                                    data-placeholder="Enter more include">
                                                    @if (collect($includes)->isNotEmpty())
                                                    @foreach (json_decode($includes->value) as $key => $value)
                                                    <option selected value="{{ $value }}">{{ $value }}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group" style="margin:0px 20px;">
                                                <label for="notInclude">Dịch vụ không kèm theo:</label>
                                                <input type="hidden" name="not_include_value_id"
                                                    value="{{ $notIncludes ? $notIncludes->id : '' }}">
                                                <select name="not_include[]" id="notInclude"
                                                    class="form-control select2tagging" multiple
                                                    data-placeholder="Enter more include">
                                                    @if (collect($notIncludes)->isNotEmpty())
                                                    @foreach (json_decode($notIncludes->value) as $key => $value)
                                                    <option selected value="{{ $value }}">{{ $value }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('admin.tour.index') }}" class="btn btn-secondary">Quay lại</a>
                                <button type="submit" class="btn btn-success float-right">Cập nhật</button>
                            </form>
                        </div>

                        <!-- tab 2 -->
                        <div id="tabs-2">
                            <div id="list-plan">
                                @if (count($plans) > 0)
                                @foreach ($plans as $p)
                                <div class="card card-info" style="background-color: rgb(242, 242, 242)">
                                    <div class="card-header">
                                        <div class="card-title">Sửa kế hoạch</div>
                                    </div>
                                    <form action="{{ route('admin.tour.plan.update', $p->id) }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                                            <div class="form-group col-sm-12">
                                                <label for="inputDay">Ngày</label>
                                                <input type="number" id="inputDay" name="day" class="form-control"
                                                    min="1" required placeholder="Nhập ngày của tour"
                                                    value="{{ $p->day }}">
                                            </div>
                                            <div class="form-group col-12 col-sm-12">
                                                <label for="summernote">Nội dung</label>
                                                <textarea id="summernote" name="content" class="form-control" rows="5"
                                                    required
                                                    placeholder="Nhập nội dung kế hoạch">{{ $p->content }}</textarea>
                                            </div>
                                            <div class="form-group col-12 col-sm-12">
                                                <label for="inputNote">Ghi chú</label>
                                                <textarea id="inputNote" name="note" class="form-control" rows="2"
                                                    placeholder="Nhập ghi cú">{{ $p->note }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                {{-- <button type="button"
                                                    class="btn btn-sm btn-secondary btn-remove">Xóa</button> --}}
                                                <button type="submit"
                                                    class="btn btn-sm btn-success float-right btn-save-plan">Cập
                                                    nhật</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endforeach
                                @else
                                <div class="card card-info" style="background-color: rgb(242, 242, 242)">
                                    <div class="card-header">
                                        <div class="card-title">Thêm kế hoạch</div>
                                        {{-- <div class="card-tools">
                                            <button type="button" class="btn bg-info btn-sm"
                                                data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div> --}}
                                    </div>
                                    <form action="{{ route('admin.tour.plan.store') }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                                            <div class="form-group col-sm-12">
                                                <label for="inputDay">Ngày</label>
                                                <input type="number" id="inputDay" name="day" class="form-control"
                                                    min="1" required placeholder="Nhập ngày của tour">
                                            </div>
                                            <div class="form-group col-12 col-sm-12">
                                                <label for="summernote">Nội dung</label>
                                                <textarea id="summernote" name="content" class="form-control" rows="5"
                                                    required placeholder="Nhập nội dung kế hoạch"></textarea>
                                            </div>
                                            <div class="form-group col-12 col-sm-12">
                                                <label for="inputNote">Ghi chú</label>
                                                <textarea id="inputNote" name="note" class="form-control" rows="2"
                                                    placeholder="Nhập ghi chú"></textarea>
                                            </div>
                                            <div class="form-group">
                                                {{-- <button type="button"
                                                    class="btn btn-sm btn-secondary btn-remove">Xóa</button> --}}
                                                <button type="submit"
                                                    class="btn btn-sm btn-success float-right btn-save-plan">Lưu</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endif
                                <br>
                            </div>
                            <a href="{{ route('admin.tour.index') }}" class="btn btn-secondary">Quay lại</a>
                            <button type="button" class="btn btn-sm btn-info float-right add-form">Add form</button>
                        </div>

                        <!-- tab 3 -->
                        <div id="tabs-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <button type="button" class="btn btn-xs btn-success" data-toggle="modal"
                                            data-target="#modal-add">
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
                                                <a href="{{ route('admin.tour.image.delete', $img->id) }}"
                                                    class="btn btn-secondary btn-delete">Xóa</a>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('admin.tour.index') }}" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </div>
                </div>
                <!-- /.content -->

                <!-- /.card -->
            </div>
        </div>
    </div>
</section>


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
                <form id="form-add" method="POST" action="{{ route('admin.tour.image.store') }}" accept-charset="utf-8"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="file" name="images[]" placeholder="Choose images" multiple>
                            </div>
                            <input type="hidden" name="tour_id" value="{{ $tour->id }}" data-id="{{ $tour->id }}">
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
