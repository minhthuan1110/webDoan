<header id="header">
    <section class="header-top">
        <div class="header-top__left hide-on-tablet-mobile">
            <a href="javascript::void()" class="header-top__left-item link-email">
                <i class="fas fa-envelope"></i>
                <span class="left-item__text"></span>
            </a>
            <a href="javascript::void()" class="header-top__left-item link-phone">
                <i class="fas fa-phone-alt"></i>
                <span class="left-item__text"></span>
            </a>
            <a href="javascript::void()" class="header-top__left-item link-address">
                <i class="fas fa-map-marker-alt"></i>
                <span class="left-item__text"></span>
            </a>
        </div>
        <div class="header-top__right">
            <div class="social">
                {{-- @if (auth('user')->check())
                <div class="notification-wrap">
                    <a href="javascript::void()" class="social-link notification"><i
                            class="fas fa-bell"></i><span>2</span></a>
                    <!-- content notification -->
                    <div class="notification-content">
                        <header class="notification-content__header">
                            <h1>Notification</h1>
                            <a href="javascript::void()">Đánh dấu đã đọc tất cả</a>
                        </header>
                        <div class="notification-content__list">
                            <div class="notification-content__item">
                                <span class="name">Bạn đã đặt tour thành công: Du lịch cát bà Du lịch cát bàDu lịch cát
                                    bà Du lịch cát bà</span>
                                <div class="time-and-action">
                                    <span class="time">19-08-2021</span>
                                    <div class="action">
                                        <a href="javascript::void()">đã đọc</a>
                                        <a href="javascript::void()">xóa</a>
                                    </div>
                                </div>
                            </div>
                            <div class="notification-content__item">
                                <span class="name">Bạn đã đặt tour thành công: Du lịch cát bà Du lịch cát bàDu lịch cát
                                    bà Du lịch cát bà</span>
                                <div class="time-and-action">
                                    <span class="time">19-08-2021</span>
                                    <div class="action">
                                        <a href="javascript::void()">đã đọc</a>
                                        <a href="javascript::void()">xóa</a>
                                    </div>
                                </div>
                            </div>
                            <div class="notification-content__item active">
                                <span class="name">Bạn đã đặt tour thành công: Du lịch cát bà Du lịch cát bàDu lịch cát
                                    bà Du lịch cát bà</span>
                                <div class="time-and-action">
                                    <span class="time">19-08-2021</span>
                                    <div class="action">
                                        <a href="javascript::void()">đã đọc</a>
                                        <a href="javascript::void()">xóa</a>
                                    </div>
                                </div>
                            </div>
                            <div class="notification-content__item">
                                <span class="name">Bạn đã đặt tour thành công: Du lịch cát bà Du lịch cát bàDu lịch cát
                                    bà Du lịch cát bà</span>
                                <div class="time-and-action">
                                    <span class="time">19-08-2021</span>
                                    <div class="action">
                                        <a href="javascript::void()">đã đọc</a>
                                        <a href="javascript::void()">xóa</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <footer class="notification-content__footer"><a href="javascript::void()">xóa tất cả</a>
                        </footer>
                    </div>
                </div>
                @endif --}}
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
            <div class="language hide-on-mobile">
                <a href="javascript::void()" class="language-link active">Tiếng Việt</a>
                <ul class="language-list">
                    <li class="language-item"><a href="javascript::void()" class="language-link">English</a></li>
                    <li class="language-item"><a href="javascript::void()" class="language-link">Trung Quốc</a></li>
                    <li class="language-item"><a href="javascript::void()" class="language-link">Nga</a></li>
                </ul>
            </div>

            {{-- da login --}}
            @if (auth('user')->check())
            @php
            $user = auth('user')->user();
            @endphp
            <div class="account-logined">
                <div class="account-logined-action">
                    <span class="account-name">
                        <img class="account-img__other" src="{{ isset($user->avatar_image_path) ? asset($user->avatar_image_path) : (isset($user->profile_photo_path) ? asset($user->profile_photo_path) : 'https://static2.yan.vn/YanNews/2167221/202102/facebook-cap-nhat-avatar-doi-voi-tai-khoan-khong-su-dung-anh-dai-dien-e4abd14d.jpg'
    ) }}" alt="">
                        <span class="account-name-user">{{ auth('user')->user()->name}}</span>
                        <i class="fas fa-sort-down"></i>
                    </span>
                </div>
                <ul class="account-option-list">

                    <li class="account-option-item">
                        <a href="{{ url('/user/profile') }}">
                            <i class="far fa-user-circle"></i>
                            Thông tin tài khoản
                        </a>
                    </li>
                    <li class="account-option-item"><a href="{{ route('logout') }}"><i
                                class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>
                </ul>
            </div>

            @else

            {{-- chua login --}}
            <div class="account js-account">
                <a href="javascript::void()" class="account__link"><i class="ti-user"></i></a>
            </div>

            @endif

        </div>
    </section>

    <!-- Thanh Menu -->
    <section class="header-bottom">
        <label for="category-checkbox-input" class="list-category-mobile hide-on-pc">
            <i class="ti-view-list"></i>
        </label>
        <input type="checkbox" hidden id="category-checkbox-input">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ URL::asset('frontend/img/logo.png') }}" alt="logo">
            </a>
        </div>
        <!-- Navbar -->
        <nav class="header-mid">
            <ul class="header-nav__list">
                <li class="header-nav__item">
                    <a href="{{ url('/') }}" class="header-nav__link">Trang Chủ</a>
                </li>
                <li class="header-nav__item">
                    <a href="{{ url('/tour') }}" class="header-nav__link active">Tour</a>
                    <ul class="subnav-list">
                        <li class="subnav-item"><a href="{{ url('/tour/domestic') }}" class="subnav-link">Nội Địa</a>
                        </li>
                        <li class="subnav-item"><a href="{{ url('/tour/foreign') }}" class="subnav-link">Quốc Tế</a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="header-nav__item">
                    <a href="javascript::void()" class="header-nav__link">Đích đến</a>
                </li> --}}
                <li class="header-nav__item">
                    <a href="{{ url('/blog') }}" class="header-nav__link">Bài Viết</a>
                </li>
                <li class="header-nav__item">
                    <a href="{{ url('/contact') }}" class="header-nav__link">Liên Hệ</a>
                </li>
                <li class="header-nav__item">
                    <a href="{{ url('/about-us') }}" class="header-nav__link">Giới thiệu</a>
                </li>
                <label for="category-checkbox-input" class="close-categories hide-on-pc"><i
                        class="fas fa-times-circle"></i></label>
            </ul>
        </nav>
        <!-- /Navbar -->

        <div class="header-right">

            <!-- Thông báo -->
            {{-- @if (auth('user')->check())
            <div class="notification-wrap">
                <a href="javascript::void()" class="social-link notification"><i
                        class="fas fa-bell"></i><span>2</span></a>
                <!-- content notification -->
                <div class="notification-content">
                    <header class="notification-content__header">
                        <h1>Notification</h1>
                        <a href="javascript::void()">Đánh dấu đã đọc tất cả</a>
                    </header>
                    <div class="notification-content__list">
                        <div class="notification-content__item">
                            <span class="name">Bạn đã đặt tour thành công: Du lịch cát bà Du lịch cát bàDu lịch cát
                                bà Du lịch cát bà</span>
                            <div class="time-and-action">
                                <span class="time">19-08-2021</span>
                                <div class="action">
                                    <a href="javascript::void()">đã đọc</a>
                                    <a href="javascript::void()">xóa</a>
                                </div>
                            </div>
                        </div>
                        <div class="notification-content__item">
                            <span class="name">Bạn đã đặt tour thành công: Du lịch cát bà Du lịch cát bàDu lịch cát
                                bà Du lịch cát bà</span>
                            <div class="time-and-action">
                                <span class="time">19-08-2021</span>
                                <div class="action">
                                    <a href="javascript::void()">đã đọc</a>
                                    <a href="javascript::void()">xóa</a>
                                </div>
                            </div>
                        </div>
                        <div class="notification-content__item active">
                            <span class="name">Bạn đã đặt tour thành công: Du lịch cát bà Du lịch cát bàDu lịch cát
                                bà Du lịch cát bà</span>
                            <div class="time-and-action">
                                <span class="time">19-08-2021</span>
                                <div class="action">
                                    <a href="javascript::void()">đã đọc</a>
                                    <a href="javascript::void()">xóa</a>
                                </div>
                            </div>
                        </div>
                        <div class="notification-content__item">
                            <span class="name">Bạn đã đặt tour thành công: Du lịch cát bà Du lịch cát bàDu lịch cát
                                bà Du lịch cát bà</span>
                            <div class="time-and-action">
                                <span class="time">19-08-2021</span>
                                <div class="action">
                                    <a href="javascript::void()">đã đọc</a>
                                    <a href="javascript::void()">xóa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="notification-content__footer"><a href="javascript::void()">xóa tất cả</a>
                    </footer>
                </div>
            </div>
            @endif --}}

            {{-- <div class="cart-wrap">
                <a href="javascript::void()" class="header-cart"><i class="ti-shopping-cart"></i></a>
                <div class="header-no-cart">
                    <span class="header-cart__content">No product in cart.</span>
                </div>
            </div> --}}
            <!-- search btn -->
            <label class="header-search-btn" for="search-check-input-btn"><i class="ti-search"></i></label>
            <input type="checkbox" id="search-check-input-btn" hidden />
            <div class="form-search">
                <form action="{{ url('/tour/search') }}" method="POST">
                    @csrf
                    <div class="search-wrap">
                        <input class="search__input" type="text" name="keyword" placeholder="Tìm kiếm">
                        <button type="submit" class="search__btn" class="">Tìm kiếm</button>
                    </div>
                </form>
            </div>
            <label for="search-check-input-btn" class="modal_overlay"></label>
            <!-- /search btn -->
        </div>

    </section>
</header>
