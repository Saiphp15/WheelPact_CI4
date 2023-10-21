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
        const branchSupportedVehicleType = document.getElementById('branchSupportedVehicleType').value.trim();
        const branchName = document.getElementById('branchName').value.trim();
        const branchThumbnail = document.getElementById('branchThumbnail').value.trim();
        const branchBanner1 = document.getElementById('branchBanner1').value.trim();
        const branchBanner2 = document.getElementById('branchBanner2').value.trim();
        const branchBanner3 = document.getElementById('branchBanner3').value.trim();
        const chooseCountry = document.getElementById('chooseCountry').value.trim();
        const chooseState = document.getElementById('chooseState').value.trim();
        const chooseCity = document.getElementById('chooseCity').value.trim();
        const address = document.getElementById('address').value.trim();
        const contactNumber = document.getElementById('contactNumber').value.trim();
        const email = document.getElementById('email').value.trim();
        const shortDescription = document.getElementById('shortDescription').value.trim();

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

        // Check if branch Supported Vehicle Type is filled
        if (branchSupportedVehicleType === '') {
            alert('Please choose the branch Supported Vehicle type.');
            e.preventDefault();
            return;
        }

        // Check if branch is filled
        if (branchName === '') {
            alert('Please enter the branch name.');
            e.preventDefault();
            return;
        }

        // Check if branch thumbnail is filled
        if (branchThumbnail === '') {
            alert('Please choose the branch thumbnail.');
            e.preventDefault();
            return;
        }

        // Check if branch Banner1 is filled
        if (branchBanner1 === '') {
            alert('Please choose the branch Banner1.');
            e.preventDefault();
            return;
        }

        // Check if branch Banner2 is filled
        if (branchBanner2 === '') {
            alert('Please choose the branch Banner2.');
            e.preventDefault();
            return;
        }

        // Check if branch Banner3 is filled
        if (branchBanner3 === '') {
            alert('Please choose the branch Banner3.');
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

        // Check if contact Number is filled
        if (contactNumber === '') {
            alert('Please enter the contact Number.');
            e.preventDefault();
            return;
        }
         
        // Check if email is filled
        if (email === '') {
            alert('Please enter the contact Number.');
            e.preventDefault();
            return;
        }
        
        // Check if shortDescription is filled
        if (shortDescription === '') {
            alert('Please enter the short Description.');
            e.preventDefault();
            return;
        }

    });

});

