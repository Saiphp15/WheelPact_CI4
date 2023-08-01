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

    // $("#save_vehicle_form_step1").submit(function(e) {
    //     e.preventDefault();
    //     let validationStatus = save_vehicle_form_step1();
    //     if(validationStatus){
    //         var action_page = $("#save_vehicle_form_step1").attr('action');
    //         $.ajax({
    //             url: action_page,
    //             type: "POST",
    //             data: $(this).serialize(),
    //             dataType: "json",
    //             success: function(response) {
    //                 if (response.success) {
    //                     // Validation succeeded, handle success scenario
    //                     alert(response.message);
    //                 } else {
    //                     // Validation failed, handle errors
    //                     alert(response.errors);
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.log("An error occurred:", error);
    //             }
    //         });
    //     }
    // });

    // $("#save_vehicle_form_step2").submit(function(e) {
    //     e.preventDefault();
    //     let validationStatus = save_vehicle_form_step2();
    //     if(validationStatus){
    //         var action_page = $("#save_vehicle_form_step2").attr('action');
    //         $.ajax({
    //             url: action_page,
    //             type: "POST",
    //             data: $(this).serialize(),
    //             dataType: "json",
    //             success: function(response) {
    //                 if (response.success) {
    //                     // Validation succeeded, handle success scenario
    //                     alert(response.message);
    //                 } else {
    //                     // Validation failed, handle errors
    //                     alert(response.errors);
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.log("An error occurred:", error);
    //             }
    //         });
    //     }
    // });

    // $("#save_vehicle_form_step3").submit(function(e) {
    //     e.preventDefault();
    //     let validationStatus = save_vehicle_form_step3();
    //     if(validationStatus){
    //         var action_page = $("#save_vehicle_form_step3").attr('action');
    //         $.ajax({
    //             url: action_page,
    //             type: "POST",
    //             data: $(this).serialize(),
    //             dataType: "json",
    //             success: function(response) {
    //                 if (response.success) {
    //                     // Validation succeeded, handle success scenario
    //                     alert(response.message);
    //                 } else {
    //                     // Validation failed, handle errors
    //                     alert(response.errors);
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.log("An error occurred:", error);
    //             }
    //         });
    //     }
    // });

    // $("#save_vehicle_form_step4").submit(function(e) {
    //     e.preventDefault();
    //     let validationStatus = save_vehicle_form_step4();
    //     if(validationStatus){
    //         var action_page = $("#save_vehicle_form_step4").attr('action');
    //         $.ajax({
    //             url: action_page,
    //             type: "POST",
    //             data: $(this).serialize(),
    //             dataType: "json",
    //             success: function(response) {
    //                 if (response.success) {
    //                     // Validation succeeded, handle success scenario
    //                     alert(response.message);
    //                 } else {
    //                     // Validation failed, handle errors
    //                     alert(response.errors);
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.log("An error occurred:", error);
    //             }
    //         });
    //     }
    // });

    
    // $("#save_car_vehicle_form_step5").submit(function(e) {
    //     e.preventDefault();
    //     let validationStatus = save_car_vehicle_form_step5();
    //     if(validationStatus){
    //         var action_page = $("#save_car_vehicle_form_step5").attr('action');
    //         $.ajax({
    //             url: action_page,
    //             type: "POST",
    //             data: $(this).serialize(),
    //             dataType: "json",
    //             success: function(response) {
    //                 if (response.success) {
    //                     // Validation succeeded, handle success scenario
    //                     alert(response.message);
    //                 } else {
    //                     // Validation failed, handle errors
    //                     alert(response.errors);
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.log("An error occurred:", error);
    //             }
    //         });
    //     }
    // });

    // $("#save_bike_vehicle_form_step5").submit(function(e) {
    //     e.preventDefault();
    //     let validationStatus = save_bike_vehicle_form_step5();
    //     if(validationStatus){
    //         var action_page = $("#save_bike_vehicle_form_step5").attr('action');
    //         $.ajax({
    //             url: action_page,
    //             type: "POST",
    //             data: $(this).serialize(),
    //             dataType: "json",
    //             success: function(response) {
    //                 if (response.success) {
    //                     // Validation succeeded, handle success scenario
    //                     alert(response.message);
    //                 } else {
    //                     // Validation failed, handle errors
    //                     alert(response.errors);
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.log("An error occurred:", error);
    //             }
    //         });
    //     }
    // });

    
    // $("#save_vehicle_form_step6").submit(function(e) {
    //     e.preventDefault();
    //     let validationStatus = save_vehicle_form_step6();
    //     if(validationStatus){
    //         var action_page = $("#save_vehicle_form_step6").attr('action');
    //         $.ajax({
    //             url: action_page,
    //             type: "POST",
    //             data: $(this).serialize(),
    //             dataType: "json",
    //             success: function(response) {
    //                 if (response.success) {
    //                     // Validation succeeded, handle success scenario
    //                     alert(response.message);
    //                     window.location.reload();
    //                 } else {
    //                     // Validation failed, handle errors
    //                     alert(response.errors);
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.log("An error occurred:", error);
    //             }
    //         });
    //     }
    // });

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
                        alert(response.message);
                        window.location.reload();
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