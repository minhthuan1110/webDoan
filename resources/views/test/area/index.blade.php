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
    <div>
        <a href="{{ route('admin.area.add') }}">Add</a>
        {{-- input keyword đặt ở trên card-header gì đó ấy --}}
        <input type="text" name="keyword" id="search" placeholder="Keyword">
        <table>
            <thead>
                <tr>
                    <th>area name</th>
                </tr>
            </thead>
            <tbody id="list-area">

            </tbody>
        </table>

        {{-- @foreach ($tags as $tag)
        <tr>
            <td>{{ $tag->name }}</td>
        <td><a href="{{ route('admin.tag.edit', ['tag_id' => $tag->id]) }}">Edit</a></td>
        <td><a href="#" onclick="confirmDelete({{ $tag->id }})">Delete</a></td>
        </tr>
        @endforeach --}}
    </div>

</body>
<script src="{{ asset('backend/index.js') }}">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>

</html>
