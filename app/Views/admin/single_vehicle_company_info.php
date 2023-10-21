<?php $this->extend('admin/layout/main-layout'); ?>
<?php $this->section('content'); ?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Company Info</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . "admin/dashboard" ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Company</li>
                                <li class="breadcrumb-item active" aria-current="page">Company Info</li>
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
                    <h4 class="text-blue h4">Vehicle Company Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="pd-20 card-box height-100-p">
                                <div class="product-list">
                                    <ul class="row">
                                        <li class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="product-box text-center">
                                                <div class="producct-img">
                                                    <img src="<?php echo isset($companyDetails['cmp_logo']) ? base_url('uploads/vehicle_company_logo/' . $companyDetails['cmp_logo']) : base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive">
                                                </div>
                                                <div class="product-caption">
                                                    <h4><a href="#"><?php echo isset($companyDetails['cmp_name']) ? $companyDetails['cmp_name'] : ''; ?></a></h4>
                                                    <?php if ($companyDetails['is_active'] == 1) {  ?>
                                                        <button type="button" class="btn btn-outline-success btn-sm">Active</button>
                                                    <?php } else { ?>
                                                        <button type="button" class="btn btn-outline-warning btn-sm">InActive</button>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                            <div class="pd-20 card-box height-100-p">
                                <h4 class="mb-15 text-blue h4"><?php echo isset($companyDetails['cmp_name']) ? $companyDetails['cmp_name'] : ''; ?> Models</h4>
                                <div class="btn-list">
                                    <?php foreach ($companyModels as $key => $value) { ?>
                                        <button type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(59, 89, 152);">
                                            <i class="icon-copy fa fa-car" aria-hidden="true"></i> <?php echo isset($value) ? $value : ''; ?>
                                        </button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br /><br />
                </div>
            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box"><a href="<?php base_url('admin/dashboard'); ?>" target="_blank">WheelPact</a></div>
    </div>
</div>
<?= $this->endSection() ?>