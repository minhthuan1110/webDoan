@extends('frontend.master')

@push('title', 'Standard list')

@push('script')
<script>
    $(document).ready(function() {
    var max_fields = 10;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");

    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append('<div><input type="text" name="include[]"/><a href="#" class="delete btn btn-danger"><i class="fas fa-minus-circle"></i></a></div>'); //add input box
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
@endpush

@section('content')
<div class="container1 add-field">
    <div class="add-field__wrap">
        <input type="text" name="include[]">
        <button class="add_form_field btn btn-success">
            <span style="font-size:16px; font-weight:bold;"><i class="fas fa-plus-circle"></i> </span>
        </button>
    </div>
</div>

@endsection
<style>
    .container1.add-field {
        width: 100%;
        height: auto;
        padding: 40px 20px;
    }

    .add_form_field {
        width: 50px;
        height: 42px;
        margin-top: 10px;
        margin-left: 10px;
    }

    .add-field__wrap {
        display: flex;
    }

    .container1.add-field div input[type='text'] {
        width: 200px;
        padding: 10px 5px;
        border-radius: 0;
        outline: none;
        border: 1px solid #000;
        margin-top: 10px;
        font-size: 1.4rem;
        font-weight: 500;
        color: var(--text-color);
    }

    .container1.add-field div .delete {
        width: 50px;
        height: 42px;
        margin-left: 10px;
        font-size: 2rem;
    }

    .container1.add-field div .delete i {
        line-height: 32px;
    }
</style>
