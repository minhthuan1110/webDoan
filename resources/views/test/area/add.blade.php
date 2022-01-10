<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('admin.area.store') }}" method="post">
        @csrf
        <select name="domestic" id="">
            <option value="1">Trong nuoc</option>
            <option value="0">Nuoc ngoai</option>
        </select>
        <input type="text" name="name" placeholder="name">
        <button type="submit">Save</button>
    </form>
    <a href="{{ route('admin.area.index') }}">Back Index</a>
</body>

</html>
