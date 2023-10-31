<?php
/**
 * @var \CodeIgniter\View\View $this
 */
?>
<?php $this->extend('web/layout/main-layout'); ?>
<?php $this->section('content'); ?>
    <!-- HERO SECTION STARTS -->
    <section class="section-spacing banner-section position-relative">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="banner-text">
                        <h2>Find the right car or bike</h2>
                        <h1>Guaranteed</h1>
                    </div>
                    <div class="banner-para mt-3 mb-3">
                        <p>Thoroughly inspected, fully assured cars and bikes,</p>
                        <p>Your search ends here.</p>
                    </div>
                    <div class="banner-search">
                        <ul class="nav nav-pills mb-3 banner-filter-pills" id="pills-tab" role="tablist">
                            <li class="nav-item banner-filter-item" role="presentation">
                                <button class="nav-link banner-filter-link <?php echo isset($vtype) && $vtype==1?'active':''; ?>" id="pills-cars-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-cars" type="button" role="tab"
                                    aria-controls="pills-cars" aria-selected="true" data-vtype="1">Cars</button>
                            </li>
                            <li class="nav-item banner-filter-item" role="presentation">
                                <button class="nav-link banner-filter-link <?php echo isset($vtype) && $vtype==2?'active':''; ?>" id="pills-bikes-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-bikes" type="button" role="tab" aria-controls="pills-bikes"
                                    aria-selected="false" data-vtype="2">Bikes</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade <?php echo isset($vtype) && $vtype==1?'show active':''; ?>" id="pills-cars" role="tabpanel"
                                aria-labelledby="pills-cars-tab">
                                <div class="input-group mb-3">
                                    <input type="text" class="brand-input form-control" placeholder="Search your Car">
                                    <button class="search-brand-btn" type="button">Search</button>
                                </div>
                                <div class="browse-link">
                                    <a href="#">Browse All Cars <i class="icofont-long-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="tab-pane fade <?php echo isset($vtype) && $vtype==2?'show active':''; ?>" id="pills-bikes" role="tabpanel"
                                aria-labelledby="pills-bikes-tab">
                                <div class="input-group mb-3">
                                    <input type="text" class="brand-input form-control" placeholder="Search your Bike">
                                    <button class="dg-brand-btn" type="button">Search</button>
                                </div>
                                <div class="browse-link">
                                    <a href="#">Browse All Bikes <i class="icofont-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="app-link d-flex mt-2 mb-2">
                            <a href="#">
                                <img src="<?php echo base_url(); ?>assets/web/images/google-play-store-transparent.png">
                            </a>
                            <a href="#">
                                <img src="<?php echo base_url(); ?>assets/web/images/apple-store.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banner-img">
                        <img class="img-fluid" src="<?php echo base_url(); ?>assets/web/images/banner-image.jpg">
                    </div>
                </div>
            </div>
        </div>

        <div class="custom-shape-divider-bottom-1664354376">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path d="M892.25 114.72L0 0 0 120 1200 120 1200 0 892.25 114.72z" class="shape-fill"></path>
            </svg>
        </div>
    </section>
    <!-- HERO SECTION ENDS -->

    <!-- BENEFITS SECTION STARTS -->
    <section class="section-spacing">
        <div class="container">
            <div class="section-title mb-4">
                <h3>Why Wheelpact?</h3>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="benefits-wrapper">
                        <div class="benefits-icon mb-3">
                            <i class="icofont-badge"></i>
                        </div>
                        <h4>Assured Warranty</h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="benefits-wrapper">
                        <div class="benefits-icon mb-3">
                            <i class="icofont-shield"></i>
                        </div>
                        <h4>Inspected Vehicles</h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="benefits-wrapper">
                        <div class="benefits-icon mb-3">
                            <i class="icofont-bank"></i>
                        </div>
                        <h4>Easy Finance</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BENEFITS SECTION ENDS -->

    <!-- POPULAR STORE SECTION STARTS -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="section-title mb-4">
                        <h3>Popular Stores</h3>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-end">
                        <a href="<?php echo base_url('view-all-stores'); ?>" class="dg-brand-btn">Browse All Stores</a>
                    </div>
                </div>
            </div>
            <div class="carousel-wrapper mt-3">
                <div id="popular-carWrapper-carousel" class="owl-carousel owl-theme">
                    <?php 
                    if(isset($popularStores) && !empty($popularStores)){ 
                        foreach($popularStores as $store){
                    ?>
                    <div class="item">
                        <a href="<?php echo base_url('store-details/'.$store['encrypted_id']); ?>">
                            <div class="store-wrapper">
                                <img src="<?php echo isset($store['branch_thumbnail']) && !empty($store['branch_thumbnail'])?$store['branch_thumbnail']:base_url('assets/admin/src/images/default-img.png'); ?>">
                                <div class="store-details-box">
                                    <div class="store-wrapper-title">
                                        <h5><?php echo isset($store['name'])?$store['name']:'Store Name'; ?></h5>
                                    </div>
                                    <div class="store-car-count">
                                        <h6><?php echo isset($store['vehicle_count'])?$store['vehicle_count']:0; ?> Vehicles Available</h6>
                                    </div>
                                    <div class="d-flex store-location">
                                        <i class="icofont-pin"></i>
                                        <h6><?php echo isset($store['address'])?$store['address']:'address'; ?></h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="store-rating-icon">
                                            <i class="icofont-star"></i>
                                        </div>
                                        <div class="store-rating-count"><?php echo isset($store['avg_rating'])?number_format($store['avg_rating'], 2):'0.0'; ?></div>
                                        <div class="store-reviews">(<?php echo isset($store['review_count'])?$store['review_count']:0; ?> Reviews)</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- POPULAR STORE SECTION ENDS -->

    <!-- FEATURED SECTION STARTS -->
    <section class="section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="section-title mb-4">
                        <h3>Featured Vehicles</h3>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-end">
                        <a href="<?php echo base_url('view-all-featured-vehicles'); ?>" class="dg-brand-btn">View All</a>
                    </div>
                </div>
            </div>
            <div class="carousel-wrapper mt-3">
                <div id="featured-carWrapper-carousel" class="owl-carousel owl-theme">
                    <?php foreach ($featuredVehicles as $vehicle) : ?>
                    <div class="item">
                        <div class="vehicle-wrapper">
                            <a href="<?php echo base_url('vehicle-details/'.$vehicle['encrypted_id']); ?>">
                                <img src="<?php echo isset($vehicle['thumbnail_url']) && !empty($vehicle['thumbnail_url'])?$vehicle['thumbnail_url']:base_url('assets/admin/src/images/default-img.png'); ?>">
                            </a>
                            <div class="vehicle-wrapper-title">
                                <a href="<?php echo base_url('vehicle-details/'.$vehicle['encrypted_id']); ?>">
                                    <h5><?php echo isset($vehicle['makeName'])?$vehicle['makeName']:'Brand Name'; ?>, <?php echo isset($vehicle['makeModelName'])?$vehicle['makeModelName']:'Model Name'; ?></h5>
                                </a>
                            </div>
                            <div class="d-flex vehicle-overview">
                                <div class="overview-badge">
                                    <h6>Year</h6>
                                    <h5><?php echo isset($vehicle['manufacture_year'])?$vehicle['manufacture_year']:''; ?></h5>
                                </div>
                                <div class="overview-badge">
                                    <h6>Driven</h6>
                                    <h5><?php echo isset($vehicle['kms_driven'])?number_format($vehicle['kms_driven'], 0, '.', ','):''; ?>km</h5>
                                </div>
                                <div class="overview-badge">
                                    <h6>Fuel Type</h6>
                                    <?php echo isset($vehicle['fuelTypeName'])?$vehicle['fuelTypeName']:'NA'; ?>
                                </div>
                                <div class="overview-badge">
                                    <h6>Owner</h6>
                                    <?php 
                                    if(isset($vehicle['owner']) && !empty($vehicle['owner'])){
                                        if($vehicle['owner']==1){
                                            echo '<h6>1st</h6>';
                                        }elseif($vehicle['owner']==2){
                                            echo '<h6>2nd</h6>';
                                        }elseif($vehicle['owner']==3){
                                            echo '<h6>3rd</h6>';
                                        }elseif($vehicle['owner']==4){
                                            echo '<h6>3+ Owner</h6>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="wishlist">
                                    <span class="addRemoveVehicleWhishlistSpan_<?php echo $vehicle['id']; ?>">
                                        <?php if(isset($vehicle['wishlist_status']) && !empty($vehicle['wishlist_status'])){ ?>
                                            <?php if($vehicle['wishlist_status']==1){ ?>
                                                <i class="icofont-heart press" data-customerid="<?php echo isset($customerData['id'])?$customerData['id']:0; ?>" data-vehicleid="<?php echo isset($vehicle['id'])?$vehicle['id']:0; ?>" data-operation="remove" data-actionurl="<?php echo base_url('/api/customer/remove-vehicle-wishlist'); ?>"></i>
                                            <?php }else{ ?>
                                                <i class="icofont-heart" data-customerid="<?php echo isset($customerData['id'])?$customerData['id']:0; ?>" data-vehicleid="<?php echo isset($vehicle['id'])?$vehicle['id']:0; ?>" data-operation="add" data-actionurl="<?php echo base_url('/api/customer/add-vehicle-wishlist'); ?>"></i>
                                            <?php } ?>
                                        <?php }else{ ?>
                                            <i class="icofont-heart" data-customerid="<?php echo isset($customerData['id'])?$customerData['id']:0; ?>" data-vehicleid="<?php echo isset($vehicle['id'])?$vehicle['id']:0; ?>" data-operation="add" data-actionurl="<?php echo base_url('/api/customer/add-vehicle-wishlist'); ?>"></i>
                                        <?php } ?>
                                    </span>
                                </div>
                                <div class="verified-tag">
                                    <span class="verification-badge"><i class="icofont-check-circled"></i> Verified Seller</span>
                                </div>
                            </div>
                            <div class="vehicle-price d-flex align-items-center">
                                <h5>₹<?php echo isset($vehicle['selling_price'])?number_format($vehicle['selling_price'], 0, '.', ','):''; ?></h5>
                                <h6>(<?php if(isset($vehicle['pricing_type']) && !empty($vehicle['pricing_type'])){ if($vehicle['pricing_type']==1){echo'Fixed';}elseif($vehicle['pricing_type']==2){echo'Negotiable';} }else{echo 'NA';} ?>)</h6>
                            </div>
                            <div class="vehicle-emi d-flex">
                                <h6>EMI from</h6>
                                <h6><?php echo isset($vehicle['monthly_emi'])?number_format($vehicle['monthly_emi'], 0, '.', ','):'0.0'; ?>/month</h6>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- FEATURED SECTION END -->

    <!-- LATEST SECTION STARTS -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="section-title mb-4">
                        <h3>Latest Additions</h3>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-end">
                        <a href="<?php echo base_url('view-all-latest-addition-vehicles'); ?>" class="dg-brand-btn">View All</a>
                    </div>
                </div>
            </div>
            <div class="carousel-wrapper mt-3">
                <div id="latest-carWrapper-carousel" class="owl-carousel owl-theme">
                    <?php foreach ($latestVehicleAdditions as $vehicle) : ?>
                    <div class="item">
                        <div class="vehicle-wrapper">
                            <a href="<?php echo base_url('vehicle-details/'.$vehicle['encrypted_id']); ?>">
                                <img src="<?php echo isset($vehicle['thumbnail_url']) && !empty($vehicle['thumbnail_url'])?$vehicle['thumbnail_url']:base_url('assets/admin/src/images/default-img.png'); ?>">
                            </a>
                            <div class="vehicle-wrapper-title">
                                <a href="<?php echo base_url('vehicle-details/'.$vehicle['encrypted_id']); ?>">
                                    <h5><?php echo isset($vehicle['makeName'])?$vehicle['makeName']:'Brand Name'; ?>, <?php echo isset($vehicle['makeModelName'])?$vehicle['makeModelName']:'Model Name'; ?></h5>
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
                                    <?php echo isset($vehicle['fuelTypeName'])?$vehicle['fuelTypeName']:'NA'; ?>
                                </div>
                                <div class="overview-badge">
                                    <h6>Owner</h6>
                                    <?php 
                                    if(isset($vehicle['owner']) && !empty($vehicle['owner'])){
                                        if($vehicle['owner']==1){
                                            echo '<h6>1st</h6>';
                                        }elseif($vehicle['owner']==2){
                                            echo '<h6>2nd</h6>';
                                        }elseif($vehicle['owner']==3){
                                            echo '<h6>3rd</h6>';
                                        }elseif($vehicle['owner']==4){
                                            echo '<h6>3+ Owner</h6>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="wishlist">
                                    <span class="addRemoveVehicleWhishlistSpan_<?php echo $vehicle['id']; ?>">
                                        <?php if(isset($vehicle['wishlist_status']) && !empty($vehicle['wishlist_status'])){ ?>
                                            <?php if($vehicle['wishlist_status']==1){ ?>
                                                <i class="icofont-heart press" data-customerid="<?php echo isset($customerData['id'])?$customerData['id']:0; ?>" data-vehicleid="<?php echo isset($vehicle['id'])?$vehicle['id']:0; ?>" data-operation="remove" data-actionurl="<?php echo base_url('/api/customer/remove-vehicle-wishlist'); ?>"></i>
                                            <?php }else{ ?>
                                                <i class="icofont-heart" data-customerid="<?php echo isset($customerData['id'])?$customerData['id']:0; ?>" data-vehicleid="<?php echo isset($vehicle['id'])?$vehicle['id']:0; ?>" data-operation="add" data-actionurl="<?php echo base_url('/api/customer/add-vehicle-wishlist'); ?>"></i>
                                            <?php } ?>
                                        <?php }else{ ?>
                                            <i class="icofont-heart" data-customerid="<?php echo isset($customerData['id'])?$customerData['id']:0; ?>" data-vehicleid="<?php echo isset($vehicle['id'])?$vehicle['id']:0; ?>" data-operation="add" data-actionurl="<?php echo base_url('/api/customer/add-vehicle-wishlist'); ?>"></i>
                                        <?php } ?>
                                    </span>
                                </div>
                                <div class="verified-tag">
                                    <span class="verification-badge"><i class="icofont-check-circled"></i> Verified Seller</span>
                                </div>
                            </div>
                            <div class="vehicle-price d-flex align-items-center">
                                <h5>₹<?php echo isset($vehicle['selling_price'])?number_format($vehicle['selling_price'], 0, '.', ','):''; ?></h5>
                                <h6>(<?php if(isset($vehicle['pricing_type']) && !empty($vehicle['pricing_type'])){ if($vehicle['pricing_type']==1){echo'Fixed';}elseif($vehicle['pricing_type']==2){echo'Negotiable';} }else{echo 'NA';} ?>)</h6>
                            </div>
                            <div class="vehicle-emi d-flex">
                                <h6>EMI from</h6>
                                <h6><?php echo isset($vehicle['monthly_emi'])?number_format($vehicle['monthly_emi'], 0, '.', ','):'0.0'; ?>/month</h6>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- FEATURED SECTION END -->

    <!-- LATEST SECTION STARTS -->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="section-title mb-4">
                        <h3>Latest Additions</h3>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-end">
                        <a href="<?php echo base_url('view-all-latest-addition-vehicles'); ?>" class="dg-brand-btn">View All</a>
                    </div>
                </div>
            </div>

            <div class="carousel-wrapper mt-3">
                <div id="latest-carWrapper-carousel" class="owl-carousel owl-theme">
                    
                <?php foreach ($latestVehicleAdditions as $vehicle) : ?>
                    <div class="item">
                        <div class="vehicle-wrapper">
                            <a href="<?php echo base_url('vehicle-details/'.$vehicle['encrypted_id']); ?>">
                                <img src="<?php echo isset($vehicle['thumbnail_url']) && !empty($vehicle['thumbnail_url'])?$vehicle['thumbnail_url']:base_url('assets/admin/src/images/default-img.png'); ?>">
                            </a>
                            <div class="vehicle-wrapper-title">
                                <a href="<?php echo base_url('vehicle-details/'.$vehicle['encrypted_id']); ?>">
                                    <h5><?php echo isset($vehicle['makeName'])?$vehicle['makeName']:'Brand Name'; ?>, <?php echo isset($vehicle['makeModelName'])?$vehicle['makeModelName']:'Model Name'; ?></h5>
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
                                    <?php echo isset($vehicle['fuelTypeName'])?$vehicle['fuelTypeName']:'NA'; ?>
                                </div>
                                <div class="overview-badge">
                                    <h6>Owner</h6>
                                    <?php 
                                    if(isset($vehicle['owner']) && !empty($vehicle['owner'])){
                                        if($vehicle['owner']==1){
                                            echo '<h6>1st</h6>';
                                        }elseif($vehicle['owner']==2){
                                            echo '<h6>2nd</h6>';
                                        }elseif($vehicle['owner']==3){
                                            echo '<h6>3rd</h6>';
                                        }elseif($vehicle['owner']==4){
                                            echo '<h6>3+ Owner</h6>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="wishlist">
                                    <span class="addRemoveVehicleWhishlistSpan_<?php echo $vehicle['id']; ?>">
                                        <?php if(isset($vehicle['wishlist_status']) && !empty($vehicle['wishlist_status'])){ ?>
                                            <?php if($vehicle['wishlist_status']==1){ ?>
                                                <i class="icofont-heart press" data-customerid="<?php echo isset($customerData['id'])?$customerData['id']:0; ?>" data-vehicleid="<?php echo isset($vehicle['id'])?$vehicle['id']:0; ?>" data-operation="remove" data-actionurl="<?php echo base_url('/api/customer/remove-vehicle-wishlist'); ?>"></i>
                                            <?php }else{ ?>
                                                <i class="icofont-heart" data-customerid="<?php echo isset($customerData['id'])?$customerData['id']:0; ?>" data-vehicleid="<?php echo isset($vehicle['id'])?$vehicle['id']:0; ?>" data-operation="add" data-actionurl="<?php echo base_url('/api/customer/add-vehicle-wishlist'); ?>"></i>
                                            <?php } ?>
                                        <?php }else{ ?>
                                            <i class="icofont-heart" data-customerid="<?php echo isset($customerData['id'])?$customerData['id']:0; ?>" data-vehicleid="<?php echo isset($vehicle['id'])?$vehicle['id']:0; ?>" data-operation="add" data-actionurl="<?php echo base_url('/api/customer/add-vehicle-wishlist'); ?>"></i>
                                        <?php } ?>
                                    </span>
                                </div>
                                <div class="verified-tag">
                                    <span class="verification-badge"><i class="icofont-check-circled"></i> Verified Seller</span>
                                </div>
                            </div>
                            <div class="vehicle-price d-flex align-items-center">
                                <h5>₹<?php echo isset($vehicle['selling_price'])?number_format($vehicle['selling_price'], 0, '.', ','):''; ?></h5>
                                <h6>(<?php if(isset($vehicle['pricing_type']) && !empty($vehicle['pricing_type'])){ if($vehicle['pricing_type']==1){echo'Fixed';}elseif($vehicle['pricing_type']==2){echo'Negotiable';} }else{echo 'NA';} ?>)</h6>
                            </div>
                            <div class="vehicle-emi d-flex">
                                <h6>EMI from</h6>
                                <h6><?php echo isset($vehicle['monthly_emi'])?number_format($vehicle['monthly_emi'], 0, '.', ','):'0.0'; ?>/month</h6>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </section>

    <!-- LATEST SECTION ENDS -->

    <!-- On Sale SECTION STARTS -->
    <section class="section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="section-title mb-4">
                        <h3>On Sale</h3>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-end">
                        <a href="<?php echo base_url('view-all-onsale-vehicles'); ?>" class="dg-brand-btn">View All</a>
                    </div>
                </div>
            </div>

            <div class="carousel-wrapper mt-3">
                <div id="onsale-carWrapper-carousel" class="owl-carousel owl-theme">
                    
                    <?php foreach ($onSaleVehicles as $vehicle) : ?>
                    <div class="item">
                        <div class="vehicle-wrapper">
                            <a href="<?php echo base_url('vehicle-details/'.$vehicle['encrypted_id']); ?>">
                                <img src="<?php echo isset($vehicle['thumbnail_url']) && !empty($vehicle['thumbnail_url'])?$vehicle['thumbnail_url']:base_url('assets/admin/src/images/default-img.png'); ?>">
                            </a>
                            <div class="vehicle-offer-badge">
                                <h6><i class="icofont-sale-discount"></i>₹<?php echo isset($vehicle['discounted_off_price'])?number_format($vehicle['discounted_off_price'], 0, '.', ','):''; ?> off</h6>
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
                                    <?php echo isset($vehicle['fuelTypeName'])?$vehicle['fuelTypeName']:'NA'; ?>
                                </div>
                                <div class="overview-badge">
                                    <h6>Owner</h6>
                                    <?php 
                                    if(isset($vehicle['owner']) && !empty($vehicle['owner'])){
                                        if($vehicle['owner']==1){
                                            echo '<h6>1st</h6>';
                                        }elseif($vehicle['owner']==2){
                                            echo '<h6>2nd</h6>';
                                        }elseif($vehicle['owner']==3){
                                            echo '<h6>3rd</h6>';
                                        }elseif($vehicle['owner']==4){
                                            echo '<h6>3+ Owner</h6>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="wishlist">
                                    <span class="addRemoveVehicleWhishlistSpan_<?php echo $vehicle['id']; ?>">
                                        <?php if(isset($vehicle['wishlist_status']) && !empty($vehicle['wishlist_status'])){ ?>
                                            <?php if($vehicle['wishlist_status']==1){ ?>
                                                <i class="icofont-heart press" data-customerid="<?php echo isset($customerData['id'])?$customerData['id']:0; ?>" data-vehicleid="<?php echo isset($vehicle['id'])?$vehicle['id']:0; ?>" data-operation="remove" data-actionurl="<?php echo base_url('/api/customer/remove-vehicle-wishlist'); ?>"></i>
                                            <?php }else{ ?>
                                                <i class="icofont-heart" data-customerid="<?php echo isset($customerData['id'])?$customerData['id']:0; ?>" data-vehicleid="<?php echo isset($vehicle['id'])?$vehicle['id']:0; ?>" data-operation="add" data-actionurl="<?php echo base_url('/api/customer/add-vehicle-wishlist'); ?>"></i>
                                            <?php } ?>
                                        <?php }else{ ?>
                                            <i class="icofont-heart" data-customerid="<?php echo isset($customerData['id'])?$customerData['id']:0; ?>" data-vehicleid="<?php echo isset($vehicle['id'])?$vehicle['id']:0; ?>" data-operation="add" data-actionurl="<?php echo base_url('/api/customer/add-vehicle-wishlist'); ?>"></i>
                                        <?php } ?>
                                    </span>
                                </div>
                                <div class="verified-tag">
                                    <span class="verification-badge"><i class="icofont-check-circled"></i> Verified Seller</span>
                                </div>
                            </div>
                            <div class="vehicle-price d-flex align-items-center">
                                <h5>₹<?php echo isset($vehicle['discounted_price'])?number_format($vehicle['discounted_price'], 0, '.', ','):'0.0'; ?></h5>
                                <h6>(<?php if(isset($vehicle['pricing_type']) && !empty($vehicle['pricing_type'])){ if($vehicle['pricing_type']==1){echo'Fixed';}elseif($vehicle['pricing_type']==2){echo'Negotiable';} }else{echo 'NA';} ?>)</h6>
                            </div>
                            <p class="vehicle-strike-price">₹<?php echo isset($vehicle['selling_price'])?number_format($vehicle['selling_price'], 0, '.', ','):''; ?></p>
                            <div class="vehicle-emi d-flex">
                                <h6>EMI from</h6>
                                <h6><?php echo isset($vehicle['monthly_emi'])?number_format($vehicle['monthly_emi'], 0, '.', ','):'0.0'; ?>/month</h6>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </section>

    <!-- On Sale SECTION ENDS -->

    <!-- On promotion SECTION STARTS -->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="section-title mb-4">
                        <h3>On Promotion</h3>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-end">
                        <button class="dg-brand-btn">View All</button>
                    </div>
                </div>
            </div>

            <div class="carousel-wrapper mt-3">
                <div id="onpromotion-carWrapper-carousel" class="owl-carousel owl-theme">
                    
                    <?php foreach ($onSaleVehicles as $vehicle) : ?>
                    <div class="item">
                        <div class="vehicle-wrapper">
                            <a href="<?php echo base_url('vehicle-details/'.$vehicle['encrypted_id']); ?>">
                                <img src="<?php echo isset($vehicle['thumbnail_url']) && !empty($vehicle['thumbnail_url'])?$vehicle['thumbnail_url']:base_url('assets/admin/src/images/default-img.png'); ?>">
                            </a>
                            <div class="vehicle-offer-badge">
                                <h6><i class="icofont-sale-discount"></i>₹<?php echo isset($vehicle['discounted_off_price'])?$vehicle['discounted_off_price']:''; ?> off</h6>
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
                                    <?php echo isset($vehicle['fuelTypeName'])?$vehicle['fuelTypeName']:'NA'; ?>
                                </div>
                                <div class="overview-badge">
                                    <h6>Owner</h6>
                                    <?php 
                                    if(isset($vehicle['owner']) && !empty($vehicle['owner'])){
                                        if($vehicle['owner']==1){
                                            echo '<h6>1st</h6>';
                                        }elseif($vehicle['owner']==2){
                                            echo '<h6>2nd</h6>';
                                        }elseif($vehicle['owner']==3){
                                            echo '<h6>3rd</h6>';
                                        }elseif($vehicle['owner']==4){
                                            echo '<h6>3+ Owner</h6>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="wishlist">
                                    <span class="addRemoveVehicleWhishlistSpan_<?php echo $vehicle['id']; ?>">
                                        <?php if(isset($vehicle['wishlist_status']) && !empty($vehicle['wishlist_status'])){ ?>
                                            <?php if($vehicle['wishlist_status']==1){ ?>
                                                <i class="icofont-heart press" data-customerid="<?php echo isset($customerData['id'])?$customerData['id']:0; ?>" data-vehicleid="<?php echo isset($vehicle['id'])?$vehicle['id']:0; ?>" data-operation="remove" data-actionurl="<?php echo base_url('/api/customer/remove-vehicle-wishlist'); ?>"></i>
                                            <?php }else{ ?>
                                                <i class="icofont-heart" data-customerid="<?php echo isset($customerData['id'])?$customerData['id']:0; ?>" data-vehicleid="<?php echo isset($vehicle['id'])?$vehicle['id']:0; ?>" data-operation="add" data-actionurl="<?php echo base_url('/api/customer/add-vehicle-wishlist'); ?>"></i>
                                            <?php } ?>
                                        <?php }else{ ?>
                                            <i class="icofont-heart" data-customerid="<?php echo isset($customerData['id'])?$customerData['id']:0; ?>" data-vehicleid="<?php echo isset($vehicle['id'])?$vehicle['id']:0; ?>" data-operation="add" data-actionurl="<?php echo base_url('/api/customer/add-vehicle-wishlist'); ?>"></i>
                                        <?php } ?>
                                    </span>
                                </div>
                                <div class="verified-tag">
                                    <span class="verification-badge"><i class="icofont-check-circled"></i> Verified Seller</span>
                                </div>
                            </div>
                            <div class="vehicle-price d-flex align-items-center">
                                <h5>₹<?php echo isset($vehicle['discounted_price'])?number_format($vehicle['discounted_price'], 0, '.', ','):'0.0'; ?></h5>
                                <h6>(<?php if(isset($vehicle['pricing_type']) && !empty($vehicle['pricing_type'])){ if($vehicle['pricing_type']==1){echo'Fixed';}elseif($vehicle['pricing_type']==2){echo'Negotiable';} }else{echo 'NA';} ?>)</h6>
                            </div>
                            <p class="vehicle-strike-price">₹<?php echo isset($vehicle['selling_price'])?number_format($vehicle['selling_price'], 0, '.', ','):''; ?></p>
                            <div class="vehicle-emi d-flex">
                                <h6>EMI from</h6>
                                <h6><?php echo isset($vehicle['monthly_emi'])?number_format($vehicle['monthly_emi'], 0, '.', ','):'0.0'; ?>/month</h6>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </section>

    <!-- On Sale SECTION ENDS -->

    <!-- BRAND SECTION STARTS -->

    <section class="section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="section-title mb-4">
                        <h3>Car by Brand</h3>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-end">
                        <button class="dg-brand-btn">View All</button>
                    </div>
                </div>
            </div>
            <div class="carousel-wrapper mt-3">
                <div id="brands-wrapper-carousel" class="owl-carousel owl-theme">
                    <?php 
                    foreach ($vehicleBrands as $brand) : 
                        $bransAllowedToShow = [4,6,26,28,29,31,35,38,40,48,50,52,57,58,65];
                        if(!in_array($brand['id'],$bransAllowedToShow)){ continue; }
                    ?>
                    <div class="item">
                        <a href="#">
                            <div class="brand-wrapper">
                                <img src="<?php echo isset($brand['cmp_logo']) && !empty($brand['cmp_logo'])?base_url('uploads/vehicle_company_logo/'.$brand['cmp_logo']):base_url('assets/admin/src/images/default-img.png'); ?>">
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- BRAND SECTION ENDS -->

    <!-- TESTIMONIAL SECTION STARTS -->

    <section class="position-relative">
        <div class="container">
            <div class="section-title mb-4">
                <h3>Testimonials</h3>
            </div>
            <div class="carousel-wrapper mt-3">
                <div id="testimonials-carousel" class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="testimonials-wrapper">
                            <img src="https://blog.hubspot.com/hubfs/Customer-testimonial-page.jpg">
                            <h5>Louis Lane</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimonials-wrapper">
                            <img src="https://watertolife.com.au/wp-content/uploads/2017/08/testimonial-face.jpg">
                            <h5>John Mendes</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimonials-wrapper">
                            <img
                                src="https://media.istockphoto.com/photos/portrait-of-a-happy-mature-black-businessman-picture-id1145045307?k=20&m=1145045307&s=612x612&w=0&h=ExPTczH5py4-Gd5v1gG3NH8tbBucrfmZ-5yE0d0quL8=">
                            <h5>Dwayne Johnson</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimonials-wrapper">
                            <img
                                src="https://smilequestdental.com/wp-content/uploads/2016/11/GettyImages-500394316.jpg">
                            <h5>Matt Smith</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimonials-wrapper">
                            <img
                                src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8MTd8ODY2MjMwNzF8fGVufDB8fHx8&w=1000&q=80">
                            <h5>Shawn Lee</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="custom-shape-divider-bottom-1664694876">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <!-- TESTIMONIAL SECTION ENDS -->

    <!-- CALL TO ACTION SECTION STARTS -->
    <section class="cta-background section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="cta-title">
                        <h2>Confused in buying your dream vehicle ?</h2>
                    </div>
                    <div class="cta-para">
                        <p>Our experts are here to help you out to find the best car under your budget.</p>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="cta-wrapper">
                                <div class="cta-box">
                                    <div class="cta-icon-holder">
                                        <i class="icofont-ui-call"></i>
                                    </div>
                                    <div class="cta-details">
                                        <h4>Call Us At:</h4>
                                        <a href="#">
                                            <p>+91 95941 27932</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="cta-wrapper">
                                <div class="cta-box">
                                    <div class="cta-icon-holder">
                                        <i class="icofont-envelope"></i>
                                    </div>
                                    <div class="cta-details">
                                        <h4>Mail Us At:</h4>
                                        <a href="#">
                                            <p>support@wheelpact.com</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="cta-wrapper">
                                <div class="cta-box">
                                    <div class="cta-icon-holder">
                                        <i class="icofont-whatsapp"></i>
                                    </div>
                                    <div class="cta-details">
                                        <h4>WhatsApp Us:</h4>
                                        <a href="#">
                                            <p>+91 95941 27932</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>