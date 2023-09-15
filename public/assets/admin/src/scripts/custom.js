$(document).ready(function () {
    let base_url = window.location.origin;
    if(base_url == "http://localhost:8080"){
        base_url= 'http://localhost:8080';        
    }else{
        base_url;
    }

    // $("#saleInput").hide();

    // $("#pricingTypeList").change(function () {
    //     var regularPriceString = "regularPrice";
    //     var salePriceString = "salePrice";

    //     var pricingOptionSelected = $("#pricingTypeList option:selected").val();

    //     if (pricingOptionSelected == salePriceString) {
    //         $("#saleInput").show();
    //     }

    //     else {
    //         $("#saleInput").hide();
    //     }
    // });

    // var silverPlanChecked = $("input[name='custom-radio']:checked").val();
    //     $('#planValue').text(silverPlanChecked);

    // $(".silverPlanRadio").click(function() {
    //     var silverPlanChecked = $("input[name='custom-radio']:checked").val();
    //     $('#planValue').text(silverPlanChecked);
    // });

    // $(".goldPlanRadio").click(function() {
    //     var silverPlanChecked = $("input[name='custom-radio']:checked").val();
    //     $('#planValue').text(silverPlanChecked);
    // });

    // $(".titaniumPlanRadio").click(function() {
    //     var silverPlanChecked = $("input[name='custom-radio']:checked").val();
    //     $('#planValue').text(silverPlanChecked);
    // });

    $("#vehicle_type").change(function () {
        var vehicleTypeSelected = $(this).val();
        var htmlContent = '';
        if(vehicleTypeSelected == 1) {
            
            htmlContent = 
            '<div class="row" id="car_features_section">'+
                '<div class="col-md-6 col-lg-3">'+
                    '<div class="form-group">'+
                        '<label>Number of Airbags<span class="required">*</span></label>'+
                        '<select class="custom-select formInput" name="car_no_of_airbags" id="car_no_of_airbags">'+
                            '<option value="">Choose...</option>'+
                            '<option value="1">None</option>'+
                            '<option value="2">1 Airbag</option>'+
                            '<option value="3">2 Airbags</option>'+
                            '<option value="4">3 Airbags</option>'+
                            '<option value="5">4 Airbags</option>'+
                            '<option value="6">5 Airbags</option>'+
                            '<option value="7">6 Airbags</option>'+
                            '<option value="8">7 Airbags</option>'+
                            '<option value="9">7+ Airbags</option>'+
                        '</select>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-6 col-lg-3">'+
                    '<div class="form-group">'+
                        '<label>Central Locking<span class="required">*</span></label>'+
                        '<select class="custom-select formInput" name="car_central_locking" id="car_central_locking">'+
                            '<option value="">Choose...</option>'+
                            '<option value="1">None</option>'+
                            '<option value="2">Key</option>'+
                            '<option value="3">Keyless</option>'+
                        '</select>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-6 col-lg-3">'+
                    '<div class="form-group">'+
                        '<label>Seat Upholstery<span class="required">*</span></label>'+
                        '<select class="custom-select formInput" name="car_seat_upholstery" id="car_seat_upholstery">'+
                            '<option value="">Choose...</option>'+
                            '<option value="1">Yes</option>'+
                            '<option value="2">No</option>'+
                        '</select>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-6 col-lg-3">'+
                    '<div class="form-group">'+
                        '<label>Sunroof/Moonroof<span class="required">*</span></label>'+
                        '<select class="custom-select formInput" name="car_sunroof" id="car_sunroof">'+
                            '<option value="">Choose...</option>'+
                            '<option value="1">Yes</option>'+
                            '<option value="2">No</option>'+
                        '</select>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-6 col-lg-3">'+
                    '<div class="form-group">'+
                        '<label>Integrated Music System<span class="required">*</span></label>'+
                        '<select class="custom-select formInput" name="car_integrated_music_system" id="car_integrated_music_system">'+
                            '<option value="">Choose...</option>'+
                            '<option value="1">Yes</option>'+
                            '<option value="2">No</option>'+
                        '</select>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-6 col-lg-3">'+
                    '<div class="form-group">'+
                        '<label>Rear AC<span class="required">*</span></label>'+
                        '<select class="custom-select formInput" name="car_rear_ac" id="car_rear_ac">'+
                            '<option value="">Choose...</option>'+
                            '<option value="1">Yes</option>'+
                            '<option value="2">No</option>'+
                        '</select>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-6 col-lg-3">'+
                    '<div class="form-group">'+
                        '<label>Outside Rear View Mirrors<span class="required">*</span></label>'+
                        '<select class="custom-select formInput" name="car_outside_rear_view_mirrors" id="car_outside_rear_view_mirrors">'+
                            '<option value="">Choose...</option>'+
                            '<option value="1">Yes</option>'+
                            '<option value="2">No</option>'+
                        '</select>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-6 col-lg-3">'+
                    '<div class="form-group">'+
                        '<label>Power Windows<span class="required">*</span></label>'+
                        '<select class="custom-select formInput" name="car_power_windows" id="car_power_windows">'+
                            '<option value="">Choose...</option>'+
                            '<option value="1">Yes</option>'+
                            '<option value="2">No</option>'+
                        '</select>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-6 col-lg-3">'+
                    '<div class="form-group">'+
                        '<label>Engine Start-Stop<span class="required">*</span></label>'+
                        '<select class="custom-select formInput" name="car_engine_start_stop" id="car_engine_start_stop">'+
                            '<option value="">Choose...</option>'+
                            '<option value="1">Yes</option>'+
                            '<option value="2">No</option>'+
                        '</select>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-6 col-lg-3">'+
                    '<div class="form-group">'+
                        '<label>Headlamps<span class="required">*</span></label>'+
                        '<select class="custom-select formInput" name="car_headlamps" id="car_headlamps">'+
                            '<option value="">Choose...</option>'+
                            '<option value="1">LED</option>'+
                            '<option value="2">Halogen</option>'+
                        '</select>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-6 col-lg-3">'+
                    '<div class="form-group">'+
                        '<label>Power Steering<span class="required">*</span></label>'+
                        '<select class="custom-select formInput" name="car_power_steering" id="car_power_steering">'+
                            '<option value="">Choose...</option>'+
                            '<option value="1">Yes</option>'+
                            '<option value="2">No</option>'+
                        '</select>'+
                    '</div>'+
                '</div>'+
            '</div>';
        }else if(vehicleTypeSelected == 2){
            htmlContent = 
            '<div class="row" id="bike_features_section">'+
            '<div class="col-md-6 col-lg-3">'+
                '<div class="form-group">'+
                    '<label>Headlight Type<span class="required">*</span></label>'+
                    '<select class="custom-select formInput" name="bike_headlight_type" id="bike_headlight_type">'+
                        '<option value="">Choose...</option>'+
                        '<option value="1">LED</option>'+
                        '<option value="2">Halogen</option>'+
                    '</select>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-6 col-lg-3">'+
                '<div class="form-group">'+
                    '<label>Odometer<span class="required">*</span></label>'+
                    '<select class="custom-select formInput" name="bike_odometer" id="bike_odometer">'+
                        '<option value="">Choose...</option>'+
                        '<option value="1">None</option>'+
                        '<option value="2">Digital</option>'+
                        '<option value="3">Analogue</option>'+
                    '</select>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-6 col-lg-3">'+
                '<div class="form-group">'+
                    '<label>DRLs (Day Time Running Lights)<span class="required">*</span></label>'+
                    '<select class="custom-select formInput" name="bike_drl" id="bike_drl">'+
                        '<option value="">Choose...</option>'+
                        '<option value="1">Yes</option>'+
                        '<option value="2">No</option>'+
                    '</select>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-6 col-lg-3">'+
                '<div class="form-group">'+
                    '<label>Mobile Connectivity<span class="required">*</span></label>'+
                    '<select class="custom-select formInput" name="bike_mobile_connectivity" id="bike_mobile_connectivity">'+
                        '<option value="">Choose...</option>'+
                        '<option value="1">Yes</option>'+
                        '<option value="2">No</option>'+
                    '</select>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-6 col-lg-3">'+
                '<div class="form-group">'+
                    '<label>GPS Navigation<span class="required">*</span></label>'+
                    '<select class="custom-select formInput" name="bike_gps_navigation" id="bike_gps_navigation">'+
                        '<option value="">Choose...</option>'+
                        '<option value="1">Yes</option>'+
                        '<option value="2">No</option>'+
                    '</select>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-6 col-lg-3">'+
                '<div class="form-group">'+
                    '<label>USB Charging Port<span class="required">*</span></label>'+
                    '<select class="custom-select formInput" name="bike_usb_charging_port" id="bike_usb_charging_port">'+
                        '<option value="">Choose...</option>'+
                        '<option value="1">Yes</option>'+
                        '<option value="2">No</option>'+
                    '</select>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-6 col-lg-3">'+
                '<div class="form-group">'+
                    '<label>Low Battery Indicator<span class="required">*</span></label>'+
                    '<select class="custom-select formInput" name="bike_low_battery_indicator" id="bike_low_battery_indicator">'+
                        '<option value="">Choose...</option>'+
                        '<option value="1">Yes</option>'+
                        '<option value="2">No</option>'+
                    '</select>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-6 col-lg-3">'+
                '<div class="form-group">'+
                    '<label>Under Seat Storage<span class="required">*</span></label>'+
                    '<select class="custom-select formInput" name="bike_under_seat_storage" id="bike_under_seat_storage">'+
                        '<option value="">Choose...</option>'+
                        '<option value="1">Yes</option>'+
                        '<option value="2">No</option>'+
                    '</select>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-6 col-lg-3">'+
                '<div class="form-group">'+
                    '<label>Speedometer<span class="required">*</span></label>'+
                    '<select class="custom-select formInput" name="bike_speedometer" id="bike_speedometer">'+
                        '<option value="">Choose...</option>'+
                        '<option value="1">Digital</option>'+
                        '<option value="2">Analogue</option>'+
                    '</select>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-6 col-lg-3">'+
                '<div class="form-group">'+
                    '<label>Stand Alarm<span class="required">*</span></label>'+
                    '<select class="custom-select formInput" name="bike_stand_alarm" id="bike_stand_alarm">'+
                        '<option value="">Choose...</option>'+
                        '<option value="1">Digital</option>'+
                        '<option value="2">Analogue</option>'+
                    '</select>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-6 col-lg-3">'+
                '<div class="form-group">'+
                    '<label>Low Fuel Indicator<span class="required">*</span></label>'+
                    '<select class="custom-select formInput" name="bike_low_fuel_indicator" id="bike_low_fuel_indicator">'+
                        '<option value="">Choose...</option>'+
                        '<option value="1">Yes</option>'+
                        '<option value="2">No</option>'+
                    '</select>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-6 col-lg-3">'+
                '<div class="form-group">'+
                    '<label>Low Oil Indicator<span class="required">*</span></label>'+
                    '<select class="custom-select formInput" name="bike_low_oil_indicator" id="bike_low_oil_indicator">'+
                        '<option value="">Choose...</option>'+
                        '<option value="1">Yes</option>'+
                        '<option value="2">No</option>'+
                    '</select>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-6 col-lg-3">'+
                '<div class="form-group">'+
                    '<label>Start Type<span class="required">*</span></label>'+
                    '<select class="custom-select formInput" name="bike_start_type" id="bike_start_type">'+
                        '<option value="">Choose...</option>'+
                        '<option value="1">Electric Start</option>'+
                        '<option value="2">Kick Start</option>'+
                        '<option value="3">Electric + KickStart</option>'+
                    '</select>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-6 col-lg-3">'+
                '<div class="form-group">'+
                    '<label>Kill Switch<span class="required">*</span></label>'+
                    '<select class="custom-select formInput" name="bike_kill_switch" id="bike_kill_switch">'+
                        '<option value="">Choose...</option>'+
                        '<option value="1">Yes</option>'+
                        '<option value="2">No</option>'+
                    '</select>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-6 col-lg-3">'+
                '<div class="form-group">'+
                    '<label>Break Light<span class="required">*</span></label>'+
                    '<select class="custom-select formInput" name="bike_break_light" id="bike_break_light">'+
                        '<option value="">Choose...</option>'+
                        '<option value="1">Halogen</option>'+
                        '<option value="2">Analogue</option>'+
                    '</select>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-6 col-lg-3">'+
                '<div class="form-group">'+
                    '<label>Turn Signal Indicator<span class="required">*</span></label>'+
                    '<select class="custom-select formInput" name="bike_turn_signal_indicator" id="bike_turn_signal_indicator">'+
                        '<option value="">Choose...</option>'+
                        '<option value="1">Halogen Bulb</option>'+
                        '<option value="2">LED</option>'+
                    '</select>'+
                '</div>'+
            '</div>'+
        '</div>';

        }

        $("#vehicleFeaturesWrapper").html(htmlContent);
    });

    
    $("#onsale_status").change(function () {
        var onsaleStatusSelected = $(this).val();
        if(onsaleStatusSelected==1){
            $("#onsale_percentage_div").show();
        }else if(onsaleStatusSelected==2){
            $("#onsale_percentage").val('');
            $("#onsale_percentage_div").hide();
        }
    });
    

    $('#vehicleList').DataTable({
		scrollCollapse: true,
		autoWidth: true,
		responsive: true,
		columnDefs: [{
			targets: "datatable-nosort",
			orderable: false,
		}],
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"language": {
			"info": "_START_-_END_ of _TOTAL_ entries",
			searchPlaceholder: "Search",
			paginate: {
				next: '<i class="ion-chevron-right"></i>',
				previous: '<i class="ion-chevron-left"></i>'  
			}
		},
        "columns": [
            { "width": "5%" }, 
            { "width": "10%" }, 
            { "width": "20%" },
            { "width": "10%" }, 
            { "width": "15%" }, 
            { "width": "15%" },
            { "width": "10%" }, 
            { "width": "15%" }
        ]
	});

    /* santosh script start */
    $('.AtoZOnly').keypress(function (e) {
        var regex = new RegExp(/^[a-zA-Z\s]+$/)
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode)
        if (regex.test(str)) {
        return true
        } else {
        e.preventDefault()
        return false
        }
    })

    $('.NumOnly').bind('keypress', function (e) {
        var keyCode = e.which ? e.which : e.keyCode
        if (!(keyCode >= 48 && keyCode <= 57)) {
        $('.error').css('display', 'inline')
        return false
        } else {
        $('.error').css('display', 'none')
        }
    })

    /* add field button - add_company page start */

    $('#extend').click(function (e) {
        e.preventDefault()
        $('#extend-field').append(
        '<div class="form-group"><div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"><input type="text" placeholder="Enter Model Name" name="VehicleModel[]" class="form-control" required><span class="input-group-btn input-group-append"><button class="btn btn-primary bootstrap-touchspin-up remove-extend-field" type="button">-</button></span></div></div>'
        )
    })

    $('#extend-field').on('click', '.remove-extend-field', function (e) {
        e.preventDefault()
        $(this).closest('.form-group').remove()
    })
    /* add field button - add_company page end */


    /* Datatable initiate start */
    $(".vehicle_company_list").DataTable();
    /* Datatable initiate end */


    /* santosh script end */

});