$(document).ready(function() {
    // Tinh gia va slot
    var totalSlot = 0;
    var totalPrice = 0;
    var promotionNumberValue, promotionType;

    $("#adultSlot, #youthSlot, #childSlot, #babySlot").on("input", function() {
        var adultSlot = $("#adultSlot").val();
        var youthSlot = $("#youthSlot").val();
        var childSlot = $("#childSlot").val();
        var babySlot = $("#babySlot").val();
        var adultPrice = $("#adultPrice").val();
        var youthPrice = $("#youthPrice").val();
        var childPrice = $("#childPrice").val();
        var babyPrice = $("#babyPrice").val();

        totalSlot =
            adultSlot * 1 + youthSlot * 1 + childSlot * 1 + babySlot * 1;
        totalPrice =
            adultSlot * adultPrice +
            youthSlot * youthPrice +
            childSlot * childPrice +
            babySlot * babyPrice;
        // console.log(number_format(totalPrice, 2, ',', ' '));
        $("#totalSlot").val(parseFloat(totalSlot));
        $("#totalPrice").val(parseFloat(totalPrice));
        $("#viewTotalSlot").html(number_format(totalSlot, 0, ".", ""));
        $("#viewTotalPrice").html(number_format(totalPrice, 0, ".", " "));
    });

    reset_price = function(promotionNumberValue, promotionType) {
        if (promotionType === "%") {
            var totalPrice2 =
                totalPrice - (totalPrice * promotionNumberValue) / 100;
        } else if (promotionType === "VND") {
            var totalPrice2 = totalPrice - promotionNumberValue;
        }
        // console.log(number_format(totalPrice2, 2, ',', ''));
        $("#totalPrice").val(parseFloat(totalPrice2));
        $("#viewTotalPrice").html(number_format(totalPrice2, 0, ",", " "));
    };

    $(".promotion").change(function(e) {
        e.preventDefault();
        var id = $(this).find(":selected").val();
        // console.log(id, typeof id);
        if (!empty(id)) {
            $.ajax({
                type: "get",
                url: "/promotion/" + id,
                success: function(data) {
                    promotionNumberValue = data.number;
                    promotionType = data.type;
                    console.log(promotionNumberValue, promotionType);
                    reset_price(promotionNumberValue, promotionType);
                },
            });
        } else {
            promotionNumberValue = 0;
            promotionType = "VND";
            reset_price(promotionNumberValue, promotionType);
        }
    });
});