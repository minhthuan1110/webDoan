<section id="slider">
    @if (collect($sliders)->isNotEmpty())
    @foreach ($sliders as $slider)
    <div class="slider-move">
        <div class="slider-wrap-img">
            <a href="javascript::void()">
                <img src="{{ asset($slider->image_path) }}" alt="Slider" class="slider__img" />
            </a>">
        </div>
        <div class="banner-content banner-content--slider">
            <h2 class="banner-heading__medium">{{ $slider->title }}</h2>
            <h1 class="banner-heading__big">{{ $slider->content }}</h1>
            {{-- <p class="banner-text-small">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aene an commodo
                ligula eget dolor. Aenean massa. Cum sociis the</p> --}}
        </div>
    </div>
    @endforeach
    @else
    <div class="slider-move">
        <div class="slider-wrap-img">
            <a href="javascript::void()">
                <img src="{{ asset('/images/sliders/vector-design.jpg') }}" alt="Slider" class="slider__img" />
            </a>">
        </div>
        <div class="banner-content banner-content--slider">
            <h2 class="banner-heading__medium"></h2>
            <h1 class="banner-heading__big"></h1>
            {{-- <p class="banner-text-small">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aene an commodo
                ligula eget dolor. Aenean massa. Cum sociis the</p> --}}
        </div>
    </div>
    @endif
</section>
