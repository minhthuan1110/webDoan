<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('admin.attribute.update', ['attribute_id' => $attribute->id]) }}" method="POST">
        @csrf
        <input type="text" name="name" value="{{ $attribute->name }}">
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('admin.attribute.index') }}">Back attribute index</a>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>

</html>
