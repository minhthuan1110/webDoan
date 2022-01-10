
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        VieTour - Detail tour    </title>

    <!-- Cac link css dat o day -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<!-- link google font "poppins" -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
    rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
<!-- link slick -->
<link type="text/css" href="http://localhost:8000/frontend/slick/slick.css" rel="stylesheet">
<script type="text/javascript" src="http://localhost:8000/frontend/slick/slick.min.js"></script>
<!-- favicon -->
<link rel="icon" type="image/png" href="http://localhost:8000/frontend/img/logo-i2.png" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
    integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
    crossorigin="anonymous" />
<!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<script type="text/javascript" src="http://localhost:8000/frontend/jquery/jquery.min.js"></script>
<script type="text/javascript" src="http://localhost:8000/frontend/jquery/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous">
</script>
<!-- link fontawesome -->
<link type="text/css" href="http://localhost:8000/frontend/fontawesome-free-5/css/all.css" rel="stylesheet">
<link type="text/css" href="http://localhost:8000/frontend/themify-icons-font/themify-icons/themify-icons.css"
    rel="stylesheet">
<link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.12.1/themes/excite-bike/jquery-ui.css">
<link href="http://localhost:8000/frontend/css/main.css" rel="stylesheet">
<link href="http://localhost:8000/frontend/css/base.css" rel="stylesheet">
<link href="http://localhost:8000/frontend/css/grid.css" rel="stylesheet">
<link href="http://localhost:8000/frontend/css/responsive.css" rel="stylesheet">
<style>
    label.error {
        display: inline-block;
        color: red;
        width: 200px;
    }
</style>

    <!-- Push style theo tung view khac nhau -->
    
</head>

<body>

    <div class="load-wrap">
    <div id="load">
        <div>G</div>
        <div>N</div>
        <div>I</div>
        <div>D</div>
        <div>A</div>
        <div>O</div>
        <div>L</div>
    </div>
</div>

    <div class="main">
<header id="header">
    <section class="header-top">
        <div class="header-top__left hide-on-tablet-mobile">
            <a href="mailto:hoangngocbkhn2311@gmail.com" class="header-top__left-item">
                <i class="fas fa-envelope"></i>
                <span class="left-item__text">setsail@qode.com</span>
            </a>
            <a href="tel:+840393578454 " class="header-top__left-item">
                <i class="fas fa-phone-alt"></i>
                <span class="left-item__text">562 867 5309</span>
            </a>
            <a href="#" class="header-top__left-item">
                <i class="fas fa-map-marker-alt"></i>
                <span class="left-item__text">Broadway & Morris St, New York</span>
            </a>
        </div>
        <div class="header-top__right">
            <div class="social">

                
                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-link"><i class="fab fa-pinterest-p"></i></a>
                <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="language hide-on-mobile">
                <a href="#" class="language-link active">English</a>
                <ul class="language-list">
                    <li class="language-item"><a href="" class="language-link">German</a></li>
                    <li class="language-item"><a href="" class="language-link">Italy</a></li>
                    <li class="language-item"><a href="" class="language-link">Tiếng Việt</a></li>
                </ul>
            </div>

            
            
            
            <div class="account js-account">
                <a href="javascript::void(0)" class="account__link"><i class="ti-user"></i></a>
            </div>

            
        </div>
    </section>
    <section class="header-bottom">
        <label for="category-checkbox-input" class="list-category-mobile hide-on-pc">
            <i class="ti-view-list"></i>
        </label>
        <input type="checkbox" hidden id="category-checkbox-input">
        <div class="logo">
            <a href="http://localhost:8000">
                <img src="http://localhost:8000/frontend/img/logo.png" alt="logo">
            </a>
        </div>
        <nav class="header-mid">
            <ul class="header-nav__list">
                <li class="header-nav__item">
                    <a href="#" class="header-nav__link">Home</a>
                </li>
                <li class="header-nav__item">
                    <a href="#" class="header-nav__link">Pages</a>
                </li>
                <li class="header-nav__item">
                    <a href="#" class="header-nav__link">Destination</a>
                </li>
                <li class="header-nav__item">
                    <a href="#" class="header-nav__link active">Tour</a>
                    <ul class="subnav-list">
                        <li class="subnav-item"><a href="#" class="subnav-link">Domestic</a></li>
                        <li class="subnav-item"><a href="#" class="subnav-link">Foreign</a></li>
                    </ul>
                </li>
                <li class="header-nav__item">
                    <a href="#" class="header-nav__link">Blog</a>
                </li>
                <li class="header-nav__item">
                    <a href="#" class="header-nav__link">Shop</a>
                </li>
                <label for="category-checkbox-input" class="close-categories hide-on-pc"><i
                        class="fas fa-times-circle"></i></label>
            </ul>
        </nav>
        <div class="header-right">
            <div class="cart-wrap">
                <a href="#" class="header-cart"><i class="ti-shopping-cart"></i></a>
                <div class="header-no-cart">
                    <span class="header-cart__content">No product in cart.</span>
                </div>
            </div>
            <label class="header-search-btn" for="search-check-input-btn"><i class="ti-search"></i></label>
            <input type="checkbox" id="search-check-input-btn" hidden />

            <div class="form-search">
                <div class="search-wrap">
                    <input class="search__input" type="text" placeholder="Search..">
                    <button class="search__btn" class="">find now</button>
                </div>
            </div>
            <label for="search-check-input-btn" class="modal_overlay"></label>

        </div>


        </div>
    </section>
