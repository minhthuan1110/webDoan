<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('admin.promotion.update', ['promotion_id' => $promotion->id]) }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="name" value="{{ $promotion->name }}">
        <input type="date" name="start_date" id="" placeholder="Start date" value="{{ $promotion->start_date }}">
        <input type="date" name="end_date" id="" placeholder="End date" value="{{ $promotion->end_date }}">
        <input type="number" name="number" id="" placeholder="number" value="{{ $promotion->number }}">
        <select name="type" id="">
            <option {{ $promotion->type == 'VND'?'selected':'' }} value="VND">VND</option>
            <option {{ $promotion->type == '%'?'selected':'' }} value="%">%</option>
        </select>
        <input type="number" name="amount" id="" placeholder="so luong" value="{{ $promotion->amount }}">
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('admin.promotion.index') }}">Back promotion index</a>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>

</html>