function form_validation_messages(fieldId){
    var msg = '';
    switch (fieldId) {
        // form step 1 fields validation messages
        case 'branch_id':
            msg = 'Please choose dealer branch.';
            break;
        case 'vehicle_type':
            msg = 'Please choose Vehicle Type.';
            break;
        case 'vehicleCompany':
            msg = 'Please choose Vehicle Company/Brand.';
            break;
        case 'vehicleCompanyModel':
            msg = 'Please choose Vehicle Company/Brand Model.';
            break;
        case 'fuel_type':
            msg = 'Please choose Vehicle Fuel Type.';
            break;
        case 'variant_id':
            msg = 'Please choose Vehicle Veriant.';
            break;
        case 'mileage':
            msg = 'Please enter Vehicle Mileage.';
            break;
        case 'kms_driven':
            msg = 'Please enter Vehicle Kelometers Driven.';
            break;
        case 'owner':
            msg = 'Please choose Vehicle Owner Type.';
            break;
        case 'transmission_id':
            msg = 'Please choose Vehicle Transmission.';
            break;
        case 'color_id':
            msg = 'Please choose Vehicle Color.';
            break;
        // form step 2 fields validation messages
        case 'manufacture_year':
            msg = 'Please choose Vehicle manufacture year.';
            break;
        case 'registration_year':
            msg = 'Please choose Vehicle registration year.';
            break;
        case 'registeredStateRto':
            msg = 'Please choose Vehicle registered State Rto.';
            break;
        case 'registeredRto':
            msg = 'Please choose Vehicle registered Rto.';
            break;
        // form step 3 fields validation messages
        case 'insurance_type':
            msg = 'Please choose Vehicle insurance type.';
            break;
        case 'insurance_validity':
            msg = 'Please enter Vehicle insurance validity.';
            break;
        // form step 4 fields validation messages
        case 'accidental_status':
            msg = 'Please choose Vehicle accidental status.';
            break;
        case 'flooded_status':
            msg = 'Please choose Vehicle flooded status.';
            break;
        case 'last_service_kms':
            msg = 'Please enter Vehicle last service kms.';
            break;
        case 'last_service_date':
            msg = 'Please choose Vehicle last service date.';
            break;
        // form step 5 fields validation messages
        case 'car_no_of_airbags':
            msg = 'Please choose Vehicle no of airbags.';
            break;
        case 'car_central_locking':
            msg = 'Please choose Vehicle central locking.';
            break;
        case 'car_seat_upholstery':
            msg = 'Please enter Vehicle seat upholstery.';
            break;
        case 'car_sunroof':
            msg = 'Please choose Vehicle sunroof.';
            break;
        case 'car_integrated_music_system':
            msg = 'Please choose Vehicle integrated music system.';
            break;
        case 'car_rear_ac':
            msg = 'Please choose Vehicle rear ac.';
            break;
        case 'car_outside_rear_view_mirrors':
            msg = 'Please choose Vehicle outside rear view mirrors.';
            break;
        case 'car_power_windows':
            msg = 'Please choose Vehicle power windows.';
            break;
        case 'car_engine_start_stop':
            msg = 'Please choose Vehicle engine start stop.';
            break;
        case 'car_headlamps':
            msg = 'Please choose Vehicle headlamps.';
            break;
        case 'car_power_steering':
            msg = 'Please choose Vehicle power steering.';
            break;
        case 'bike_headlight_type':
            msg = 'Please choose Vehicle headlight type.';
            break;
        case 'bike_odometer':
            msg = 'Please choose Vehicle odometer.';
            break;
        case 'bike_drl':
            msg = 'Please choose Vehicle drl.';
            break;
        case 'bike_mobile_connectivity':
            msg = 'Please choose Vehicle mobile connectivity.';
            break;
        case 'bike_gps_navigation':
            msg = 'Please choose Vehicle gps navigation.';
            break;
        case 'bike_usb_charging_port':
            msg = 'Please choose Vehicle usb charging_port.';
            break;
        case 'bike_low_battery_indicator':
            msg = 'Please choose Vehicle low battery indicator.';
            break;
        case 'bike_under_seat_storage':
            msg = 'Please choose Vehicle under seat storage.';
            break;
        case 'bike_speedometer':
            msg = 'Please choose Vehicle speedometer.';
            break;
        case 'bike_stand_alarm':
            msg = 'Please choose Vehicle stand alarm.';
            break;
        case 'bike_low_fuel_indicator':
            msg = 'Please choose Vehicle low fuel indicator.';
            break;
        case 'bike_low_oil_indicator':
            msg = 'Please choose Vehicle low oil indicator.';
            break;
        case 'bike_start_type':
            msg = 'Please choose Vehicle start type.';
            break;
        case 'bike_kill_switch':
            msg = 'Please choose Vehicle kill switch.';
            break;
        case 'bike_break_light':
            msg = 'Please choose Vehicle break light.';
            break;
        case 'bike_turn_signal_indicator':
            msg = 'Please choose Vehicle turn signal indicator.';
            break;
        case 'regular_price':
            msg = 'Please enter Vehicle regular price.';
            break;
        case 'selling_price':
            msg = 'Please enter Vehicle selling price.';
            break;
        case 'pricing_type':
            msg = 'Please choose Vehicle pricing type.';
            break;

        case 'exterior_main_front_img':
            msg = 'Please choose Vehicle Exterior Main Front Image.';
            break;
        case 'exterior_main_right_img':
            msg = 'Please choose Vehicle Exterior Main Right Image.';
            break;
        case 'exterior_main_back_img':
            msg = 'Please choose Vehicle Exterior Main Back Image.';
            break;
        case 'exterior_main_left_img':
            msg = 'Please choose Vehicle Exterior Main Left Image.';
            break;
        case 'exterior_main_roof_img':
            msg = 'Please choose Vehicle Exterior Main Roof Image.';
            break;
        case 'exterior_main_bonetopen_img':
            msg = 'Please choose Vehicle Exterior Main bonet open Image.';
            break;
        case 'exterior_main_engine_img':
            msg = 'Please choose Vehicle Exterior Main engine Image.';
            break; 

        case 'exterior_diagnoal_right_front_img':
            msg = 'Please choose Vehicle Exterior Diagnoal Right Front Image.';
            break;
        case 'exterior_diagnoal_right_back_img':
            msg = 'Please choose Vehicle Exterior Diagnoal Right Back Image.';
            break;
        case 'exterior_diagnoal_left_back_img':
            msg = 'Please choose Vehicle Exterior Diagnoal Left Back Image.';
            break;
        case 'exterior_diagnoal_left_front_img':
            msg = 'Please choose Vehicle Exterior Diagnoal Left Front Image.';
            break;

        case 'exterior_wheel_right_front_img':
            msg = 'Please choose Vehicle Exterior Wheel Right Front Image.';
            break;
        case 'exterior_wheel_right_back_img':
            msg = 'Please choose Vehicle Exterior Wheel Right Back Image.';
            break;
        case 'exterior_wheel_left_back_img':
            msg = 'Please choose Vehicle Exterior Wheel Left Back Image.';
            break;
        case 'exterior_wheel_left_front_img':
            msg = 'Please choose Vehicle Exterior Wheel Left Front Image.';
            break;
        case 'exterior_wheel_spare_img':
            msg = 'Please choose Vehicle Exterior Wheel Spare Image.';
            break;

        case 'exterior_tyrethread_right_front_img':
            msg = 'Please choose Vehicle Exterior Tyrethread Right Front Image.';
            break;
        case 'exterior_tyrethread_right_back_img':
            msg = 'Please choose Vehicle Exterior Tyrethread Right Back Image.';
            break;
        case 'exterior_tyrethread_left_back_img':
            msg = 'Please choose Vehicle Exterior Tyrethread Left Back Image.';
            break;
        case 'exterior_tyrethread_left_front_img':
            msg = 'Please choose Vehicle Exterior Tyrethread Left Front Image.';
            break;

        case 'exterior_underbody_front_img':
            msg = 'Please choose Vehicle Exterior Underbody Front Image.';
            break;
        case 'exterior_underbody_rear_img':
            msg = 'Please choose Vehicle Exterior Underbody Rear Image.';
            break;
        case 'exterior_underbody_right_img':
            msg = 'Please choose Vehicle Exterior Underbody Right Image.';
            break;
        case 'exterior_underbody_left_img':
            msg = 'Please choose Vehicle Exterior Underbody Left Image.';
            break;
        
        case 'interior_dashboard_img':
            msg = 'Please choose Vehicle Interior Dashboard Image.';
            break;
        case 'interior_infotainment_system_img':
            msg = 'Please choose Vehicle Interior Infotainment System Image.';
            break;
        case 'interior_steering_wheel_img':
            msg = 'Please choose Vehicle Interior Steering Wheel Image.';
            break;
        case 'interior_odometer_img':
            msg = 'Please choose Vehicle Interior Odometer Image.';
            break;

        case 'interior_gear_lever_img':
            msg = 'Please choose Vehicle Interior Gear Lever Image.';
            break;
        case 'interior_pedals_img':
            msg = 'Please choose Vehicle Interior Pedals Image.';
            break;
        case 'interior_front_cabin_img':
            msg = 'Please choose Vehicle Interior Front Cabin Image.';
            break;
        case 'interior_rear_cabin_img':
            msg = 'Please choose Vehicle Interior Rear Cabin Image.';
            break;

        case 'interior_driver_side_door_panel_img':
            msg = 'Please choose Vehicle Interior Driver Side Door Panel Image.';
            break;
        case 'interior_driver_side_adjustment_img':
            msg = 'Please choose Vehicle Interior Driver Side Adjustment Image.';
            break;
        case 'interior_boot_inside_img':
            msg = 'Please choose Vehicle Interior Boot Inside Image.';
            break;
        case 'interior_boot_door_open_img':
            msg = 'Please choose Vehicle Interior Boot Door Open Image.';
            break;
        case 'others_keys_img':
            msg = 'Please choose Vehicle Interior Others Image.';
            break;
        default:
            // Default case if none of the above cases match
            msg = 'Form Field ID not found.';
            break;
    }

    return msg;
}

// check vehicle images fields empty or not loaded
function validateVehicleImagesFields(formId) {
    var fields = $("#"+formId).find('.formInput');
    var emptyFields = [];
    var allFieldsValid = fields.toArray().every(function (field) {
        if (field.value.trim() === '') {
            emptyFields.push(field.id);
            return false; // Field is empty, consider it as invalid
        }else{
            return true;
        }
    });
    
    if (!allFieldsValid) {
        var emptyFieldsMessage = "The following field(s) are empty:\n\n";
        emptyFields.forEach(function (fieldId) {
            var msg = form_validation_messages(fieldId);
            emptyFieldsMessage += "- " + msg + "\n";
        });
        alert(emptyFieldsMessage);
    }
    return allFieldsValid;
}
