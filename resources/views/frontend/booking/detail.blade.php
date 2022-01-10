@extends('frontend.master')

@push('title', 'Booking Detail')

@section('content')
<h4>Code: {{ $booking['code'] }}</h4><br />
<h4>Name: {{ $booking['name'] }}</h4><br />
<h4>Email: {{ $booking['email'] }}</h4><br />
<h4>Phone: {{ $booking['phone'] }}</h4><br />
<h4>Address: {{ $booking['address'] }}</h4><br />
<h4>Note: {{ $booking['note'] }}</h4><br />
<h4>Status: {{ $booking['status'] }}</h4><br />
<h4>Promotion: {{ $booking['promotion'] }}</h4><br />
<h4>Payment: {{ $booking['payment'] }}</h4><br />
<h4>Tour: {{ $booking['tour'] }}</h4><br />
<h4>Date: {{ $booking['date'] }}</h4><br />
<h4>Adult price: {{ $booking['adult_price'] }}</h4><br />
<h4>Adult slot: {{ $booking['adult_slot'] }}</h4><br />
<h4>Youth price: {{ $booking['youth_price'] }}</h4><br />
<h4>Youth slot: {{ $booking['youth_slot'] }}</h4><br />
<h4>Child price: {{ $booking['child_price'] }}</h4><br />
<h4>Child slot: {{ $booking['child_slot'] }}</h4><br />
<h4>Baby price: {{ $booking['baby_price'] }}</h4><br />
<h4>Baby slot: {{ $booking['baby_slot'] }}</h4><br />
<h4>Total price: {{ $booking['total_price'] }}</h4><br />
<h4>Total slot: {{ $booking['total_slot'] }}</h4><br />
<h4>Created at: {{ $booking['created_at'] }}</h4><br />
@endsection
