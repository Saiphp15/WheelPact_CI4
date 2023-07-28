$(document).ready(function () {
    let base_url = window.location.origin;
    if(base_url == "http://localhost:8080"){
        base_url= 'http://localhost:8080';        
    }else{
        base_url;
    }

    // Form submission validation
    document.getElementById('save_branch_form').addEventListener('submit', function(e) {
        // Showroom Information
        const selectDealer = document.getElementById('selectDealer').value.trim();
        const branchType = document.getElementById('branchType').value.trim();
        const branchName = document.getElementById('branchName').value.trim();
        const chooseCountry = document.getElementById('chooseCountry').value.trim();
        const chooseState = document.getElementById('chooseState').value.trim();
        const chooseCity = document.getElementById('chooseCity').value.trim();
        const address = document.getElementById('address').value.trim();

        // Check if dealer is filled
        if (selectDealer === '') {
            alert('Please choose dealer.');
            e.preventDefault();
            return;
        }

        // Check if branch type is filled
        if (branchType === '') {
            alert('Please choose the branch type.');
            e.preventDefault();
            return;
        }

        // Check if Head Mobile No is filled
        if (branchName === '') {
            alert('Please enter the branch name.');
            e.preventDefault();
            return;
        }

        // Check if country is filled
        if (chooseCountry === '') {
            alert('Please choose country.');
            e.preventDefault();
            return;
        }

        // Check if State is selected
        if (chooseState === '') {
            alert('Please select the state.');
            e.preventDefault();
            return;
        }

        // Check if City is selected
        if (chooseCity === '') {
            alert('Please select the city.');
            e.preventDefault();
            return;
        }

        // Check if address is filled
        if (address === '') {
            alert('Please enter the address.');
            e.preventDefault();
            return;
        }

    });

    // Form submission validation
    // document.getElementById('save_vehicle_form_step1').addEventListener('submit', function(e) {
    //     // Vehicle Information
    //     const branch_id             = document.getElementById('branch_id').value.trim();
    //     const vehicle_type          = document.getElementById('vehicle_type').value.trim();
    //     const vehicleCompany        = document.getElementById('vehicleCompany').value.trim();
    //     const vehicleCompanyModel   = document.getElementById('vehicleCompanyModel').value.trim();
    //     const fuel_type             = document.getElementById('fuel_type').value.trim();
    //     const variant_id            = document.getElementById('variant_id').value.trim();
    //     const mileage               = document.getElementById('mileage').value.trim();
    //     const kms_driven            = document.getElementById('kms_driven').value.trim();
    //     const owner                 = document.getElementById('owner').value.trim();
    //     const transmission_id       = document.getElementById('transmission_id').value.trim();
    //     const color_id              = document.getElementById('color_id').value.trim();

    //     // Check if dealer is filled
    //     if (branch_id === '') {
    //         alert('Please choose dealer branch.');
    //         e.preventDefault();
    //         return;
    //     }


    // });

    // Handle form submission for each step
    // $("#save_vehicle_form_step1").submit(function(e) {
    //     e.preventDefault();

    //     var currentForm = $(this);

    //     // Client-side validation
    //     // const branch_id             = $('#branch_id').val();
    //     // if (branch_id === '') {
    //     //     alert('Please choose dealer branch.');
    //     //     e.preventDefault();
    //     //     return;
    //     // }

    //     const branch_id             = currentForm.find("#branch_id").val();
    //     console.log(branch_id);

    //     return false;

    // });

    /* user password forgoted start */
    // $("#save_vehicle_form_step1").validate({
    //     rules: {
    //         branch_id:{
    //             required:true
    //         }

    //     },
    //    /* For custom messages */
    //     messages: {
            
    //     },
    //     debug: true,
    //     errorElement: 'span',
    //     errorPlacement: function(error, element) {
    //         var placement = $(element).data('error');
    //         if(placement) {
    //             $(placement).append(error)
    //         } else {
    //             error.insertAfter(element);
    //         }
    //     }
    // });

});


