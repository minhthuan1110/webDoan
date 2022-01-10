@extends('frontend.master')

@push('title', 'Bài viết')

@section('content')
<div class="slider">
    <h1 class="slider-text translate" data-speed="0.1">Bài viết</h1>
    <img src="{{ URL::asset('frontend/img/img_slider/person.png') }} " class="person translate" data-speed="-0.25"
        alt="">
    <img src="{{ URL::asset('frontend/img/img_slider/slider1.jpg') }} " class="slider-img translate" data-speed="0.4"
        alt="">
</div>

<div class="container-blogmasonry">
    <div class="container-blogmasonry_list_content grid wide ">

        @foreach ($articles as $article)
        <div class="container-blogmasonry-title_item row">
            <div class="blogmasonry-title_item l-4 c-12 m12">
                <a href="{{ url("/blog/{$article->id}") }}" class="blogmasonry_item-img-link">
                    <img src="{{ URL::asset($article->image_path) }}"
                        onerror="this.onerror=null;this.src='{{ asset('/images/placeholder600x600.png') }}'"
                        alt="Article image" class="blogmasonry_item-img">
                </a>
            </div>
            <div class="blogmasonry-title_item l-8 c-12 m-12">
                <h2 class="blogmasonry_item-title">
                    <a href="{{ url("/blog/{$article->id}") }}">{{ $article->title }}</a>
                </h2>
                <div class="blogmasonry_item-date"><i class="far fa-calendar-alt"></i>
                    <span>{{ $article->created_at }}</span>
                </div>
                <div class="blogmasonry-title_list-content">
                    <p class="blogmasonry_content-text">&nbsp;</p>
                </div>
                <div class="blogmasonry_content-detail">
                    <a href="{{ url("/blog/{$article->id}") }}" class="blogmasonry_detail-link">Xem thêm<i
                            class="ti-arrow-right"></i></a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    {{ $articles->links() }}
</div>
@endsection
