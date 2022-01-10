@extends('master')

@section('content')
<div class="container">
    <form style="border: 1px" action="{{ route('user.update') }}" method="post">
        @csrf
        <input type="text" name="name" value="{{ $user->name }}">
        <input type="text" name="email" value="{{ $user->email }}">
        <input type="text" name="phone" value="{{ $user->phone }}">
        <input type="text" name="address" value="{{ $user->address }}">
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <hr>

    @if (count($errors) >0)
    <ul>
        @foreach($errors->all() as $error)
        <li> {{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{ route('user.update_password') }}" method="POST">
        @csrf
        <input type="password" name="password">
        <input type="password" name="new_password">
        <input type="password" name="re_new_password">
        <button type="submit">Update Password</button>
    </form>
</div>
@endsection
