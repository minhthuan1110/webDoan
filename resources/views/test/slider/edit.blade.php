<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('admin.slider.update', ['slider_id' => $slider->id]) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" id="image" accept="image/*">
        <div id="preview">
            <div>
                <img src="{{ asset($slider->image_path) }}"
                    onError="this.onerror=null;this.src='{{ url("/images/placeholder600x600.png") }}';"
                    alt="Slider image">
            </div>
            <button type="button" class="btn-upload" id="upload-button"><i class="fas fa-camera"></i></button>
        </div>
        <input type="text" name="title" id="" placeholder="title" value="{{ $slider->title }}">
        <textarea name="content" id="" cols="30" rows="10" placeholder="content">{{ $slider->content }}</textarea>
        <button type="submit">save</button>
    </form>
</body>

</html>
