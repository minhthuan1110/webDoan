<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Summernote</title>

    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>Add Article</h2>
        <form action="{{ route('admin.article.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" id="" placeholder="title">
            <input type="file" name="image" id="image" placeholder="image">
            <textarea name="data_editor" id="summernote" placeholder="Content"></textarea>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
  $('#summernote').summernote();
});
</script>

</html>
