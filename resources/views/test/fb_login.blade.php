@extends('master')

@push('script')
<script src="{{ asset('backend/fb_login.js') }}"></script>
@endpush
@section('content')
<div>
    {{-- <div id="status"></div>

    <a href="#" onclick="fbLogin()" id="fbLink">
        <img style="height: 100px"
            src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Facebook-icon-1.png/600px-Facebook-icon-1.png" />
    </a>

    <div id="userData"></div> --}}

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=4881118921926580&autoLogAppEvents=1"
        nonce="AWmlaknG"></script>

    <div class="fb-login-button" data-width="auto" data-size="large" data-button-type="login_with" data-layout="rounded"
        data-auto-logout-link="true" data-use-continue-as="true"></div>

    {{-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
    </fb:login-button> --}}
</div>
@endsection
