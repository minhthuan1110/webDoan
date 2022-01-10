<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="{{ URL::asset('frontend/jquery/jquery.min.js') }}"></script>
    @routes
</head>

<body>
    <h3>Tour add</h3>
    <form action="{{ route('admin.tour.image.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="tour_id" value="3">
        <input type="file" name="image" id="">
        <button type="submit">add</button>
    </form>
    <a href="{{ route('admin.tour.image.index') }}">Back to tour image index</a>

</body>
<script src="{{ asset('backend/index.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>

</html>
