@extends('frontend.master')

@push('title', 'Giới thiệu')

@section('content')
<div class="slider">
    <h1 class="slider-text translate" data-speed="0.1">Giới thiệu</h1>
    <img src="{{ URL::asset('frontend/img/img_slider/person.png') }} " class="person translate" data-speed="-0.25"
        alt="">
    <img src="{{ URL::asset('frontend/img/img_slider/slider1.jpg') }} " class="slider-img translate" data-speed="0.4"
        alt="">
</div>
<div class="main-about_us">
    <div class="container_about_us grid wide">
        <div class="row">
            <div class="container_about_us-item col l-12 m-12 c-12">
                <div class="container_about_us_item-list">
                    {!! $aboutUs->about_us!!}
                </div>
            </div>
            {{-- <div class="container_about_us-item1 col l-5 m-0-11 m-12 c-12">
                <div class="container_about_us_item-img">
                    <img src="{{ URL::asset('frontend/img/about_us2.jpg') }} " alt="img_about-">
                </div>
            </div> --}}
        </div>
    </div>
    <section id="review">
        <div class="video-review-about">
            <div class="grid wide">
                <div class="row">
                    <div class="col l-8 l-o-2 c-10 c-o-1">
                        <div class="title">
                            <div class="grid">
                                <div class="wrap-title">
                                    <div class="banner-content banner-content-choose">
                                        <h2 class="banner-heading__medium banner-heading--color">Vẻ đẹp của thế giới
                                        </h2>
                                        <h1 class="banner-heading__big">Đi & Khám phá</h1>
                                        <p class="banner-text-small">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                            elit. Aene an commodo ligula eget dolor. Aenean massa. Cum sociis the</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="video">
                            <!-- // video tự quay -->
                            <div class="video-frames js-video">
                                {{-- <iframe width="" height="" src="" autoplay="1" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; controls; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe> --}}
                                <iframe class="responsive-iframe"
                                    src="https://www.youtube.com/embed/Au6LqK1UH8g?autoplay=1&mute=1" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
<div class="container_popular_tours aboutus grid wide ">
    <div class="row">
        <div class="popular_tours-img col l-6 m-0-11 m-12 c-12 ">
            <img src="{{ URL::asset('frontend/img/about-us-img-2.png') }}" alt="">
        </div>
        <div class="popular_tours col l-6 m-0-11 m-12 c-12 ">
            <div class="popular_tours-title">
                <h2 class="container_about_us_item_list-title">Tour phổ biến của chúng tôi</h2>
                <p class="container_about_us_item_list-text"> Etiam rhoncus. Maecenas tempus, tellus eget condimentum
                    rhoncus, sem quam semper libero, sit amet adipiscing sem</p>
            </div>
            <div class="popular_tours-percentage">
                <div class="popular_tours-progress-bar">
                    <h6 class="popular_tours-progress-bar-title">Miền Bắc</h6>
                    <span>76%</span>
                </div>
                <div class="meter">
                    <span style="width: 76%"></span>
                </div>
                <div class="popular_tours-progress-bar">
                    <h6 class="popular_tours-progress-bar-title">Miền trung</h6>
                    <span>92%</span>
                </div>
                <div class="meter">
                    <span style="width: 92%"></span>
                </div>
                <div class="popular_tours-progress-bar">
                    <h6 class="popular_tours-progress-bar-title">Miền Nam</h6>
                    <span>86%</span>
                </div>
                <div class="meter">
                    <span style="width: 86%"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container_famous">
    <div class="famous_list row">
        @foreach ($hotTours as $ht)
        <div class="famous_list_tour-item col l-2  c-12 m-6">
            <a href="{{ url("/tour/$ht->id") }}" class="famous_list_tour-link">
                <div class="famous_list_tour-information">
                    <p class="famous_list_tour-title">{{ $ht->name }}</p>
                    {{-- <span class="famous_list_tour_price">{{ number_format($ht->adult_price, 0, ',', ' ')
                        }}<sup>đ</sup>
                    </span> --}}
                </div>
                <img src="{{ asset($ht->image_path) }}" alt="Hot tour image" class="famous_list_tour-img">
            </a>
        </div>
        @endforeach
    </div>

</div>
<div class="container_footer_about_us">
    <div class="container_footer_about_us-list_item grid ">
        <div class="container_footer_about_us-item ">
            <p class="container_footer_about_us_item-text">Theo dõi chúng tôi để khám phá nhiều tour và địa điểm đẹp
                hơn.</p>
        </div>
        <div class="container_footer_about_us-item1 ">
            <div class="container_footer_about_us_item-button">
                <a href="https://www.facebook.com/khuong.vietour/" class="container_footer_about_us_item-link">
                    <p>Tham gia ngay</p>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