</header>

<!-- detail-blog -->

<div class="container">

    <div class="slider">
    <h1 class="slider-text translate" data-speed="0.1">SetSail</h1>
    <img src="https://setsail.qodeinteractive.com/wp-content/uploads/2018/09/blog-title-img-2.jpg " class="detail-blog_slider" data-speed="-0.25"
        alt="">
</div>
<div class="body_main">
    <div class="standard-container grid wide">
        <div class="container-search-content-holder ">
            <div class="search-ordering-list  translate  row .wide " style="" data-speed="-0.25" >
                <!-- tiêu đề trang detail_blog -->
                <!-- <h1 class="title-detail_blog">Amazing Tour ggeraggeaheahAEhqaHrttrbageatrgaehyAThTAHnahaehagagfageqaggreqagaehregageagheayherhbtsgyhrthahgehjaqaygaqtgtaewgteeg3a </h1> -->
            </div>
        </div>
        <div class="container-product translate row" data-speed="-0.25" style="background-color:#fff ; " >
            <div class="container_list-product detail-blog col l-9 m-12 c-12">

                <img src="https://setsail.qodeinteractive.com/wp-content/uploads/2016/09/blog-img-12.jpg" alt="">
                <div class="content-title-detial_blog">
                    <h1 class="title-detail_blog">Không chỉ nổi tiếng với hàng loạt bờ biển xinh đẹp nhất nước,vùng đất Nam Trung bộ còn sở hữu những cung đường</h1>
                </div>
                <div class="content-detial_blog ">
                    <p> Si elit omnes impedit ius, vel et hinc agam fabulas. Ut audiam invenire iracundia vim. Tn eam dimo diam ea. Piber Korem sit amet. Cconsequat tin sit, stet cibo blandit.Al elit omnes impedit ius, vel et hinc agam fabulas. Ut audiam invenire iracundia vim. En eam dico similique, ut sint posse sit, eum sumo diam ea. Liber consectetuer in mei, sea in imperdiet assueverit contentiones, an his cibo blandit tacimates. Iusto iudicabit similique id velex, in sea rebum deseruisse appellantur. Lorem ipsum Alienum phaedrum torquatos nec eu, vis detraxit pericu in mei, vix aperiri vix at,dolor sit amet. blandit dicant definition.Sit delicata persequeris ex, in sea rebum deseruisse appellantur. Lorem ipsum dolor sit amet.Eos ei nisl graecis, vix aperiri consequat an. Eius lorem.</p>
                    <span>hdfhasdkfhjksdfhjkasdhfjkashfdhjfhjskfhakjshdf</span>
                    <img src="https://setsail.qodeinteractive.com/wp-content/uploads/2018/09/blog-img-24-1300x650.jpg" alt="">
                    <p>Ei elit omnes impedit ius, vel et hinc agam fabulas. Ut audiam invenire iracundia vim. An eam dico similique, ut sint posse sit, eum sumo diam ea. Liber consectetuer in mei, sea in imperdiet assueverit contentiones, an his cibo blandit tacimates. Iusto iudicabit similique idefinitionem eos an.Sit delicata persequeris ex, in sea rebum deseruisse appellantur. Lorem ipsum dolor si vix aperiri consequat an.</p>
                    <img src="https://static2.yan.vn/YanNews/2167221/201808/38270357_548663188919754_1089879394815574016_n-c8c5f0bf.jpg" alt="">
                    <p>Ai elit omnes lmpedit ius, tel et hinc agam fabulas. Ut audiam invenire iracundia vim. An eam dico similique, ut sint posse sit, eum sumo diam ea. Liber consectetuer in mei, sea in imperdiet assueverit contentiones, an his cibo blandit tacimates. Iusto iudicabit similique idefinitionem eos an.Sit delicata persequeris ex, in sea rebum deseruisse appellantur. Lorem ipsum dolor si vix aperiri consequat an.</p>
                </div>
                <div class="btn-read_more-detail_blog">
                    <span class="btn-read_more btn-read_more-down">read more</span>
                    <div class="btn-read_more-icon"> 
                        <i class=" btn-read_more-icondown fas fa-chevron-down"></i>
                        <i class=" btn-read_more-iconup  fas fa-chevron-up"></i>
                    </div>

                </div>
                <div class="comtent-show_log">
                    <div class="content-comment__wrap">
                        <a href="#">September 11, 2016</a>
                        <a href="#"><i class="fas fa-comment"></i>4 comments</a>
                    </div>
                    <div class="content-comment__wrap">
                        <a href="#"><i class="fab fa-facebook-f"></i></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-invision"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></i></a>
                    </div>
                </div>
            </div>
            <div class="container-search_product col l-3 m-12 c-12">
                <div class="container-feedback ">
                    <div class="feedback_list-items book-card">
                        <div class="feedback-items">
                            <h2 class="contact_us-title " style="text-transform:capitalize">about me</h2>
                        </div>
                        <img src="https://lh5.googleusercontent.com/dqwUAw6JRBaU9g7YHFXIGILnuv28HzD66wLEcyCYpet87nia-zUi7oTzjQiLnzoIDag_LA5ptsB6P8VMtMAxlRfRvoMIqkgsn0zoHoE3U4nMbnBtKTxuX0R2vtX5_4epwJwK2XSE=s1600" alt="" class="about-me_img">
                        <p class="text-about_me">Lorem ipsum dolor sit amet, consect etuiscing elit. In ut ullamcorper leo</p>
                        </div>
                    </div>
                    <div class="title-blog_new">
                      <h2 class="title-text-blog_new">Latest Posts :</h2>
                   </div>
                    <div class="list-blog_detail scrollbar">

                        <div class="container-blogmasonry-title_item detail_blog">
                            <div class="blogmasonry-title_item l-12 c-12 m12">
                                <a href="#" class="blogmasonry_item-img-link">
                                    <img src="http://localhost:8000/frontend/img/img_item_tour/blog_masonry1.jpg" alt="" class="blogmasonry_item-img">
                                </a>
                            </div>
                            <div class="blogmasonry-title_item blog l-12 c-12 m-12">
                                <h2 class="blogmasonry_item-title"> 
                                <a class="blogmasonry_item-title_link" href="#">Ưu đãi Tháng 5, cơ hội vàng săn tour du lịch hè giá tốt</a></h2>
                                <div class="blogmasonry-title_list-content-blog">
                                    <p class="blogmasonry_content-text">Không chỉ nổi tiếng với hàng loạt bờ biển xinh đẹp nhất nước,
                                        vùng đất Nam Trung bộ còn sở hữu những cung đường
                                    </p>
                                </div>
                            
                                <div class="blogmasonry_item-title__row">
                                    <div class="blogmasonry_item-date">
                                        <span class="far fa-calendar-alt"></span><span> 11/7/2021</span>
                                    </div>
                                    <div class="blogmasonry_content-detail">
                                        <a href="" class="blogmasonry_detail-link">xem thêm <i class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="container-blogmasonry-title_item detail_blog">
                            <div class="blogmasonry-title_item l-12 c-12 m12">
                                <a href="#" class="blogmasonry_item-img-link">
                                    <img src="http://localhost:8000/frontend/img/img_item_tour/blog_masonry1.jpg" alt="" class="blogmasonry_item-img">
                                </a>
                            </div>
                            <div class="blogmasonry-title_item blog l-12 c-12 m-12">
                                <h2 class="blogmasonry_item-title"> 
                                <a class="blogmasonry_item-title_link" href="#">Ưu đãi Tháng 5, cơ hội vàng săn tour du lịch hè giá tốt</a></h2>
                                <div class="blogmasonry-title_list-content-blog">
                                    <p class="blogmasonry_content-text">Không chỉ nổi tiếng với hàng loạt bờ biển xinh đẹp nhất nước,
                                        vùng đất Nam Trung bộ còn sở hữu những cung đường
                                    </p>
                                </div>
                            
                                <div class="blogmasonry_item-title__row">
                                    <div class="blogmasonry_item-date">
                                        <span class="far fa-calendar-alt"></span><span> 11/7/2021</span>
                                    </div>
                                    <div class="blogmasonry_content-detail">
                                        <a href="" class="blogmasonry_detail-link">xem thêm <i class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="container-blogmasonry-title_item detail_blog">
                            <div class="blogmasonry-title_item l-12 c-12 m12">
                                <a href="#" class="blogmasonry_item-img-link">
                                    <img src="http://localhost:8000/frontend/img/img_item_tour/blog_masonry1.jpg" alt="" class="blogmasonry_item-img">
                                </a>
                            </div>
                            <div class="blogmasonry-title_item blog l-12 c-12 m-12">
                                <h2 class="blogmasonry_item-title"> 
                                <a class="blogmasonry_item-title_link" href="#">Ưu đãi Tháng 5, cơ hội vàng săn tour du lịch hè giá tốt</a></h2>
                                <div class="blogmasonry-title_list-content-blog">
                                    <p class="blogmasonry_content-text">Không chỉ nổi tiếng với hàng loạt bờ biển xinh đẹp nhất nước,
                                        vùng đất Nam Trung bộ còn sở hữu những cung đường
                                    </p>
                                </div>
                            
                                <div class="blogmasonry_item-title__row">
                                    <div class="blogmasonry_item-date">
                                        <span class="far fa-calendar-alt"></span><span> 11/7/2021</span>
                                    </div>
                                    <div class="blogmasonry_content-detail">
                                        <a href="" class="blogmasonry_detail-link">xem thêm <i class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="container-blogmasonry-title_item detail_blog">
                            <div class="blogmasonry-title_item l-12 c-12 m12">
                                <a href="#" class="blogmasonry_item-img-link">
                                    <img src="http://localhost:8000/frontend/img/img_item_tour/blog_masonry1.jpg" alt="" class="blogmasonry_item-img">
                                </a>
                            </div>
                            <div class="blogmasonry-title_item blog l-12 c-12 m-12">
                                <h2 class="blogmasonry_item-title"> 
                                <a class="blogmasonry_item-title_link" href="#">Ưu đãi Tháng 5, cơ hội vàng săn tour du lịch hè giá tốt</a></h2>
                                <div class="blogmasonry-title_list-content-blog">
                                    <p class="blogmasonry_content-text">Không chỉ nổi tiếng với hàng loạt bờ biển xinh đẹp nhất nước,
                                        vùng đất Nam Trung bộ còn sở hữu những cung đường
                                    </p>
                                </div>
                            
                                <div class="blogmasonry_item-title__row">
                                    <div class="blogmasonry_item-date">
                                        <span class="far fa-calendar-alt"></span><span> 11/7/2021</span>
                                    </div>
                                    <div class="blogmasonry_content-detail">
                                        <a href="" class="blogmasonry_detail-link">xem thêm <i class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="container-blogmasonry-title_item detail_blog">
                            <div class="blogmasonry-title_item l-12 c-12 m12">
                                <a href="#" class="blogmasonry_item-img-link">
                                    <img src="http://localhost:8000/frontend/img/img_item_tour/blog_masonry1.jpg" alt="" class="blogmasonry_item-img">
                                </a>
                            </div>
                            <div class="blogmasonry-title_item blog l-12 c-12 m-12">
                                <h2 class="blogmasonry_item-title"> 
                                <a class="blogmasonry_item-title_link" href="#">Ưu đãi Tháng 5, cơ hội vàng săn tour du lịch hè giá tốt</a></h2>
                                <div class="blogmasonry-title_list-content-blog">
                                    <p class="blogmasonry_content-text">Không chỉ nổi tiếng với hàng loạt bờ biển xinh đẹp nhất nước,
                                        vùng đất Nam Trung bộ còn sở hữu những cung đường
                                    </p>
                                </div>
                            
                                <div class="blogmasonry_item-title__row">
                                    <div class="blogmasonry_item-date">
                                        <span class="far fa-calendar-alt"></span><span> 11/7/2021</span>
                                    </div>
                                    <div class="blogmasonry_content-detail">
                                        <a href="" class="blogmasonry_detail-link">xem thêm <i class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<!-- /// detail-blog -->



        <footer id="footer">
    <div class="grid wide">
        <div class="row footer-wrap">
            <div class="col l-3 m-6 c-12 footer-column">
                <div class="footer-logo ">
                    <a href="#"><img src="http://localhost:8000/frontend/img/logo.png" alt="logo"></a>
                </div>
                <p class="text-description">Lorem ipsum dolor sit ametco nsec te tuer adipiscing elitae</p>
                <div class="social-footer">
                    <a href="mailto:hoangngocbkhn2311@gmail.com" class="header-top__left-item">
                        <i class="fas fa-envelope"></i>
                        <span class="left-item__text">setsail@qode.com</span>
                    </a>
                    <a href="tel:+840393578454 " class="header-top__left-item">
                        <i class="fas fa-phone-alt"></i>
                        <span class="left-item__text">562 867 5309</span>
                    </a>
                    <a href="#" class="header-top__left-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="left-item__text">Broadway & Morris St, New York</span>
                    </a>
                </div>
            </div>
            <!-- Post recent (bài viết gần đây) -->
            <div class="col l-3 m-6 c-12 footer-column">
                <h3 class="footer__title">Our Recent Posts</h3>
                <div class="footer__location">
                    <a href="#" class="recent-location text-p-medium">Visit Thailand, Bali And China</a>
                    <a href="#" class="recent-time__link"><span>September 7, 2016</span></a>
                </div>
                <div class="footer__location">
                    <a href="#" class="recent-location text-p-medium">The Sound Of Our Jungle</a>
                    <a href="#" class="recent-time__link"><span>September 7, 2016</span></a>
                </div>
                <div class="footer__location">
                    <a href="#" class="recent-location text-p-medium">New Year, New Resolutions!</a>
                    <a href="#" class="recent-time__link"><span>September 7, 2016</span></a>
                </div>
            </div>
            <div class="col l-3 m-6 c-12 footer-column">
                <h3 class="footer__title">Subscribe to our Newsletter</h3>
                <p class="text-p-medium">Etiam rhoncus. Maecenas temp us, tellus eget condimentum rho</p>
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
                <h3 class="footer__title">Our Instagram</h3>
                <p class="text-p-medium">Etiam rhoncus. Maecenas temp us, tellus eget condimentum rho</p>
            </div>
        </div>
    </div>
