<?php $this->extend('admin/layout/main-layout'); ?>
<?php $this->section('content'); ?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Add Showroom</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                                <li class="breadcrumb-item">Manage Showroom</li>
                                <li class="breadcrumb-item active" aria-current="page">Add Showroom</li>
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
                <?= form_open('admin/save-branch', ['id' => 'save_branch_form', 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?>
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="selectDealer">Select Dealer:</label>
                            <select class="form-control" id="selectDealer" name="selectDealer">
                                <option value="">Choose Dealer</option>
                                    <?php if(isset($dealerList) && !empty($dealerList)){ foreach ($dealerList as $value) { ?>
                                        <option value="<?php echo isset($value['id'])?$value['id']:''; ?>"><?php echo isset($value['name'])?$value['name']:''; ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="branchType">Branch Type:</label>
                                <select class="form-control" id="branchType" name="branchType">
                                    <option value="">Choose Branch</option>
                                    <option value="1">Main Branch</option>
                                    <option value="2">Sub Branch</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="branchType">Supported Vehicle Type:</label>
                                <select class="form-control" id="branchSupportedVehicleType" name="branchSupportedVehicleType">
                                    <option value="">Choose Type</option>
                                    <option value="1">Only Cars</option>
                                    <option value="2">Only Bikes</option>
                                    <option value="3">Both</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="branchName">Branch Name:</label>
                                <input type="text" class="form-control" id="branchName" name="branchName" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="branchName">Branch Thumbnail:</label>
                                <input type="file" class="form-control" id="branchThumbnail" name="branchThumbnail" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="branchBanner">Banner 1:</label>
                                <input type="file" class="form-control" id="branchBanner1" name="branchBanner1" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="branchBanner">Banner 2:</label>
                                <input type="file" class="form-control" id="branchBanner2" name="branchBanner2" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="branchBanner">Banner 3:</label>
                                <input type="file" class="form-control" id="branchBanner3" name="branchBanner3" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="chooseCountry">Choose Country:</label>
                                <select class="form-control" id="chooseCountry" name="chooseCountry">
                                    <option value="">Choose Country</option>
                                    <?php if(isset($countryList) && !empty($countryList)){ foreach($countryList as $countryData){ ?>
                                    <option value="<?php echo isset($countryData->id)?$countryData->id:''; ?>"><?php echo isset($countryData->name)?$countryData->name:''; ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="chooseState">Choose State:</label>
                                <select class="form-control" id="chooseState" name="chooseState">
                                    <!-- Populate options dynamically based on the selected country -->
                                    <!-- Example: if the selected country is "Country 1", then the states could be dynamically loaded here -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="chooseCity">Choose City:</label>
                                <select class="form-control" id="chooseCity" name="chooseCity">
                                    <!-- Populate options dynamically based on the selected state -->
                                    <!-- Example: if the selected state is "State 1", then the cities could be dynamically loaded here -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea class="form-control" id="address" name="address" ></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contactNumber">Contact Number:</label>
                                <input type="text" class="form-control" id="contactNumber" name="contactNumber" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="shortDescription">Short Description:</label>
                        <textarea class="form-control" id="shortDescription" name="shortDescription" ></textarea>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="branchBanner">Banner 2:</label>
                            <input type="file" class="form-control" id="branchBanner2" name="branchBanner2">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="branchBanner">Banner 3:</label>
                            <input type="file" class="form-control" id="branchBanner3" name="branchBanner3">
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
                                        <option value="<?php echo isset($countryData->id) ? $countryData->id : ''; ?>"><?php echo isset($countryData->name) ? $countryData->name : ''; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="chooseState">Choose State:</label>
                            <select class="form-control" id="chooseState" name="chooseState">
                                <!-- Populate options dynamically based on the selected country -->
                                <!-- Example: if the selected country is "Country 1", then the states could be dynamically loaded here -->
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="chooseCity">Choose City:</label>
                            <select class="form-control" id="chooseCity" name="chooseCity">
                                <!-- Populate options dynamically based on the selected state -->
                                <!-- Example: if the selected state is "State 1", then the cities could be dynamically loaded here -->
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12 mb-30">
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea class="form-control" id="address" name="address"></textarea>
                        </div>
                    </div>
                    <!-- add branch service Start -->
                    <div class="col-md-6 col-sm-12 mb-30">
                        <div class="form-group">
                            <label for="address">Add Services:</label>

                            <div class="pull-right">
                                <a href="#input-validation-form" id="extend-branch-service" class="btn btn-primary btn-sm scroll-click collapsed" rel="content-y" data-toggle="collapse" role="button" aria-expanded="false"><i class="fa fa-plus"></i> Add </a>
                            </div>
                            <div class="col-md-10 col-sm-10">
                                <div id="extend-service-field">
                                    <div class="form-group">
                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"><input type="text" placeholder="Enter Branch Service" name="branchServices[]" class="form-control branchServices"><span class="input-group-btn input-group-append"><button class="btn btn-primary bootstrap-touchspin-up remove-branch-service-field" type="button">-</button></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add branch service End -->
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contactNumber">Contact Number:</label>
                            <input type="text" class="form-control NumOnly" minlength="9" maxlength="10" id="contactNumber" name="contactNumber">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 mb-30">
                        <div class="form-group">
                            <label for="shortDescription">Short Description:</label>
                            <textarea class="form-control" id="shortDescription" name="shortDescription"></textarea>
                        </div>
                    </div>
                    <!-- add deliverable images Start -->
                    <div class="col-md-6 col-sm-12 mb-30">
                        <div class="form-group">
                            <label for="address">Add Deliverable Images:</label>
                            <div class="pull-right">
                                <a href="#input-validation-form" id="extend-deliverable-img" class="btn btn-primary btn-sm scroll-click collapsed" rel="content-y" data-toggle="collapse" role="button" aria-expanded="false"><i class="fa fa-plus"></i> Add </a>
                            </div>
                            <div class="col-md-10 col-sm-10">
                                <div id="extend-deliverable-img-field">
                                    <div class="form-group">
                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"><input type="file" placeholder="Choose Image" name="deliverableImg[]" class="form-control deliverableImg" accept="image/png, image/jpeg"><span class="input-group-btn input-group-append"><button class="btn btn-primary bootstrap-touchspin-up remove-deliverable-img-field" type="button">-</button></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add deliverable images End -->
                </div>
            </div>

            <button type="submit" class="btn btn-primary pull-right">Submit</button><br /><br />
            <?= form_close(); ?>
        </div>

    </div>
    <div class="footer-wrap pd-20 mb-20 card-box">
        DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
    </div>
</div>
</div>
<?= $this->endSection() ?>