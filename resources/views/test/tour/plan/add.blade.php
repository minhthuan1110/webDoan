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
    <form action="{{ route('admin.tour.plan.store') }}" method="post">
        @csrf
        <input type="hidden" name="tour_id" value="{{ $tourId }}">
        <div class="container1">
            <button class="add_form_field">Add New Field &nbsp;
                <span style="font-size:16px; font-weight:bold;">+ </span>
            </button>
            <div>
                <input type="number" name="day[]" placeholder="day">
                <textarea name="content[]" id="summernote" placeholder="content"></textarea>
                <input type="text" name="note[]" id="" placeholder="note">
            </div>
        </div>
        <button type="submit">Save</button>
    </form>
    {{-- <a href="{{ route('admin.tour_plan.index') }}">Back Index</a> --}}
</body>
<script src="{{ asset('backend/index.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
    var max_fields = 10;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");
    var div_add = `<div>
        <input type="number" name="day[]" placeholder="day">
        <textarea name="content[]" id="summernote" placeholder="content"></textarea>
        <input type="text" name="note[]" id="" placeholder="note">
        <a href="#" class="delete">Delete</a>
    </div>`;
    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        x++;
        // $(wrapper).append(`<div>
        //     <input type="number" name="day${x}" placeholder="day">
        //     <textarea name="content${x}" id="summernote" placeholder="content"></textarea>
        //     <input type="text" name="note${x}" id="" placeholder="note">
        //     <a href="#" class="delete">Delete</a>
        //     </div>`); //add input box
        wrapper.append(div_add);

    });

    $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
</script>

</html>
