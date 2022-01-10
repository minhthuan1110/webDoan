@extends('backend.master')

@push('title', 'Thêm đơn Booking')

@section('script')
<script src="{{ asset('js/custom-function.js') }}"></script>
<script>
    // Active Sidebar
    $('#link-booking').parent().addClass('activemenu-is-opening menu-open');
    $('#link-booking, #link-add-booking').addClass('active');

    $(document).ready(function () {
    // Tinh gia va slot
    var totalSlot = 0;
    var totalPrice = 0;
    var promotionNumberValue, promotionType;

    $('#adultSlot, #youthSlot, #childSlot, #babySlot').on('input', function() {
        var adultSlot = ($('#adultSlot').val());
        var youthSlot = ($('#youthSlot').val());
        var childSlot = ($('#childSlot').val());
        var babySlot = ($('#babySlot').val());
        var adultPrice = ($('#adultPrice').val());
        var youthPrice = ($('#youthPrice').val());
        var childPrice = ($('#childPrice').val());
        var babyPrice = ($('#babyPrice').val());

        totalSlot = (adultSlot*1) + (youthSlot*1) + (childSlot*1) + (babySlot*1);
        totalPrice = (adultSlot*adultPrice) + (youthSlot*youthPrice) + (childSlot*childPrice) + (babySlot*babyPrice);
        // console.log(number_format(totalPrice, 2, ',', ' '));
        $('#totalSlot').val(parseFloat(totalSlot));
        $('#totalPrice').val(parseFloat(totalPrice));
        $('#viewTotalSlot').html(number_format(totalSlot, 0, '.', ''));
        $('#viewTotalPrice').html(number_format(totalPrice, 0, '.', ' '));
    });

    reset_price = function (promotionNumberValue, promotionType) {
        if (promotionType === '%') {
        var totalPrice2 = totalPrice - (totalPrice * promotionNumberValue / 100);
        } else if (promotionType === 'VND') {
        var totalPrice2 = totalPrice - promotionNumberValue;
        }
        // console.log(number_format(totalPrice2, 2, ',', ''));
        $('#totalPrice').val(parseFloat(totalPrice2));
        $('#viewTotalPrice').html(number_format(totalPrice2, 0, ',', ' '));
    }

    $('.promotion').change(function (e) {
            e.preventDefault();
            var id = $(this).find(':selected').val();
            // console.log(id, typeof id);
            if (!empty(id)) {
                $.ajax({
                    type: "get",
                    url: "/promotion/" + id,
                    success: function (data) {
                        promotionNumberValue = data.number;
                        promotionType = data.type;
                        // console.log(promotionNumberValue, promotionType);
                        reset_price(promotionNumberValue, promotionType);
                    }
                });
            } else {
                promotionNumberValue = 0;
                promotionType = 'VND';
                reset_price(promotionNumberValue, promotionType);
            }
        });
        });
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header" style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tạo đơn đặt tour</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.booking.index') }}">Booking</a></li>
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- .card -->
                <div class="card card-primary">
                    <!-- .card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Tạo đơn đặt tour</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header-->

                    <!-- .card-body -->
                    <form action="{{ route('admin.booking.store2') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $queryData['user_id'] }}">
                        <input type="hidden" name="tour_id" value="{{ $queryData['tour_id'] }}">
                        <input type="hidden" name="payment_id" value="{{ $queryData['payment_id'] }}">
                        <input type="hidden" name="status" value="{{ $queryData['status'] }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="selectDay">Ngày khởi hành</label>
                                <select name="other_day" id="selectDay" class="form-control custom-select" required>
                                    @php
                                    $otherDays = explode(',', $tour->other_day)
                                    @endphp
                                    <option value="">-- Choose date --</option>
                                    @foreach ($otherDays as $otherDay)
                                    <option value="{{ $otherDay }}">{{ $otherDay }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div style="overflow-x:auto;" class="wrap-section-booking table">
                                    <h1 class="booking-title">Danh sách giá Tour</h1>
                                    <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                                    <table>
                                        <tr>
                                            <th>Người lớn (Từ 12 tuổi trở lên)</th>
                                            <th>Trẻ em (Từ 5 tuổi đến dưới 12)</th>
                                            <th>Trẻ nhỏ (Từ 2 tuổi đến dưới 5)</th>
                                            <th>Em bé (Dưới 2 tuổi)</th>
                                        </tr>
                                        <tr>
                                            <td>{{ number_format($tour->adult_price, null, ',', ' ') }} <sup>đ</sup>
                                            </td>
                                            <td>{{ number_format($tour->youth_price, null, ',', ' ') }} <sup>đ</sup>
                                            </td>
                                            <td>{{ number_format($tour->child_price, null, ',', ' ') }} <sup>đ</sup>
                                            </td>
                                            <td>{{ number_format($tour->baby_price, null, ',', ' ') }} <sup>đ</sup></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class=" feedback_content-information">
                                                    <div class="feedback_information-email-card">
                                                        <span class="icon_add-card"><i class="fas fa-tags"></i></span>
                                                        <input type="hidden" name="adult_price" id="adultPrice"
                                                            value="{{ $tour->adult_price }}">
                                                        <input class="feedback_input-card add-card" id="adultSlot"
                                                            name="adult_slot" min="0" max="100" type="number"
                                                            placeholder="Number of tickets*">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class=" feedback_content-information">
                                                    <div class="feedback_information-email-card">
                                                        <span class="icon_add-card"><i class="fas fa-tags"></i></span>
                                                        <input type="hidden" name="youth_price" id="youthPrice"
                                                            value="{{ $tour->youth_price }}">
                                                        <input class="feedback_input-card add-card" id="youthSlot"
                                                            name="youth_slot" min="0" max="100" type="number"
                                                            placeholder="Number of tickets*">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class=" feedback_content-information">
                                                    <div class="feedback_information-email-card">
                                                        <span class="icon_add-card"><i class="fas fa-tags"></i></span>
                                                        <input type="hidden" name="child_price" id="childPrice"
                                                            value="{{ $tour->child_price }}">
                                                        <input class="feedback_input-card add-card" id="childSlot"
                                                            name="child_slot" min="0" max="100" type="number"
                                                            placeholder="Number of tickets*">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class=" feedback_content-information">
                                                    <div class="feedback_information-email-card">
                                                        <span class="icon_add-card"><i class="fas fa-tags"></i></span>
                                                        <input type="hidden" name="baby_price" id="babyPrice"
                                                            value="{{ $tour->baby_price }}">
                                                        <input class="feedback_input-card add-card" id="babySlot"
                                                            name="baby_slot" min="0" max="100" type="number"
                                                            placeholder="Number of tickets*">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="col l-12 m-12 c-12">
                                        <div class="discount-code-wrap">
                                            <div class="discount-code">
                                                @if (count($promotions) > 0)
                                                <div>
                                                    <select name="promotion_id" class="promotion">
                                                        <option value="">-- Chọn khuyến mại --</option>
                                                        @foreach ($promotions as $promotion)
                                                        <option value="{{ $promotion->id }}">{{ $promotion->content }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="booking-price-final">
                                                <input id="totalSlot" type="hidden" name="total_slot"
                                                    readonly="readonly">
                                                Tổng số chỗ: <span id="viewTotalSlot">0</span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input id="totalPrice" type="hidden" name="total_price"
                                                    readonly="readonly">
                                                Tổng giá: <span id="viewTotalPrice">0</span> <sup>đ</sup>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- het content cua form -->
                            {{-- <button class="btn btn-sm btn-primary" onclick="stepper.previous()">Previous</button>
                            --}}
                        </div>
                        <!-- /.card-body -->

                        <!-- .card-footer -->
                        <div class="card-footer">
                            <a href="{{ route('admin.booking.index') }}" class="btn btn-secondary">Quay lại</a>
                            <button type="submit" class="btn btn-success float-right">Lưu</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection
