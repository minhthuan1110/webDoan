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
    <a href="{{ route('admin.tour.image.add') }}">Add</a>
    <h3>Tour image</h3>
    {{-- <table>
        <thead></thead>
        <tbody id="list-image"></tbody>
    </table> --}}
    @foreach ($images as $item)
    <div>
        <img src="{{ asset($item->image_path) }}" alt="">
        <a href="{{ route('admin.tour.image.delete', ['image_id' => $item->id]) }}">Delete</a>
    </div>
    @endforeach

</body>
{{-- <script src="{{ asset('backend/index.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>


</html>
