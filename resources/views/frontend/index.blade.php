@extends('frontend.master')

@push('title', 'Trang chủ')

@section('content')

@include('frontend.include.slider')

@include('frontend.include.filter-offical')

@include('frontend.include.area-tour')

@include('frontend.include.promotion')

@include('frontend.include.video')

@include('frontend.include.service')

@include('frontend.include.foreign-tour')

@include('frontend.include.hot-tour')

@include('frontend.include.blog')
@endsection
