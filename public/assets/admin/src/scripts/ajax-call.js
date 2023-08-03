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

    // Update the vehicle company models options when the company selection changes
    $('#vehicleCompany').on('change', function() {
        var selectedCompany = $(this).val();
        $.ajax({
            type: 'POST',
            url: base_url+'/api/cmp-models/',
            data: {
                cmp_id: selectedCompany
            },
            success: function(response) {
                var modelSelect = $('#vehicleCompanyModel');
                modelSelect.empty(); // Clear existing city options
                modelSelect.append('<option value="">Select Model</option>'); // Populate city options based on the selected state
				if(response.data){
					var models = response.data;
					for (var i = 0; i < models.length; i++) {
						modelSelect.append('<option value="' + models[i].id + '">' + models[i].model_name + '</option>');
					}
				}else{
					modelSelect.append('<option value="">No Model Found</option>');
				}
            }
        });
    });

    // Update the Registred RTO options when the state selection changes
    $('#registeredStateRto').on('change', function() {
        var selectedRto = $(this).val();
        $.ajax({
            type: 'POST',
            url: base_url+'/api/registered-state-rto/',
            data: {
                state_id: selectedRto
            },
            success: function(response) {
                console.log(response.data);
                var rtoSelect = $('#registeredRto');
                rtoSelect.empty(); // Clear existing rto options
                rtoSelect.append('<option value="">Select RTO</option>'); // Populate RTO options based on the selected state
				if(response.data){
					var rtos = response.data;
					for (var i = 0; i < rtos.length; i++) {
						rtoSelect.append('<option value="' + rtos[i].id + '">' + rtos[i].rto_state_code + '</option>');
					}
				}else{
					rtoSelect.append('<option value="">No RTO Found</option>');
				}
            }
        });
    });

});

$(document).ready(function () {
	var currentStep = 0;
	var steps = $(".step");
	var stepIndicators = $(".step-indicators .indicator");

	function showStep(step) {
		steps.hide();
		steps.eq(step).show();
	}

	function updateButtons() {
		if (currentStep === 0) {
			$(".prev").hide();
		} else {
			$(".prev").show();
		}

		if (currentStep === steps.length - 1) {
			$(".next").hide();
			$(".submit").show();
		} else {
			$(".next").show();
			$(".submit").hide();
		}
	}

	function updateStepIndicators(step) {
		stepIndicators.removeClass("active");
		stepIndicators.eq(step).addClass("active");
	}

	function validateStep(step) {
		var fields = steps.eq(step).find('.formInput');
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

	showStep(currentStep);
	updateButtons();
	updateStepIndicators(currentStep);

	$(".next").click(function () {
		if (validateStep(currentStep)) {
			currentStep++;
			showStep(currentStep);
			updateButtons();
			updateStepIndicators(currentStep);
		}
	});

	$(".prev").click(function () {
		currentStep--;
		showStep(currentStep);
		updateButtons();
		updateStepIndicators(currentStep);
	});

	$("#save_vehicle_form").submit(function (event) {
		event.preventDefault();
		if (!validateStep(currentStep)) {
			return false;
		}else{
			var action_page = $("#save_vehicle_form").attr('action');
            $.ajax({
                url: action_page,
                type: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Validation succeeded, handle success scenario
                        alert(response.message+"\n"+"Please Upload Vehicle Images Now.");
                        //window.location.reload();
                        $("#vehicleId").val(response.vehicleId);
                    } else {
                        // Validation failed, handle errors
                        alert(response.errors);
                    }
                },
                error: function(xhr, status, error) {
                    console.log("An error occurred:", error);
                }
            });
		}
	});
});

$(document).ready(function() {
    $('#uploadThumbnail').click(function() {
        var vehicleId = $("#vehicleId").val();
        if (vehicleId === '') {
            alert("First Add Vehicle Information and Then add Thumbnail.");
            return false;
        }
        // Get the file input element
        var fileInput = $('#thumbnailImage')[0];

        // Check if a file was selected
        if (fileInput.files.length > 0) {
            // Create a new FormData object to handle the file upload
            var formData = new FormData();
            formData.append('thumbnailImage', fileInput.files[0]);
            formData.append('vehicleId', $("#vehicleId").val());

            let base_url = window.location.origin;

            // Use AJAX to send the file data to the server
            $.ajax({
                type: 'POST',
                url: base_url+'/upload/upload_thumbnail', // Replace with the correct URL for your CodeIgniter route
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 'success') {
                        // Show the thumbnail image in the preview container
                        $('#thumbnailPreviewContainer').html('<img src="' + response.thumbnail_url + '" alt="Thumbnail" />');
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function() {
                    alert('Error: Unable to upload the thumbnail image.');
                }
            });
        }else{
            alert("Choose Vehicle Thumbnail.");
            return false;
        }
    });
});

