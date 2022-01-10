<footer id="footer">
    <div class="grid wide">
        <div class="row footer-wrap">
            <div class="col l-3 m-6 c-12 footer-column">
                <div class="footer-logo ">
                    <a href="javascript::void()"><img src="{{ URL::asset('frontend/img/logo.png') }}" alt="logo"></a>
                </div>
                <p class="text-description">Đi đâu không quan trọng, quan trọng là được đi cùng nhau.</p>
                <div class="social-footer">
                    <a href="javascript::void()" class="header-top__left-item link-email">
                        <i class="fas fa-envelope"></i>
                        <span class="left-item__text"></span>
                    </a>
                    <a href="javascript::void()" class="header-top__left-item link-phone">
                        <i class="fas fa-phone-alt"></i>
                        <span class="left-item__text"></span>
                    </a>
                    <a href="#" class="header-top__left-item link-address">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="left-item__text"></span>
                    </a>
                </div>
                <a href="javascript::void()" target="_blank" class="social-link link-twitter"><i
                        class="fab fa-twitter"></i></a>
                <a href="javascript::void()" target="_blank" class="social-link link-pinterest"><i
                        class="fab fa-pinterest-p"></i></a>
                <a href="javascript::void()" target="_blank" class="social-link link-facebook"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="javascript::void()" target="_blank" class="social-link link-instagram"><i
                        class="fab fa-instagram"></i></a>
                <a href="javascript::void()" target="_blank" class="social-link link-youtube"><i
                        class="fab fa-youtube"></i></a>
            </div>
            <!-- Chi nhanh khac -->
            <div class="col l-3 m-6 c-12 footer-column">
                <h3 class="footer__title">Chi nhánh khác</h3>
                <div class="footer__location">
                    <a href="javascript::void()" class="recent-location text-p-medium address-1"></a>
                    {{-- <a href="javascript::void()" class="recent-time__link"><span>September 7, 2001</span></a> --}}
                </div>
                <div class="footer__location">
                    <a href="javascript::void()" class="recent-location text-p-medium address-2"></a>
                    {{-- <a href="javascript::void()" class="recent-time__link"><span>September 7, 2002</span></a> --}}
                </div>
                <div class="footer__location">
                    <a href="javascript::void()" class="recent-location text-p-medium address-3"></a>
                    {{-- <a href="javascript::void()" class="recent-time__link"><span>September 7, 2003</span></a> --}}
                </div>
            </div>
            <div class="col l-3 m-6 c-12 footer-column">
                <h3 class="footer__title">Đóng góp ý kiến với chúng tôi</h3>
                <p class="text-p-medium">Luôn luôn đóng góp cho cộng đồng vững mạnh hơn.</p>
                <div class="footer-form">
                    <div class="footer-form__wrap">
                        <span class="icon-user"></span><input type="text" class="footer-form__input form__input-name"
                            placeholder="Name">
                    </div>
                    <div class="footer-form__wrap">
                        <span class="icon-email"></span><input type="text" class="footer-form__input form__input-email"
                            placeholder="Email">
                    </div>
                    <input type="submit" value="Subscribe" class="footer-form__input btn" />
                </div>
            </div>
            <div class="col l-3 m-6 c-12 footer-column">
                <h3 class="footer__title">Địa điểm</h3>
                <div id="map" class="map_page">
                </div>
                <!-- <p class="text-p-medium">https://www.facebook.com/dulichvietnamxanh</p> -->
            </div>
        </div>
    </div>
</footer>
