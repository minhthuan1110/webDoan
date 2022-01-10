<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('admin.location.store') }}" method="post">
        @csrf
        <select name="area_id" id="area" class="select2" data-placeholder="Chon khu vuc" required>
            @foreach ($areas as $area)
            <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
        </select>
        <input type="text" name="name" placeholder="name">
        <button type="submit">Save</button>
    </form>
    <a href="{{ route('admin.location.index') }}">Back Index</a>
</body>

</html>
