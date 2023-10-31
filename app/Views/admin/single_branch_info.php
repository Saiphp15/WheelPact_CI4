<?php $this->extend('admin/layout/main-layout'); ?>
<?php $this->section('content'); ?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>View Showroom</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                                <li class="breadcrumb-item">Manage Showroom</li>
                                <li class="breadcrumb-item active" aria-current="page">View Showroom Details</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="<?php echo base_url('admin/edit-branch-details/' . $branchDetails['id']); ?>" class="btn btn-outline-primary btn-md" rel="content-y" role="button">
                            <i class="icon-copy bi bi-list-stars"></i> Edit This Branch
                        </a>
                        <a href="<?php echo base_url('admin/view-showrooms'); ?>" class="btn btn-outline-primary btn-md" rel="content-y" role="button">
                            <i class="icon-copy bi bi-list-stars"></i> View Branches
                        </a>
                    </div>
                </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="selectDealer">Dealer:</label>
                            <input type="text" value="<?php echo isset($branchDetails['owner_name']) ? $branchDetails['owner_name'] : ''; ?>" class="form-control" disabled="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="branchType">Branch Type:</label>
                            <select class="form-control" id="branchType" name="branchType" disabled>
                                <option value="">Choose Branch</option>
                                <option value="1" <?php if ($branchDetails['branch_type'] == '1') echo 'selected'; ?>>Main Branch</option>
                                <option value="2" <?php if ($branchDetails['branch_type'] == '2') echo 'selected'; ?>>Sub Branch</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="branchType">Supported Vehicle Type:</label>
                            <select class="form-control" id="branchSupportedVehicleType" name="branchSupportedVehicleType" disabled>
                                <option value="">Choose Type</option>
                                <option value="1" <?php if ($branchDetails['branch_supported_vehicle_type'] == '1') echo 'selected'; ?>>Only Cars</option>
                                <option value="2" <?php if ($branchDetails['branch_supported_vehicle_type'] == '2') echo 'selected'; ?>>Only Bikes</option>
                                <option value="3" <?php if ($branchDetails['branch_supported_vehicle_type'] == '3') echo 'selected'; ?>>Both</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="branchName">Branch Name:</label>
                            <input type="text" value="<?php echo isset($branchDetails['name']) ? $branchDetails['name'] : ''; ?>" class="form-control" id="branchName" name="branchName" disabled>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="branchName">Branch Thumbnail:</label>
                            <div class="da-card box-shadow">
                                <div class="da-card-photo">
                                    <img src="<?php echo isset($branchDetails['branch_thumbnail']) ? base_url() . "uploads/branch_thumbnails/" . $branchDetails['branch_thumbnail'] : ''; ?>" alt="">
                                    <div class="da-overlay">
                                        <div class="da-social">
                                            <h5 class="mb-10 color-white pd-20">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing.
                                            </h5>
                                            <ul class="clearfix">
                                                <li>
                                                    <a href="<?php echo isset($branchDetails['branch_thumbnail']) ? base_url() . "uploads/branch_thumbnails/" . $branchDetails['branch_thumbnail'] : ''; ?>" data-fancybox="images"><i class="fa fa-picture-o"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-link"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="branchBanner">Banner 1:</label>
                            <div class="da-card box-shadow">
                                <div class="da-card-photo">
                                    <img src="<?php echo isset($branchDetails['branch_banner1']) ? base_url() . "/uploads/branch_banners/" . $branchDetails['branch_banner1'] : ''; ?>" alt="">
                                    <div class="da-overlay">
                                        <div class="da-social">
                                            <h5 class="mb-10 color-white pd-20">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing.
                                            </h5>
                                            <ul class="clearfix">
                                                <li>
                                                    <a href="<?php echo isset($branchDetails['branch_banner1']) ? base_url() . "/uploads/branch_banners/" . $branchDetails['branch_banner1'] : ''; ?>" data-fancybox="images"><i class="fa fa-picture-o"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-link"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="branchBanner">Banner 2:</label>
                            <div class="da-card box-shadow">
                                <div class="da-card-photo">
                                    <img src="<?php echo isset($branchDetails['branch_banner2']) ? base_url() . "/uploads/branch_banners/" . $branchDetails['branch_banner2'] : ''; ?>" alt="">
                                    <div class="da-overlay">
                                        <div class="da-social">
                                            <h5 class="mb-10 color-white pd-20">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing.
                                            </h5>
                                            <ul class="clearfix">
                                                <li>
                                                    <a href="<?php echo isset($branchDetails['branch_banner2']) ? base_url() . "/uploads/branch_banners/" . $branchDetails['branch_banner2'] : ''; ?>" data-fancybox="images"><i class="fa fa-picture-o"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-link"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="branchBanner">Banner 3:</label>
                            <div class="da-card box-shadow">
                                <div class="da-card-photo">
                                    <img src="<?php echo isset($branchDetails['branch_banner3']) ? base_url() . "/uploads/branch_banners/" . $branchDetails['branch_banner3'] : ''; ?>" alt="">
                                    <div class="da-overlay">
                                        <div class="da-social">
                                            <h5 class="mb-10 color-white pd-20"></h5>
                                            <ul class="clearfix">
                                                <li>
                                                    <a href="<?php echo isset($branchDetails['branch_banner3']) ? base_url() . "/uploads/branch_banners/" . $branchDetails['branch_banner3'] : ''; ?>" data-fancybox="images"><i class="fa fa-picture-o"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-link"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="chooseCountry">Choose Country:</label>
                            <select class="form-control" id="chooseCountry" name="chooseCountry" disabled>
                                <option value="">Choose Country</option>
                                <?php if (isset($countryList) && !empty($countryList)) {
                                    foreach ($countryList as $countryData) { ?>
                                        <option value="<?php echo isset($countryData->id) ? $countryData->id : ''; ?>" <?php if ($branchDetails['country_id'] == $countryData->id) echo 'selected'; ?>><?php echo isset($countryData->name) ? $countryData->name : ''; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="chooseState">Choose State:</label>
                            <select class="form-control" id="chooseState" name="chooseState" disabled>
                                <option value="">Choose State</option>
                                <?php if (isset($stateList) && !empty($stateList)) {
                                    foreach ($stateList as $stateData) { ?>
                                        <option value="<?php echo isset($stateData->id) ? $stateData->id : ''; ?>" <?php if ($branchDetails['state_id'] == $stateData->id) echo 'selected'; ?>><?php echo isset($stateData->name) ? $stateData->name : ''; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="chooseCity">Choose City:</label>
                            <select class="form-control" id="chooseCity" name="chooseCity" disabled>
                                <option value="">Choose City</option>
                                <?php if (isset($cityList) && !empty($cityList)) {
                                    foreach ($cityList as $cityData) { ?>
                                        <option value="<?php echo isset($cityData->id) ? $cityData->id : ''; ?>" <?php if ($branchDetails['city_id'] == $cityData->id) echo 'selected'; ?>><?php echo isset($cityData->name) ? $cityData->name : ''; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea class="form-control" id="address" name="address" disabled><?php echo isset($branchDetails['address']) ? $branchDetails['address'] : ''; ?></textarea>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                        <div class="form-group">
                            <label for="address">Services:</label>
                            <div class="btn-list">
                                <?php foreach ($branchService as $key => $value) { ?>
                                    <button type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(59, 89, 152);">
                                        <i class="icon-copy fa fa-wrench" aria-hidden="true"></i> <?php echo isset($value) ? $value : ''; ?>
                                    </button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contactNumber">Contact Number:</label>
                            <input type="text" value="<?php echo isset($branchDetails['contact_number']) ? $branchDetails['contact_number'] : ''; ?>" class="form-control NumOnly" id="contactNumber" name="contactNumber" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" value="<?php echo isset($branchDetails['email']) ? $branchDetails['email'] : ''; ?>" class="form-control" id="email" name="email" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="shortDescription">Short Description:</label>
                            <textarea class="form-control" id="shortDescription" name="shortDescription" disabled><?php echo isset($branchDetails['short_description']) ? $branchDetails['short_description'] : ''; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="shortDescription">Deliverable Images:</label>
                            <div class="product-wrap">
                                <div class="product-detail-wrap mb-30">
                                    <div class="row">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <?php foreach ($branchDeliverableImgs as $key => $value) { ?>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key; ?>" <?php
                                                                                                                                        if ($key == 0) {
                                                                                                                                            echo 'class="active"';
                                                                                                                                        } ?>></li>
                                                <?php } ?>
                                            </ol>
                                            <div class=" carousel-inner">
                                                <?php foreach ($branchDeliverableImgs as $k => $val) { ?>
                                                    <div class="carousel-item <?php
                                                                                if ($k == 0) {
                                                                                    echo 'active';
                                                                                } ?>">
                                                        <img class="d-block w-100" src="<?php echo isset($val['img_name']) ? base_url() . "uploads/branch_deliverables/" . $val['img_name'] : ''; ?>">
                                                    </div>
                                                <?php } ?>

                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
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
    </div>
</div>
<div class="footer-wrap pd-20 mb-20 card-box">
    DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
</div>
</div>
</div>
<?= $this->endSection() ?>