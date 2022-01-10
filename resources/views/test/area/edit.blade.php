<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('admin.area.update', ['area_id' => $area->id]) }}" method="POST">
        @csrf
        <input type="text" name="name" value="{{ $area->name }}">
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('admin.area.index') }}">Back area index</a>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>

</html>
