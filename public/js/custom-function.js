$(document).ready(function() {
    // tim kiem - filter tren cac trang index (admin)
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(`#list-data tr`).filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

// Tao ham number_format dua theo ham number_format() cua PHP
number_format = function(
    number,
    decimals = 0,
    dec_point = ".",
    thousands_sep = ","
) {
    number = number.toFixed(decimals);

    var nstr = number.toString();
    nstr += "";
    x = nstr.split(".");
    x1 = x[0];
    x2 = x.length > 1 ? dec_point + x[1] : "";
    var rgx = /(\d+)(\d{3})/;

    while (rgx.test(x1)) x1 = x1.replace(rgx, "$1" + thousands_sep + "$2");

    return x1 + x2;
};

// Ham check isset
isset = function(variable) {
    if (typeof variable !== "undefined" && variable !== null) {
        return true;
    }

    return false;
};

// Ham check empty
empty = function(variable) {
    if (Boolean(variable) === false || variable.length === 0) {
        return true;
    }

    return false;
};

// Generate code
$("#btn-generate-code").click(function(e) {
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: route("generate_code", 10),
        success: (response) => {
            $("input[name=code]").val(response);
        },
    });
});