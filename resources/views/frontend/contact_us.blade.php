@extends('frontend.master')

@push('title', 'Liên hệ')

@section('content')
<div class="container-map">
    <div id="map">
    </div>
    <div class="container_about_us grid wide">
        <div class="row">
            <div class="container_about_us-item col l-7 m-12 c-12">
                <div class="container_about_us_item-list contact_us_item-list">
                    <h2 class="container_about_us_item_list-title">Liên hệ với chúng tôi</h2>
                    <p class="container_about_us_item_list-text">Si elit omnes impedit ius, vel et hinc agam fabulas. Ut
                        audiam invenire iracundia vim. Tn ea diam ea. Piber Korem sit amet.</p>
                    <p class="container_about_us_item_list-text_content">Al elit omnes impedfghit ius, vel et hinc agam
                        fabulas. Ut audiam inve nire iracu ndia vim. En eam dico simi lique, ut sint posse sit, eum sumo
                        diam ea. Liber consec tetuer in mei, sea in imperdiet assue verit contentiones, an his cibo bla
                        ndit tacimates. Iusto iudi cabit simil ique id velex, in sea rebum deser uisse appntur honcus.
                        Maece nas cibo blandit tacim ates sint posse.</p>
                    <a href="" class="container_about_us_item_list-readmore"><span> read more</span></a>
                </div>
            </div>
            <div class="container_about_us-item1 col l-5 m-0-11 m-12 c-12">
                <div class="container_contact_us_item-img">
                    <img class="contact_us-img" src="{{ URL::asset('frontend/img/contact-us-img.jpg') }} "
                        alt="img_about-">
                </div>
            </div>
        </div>
        <div class="row contact_us-address">
            @foreach ($contacts as $c)
            <div class="col l-4 m-12 c-12 footer-column">
                <div class="footer-logo contact_us-item ">
                    <h2 class="contact_us-title">{{ $c->name }}</h2>
                </div>
                <p class="text-description comtact-text">{{ $c->info }}</p>
                <div class="social-footer">
                    <a href="mailto:{{ $c->email }}" class="header-top__left-item">
                        <i class="fas fa-envelope"></i>
                        <span class="left-item__text comtact-text">{{ $c->email }}</span>
                    </a>
                    <a href="tel:{{ $c->phone }} " class="header-top__left-item">
                        <i class="fas fa-phone-alt"></i>
                        <span class="left-item__text comtact-text">
                            {{ preg_replace('~(\d{4})(\d{3})(\d{3})~', '$1 $2 $3', $c->phone) }}
                        </span>
                    </a>
                    <a href="#" class="header-top__left-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="left-item__text comtact-text">{{ $c->address }}</span>
                    </a>
                </div>
            </div>
            @endforeach
            {{-- <div class="col l-4 m-12 c-12 footer-column">
                <div class="footer-logo contact_us-item ">
                    <h2 class="contact_us-title">Đà nẵng</h2>
                </div>
                <p class="text-description comtact-text">Lorem ipsum dolor sit ametco nsec te tuer adipiscing elitae</p>
                <div class="social-footer">
                    <a href="mailto:hoangngocbkhn2311@gmail.com" class="header-top__left-item">
                        <i class="fas fa-envelope"></i>
                        <span class="left-item__text comtact-text">setsail@qode.com</span>
                    </a>
                    <a href="tel:+840393578454 " class="header-top__left-item">
                        <i class="fas fa-phone-alt"></i>
                        <span class="left-item__text comtact-text">562 867 5309</span>
                    </a>
                    <a href="#" class="header-top__left-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="left-item__text comtact-text">Broadway & Morris St, New York</span>
                    </a>
                </div>
            </div>
            <div class="col l-4 m-12 c-12 footer-column">
                <div class="footer-logo contact_us-item  ">
                    <h2 class="contact_us-title">TP.Hồ CHÍ MInh</h2>
                </div>
                <p class="text-description comtact-text">Lorem ipsum dolor sit ametco nsec te tuer adipiscing elitae</p>
                <div class="social-footer">
                    <a href="mailto:hoangngocbkhn2311@gmail.com" class="header-top__left-item">
                        <i class="fas fa-envelope"></i>
                        <span class="left-item__text comtact-text">setsail@qode.com</span>
                    </a>
                    <a href="tel:+840393578454 " class="header-top__left-item">
                        <i class="fas fa-phone-alt"></i>
                        <span class="left-item__text comtact-text">562 867 5309</span>
                    </a>
                    <a href="#" class="header-top__left-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="left-item__text comtact-text">Broadway & Morris St, New York</span>
                    </a>
                </div>
            </div> --}}
        </div>

        <div class="container-feedback ">
            <div class="feedback_list-items">
                <div class="feedback-items">
                    <h2 class="contact_us-title">Để lại một phản hồi</h2>
                </div>
                <div class="feedback-content">
                    <span></span>
                    <textarea name="" class="feedback_content-text" cols="40" rows="10"
                        placeholder="Nội dung"></textarea>
                </div>
                <div class="grid">
                    <div class="row feedback_content-information">
                        <div class="feedback_information-email l-6 m-12 c-12">
                            <span class="feedback_information_email-icon"></span>
                            <input class="feedback_input" type="text" placeholder="Email">
                        </div>
                        <div class="feedback_information-email l-6 m-12 c-12">
                            <span class="feedback_information_email-icon1"></span>
                            <input class="feedback_input" type="text " placeholder="Tên">
                        </div>
                    </div>
                </div>
                <button class="feedback_content-submit">Gửi</button>
            </div>
        </div>

    </div>
    <img src="{{ URL::asset('frontend/img/footer_about.jpg') }}" alt="" class="jumbotron"
        style="background: no-repeat center; background-size: cover;width:100%; height:700px; background: rgba(90, 74, 74,0.5);">
    @endsection
