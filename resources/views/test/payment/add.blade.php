<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('admin.payment.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="name">
        <textarea name="description" id="" cols="30" rows="10" placeholder="Mo ta"></textarea>
        <button type="submit">Save</button>
    </form>
    <a href="{{ route('admin.payment.index') }}">Back Index</a>
</body>

</html>
