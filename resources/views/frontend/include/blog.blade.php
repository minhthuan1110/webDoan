<section id="blog">
    <div class="grid wide">
        <div class="row">
            <div class="col l-8 c-10 c-o-1">
                <div class="blog-title">
                    <h2 class="blog-title__heading">Bí kíp du lịch.</h2>
                    <p class="blog-title__text">Một số bài viết về du lịch đặc biệt của chúng tôi có thể bạn sẽ quan tâm
                        đến, hãy xem những bài viết dưới đấy để biết thêm</p>
                </div>
                <ul class="blog-list">
                    @foreach ($articles as $article)
                    <li class="blog-item">
                        <div class="blog-item_img">
                            <!-- <a href="{{ url("/blog/{$article->id}") }}">
                                <img src="{{ URL::asset($article->image_path) }}" alt="blog image"
                                    onerror="this.onerror=null;this.src='{{ asset('/images/placeholder600x600.png') }}'">
                            </a> -->
                        </div>
                        <div class="blog-item__content">
                            <h4 class="blog-item__content-name">
                                <!-- <a href="{{ url("/blog/{$article->id}") }}">{{ $article->title }}</a> -->
                            </h4>
                            {{-- <p class="blog-item__content-text">
                                content
                            </p> --}}
                            <div class="content-comment__wrap">
                                {{-- <a href="#">{{ $article->created_at }}</a> --}}
                                {{-- <a href="#"><i class="fas fa-comment"></i>4
                                    comments</a>
                                --}}
                                
                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
            <div class="col l-4 hide-on-mobile hide-on-tablet">
                <div class="blog-show-wrap">
                    <a class="blog-show-img" href="#"><img src="{{ URL::asset('frontend/img/woman.jpg') }}"
                            alt="show"></a>
                    <div class="robbins-wrap">
                        <h5 class="robbins-link">vietour.com</h5>
                        <h2 class="robbins">sale up to 70%</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
