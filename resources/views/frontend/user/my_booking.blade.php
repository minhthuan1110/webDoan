@extends('frontend.master')

@push('title', 'My Booking')

@section('content')
<table class="table table-hover" style="background-color: #efefef">
    <thead style="background-color:#02acea;color: #fff;">
        <tr>
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Total slot</th>
            <th scope="col">Total price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bookings as $booking)
        <tr>
            <th scope="row">{{ $booking->code }}</th>
            <td>{{ $booking->name }}</td>
            <td>{{ $booking->other_day }}</td>
            <td>{{ $booking->total_slot }}</td>
            <td>{{ $booking->total_price }}</td>
            <td><a href="{{ url("/booking/{$booking->code}") }}">Detail</a></td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection
