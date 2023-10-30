<?php $this->extend('admin/layout/main-layout'); ?>
<?php $this->section('content'); ?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Edit Showroom</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                                <li class="breadcrumb-item">Manage Showroom</li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Showroom Details</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="<?php echo base_url('admin/view-showrooms'); ?>" class="btn btn-outline-primary btn-md" rel="content-y" role="button">
                            <i class="icon-copy bi bi-list-stars"></i> View Branches
                        </a>
                    </div>
                </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <?= form_open_multipart('admin/edit-update-branch-details', 'id="edit_update_branch_details"') ?>
                <?= csrf_field(); ?>
                <!-- Display validation errors -->
                <?php if (session()->has('errors')) : ?>
                    <div class="alert alert-danger shadow">
                        <ul>
                            <?php foreach (session('errors') as $error) : ?>
                                <li><?= $error ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>
                <!-- Display success message -->
                <?php if (session()->has('success')) : ?>
                    <div class="alert alert-success">
                        <?= session('success') ?>
                    </div>
                <?php endif ?>
                <!-- Display server error message -->
                <?php if (session()->has('error')) : ?>
                    <div class="alert alert-danger shadow">
                        <?= session('error') ?>
                    </div>
                <?php endif ?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="selectDealer">Dealer:</label>
                            <input type="text" value="<?php echo isset($branchDetails['owner_name']) ? $branchDetails['owner_name'] : ''; ?>" class="form-control" disabled>
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
                            <label for="branchName">Branch Name:</label>
                            <input type="text" value="<?php echo isset($branchDetails['name']) ? $branchDetails['name'] : ''; ?>" class="form-control" id="branchName" name="branchName" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="branchType">Supported Vehicle Type:</label>
                            <select class="form-control" id="branchSupportedVehicleType" name="branchSupportedVehicleType">
                                <option value="">Choose Type</option>
                                <option value="1" <?php if ($branchDetails['branch_supported_vehicle_type'] == '1') echo 'selected'; ?>>Only Cars</option>
                                <option value="2" <?php if ($branchDetails['branch_supported_vehicle_type'] == '2') echo 'selected'; ?>>Only Bikes</option>
                                <option value="3" <?php if ($branchDetails['branch_supported_vehicle_type'] == '3') echo 'selected'; ?>>Both</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="branchName">Branch Thumbnail:</label>
                            <input type="file" class="form-control" id="branchThumbnail" name="branchThumbnail">
                            <div class="da-card box-shadow mt-3">
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
                            <input type="file" class="form-control" id="branchBanner1" name="branchBanner1">
                            <div class="da-card box-shadow mt-3">
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
                            <input type="file" class="form-control" id="branchBanner2" name="branchBanner2">
                            <div class="da-card box-shadow mt-3">
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
                            <input type="file" class="form-control" id="branchBanner3" name="branchBanner3">
                            <div class="da-card box-shadow mt-3">
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
                            <select class="form-control" id="chooseCountry" name="chooseCountry">
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
                            <select class="form-control" id="chooseState" name="chooseState">
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
                            <select class="form-control" id="chooseCity" name="chooseCity">
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
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea class="form-control" id="address" name="address"><?php echo isset($branchDetails['address']) ? $branchDetails['address'] : ''; ?></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contactNumber">Contact Number:</label>
                            <input type="text" value="<?php echo isset($branchDetails['contact_number']) ? $branchDetails['contact_number'] : ''; ?>" class="form-control NumOnly" id="contactNumber" name="contactNumber">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" value="<?php echo isset($branchDetails['email']) ? $branchDetails['email'] : ''; ?>" class="form-control" id="email" name="email">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="shortDescription">Short Description:</label>
                    <textarea class="form-control" id="shortDescription" name="shortDescription"><?php echo isset($branchDetails['short_description']) ? $branchDetails['short_description'] : ''; ?></textarea>
                </div>

                <div class="pull-right">
                    <input type="hidden" name="branchId" id="branchId" value="<?php echo isset($branchDetails['id']) ? $branchDetails['id'] : ''; ?>">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
                <?= form_close() ?><br /><br />
            </div>

        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>