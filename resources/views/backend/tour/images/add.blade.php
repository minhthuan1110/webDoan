<!DOCTYPE html>
<html>
<head>
  <title>How to Upload Multiple Image with Preview and Validation In Laravel 8</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <style>
    .preview-image img
    {
          padding: 10px;
          max-width: 100px;
    }
  </style>
</head>
<body>
<div class="container mt-5">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      <h2>Laravel 8 Upload Multiple Image With Preview and Validation</h2>
    </div>
    <div class="card-body">
        <form name="upload-multiple-image" method="POST"  action="{{ url('/image/save') }}" accept-charset="utf-8" enctype="multipart/form-data">
          @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="images[]" placeholder="Choose images" multiple >
                    </div>
                    @error('images')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="tour_id" value="{{ $tourId }}" data-id="{{ $tourId }}">

                <div class="col-md-12">
                    <div class="mt-1 text-center">
                        <div class="preview-image"> </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
<script>
// $(function() {
//     // Multiple images preview with JavaScript
//     var multiImgPreview = function(input, imgPreviewPlaceholder) {
//         if (input.files) {
//             var filesAmount = input.files.length;
//             for (i = 0; i < filesAmount; i++) {
//                 var reader = new FileReader();
//                 reader.onload = function(event) {
//                     $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
//                 }
//                 reader.readAsDataURL(input.files[i]);
//             }
//         }
//     };
//     $('#images').on('change', function() {
//         multiImgPreview(this, 'div.preview-image');
//     });
//   });  </script>
</body>
</html>
