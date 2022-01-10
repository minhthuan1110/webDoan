<section id="slide-tour">
    <div class="title title-top ">
        <div class="grid wide">
            <div class="row">
                <div class="col l-6 l-o-3 m-8 m-o-2 c-10 c-o-1">
                    <div class="banner-content banner-content-choose text-dark-color">
                        <h2 class="banner-heading__medium banner-heading--color">My world</h2>
                        <h1 class="banner-heading__big">Du Lịch Quốc Tế</h1>
                        <p class="banner-text-small">Thế giới trong tay, nhấc ngay hành lý. Không lo chi phí,với mọi ý
                            chí có ngay chuyến đi như ý...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="list-tour">
        @foreach ($foreignTours as $tour)
        <div class="list-tour__item">
            <div class="list-tour__item-img">
                <a href="{{ url("/tour/{$tour->id}") }}">
                    <img src="{{ URL::asset($tour->image_path) }}" alt="tour image"
                        onerror="this.onerror=null;this.src='{{ asset('/images/placeholder600x600.png') }}'">
                </a>
            </div>
            <div class="list-tour__item-standard">
                <div class="standard-holder">
                    <i class="standard-holder__icon ti-calendar"></i>
                    <span class="standard-holder__text">
                        {{ count(explode(',', $tour->other_day)) }}
                    </span>
                </div>
                {{-- <div class="standard-holder">
                    <i class="standard-holder__icon fas fa-walking"></i>
                    <span class="standard-holder__text">12+</span>
                </div> --}}
                <div class="standard-holder">
                    <i class="standard-holder__icon ti-location-pin"></i>
                    <a href="javascript::void()" class="standard-holder__text">
                        {{ $tour->destination }}
                    </a>
                </div>
            </div>
            <div class="list-tour__item-content">
                <h1 class="content-heading">{{ $tour->name }}</h1>
                <p class="content-text">{{ $tour->description }}</p>
                <div class="item__content-rate-price">
                    <span class="item__content-rate">8.0 superd</span>
                    {{-- <span class="item__content-price discount">{{ $tour->adult_price }}
                        &nbsp;<sup>đ</sup>
                    </span> --}}
                    <span class="item__content-price">
                        {{ number_format($tour->adult_price, 0, ',', ' ') }}
                        &nbsp;<sup>đ</sup>
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
