$(document).ready(function () {
    let base_url = window.location.origin;
    if(base_url == "http://localhost:8080"){
        base_url= 'http://localhost:8080';        
    }else{
        base_url;
    }

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