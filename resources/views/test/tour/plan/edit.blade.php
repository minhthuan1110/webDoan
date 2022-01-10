<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <script type="text/javascript" src="{{ URL::asset('frontend/jquery/jquery.min.js') }}"></script>
    @routes
</head>

<body>
    {{-- <form action="{{ route('admin.tour.plan.update', ['tour_id' => $tourId]) }}" method="post"> --}}
    {{-- @csrf --}}
    {{-- <h3>{{ $tourPlan['tour_name'] }}</h3> --}}
    <input type="hidden" name="tour_id" value="{{ $tourId }}">
    <div class="container1">
        <button type="button" class="add_form_field">Add New Field &nbsp;
            <span style="font-size:16px; font-weight:bold;">+ </span>
        </button>
        @foreach ($tourPlan as $key => $item)
        <form method="post">
            <div>
                <input type="number" name="day" placeholder="day" value="{{ $item->day }}">
                <textarea name="content" id="summernote" placeholder="content">{{ $item->content }}</textarea>
                <input type="text" name="note" id="" placeholder="note" value="{{ $item->note }}">
            </div>
            <button type="button" id="button-update"
                onclick="event.preventDefault();confirmUpdate({{ $item->id }})">update</button>
            <button type="button" id="button-delete"
                onclick="event.preventDefault();confirmDelete({{ $item->id }})">delete</button>
        </form>
        @endforeach

    </div>
    {{-- <button type="submit">Save</button> --}}
    {{-- </form> --}}


    <script>
        //
    function confirmUpdate(id) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        $.ajax({
            type: "post",
            url: route(`admin.tour.plan.update`, id),
            data: {
                'day': $("input[name=day]").val(),
                'content': $("textarea[name=content]").val(),
                'note': $("input[name=note]").val(),
            },
            success: (response) => {
                Toast.fire({
                    icon: response.stt,
                    title: response.title,
                });
            },
            error: (xhr, ajaxOptions, thrownError) => {
                Toast.fire({
                    icon: 'error',
                    title: 'Update failed.',
                });
            },
        });
    }

    function confirmDelete(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: route(`admin.tour.plan.delete`, id),
                type: "GET",
                success: (response) => {
                    Swal.fire(response.title, response.msg, response.stt);
                },
                error: (xhr, ajaxOptions, thrownError) => {
                    Swal.fire("Delete failed!", "Please try again.", "error");
                },
            });
        }
    });
}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
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
</body>

</html>
