<section id="post-stamp">
    <div class="title">
        <div class="grid">
            <div class="wrap-title">
                <div class="banner-content banner-content-choose">
                    <h2 class="banner-heading__medium banner-heading--color">
                        Tour hót
                    </h2>
                    <h1 class="banner-heading__big">Tour Chọn Nhiều Nhất</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="stamp-photo-list">
        @foreach ($hotTours as $hotTour)
        <!-- stamp-photo--horizontal active -->
        <div class="stamp-photo-item ">
            <a href="{{ url("/tour/$hotTour->id") }}" class="stamp-photo__link">
                <img class="stamp-photo__img" src="{{ asset($hotTour->image_path) }}"
                    onerror="this.onerror=null;this.src='{{ asset('/images/placeholder600x600.png') }}'" />
                <div class="stamp-photo-info">
                    <h1 class="stamp-info-title">{{ $hotTour->name }}</h1>
                    <p class="stamp-info-content">{{ $hotTour->description }}</p>
                </div>
            </a>
        </div>
        @endforeach

    </div>
</section>
