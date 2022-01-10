<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('admin.promotion.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="name">
        <input type="date" name="start_date" id="" placeholder="Start date">
        <input type="date" name="end_date" id="" placeholder="End date">
        <input type="number" name="number" id="" placeholder="number">
        <select name="type" id="">
            <option value="VND">VND</option>
            <option value="%">%</option>
        </select>
        <input type="number" name="amount" id="" placeholder="so luong">
        <button type="submit">Save</button>
    </form>
    <a href="{{ route('admin.promotion.index') }}">Back Index</a>
</body>

</html>
