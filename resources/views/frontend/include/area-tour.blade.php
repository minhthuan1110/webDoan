<section class="title title-top title-top-first">
    <div class="grid wide">
        <div class="row">
            <div class="col l-6 l-o-3 m-8 m-o-2 c-10 c-o-1">
                <div class="banner-content banner-content-choose text-dark-color">
                    <h2 class="banner-heading__medium banner-heading--color">Trải nghiệm</h2>
                    <h1 class="banner-heading__big">Tour Du Lịch Trong Nước<span class="tour-new">New</p>
                    </h1>
                    <p class="banner-text-small">
                        Du lịch theo phong cách riêng, trải nghiệm trọn vẹn. Tour chọn lọc chất
                        <br> lượng. Đảm bảo giá tốt nhất .Đội ngũ tư vấn chi tiết và tận tình...
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="tour-hightlight">
    <div class="grid wide">
        <div class="title-hot_tour">
            <div class="row">
                <div class="col l-3 m-3 c-5 title-hot_tour-left">
                    <h3 class="hot-province__text">Khu vực miền bắc.</h3>
                </div>
                <div class="col l-9 m-9 c-7 ">
                    <div class="row title-hot_tour-right">
                        <div class="left-link_title-province">
                            <a href="{{ url('/tour?').\Illuminate\Support\Arr::query(['area'=>'mien bac']) }}">
                                <p class="link-more__tourhot">Xem tất cả.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row tour-item-row">
            <div class="col l-3 m-6 c-0  tour-item-wrap">
                <div class="container__slide-show" id="form1" style="margin-right:-200%">
                    <div class="container__slide-item first">
                        <div style="background: url(./frontend/img/img_travel_list/mien_bac/10-1.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text">Hà nội</p>
                        </div>
                    </div>
                    <div class="container__slide-item second">
                        <div style="background: url(./frontend/img/img_travel_list/mien_bac/10-2.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text">Đảo Cô Tô</p>
                        </div>
                    </div>
                    <div class="container__slide-item third">
                        <div style="background: url(./frontend/img/img_travel_list/mien_bac/10-3.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text">Sapa-Lào Cai</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_bac/10-4.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text">Mộc Châu- Sơn La</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_bac/10-5.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text">Hồ Ba Bể</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_bac/10-6.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text">Cát Bà</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_bac/10-7.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text">Ninh Bình</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_bac/10-8.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text">Tam Đảo</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_bac/10-9.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text">Hà Giang</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_bac/10-10.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text">Vịnh Hạ Long</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-item__show col l-9 m-6 c-12  ">
                <div class="listItemHot1">
                    <div id="list-item__showlisttour_1">
                        @foreach ($northTours as $nt)
                        <div class="tour-item">
                            <div class="tour-item__img">
                                <img src="{{ asset($nt->image_path) }}" alt="Ảnh tour">
                            </div>
                            <div class="tour-item__content">
                                <span class="item__content-name">{{ $nt->name }}</span>
                                <div class="item__content-rate-price">
                                    <span class="item__content-rate">8.0 superd</span>
                                    <span class="item__content-price">
                                        {{ number_format($nt->adult_price, 0, ',', ' ') }}<sup>đ</sup>
                                    </span>
                                </div>
                            </div>
                            <a href="{{ url("/tour/$nt->id") }}" class="tour-item__link"></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid wide">
        <div class="title-hot_tour">
            <div class="row ">
                <div class="col l-9 m-6 c-5 ">
                    <div class="row title-hot_tour-right reverse">
                        <div class="left-link_title-province">
                            <a href="{{ url('/tour?').\Illuminate\Support\Arr::query(['area'=>'mien trung']) }}">
                                <p class="link-more__tourhot">Xem tất cả.</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col l-3 m-6 c-7 title-hot_tour-left__reverse">
                    <h3 class="hot-province__text">Khu vực miền Trung.</h3>
                </div>
            </div>
        </div>
        <div class="row tour-item-row2">
            <div class="col l-9 m-6 c-12 tour-item-wrap">
                <div class="listItemHot2">
                    <div id="list-item__showlisttour_2">
                        @foreach ($centralTours as $ct)
                        <div class="tour-item tour-item2">
                            <div class="tour-item__img">
                                <img src="{{ asset($ct->image_path) }}" alt="Ảnh tour">
                            </div>
                            <div class="tour-item__content">
                                <span class="item__content-name">{{ $ct->name }}</span>
                                <div class="item__content-rate-price">
                                    <span class="item__content-rate">5.0 superd</span>
                                    <span class="item__content-price">
                                        {{ number_format($ct->adult_price, 0, ',', ' ')
                                        }}<sup>đ</sup>
                                    </span>
                                </div>
                            </div>
                            <a href="{{ url("/tour/$ct->id") }}" class="tour-item__link"></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col l-3 m-6 c-12 tour-item-wrap">
                <div class="container__slide-show" id="form2" style="margin-left:150%">
                    <div class="container__slide-item first">
                        <div style="background: url(./frontend/img/img_travel_list/mien_trung/10-1.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text top">Phong Nha - Kẻ Bàng</p>
                        </div>
                    </div>
                    <div class="container__slide-item second">
                        <div style="background: url(./frontend/img/img_travel_list/mien_trung/10-2.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text top">Huế</p>
                        </div>
                    </div>
                    <div class="container__slide-item third">
                        <div style="background: url(./frontend/img/img_travel_list/mien_trung/10-3.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text top">Đà Nẵng</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_trung/10-4.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text top">Hội An</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_trung/10-5.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text top">Thánh Địa Minh Sơn</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_trung/10-6.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text top">Phú Yên</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_trung/10-7.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text top">Đà Lạt</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_trung/10-8.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text top">Nha Trang</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_trung/10-9.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text top">Ninh Thuận</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_trung/10-10.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text top">Mũi né</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid wide">
        <div class="title-hot_tour">
            <div class="row">
                <div class="col l-3 m-3 c-7 title-hot_tour-left">
                    <h3 class="hot-province__text">Khu vực miền nam.</h3>
                </div>
                <div class="col l-9 m-9 c-5 ">
                    <div class="row title-hot_tour-right">
                        <div class="left-link_title-province">
                            <a href="{{ url('/tour?').\Illuminate\Support\Arr::query(['area'=>'mien nam']) }}">
                                <p class="link-more__tourhot">Xem tất cả.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col l-3 m-6 c-8 c-o-2 tour-item-wrap">
                <div class="container__slide-show" id="form3" style="margin-left:-200%">
                    <div class="container__slide-item first">
                        <div style="background: url(./frontend/img/img_travel_list/mien_nam/10-1.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text left">Thành Phố Hồ Chí Minh</p>
                        </div>
                    </div>
                    <div class="container__slide-item second">
                        <div style="background: url(./frontend/img/img_travel_list/mien_nam/10-2.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text left">Tây Ninh</p>
                        </div>
                    </div>
                    <div class="container__slide-item third">
                        <div style="background: url(./frontend/img/img_travel_list/mien_nam/10-3.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text left">Vũng Tàu</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_nam/10-4.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text left">Đồng Bằng Sông Cửu Long</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_nam/10-5.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text left">Đồng Tháp</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_nam/10-6.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text left">An Giang</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_nam/10-7.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text left">Cần thơ</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_nam/10-8.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text left">Kiên Giang</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_nam/10-9.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text left">Phú Quốc</p>
                        </div>
                    </div>
                    <div class="container__slide-item fourth">
                        <div style="background: url(./frontend/img/img_travel_list/mien_nam/10-10.jpg) no-repeat center center / cover"
                            class="container__slide-img">
                            <p class="container__slide-text left">Cà Mau</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-item__show col l-9 m-6 c-12">
                <div class="listItemHot3">
                    <div id="list-item__showlisttour">
                        @foreach ($southTours as $st)
                        <div class="tour-item">
                            <div class="tour-item__img">
                                <img src="{{ URL::asset($st->image_path) }}" alt="Ảnh tour">
                            </div>
                            <div class="tour-item__content">
                                <span class="item__content-name">{{ $st->name }}</span>
                                <div class="item__content-rate-price">
                                    <span class="item__content-rate">8.0 superd</span>
                                    <span class="item__content-price">
                                        {{ number_format($st->adult_price, 0, ',', ' ') }}<sup>đ</sup>
                                    </span>
                                </div>
                            </div>
                            <a href="{{ url("/tour/$st->id") }}" class="tour-item__link"></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="branch">
    <div class="branch-wrap">
        <img src="{{ URL::asset('frontend/img/brancvietnam.png') }}" alt="" class="branch-wrap__img">
    </div>
</section>
