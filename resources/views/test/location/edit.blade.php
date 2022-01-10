<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('admin.location.update', ['location_id' => $location->id]) }}" method="POST">
        @csrf
        @php
        $areaIds = $location->area()->pluck('id')->toArray();
        @endphp
        <select name="area_id" id="area" class="select2" data-placeholder="Chon khu vuc" required>
            @foreach ($areas as $area)
            <option {{ in_array($area->id, $areaIds)?'selected':'' }} value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
        </select>
        <input type="text" name="name" value="{{ $location->name }}">
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('admin.location.index') }}">Back location index</a>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>

</html>
