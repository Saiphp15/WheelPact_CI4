<?php $this->extend('web/layout/main-layout'); ?>
<?php $this->section('content'); ?>
    <!-- STORE SECTION STARTS -->
    <section class="section-spacing">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&quot;);" aria-label="breadcrumb">
                <ol class="breadcrumb brand-breadcrumb">
                    <li class="breadcrumb-item brand-breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item brand-breadcrumb-item active" aria-current="page">Featured Vehicles</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-3">
                    <div class="mb-3">
                        <label class="brand-label mb-1">Vehicle Type</label>
                        <select class="brand-select" id="vtypeFilterOpn">
                            <option value="1" <?php if($vtype==1){echo'selected';} ?>>Cars</option>
                            <option value="2" <?php if($vtype==2){echo'selected';} ?>>Bikes</option>
                            <option value="3" <?php if($vtype==3){echo'selected';} ?>>Both</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-3">
                        <label class="brand-label mb-1">Brands</label>
                        <select class="brand-select">
                            <option value="1">Maruti Suzuki</option>
                            <option value="2">Mahindra</option>
                            <option value="3">Tata</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-3">
                        <label class="brand-label mb-1">Price Order</label>
                        <select class="brand-select me-2">
                            <option value="1">Price: Low to High</option>
                            <option value="2">Price: High to Low</option>
                            <option value="3">Kms Driven: Low to High</option>
                            <option value="4">Kms Driven: High to Low</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-3">
                        <br><button href="#" class="dg-brand-btn">Apply Filter</button>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- STORE SECTION ENDS -->
    <input type="hidden" id="actionurl" value="<?php echo base_url('/load-more-featured-vehicles'); ?>">
    <section class="vehicle-list">
        <div class="container mb-3 mt-3">
            <div class="row" id="load_data"></div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div id="load_data_message"></div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>