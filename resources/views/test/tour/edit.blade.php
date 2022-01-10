<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @routes
</head>

<body>
    <form action="{{ route('admin.tour.update', ['tour_id' => $tour->id]) }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="name" value="{{ $tour->name }}">
        <input type="text" name="code" placeholder="code" disabled value="{{ $tour->code }}">
        <select name="area_id" id="">
            @foreach ($areas as $area)
            <option {{ in_array($area->id, $tour->area()->pluck('id')->toArray())?'selected':'' }}
                value="{{ $area->id }}">
                {{ $area->name }}</option>
            @endforeach
        </select>
        <select name="location_id" id="">
            @foreach ($locations as $location)
            <option {{ in_array($location->id, $tour->location()->pluck('id')->toArray())?'selected':'' }}
                value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>
        <select name="promotion_id" id="">
            @foreach ($promotions as $promotion)
            <option {{ in_array($promotion->id, $tour->promotion()->pluck('id')->toArray())?'selected':'' }}
                value="{{ $promotion->id }}">{{ $promotion->name }}</option>
            @endforeach
        </select>
        <textarea name="description" id="" cols="15" rows="5" placeholder="Mo ta">{{ $tour->description }}</textarea>
        <input type="text" name="departure_location" placeholder="Departure location"
            value="{{ $tour->departure_location }}">
        <input type="text" name="destination" placeholder="destination" value="{{ $tour->destination }}">
        <input type="text" name="itinerary" id="" placeholder="Itinerary" value="{{ $tour->itinerary }}">
        <input type="number" name="slot" id="" placeholder="slot" value="{{ $tour->slot }}">
        <input type="number" name="adult_price" step="500" id="" placeholder="adult price"
            value="{{ $tour->adult_price }}">
        <input type="number" name="youth_price" step="500" id="" placeholder="youth price"
            value="{{ $tour->youth_price }}">
        <input type="number" name="child_price" step="500" id="" placeholder="child price"
            value="{{ $tour->child_price }}">
        <input type="number" name="baby_price" step="500" id="" placeholder="baby price"
            value="{{ $tour->baby_price }}">
        <div class="container1">
            <button class="add_form_field">Add New Field &nbsp;
                <span style="font-size:16px; font-weight:bold;">+ </span>
            </button>
            @foreach ($includes as $include => $value)
            <div><input type="text" name="include[]" data-id="{{ $include->id }}" value="{{ $value->value }}"></div>
            @endforeach
        </div>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('admin.tour_plan.add', ['tour_id' => $tour->id]) }}">Tour plan</a>
    <a href="{{ route('admin.tour.index') }}">Back tour index</a>
</body>
<script src="{{ asset('backend/index.js') }}">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>

</html>
