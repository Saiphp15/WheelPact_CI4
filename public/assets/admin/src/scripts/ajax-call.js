$(document).ready(function(){
	let base_url = window.location.origin;
    if(base_url == "http://localhost:8080"){
        base_url= 'http://localhost:8080';        
    }else{
        base_url;
    }

	// Update the city options when the state selection changes
    $('#chooseCountry').on('change', function() {
        var selectedCountry = $(this).val();
        $.ajax({
            type: 'POST',
            url: base_url+'/api/country-states/',
            data: {
                country_id: selectedCountry
            },
            success: function(response) {
				var stateSelect = $('#chooseState');
				stateSelect.empty(); // Clear existing city options
				if(response.data){
					var states = response.data;
					stateSelect.append('<option value="">Select State</option>'); // Populate states options based on the selected country
					for (var i = 0; i < states.length; i++) {
						stateSelect.append('<option value="' + states[i].id + '">' + states[i].name + '</option>');
					}
				}else{
					stateSelect.append('<option value="">No State Found</option>');
				}
            }
        });
    });

    // Update the city options when the state selection changes
    $('#chooseState').on('change', function() {
        var selectedState = $(this).val();
        $.ajax({
            type: 'POST',
            url: base_url+'/api/state-cities/',
            data: {
                state_id: selectedState
            },
            success: function(response) {
                var citySelect = $('#chooseCity');
                citySelect.empty(); // Clear existing city options
                citySelect.append('<option value="">Select City</option>'); // Populate city options based on the selected state
				if(response.data){
					var city = response.data;
					for (var i = 0; i < city.length; i++) {
						citySelect.append('<option value="' + city[i].id + '">' + city[i].name + '</option>');
					}
				}else{
					citySelect.append('<option value="">No City Found</option>');
				}
            }
        });
    });
});