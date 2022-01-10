@extends('frontend.master')

@push('title', 'Detail tour')

@section('content')
<div class="slider">
    <h1 class="slider-text translate" data-speed="0.1">detail-tour</h1>
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
                        class="fas fa-book"></i>thông tin chi tiết</button>
                <button class="tablinks btn-buttom_list col l-2-4 m-6 c-12"> <i class="far fa-calendar-alt"></i>kế hoạch
                    tour</button>
                <button class="tablinks btn-buttom_list col l-2-4 m-6 c-12"><i class="fas fa-map-marker-alt"></i>địa chỉ
                </button>
                <button class="tablinks btn-buttom_list col l-2-4 m-6 c-12"><i class="fas fa-camera-retro"></i>bộ sưu
                    tập</button>
                <button class="tablinks btn-buttom_list col l-2-4 m-6 c-12"><i class="far fa-comments"></i>đánh
                    giá</button>
            </div>
        </div>
        <div class="container-product row">
            <div class="container_list-product col l-9 m-12 c-12">
                {{--                 ///  - information-        //      --}}
                <div class="tabcontent active_page ">
                    <div class="product-detail-information">
                        <div class="product-information">
                            <h1 class="name_product-detail">hà giang</h1>
                            <div class="product-price_item">
                                <span class="product_price-detail">$720</span>
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
                            <p>Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla
                                ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel
                                augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas
                                tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem
                                neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
                                Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis
                                faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo.
                            </p>
                        </div>
                        <div class="product-list_img">
                            <ul class="product_show-view ">
                                <li class="product_item-view">
                                    <i class="far fa-calendar-alt"></i>
                                    <span class="product-note_text">1</span>
                                </li>
                                <li class="product_item-view">
                                    <i class="fas fa-user"></i>
                                    <span class="product-note_text">13+</span>
                                </li>
                                <li class="product_item-view">
                                    <i class="fas fa-map-marker"></i>
                                    <span class="product-note_text"><a href="">wines</a></span>
                                </li>
                            </ul>
                        </div>
                        <div class="detail_main-infor">
                            <ul class="tour_main-holder">
                                <li class="tour_main-clearfix row">
                                    <div class="tour-main-text col l-4 m-4 c-12">
                                        <p>nơi đến</p>
                                    </div>
                                    <div class="tour-infor col l-8 m-4 c-12">
                                        <p>hà giang</p>
                                    </div>
                                </li>
                                <li class="tour_main-clearfix row">
                                    <div class="tour-main-text col l-4 m-4 c-12">
                                        <p>khởi hành</p>
                                    </div>
                                    <div class="tour-infor   col l-8 m-4 c-12">
                                        <p>đưa đón tại gia</p>
                                    </div>
                                </li>
                                <li class="tour_main-clearfix row">
                                    <div class="tour-main-text col l-4 m-4 c-12">
                                        <p>khởi hành</p>
                                    </div>
                                    <div class="tour-infor  col l-8 m-4 c-12">
                                        <p>khoảng 5:00 AM</p>
                                    </div>
                                </li>
                                <li class="tour_main-clearfix row">
                                    <div class="tour-main-text col l-4 m-4 c-12">
                                        <p>thời gian tới </p>
                                    </div>
                                    <div class="tour-infor  col l-8 m-4 c-12">
                                        <p>khoảng 10:00 AM</p>
                                    </div>
                                </li>
                                <li class="tour_main-clearfix row">
                                    <div class="tour-main-text col l-4 m-4 c-12">
                                        <p>đồng phục </p>
                                    </div>
                                    <div class="tour-infor  col l-8 m-4 c-12">
                                        <p>Mặc pramar kẻ sọc</p>
                                    </div>
                                </li>
                                <li class="tour_main-clearfix row">
                                    <div class="tour-main-text col l-4 m-4 c-12">
                                        <p>dịch vụ</p>
                                    </div>
                                    <div class="tour-infor  col l-8 m-4 c-12">
                                        <p>- khách sạn 5 sao</p>
                                        <p>- phương tiện đi bằng xe giường nằm</p>
                                        <p>- bao bữa sáng</p>
                                        <p>- có hướng dẫn viên </p>
                                    </div>
                                </li>
                                <li class="tour_main-clearfix row">
                                    <div class="tour-main-text col l-4 m-4 c-12">
                                        <p>dịch vụ không kèm theo</p>
                                    </div>
                                    <div class="tour-infor  col l-8 m-4 c-12">
                                        <p>- các loại vé vui chơi giải trí</p>
                                        <p>- không chi đồ ăn vặt</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="product-detail-information">
                            <div class="product-information">
                                <h1 class="name_product-detail">phong cảnh</h1>
                            </div>
                            <div class="product-detail-content">
                                <p>Hầ giang là nơi một trong số khu vực đẹp mhất tây bắc với phong cảnh giản dị mộc mạc
                                    và là nơi có nhiều núi non hùng vĩ với phông cảnh tuyệt vời.</p>
                            </div>
                            <div class="list-img_detail row">
                                <div class="grallery col l-4 c-12 m-6 ">
                                    <figure class="list-show_img action-img1 " data-lightbox='mygallery'>
                                        <img src="{{ URL::asset('frontend/img/detail-product/pc1.jpg') }}" alt="Đồng lúa hà giang"
                                            class="img-detail_list_tour item-img myImg" />
                                    </figure>
                                </div>
                                <div class="grallery col l-4 c-12 m-6 ">
                                    <figure class="list-show_img action-img1 " data-lightbox='mygallery'>
                                        <img src="{{ URL::asset('frontend/img/detail-product/pc2.jpg') }}" alt="Đồng lúa hà giang"
                                            class="img-detail_list_tour item-img myImg" />
                                    </figure>
                                </div>
                                <div class="grallery col l-4 c-12 m-6 ">
                                    <figure class="list-show_img action-img1 " data-lightbox='mygallery'>
                                        <img src="{{ URL::asset('frontend/img/detail-product/pc3.jpg') }}" alt="Đồng lúa hà giang"
                                            class="img-detail_list_tour item-img myImg" />
                                    </figure>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
                {{--                ///    - tour plan-                       /       --}}
                <div class="tabcontent">
                    <div class="detail-tour_pain">
                        <h1 class="titel-tour_pain">tour plain</h1>
                    </div>
                    <div class="list-tour_pain">
                        <div class="number-date">
                            <span>1</span>
                        </div>
                        <p class="titel-date_tour_pain">ngày 1: khởi hành Hà Nội – Hà Giang</p>
                        <div class="text-tour_psin">
                            <p class="text-container_pain">
                                Tối thứ 5 bắt xe giường nằm lên thành phố Hà Giang, thuê xe tại thành phố Hà Giang hoặc
                                gửi xe máy theo từ Hà Nội nếu bạn không thể thuê xe.
                            </p>
                            <p class="text-container_pain">
                                + kiểm tra phương tiện<br>
                                + điểm danh quân số.<br>
                                + ăn sáng<br>
                                + lên đường<br>
                            </p>
                        </div>
                    </div>
                    <div class="list-tour_pain">
                        <div class="number-date">
                            <span>2</span>
                        </div>
                        <p class="titel-date_tour_pain">ngày 2: Hà Giang – Quản Bạ – Yên Minh – Phó Bảng – Sủng Là –
                            Đồng Văn</p>
                        <div class="text-tour_psin">
                            <p class="text-container_pain">
                                Tối thứ 5 bắt xe giường nằm lên thành phố Hà Giang, thuê xe tại thành phố Hà Giang hoặc
                                gửi xe máy theo từ Hà Nội nếu bạn không thể thuê xe.
                            </p>
                            <p class="text-container_pain">
                                + kiểm tra phương tiện<br>
                                + điểm danh quân số.<br>
                                + ăn sáng<br>
                                + lên đường<br>
                            </p>
                        </div>
                    </div>
                    <div class="list-tour_pain">
                        <div class="number-date">
                            <span>3</span>
                        </div>
                        <p class="titel-date_tour_pain">ngày 3: Đồng Văn – Lũng Cú – Dinh Vương – Đồng Văn – Mã Pì Lèng
                            – Mèo Vạc</p>
                        <div class="text-tour_psin">
                            <p class="text-container_pain">
                                Tối thứ 5 bắt xe giường nằm lên thành phố Hà Giang, thuê xe tại thành phố Hà Giang hoặc
                                gửi xe máy theo từ Hà Nội nếu bạn không thể thuê xe.
                            </p>
                            <p class="text-container_pain">
                                + kiểm tra phương tiện<br>
                                + điểm danh quân số.<br>
                                + ăn sáng<br>
                                + lên đường<br>
                            </p>
                        </div>
                    </div>
                    <div class="list-tour_pain">
                        <div class="number-date">
                            <span>4</span>
                        </div>
                        <p class="titel-date_tour_pain">ngày 4: Mèo Vạc – Mậu Duệ – Du Già (tùy thời tiết) – Yên Minh –
                            Hà Giang</p>
                        <div class="text-tour_psin">
                            <p class="text-container_pain">
                                Tối thứ 5 bắt xe giường nằm lên thành phố Hà Giang, thuê xe tại thành phố Hà Giang hoặc
                                gửi xe máy theo từ Hà Nội nếu bạn không thể thuê xe.
                            </p>
                            <p class="text-container_pain">
                                + kiểm tra phương tiện<br>
                                + điểm danh quân số.<br>
                                + ăn sáng<br>
                                + lên đường<br>
                            </p>
                        </div>
                    </div>
                    <div class="list-tour_pain">
                        <div class="number-date">
                            <span>5</span>
                        </div>
                        <p class="titel-date_tour_pain">ngày 5: Ba Bể – Phủ Thông – Bắc Kạn – Hà Nội (220km)</p>
                        <div class="text-tour_psin">
                            <p class="text-container_pain">
                                Tối thứ 5 bắt xe giường nằm lên thành phố Hà Giang, thuê xe tại thành phố Hà Giang hoặc
                                gửi xe máy theo từ Hà Nội nếu bạn không thể thuê xe.
                            </p>
                            <p class="text-container_pain">
                                + kiểm tra phương tiện<br>
                                + điểm danh quân số.<br>
                                + ăn sáng<br>
                                + lên đường<br>
                            </p>
                        </div>
                    </div>
                </div>
                {{--            ///    - location-   ///     --}}
                <div class="tabcontent">
                    <div class="location-taital_pain">
                        <div class="detail-tour_pain">
                            <h1 class="titel-tour_pain">location</h1>
                            <p>Đồng Văn – Lũng Cú (26km) – Dinh Vương (26km) – Đồng Văn (15km) lên với điểm cực Bắc của
                                Việt Nam,rồi rời Lũng Cú về Dinh Vua Mèo Vương Chí Sình. Trưa về nghỉ và ăn trưa tại
                                Đồng Văn</p>
                        </div>
                        <div class="map-detail_tour">
                            {{-- <div id="map"> --}}
                            <!-- <img src="{{ URL::asset('frontend/img/map/hagiangmap.jpg') }}" alt=""> -->
                        </div>
                    </div>
                </div>
                {{--           //     - grallery-    //      --}}
                <div class="tabcontent">
                    <div class="img-detail">
                        <figure class="list-show_img action-img " data-lightbox='mygallery'>
                            <img src="https://assets.codepen.io/12005/windmill.jpg" alt="A windmill"
                                class="img-detail_list_tour" />
                        </figure>
                        <figure class="landscape action-img">
                            <img src="https://assets.codepen.io/12005/suspension-bridge.jpg"
                                alt="The Clifton Suspension Bridge" class="img-detail_list_tour" />
                        </figure>
                        <figure class="action-img">
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
                        </figure>
                    </div>
                </div>
                {{--       //        - reviews-   // --}}
                <div class="tabcontent">
                    <div class="reviews-tour">
                        <div class="detail-tour_pain">
                            <h1 class="titel-tour_pain">Điểm đánh giá và phân tích điểm</h1>
                            <p>Không chỉ được thiên nhiên ưu ái cho nhiều danh lam thắng cảnh được thế giới trầm trồ, Hà
                                Giang còn là nơi lưu giữ những di tích lịch sử lâu đời cũng như nét đẹp văn hóa đặc sắc
                                của 22 dân tộc vùng cao phía Bắc. Tất cả đã tạo nên sức hút hấp dẫn khiến các tín đồ du
                                lịch không ngừng tìm kiếm kinh nghiệm du lịch Hà Giang để chinh phục trọn vẹn vùng sơn
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
                                    <lable class="wp-comment-cookies-consent">
                                        Save my name, email, and website in this browser for the next time I comment.
                                    </lable>
                                </div>
                                <button class="feedback_content-submit">send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-search_product col l-3 m-12 c-12">
                <div class="container-feedback ">
                    <div class="feedback_list-items book-card">
                        <div class="feedback-items">
                            <h2 class="contact_us-title " style="text-transform:capitalize">đặt chuyến thăm quan tại đây
                            </h2>
                        </div>
                        <div class=" feedback_content-information">
                            <div class="feedback_information-email-card ">
                                <span class="icon_add-card"><i class="fas fa-user-alt"></i></span>
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
                            <div class="feedback_information-email-card">
                                <span class="icon_add-card"><i class="far fa-calendar-alt"></i></span>
                                <input class="feedback_input-card add-card" date-number="['13-12-2021', '16-11-2021', '17-11-2021','18-11-2021']"  id="datepicker" placeholder="dd-mm-yyyy*">
                            </div>
                            <div class="feedback_information-email-card">
                                <span class="icon_add-card"><i class="fas fa-tags"></i></span>
                                <input class="feedback_input-card add-card" type="number" min="0" placeholder="Number of tickets*">
                            </div>
                            <div class="feedback-content content-card">
                                <span></span>
                                <textarea name="" class="feedback_content-text content_text-card" cols="5" rows="6"
                                    placeholder="Message"></textarea>
                            </div>

                        </div>
                        <button class="feedback_content-submit submit-btn">check availability</button>
                        <button class="feedback_content-submit submit-btn">book now</button>
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
        <div class="product-img_show_detail">
            <div class="previews-img">
                <div class="detail-img">
                    <span class="title">hà giang
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
