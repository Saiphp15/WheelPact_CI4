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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="branchType">Branch Type:</label>
                                <select class="form-control" id="branchType" name="branchType">
                                    <option value="">Choose Branch</option>
                                    <option value="1">Main Branch</option>
                                    <option value="2">Sub Branch</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="branchName">Branch Name:</label>
                        <input type="text" class="form-control" id="branchName" name="branchName" >
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
                        <textarea class="form-control" id="address" name="address" rows="2" ></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                <?= form_close(); ?>
            </div>
            
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
