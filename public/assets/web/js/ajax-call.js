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
                    respData = JSON.parse(response);
                    if(respData.responseCode == 200){
                        swal({title: "", text: respData.responseMessage, type: "success"},
		                    function(){ 
                                $("#save_customer_register_form")[0].reset();
                                window.location.reload(); 
		                    }
		                );
                    }else{
                        swal({title: "", text: respData.responseMessage, type: "error"});
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
                    console.log(response);
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
                                    $(".addRemoveVehicleWhishlistSpan_"+vehicleId).html('<i class="icofont-heart press" data-customerid="'+customerId+'" data-vehicleid="'+vehicleId+'" data-operation="remove" data-actionurl="'+base_url+'/api/remove-vehicle-wishlist"></i>');
                                }else if(operation=='remove'){
                                    $(".addRemoveVehicleWhishlistSpan_"+vehicleId).html('<i class="icofont-heart" data-customerid="'+customerId+'" data-vehicleid="'+vehicleId+'" data-operation="add" data-actionurl="'+base_url+'/api/add-vehicle-wishlist"></i>');
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
        }else{
            swal({title: "", text: "Login Required.", type: "error"},
                function(){
                    $("#loginModal").modal('show');
                }
            );
        }
        
    });
    /* vehicle wishlist ENDS */

    /* write a review start */
    $("#writeStoreReview").click(function (e) {
        e.preventDefault();
        var self = $(this);
        var customerId = $(this).data("customerid");
        var storeid = $(this).data("storeid");
        var action_page = base_url+"/api/customer/write-store-review";
        if(customerId){
            $("#writeReviewModal").modal('show');
            $.ajax({
                url: action_page, 
                type: "POST",
                data: { customer_id: customerId, branch_id: storeid },
                success: function(response) { 
                    if(response.responseCode == 200){
                        swal({title: "", text: response.responseMessage, type: "success"},
                            function(){ 
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
        }else{
            swal({title: "", text: "Login Required.", type: "error"},
                function(){
                    $("#loginModal").modal('show');
                }
            );
        }
        
    });
    /* write a review end */
    

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






