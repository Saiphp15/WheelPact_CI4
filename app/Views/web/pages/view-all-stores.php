<?php $this->extend('web/layout/main-layout'); ?>
<?php $this->section('content'); ?>
    <!-- STORE SECTION STARTS -->
    <section class="section-spacing">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&quot;);" aria-label="breadcrumb">
                <ol class="breadcrumb brand-breadcrumb">
                    <li class="breadcrumb-item brand-breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item brand-breadcrumb-item active" aria-current="page">Popular Stores</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label class="brand-label mb-1">Location</label>
                        <select class="brand-select">
                            <option value="1">Mumbai</option>
                            <option value="2">Pune</option>
                            <option value="3">Banglore</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-3">
                        <label class="brand-label mb-1">Brands</label>
                        <select class="brand-select">
                            <option value="1">Maruti Suzuki</option>
                            <option value="2">Mahindra</option>
                            <option value="3">Tata</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-3">
                        <label class="brand-label mb-1">Ratings</label>
                        <select class="brand-select">
                            <option value="1">4.5 Stars - 5 Stars</option>
                            <option value="2">4 Stars - 4.5 Stars</option>
                            <option value="3">3.5 Stars - 4 Stars</option>
                            <option value="4">3 Stars - 3.5 Stars</option>
                            <option value="5">2.5 Stars - 3 Stars</option>
                            <option value="6">2 Stars - 2.5 Stars</option>
                            <option value="7">1.5 Stars - 2 Stars</option>
                            <option value="8">1 Star - 1.5 Stars</option>
                            <option value="9">0 Star - 0.5 Star</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 text-end">
                    <button href="#" class="dg-brand-btn">Apply Filter</button>
                </div>
            </div>

            <div class="row">
                <?php 
                if(isset($popularStores) && !empty($popularStores)){ 
                    foreach($popularStores as $store){
                ?>
                    <div class="col-md-6 col-lg-4">
                        <a href="<?php echo base_url('store-details/'.$store['encrypted_id']); ?>">
                            <div class="store-wrapper">
                                <img src="<?php echo isset($store['branch_thumbnail'])?$store['branch_thumbnail']:base_url('assets/admin/src/images/default-img.png'); ?>">
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
    </section>
    <!-- STORE SECTION ENDS -->

<?= $this->endSection() ?>