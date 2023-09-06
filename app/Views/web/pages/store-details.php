<?php $this->extend('web/layout/main-layout'); ?>
<?php $this->section('content'); ?>
    <!-- STORE BANNER SECTION STARTS -->
    <section class="pt-3 pb-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="s-banner-wrapper">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?php echo isset($storeDetails['branch_banner1'])?$storeDetails['branch_banner1']:base_url('assets/admin/src/images/default-img.png'); ?>" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo isset($storeDetails['branch_banner2'])?$storeDetails['branch_banner2']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo isset($storeDetails['branch_banner3'])?$storeDetails['branch_banner3']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="store-logo">
                            <img src="https://cdn.bigboytoyz.com/new-version/assets/images/bbt-mobile-logo1.png">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sbd-wrapper">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">About Us</button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="store-title">
                                            <h4><?php echo isset($storeDetails['name'])?$storeDetails['name']:''; ?></h4>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="store-rating-icon">
                                                <i class="icofont-star"></i>
                                            </div>
                                            <div class="store-rating-count">5.0</div>
                                            <div class="store-reviews">(48 Reviews)</div>
                                        </div>
                                        <div class="vehicle-stock-count">
                                            <h6>146 Vehicles Available</h6>
                                        </div>
                                        <div class="store-brief">
                                            <p><?php echo isset($storeDetails['short_description'])?$storeDetails['short_description']:'short description not available'; ?></p>
                                        </div>
                                        <div class="owner-wrapper">
                                            <h4>Owner</h4>
                                            <div class="d-flex">
                                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8MTd8ODY2MjMwNzF8fGVufDB8fHx8&w=1000&q=80">
                                                <div class="owner-details">
                                                    <h6>Owner Name</h6>
                                                    <div class="d-flex">
                                                        <a href="#">
                                                            <div class="owner-cont-icon">
                                                                <i class="icofont-ui-call"></i>
                                                            </div>
                                                        </a>
                                                        <a href="#">
                                                            <div class="owner-cont-icon">
                                                                <i class="icofont-envelope"></i>
                                                            </div>
                                                        </a>
                                                        <a href="#">
                                                            <div class="owner-cont-icon">
                                                                <i class="icofont-whatsapp"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Services
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="service-title">
                                            <h4>Services We Offer</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="store-serv">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-check"></i>
                                                        <p>Used Car Deals</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="store-serv">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-check"></i>
                                                        <p>Vehicle Insurance</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="store-serv">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-check"></i>
                                                        <p>Car Warranty</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="store-serv">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-check"></i>
                                                        <p>Loan Facility</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="store-serv">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-check"></i>
                                                        <p>Home Test-Drive</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Contact Us
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="contact-call-email">
                                                    <h6>Contact Number</h6>
                                                    <p><a href="#">+91 <?php echo isset($storeDetails['contact_number'])?$storeDetails['contact_number']:'contact number not available'; ?></a></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="contact-call-email">
                                                    <h6>Email Address</h6>
                                                    <p><a href="#"><?php echo isset($storeDetails['email'])?$storeDetails['email']:'email not available'; ?></a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contact-add">
                                            <h6>Our Location</h6>
                                            <p><a href="#"><?php echo isset($storeDetails['address'])?$storeDetails['address']:'address not available'; ?></a></p>
                                        </div>
                                        <div class="contact-title">
                                            <h4>Connect with us</h4>
                                        </div>
                                        <div class="d-flex">
                                            <a href="#">
                                                <div class="cont-social-icon">
                                                    <i class="icofont-facebook"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="cont-social-icon">
                                                    <i class="icofont-instagram"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="cont-social-icon">
                                                    <i class="icofont-twitter"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="cont-social-icon">
                                                    <i class="icofont-whatsapp"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- STORE BANNER SECTION ENDS -->

    <!-- CARS ON SALE SECTION STARTS -->
    <section class="section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="section-title mb-4">
                        <h3>Cars On Sale (<?php echo isset($onSaleVehicles)?count($onSaleVehicles):0; ?>)</h3>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-end">
                        <button class="dg-brand-btn">View All</button>
                    </div>
                </div>
            </div>

            <div class="carousel-wrapper mt-3">
                <div id="store-sale-carousel" class="owl-carousel owl-theme">
                    <?php foreach ($onSaleVehicles as $vehicle) : ?>
                    <div class="item">
                        <div class="vehicle-wrapper">
                            <a href="<?php echo base_url('vehicle-details/'.$vehicle['encrypted_id']); ?>">
                                <img src="<?php echo isset($storeDetails['thumbnail_url'])?$storeDetails['thumbnail_url']:base_url('assets/admin/src/images/default-img.png'); ?>">
                            </a>

                            <div class="vehicle-offer-badge">
                                <h6><i class="icofont-sale-discount"></i>₹3,00,000 off</h6>
                            </div>

                            <div class="vehicle-wrapper-title">
                                <a href="<?php echo base_url('vehicle-details/'.$vehicle['encrypted_id']); ?>">
                                    <h5><?php echo isset($vehicle['makeName'])?$vehicle['makeName']:'Brand Name'; ?> <?php echo isset($vehicle['makeModelName'])?$vehicle['makeModelName']:'Model Name'; ?></h5>
                                </a>
                            </div>
                            <div class="d-flex vehicle-overview">
                                <div class="overview-badge">
                                    <h6>Year</h6>
                                    <h5><?php echo isset($vehicle['manufacture_year'])?$vehicle['manufacture_year']:''; ?></h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Driven</h6>
                                    <h5><?php echo isset($vehicle['kms_driven'])?$vehicle['kms_driven']:''; ?>km</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Fuel Type</h6>
                                    <h5><?php echo isset($vehicle['fuelTypeName'])?$vehicle['fuelTypeName']:'NA'; ?></h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Owner</h6>
                                    <?php 
                                    if(isset($vehicle['owner']) && !empty($vehicle['owner'])){
                                        if($vehicle['owner']==1){
                                            echo '<h5>1st</h5>';
                                        }elseif($vehicle['owner']==2){
                                            echo '<h5>2nd</h5>';
                                        }elseif($vehicle['owner']==3){
                                            echo '<h5>3rd</h5>';
                                        }elseif($vehicle['owner']==4){
                                            echo '<h5>3+ Owner</h5>';
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="wishlist">
                                    <span class="addRemoveVehicleWhishlistSpan_<?php echo $vehicle['id']; ?>">
                                        <?php if(isset($vehicle['wishlist_status']) && !empty($vehicle['wishlist_status'])){ ?>
                                            <?php if($vehicle['wishlist_status']==1){ ?>
                                                <i class="icofont-heart press" data-customerid="<?php echo isset($customerData['id'])?$customerData['id']:0; ?>" data-vehicleid="<?php echo isset($vehicle['id'])?$vehicle['id']:0; ?>" data-operation="remove" data-actionurl="<?php echo base_url('/api/remove-vehicle-wishlist'); ?>"></i>
                                            <?php }else{ ?>
                                                <i class="icofont-heart" data-customerid="<?php echo isset($customerData['id'])?$customerData['id']:0; ?>" data-vehicleid="<?php echo isset($vehicle['id'])?$vehicle['id']:0; ?>" data-operation="add" data-actionurl="<?php echo base_url('/api/add-vehicle-wishlist'); ?>"></i>
                                            <?php } ?>
                                        <?php }else{ ?>
                                            <i class="icofont-heart" data-customerid="<?php echo isset($customerData['id'])?$customerData['id']:0; ?>" data-vehicleid="<?php echo isset($vehicle['id'])?$vehicle['id']:0; ?>" data-operation="add" data-actionurl="<?php echo base_url('/api/add-vehicle-wishlist'); ?>"></i>
                                        <?php } ?>
                                    </span>
                                </div>
                            </div>
                            <div class="vehicle-price d-flex align-items-center">
                                <h5>₹<?php echo isset($vehicle['price'])?$vehicle['price']:''; ?></h5>
                                <h6>(<?php if(isset($vehicle['pricing_type']) && !empty($vehicle['pricing_type'])){ if($vehicle['pricing_type']==1){echo'Fixed';}elseif($vehicle['pricing_type']==2){echo'Negotiable';} }else{echo 'NA';} ?>)</h6>
                            </div>
                            <p class="vehicle-strike-price">₹38,00,000</p>
                            <div class="vehicle-emi d-flex">
                                <h6>EMI from</h6>
                                <h6><?php echo isset($vehicle['monthly_emi'])?$vehicle['monthly_emi']:'0.0'; ?>/month</h6>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- CARS ON SALE SECTION ENDS -->

    <!-- STORE FEATURED SECTION STARTS -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="section-title mb-4">
                        <h3>Featured Cars (40)</h3>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-end">
                        <button class="dg-brand-btn">View All</button>
                    </div>
                </div>
            </div>

            <div class="carousel-wrapper mt-3">
                <div id="store-featured-carousel" class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="vehicle-wrapper">
                            <a href="#">
                                <img
                                    src="https://cdn.bigboytoyz.com/new-version/products/mercedes-gle300d-white-7077.jpg">
                            </a>

                            <div class="vehicle-wrapper-title">
                                <a href="#">
                                    <h5>Mercedes-Benz GLE</h5>
                                </a>
                            </div>
                            <div class="d-flex vehicle-overview">
                                <div class="overview-badge">
                                    <h6>Year</h6>
                                    <h5>2021</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Driven</h6>
                                    <h5>50,000km</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Fuel Type</h6>
                                    <h5>Diesel</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Owner</h6>
                                    <h5>1st</h5>
                                </div>

                                <div class="wishlist">
                                    <i class="icofont-heart"></i>
                                </div>
                            </div>
                            <div class="vehicle-price d-flex align-items-center">
                                <h5>₹56,00,0000</h5>
                                <h6>(Negotiable)</h6>
                            </div>
                            <div class="vehicle-emi d-flex">
                                <h6>EMI from</h6>
                                <h6>40,000/month</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <a href="#">
                            <div class="vehicle-wrapper">
                                <a href="#">
                                    <img
                                        src="https://cdn.bigboytoyz.com/new-version/products/porsche718boxsteryellow-1.jpg">
                                </a>
                                <div class="vehicle-wrapper-title">
                                    <a href="#">
                                        <h5>Porsche Panamera</h5>
                                    </a>
                                </div>
                                <div class="d-flex vehicle-overview">
                                    <div class="overview-badge">
                                        <h6>Year</h6>
                                        <h5>2021</h5>
                                    </div>

                                    <div class="overview-badge">
                                        <h6>Driven</h6>
                                        <h5>20,000km</h5>
                                    </div>

                                    <div class="overview-badge">
                                        <h6>Fuel Type</h6>
                                        <h5>Petrol</h5>
                                    </div>

                                    <div class="overview-badge">
                                        <h6>Owner</h6>
                                        <h5>1st</h5>
                                    </div>
                                </div>

                                <div class="wishlist">
                                    <i class="icofont-heart"></i>
                                </div>

                                <div class="vehicle-price d-flex align-items-center">
                                    <h5>₹32,00,0000</h5>
                                    <h6>(Fixed Price)</h6>
                                </div>
                                <div class="vehicle-emi d-flex">
                                    <h6>EMI from</h6>
                                    <h6>23,000/month</h6>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="item">
                        <div class="vehicle-wrapper">
                            <a href="#">
                                <img
                                    src="https://cdn.bigboytoyz.com/new-version/products/mercedes-gle300d-white-7077.jpg">
                            </a>
                            <div class="vehicle-wrapper-title">
                                <a href="#">
                                    <h5>Mercedes-Benz GLE</h5>
                                </a>
                            </div>
                            <div class="d-flex vehicle-overview">
                                <div class="overview-badge">
                                    <h6>Year</h6>
                                    <h5>2021</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Driven</h6>
                                    <h5>50,000km</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Fuel Type</h6>
                                    <h5>Diesel</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Owner</h6>
                                    <h5>1st</h5>
                                </div>
                            </div>

                            <div class="wishlist">
                                <i class="icofont-heart"></i>
                            </div>

                            <div class="vehicle-price d-flex align-items-center">
                                <h5>₹56,00,0000</h5>
                                <h6>(Negotiable)</h6>
                            </div>
                            <div class="vehicle-emi d-flex">
                                <h6>EMI from</h6>
                                <h6>40,000/month</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="vehicle-wrapper">
                            <a href="#">
                                <img
                                    src="https://cdn.bigboytoyz.com/new-version/products/porsche718boxsteryellow-1.jpg">
                            </a>

                            <div class="vehicle-wrapper-title">
                                <a href="#">
                                    <h5>Porsche Panamera</h5>
                                </a>
                            </div>
                            <div class="d-flex vehicle-overview">
                                <div class="overview-badge">
                                    <h6>Year</h6>
                                    <h5>2021</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Driven</h6>
                                    <h5>20,000km</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Fuel Type</h6>
                                    <h5>Petrol</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Owner</h6>
                                    <h5>1st</h5>
                                </div>
                            </div>

                            <div class="wishlist">
                                <i class="icofont-heart"></i>
                            </div>

                            <div class="vehicle-price d-flex align-items-center">
                                <h5>₹32,00,0000</h5>
                                <h6>(Fixed Price)</h6>
                            </div>
                            <div class="vehicle-emi d-flex">
                                <h6>EMI from</h6>
                                <h6>23,000/month</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- STORE FEATURED SECTION END -->

    <!-- STORE LATEST SECTION STARTS -->
    <section class="section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="section-title mb-4">
                        <h3>Our Collection (146)</h3>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-end">
                        <button class="dg-brand-btn">View All</button>
                    </div>
                </div>
            </div>

            <div class="carousel-wrapper mt-3">
                <div id="store-collection-carousel" class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="vehicle-wrapper">
                            <a href="#">
                                <img
                                    src="https://cdn.bigboytoyz.com/new-version/products/mercedes-gle300d-white-7077.jpg">
                            </a>

                            <div class="vehicle-wrapper-title">
                                <a href="#">
                                    <h5>Mercedes-Benz GLE</h5>
                                </a>
                            </div>
                            <div class="d-flex vehicle-overview">
                                <div class="overview-badge">
                                    <h6>Year</h6>
                                    <h5>2021</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Driven</h6>
                                    <h5>50,000km</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Fuel Type</h6>
                                    <h5>Diesel</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Owner</h6>
                                    <h5>1st</h5>
                                </div>

                                <div class="wishlist">
                                    <i class="icofont-heart"></i>
                                </div>
                            </div>
                            <div class="vehicle-price d-flex align-items-center">
                                <h5>₹56,00,0000</h5>
                                <h6>(Negotiable)</h6>
                            </div>
                            <div class="vehicle-emi d-flex">
                                <h6>EMI from</h6>
                                <h6>40,000/month</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <a href="#">
                            <div class="vehicle-wrapper">
                                <a href="#">
                                    <img
                                        src="https://cdn.bigboytoyz.com/new-version/products/porsche718boxsteryellow-1.jpg">
                                </a>
                                <div class="vehicle-wrapper-title">
                                    <a href="#">
                                        <h5>Porsche Panamera</h5>
                                    </a>
                                </div>
                                <div class="d-flex vehicle-overview">
                                    <div class="overview-badge">
                                        <h6>Year</h6>
                                        <h5>2021</h5>
                                    </div>

                                    <div class="overview-badge">
                                        <h6>Driven</h6>
                                        <h5>20,000km</h5>
                                    </div>

                                    <div class="overview-badge">
                                        <h6>Fuel Type</h6>
                                        <h5>Petrol</h5>
                                    </div>

                                    <div class="overview-badge">
                                        <h6>Owner</h6>
                                        <h5>1st</h5>
                                    </div>
                                </div>

                                <div class="wishlist">
                                    <i class="icofont-heart"></i>
                                </div>

                                <div class="vehicle-price d-flex align-items-center">
                                    <h5>₹32,00,0000</h5>
                                    <h6>(Fixed Price)</h6>
                                </div>
                                <div class="vehicle-emi d-flex">
                                    <h6>EMI from</h6>
                                    <h6>23,000/month</h6>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="item">
                        <div class="vehicle-wrapper">
                            <a href="#">
                                <img
                                    src="https://cdn.bigboytoyz.com/new-version/products/mercedes-gle300d-white-7077.jpg">
                            </a>
                            <div class="vehicle-wrapper-title">
                                <a href="#">
                                    <h5>Mercedes-Benz GLE</h5>
                                </a>
                            </div>
                            <div class="d-flex vehicle-overview">
                                <div class="overview-badge">
                                    <h6>Year</h6>
                                    <h5>2021</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Driven</h6>
                                    <h5>50,000km</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Fuel Type</h6>
                                    <h5>Diesel</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Owner</h6>
                                    <h5>1st</h5>
                                </div>
                            </div>

                            <div class="wishlist">
                                <i class="icofont-heart"></i>
                            </div>

                            <div class="vehicle-price d-flex align-items-center">
                                <h5>₹56,00,0000</h5>
                                <h6>(Negotiable)</h6>
                            </div>
                            <div class="vehicle-emi d-flex">
                                <h6>EMI from</h6>
                                <h6>40,000/month</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="vehicle-wrapper">
                            <a href="#">
                                <img
                                    src="https://cdn.bigboytoyz.com/new-version/products/porsche718boxsteryellow-1.jpg">
                            </a>

                            <div class="vehicle-wrapper-title">
                                <a href="#">
                                    <h5>Porsche Panamera</h5>
                                </a>
                            </div>
                            <div class="d-flex vehicle-overview">
                                <div class="overview-badge">
                                    <h6>Year</h6>
                                    <h5>2021</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Driven</h6>
                                    <h5>20,000km</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Fuel Type</h6>
                                    <h5>Petrol</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Owner</h6>
                                    <h5>1st</h5>
                                </div>
                            </div>

                            <div class="wishlist">
                                <i class="icofont-heart"></i>
                            </div>

                            <div class="vehicle-price d-flex align-items-center">
                                <h5>₹32,00,0000</h5>
                                <h6>(Fixed Price)</h6>
                            </div>
                            <div class="vehicle-emi d-flex">
                                <h6>EMI from</h6>
                                <h6>23,000/month</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- STORE LATEST SECTION ENDS -->

    <!-- STORE BRAND SECTION STARTS -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="section-title mb-4">
                        <h3>Brands in Store</h3>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-end">
                        <button class="dg-brand-btn">View All</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="brand-wrapper">
                            <img
                                src="https://www.mahindra.com/assets/cms-images/news-room/resources/images/logos/download/mahindra-sport-utility-vehicle/mahindra-sport-utility-vehicle-hd.png">
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="brand-wrapper">
                            <img src="https://1000logos.net/wp-content/uploads/2022/08/Maruti-Suzuki-Logo-2000.png">
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="brand-wrapper">
                            <img src="https://1000logos.net/wp-content/uploads/2018/04/Hyundai-logo.png">
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="brand-wrapper">
                            <img
                                src="https://www.freepnglogos.com/uploads/toyota-logo-png/toyota-logos-brands-logotypes-0.png">
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="brand-wrapper">
                            <img
                                src="https://www.freepnglogos.com/uploads/toyota-logo-png/toyota-logos-brands-logotypes-0.png">
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="brand-wrapper">
                            <img
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/BMW.svg/2048px-BMW.svg.png">
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="brand-wrapper">
                            <img
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Mercedes-Logo.svg/800px-Mercedes-Logo.svg.png">
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="brand-wrapper">
                            <img src="https://i.pinimg.com/originals/41/7f/11/417f11936859a8d4b561fecdd10f37e4.png">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- STORE BRAND SECTION ENDS -->

    <!-- STORE LOCATION STARTS -->
    <section class="section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-6">
                            <div class="section-title mb-4">
                                <h3>Reviews</h3>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <button class="dg-brand-btn" data-bs-target="#writeReviewModal"
                                    data-bs-toggle="modal">Write a Review</button>
                            </div>
                        </div>
                    </div>

                    <div class="review-block">
                        <img
                            src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8MTd8ODY2MjMwNzF8fGVufDB8fHx8&w=1000&q=80">
                        <div class="review-detail">
                            <h6>Reviewer Name</h6>
                            <div class="review-rating">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="store-rating-icon">
                                        <i class="icofont-star"></i>
                                    </div>
                                    <div class="store-rating-count">5.0</div>
                                </div>
                            </div>
                            <p class="main-review">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.</p>
                        </div>
                    </div>

                    <div class="review-block">
                        <img
                            src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8MTd8ODY2MjMwNzF8fGVufDB8fHx8&w=1000&q=80">
                        <div class="review-detail">
                            <h6>Reviewer Name</h6>
                            <div class="review-rating">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="store-rating-icon">
                                        <i class="icofont-star"></i>
                                    </div>
                                    <div class="store-rating-count">5.0</div>
                                </div>
                            </div>
                            <p class="main-review">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.</p>
                        </div>
                    </div>

                    <div class="review-block">
                        <img
                            src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8MTd8ODY2MjMwNzF8fGVufDB8fHx8&w=1000&q=80">
                        <div class="review-detail">
                            <h6>Reviewer Name</h6>
                            <div class="review-rating">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="store-rating-icon">
                                        <i class="icofont-star"></i>
                                    </div>
                                    <div class="store-rating-count">5.0</div>
                                </div>
                            </div>
                            <p class="main-review">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.</p>
                        </div>
                    </div>

                    <div class="all-reviews-link">
                        <a href="#" data-bs-target="#viewAllReviewModal" data-bs-toggle="modal">View All Reviews <i
                                class="icofont-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="store-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15079.34836577764!2d72.8506702!3d19.1148014!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x950293b22cb93249!2sBig%20Boy%20Toyz!5e0!3m2!1sen!2sin!4v1665144015913!5m2!1sen!2sin"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- STORE LOCAION ENDS -->

    <!-- DELIVERIES SECTION STARTS -->
    <section>
        <div class="container">
            <div class="section-title mb-4">
                <h3>Our Deliveries</h3>
            </div>
            <div id="store-deliveries-carousel" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="deliveries-wrapper">
                        <img
                            src="https://i0.wp.com/gomechanic.in/blog/wp-content/uploads/2019/11/Volkswagen-inaugurates-new-showroom-in-Mumbai-2.jpg?resize=586%2C461&ssl=1">
                    </div>
                </div>

                <div class="item">
                    <div class="deliveries-wrapper">
                        <img
                            src="https://www.team-bhp.com/sites/default/files/styles/check_tech_stuff_hover/public/1_2%20picture%20of%20delivery.jpg">
                    </div>
                </div>

                <div class="item">
                    <div class="deliveries-wrapper">
                        <img
                            src="https://i0.wp.com/uandiautomobiles.com/wp-content/uploads/2021/03/WhatsApp-Image-2021-03-06-at-18.29.07.jpeg?fit=1280%2C960&ssl=1">
                    </div>
                </div>

                <div class="item">
                    <div class="deliveries-wrapper">
                        <img src="https://stat.overdrive.in/wp-content/uploads/2017/09/car-delivery-2.jpg">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- DELIVERIS SECTION ENDS -->

<?= $this->endSection() ?>