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
                                <button class="nav-link banner-filter-link active" id="pills-cars-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-cars" type="button" role="tab"
                                    aria-controls="pills-cars" aria-selected="true">Cars</button>
                            </li>
                            <li class="nav-item banner-filter-item" role="presentation">
                                <button class="nav-link banner-filter-link" id="pills-bikes-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-bikes" type="button" role="tab" aria-controls="pills-bikes"
                                    aria-selected="false">Bikes</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-cars" role="tabpanel"
                                aria-labelledby="pills-cars-tab">
                                <div class="input-group mb-3">
                                    <input type="text" class="brand-input form-control" placeholder="Search your Car">
                                    <button class="search-brand-btn" type="button">Search</button>
                                </div>
                                <div class="browse-link">
                                    <a href="#">Browse All Cars <i class="icofont-long-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-bikes" role="tabpanel"
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
                        <button class="dg-brand-btn">Browse All Stores</button>
                    </div>
                </div>
            </div>

            <div class="carousel-wrapper mt-3">
                <div id="popular-carWrapper-carousel" class="owl-carousel owl-theme">
                    <div class="item">
                        <a href="<?php echo base_url('vehicle-details'); ?>">
                            <div class="store-wrapper">
                                <img
                                    src="https://content.jdmagicbox.com/comp/mumbai/d1/022pxx22.xx22.140728162311.i1d1/catalogue/car-galaxy-thane-west-thane-car-dealers-p3q87.jpg?clr=">

                                <div class="store-details-box">
                                    <div class="store-wrapper-title">
                                        <h5>Premium Car Dealers</h5>
                                    </div>
                                    <div class="store-car-count">
                                        <h6>141 Vehicles Available</h6>
                                    </div>
                                    <div class="d-flex store-location">
                                        <i class="icofont-pin"></i>
                                        <h6>Mumbai</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="store-rating-icon">
                                            <i class="icofont-star"></i>
                                        </div>
                                        <div class="store-rating-count">5.0</div>
                                        <div class="store-reviews">(12 Reviews)</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="item">
                    <a href="<?php echo base_url('vehicle-details'); ?>">
                            <div class="store-wrapper">
                                <img
                                    src="https://content.jdmagicbox.com/comp/mumbai/n7/022pxx22.xx22.180328045415.k9n7/catalogue/s-m-carz-borivali-west-mumbai-second-hand-car-dealers-yqx9eilx8l.jpg?clr=523314">
                                <div class="store-details-box">
                                    <div class="store-wrapper-title">
                                        <h5>Heritage Cars</h5>
                                    </div>
                                    <div class="store-car-count">
                                        <h6>141 Vehicles Available</h6>
                                    </div>
                                    <div class="d-flex store-location">
                                        <i class="icofont-pin"></i>
                                        <h6>Mumbai</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="store-rating-icon">
                                            <i class="icofont-star"></i>
                                        </div>
                                        <div class="store-rating-count">5.0</div>
                                        <div class="store-reviews">(48 Reviews)</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="item">
                    <a href="<?php echo base_url('vehicle-details'); ?>">
                            <div class="store-wrapper">
                                <img
                                    src="https://content.jdmagicbox.com/comp/mumbai/d1/022pxx22.xx22.140728162311.i1d1/catalogue/car-galaxy-thane-west-thane-car-dealers-p3q87.jpg?clr=">
                                <div class="store-details-box">
                                    <div class="store-wrapper-title">
                                        <h5>Premium Car Dealers</h5>
                                    </div>
                                    <div class="store-car-count">
                                        <h6>141 Vehicles Available</h6>
                                    </div>
                                    <div class="d-flex store-location">
                                        <i class="icofont-pin"></i>
                                        <h6>Mumbai</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="store-rating-icon">
                                            <i class="icofont-star"></i>
                                        </div>
                                        <div class="store-rating-count">5.0</div>
                                        <div class="store-reviews">(12 Reviews)</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="item">
                    <a href="<?php echo base_url('vehicle-details'); ?>">
                            <div class="store-wrapper">
                                <img
                                    src="https://content.jdmagicbox.com/comp/mumbai/d1/022pxx22.xx22.140728162311.i1d1/catalogue/car-galaxy-thane-west-thane-car-dealers-p3q87.jpg?clr=">
                                <div class="store-details-box">
                                    <div class="store-wrapper-title">
                                        <h5>Premium Car Dealers</h5>
                                    </div>
                                    <div class="store-car-count">
                                        <h6>141 Vehicles Available</h6>
                                    </div>
                                    <div class="d-flex store-location">
                                        <i class="icofont-pin"></i>
                                        <h6>Mumbai</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="store-rating-icon">
                                            <i class="icofont-star"></i>
                                        </div>
                                        <div class="store-rating-count">5.0</div>
                                        <div class="store-reviews">(12 Reviews)</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="item">
                    <a href="<?php echo base_url('vehicle-details'); ?>">
                            <div class="store-wrapper">
                                <img
                                    src="https://content.jdmagicbox.com/comp/mumbai/n7/022pxx22.xx22.180328045415.k9n7/catalogue/s-m-carz-borivali-west-mumbai-second-hand-car-dealers-yqx9eilx8l.jpg?clr=523314">
                                <div class="store-details-box">
                                    <div class="store-wrapper-title">
                                        <h5>Heritage Cars</h5>
                                    </div>
                                    <div class="store-car-count">
                                        <h6>141 Vehicles Available</h6>
                                    </div>
                                    <div class="d-flex store-location">
                                        <i class="icofont-pin"></i>
                                        <h6>Mumbai</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="store-rating-icon">
                                            <i class="icofont-star"></i>
                                        </div>
                                        <div class="store-rating-count">5.0</div>
                                        <div class="store-reviews">(48 Reviews)</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
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
                        <h3>Featured Cars</h3>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-end">
                        <button class="dg-brand-btn">View All</button>
                    </div>
                </div>
            </div>

            <div class="carousel-wrapper mt-3">
                <div id="featured-carWrapper-carousel" class="owl-carousel owl-theme">
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

                                <div class="verified-tag">
                                    <span class="verification-badge"><i class="icofont-check-circled"></i> Verified
                                        Seller</span>
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

                                <div class="verified-tag">
                                    <span class="verification-badge"><i class="icofont-check-circled"></i> Verified
                                        Seller</span>
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

                            <div class="verified-tag">
                                <span class="verification-badge"><i class="icofont-check-circled"></i> Verified
                                    Seller</span>
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

                            <div class="verified-tag">
                                <span class="verification-badge"><i class="icofont-check-circled"></i> Verified
                                    Seller</span>
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
                        <button class="dg-brand-btn">View All</button>
                    </div>
                </div>
            </div>

            <div class="carousel-wrapper mt-3">
                <div id="latest-carWrapper-carousel" class="owl-carousel owl-theme">
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

                                <div class="verified-tag">
                                    <span class="verification-badge"><i class="icofont-check-circled"></i> Verified
                                        Seller</span>
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

                            <div class="verified-tag">
                                <span class="verification-badge"><i class="icofont-check-circled"></i> Verified
                                    Seller</span>
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

                            <div class="verified-tag">
                                <span class="verification-badge"><i class="icofont-check-circled"></i> Verified
                                    Seller</span>
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

    <!-- LATEST SECTION ENDS -->

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