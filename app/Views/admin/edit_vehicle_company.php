<?php $this->extend('admin/layout/main-layout'); ?>
<?php $this->section('content'); ?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Edit/Update Company</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . "admin/dashboard" ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Company</li>
                                <li class="breadcrumb-item active" aria-current="page">Edit/Update Company</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="<?php echo base_url('admin/add-company'); ?>" class="btn btn-outline-primary btn-md" rel="content-y" role="button">
                            <i class="icon-copy bi bi-list-stars"></i> Add Company
                        </a> &nbsp;&nbsp;&nbsp;
                        <a href="<?php echo base_url('admin/view-companies'); ?>"><button type="button" class="btn btn-outline-primary pull-right">View Companies</button></a>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h4">Edit Vehicle Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Company details Start -->
                        <div class="col-md-4 col-sm-12 mb-30">
                            <?= form_open_multipart('admin/edit-update-vehicle-company', 'id="edit_update_vehicle_company"') ?>
                            <?= csrf_field(); ?>
                            <div class="pd-20 card-box height-100-p">
                                <div class="clearfix mb-30">
                                    <div class="pull-left">
                                        <h4 class="text-blue h4">Make Details</h4>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Make Name</label>
                                        <input class="form-control AtoZOnly" name="cmp_name" type="text" value="<?php echo isset($companyDetails['cmp_name']) ? $companyDetails['cmp_name'] : ''; ?>" placeholder="Vehicle Company Name" required>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">

                                    <div class="product-list">
                                        <ul class="row">
                                            <li class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="product-box">
                                                    <div class="producct-img">
                                                        <img src="<?php echo isset($companyDetails['cmp_logo']) ? base_url('uploads/vehicle_company_logo/' . $companyDetails['cmp_logo']) : base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive">
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">Choose to change Logo</label>
                                        <input type="file" name="cmp_logo" id="cmp_logo" class="form-control-file form-control height-auto" accept="image/*">
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Select Status</label>
                                        <select name="cmp_status" class="custom-select col-12">
                                            <option selected="">Choose...</option>
                                            <option value="1" <?php if ($companyDetails['is_active'] == 1) {
                                                                    echo 'selected';
                                                                } ?>>Enable</option>
                                            <option value="2" <?php if ($companyDetails['is_active'] != 1) {
                                                                    echo 'selected';
                                                                } ?>>Disable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="hidden" name="updateFlag" value="company_update">
                                    <input type="hidden" name="companyId" id="companyId" value="<?php echo isset($companyDetails['id']) ? $companyDetails['id'] : ''; ?>">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                        <!-- Company Details End -->

                        <!-- Company Models Start -->
                        <div class="col-md-8 col-sm-12 mb-30">
                            <div class="pd-20 card-box height-100-p">
                                <?= form_open('admin/edit-update-vehicle-company-models', 'id="edit_update_vehicle_company_models"') ?>
                                <?= csrf_field(); ?>
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
                                    <div class="btn-list">
                                        <?php foreach ($companyModels as $key => $value) { ?>
                                            <button type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(59, 89, 152);">
                                                <i class="icon-copy fa fa-car" aria-hidden="true"></i> <?php echo isset($value) ? $value : ''; ?>
                                            </button>
                                        <?php } ?>
                                    </div>
                                    <div id="extend-field">
                                        <div class="form-group">
                                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"><input type="text" placeholder="Add New Model Name" name="VehicleModel[]" class="form-control" required><span class="input-group-btn input-group-append"><button class="btn btn-primary bootstrap-touchspin-up remove-extend-field" type="button">-</button></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="hidden" name="updateFlag" value="company_model_update">
                                    <input type="hidden" name="companyId" id="companyId" value="<?php echo isset($companyDetails['id']) ? $companyDetails['id'] : ''; ?>">
                                    <button type="submit" class="btn btn-success">Add/Update</button>
                                </div>
                                <?= form_close() ?>
                            </div>
                        </div>
                        <!-- Company Models End -->

                    </div>

                </div>

            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box"><a href="<?php base_url('admin/dashboard'); ?>" target="_blank">WheelPact</a></div>
    </div>
</div>
<?= $this->endSection() ?>