</footer>
    </div>

    <!-- login modal -->
<div class="modal js-modal-close">
    <div class="modal-container">
        <header class="form-header">
            <a href="#" class="form-header__action active">Login</a>
            <a href="#" class="form-header__action ">Register</a>
        </header>

        
        <div class="form-body form-body-login active">
            <h4 class="form-title">Sign In Here!</h4>
            <p class="form-description">Log into your account in just a few simple steps</p>
            <form id="login-form" action="http://localhost:8000/login" method="POST">
                <input type="hidden" name="_token" value="8ekYObQZgK3qm56q8v1HZXvPsy48hPknuvzM4Qqe">                <input type="email" id="email" name="email" placeholder="Email" required>
                <label for="email"></label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <label for="password"></label>

                <div class="remember-me">
                    <label class="remember-lable" for="remember-radio">Remember me</label>
                    <input type="checkbox" name="remember" id="remember-radio" value="1">
                </div>
                <div class="form-btn">
                    <p class="forgot-password">Forgot your password?</p>
                    <button type="submit">sign in</button>
                </div>
            </form>
            <div class="form-login-social">
                <p class="form-descriotion">Sign in with Facebook or Google+</p>
                <div class="google-facebook">
                    <a href="http://localhost:8000/auth/facebook/redirect" class="facebook"><i
                            class="fab fa-facebook-f"></i>Facebook</a>
                    <a href="http://localhost:8000/auth/google/redirect" class="google"><i
                            class="fab fa-google-plus-g"></i>Google</a>
                </div>
            </div>
        </div>

        
        <div class="form-body form-body-register ">
            <h4 class="form-title">Register Now!</h4>
            <p class="form-description">Join the Viettour community today & set up a free account</p>

            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>

            <form id="register-form" action="http://localhost:8000/register" method="POST">
                <input type="hidden" name="_token" value="8ekYObQZgK3qm56q8v1HZXvPsy48hPknuvzM4Qqe">                <input type="text" id="name" name="name" placeholder="User name" required>
                <label for="name"></label>
                <input class="email" type="email" id="email" name="email" placeholder="Email" required>
                <label for="email"></label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <label for="password"></label>
                <input type="password" id="re_password" name="re_password" placeholder="Repeat Password" required>
                <label for="re_password"></label>

                <div class="form-btn">
                    <button type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- back to top -->
    <a id="button-back-top"></a>

    
