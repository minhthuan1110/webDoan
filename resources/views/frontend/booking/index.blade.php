@extends('frontend.master')

@push('title', 'Booking')

@section('script')
<script type="text/javascript" src="{{ asset('/js/custom-function.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/booking-calculator.js') }}"></script>
@endsection

@section('content')
<section id="breadcumps">
    <div class="grid wide">
        <div class="row">
            <div class="col l-12 m-12 c-12">
                <div class="breadcrumb">
                    <span>Homepage</span>
                    »
                    <span>Tour</span>
                    »
                    <span>Booking</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="booking">
    <div class="grid wide">
        <div class="container">
            <div class="row">
                <div class="col l-12 m-12 c-12">
                    <div class="wrap-section-booking">
                        <h1 class="booking-title">Thông tin tour</h1>
                        <div class="row booking-wrap-info">
                            <div class="col l-4">
                                <a href="{{ asset($tour->image_path) }}">
                                    <img src="{{ asset($tour->image_path) }}" alt="tour"
                                        onerror="this.onerror=null;this.src='{{ asset('images/placeholder600x600.png') }}'" />
                                </a>
                            </div>
                            <div class="col l-8">
                                <div class="booking-name-tour-wrap">
                                    <a href="javascript::void()" class="booking-name-tour">
                                        <h2>{{ $tour->name }}</h2>
                                    </a>
                                </div>
                                <div class="booking-detail-info">
                                    <div>
                                        <div class="booking-detail-info__item">
                                            <i class="fas fa-qrcode"></i>
                                            <span>{{ $tour->code }}</span>
                                        </div>
                                        @php
                                        $otherDay = explode(',', $tour->other_day)
                                        @endphp
                                        <div class="booking-detail-info__item">
                                            <i class="fas fa-calendar-check"></i>
                                            <span>Start Day: <span>{{ $otherDay[0] }}</span></span>
                                        </div>
                                        <div class="booking-detail-info__item">
                                            <i class="fas fa-clock"></i>
                                            <span>Total day: <span>{{ count($otherDay) }}</span></span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="booking-detail-info__item">
                                            <i class="fas fa-box-tissue"></i>
                                            <span>Slot Remaining: <span>{{ $tour->slot }}</span></span>
                                        </div>
                                        {{-- <div class="booking-detail-info__item">
                                            <i class="fas fa-calendar-check"></i>
                                            <a href="javascript::void()">Other Day</a>
                                        </div> --}}
                                        <div class="booking-detail-info__item"><i
                                                class="fas fa-dollar-sign"></i><span>Price:
                                                <span>{{ number_format($tour->adult_price, null, ',', ' ') }}
                                                    VND</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="booking-notice">Khách nữ từ 55 tuổi trở lên, khách nam từ 60 tuổi trở lên đi tour
                            một mình và khách mang thai trên 4 tháng (16 tuần) vui lòng đăng ký tour trực tiếp tại văn
                            phòng của Vietravel. Không áp dụng đăng ký tour online đối với khách từ 70 tuổi trở lên.
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ url('/tour/booking/store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col l-12">
                        <div style="overflow-x:auto;" class="wrap-section-booking table">
                            <h1 class="booking-title">Chọn ngày khởi hành</h1>
                            <div class="feedback_information-email-card choose-file">
                                <span class="icon_add-card" style="top:0;"><i class="far fa-calendar-alt"></i></span>
                                {{-- <span>{{ $ngayKhac }}</span> --}}
                                <br>
                                {{-- <input class="feedback_input-card add-card" name="other_day"
                                    style="text-align: center; font-size: 20px; color: black;"
                                    date-number="{{ $ngayKhac }}" id="datepicker" placeholder="dd-mm-yyyy*"
                                    autocomplete="off" /> --}}
                                <select name="other_day" id="" class="feedback_input-card add-card">
                                    <option value="">Chọn ngày khởi hành</option>
                                    @foreach ($otherDay as $day)
                                    <option value="{{ $day }}">{{ $day }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div style="overflow-x:auto;" class="wrap-section-booking table">
                            <h1 class="booking-title">List Price Tour</h1>
                            <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                            <table>
                                <tr>
                                    <th>Người lớn (Từ 12 tuổi trở lên)</th>
                                    <th>Trẻ em (Từ 5 tuổi đến dưới 12)</th>
                                    <th>Trẻ nhỏ (Từ 2 tuổi đến dưới 5)</th>
                                    <th>Em bé (Dưới 2 tuổi)</th>
                                </tr>
                                <tr>
                                    <td>{{ number_format($tour->adult_price, null, ',', ' ') }} <sup>đ</sup></td>
                                    <td>{{ number_format($tour->youth_price, null, ',', ' ') }} <sup>đ</sup></td>
                                    <td>{{ number_format($tour->child_price, null, ',', ' ') }} <sup>đ</sup></td>
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
                            <span class="payments-alert">Chú ý: Quý khách chọn số lượng vé tương ứng với độ từng độ
                                tuổi.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col l-12 m-12 c-12">
                        <div class="discount-code-wrap">
                            <div class="discount-code">
                                {{-- <span class="discount-code__label">* Nhập mã giản giá (nếu có)</span>
                                <div class="discount-code__input">
                                    <input type="text" />
                                    <input type="submit" />
                                </div> --}}
                                @if (count($promotions) > 0)
                                <div class="promotion_id-list">
                                    <h2> Áp dụng mã giảm giá:</h2>
                                    <select name="promotion_id" class="promotion">
                                        <option value="">-- Chọn mã giảm giá --</option>
                                        @foreach ($promotions as $promotion)
                                        <option value="{{ $promotion->id }}">{{ $promotion->content }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                            </div>
                            <div class="booking-price-final">
                                <input id="totalSlot" type="hidden" name="total_slot" readonly="readonly">
                                Total slot: <span id="viewTotalSlot">0</span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input id="totalPrice" type="hidden" name="total_price" readonly="readonly">
                                Total price: <span id="viewTotalPrice">0</span> <sup>đ</sup>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col l-12 m-12 c-12">
                        <div class="rule-book-tour">
                            <h1 class="rule-book-tour__title">Điều khoản bắt buộc khi đặt tour online</h1>
                            <div class="rule-book-tour__content">
                                <div class="content">
                                    <h3>Thông tin điều khoản</h3>
                                    Giá vé du lịch được tính theo tiền Đồng (Việt Nam - VNĐ). Trường hợp khách thanh
                                    toán
                                    bằng USD sẽ được quy đổi ra VNĐ theo tỉ giá của ngân hàng Đầu Tư và Phát Triển Việt
                                    Nam
                                    - Chi nhánh TP.HCM tại thời điểm thanh toán.Giá vé chỉ bao gồm những khoản được liệt
                                    kê
                                    một cách rõ ràng trong phần “Bao gồm” trong các chương trình du lịch. Vietravel
                                    không có
                                    nghĩa vụ thanh toán bất cứ chi phí nào không nằm trong phần “Bao gồm”.
                                    Giá vé du lịch được tính theo tiền Đồng (Việt Nam - VNĐ). Trường hợp khách thanh
                                    toán
                                    bằng USD sẽ được quy đổi ra VNĐ theo tỉ giá của ngân hàng Đầu Tư và Phát Triển Việt
                                    Nam
                                    - Chi nhánh TP.HCM tại thời điểm thanh toán.Giá vé chỉ bao gồm những khoản được liệt
                                    kê
                                    một cách rõ ràng trong phần “Bao gồm” trong các chương trình du lịch. Vietravel
                                    không có
                                    nghĩa vụ thanh toán bất cứ chi phí nào không nằm trong phần “Bao gồm”.
                                    Giá vé du lịch được tính theo tiền Đồng (Việt Nam - VNĐ). Trường hợp khách thanh
                                    toán
                                    bằng USD sẽ được quy đổi ra VNĐ theo tỉ giá của ngân hàng Đầu Tư và Phát Triển Việt
                                    Nam
                                    - Chi nhánh TP.HCM tại thời điểm thanh toán.Giá vé chỉ bao gồm những khoản được liệt
                                    kê
                                    một cách rõ ràng trong phần “Bao gồm” trong các chương trình du lịch. Vietravel
                                    không có
                                    nghĩa vụ thanh toán bất cứ chi phí nào không nằm trong phần “Bao gồm”.
                                    Giá vé du lịch được tính theo tiền Đồng (Việt Nam - VNĐ). Trường hợp khách thanh
                                    toán
                                    bằng USD sẽ được quy đổi ra VNĐ theo tỉ giá của ngân hàng Đầu Tư và Phát Triển Việt
                                    Nam
                                    - Chi nhánh TP.HCM tại thời điểm thanh toán.Giá vé chỉ bao gồm những khoản được liệt
                                    kê
                                    một cách rõ ràng trong phần “Bao gồm” trong các chương trình du lịch. Vietravel
                                    không có
                                    nghĩa vụ thanh toán bất cứ chi phí nào không nằm trong phần “Bao gồm”.
                                    Giá vé du lịch được tính theo tiền Đồng (Việt Nam - VNĐ). Trường hợp khách thanh
                                    toán
                                    bằng USD sẽ được quy đổi ra VNĐ theo tỉ giá của ngân hàng Đầu Tư và Phát Triển Việt
                                    Nam
                                    - Chi nhánh TP.HCM tại thời điểm thanh toán.Giá vé chỉ bao gồm những khoản được liệt
                                    kê
                                    một cách rõ ràng trong phần “Bao gồm” trong các chương trình du lịch. Vietravel
                                    không có
                                    nghĩa vụ thanh toán bất cứ chi phí nào không nằm trong phần “Bao gồm”.
                                </div>
                            </div>
                            <div class="submit-rule">
                                <input type="checkbox" id="yes-i-do" checked required />
                                <label for="yes-i-do">Tôi đồng ý</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col l-12 m-12 c-12">
                        <h2 class="text-myaccould">Điền thông tin đặt tour</h2>
                        <div class="feedback_list-items" style="margin-bottom:35px;">
                            <!-- thong tin thanh toan -->
                            <div class="form-group_input">
                                @if (!auth('user')->check())
                                <div class="filter-wrap-item about_search" style="margin-bottom:25px;">
                                    <span class="filter__icon filter__icon-location-name"></span>
                                    <input type="text" class="filter__input" name="full_name" required
                                        placeholder="Tên của bạn">
                                </div>
                                <div class="filter-wrap-item about_search" style="margin-bottom:25px;">
                                    <span class="filter__icon filter__icon-location-phone"></span>
                                    <input type="text" class="filter__input" placeholder="Số điện thoại" name="phone"
                                        required>
                                </div>
                                <div class="filter-wrap-item about_search" style="margin-bottom:25px;">
                                    <span class="filter__icon filter__icon-location-email"></span>
                                    <input type="email" class="filter__input" placeholder="Email" name="email" required>
                                </div>
                                <div class="filter-wrap-item about_search" style="margin-bottom:25px;">
                                    <span class="filter__icon filter__icon-location-address"></span>
                                    <input type="text" class="filter__input" placeholder="Địa chỉ" name="address"
                                        required>
                                </div>
                                @endif
                                <div class="filter-wrap-item about_search" style="margin-bottom:25px;height: 150px;">
                                    <span class="filter__icon filter__icon-location-note"></span>
                                    <textarea name="note" class="filter__input" id="textNote" cols="30" rows="10"
                                        placeholder="Ghi chú"></textarea>
                                    <!-- <input type="text" class="filter__input" placeholder="Địa chỉ" name="address" required> -->
                                </div>
                            </div>
                            <div class="payments">
                                @php
                                $i = 1;
                                @endphp
                                @foreach ($payments as $payment)
                                @php
                                $i2 = $i++;
                                @endphp
                                <div>
                                    <input type="radio" id="payment-{{ $i2 }}" name="payment_id" required
                                        value="{{ $payment->id }}">
                                    <label for="payment-{{ $i2 }}"><span><img
                                                src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg"
                                                alt="Checked Icon" /></span></label>
                                    <label for="payment-{{ $i2 }}">{{ $payment->name }}</label>
                                    <div class="payment-infomation">
                                        <!-- Dữ liệu dùng text editor để đổ ra trong đây -->
                                        <span>{{ $payment->description }}</span>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <button type="submit" class="feedback_content-submit">Đặt ngay</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
{{-- <script>
    //    $(document).ready(function() {
//   $(".accordion").on("click", function() {
//     if ($(this).hasClass("active")) {
//       $(this).removeClass("active");
//       $(this)
//         .siblings(".payment-infomation")
//         .slideUp(200);
//     } else {
//       $(".accordion").removeClass("active");
//       $(this).addClass("active");
//       $(".payment-infomation").slideUp(200);
//       $(this)
//         .siblings(".payment-infomation")
//         .slideDown(200);
//     }
//   });
// });

</script> --}}
