@extends('frontend.master')

@push('title', 'Chi tiết tour')

@section('content')
<div class="slider">
    <h1 class="slider-text translate" data-speed="0.1">Chi tiết Tour</h1>
    <div class="cloud-effect"></div>
    <img src="{{ URL::asset('frontend/img/img_slider/person.png') }} " class="person translate" data-speed="-0.25"
        alt="">
    <img src="{{ URL::asset('frontend/img/img_slider/slider1.jpg') }} " class="slider-img translate" data-speed="0.4"
        alt="">
</div>
<div class="body_main">
    <div class="standard-container grid wide">
        <div class="container-search-content-holder ">
            <div class="search-ordering-list row .wide " style="">
                <button class="tablinks btn-buttom_list active_page  col l-2-4 m-6 c-12"><i
                        class="fas fa-book"></i>Thông tin chi tiết</button>
                <button class="tablinks btn-buttom_list col l-2-4 m-6 c-12"> <i class="far fa-calendar-alt"></i>Kế hoạch
                    tour</button>
                <button class="tablinks btn-buttom_list col l-2-4 m-6 c-12"><i class="fas fa-map-marker-alt"></i>Địa chỉ
                </button>
                <button class="tablinks btn-buttom_list col l-2-4 m-6 c-12"><i class="fas fa-camera-retro"></i>Bộ sưu
                    tập</button>
                <button class="tablinks btn-buttom_list col l-2-4 m-6 c-12"><i class="far fa-comments"></i>Đánh
                    giá</button>
            </div>
        </div>
        <div class="container-product row">
            <div class="container_list-product col l-9 m-12 c-12">

                <!-- Information Tour -->
                <div class="tabcontent active_page ">
                    <div class="product-detail-information">
                        <div class="product-information">
                            <h1 class="name_product-detail">{{ $tour->name }}</h1>
                            <div class="product-price_item">
                                <span class="product_price-detail">
                                    {{ number_format($tour->adult_price, 0, ',', ' ') }} <sup>đ</sup>
                                </span>
                                <span class="product-price_item-text">/ person</span>
                            </div>
                        </div>
                        <div class="reviews-average-count">
                            <div class="stars-product_detail">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="review-lablel">(1 Review)</span>
                        </div>
                        <div class="product-detail-content">
                            <p>
                                {{ $tour->description }}
                            </p>
                        </div>
                        @php
                        $otherDay = explode(',', $tour->other_day);
                        @endphp
                        <div class="product-list_img">
                            <ul class="product_show-view ">
                                <li class="product_item-view">
                                    <i class="far fa-calendar-alt"></i>
                                    <span class="product-note_text">{{ count($otherDay) }}</span>
                                </li>
                                <li class="product_item-view">
                                    <i class="fas fa-user"></i>
                                    <span class="product-note_text">13+</span>
                                </li>
                                <li class="product_item-view">
                                    <i class="fas fa-tag"></i>
                                    <span class="product-note_text">
                                        @php
                                        $countTag = count($tags);
                                        $i = 0;
                                        @endphp
                                        @foreach ($tags as $tagKey => $value)
                                        <a
                                            href="{{ url('/tour?').\Illuminate\Support\Arr::query(['tag' => $value->name]) }}">{{
                                            $value->name }}</a>
                                        @if (++$i !== $countTag)
                                        ,
                                        @endif
                                        @endforeach
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="detail_main-infor">
                            <ul class="tour_main-holder">
                                <li class="tour_main-clearfix row">
                                    <div class="tour-main-text col l-4 m-4 c-12">
                                        <p>Nơi đến</p>
                                    </div>
                                    <div class="tour-infor col l-8 m-4 c-12">
                                        <p>{{ $tour->destination }}</p>
                                    </div>
                                </li>
                                <li class="tour_main-clearfix row">
                                    <div class="tour-main-text col l-4 m-4 c-12">
                                        <p>Địa điểm khởi hành</p>
                                    </div>
                                    <div class="tour-infor   col l-8 m-4 c-12">
                                        <p>{{ $tour->departure_location }}</p>
                                    </div>
                                </li>
                                <li class="tour_main-clearfix row">
                                    <div class="tour-main-text col l-4 m-4 c-12">
                                        <p>Thời gian khởi hành</p>
                                    </div>
                                    <div class="tour-infor  col l-8 m-4 c-12">
                                        <p>{{ $tour->departure_time }}</p>
                                    </div>
                                </li>
                                <li class="tour_main-clearfix row">
                                    <div class="tour-main-text col l-4 m-4 c-12">
                                        <p>Thời gian trở về</p>
                                    </div>
                                    <div class="tour-infor  col l-8 m-4 c-12">
                                        <p>{{ $tour->return_time }}</p>
                                    </div>
                                </li>
                                <li class="tour_main-clearfix row">
                                    <div class="tour-main-text col l-4 m-4 c-12">
                                        <p>Hành trình</p>
                                    </div>
                                    <div class="tour-infor  col l-8 m-4 c-12">
                                        <p>{{ $tour->itinerary }}</p>
                                    </div>
                                </li>
                                <li class="tour_main-clearfix row">
                                    <div class="tour-main-text col l-4 m-4 c-12">
                                        <p>Phương tiện di chuyển</p>
                                    </div>
                                    <div class="tour-infor  col l-8 m-4 c-12">
                                        @foreach ($vehicles as $vehicle)
                                        <p><i class="fas fa-plane"></i> {{ $vehicle->name }}</p>
                                        @endforeach
                                    </div>
                                </li>
                                <li class="tour_main-clearfix row">
                                    <div class="tour-main-text col l-4 m-4 c-12">
                                        <p>Dịch vụ kèm theo</p>
                                    </div>
                                    <div class="tour-infor  col l-8 m-4 c-12">
                                        @if (collect($includes)->isNotEmpty())
                                        @foreach (json_decode($includes->value) as $key => $value)
                                        <p><i class="far fa-check-circle"></i> {{ $value }}</p>
                                        @endforeach
                                        @endif
                                    </div>
                                </li>
                                <li class="tour_main-clearfix row">
                                    <div class="tour-main-text col l-4 m-4 c-12">
                                        <p>Dịch vụ không kèm theo</p>
                                    </div>
                                    <div class="tour-infor  col l-8 m-4 c-12">
                                        @if (collect($notIncludes)->isNotEmpty())
                                        @foreach (json_decode($notIncludes->value) as $key => $value)
                                        <p><i class="far fa-times-circle"></i> {{ $value }}</p>
                                        @endforeach
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="product-detail-information">
                            <div class="product-information">
                                <h1 class="name_product-detail">Phong cảnh</h1>
                            </div>
                            <div class="product-detail-content">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id nostrum eaque eum
                                    suscipit, tempora ad odit, similique maxime sit, nihil ipsa veniam omnis velit
                                    voluptatum? Assumenda velit dicta rerum maxime?</p>
                            </div>
                            <!-- hien 3 anh -->
                            <div class="list-img_detail row">
                                @if (collect($images)->isNotEmpty())
                                @foreach (array_slice($images->toArray(), 0, 2) as $img)
                                <div class="grallery col l-4 c-12 m-6 ">
                                    <figure class="list-show_img action-img1 " data-lightbox='mygallery'>
                                        <img src="{{ asset($img['image_path']) }}" alt="Image"
                                            class="img-detail_list_tour item-img myImg" />
                                    </figure>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tour Plan -->
                <div class="tabcontent">
                    {{-- <div class="detail-tour_pain">
                        <h1 class="titel-tour_pain">Tour Plan</h1>
                    </div> --}}
                    @foreach ($plans as $plan)
                    <div class="list-tour_pain">
                        <div class="number-date">
                            <span>{{ $plan->day }}</span>
                        </div>
                        <p class="titel-date_tour_pain">Ngày {{ $plan->day }}: {{ $plan->title }}</p>
                        <div class="text-tour_psin">
                            <p class="text-container_pain">
                                {!! $plan->content !!}
                            </p>
                            <p class="text-container_pain">
                                <b>Ghi chú:</b> {{ $plan->note }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Location -->
                <div class="tabcontent">
                    <div class="location-taital_pain">
                        <div class="detail-tour_pain">
                            <h1 class="titel-tour_pain">{{ $location->name }}</h1>
                            <p>{{ $location->description }}</p>
                        </div>
                        <div class="map-detail_tour">
                            {{-- <div id="map">Gallery --}}
                                <img src="{{ URL::asset('frontend/img/map/hagiangmap.jpg') }}" alt="Google map">
                                {{--
                            </div> --}}
                        </div>
                    </div>
                </div>

                <!-- Gallery -->
                <div class="tabcontent">
                    <div class="img-detail">
                        {{-- <figure class="list-show_img action-img " data-lightbox='mygallery'>
                            <img src="https://assets.codepen.io/12005/windmill.jpg" alt="A windmill"
                                class="img-detail_list_tour" />
                        </figure> --}}
                        @if (collect($images)->isNotEmpty())
                        @foreach ($images as $img)
                        <figure class="landscape action-img">
                            <img src="{{ $img->image_path }}" alt="Image tour" class="img-detail_list_tour" />
                        </figure>
                        @endforeach
                        @else
                        Không có ảnh nào.
                        @endif
                        {{-- <figure class="action-img">
                            <img src="https://assets.codepen.io/12005/sunset.jpg" alt="Sunset and boats"
                                class="img-detail_list_tour" />
                        </figure>
                        <figure class="action-img">
                            <img src="https://assets.codepen.io/12005/snowy.jpg" alt="a river in the snow"
                                class="img-detail_list_tour" />
                        </figure>
                        <figure class="landscape action-img">
                            <img src="https://assets.codepen.io/12005/bristol-balloons1.jpg"
                                alt="a single checked balloon" class="img-detail_list_tour" />
                        </figure>
                        <figure class="action-img">
                            <img src="https://assets.codepen.io/12005/dog-balloon.jpg"
                                alt="a hot air balloon shaped like a dog" class="img-detail_list_tour" />
                        </figure>
                        <figure class="action-img">
                            <img src="https://assets.codepen.io/12005/abq-balloons.jpg"
                                alt="View from a hot air balloon of other balloons" class="img-detail_list_tour" />
                        </figure>
                        <figure class="action-img">
                            <img src="https://assets.codepen.io/12005/disney-balloon.jpg"
                                alt="a balloon fairground ride" class="img-detail_list_tour" />
                        </figure> --}}
                    </div>
                </div>

                {{-- // - reviews- // --}}
                <div class="tabcontent">
                    <div class="reviews-tour">
                        <div class="detail-tour_pain">
                            <h1 class="titel-tour_pain">Điểm đánh giá và phân tích điểm</h1>
                            <p>Không chỉ được thiên nhiên ưu ái cho nhiều danh lam thắng cảnh được thế giới trầm
                                trồ, Hà
                                Giang còn là nơi lưu giữ những di tích lịch sử lâu đời cũng như nét đẹp văn hóa đặc
                                sắc
                                của 22 dân tộc vùng cao phía Bắc. Tất cả đã tạo nên sức hút hấp dẫn khiến các tín đồ
                                du
                                lịch không ngừng tìm kiếm kinh nghiệm du lịch Hà Giang để chinh phục trọn vẹn vùng
                                sơn
                                cước xinh đẹp này</p>
                        </div>
                        <div class="evalution_tour">
                            <div class="parameter-review_tour row">
                                <div class="parameter_number col l-3 m-2 c-12">
                                    <span>7.7</span>
                                    <div class="parameter_text">
                                        <span class="parameter_listtext">good</span>
                                    </div>
                                </div>
                                <div class="popular_tours-percentage col l-9 m-8 c-12">
                                    <div class="bar">
                                        <div class="infor">
                                            <span>xếp hạng</span>
                                        </div>
                                        <div class="progress-line food">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="bar">
                                        <div class="infor">
                                            <span>độ quan tâm khách hàng</span>
                                        </div>
                                        <div class="progress-line care">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="bar">
                                        <div class="infor">
                                            <span>khách sạn</span>
                                        </div>
                                        <div class="progress-line hotel">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="bar">
                                        <div class="infor">
                                            <span>an ninh</span>
                                        </div>
                                        <div class="progress-line security">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="bar">
                                        <div class="infor">
                                            <span>người dẫn tour</span>
                                        </div>
                                        <div class="progress-line travel-guide">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="bar">
                                        <div class="infor">
                                            <span>thái độ nhân viên</span>
                                        </div>
                                        <div class="progress-line attitude">
                                            <span></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="container-feedback ">
                            <div class="feedback_list-items">
                                <div class="feedback-items">
                                    <h2 class="contact_us-title">gửi thông tin đánh giá</h2>
                                </div>
                                <div class="feedback-content">
                                    <span></span>
                                    <textarea name="" class="feedback_content-text" cols="40" rows="10"
                                        placeholder="Message"></textarea>
                                </div>
                                <div class="grid">
                                    <div class="row feedback_content-information">
                                        <div class="feedback_information-email l-6 m-12 c-12">
                                            <span class="feedback_information_email-icon"></span>
                                            <input class="feedback_input" type="text" placeholder="email">
                                        </div>
                                        <div class="feedback_information-email l-6 m-12 c-12">
                                            <span class="feedback_information_email-icon1"></span>
                                            <input class="feedback_input" type="text " placeholder="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="comment_cookies-consent">
                                    <input type="checkbox" class="wp-comment-cookies-consent">
                                    <label class="wp-comment-cookies-consent">
                                        Save my name, email, and website in this browser for the next time I
                                        comment.
                                    </label>
                                </div>
                                <button class="feedback_content-submit">Gửi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- right column -->
            <div class="container-search_product col l-3 m-12 c-12">
                <div class="container-feedback ">
                    <div class="feedback_list-items book-card">
                        {{-- <div class="feedback-items">
                            <h2 class="contact_us-title " style="text-transform:capitalize">Đặt tour
                            </h2>
                        </div> --}}
                        {{-- <div class=" feedback_content-information">
                            <div class="feedback_information-email-card ">
                                <span class="icon_add-card"></span>
                                <input class="feedback_input-card add-card" type="text" placeholder="Name*">
                            </div>
                            <div class="feedback_information-email-card">
                                <span class="icon_add-card"><i class="far fa-envelope"></i></span>
                                <input class="feedback_input-card add-card" type="email " placeholder="email*">
                            </div>
                            <div class="feedback_information-email-card">
                                <span class="icon_add-card"><i class="far fa-envelope"></i></span>
                                <input class="feedback_input-card add-card" type="email " placeholder="confirm Email*">
                            </div>
                            <div class="feedback_information-email-card">
                                <span class="icon_add-card"><i class="fas fa-phone"></i></span>
                                <input class="feedback_input-card add-card" type="tel" placeholder="Phone*">
                            </div>
                            <!-- date -->
                            <div class="feedback_information-email-card">
                                <span class="icon_add-card"><i class="far fa-calendar-alt"></i></span>
                                <input class="feedback_input-card add-card" date-number="['29-12-2021', '28-12-2021']"
                                    id="datepicker" placeholder="dd-mm-yyyy*">
                            </div>
                            <div class="feedback_information-email-card">
                                <span class="icon_add-card"><i class="fas fa-tags"></i></span>
                                <input class="feedback_input-card add-card" type="number"
                                    placeholder="Number of tickets*">
                            </div>
                            <div class="feedback-content content-card">
                                <span></span>
                                <textarea name="" class="feedback_content-text content_text-card" cols="5" rows="6"
                                    placeholder="Message"></textarea>
                            </div>

                        </div>
                        <button class="feedback_content-submit submit-btn">check availability</button> --}}
                        <a href="{{ url("/tour/$tour->id/booking") }}">
                            <button class="feedback_content-submit submit-btn">Đặt tour</button>
                        </a>
                    </div>
                </div>
                <div class="background-clock">
                    <div class="clock">
                        <div class="hour">
                            <div class="hr" id="hr"></div>
                        </div>
                        <div class="min">
                            <div class="mn" id="mn"></div>
                        </div>
                        <div class="sec">
                            <div class="sc" id="sc"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-img_show_detail">
    <div class="previews-img">
        <div class="detail-img">
            <span class="title">{{ $tour->name }}
                <p class="currents-i"></p>
                of <p class="total-imgs"></p>
            </span>
            <span class="icons fas fa-times"></span>
        </div>
        <div class="img-boxs">
            <div class="slieder_img previews">
                <i class="fas fa-angle-left"></i>
            </div>
            <div class="slieder_img nexts">
                <i class="fas fa-angle-right"></i>
            </div>
            <img class="show-img-detai-tour" src="" alt="">
        </div>
    </div>
    <div class="shawdow2-show-img"></div>
</div>
</div>
@endsection
