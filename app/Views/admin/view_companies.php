<?php $this->extend('admin/layout/main-layout'); ?>
<?php $this->section('content'); ?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Vehicle Companies</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . "admin/dashboard" ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Vehicles</li>
                                <li class="breadcrumb-item active" aria-current="page">View Companies</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="<?php echo base_url('admin/add-company'); ?>" class="btn btn-outline-primary btn-md" rel="content-y" role="button">
                            <i class="icon-copy bi bi-list-stars"></i> Add Company
                        </a>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h4">Vehicle List</h4>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered vehicle_company_list">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Company Name</th>
                                    <th>Logo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($CompanyList as $item) : ?>
                                    <tr class="tr_<?php echo $item['id']; ?>">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo isset($item['cmp_name']) ? $item['cmp_name'] : 'NA'; ?></td>
                                        <td><img src="<?php echo isset($item['cmp_logo']) ? base_url('uploads/vehicle_company_logo/' . $item['cmp_logo']) : base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg"></td>
                                        <?php if ($item['is_active'] == '1') { ?>
                                            <td class="text-center"><button type="button" class="btn btn-outline-success btn-sm">Active</button></td>
                                        <?php } else { ?>
                                            <td class="text-center"><button type="button" class="btn btn-outline-warning btn-sm">InActive</button></td>
                                        <?php } ?>
                                        <td>
                                            <a href="<?php echo base_url('admin/edit-vehicle-company/' . $item['id']); ?>" data-toggle="tooltip" title="Edit/Update Company details" class="btn btn-primary btn-xs">Edit</a>
                                            <a href="<?php echo base_url('admin/single-vehicle-company-info/' . $item['id']); ?>" data-toggle="tooltip" title="View Company details" class="btn btn-primary btn-xs">View</a>
                                            <?php if ($item['is_active'] == '1') { ?>
                                                <a href="javascript:void(0);" data-toggle="tooltip" title="Deactivate this Company in listing" data-id="<?php echo $item['id']; ?>" data-actionurl="<?php echo base_url('admin/change-company-status/disable'); ?>" data-operation="deactivate" class="btn btn-warning btn-xs actionBtn">Disable</a>
                                            <?php } else { ?>
                                                <a href="javascript:void(0);" data-toggle="tooltip" title="Activate this Company in listing" data-id="<?php echo $item['id']; ?>" data-actionurl="<?php echo base_url('admin/change-company-status/enable'); ?>" data-operation="activate" class="btn btn-success btn-xs actionBtn">Enable</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php $i++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a></div>
    </div>
</div>
<?= $this->endSection() ?>