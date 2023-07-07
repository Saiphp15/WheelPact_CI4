<?php
/**
 * @var \CodeIgniter\View\View $this
 */
?>
<?php $this->extend('web/layout/main-layout'); ?>
<?php $this->section('content'); ?>
<section class="section-spacing">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&quot;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb brand-breadcrumb">
                <li class="breadcrumb-item brand-breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item brand-breadcrumb-item active" aria-current="page">My account</li>
            </ol>
        </nav>
    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills me-3 profile-filt-wrap" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <button class="nav-link profile-link active" id="v-pills-pinfo-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-pinfo" type="button" role="tab" aria-controls="v-pills-pinfo"
                        aria-selected="true">Personal Information</button>
                    <button class="nav-link profile-link" id="v-pills-reservation-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-reservation" type="button" role="tab"
                        aria-controls="v-pills-reservation" aria-selected="false">Your Reservations</button>
                    <button class="nav-link profile-link" id="v-pills-refer-earn-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-refer-earn" type="button" role="tab" aria-controls="v-pills-refer-earn"
                        aria-selected="false">Refer & Earn</button>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-pinfo" role="tabpanel"
                        aria-labelledby="v-pills-pinfo-tab">
                        <div class="tab-title mb-4">
                            <h4>Personal Information</h4>
                        </div>

                        <div class="tab-content-wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="brand-label mb-1">Full Name<span class="required">*</span></label>
                                        <input type="text" class="brand-input" value="Sultan Ahmed Siddiqui">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="brand-label mb-1">Mobile Number<span
                                                class="required">*</span></label>
                                        <input type="tel" class="brand-input" value="9594127932" disabled>
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label class="brand-label mb-1">Email Address<span class="required">*</span></label>
                                <input type="email" class="brand-input" value="sultansiddiqui33@gmail.com">
                            </div>

                            <div class="text-end">
                                <button class="dg-brand-btn">Save Changes</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-reservation" role="tabpanel"
                        aria-labelledby="v-pills-reservation-tab">
                        <div class="tab-title mb-4">
                            <h4>Your Reservations</h4>
                        </div>

                        <section>
                            <div class="container">
                                <div class="empty-wrap">
                                    <img src="assets/web/images/empty.png">
                                    <h4>No Reservations</h4>
                                    <div class="text-center mt-3">
                                        <button class="dg-brand-btn">View All Cars</button>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="tab-content-wrap">
                            <div class="row">
                                <div class="col-md-6">
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
                                        <div class="vehicle-price d-flex align-items-center">
                                            <h5>₹56,00,0000</h5>
                                            <h6>(Negotiable)</h6>
                                        </div>
                                        <div class="vehicle-emi d-flex">
                                            <h6>EMI from</h6>
                                            <h6>40,000/month</h6>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <button class="dg-brand-btn">Reservation Details</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
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
                                        <div class="vehicle-price d-flex align-items-center">
                                            <h5>₹56,00,0000</h5>
                                            <h6>(Negotiable)</h6>
                                        </div>
                                        <div class="vehicle-emi d-flex">
                                            <h6>EMI from</h6>
                                            <h6>40,000/month</h6>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <button class="dg-brand-btn">Reservation Details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-refer-earn" role="tabpanel"
                        aria-labelledby="v-pills-refer-earn-tab">
                        <div class="tab-title mb-4">
                            <h4>Refer & Earn</h4>
                        </div>

                        <div class="tab-content-wrap">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>