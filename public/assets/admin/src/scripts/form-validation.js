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

});

function form_validation_messages(fieldId){
    console.log(fieldId);
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
        default:
            // Default case if none of the above cases match
            break;
    }

    return msg;
}
