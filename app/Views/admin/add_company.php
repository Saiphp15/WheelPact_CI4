<?php $this->extend('admin/layout/main-layout'); ?>
<?php $this->section('content'); ?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Add Company</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Vehicles</li>
                                <li class="breadcrumb-item active" aria-current="page">Add Company</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="<?php echo base_url('admin/view-companies'); ?>" class="btn btn-outline-primary btn-md" rel="content-y" role="button">
                            <i class="icon-copy bi bi-list-stars"></i> View Companies
                        </a>
                    </div>
                </div>
            </div>

            <div class="pd-20 card-box mb-20">
                <div class="card-body">
                    <?= form_open_multipart('admin/save-vehicle-company-models', 'id="save_vehicle_company_models"') ?>
                    <?= csrf_field(); ?>
                    <div class="row">
                        <!-- Company details Start -->
                        <div class="col-md-6 col-sm-12 mb-30">
                            <div class="pd-20 card-box height-100-p">
                                <div class="clearfix mb-30">
                                    <div class="pull-left">
                                        <h4 class="text-blue h4">Make Details</h4>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Make Name</label>
                                        <input class="form-control AtoZOnly" name="cmp_name" type="text" placeholder="Vehicle Company Name" required>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Choose Logo</label>
                                        <input type="file" name="cmp_logo" id="cmp_logo" class="form-control-file form-control height-auto" accept="image/*">
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Select Status</label>
                                        <select name="cmp_status" class="custom-select col-12">
                                            <option selected="">Choose...</option>
                                            <option value="1" selected>Enable</option>
                                            <option value="0">Disable</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- Company Details End -->

                        <!-- Company Models Start -->
                        <div class="col-md-6 col-sm-12 mb-30">
                            <div class="pd-20 card-box height-100-p">
                                <div class="clearfix mb-30">

                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <h4 class="text-blue h4">Make Models</h4>
                                            <p class="mb-30"></p>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#input-validation-form" id="extend" class="btn btn-primary btn-sm scroll-click collapsed" rel="content-y" data-toggle="collapse" role="button" aria-expanded="false"><i class="fa fa-plus"></i> Add </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div id="extend-field">
                                        <div class="form-group">
                                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"><input type="text" placeholder="Enter Model Name" name="VehicleModel[]" class="form-control"><span class="input-group-btn input-group-append"><button class="btn btn-primary bootstrap-touchspin-up remove-extend-field" type="button">-</button></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Company Models End -->
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    <?= form_close() ?>
                </div>

            </div>
        </div>

        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>