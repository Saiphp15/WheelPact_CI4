<?php $this->extend('admin/layout/main-layout'); ?>
<?php $this->section('content'); ?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Showrooms / Branches</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . "admin/dashboard" ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Showroom</li>
                                <li class="breadcrumb-item active" aria-current="page">View Showrooms / Branches</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="<?php echo base_url('admin/add-branch'); ?>" class="btn btn-outline-primary btn-md" rel="content-y" role="button">
                            <i class="icon-copy bi bi-list-stars"></i> Add Branch
                        </a>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h4">Branch List</h4>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered vehicle_company_list">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Dealer Name</th>
                                    <th>Branch Name</th>
                                    <th>Type</th>
                                    <th>Contact</th>
                                    <th>Email</tj>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($BranchesList as $item) : ?>
                                    <tr class="tr">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo isset($item['owner_name']) ? $item['owner_name'] : 'NA'; ?></td>
                                        <td><?php echo isset($item['branch_name']) ? $item['branch_name'] : 'NA'; ?></td>
                                        <td><?php echo ($item['branch_type'] == '1') ? 'Main Branch' : 'Sub Branch'; ?></td>
                                        <td><?php echo isset($item['contact_number']) ? $item['contact_number'] : 'NA'; ?></td>
                                        <td><?php echo isset($item['email']) ? $item['email'] : 'NA'; ?></td>
                                        <td class="text-center">
                                        <?php if ($item['branch_active'] == '1') { ?>
                                            <a href="javascript:void(0);" data-toggle="tooltip" title="Deactivate this Showroom in listing" data-id="<?php echo $item['branch_id']; ?>" data-actionurl="<?php echo base_url('admin/change-branch-status/disable'); ?>" data-operation="deactivate" class="btn btn-success btn-xs actionBtn">Active</a>
                                        <?php } else { ?>
                                            <a href="javascript:void(0);" data-toggle="tooltip" title="Activate this Showroom in listing" data-id="<?php echo $item['branch_id']; ?>" data-actionurl="<?php echo base_url('admin/change-branch-status/enable'); ?>" data-operation="activate" class="btn btn-warning btn-xs actionBtn">In-Active</a>
                                        <?php } ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('admin/edit-branch-details/' . $item['branch_id']); ?>" data-toggle="tooltip" title="Edit/Update Branch details" class="btn btn-primary btn-xs">Edit</a>
                                            <a href="<?php echo base_url('admin/single-branch-info/' . $item['branch_id']); ?>" data-toggle="tooltip" title="View Branch details" class="btn btn-primary btn-xs">View</a>
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