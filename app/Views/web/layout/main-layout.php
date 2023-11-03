<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WheelPact | Get the best used cars</title>
    <!-- Iconfont Link -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/web/icofont/icofont.min.css" />
    <!-- BOOTSTRAP -->
    <link href="<?php echo base_url(); ?>assets/web/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/web/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/web/css/wheelpact-styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/web/css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/web/css/fonts.css">
    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/web/owl-carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/web/owl-carousel/dist/assets/owl.theme.default.min.css">
    <!-- sweet alert Link -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/web/css/sweetalert.css" />
</head>

<body>
    <!-- LOCATION MODAL STARTS -->
    <div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="modal-title text-center mb-3">
                        <h5>Select your city</h5>
                    </div>

                    <div class="container">
                        <div class="row">
                            <!-- <div class="col-md-6 col-lg-3"> -->
                            <!-- <div class="location-wrapper">  
                                    <img src="<?php echo base_url(); ?>assets/web/images/mumbai-img.jpg">
                                </div> -->

                            <div class="grid-wrapper grid-col-auto">
                                <label for="radio-card-1" class="radio-card">
                                    <input type="radio" name="radio-card" id="radio-card-1" checked />
                                    <div class="location-card-content-wrapper">
                                        <span class="check-icon"></span>
                                        <div class="location-card-content">
                                            <img src="<?php echo base_url(); ?>assets/web/images/mumbai-img.jpg"
                                                alt="" />
                                            <h4>Mumbai</h4>
                                            <!-- <h5>Lorem ipsum dolor sit amet, consectetur.</h5> -->
                                        </div>
                                    </div>
                                </label>
                                <!-- /.radio-card -->

                                <label for="radio-card-2" class="radio-card">
                                    <input type="radio" name="radio-card" id="radio-card-2" />
                                    <div class="location-card-content-wrapper">
                                        <span class="check-icon"></span>
                                        <div class="location-card-content">
                                            <img src="<?php echo base_url(); ?>assets/web/images/mumbai-img.jpg"
                                                alt="" />
                                            <h4>Pune</h4>
                                            <!-- <h5>Lorem ipsum dolor sit amet, consectetur.</h5> -->
                                        </div>
                                    </div>
                                </label>
                                <!-- /.radio-card-->
                            </div>
                            <!--</div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOCATION MODAL ENDS -->

    <!-- CUSTOMER REGISTER MODAL STARTS -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="modal-icon-holder mx-auto">
                        <i class="icofont-key"></i>
                    </div>
                    <div class="modal-title text-center mb-3">
                        <h5>Register</h5>
                    </div>
                    <div class="container">
                        <form action="<?php echo base_url('api/customer/customer-register'); ?>" name="save_customer_register_form" id="save_customer_register_form" method="POST" enctype="multipart/form-data">
                            <div class="login-input mt-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="brand-label mb-1">Full Name<span class="required">*</span></label>
                                            <input type="text" name="name" class="brand-input">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="brand-label mb-1">Email Address<span class="required">*</span></label>
                                            <input type="email" name="email" class="brand-input">
                                        </div>
                                    </div>
                                </div>
                                <label class="brand-label mb-1">Enter Mobile Number<span class="required">*</span></label>
                                <input type="text" name="contact_no" maxlength="10" class="brand-input" id="loginNumber">
                            </div>
                            <div class="modal-notify">
                                <p>By loging in, I agree to <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a></p>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="dg-brand-btn">Send OTP</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CUSTOMER REGISTER MODAL ENDS -->

    <!-- CUSTOMER LOGIN MODAL STARTS -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-icon-holder mx-auto">
                        <i class="icofont-key"></i>
                    </div>
                    <div class="modal-title text-center mb-3">
                        <h5>Login</h5>
                    </div>
                    <div class="container">
                        <form action="<?php echo base_url('api/customer/customer-login'); ?>" method="post" name="customer_login_form" id="customer_login_form" enctype="multipart/form-data">
                            <div class="login-input mt-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="brand-label mb-1">Enter Mobile Number<span class="required">*</span></label>
                                            <input type="text" name="contact_no" class="brand-input">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="dg-brand-btn" >Send OTP</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CUSTOMER LOGIN MODAL ENDS -->

    <!-- OTP MODAL STARTS -->
    <div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-icon-holder mx-auto">
                        <i class="icofont-key"></i>
                    </div>
                    <div class="modal-title text-center mb-3">
                        <h5>OTP Verification</h5>
                    </div>
                    <div class="modal-notify">
                        <p>Enter the OTP sent to your registered email inbox<span id="loginNumberShow"></span></p>
                    </div>
                    <div class="container">
                        <form action="<?php echo base_url('api/customer/customer-login-verify-otp'); ?>" method="post" name="customer_login_verify_otp_form" id="customer_login_verify_otp_form" enctype="multipart/form-data">
                            <input type="hidden" name="contact_no" id="contact_no" >
                            <div class="login-input mt-4">
                                <label class="brand-label mb-1">Enter OTP</label>
                                <input type="text" name="otp" id="otp" class="brand-input">
                            </div>
                            <div class="modal-otp-notify">
                                <p>Resend OTP in <span id="countdownTimer">30</span> seconds</p>
                            </div>
                            <div class="text-center mt-4 " id="resend-otp-btn" style="display:none;">
                                <a href="javascript:void(0);" class="dg-brand-btn" id="generateOTP">Resend</a>
                            </div>
                            <div class="text-center mt-4" id="verifyOTPBtn">
                                <button type="submit" class="dg-brand-btn" >Verify OTP</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- OTP MODAL ENDS -->

    <!-- WRITE A REVIEW MODAL STARTS -->
    <div class="modal fade" id="writeReviewStoreModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <?= form_open('api/customer/write-store-review', 'id="save_store_review_form" ') ?>
                    <?= csrf_field(); ?>
                    <input type="hidden" name="branch_id" id="branch_id">
                    <input type="hidden" name="customer_id" id="customer_id">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-icon-holder mx-auto">
                        <i class="icofont-comment"></i>
                    </div>
                    <div class="modal-title text-center mb-3">
                        <h5>Write a Review</h5>
                    </div>
                    <div class="container">
                        <div class="review-input">
                            <div class="mb-3">
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="brand-label mb-1">Write Your Review<span class="required">*</span></label>
                                <textarea name="message" id="message" class="brand-textarea" rows="4"></textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="dg-brand-btn">Submit Review</button>
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <!-- WRITE A REVIEW MODAL ENDS -->

    <!-- VIEW ALL REVIEWS MODAL STARTS -->
    <div class="modal fade" id="viewAllReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                    <div class="modal-icon-holder mx-auto">
                        <i class="icofont-comment"></i>
                    </div>
                    <div class="modal-title text-center mb-3">
                        <h5>View All Reviews</h5>
                    </div>

                    <div class="container" id="allReviewBlockWrapper">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- VIEW ALL REVIEWS MODAL ENDS -->

    <!-- RESERVATION REFUND POLICY MODAL STARTS -->
    <div class="modal fade" id="reservationRefundModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                    <div class="modal-icon-holder mx-auto">
                        <i class="icofont-shield-alt"></i>
                    </div>
                    <div class="modal-title text-center mb-3">
                        <h5>Reservation Refund Policy</h5>
                    </div>

                    <div class="container">
                        <div class="rrp-content">
                            <h5 class="text-center mb-4">Thankyou for your interest in reserving a vehicle on WheelPact!
                            </h5>
                            <ul class="rrf-list">
                                <li>
                                    <p>The Reservation Refund Policies are mentioned below:</p>
                                </li>
                                <li>
                                    <p>1. The Reservation fee is refundable when the visiting person rejects the vehicle
                                        and the reservation cancelled request has been raised by the Partner Dealer.</p>
                                </li>
                                <li>
                                    <p>2. The Reservation fee in non-refundable if the person does not visit the vehicle
                                        on the scheduled date and time.</p>
                                </li>
                                <li>
                                    <p>3. The Reservation fee is non-refundable until the scheduled date & time.</p>
                                </li>
                                <li>
                                    <p>4. The 10% service charge mentioned in Bill Summary is non-refundable in any
                                        case, only the reservation fee will be refunded.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- RESERVATION REFUND POLICY MODAL ENDS -->

    <!-- HEADER STARTS -->
    <header>
        <!-- DESKTOP HEADER STARTS -->
        <div id="desk-header">
            <div class="header-container">
                <!-- logo -->
                <strong class="logo">
                    <a href="<?php echo base_url(); ?>">
                        <!-- <h2>Wheelpact</h2> -->
                        <img src="<?php echo base_url(); ?>assets/web/images/logo.png">
                    </a>
                </strong>
                <!-- open nav mobile -->

                <!--search -->
                <label class="open-search" for="open-search">
                    <i class="icofont-search"></i>
                    <input class="input-open-search" id="open-search" type="checkbox" name="menu" />
                    <div class="search">
                        <button class="button-search"><i class="icofont-search"></i></button>
                        <input type="text" placeholder="Search your vehicle" class="input-search" />
                    </div>
                </label>
                <!-- // search -->
                <nav class="nav-content">
                    <!-- nav -->
                    <ul class="nav-content-list">
                        <li class="nav-content-item"><a class="nav-content-link" href="#" data-bs-target="#locationModal" data-bs-toggle="modal"><i class="icofont-map"></i>Location</a></li>
                        <li class="nav-content-item account-login">
                            <label class="open-menu-login-account" for="open-menu-login-account">
                                <input class="input-menu" id="open-menu-login-account" type="checkbox" name="menu" />
                                <i class="icofont-ui-user"></i><span class="login-text" id="loggedInCstmrNameSpan">
                                    <?php if(isset($customerData) && !empty($customerData)){ ?>
                                        <strong><?php echo isset($customerData['name'])?$customerData['name']:'NA'; ?></strong></span> <span class="item-arrow"></span>
                                        <!-- submenu -->
                                        <ul class="login-list" id="cstmrDropdown">
                                            <a href="<?php echo base_url('my-account'); ?>"><li class="login-list-item">My Account</li></a>
                                            <a href="<?php echo base_url('my-wishlist'); ?>"><li class="login-list-item">My Wishlist</li></a>
                                            <a href="javascript:void(0);" id="logoutButton"><li class="login-list-item">Logout</li></a>
                                        </ul>
                                    <?php }else{ ?>
                                        <strong>Create Account</strong></span> <span class="item-arrow"></span>
                                        <!-- submenu -->
                                        <ul class="login-list" id="cstmrDropdown">
                                            <a href="#" data-bs-target="#registerModal" data-bs-toggle="modal"><li class="login-list-item">Register</li></a>
                                            <a href="#" data-bs-target="#loginModal" data-bs-toggle="modal"><li class="login-list-item">Login</li></a>
                                        </ul>
                                    <?php } ?>
                                
                            </label>
                        </li>
                    </ul>
                    <!-- call to action -->
                </nav>
            </div>
        </div>
        <!-- DESKTOP HEADER ENDS -->

        <!-- MOBILE HEADER STARTS -->
        <div id="mob-header">
            <div class="mob-nav">
                <div class="row">
                    <div class="col-6">
                        <div class="d-flex">
                            <div class="text-end">
                                <button class="mob-nav-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft"><i class="icofont-navigation-menu"></i></button>
                            </div>
                            <div class="logo">
                                <a href="index.html">
                                    <!-- <h2>Wheelpact</h2> -->
                                    <img src="<?php echo base_url(); ?>assets/web/images/logo.png">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mob-location">
                            <i class="icofont-map"></i>
                            <h6>Mumbai</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="offcanvas offcanvas-start mob-offcanvas" tabindex="-1" id="offcanvasLeft"
            aria-labelledby="offcanvasLeftLabel">
            <div class="offcanvas-header mob-menu-header">
                <div class="mob-menu-user">
                    <?php if(isset($customerData) && !empty($customerData)){ ?>
                        <span class="mob-login-text">Hello, <?php echo isset($customerData['name'])?$customerData['name']:'NA'; ?></span>
                    <?php }else{ ?>
                        <span class="mob-login-text">Create Account</span>
                    <?php } ?>
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mob-menu-body">
                <ul class="mob-nav-list">
                    <?php if(isset($customerData) && !empty($customerData)){ ?>
                        <a href="profile.html"><li><i class="icofont-user"></i>Profile Info</li></a>
                        <a href="wishlist.html"><li><i class="icofont-heart"></i> Wishlist</li></a>
                        <a href="#"><li><i class="icofont-logout"></i>Logout</li></a>
                    <?php }else{ ?>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal"><li><i class="icofont-login"></i>Register</li></a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"><li><i class="icofont-login"></i>Login</li></a>
                    <?php } ?>
                </ul>
                <ul class="mob-nav-imp-list">
                    <a href="#"><li>About Us</li><i class="icofont-right"></i></a>
                    <a href="#"><li>Pricing</li></a>
                    <a href="#"><li>Become Our Partner</li></a>
                    <a href="#"><li>Terms & Condition</li></a>
                    <a href="#"><li>Privacy Policy</li></a>
                </ul>
                <div class="sidebar-title">
                    <h6>Download Our App</h6>
                </div>
                <div class="sidebar-app">
                    <a href="#">
                        <img src="<?php echo base_url(); ?>assets/web/images/google-play-store-transparent.png">
                    </a>
                    <a href="#">
                        <img src="<?php echo base_url(); ?>assets/web/images/apple-store.png">
                    </a>
                </div>
            </div>
        </div>
        <!-- MOBILE HEADER ENDS -->
    </header>
    <!-- HEADER ENDS -->

    <?php $this->renderSection('content'); ?>

    <!-- CALL TO ACTION SECTION ENDS -->
    <footer>
        <div class="main-footer section-spacing">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="footer-logo">
                            <!-- <h2>Wheelpact</h2> -->
                            <img src="<?php echo base_url(); ?>assets/web/images/logo-bg.png">
                        </div>
                        <div class="footer-comp-details">
                            <p>** All product names, logos, and brands are property of their respective owners. All
                                company, product and service names used in this website are for identification purposes
                                only. Use of these names, logos, and brands does not imply endorsement.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="footer-title">
                            <h3>Important Links</h3>
                        </div>
                        <ul class="footer-link">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="become-partner.html">Become Our Partner</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Refund & Return Policy</a></li>
                            <li><a href="#">FAQ's</a></li>
                            <li><a href="#">Blogs</a></li>
                            <li><a href="#">Sitemap</a></li>
                        </ul>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="footer-title">
                            <h3>Popular Brands</h3>
                        </div>
                        <ul class="footer-link">
                            <li><a href="#">Maruti Suzuki</a></li>
                            <li><a href="#">Hyundai</a></li>
                            <li><a href="#">Mahindra</a></li>
                            <li><a href="#">Toyota</a></li>
                            <li><a href="#">Tata</a></li>
                            <li><a href="#">Honda</a></li>
                            <li><a href="#">Skoda</a></li>
                            <li><a href="#">Volkswagen</a></li>
                            <li><a href="#">BMW</a></li>
                            <li><a href="#">Mercedes</a></li>
                        </ul>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="footer-title">
                            <h3>Connect with us</h3>
                        </div>
                        <ul class="footer-social-media">
                            <a href="#">
                                <li>
                                    <i class="icofont-facebook"></i>
                                </li>
                            </a>
                            <a href="#">
                                <li>
                                    <i class="icofont-instagram"></i>
                                </li>
                            </a>
                            <a href="#">
                                <li>
                                    <i class="icofont-twitter"></i>
                                </li>
                            </a>
                            <a href="#">
                                <li>
                                    <i class="icofont-linkedin"></i>
                                </li>
                            </a>
                            <a href="#">
                                <li>
                                    <i class="icofont-whatsapp"></i>
                                </li>
                            </a>
                        </ul>
                        <div class="footer-title mt-4">
                            <h3>Download Our App</h3>
                        </div>
                        <div class="footer-app">
                            <a href="#" target="_blank">
                                <img src="<?php echo base_url(); ?>assets/web/images/google-play-store-transparent.png">
                            </a>
                            <a href="#" target="_blank">
                                <img src="<?php echo base_url(); ?>assets/web/images/apple-store.png">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <div class="text-center text-white">
                <p>&copy; Copyright 2022. All Rights Reserved | Product by <a href="https://parastone.in" target="_blank">Parastone</a></p>
            </div>
        </div>
    </footer>
    <!-- JQUERY SCRIPT -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"></script>  -->
    <!-- LOCAL SCRIPT -->
    <script src="<?php echo base_url(); ?>assets/web/js/main.js"></script>
    <!-- BOOTSTRAP SCRIPT -->
    <script src="<?php echo base_url(); ?>assets/web/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- OWL CAROUSEL SCCRIPT -->
    <script src="<?php echo base_url(); ?>assets/web/owl-carousel/dist/owl.carousel.min.js"></script>
    <!--Jquery Validation js start-->
    <script src="<?php echo base_url(); ?>assets/web/js/jquery-validate.js"></script>
    <script src="<?php echo base_url(); ?>assets/web/js/form-validation.js"></script>
    <!--sweet alert js end -->
    <script src="<?php echo base_url(); ?>assets/web/js/sweetalert.min.js"></script>
    <!--ajax js end -->
    <script src="<?php echo base_url(); ?>assets/web/js/ajax-call.js"></script>
    <script type="module">
        // // Import the functions you need from the SDKs you need
        // import { initializeApp } from "https://www.gstatic.com/firebasejs/9.23.0/firebase-app.js";
        // import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.23.0/firebase-analytics.js";
        // // TODO: Add SDKs for Firebase products that you want to use
        // // https://firebase.google.com/docs/web/setup#available-libraries

        // // Your web app's Firebase configuration
        // // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        // const firebaseConfig = {
        //     apiKey: "AIzaSyDCYQzLzweqzN2vjo7E1CW3m9vwtdbdY_g",
        //     authDomain: "wheelpact-81fa9.firebaseapp.com",
        //     projectId: "wheelpact-81fa9",
        //     storageBucket: "wheelpact-81fa9.appspot.com",
        //     messagingSenderId: "900675826823",
        //     appId: "1:900675826823:web:c4c766c1331ca262a9b422",
        //     measurementId: "G-187EW6W5YG"
        // };

        // // Initialize Firebase
        // const app = initializeApp(firebaseConfig);
        // const analytics = getAnalytics(app);
    </script>
</body>

</html>