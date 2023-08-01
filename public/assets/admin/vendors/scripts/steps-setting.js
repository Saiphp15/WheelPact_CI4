// $(document).ready(function() {
// 	// Initialize the jQuery Steps plugin with your desired configuration options
// 	$("#save_vehicle_form_step1").steps({
// 	  // configuration options and callbacks go here
// 	  onStepChanging: function (event, currentIndex, newIndex) {
// 		var currentStepFields = $("#save_vehicle_form_step1").find(":input");
// 		var allFieldsValid = currentStepFields.toArray().every(function(field) {
// 		  return field.checkValidity();
// 		});
  
// 		if (!allFieldsValid) {
// 		  // If some fields are invalid, add disabled class to the Next button
// 		  $(".actions [href='#next']").addClass("disabled");
// 		} else {
// 		  // If all fields are valid, remove the disabled class from the Next button
// 		  $(".actions [href='#next']").removeClass("disabled");
// 		}
  
// 		return allFieldsValid; // Return true to allow navigation if all fields are valid
// 	  },
// 	});
  
// 	// Trigger the change event on page load to check initial validity
// 	$("#save_vehicle_form_step1 :input").trigger("change");
//   });
  

  
// $(".tab-wizard").steps({
// 	headerTag: "h5",
// 	bodyTag: "section",
// 	transitionEffect: "fade",
// 	titleTemplate: '<span class="step">#index#</span> #title#',
// 	labels: {
// 		finish: "Submit"
// 	},
// 	onStepChanged: function (event, currentIndex, priorIndex) {
// 		$('.steps .current').prevAll().addClass('disabled');
// 	},
// 	onFinished: function (event, currentIndex) {
// 		$('#success-modal').modal('show');
// 	}
// });

// $(".tab-wizard2").steps({
// 	headerTag: "h5",
// 	bodyTag: "section",
// 	transitionEffect: "fade",
// 	titleTemplate: '<span class="step">#index#</span> <span class="info">#title#</span>',
// 	labels: {
// 		finish: "Submit",
// 		next: "Next",
// 		previous: "Previous",
// 	},
// 	onStepChanged: function(event, currentIndex, priorIndex) {
// 		$('.steps .current').prevAll().addClass('disabled');
// 	},
// 	onFinished: function(event, currentIndex) {
// 		$('#success-modal-btn').trigger('click');
// 	}
// });


