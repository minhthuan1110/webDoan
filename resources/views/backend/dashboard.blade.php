@extends('backend.master')

@push('title', 'Dashboard')

@section('script')
<script type="text/javascript">
    // Active Sidebar
    // $('#link-dashboard').parent().addClass('activemenu-is-opening menu-open');
    $('#link-dashboard').addClass('active');
</script>
@endsection

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header coler-page_header elevation-1 " style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-2">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-8">
                <marquee id="marq" scrollamount="7" direction="left" loop="50" scrolldelay="3" behavior="scroll"
                    color="0033CC" onmouseover="this.stop()" onmouseout="this.start()"> Chào mừng bạn đến với hệ thống
                    quản trị Website quảng bá và đặt tour du lịch trực tuyến. <span style="width:
             100%;height: 100%;display: inline-block;"></marquee>
            </div><!-- /.col -->
            <div class="col-sm-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">
                        <i class="fa fa-home"></i>
                    </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

<!-- /.content-header -->
@section('content')
<!-- Main content -->
<section class="content theme-img">
    <div class="row main-content">
        <div class="col-lg-11 col-12 text-content">
            <div class="form-title">
                <p class="text-title"> welcome <br> promote and book trips.</p>
                <p class="text-title_content">Chú ý:
                    <br>+ Cần được hướng dẫn trước khi mới tiếp cận tới Admin.
                    <br>+ Không nên thêm sửa xóa nội dụng khi chưa đc cấp phép.
                    <br>+ Không đăng tải những nội dung không đúng mục đích.
                    <br>+ Chúng ta luôn luôn tuân thủ những bước thực hiện để cho công việc được hiệu quả.Admin
                    hotline:19009876.
                </p>
            </div>
        </div>
        <div class="col-lg-1 col-0 link-other">
            <div class="other_link-FB text-light">
                <p class="text-right ">Liên hệ nhà phát triển</p>
            </div>
            <div class="text-right other_link-FB ">
                <a href="https://www.facebook.com/tranquangkhuong">
                    <img src="{{ URL::asset('backend/img/orther/khuong.jpg') }}" alt="khương">
                </a>
            </div>
            <div class="text-right other_link-FB">
                <a href="https://www.facebook.com/profile.php?id=100035525148479">
                    <img src="{{ URL::asset('backend/img/orther/thuan.jpg') }}" alt="thuan">
                </a>
            </div>
            <div class="text-right other_link-FB">
                <a href="https://www.facebook.com/profile.php?id=100031851630938">
                    <img src="{{ URL::asset('backend/img/orther/ngoc.jpg') }}" alt="ngọc">
                </a>
            </div>
        </div>

    </div>
    <div class="container-fluid ">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6 item-box">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $totalTour }}</h3>
                        <p>Tours</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('admin.tour.index') }}" class="small-box-footer small-box_link">Xem chi tiết <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6 item-box">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 id="form-group-action-card">{{ $requestBooking }}</h3>
                        <p>Yêu cầu Booking</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('admin.booking.index') }}" class="small-box-footer">Xem chi tiết<i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6 item-box">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $totalUser }}</h3>

                        <p>Người dùng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('admin.user.index') }}" class="small-box-footer">Xem chi tiết<i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6 item-box">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $totalArticle }}</h3>
                        <p>Bài đăng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('admin.article.index') }}" class="small-box-footer">Xem chi tiết<i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
