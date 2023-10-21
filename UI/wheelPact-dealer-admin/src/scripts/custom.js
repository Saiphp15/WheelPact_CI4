$(document).ready(function () {
    $("#saleInput").hide();

    $("#pricingTypeList").change(function () {
        var regularPriceString = "regularPrice";
        var salePriceString = "salePrice";

        var pricingOptionSelected = $("#pricingTypeList option:selected").val();

        if (pricingOptionSelected == salePriceString) {
            $("#saleInput").show();
        }

        else {
            $("#saleInput").hide();
        }
    });

    var silverPlanChecked = $("input[name='custom-radio']:checked").val();
        $('#planValue').text(silverPlanChecked);

    $(".silverPlanRadio").click(function() {
        var silverPlanChecked = $("input[name='custom-radio']:checked").val();
        $('#planValue').text(silverPlanChecked);
    });

    $(".goldPlanRadio").click(function() {
        var silverPlanChecked = $("input[name='custom-radio']:checked").val();
        $('#planValue').text(silverPlanChecked);
    });

    $(".titaniumPlanRadio").click(function() {
        var silverPlanChecked = $("input[name='custom-radio']:checked").val();
        $('#planValue').text(silverPlanChecked);
    });
});