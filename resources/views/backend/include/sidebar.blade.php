<aside class="main-sidebar sidebar-dark-primary elevation-1">
    <!-- Brand Logo -->
    <a href="{{ url('/admin/dashboard') }}" class="brand-link">
        <img src="{{ URL::asset('frontend/img/logo.png') }}" alt="Admin vietTour"
            class="brand-image img-circle elevation-3" style="opacity: .8;">
        <span class="brand-text font-weight-light">VieTour</span>
    </a>



    <!-- Sidebar -->
    <div class="sidebar ">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <a href="#" class="nav-link nav-link-logo">
                <div class="image">
                    <img src="{{ asset(auth('admin')->user()->avatar_image_path) }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info text">
                    <a href="#" class="d-block">{{ auth('admin')->user()->name }}</a>
                </div>
            </a>
        </div> --}}

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline mt-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
            <div class="sidebar-search-results">
                <div class="list-group"><a href="#" class="list-group-item">
                        <div class="search-title"><strong class="text-light"></strong>N<strong
                                class="text-light"></strong>o<strong class="text-light"></strong> <strong
                                class="text-light"></strong>e<strong class="text-light"></strong>l<strong
                                class="text-light"></strong>e<strong class="text-light"></strong>m<strong
                                class="text-light"></strong>e<strong class="text-light"></strong>n<strong
                                class="text-light"></strong>t<strong class="text-light"></strong> <strong
                                class="text-light"></strong>f<strong class="text-light"></strong>o<strong
                                class="text-light"></strong>u<strong class="text-light"></strong>n<strong
                                class="text-light"></strong>d<strong class="text-light"></strong>!<strong
                                class="text-light"></strong></div>
                        <div class="search-path"></div>
                    </a></div>
            </div>
        </div> --}}
        @php
        $user = auth('admin')->user();
        @endphp
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <!-- slider -->
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-collapse-hide-child"
                data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <!-- start -->
                <li class="nav-item">
                    <a href="{{ url('/admin/dashboard') }}" id="link-dashboard" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @if ($user->hasAnyPermission(['add tour', 'edit tour', 'delete tour', 'add booking', 'edit booking',
                'delete booking', 'view transaction', 'view report']))
                <li class="nav-header text-uppercase">Dịch vụ</li>
                @endif

                @if($user->hasAnyPermission(['add tour', 'edit tour', 'delete tour']))
                <li class="nav-item">
                    <a href="javascript::void()" id="link-tour" class="nav-link">
                        <i class="nav-icon fas fa-globe-asia"></i>
                        <p>
                            Tour
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.tour.add') }}" id="link-add-tour" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm tour</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.tour.index') }}" id="link-tour-manage" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý tour</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if($user->hasAnyPermission(['add booking', 'edit booking', 'delete booking']))
                <li class="nav-item">
                    <a href="javascript::void()" id="link-booking" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>
                            Đặt tour
                            <i class="right fas fa-angle-left"></i>
                            <span class="right badge badge-danger none">New</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.booking.add') }}" id="link-add-booking" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm đơn đặt</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.booking.index') }}" id="link-booking-manage" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý đặt tour</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('admin.booking.request.index') }}" id="link-booking-request"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="" id="newBooking">Duyệt đơn book</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if($user->hasAnyPermission(['view transaction']))
                <li class="nav-item">
                    <a href="{{ route('admin.transaction.index') }}" id="link-transaction" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>Giao dịch</p>
                    </a>
                </li>
                @endif

                @if($user->hasAnyPermission(['view report']))
                <li class="nav-item">
                    <a href="{{ route('admin.report.index') }}" id="link-report" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>Báo cáo</p>
                    </a>
                </li>
                @endif


                @if($user->hasAnyPermission(['add tag', 'edit tag', 'delete tag','add vehicle','edit
                vehicle','delete
                vehicle', 'add slider', 'edit slider', 'delete slider', 'add article', 'edit article', 'delete article',
                'add area', 'edit area', 'delete area', 'add location', 'edit location',
                'delete location', 'add promotion', 'edit promotion', 'delete promotion', 'add contact', 'edit contact',
                'delete contact', 'add about', 'edit about',
                'delete about']))
                <li class="nav-header text-uppercase">Danh mục</li>
                @endif

                @if($user->hasAnyPermission(['add tag', 'edit tag', 'delete tag']))
                <li class="nav-item">
                    <a href="{{ route('admin.tag.index') }}" id="link-tag" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Nhãn</p>
                    </a>
                </li>
                @endif

                @if($user->hasAnyPermission(['add vehicle', 'edit vehicle', 'delete vehicle']))
                <li class="nav-item">
                    <a href="{{ route('admin.vehicle.index') }}" id="link-vehicle" class="nav-link">
                        <i class="nav-icon fas fa-car-side"></i>
                        <p>Phương tiện</p>
                    </a>
                </li>
                @endif

                {{-- <li class="nav-item">
                    <a href="{{ route('admin.payment.index') }}" id="link-payment" class="nav-link">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>Phương thưc thanh toán</p>
                    </a>
                </li> --}}

                @if($user->hasAnyPermission(['add slider', 'edit slider', 'delete slider']))
                <li class="nav-item">
                    <a href="javascript::void()" id="link-slider" class="nav-link">
                        <i class="nav-icon far fa-images"></i>
                        <p>
                            Slider
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.slider.add') }}" id="link-add-slider" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.slider.index') }}" id="link-slider-manage" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý lider</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if($user->hasAnyPermission(['add article', 'edit article', 'delete article']))
                <li class="nav-item">
                    <a href="javascript::void()" id="link-article" class="nav-link">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Bài viết
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.article.add') }}" id="link-add-article" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm bài viết</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.article.index') }}" id="link-article-manage" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý bài viết</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if($user->hasAnyPermission(['add area', 'edit area', 'delete area', 'add location', 'edit
                location',
                'delete location']))
                <li class="nav-item">
                    <a href="javascript::void()" id="link-area-location" class="nav-link">
                        <i class="nav-icon fas fa-map-marked-alt"></i>
                        <p>
                            Khu vực & Địa điểm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if($user->hasAnyPermission(['add area', 'edit area', 'delete area']))
                        <li class="nav-item">
                            <a href="{{ route('admin.area.index') }}" id="link-area" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Khu vực</p>
                            </a>
                        </li>
                        @endif
                        @if($user->hasAnyPermission(['add location', 'edit location',
                        'delete location']))
                        <li class="nav-item">
                            <a href="{{ route('admin.location.index') }}" id="link-location" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Địa điểm</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if($user->hasAnyPermission(['add promotion', 'edit promotion', 'delete promotion']))
                <li class="nav-item">
                    <a href="javascript::void()" id="link-promotion" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Khuyến mại
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.promotion.add') }}" id="link-add-promotion" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm khuyến mại</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.promotion.index') }}" id="link-promotion-manage" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý khuyến mại</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif


                @if($user->hasAnyPermission(['add contact', 'edit contact', 'delete contact', 'add about', 'edit
                about', 'delete about']))
                <li class="nav-header text-uppercase">Cấu hình hệ thống</li>
                <li class="nav-item">
                    <a href="javascript::void()" id="link-page" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Quản lý trang
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if($user->hasAnyPermission(['add contact', 'edit contact', 'delete contact']))
                        <li class="nav-item">
                            <a href="{{ route('admin.contact.index') }}" id="link-contact-page" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>Liên hệ</p>
                            </a>
                        </li>
                        @endif
                        @if($user->hasAnyPermission(['add about', 'edit about', 'delete about']))
                        <li class="nav-item">
                            <a href="{{ route('admin.about.index') }}" id="link-about-page" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>Giới thiệu</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if ($user->hasAnyPermission(['add account', 'edit account']))
                <li class="nav-header text-uppercase">Tài khoản</li>

                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" id="link-user" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Khách hàng
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.user.add') }}" id="link-add-user" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}" id="link-user-manage" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Management</p>
                            </a>
                        </li>
                    </ul> --}}
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.manage.index') }}" id="link-admin" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>
                            Nhân viên
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.manage.add') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.manage.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin Manage</p>
                            </a>
                        </li>
                    </ul> --}}
                </li>
                @endif

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
