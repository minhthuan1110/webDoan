<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script type="text/javascript" src="{{ URL::asset('frontend/jquery/jquery.min.js') }}"></script> --}}
    @routes
</head>

<body>
    <form action="{{ route('admin.tour.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="name" required>
        <input type="text" name="code" placeholder="code" readonly required>
        <button type="button" id="btn-generate-code">Generate</button>
        <select name="tag_id[]" id="" class="select2" data-placeholder="Chon tag" multiple required>
            @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
        <select name="vehicle_id[]" id="" class="select2" data-placeholder="Chon vehicle" multiple required>
            @foreach ($vehicles as $vehicle)
            <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
            @endforeach
        </select>
        <select name="area_id" id="">
            @foreach ($areas as $area)
            <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
        </select>
        <select name="location_id" id="">
            @foreach ($locations as $location)
            <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>
        <select name="promotion_id" id="">
            @foreach ($promotions as $promotion)
            <option value="{{ $promotion->id }}">{{ $promotion->name }}</option>
            @endforeach
        </select>
        <textarea name="description" id="" cols="30" rows="5" placeholder="Mo ta"></textarea>
        <input type="text" name="departure_location" placeholder="Departure location">
        <input type="text" name="destination" placeholder="destination">
        <input type="text" name="itinerary" id="" placeholder="Itinerary">
        <input type="number" name="slot" id="" placeholder="slot">
        <input type="number" name="adult_price" step="500" id="" placeholder="adult price">
        <input type="number" name="youth_price" step="500" id="" placeholder="youth price">
        <input type="number" name="child_price" step="500" id="" placeholder="child price">
        <input type="number" name="baby_price" step="500" id="" placeholder="baby price">
        <input type="text" name="other_day" class="date" placeholder="Pick the multiple dates">
        {{-- <div class="container1">
            <button class="add_form_field">Add New Field &nbsp;
                <span style="font-size:16px; font-weight:bold;">+ </span>
            </button>
            <div><input type="text" name="include[]"></div>
        </div> --}}
        {{-- <div class="container1">
            <button class="add_form_field">Add New Field &nbsp;
                <span style="font-size:16px; font-weight:bold;">+ </span>
            </button>
            <div><input type="text" name="include[]"></div>
        </div> --}}
        <button type="submit">Save</button>
    </form>
    <a href="{{ route('admin.tour.index') }}">Back Index</a>


    <script src="{{ asset('backend/index.js') }}"></script>
</body>
<script>
    $('.date').datepicker({
			multidate: true,
			format: 'dd-mm-yyyy'
		});

    $(document).ready(function() {
    var max_fields = 10;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");

    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append('<div><input type="text" name="include[]"/><a href="#" class="delete">Delete</a></div>'); //add input box
        } else {
            alert('You Reached the limits')
        }
    });

    $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
</script>

</html>
