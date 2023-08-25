<?php $this->extend('admin/layout/main-layout'); ?>
<?php $this->section('content'); ?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Add Vehicle</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Vehicles</li>
                                <li class="breadcrumb-item active" aria-current="page">View Vehicles</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h4">Vehicle List</h4>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Thumbnail</th>
                                    <th>Showroom</th>
                                    <th>Type</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($vehicleList as $item): ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><img src="<?php echo isset($item['thumbnail_url'])?$item['thumbnail_url']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image"></td>
                                    <td><?php echo isset($item['branch_name'])?$item['branch_name']:'NA'; ?></td>
                                    <td><?php echo isset($item['vehicle_type_name'])?$item['vehicle_type_name']:'NA'; ?></td>
                                    <td><?php echo isset($item['cmp_name'])?$item['cmp_name']:'NA'; ?></td>
                                    <td><?php echo isset($item['model_name'])?$item['model_name']:'NA'; ?></td>
                                    <td><?php echo isset($item['selling_price'])?$item['selling_price']:'NA'; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('admin/edit-vehicle/'.$item['id']); ?>" class="btn btn-primary btn-xs">Edit</a>
                                        <a href="<?php echo base_url('admin/single-vehicle-info/'.$item['id']); ?>" class="btn btn-primary btn-xs">View</a>
                                        <a href="javascript:void(0);" id="" data-id="<?php echo $item['id']; ?>" data-actionurl="<?php echo base_url('admin/remove-vehicle'); ?>" data-operation="delete" class="btn btn-danger btn-xs actionBtn">Remove</a>
                                    </td>
                                </tr>
                                <?php $i++; endforeach; ?>
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

