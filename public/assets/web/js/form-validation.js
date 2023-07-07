$(document).ready(function() {
    let lang = $("#languageChange").data('lang');
    /* custom validation for String */
    $.validator.addMethod("validString", function(value, element) {
        /* allow any non-whitespace characters as the host part */
        /*return this.optional( element ) || /^[a-zA-Z0-9- ]*$/.test( value ); */
        return this.optional( element ) || /^[\u0621-\u064Aa-zA-Z0-9- ]*$/.test( value ); /* allow arabic characters as well */
    }, 'Your input string contains illegal characters.');

    $.validator.addMethod("notEqualTo", function(value, element, param) {
        // Bind to the blur event of the target in order to revalidate whenever the target field is updated
        var target = $( param );
        if ( this.settings.onfocusout && target.not( ".validate-equalTo-blur" ).length ) {
            target.addClass( "validate-equalTo-blur" ).on( "blur.validate-equalTo", function() {
                $( element ).valid();
            } );
        }
        return value !== target.val();
        // condition returns true or false
    }, "Values must be unique");

    $.validator.addMethod('greaterThan', function(value, element) {
        var dateFrom = $("#coupon_startdate").val();
        var dateTo = $('#coupon_expirydate').val();
        return dateTo >= dateFrom;
    });
    /* check valid strong passsword start */
    $.validator.addMethod("pwdLength", function(value, element) {
        return this.optional( element ) || /^.{8,16}$/.test( value );
    }, 'Expect a password length between 8 and 16 characters.');
    $.validator.addMethod("pwdUpper", function(value, element) {
        return this.optional( element ) || /[A-Z]+/.test( value );
    }, 'Expect at least one uppercase character.');
    $.validator.addMethod("pwdLower", function(value, element) {
        return this.optional( element ) || /[a-z]+/.test( value );
    }, 'Expect at least one lowercase character.');
    $.validator.addMethod("pwdNumber", function(value, element) {
        return this.optional( element ) || /[0-9]+/.test( value );
    }, 'Expect a number.');
    $.validator.addMethod("pwdSpecial", function(value, element) {
        return this.optional( element ) || /[!@#$%^&()'[\]"?+-/*={}.,;:_]+/.test( value );
    }, 'Expect at least one special character: !@#$%^&()’[]”?+-/*');
    /* check valid strong passsword end */

    //Custom validation for file size
    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param * 500000) 
    }, 'Maximum File Size Limit is 500kb.');

    //Custom validation for file extension
    $.validator.addMethod("extension", function (value, element, param) {
        param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
        return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
    }, jQuery.format("Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF."));

    /* Customer form-validation js start */
    $("#save_customer_register_form").validate({
        rules: {
            name: {
                required:true,
                validString:true
            },
            email:{
                required:true
            },
            contact_no:{
                required:true,
                digits:true,
                minlength: 9,
		        maxlength: 10
            }
        },
        messages: { /* For custom messages */
        },
        debug: true,
        errorElement: 'span',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if(placement) {
                $(placement).append(error);
                $(placement).css('color','red');
            } else {
                error.insertAfter(element);
            }
        }
    });

    $("#customer_login_form").validate({
        rules: {
            contact_no:{
                required:true,
                digits:true,
                minlength: 9,
		        maxlength: 10
            }
        },
        messages: { /* For custom messages */ 
        },
        debug: true,
        errorElement: 'span',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if(placement) {
                $(placement).append(error);
                $(placement).css('color','red');
            } else {
                error.insertAfter(element);
            }
        }
    });

    $("#customer_login_verify_otp_form").validate({
        rules: {
            otp:{
                required:true,
                digits:true,
                minlength: 6,
		        maxlength: 6
            }
        },
        messages: { /* For custom messages */ 
        },
        debug: true,
        errorElement: 'span',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if(placement) {
                $(placement).append(error);
                $(placement).css('color','red');
            } else {
                error.insertAfter(element);
            }
        }
    });

    
    

});