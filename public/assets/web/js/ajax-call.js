$(document).ready(function(){

    let base_url = window.location.origin;
    if(base_url == "http://localhost:8080"){
        base_url = 'http://localhost:8080';        
    }else{
        base_url = 'https://wheelpact.com';
    }

    // var token = localStorage.getItem('token');
    // if (token) {
    //     let requestData = {"token": token}
    //     $.ajax({
    //         url: base_url+'/api/customer/customer-is-already-logined',
    //         type: 'POST',                           
    //         enctype: 'multipart/form-data',
    //         data: requestData,
    //         contentType: false,
    //         cache: false,             /* To unable request pages to be cached */
    //         processData:false,        /* Important! To send DOMDocument or non processed data file it is set to false */
    //         headers: {
    //             'Access-Control-Allow-Origin': '*'
    //         },
    //         beforeSend: function(xhr) {
    //             xhr.setRequestHeader('Authorization', 'Bearer ' + token);
    //         },
    //         success: function(response) {
    //             //resp = JSON.parse(response);
    //             console.log(response);
    //             if(response.responseCode==200){
    //                 $("span#loggedInCstmrNameSpan").empty();
    //                 $("span#loggedInCstmrNameSpan").html('<strong>Hello, '+response.responseData.name+'</strong>');

    //                 $("ul#cstmrDropdown").empty();
    //                 $("ul#cstmrDropdown").html(
    //                     '<a href="'+base_url+'/my-account">'+
    //                         '<li class="login-list-item">My Account</li>'+
    //                     '</a>'+
    //                     '<a href="'+base_url+'/my-wishlist">'+
    //                         '<li class="login-list-item">My Wishlist</li>'+
    //                     '</a>'+
    //                     '<a href="javascript:void(0);" id="logoutButton">'+
    //                         '<li class="login-list-item">Logout</li>'+
    //                     '</a>'
    //                 );
    //             }
    //         }
    //     });
    // }
    
    $("ul#cstmrDropdown").on('click', '#logoutButton', function() {
        localStorage.removeItem('token');
        var token = localStorage.getItem('token');
        if (!token) {
            // Delete the cookie
            document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

            //window.location.reload();
            window.location.href = base_url+'/home';
        }
    });
    
    $("#save_customer_register_form").on('submit',(function(e) {
		e.preventDefault();
        var isvalidate = $("#save_customer_register_form").valid();
	    if (!isvalidate) {
	        return false;
	    }else{
            var form = $('#save_customer_register_form')[0];  /* Get form */
            var requestData = new FormData(form);  /* Create an FormData object  */
            var action_page = $("#save_customer_register_form").attr('action');
            $.ajax({
                url: action_page,                       
                type: 'POST',                           
                enctype: 'multipart/form-data',
                data: requestData,
                contentType: false,
                cache: false,             /* To unable request pages to be cached */
                processData:false,        /* Important! To send DOMDocument or non processed data file it is set to false */
                headers: {
                    'Access-Control-Allow-Origin': '*'
                },
                beforeSend: function() {
                    swal({
                        title: "",
                        text: "Processing...",
                        imageUrl: "https://media.tenor.com/OzAxe6-8KvkAAAAi/blue_spinner.gif",
                        showConfirmButton: false
                    });
                },
                success: function(response) { 
                    //respData = JSON.parse(response);
                    if(response.responseCode == 200){
                        swal({title: "", text: response.responseMessage, type: "success"},
		                    function(){ 
                                $("#save_customer_register_form")[0].reset();
                                window.location.reload(); 
		                    }
		                );
                    }else{
                        swal({title: "", text: response.responseMessage, type: "error"});
                    }
                },
                error: function(xhr, status, error) { 
                    console.log(xhr.responseText);
                }
            });
        }
    }));

    $("#customer_login_form").on('submit',(function(e) {
		e.preventDefault();
        var isvalidate = $("#customer_login_form").valid();
	    if (!isvalidate) {
	        return false;
	    }else{
            var form = $('#customer_login_form')[0];  /* Get form */
            var requestData = new FormData(form);  /* Create an FormData object  */
            var action_page = $("#customer_login_form").attr('action');
            //console.log(action_page);
            $.ajax({
                url: action_page,                       
                type: 'POST',                           
                enctype: 'multipart/form-data',
                data: requestData,
                contentType: false,
                cache: false,             /* To unable request pages to be cached */
                processData:false,        /* Important! To send DOMDocument or non processed data file it is set to false */
                headers: {
                    'Access-Control-Allow-Origin': '*'
                },
                beforeSend: function() {
                    swal({
                        title: "",
                        text: "Processing...",
                        imageUrl: "https://media.tenor.com/OzAxe6-8KvkAAAAi/blue_spinner.gif",
                        showConfirmButton: false
                    });
                },
                success: function(response) { 
                    //console.log(response);
                    //respData = JSON.parse(response);

                    if(response.responseCode == 200){
                        //localStorage.setItem('token', respData.token);  
                        swal({title: "", text: response.responseMessage, type: "success"},
		                    function(){ 
                                $("#customer_login_form")[0].reset();
                                
                                $("#loginModal").modal('hide');
                                $("#otpModal").modal('show');
                                $("#otpModal").find("#contact_no").val(response.responseData);

                                OTPMessage();
                                //window.location.reload();

                                //window.location.href = base_url+'/verify-otp/'+respData.responseData;
                                
		                    }
		                );
                    }else{
                        swal({title: "", text: response.responseMessage, type: "error"});
                    }
                },
                error: function(xhr, status, error) { 
                    console.log(xhr.responseText);
                }
            });
        }
    }));  

    $("#otpModal").on('click', '#generateOTP', function() {
        $('#resend-otp-btn').hide();
        $("#verifyOTPBtn").show();

        var contact_no = $("#otpModal").find("#contact_no").val();
        var action_page = base_url+'/api/customer/generate-new-otp';
        $.ajax({
            url: action_page, 
            type: "POST",
            data: { contact_no: contact_no },
            beforeSend: function() {
                swal({
                    title: "",
                    text: "Processing...",
                    imageUrl: "https://media.tenor.com/OzAxe6-8KvkAAAAi/blue_spinner.gif",
                    showConfirmButton: false
                });
            },
            success: function(response) { 
                //respData = JSON.parse(response);

                if(response.responseCode == 200){
                    swal({title: "", text: response.responseMessage, type: "success"},
                        function(){ 
                            $('.modal-otp-notify').html('<p>Resend OTP in <span id="countdownTimer">30</span> seconds</p>');
                            OTPMessage();
                        }
                    );
                }else{
                    swal({title: "", text: response.responseMessage, type: "error"});
                }
            },
            error: function(xhr, status, error) { 
                console.log(xhr.responseText);
            }
        });

        let loginNumber = document.getElementById('loginNumber').value;
        $('#loginNumberShow').text(loginNumber);

        // var counter = 30;
        // var interval = setInterval(function () {
        //     counter--;
        //     // Display 'counter' wherever you want to display it.
        //     if (counter <= 0) {
        //         clearInterval(interval);
        //         return;
        //     } else {
        //         $('#countdownTimer').text(counter);
        //     }
        // }, 1000);

    });
    
    $("#customer_login_verify_otp_form").on('submit',(function(e) {
		e.preventDefault();
        var isvalidate = $("#customer_login_verify_otp_form").valid();
	    if (!isvalidate) {
	        return false;
	    }else{
            var form = $('#customer_login_verify_otp_form')[0];  /* Get form */
            var requestData = new FormData(form);  /* Create an FormData object  */
            var action_page = $("#customer_login_verify_otp_form").attr('action');
            $.ajax({
                url: action_page,                       
                type: 'POST',                           
                enctype: 'multipart/form-data',
                data: requestData,
                contentType: false,
                cache: false,             /* To unable request pages to be cached */
                processData:false,        /* Important! To send DOMDocument or non processed data file it is set to false */
                headers: {
                    'Access-Control-Allow-Origin': '*'
                },
                beforeSend: function() {
                    swal({
                        title: "",
                        text: "Processing...",
                        imageUrl: "https://media.tenor.com/OzAxe6-8KvkAAAAi/blue_spinner.gif",
                        showConfirmButton: false
                    });
                },
                success: function(response) { 
                    //respData = JSON.parse(response);

                    if(response.responseCode == 200){
                        localStorage.setItem('token', response.token);  
                        swal({title: "", text: response.responseMessage, type: "success"},
		                    function(){ 
                                $("#customer_login_verify_otp_form")[0].reset();
                                //$.cookie('token', response.token, { expires: 7 }); // Set cookie to expire in 7 days
                                setCookie('token', response.token, 7); // Set cookie to expire in 7 days
                                window.location.reload();
		                    }
		                );
                    }else{
                        swal({title: "", text: response.responseMessage, type: "error"});
                        //window.location.reload();
                    }
                },
                error: function(xhr, status, error) { 
                    console.log(xhr.responseText);
                }
            });
        }
    }));  

    /* vehicle wishlist STARTS*/
    $('.wishlist').on('click', 'i.icofont-heart', function(e) {
        e.preventDefault();
        var self = $(this);
        var customerId = $(this).data("customerid");
        var vehicleId = $(this).data("vehicleid");
        var operation = $(this).data("operation");
        var action_page = $(this).data("actionurl");
        if(customerId){
            swal(
                {
                  title: 'Confirm to Proceed',
                  text: '',
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#DD6B55',
                  confirmButtonText: 'Yes',
                  showLoaderOnConfirm: true,
                  cancelButtonText: 'No',
                  closeOnConfirm: false,
                  closeOnCancel: false
                },
                function (isConfirm) {
                  if (isConfirm) {

                        $.ajax({
                            url: action_page, 
                            type: "POST",
                            data: { customer_id: customerId, vehicle_id: vehicleId },
                            beforeSend: function() {
                                swal({
                                    title: "",
                                    text: "Processing...",
                                    imageUrl: "https://media.tenor.com/OzAxe6-8KvkAAAAi/blue_spinner.gif",
                                    showConfirmButton: false
                                });
                            },
                            success: function(response) { 
                                if(response.responseCode == 200){
                                    swal({title: "", text: response.responseMessage, type: "success"},
                                        function(){ 
                                            if(operation=='add'){
                                                $(".addRemoveVehicleWhishlistSpan_"+vehicleId).html('<i class="icofont-heart press" data-customerid="'+customerId+'" data-vehicleid="'+vehicleId+'" data-operation="remove" data-actionurl="'+base_url+'/api/customer/remove-vehicle-wishlist"></i>');
                                            }else if(operation=='remove'){
                                                $(".addRemoveVehicleWhishlistSpan_"+vehicleId).html('<i class="icofont-heart" data-customerid="'+customerId+'" data-vehicleid="'+vehicleId+'" data-operation="add" data-actionurl="'+base_url+'/api/customer/add-vehicle-wishlist"></i>');
                                            }
                                        }
                                    );
                                }else{
                                    swal({title: "", text: response.responseMessage, type: "error"});
                                }
                            },
                            error: function(xhr, status, error) { 
                                console.log(xhr.responseText);
                            }
                        });

                    } else {
                        swal('Cancelled', 'RecordIsSafe', 'error');
                    }
                }
            );
        }else{
            swal({title: "", text: "Login Required.", type: "error"},
                function(){
                    $("#loginModal").modal('show');
                }
            );
        }
    });

    $('#load_data').on('click', 'i.icofont-heart', function(e) {
        e.preventDefault();
        var self = $(this);
        var customerId = $(this).data("customerid");
        var vehicleId = $(this).data("vehicleid");
        var operation = $(this).data("operation");
        var action_page = $(this).data("actionurl");
        if(customerId){
            swal(
                {
                  title: 'Confirm to Proceed',
                  text: '',
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#DD6B55',
                  confirmButtonText: 'Yes',
                  showLoaderOnConfirm: true,
                  cancelButtonText: 'No',
                  closeOnConfirm: false,
                  closeOnCancel: false
                },
                function (isConfirm) {
                  if (isConfirm) {

                        $.ajax({
                            url: action_page, 
                            type: "POST",
                            data: { customer_id: customerId, vehicle_id: vehicleId },
                            beforeSend: function() {
                                swal({
                                    title: "",
                                    text: "Processing...",
                                    imageUrl: "https://media.tenor.com/OzAxe6-8KvkAAAAi/blue_spinner.gif",
                                    showConfirmButton: false
                                });
                            },
                            success: function(response) { 
                                if(response.responseCode == 200){
                                    swal({title: "", text: response.responseMessage, type: "success"},
                                        function(){ 
                                            if(operation=='add'){
                                                $(".addRemoveVehicleWhishlistSpan_"+vehicleId).html('<i class="icofont-heart press" data-customerid="'+customerId+'" data-vehicleid="'+vehicleId+'" data-operation="remove" data-actionurl="'+base_url+'/api/customer/remove-vehicle-wishlist"></i>');
                                            }else if(operation=='remove'){
                                                $(".addRemoveVehicleWhishlistSpan_"+vehicleId).html('<i class="icofont-heart" data-customerid="'+customerId+'" data-vehicleid="'+vehicleId+'" data-operation="add" data-actionurl="'+base_url+'/api/customer/add-vehicle-wishlist"></i>');
                                            }
                                        }
                                    );
                                }else{
                                    swal({title: "", text: response.responseMessage, type: "error"});
                                }
                            },
                            error: function(xhr, status, error) { 
                                console.log(xhr.responseText);
                            }
                        });

                    } else {
                        swal('Cancelled', 'RecordIsSafe', 'error');
                    }
                }
            );
        }else{
            swal({title: "", text: "Login Required.", type: "error"},
                function(){
                    $("#loginModal").modal('show');
                }
            );
        }
    });
    /* vehicle wishlist ENDS */

    /* review section start */
    $("#writeStoreReview").click(function (e) {
        e.preventDefault();
        var self = $(this);
        var customerId = $(this).data("customerid");
        var storeid = $(this).data("storeid");
        //var action_page = base_url+"/api/customer/write-store-review";
        if(customerId){
            $("#writeReviewStoreModal").modal('show');
            $("#writeReviewStoreModal").find("#branch_id").val(storeid);
            $("#writeReviewStoreModal").find("#customer_id").val(customerId);
        }else{
            swal({title: "", text: "Login Required.", type: "error"},
                function(){
                    $("#loginModal").modal('show');
                }
            );
        }
    });
    
    $("#save_store_review_form").on('submit',(function(e) {
		e.preventDefault();
        var isvalidate = $("#save_store_review_form").valid();
	    if (!isvalidate) {
	        return false;
	    }else{
            var form = $('#save_store_review_form')[0];  /* Get form */
            var requestData = new FormData(form);  /* Create an FormData object  */
            var action_page = $("#save_store_review_form").attr('action');
            $.ajax({
                url: action_page,                       
                type: 'POST',                           
                enctype: 'multipart/form-data',
                data: requestData,
                contentType: false,
                cache: false,             /* To unable request pages to be cached */
                processData:false,        /* Important! To send DOMDocument or non processed data file it is set to false */
                headers: {
                    'Access-Control-Allow-Origin': '*'
                },
                beforeSend: function() {
                    swal({
                        title: "",
                        text: "Processing...",
                        imageUrl: "https://media.tenor.com/OzAxe6-8KvkAAAAi/blue_spinner.gif",
                        showConfirmButton: false
                    });
                },
                success: function(response) { 
                    if(response.responseCode == 200){
                        localStorage.setItem('token', response.token);  
                        swal({title: "", text: response.responseMessage, type: "success"},
		                    function(){ 
                                $("#save_store_review_form")[0].reset();
                                window.location.reload();
		                    }
		                );
                    }else{
                        swal({title: "", text: response.responseMessage, type: "error"});
                    }
                },
                error: function(xhr, status, error) { 
                    console.log(xhr.responseText);
                }
            });
        }
    })); 

    $("#viewAllReviewModalBtn").click(function (e) {
        e.preventDefault();
        var self = $(this);
        var storeid = $(this).data("storeid");
        var action_page = base_url+"/api/customer/get-single-store-all-review";
        $.ajax({
            url: action_page, 
            type: "POST",
            data: { branch_id: storeid },
            beforeSend: function() {
                swal({
                    title: "",
                    text: "Processing...",
                    imageUrl: "https://media.tenor.com/OzAxe6-8KvkAAAAi/blue_spinner.gif",
                    showConfirmButton: false
                });
            },
            success: function(response) { 
                if(response.status == 200){
                    swal.close();
                    $("#viewAllReviewModal").modal('show');
                    var html_content = '';
                    var singleStoreAllReview = response.data;
                    singleStoreAllReview.forEach(function(item) {
                        var rating = parseFloat(item.rating);
                        rating = rating.toFixed(2);
                        html_content += '<div class="review-block">'+
                            '<img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8MTd8ODY2MjMwNzF8fGVufDB8fHx8&w=1000&q=80">'+
                            '<div class="review-detail">'+
                                '<h6>'+item.customer_name+'</h6>'+
                                '<div class="review-rating">'+
                                    '<div class="d-flex align-items-center mb-2">'+
                                        '<div class="store-rating-icon">'+
                                            '<i class="icofont-star"></i>'+
                                        '</div>'+
                                        '<div class="store-rating-count">'+rating+'</div>'+
                                    '</div>'+
                                '</div>'+
                                '<p class="main-review">'+item.message+'</p>'+
                            '</div>'+
                        '</div>';
                    });
                    
                    $("#viewAllReviewModal").find("#allReviewBlockWrapper").html(html_content);
                }else{
                    swal({title: "", text: response.message, type: "error"});
                }
            },
            error: function(xhr, status, error) { 
                console.log(xhr.responseText);
            }
        });
    });
    /* review section end */

    /* check check Vehicle Reservation Availability section start */
    
    $("#check_vehicle_reservation_availability_form").on('submit',(function(e) {
		e.preventDefault();
        var isvalidate = $("#check_vehicle_reservation_availability_form").valid();
	    if (!isvalidate) {
	        return false;
	    }else{
            var form = $('#check_vehicle_reservation_availability_form')[0];  /* Get form */
            var requestData = new FormData(form);  /* Create an FormData object  */
            var action_page = $("#check_vehicle_reservation_availability_form").attr('action');
            $.ajax({
                url: action_page,                       
                type: 'POST',                           
                enctype: 'multipart/form-data',
                data: requestData,
                contentType: false,
                cache: false,             /* To unable request pages to be cached */
                processData:false,        /* Important! To send DOMDocument or non processed data file it is set to false */
                headers: {
                    'Access-Control-Allow-Origin': '*'
                },
                beforeSend: function() {
                    swal({
                        title: "",
                        text: "Processing...",
                        imageUrl: "https://media.tenor.com/OzAxe6-8KvkAAAAi/blue_spinner.gif",
                        showConfirmButton: false
                    });
                },
                success: function(response) { 
                    if(response.responseCode == 200){
                        swal({title: "", text: response.responseMessage, type: "success"},
		                    function(){ 
                                $("#availablityMessage").html('<span class="text-success">'+response.responseMessage+'</span>');
                                $('button').prop('disabled', false);
		                    }
		                );
                    }else{
                        swal({title: "", text: response.responseMessage, type: "error"});
                        $("#availablityMessage").html('<span class="text-danger">'+response.responseMessage+'</span>');
                    }
                },
                error: function(xhr, status, error) { 
                    console.log(xhr.responseText);
                }
            });
        }
    })); 


    /* check check Vehicle Reservation Availability section start */

    $(".banner-filter-link").click(function (e) {
        e.preventDefault();
        var vtype = $(this).data("vtype");
        setCookie('vtype', vtype, 30);
        window.location.reload();
    });

    $('#vtypeFilterOpn').on('change', function(e) {
        e.preventDefault();
        var vtype = $(this).val();
        setCookie('vtype', vtype, 30);
        window.location.reload();
        
    });

    /* Load More Data on page scroll using Ajax start */
    var limit = 3;
    var start = 0;
    var action = 'inactive';
    function lazzy_loader(limit){
      var output = '';
      for(var count=0; count<limit; count++){
        output += '<div class="post_data">';
        output += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
        output += '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
        output += '</div>';
      }
      $('#load_data_message').html(output);
    }

    lazzy_loader(limit);

    function load_data(limit, start, actionurl){
      $.ajax({
        url:actionurl,
        method:"POST",
        data:{limit:limit, start:start},
        cache: false,
        dataType: 'html', // Set the expected response data type to HTML
        success:function(data){
          if(data == ''){
            $('#load_data_message').html('<hr><h3>No More Result Found</h3>');
            action = 'active';
          }else{
            $('#load_data').append(data);
            $('#load_data_message').html("");
            action = 'inactive';
          }
        }
      });
    }

    if(action == 'inactive'){
        action = 'active';
        var actionurl = $("#actionurl").val();
        load_data(limit, start, actionurl);
    }

    $(window).scroll(function(){
        if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive'){
            var actionurl = $("#actionurl").val();
            lazzy_loader(limit);
            action = 'active';
            start = start + limit;
            setTimeout(function(){
                load_data(limit, start, actionurl);
            }, 1000);
        }
    });

    /* Load More Data on page scroll using Ajax end */

});

function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}