</body>

<script>
    $(function() {
            // Initialize Select2 elements
            $('.select2').select2();

            // Initialize Select2 Bootstrap4 elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        });
</script>


<script>
    $(document).ready(function() {

    $('#login-form').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 6,
            }
        },
        errorPlacement: function(error, element) {
            switch (element.attr('name')) {
                case 'email':
                case 'password':
                    error.insertBefore(element);
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    $('#register-form').validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 6,
            },
            re_password: {
                // equalTo: "#password",
                required: true,
                minlength: 6,
            },
        },
        errorPlacement: function(error, element) {
            switch (element.attr('name')) {
                case 'name':
                case 'email':
                case 'password':
                case 're_password':
                    error.insertBefore(element);
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    // function submitRegister () {
    //     $.ajax({
    //         type: "post",
    //         url: "/register",
    //         data: {
    //             _token: $("input[name='_token']").val(),
    //             name: $("input[name='name']").val(),
    //             email: $("input[name='email']").val(),
    //             password: $("input[name='password']").val(),
    //             re_password: $("textarea[name='re_password']").val(),
    //         },
    //         dataType: 'json',
    //         success: function (response) {
    //             if ($.isEmptyObject(response.error)) {
    //                 printSuccessAlert(response.success);
    //             } else {
    //                 printErrorMsg(response.error);
    //             }
    //         }
    //     });
    //  }

    // function printSuccessAlert (msg) {
    //     Swal.fire({
    //         title: 'Success!',
    //         text: msg,
    //         imageUrl: 'https://us.123rf.com/450wm/tashatuvango/tashatuvango1603/tashatuvango160301001/53290054-keys-to-success-concept-on-golden-keychain-over-black-wooden-background-closeup-view-selective-focus.jpg?ver=6',
    //         imageAlt: 'Successful registration',
    //     });
    // }
    // function printErrorMsg (msg) {
    //     $(".print-error-msg").find("ul").html('');
    //     $(".print-error-msg").css('display','block');
    //     $.each(msg, function(key, value) {
    //         $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    //     });
    // }
});
</script>
<script>
    const selected = document.querySelector(".filter-selected")
    const optionContainer = document.querySelector(".filter__list")
    const listOption = document.querySelectorAll(".filter__item")

    const selectedLocation = document.querySelector(".filter-selected-location")
    const ContainerLocation = document.querySelector(".filter__list-location")
    const listOptionLocation = document.querySelectorAll(".filter__item-location")


    selected.addEventListener("click", () => {
        optionContainer.classList.add("active");
    });
    listOption.forEach(o => {
        o.addEventListener("click", () => {
            selected.innerHTML = o.querySelector(".filter__item-month").innerHTML;
            optionContainer.classList.remove("active");
        })
    });
</script>

<!-- Jquery Validation -->
<script src="http://localhost:8000/backend/jquery-validation-1.19.3/dist/jquery.validate.min.js"></script>
<script src="http://localhost:8000/backend/jquery-validation-1.19.3/dist/additional-methods.min.js"></script>

<script src="http://localhost:8000/frontend/js/main.js"></script>
<script src="http://localhost:8000/frontend/js/detail_tour/detail_tour.js"></script>
<script src="http://localhost:8000/frontend/js/contact_us_js/contact_us.js"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD54ImUCEQ9aYBDgXVomjGIBdqdX93k3Z0&callback=initMap&callback=initMap">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>

<script>
    const buyBtns = document.querySelectorAll('.js-account')
    const modal =  document.querySelector(".modal")
    const modalClose = document.querySelector('.js-modal-close')
    const modalContainer = document.querySelector('.modal-container')

    // hàm hiển thị modal đăng nhập (thêm class open vào modal)
    function showModal(){
        modal.classList.add('open')
    }
    // hàm ẩn modal  (loại bỏ class open ra khỏi modal)
    function hideModal(){
        modal.classList.remove('open')
    }

    for (const buyBtn of buyBtns) {
        buyBtn.addEventListener('click', showModal)
    }
    modalClose.addEventListener('click', hideModal)

    modalContainer.addEventListener('click', function (event) {
        event.stopPropagation()
    });

    var onChange = document.querySelectorAll('.form-header__action');
  var onChange1 = document.querySelectorAll('.form-body');
  for(var i=0; i<onChange.length;i++){
    const addactive = onChange1[i];
    onChange[i].onclick = function(){
      var onChange1 = document.querySelector('.form-body.active');
      for(var i=0; i<onChange.length;i++){
        onChange[i].classList.remove('active');
        onChange1.classList.remove('active');
      }
      this.classList.add('active');
      addactive.classList.add('active');
    }
  }
</script>

</html>