function save_vehicle_form_step1() {
    // Variable to track the validation status
    var isValid = true;

    const branch_id             = document.getElementById('branch_id').value.trim();
    const vehicle_type          = document.getElementById('vehicle_type').value.trim();
    const vehicleCompany        = document.getElementById('vehicleCompany').value.trim();
    const vehicleCompanyModel   = document.getElementById('vehicleCompanyModel').value.trim();
    const fuel_type             = document.getElementById('fuel_type').value.trim();
    const variant_id            = document.getElementById('variant_id').value.trim();
    const mileage               = document.getElementById('mileage').value.trim();
    const kms_driven            = document.getElementById('kms_driven').value.trim();
    const owner                 = document.getElementById('owner').value.trim();
    const transmission_id       = document.getElementById('transmission_id').value.trim();
    const color_id              = document.getElementById('color_id').value.trim();

    if (branch_id === '') {
        alert('Please choose dealer branch.');
        isValid = false;
    }else if (vehicle_type === '') {
        alert('Please choose Vehicle Type.');
        isValid = false;
    }else if (vehicleCompany === '') {
        alert('Please choose Vehicle Company/Brand.');
        isValid = false;
    }else if (vehicleCompanyModel === '') {
        alert('Please choose Vehicle Company/Brand Model.');
        isValid = false;
    }else if (fuel_type === '') {
        alert('Please choose Vehicle Fuel Type.');
        isValid = false;
    }else if (variant_id === '') {
        alert('Please choose Vehicle Veriant.');
        isValid = false;
    }else if (mileage === '') {
        alert('Please enter Vehicle Mileage.');
        isValid = false;
    }else if (kms_driven === '') {
        alert('Please enter Vehicle Kelometers Driven.');
        isValid = false;
    }else if (owner === '') {
        alert('Please choose Vehicle Owner Type.');
        isValid = false;
    }else if (transmission_id === '') {
        alert('Please choose Vehicle Transmission.');
        isValid = false;
    }else if (color_id === '') {
        alert('Please choose Vehicle Color.');
        isValid = false;
    }
    
    return isValid;

  }

  function save_vehicle_form_step2() {
    // Variable to track the validation status
    var isValid = true;

    const manufacture_year      = document.getElementById('manufacture_year').value.trim();
    const registration_year     = document.getElementById('registration_year').value.trim();
    const registeredStateRto    = document.getElementById('registeredStateRto').value.trim();
    const registeredRto         = document.getElementById('registeredRto').value.trim();

    if (manufacture_year === '') {
        alert('Please choose Vehicle manufacture year.');
        isValid = false;
    }else if (registration_year === '') {
        alert('Please choose Vehicle registration year.');
        isValid = false;
    }else if (registeredStateRto === '') {
        alert('Please choose Vehicle registered State Rto.');
        isValid = false;
    }else if (registeredRto === '') {
        alert('Please choose Vehicle registered Rto.');
        isValid = false;
    }
    
    return isValid;

  }

  function save_vehicle_form_step3(){
    // Variable to track the validation status
    var isValid = true;

    const insurance_type      = document.getElementById('insurance_type').value.trim();
    const insurance_validity  = document.getElementById('insurance_validity').value.trim();

    if (insurance_type === '') {
        alert('Please choose Vehicle insurance type.');
        isValid = false;
    }else if (insurance_validity === '') {
        alert('Please enter Vehicle insurance validity.');
        isValid = false;
    }
    
    return isValid;
  }

  function save_vehicle_form_step4(){
    // Variable to track the validation status
    var isValid = true;

    const accidental_status = document.getElementById('accidental_status').value.trim();
    const flooded_status    = document.getElementById('flooded_status').value.trim();
    const last_service_kms  = document.getElementById('last_service_kms').value.trim();
    const last_service_date = document.getElementById('last_service_date').value.trim();

    if (accidental_status === '') {
        alert('Please choose Vehicle accidental status.');
        isValid = false;
    }else if (flooded_status === '') {
        alert('Please choose Vehicle flooded status.');
        isValid = false;
    }else if (last_service_kms === '') {
        alert('Please enter Vehicle last service kms.');
        isValid = false;
    }else if (last_service_date === '') {
        alert('Please choose Vehicle last service date.');
        isValid = false;
    }
    
    return isValid;
  }

  function save_car_vehicle_form_step5(){
    // Variable to track the validation status
    var isValid = true;

    const car_no_of_airbags             = document.getElementById('car_no_of_airbags').value.trim();
    const car_central_locking           = document.getElementById('car_central_locking').value.trim();
    const car_seat_upholstery           = document.getElementById('car_seat_upholstery').value.trim();
    const car_sunroof                   = document.getElementById('car_sunroof').value.trim();
    const car_integrated_music_system   = document.getElementById('car_integrated_music_system').value.trim();
    const car_rear_ac                   = document.getElementById('car_rear_ac').value.trim();
    const car_outside_rear_view_mirrors = document.getElementById('car_outside_rear_view_mirrors').value.trim();
    const car_power_windows             = document.getElementById('car_power_windows').value.trim();
    const car_engine_start_stop         = document.getElementById('car_engine_start_stop').value.trim();
    const car_headlamps                 = document.getElementById('car_headlamps').value.trim();
    const car_power_steering            = document.getElementById('car_power_steering').value.trim();

    if (car_no_of_airbags === '') {
        alert('Please choose Vehicle no of airbags.');
        isValid = false;
    }else if (car_central_locking === '') {
        alert('Please choose Vehicle central locking.');
        isValid = false;
    }else if (car_seat_upholstery === '') {
        alert('Please enter Vehicle seat upholstery.');
        isValid = false;
    }else if (car_sunroof === '') {
        alert('Please choose Vehicle sunroof.');
        isValid = false;
    }else if (car_integrated_music_system === '') {
        alert('Please choose Vehicle integrated music system.');
        isValid = false;
    }else if (car_rear_ac === '') {
        alert('Please choose Vehicle rear ac.');
        isValid = false;
    }else if (car_outside_rear_view_mirrors === '') {
        alert('Please choose Vehicle outside rear view mirrors.');
        isValid = false;
    }else if (car_power_windows === '') {
        alert('Please choose Vehicle power windows.');
        isValid = false;
    }else if (car_engine_start_stop === '') {
        alert('Please choose Vehicle engine start stop.');
        isValid = false;
    }else if (car_headlamps === '') {
        alert('Please choose Vehicle headlamps.');
        isValid = false;
    }else if (car_power_steering === '') {
        alert('Please choose Vehicle power steering.');
        isValid = false;
    }
    
    return isValid;
  }

  function save_bike_vehicle_form_step5(){
    // Variable to track the validation status
    var isValid = true;

    const bike_headlight_type       = document.getElementById('bike_headlight_type').value.trim();
    const bike_odometer             = document.getElementById('bike_odometer').value.trim();
    const bike_drl                  = document.getElementById('bike_drl').value.trim();
    const bike_mobile_connectivity  = document.getElementById('bike_mobile_connectivity').value.trim();
    const bike_gps_navigation       = document.getElementById('bike_gps_navigation').value.trim();
    const bike_usb_charging_port    = document.getElementById('bike_usb_charging_port').value.trim();
    const bike_low_battery_indicator= document.getElementById('bike_low_battery_indicator').value.trim();
    const bike_under_seat_storage   = document.getElementById('bike_under_seat_storage').value.trim();
    const bike_speedometer          = document.getElementById('bike_speedometer').value.trim();
    const bike_stand_alarm          = document.getElementById('bike_stand_alarm').value.trim();
    const bike_low_fuel_indicator   = document.getElementById('bike_low_fuel_indicator').value.trim();
    const bike_low_oil_indicator    = document.getElementById('bike_low_oil_indicator').value.trim();
    const bike_start_type           = document.getElementById('bike_start_type').value.trim();
    const bike_kill_switch          = document.getElementById('bike_kill_switch').value.trim();
    const bike_break_light          = document.getElementById('bike_break_light').value.trim();
    const bike_turn_signal_indicator= document.getElementById('bike_turn_signal_indicator').value.trim();

    if (bike_headlight_type === '') {
        alert('Please choose Vehicle headlight type.');
        isValid = false;
    }else if (bike_odometer === '') {
        alert('Please choose Vehicle odometer.');
        isValid = false;
    }else if (bike_drl === '') {
        alert('Please enter Vehicle drl.');
        isValid = false;
    }else if (bike_mobile_connectivity === '') {
        alert('Please choose Vehicle mobile connectivity.');
        isValid = false;
    }else if (bike_gps_navigation === '') {
        alert('Please choose Vehicle gps navigation.');
        isValid = false;
    }else if (bike_usb_charging_port === '') {
        alert('Please choose Vehicle usb charging port.');
        isValid = false;
    }else if (bike_low_battery_indicator === '') {
        alert('Please choose Vehicle low battery indicator.');
        isValid = false;
    }else if (bike_under_seat_storage === '') {
        alert('Please choose Vehicle under seat storage.');
        isValid = false;
    }else if (bike_speedometer === '') {
        alert('Please choose Vehicle speedometer.');
        isValid = false;
    }else if (bike_stand_alarm === '') {
        alert('Please choose Vehicle stand alarm.');
        isValid = false;
    }else if (bike_low_fuel_indicator === '') {
        alert('Please choose Vehicle low fuel indicator.');
        isValid = false;
    }else if (bike_low_oil_indicator === '') {
        alert('Please choose Vehicle low oil indicator.');
        isValid = false;
    }else if (bike_start_type === '') {
        alert('Please choose Vehicle start type.');
        isValid = false;
    }else if (bike_kill_switch === '') {
        alert('Please choose Vehicle kill switch.');
        isValid = false;
    }else if (bike_break_light === '') {
        alert('Please choose Vehicle break light.');
        isValid = false;
    }else if (bike_turn_signal_indicator === '') {
        alert('Please choose Vehicle turn signal indicator.');
        isValid = false;
    }
    
    return isValid;
  }

  function save_vehicle_form_step6(){
    // Variable to track the validation status
    var isValid = true;

    const regular_price = document.getElementById('regular_price').value.trim();
    const selling_price = document.getElementById('selling_price').value.trim();
    const pricing_type  = document.getElementById('pricing_type').value.trim();

    if (regular_price === '') {
        alert('Please choose Vehicle regular price.');
        isValid = false;
    }else if (selling_price === '') {
        alert('Please choose Vehicle selling price.');
        isValid = false;
    }else if (pricing_type === '') {
        alert('Please enter Vehicle pricing type.');
        isValid = false;
    }
    
    return isValid;
  }