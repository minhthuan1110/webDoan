@extends('frontend.master')

@push('title', 'Standard list')

@push('script')
<script>
    $( function() {
      $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 500,
        values: [ 75, 300 ],
        slide: function( event, ui ) {
          $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
      });
      $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
        " - $" + $( "#slider-range" ).slider( "values", 1 ) );
    } );
</script>
@endpush

@section('content')
<div class="slider">
    <h1 class="slider-text translate" data-speed="0.1">standard_list</h1>
    <img src="{{ URL::asset('frontend/img/img_slider/person.png') }} " class="person translate" data-speed="-0.25"
        alt="">
    <img src="{{ URL::asset('frontend/img/img_slider/slider2.jpg') }} " class="slider-img translate" data-speed="0.4"
        alt="">
</div>
<div class="body_main">
    <div class="standard-container grid wide">
        <div class="container-product row">
            <div class="container-search-content-holder ">
                <ul class="search-ordering-list row " style="margin-left:-5px;">
                    <li class="search-ordering-item">
                        <a href="#" class="search-ordering-item-link">
                            <i class="far fa-calendar-alt"></i>
                            <span class="search-ordering-item-title">date</span>
                        </a>
                    </li>
                    <li class="search-ordering-item">
                        <a href="#" class="search-ordering-item-link">
                            <i class="fas fa-upload"></i>
                            <span class="search-ordering-item-title">price low to hight</span>
                        </a>
                    </li>
                    <li class="search-ordering-item">
                        <a href="#" class="search-ordering-item-link">
                            <i class="fas fa-download"></i>
                            <span class="search-ordering-item-title">price hight to now</span>
                        </a>
                    </li>
                    <li class="search-ordering-item">
                        <a href="#" class="search-ordering-item-link">
                            <i class="fas fa-compress-alt"></i>
                            <span class="search-ordering-item-title">name(A-Z)</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="container_list-product l-9 m-12 c-12">
                <div class="product row">
                    <div class="product-item l-6 c-12 m-12">
                        <div class="product-list-item">
                            <div class="product-show_item">
                                <div class="product-list_img">
                                    <div class="product-img">
                                        <a href="" class="product-img-link">
                                            <img class="product-show_img"
                                                src="{{ URL::asset('frontend/img/img_item_tour/item.jpg') }}" alt="">
                                        </a>

                                    </div>
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
                                <div class="product-content">
                                    <div class="product-title">
                                        <a href="" class="prouct_title-link">active winter</a>
                                    </div>
                                    <div class="product-text">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing el. Aenean commodo…</p>
                                    </div>
                                    <div class="product_price">
                                        <span class="product-price_product">$2430</span>
                                        <div class="product-list_evaluate">
                                            <span class="product-average_rating"><i class="fas fa-star"></i> 7.0</span>
                                            <span class="product-rating_description">superb</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-item l-6 c-12 m-12">
                        <div class="product-list-item">
                            <div class="product-show_item">
                                <div class="product-list_img">
                                    <div class="product-img">
                                        <a href="" class="product-img-link">
                                            <img class="product-show_img"
                                                src="{{ URL::asset('frontend/img/img_item_tour/item9.jpg') }}" alt="">
                                        </a>

                                    </div>
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
                                <div class="product-content">
                                    <div class="product-title">
                                        <a href="" class="prouct_title-link">active winter</a>
                                    </div>
                                    <div class="product-text">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing el. Aenean commodo…</p>
                                    </div>
                                    <div class="product_price">
                                        <span class="product-price_product">$2430</span>
                                        <div class="product-list_evaluate">
                                            <span class="product-average_rating"><i class="fas fa-star"></i> 7.0</span>
                                            <span class="product-rating_description">superb</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-item l-6 c-12 m-12">
                        <div class="product-list-item">
                            <div class="product-show_item">
                                <div class="product-list_img">
                                    <div class="product-img">
                                        <a href="" class="product-img-link">
                                            <img class="product-show_img"
                                                src="{{ URL::asset('frontend/img/img_item_tour/item7.jpg') }}" alt="">
                                        </a>

                                    </div>
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
                                <div class="product-content">
                                    <div class="product-title">
                                        <a href="" class="prouct_title-link">active winter</a>
                                    </div>
                                    <div class="product-text">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing el. Aenean commodo…</p>
                                    </div>
                                    <div class="product_price">
                                        <span class="product-price_product">$2430</span>
                                        <div class="product-list_evaluate">
                                            <span class="product-average_rating"><i class="fas fa-star"></i> 7.0</span>
                                            <span class="product-rating_description">superb</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-item l-6 c-12 m-12">
                        <div class="product-list-item">
                            <div class="product-show_item">
                                <div class="product-list_img">
                                    <div class="product-img">
                                        <a href="" class="product-img-link">
                                            <img class="product-show_img"
                                                src="{{ URL::asset('frontend/img/img_item_tour/item3.jpg') }}" alt="">
                                        </a>

                                    </div>
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
                                <div class="product-content">
                                    <div class="product-title">
                                        <a href="" class="prouct_title-link">active winter</a>
                                    </div>
                                    <div class="product-text">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing el. Aenean commodo…</p>
                                    </div>
                                    <div class="product_price">
                                        <span class="product-price_product">$2430</span>
                                        <div class="product-list_evaluate">
                                            <span class="product-average_rating"><i class="fas fa-star"></i> 7.0</span>
                                            <span class="product-rating_description">superb</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-item l-6 c-12 m-12">
                        <div class="product-list-item">
                            <div class="product-show_item">
                                <div class="product-list_img">
                                    <div class="product-img">
                                        <a href="" class="product-img-link">
                                            <img class="product-show_img"
                                                src="{{ URL::asset('frontend/img/img_item_tour/item5.jpg') }}" alt="">
                                        </a>

                                    </div>
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
                                <div class="product-content">
                                    <div class="product-title">
                                        <a href="" class="prouct_title-link">active winter</a>
                                    </div>
                                    <div class="product-text">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing el. Aenean commodo…</p>
                                    </div>
                                    <div class="product_price">
                                        <span class="product-price_product">$2430</span>
                                        <div class="product-list_evaluate">
                                            <span class="product-average_rating"><i class="fas fa-star"></i> 7.0</span>
                                            <span class="product-rating_description">superb</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-item l-6 c-12 m-12">
                        <div class="product-list-item">
                            <div class="product-show_item">
                                <div class="product-list_img">
                                    <div class="product-img">
                                        <a href="" class="product-img-link">
                                            <img class="product-show_img"
                                                src="{{ URL::asset('frontend/img/img_item_tour/item4.jpg') }}" alt="">
                                        </a>

                                    </div>
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
                                <div class="product-content">
                                    <div class="product-title">
                                        <a href="" class="prouct_title-link">active winter</a>
                                    </div>
                                    <div class="product-text">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing el. Aenean commodo…</p>
                                    </div>
                                    <div class="product_price">
                                        <span class="product-price_product">$2430</span>
                                        <div class="product-list_evaluate">
                                            <span class="product-average_rating"><i class="fas fa-star"></i> 7.0</span>
                                            <span class="product-rating_description">superb</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-search_product l-3 m-12 c-12">
                <div class="container-feedback sandard-list ">
                    <div class="feedback_list-items book-card">
                        <div class="feedback-items">
                            <h2 class="contact_us-title " style="text-transform:capitalize">plan your trip</h2>
                        </div>
                        <div class=" feedback_content-information">
                            <div class="filter-wrap-item about_search">
                                <span class="filter__icon filter__icon-location-search"></span>
                                <input type="text" class="filter__input" placeholder="Search Tour">
                            </div>
                            <div class="filter-wrap-item about_search">
                                <span class="filter__icon filter__icon-location"></span>
                                <input type="text" class="filter__input" placeholder="Where to?">
                            </div>
                            <div class="filter-wrap-item">
                                <span class="filter__icon filter__icon-calendar"></span>
                                <span class="filter__input filter-selected">Month</span>
                                <div type="text" class="filter__list">
                                    <div class="filter__item">
                                        <input type="radio" name="category" class="radio" id="input-select-filter">
                                        <label class="filter__item-month" for="input-select-filter">January</label>
                                    </div>
                                    <div class="filter__item">
                                        <input type="radio" name="category" class="radio" id="input-select-filter-1">
                                        <label class="filter__item-month" for="input-select-filter-1">March</label>
                                    </div>
                                    <div class="filter__item">
                                        <input type="radio" name="category" class="radio" id="input-select-filter-2">
                                        <label class="filter__item-month" for="input-select-filter-2">April</label>
                                    </div>
                                    <div class="filter__item">
                                        <input type="radio" name="category" class="radio" id="input-select-filter-3">
                                        <label class="filter__item-month" for="input-select-filter-3">May</label>
                                    </div>
                                    <div class="filter__item">
                                        <input type="radio" name="category" class="radio" id="input-select-filter-4">
                                        <label class="filter__item-month" for="input-select-filter-4">June</label>
                                    </div>
                                    <div class="filter__item">
                                        <input type="radio" name="category" class="radio" id="input-select-filter-5">
                                        <label class="filter__item-month" for="input-select-filter-5">July</label>
                                    </div>
                                    <div class="filter__item">
                                        <input type="radio" name="category" class="radio" id="input-select-filter-6">
                                        <label class="filter__item-month" for="input-select-filter-6">August</label>
                                    </div>
                                    <div class="filter__item">
                                        <input type="radio" name="category" class="radio" id="input-select-filter-7">
                                        <label class="filter__item-month" for="input-select-filter-7">September</label>
                                    </div>
                                    <div class="filter__item">
                                        <input type="radio" name="category" class="radio" id="input-select-filter-8">
                                        <label class="filter__item-month" for="input-select-filter-8">October</label>
                                    </div>
                                    <div class="filter__item">
                                        <input type="radio" name="category" class="radio" id="input-select-filter-9">
                                        <label class="filter__item-month" for="input-select-filter-9">November</label>
                                    </div>
                                    <div class="filter__item">
                                        <input type="radio" name="category" class="radio" id="input-select-filter-10">
                                        <label class="filter__item-month" for="input-select-filter-10">December</label>
                                    </div>
                                </div>
                            </div>
                            <p class="sider-range">
                                <label for="amount">Price range:</label>
                                <input type="text" id="amount" readonly>
                            </p>
                            <div id="slider-range"></div>
                        </div>
                        <button class="feedback_content-submit submit-btn">search </button>
                    </div>
                </div>
                <div class="img-planes">
                    <div class="cloud-effect-planes"></div>
                    <img src="{{ URL::asset('frontend/img/panle.JPG') }} " class="slider-img translate">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
