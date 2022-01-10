@extends('frontend.master')

@push('title', 'My Account')

@section('style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        // Hàm active tab nào đó
        function activeTab(obj) {
            // Xóa class active tất cả các tab
            $('.side-bar .side-bar__wrap .side-bar__item').removeClass('active');
            // Thêm class active vòa tab đang click
            $(obj).addClass('active');
            // Lấy href của tab để show content tương ứng
            var id = $(obj).find('a').attr('href');
            // Ẩn hết nội dung các tab đang hiển thị
            $('.tab-item').hide();
            // Hiển thị nội dung của tab hiện tại
            $(id).show();
        }
        // Sự kiện click đổi tab
        $('.side-bar__wrap .side-bar__item').click(function() {
            activeTab(this);
            return false;
        });
        // Active tab đầu tiên khi trang web được chạy
        activeTab($('.side-bar__wrap .side-bar__item:first-child'));
    });

</script>
@endsection

@section('content')
<div id="myAccount" style="margin-bottom:50px">
    <div class="grid wide">
        <div id="tabs" class="row">
            <div class="col l-12 m-12 c-12">
                <header class="header">
                    <div class="header-avatar">
                        <div class="header-avatar__img">
                            <a href="javascript::void()">
                                <img src="{{ isset($user->avatar_image_path) ? asset($user->avatar_image_path) : (isset($user->profile_photo_path) ? asset($user->profile_photo_path) : 'https://static2.yan.vn/YanNews/2167221/202102/facebook-cap-nhat-avatar-doi-voi-tai-khoan-khong-su-dung-anh-dai-dien-e4abd14d.jpg'
    ) }}" alt="account"></a>
                            {{-- <img src="{{ asset($user->avatar_image_path) }}" alt="account"> --}}
                            </a>
                        </div>
                        <div class="header-avatar__action">
                            <a href="#"><i class="fas fa-camera"></i></a>
                        </div>

                    </div>
                    <h1 class="header_name-orther">{{ $user->name }}</h1>

                </header>
            </div>

            <!-- sidebar -->
            <div class="col l-3 m-3 c-12">
                <div class="side-bar">
                    <div class="side-bar__wrap">
                        <div class="side-bar__item active">
                            <a href="#tabs-1">Tài khoản của tôi</a>
                        </div>
                        <div class="side-bar__item">
                            <a href="#tabs-2">Đơn mua</a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="tabs-1" class="container-search_product tab-item col l-9 m-9 c-12">
                <div class="container-feedback ">
                    <div class="feedback_list-items book-card">
                        <!-- Form Update -->
                        <form action="{{ url('/user/profile/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class=" feedback_content-information">
                                <div class="row">
                                    <div class="feedback_information-email-card col l-9 m-9 c-12 ">
                                        <label for="User_Name">Tên của bạn:</label>
                                        <div class="feedback_information-email-card ">
                                            <span class="icon_add-card"><i class="fas fa-user-alt"></i></span>
                                            <input class="feedback_input-card add-card" id="User_Name" type="text"
                                                name="name" placeholder="User Name*" value="{{ $user->name }}">
                                        </div>
                                        <label for="User_Name-email">Email:</label>
                                        <div class="feedback_information-email-card">
                                            <span class="icon_add-card"><i class="far fa-envelope"></i></span>
                                            <input class="feedback_input-card add-card" id="User_Name-email"
                                                type="email" placeholder="Email*" readonly value="{{ $user->email }}">
                                        </div>
                                        <label for="User_Name-phone">Số điện thoai:</label>
                                        <div class="feedback_information-email-card">
                                            <span class="icon_add-card"><i class="fas fa-phone"></i></span>
                                            <input class="feedback_input-card add-card" id="User_Name-phone" type="tel"
                                                name="phone" minlength="9" maxlength="14" pattern="^[+]?[0-9]{9,14}$"
                                                placeholder="Phone*" value="{{ $user->phone }}">
                                        </div>
                                        <label for="User_Name-address">Địa chỉ:</label>
                                        <div class="feedback_information-email-card">
                                            <span class="icon_add-card"><i class="fas fa-address-card"></i></span>
                                            <input class="feedback_input-card add-card" id="User_Name-address"
                                                type="text" name="address" placeholder="Address"
                                                value="{{ $user->address }}">
                                        </div>

                                    </div>
                                    <div class="feedback_information-email-card col l-3 m-3 c-12 ">
                                        <div class="img-other">
                                            <label for="feedback_input-card">
                                                <div class="img-orther-from none ">
                                                    <img id="img-orther-update" src="" alt="avatar">
                                                </div>
                                                <div class="input-img-orther ">
                                                    <!-- cho đường link ảnh từ database vào src của thẻ img -->
                                                    <img class="input-img-orther-data"
                                                        src="{{ $user->avatar_image_path ?: $user->profile_photo_path ?: 'https://static2.yan.vn/YanNews/2167221/202102/facebook-cap-nhat-avatar-doi-voi-tai-khoan-khong-su-dung-anh-dai-dien-e4abd14d.jpg' }}"
                                                        alt="avatar">
                                                    <input id="feedback_input-card" type="file"
                                                        onChange="chooseFile(this)" name="image" placeholder="Image">
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="feedback_content-submit submit-btn">Cập nhật</button>
                        </form>
                        <!-- /form -->
                    </div>
                </div>
            </div>

            <div id="tabs-2" class="tab-item l-9 m-9 c-12">
                @if (collect($bookings)->isNotEmpty())
                <table class="table" style="background-color: #efefef">
                    <thead style="background-color:#02acea;color: #fff;">
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Tên đơn</th>
                            <th scope="col">Số lượng </th>
                            <th scope="col">Tổng tiền (đ)</th>
                            <th scope="col">Ngày mua</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $bk)
                        <tr>
                            <th scope="row">{{ $bk->code }}</th>
                            <td>{{ $bk->name }}</td>
                            <td>{{ $bk->total_slot }}</td>
                            <td>{{ number_format($bk->total_price, 0, ',', ' ')}}</td>
                            <td>{{ $bk->created_at }}</td>
                            <td><a href="{{ url("/booking/$bk->code") }}">Chi tiết</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <span>Chưa có đơn đặt tour nào.</span>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
