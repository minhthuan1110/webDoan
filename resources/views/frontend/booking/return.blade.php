@extends('frontend.master')

@push('title', 'Booking')

@section('content')
<div class="content-card">
    <div class="add_card-done">
        <div class="img-add_card-done">
            @if ($data['status'] == 1)
            <img src="{{ URL::asset('frontend/img/card_done.gif') }}" alt="img cảm ơn">
            @else
            <img src="{{ URL::asset('frontend/img/error.gif') }}" alt="img lỗi">
            @endif
        </div>
        <div class="add_card-done_title">
            @if ($data['status'] == 1)
            <h1>Xin cảm ơn bạn đã đặt tour bên Vietour ❤️</h1>
            @else
            <h1>Đặt tour thất bại!</h1>
            @endif
            <marquee id="marq" scrollamount="7" direction="left" style="font-size:18px;margin-bottom:25px" loop="50"
                scrolldelay="3" behavior="scroll" color="0033CC" onmouseover="this.stop()" onmouseout="this.start()"> {{
                $data['msg'] }} <span style="width:
             100%;height: 100%;display: inline-block; "></span></marquee>

            <div class="form-login-social">

                <div class="google-facebook">
                    <a href="{{ url('/') }}" class="facebook">Đặt Tour khác</a>
                    <a href="{{ url('/user/profile') }}" class="facebook">Xem lại rỏ hàng</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
