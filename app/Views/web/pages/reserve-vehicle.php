<?php $this->extend('web/layout/main-layout'); ?>
<?php $this->section('content'); ?>
<?php if(isset($vehicleDetails['isReserved']) && $vehicleDetails['isReserved']==0){ ?>
<section class="section-spacing">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7">
                <div class="section-title">
                    <h3>Reserve Now</h3>
                </div>
                <div class="reserve-steps-wrapper">
                    <div class="reserve-steps">
                        <div class="steps-number">
                            <span>1</span>
                        </div>
                        <div class="steps-content">
                            <h5>Schedule your visit</h5>
                            <p>Choose date &amp; time with in 48 hours i.e is 2-days as per your availablity to visit the vehicle.</p>
                        </div>
                    </div>
                    <div class="reserve-steps">
                        <div class="steps-number">
                            <span>2</span>
                        </div>
                        <div class="steps-content">
                            <h5>Pay Reservation Amount</h5>
                            <p class="mb-0">Pay a reservation amount of ₹2000 to reserve the vehicle.</p>
                            <div class="rrp">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#reservationRefundModal">Read Reservation Refund Policy</a>
                            </div>
                        </div>
                    </div>
                    <div class="reserve-steps">
                        <div class="steps-number">
                            <span>3</span>
                        </div>
                        <div class="steps-content">
                            <h5>Buy the vehicle</h5>
                            <p>Pay the pending amount in cash or our partners would help you with the best available finance support.</p>
                        </div>
                    </div>
                    <div class="reserve-steps">
                        <div class="steps-number">
                            <span>4</span>
                        </div>
                        <div class="steps-content">
                            <h5>Ownership Transfer</h5>
                            <p>Our partners will handle the complete document process to transfer the vehicle ownership.</p>
                        </div>
                    </div>
                    <div class="reserve-steps">
                        <div class="steps-number">
                            <span>5</span>
                        </div>
                        <div class="steps-content">
                            <h5>Take Delivery</h5>
                            <p>Done with the purchase take the vehicle at your home as simple as that.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="section-title" style="display:none;">
                    <h3>Schedule visit</h3>
                </div>
                <div class="visit-wrap" style="display: none;">
                    <?= form_open('api/customer/check-vehicle-reservation-availability', 'id="check_vehicle_reservation_availability_form" ') ?>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="vehicle_id" id="vehicle_id" value="<?php echo isset($vehicleDetails['id']) && !empty($vehicleDetails['id'])?$vehicleDetails['id']:''; ?>">
                        <input type="hidden" name="customer_id" id="customer_id" value="<?php echo isset($customerData['id']) && !empty($customerData['id'])?$customerData['id']:''; ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="brand-label mb-1">Full Name<span class="required">*</span></label>
                                    <input type="text" name="fullname" id="fullname" class="brand-input" value="<?php echo isset($customerData['name']) && !empty($customerData['name'])?$customerData['name']:'NA'; ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="brand-label mb-1">Email Address<span class="required">*</span></label>
                                    <input type="email" name="email" id="email" class="brand-input" readonly="" value="<?php echo isset($customerData['email']) && !empty($customerData['email'])?$customerData['email']:'NA'; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="brand-label mb-1">Date<span class="required">*</span></label>
                                    <input type="date" name="date" id="date" class="brand-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="brand-label mb-1">Time<span class="required">*</span></label>
                                    <input type="time" name="time" id="time" class="brand-input">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="brand-label mb-1">Identification Document<span class="required">*</span></label>
                                    <select name="identity_doc" id="identity_doc" class="brand-select">
                                        <option value="1">Aadhaar Card</option>
                                        <option value="2">License</option>
                                        <option value="3">Pancard</option>
                                        <option value="4">Passport</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-warning" id="checkVehicleReservationAvailability">Check Vehicle Reservation Availability</button>
                                <p id="availablityMessage"></p>
                            </div>
                        </div>
                    <?= form_close(); ?>
                </div>
                <div class="section-title">
                    <h3>Bill Summary & Schedule visit</h3>
                </div>
                <div class="bill-summary-wrapper">
                    <?= form_open('api/customer/save-vehicle-reservation-info', 'id="save_vehicle_reservation_info_form" ') ?>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="vehicle_id" id="vehicle_id" value="<?php echo isset($vehicleDetails['id']) && !empty($vehicleDetails['id'])?$vehicleDetails['id']:''; ?>">
                        <input type="hidden" name="customer_id" id="customer_id" value="<?php echo isset($customerData['id']) && !empty($customerData['id'])?$customerData['id']:''; ?>">
                        <div class="vehicle-wrapper">
                            <a href="<?php echo base_url('vehicle-details/'.$vehicleDetails['encrypted_id']); ?>">
                                <img src="<?php echo isset($vehicleDetails['thumbnail_url']) && !empty($vehicleDetails['thumbnail_url'])?$vehicleDetails['thumbnail_url']:base_url('assets/admin/src/images/default-img.png'); ?>">
                            </a>
                            <div class="vehicle-wrapper-title">
                                <a href="<?php echo base_url('vehicle-details/'.$vehicleDetails['encrypted_id']); ?>">
                                    <h5><?php echo isset($vehicleDetails['cmp_name']) && !empty($vehicleDetails['cmp_name'])?$vehicleDetails['cmp_name']:''; ?> <?php echo isset($vehicleDetails['cmp_model_name']) && !empty($vehicleDetails['cmp_model_name'])?$vehicleDetails['cmp_model_name']:''; ?></h5>
                                </a>
                            </div>
                            <div class="d-flex vehicle-overview">
                                <div class="overview-badge">
                                    <h6>Year</h6>
                                    <h5><?php echo isset($vehicleDetails['registration_year']) && !empty($vehicleDetails['registration_year'])?$vehicleDetails['registration_year']:''; ?></h5>
                                </div>
                                <div class="overview-badge">
                                    <h6>Driven</h6>
                                    <h5><?php echo isset($vehicleDetails['kms_driven'])?number_format($vehicleDetails['kms_driven'], 0, '.', ','):''; ?>km</h5>
                                </div>
                                <div class="overview-badge">
                                    <h6>Fuel Type</h6>
                                    <h5><?php echo isset($vehicleDetails['fuelTypeName'])?$vehicleDetails['fuelTypeName']:'NA'; ?></h5>
                                </div>
                                <div class="overview-badge">
                                    <h6>Owner</h6>
                                    <h5>
                                        <?php 
                                        if(isset($vehicleDetails['owner']) && !empty($vehicleDetails['owner'])){
                                            if($vehicleDetails['owner']==1){
                                                echo '1st';
                                            }elseif($vehicleDetails['owner']==2){
                                                echo '2nd';
                                            }elseif($vehicleDetails['owner']==3){
                                                echo '3rd';
                                            }elseif($vehicleDetails['owner']==4){
                                                echo '3+ Owner';
                                            }
                                        }
                                        ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="vehicle-price d-flex align-items-center">
                                <h5>₹<?php echo isset($vehicleDetails['selling_price'])?number_format($vehicleDetails['selling_price'], 0, '.', ','):''; ?></h5>
                                <h6>(<?php if(isset($vehicleDetails['pricing_type']) && !empty($vehicleDetails['pricing_type'])){ if($vehicleDetails['pricing_type']==1){echo'Fixed';}elseif($vehicleDetails['pricing_type']==2){echo'Negotiable';} }else{echo 'NA';} ?>)</h6>
                            </div>
                            <div class="bill-table-wrap">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Reservation Fee</th>
                                            <td>₹2000</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Service Charge Fee (10%)</th>
                                            <td>₹200</td>
                                        </tr>
                                        <tr class="bill-total">
                                            <th scope="row">Total Amount</th>
                                            <td colspan="2">₹2200</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="brand-label mb-1">Date<span class="required">*</span></label>
                                            <input type="date" name="date" id="date" class="brand-input">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="brand-label mb-1">Time<span class="required">*</span></label>
                                            <input type="time" name="time" id="time" class="brand-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="rrp text-center">
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#reservationRefundModal">Read Reservation Refund Policy</a>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="agree_t_and_c" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I agree with Reservation Refund Policy and Terms &amp; Conditions
                                        </label>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto mt-3">
                                    <button type="submit" class="dg-brand-btn">Reserve Now</button>
                                </div>
                            </div>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }else{ ?>
<section class="section-spacing">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h3>Reservation details</h3>
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="bill-summary-wrapper">
                    <div class="vehicle-wrapper">
                        <a href="<?php echo base_url('vehicle-details/'.$vehicleDetails['encrypted_id']); ?>">
                            <img src="<?php echo isset($vehicleDetails['thumbnail_url']) && !empty($vehicleDetails['thumbnail_url'])?$vehicleDetails['thumbnail_url']:base_url('assets/admin/src/images/default-img.png'); ?>">
                        </a>
                        <div class="vehicle-wrapper-title">
                            <a href="<?php echo base_url('vehicle-details/'.$vehicleDetails['encrypted_id']); ?>">
                                <h5><?php echo isset($vehicleDetails['cmp_name']) && !empty($vehicleDetails['cmp_name'])?$vehicleDetails['cmp_name']:''; ?> <?php echo isset($vehicleDetails['cmp_model_name']) && !empty($vehicleDetails['cmp_model_name'])?$vehicleDetails['cmp_model_name']:''; ?></h5>
                            </a>
                        </div>
                        <div class="d-flex vehicle-overview">
                            <div class="overview-badge">
                                <h6>Year</h6>
                                <h5><?php echo isset($vehicleDetails['registration_year']) && !empty($vehicleDetails['registration_year'])?$vehicleDetails['registration_year']:''; ?></h5>
                            </div>
                            <div class="overview-badge">
                                <h6>Driven</h6>
                                <h5><?php echo isset($vehicleDetails['kms_driven'])?number_format($vehicleDetails['kms_driven'], 0, '.', ','):''; ?>km</h5>
                            </div>
                            <div class="overview-badge">
                                <h6>Fuel Type</h6>
                                <h5><?php echo isset($vehicleDetails['fuelTypeName'])?$vehicleDetails['fuelTypeName']:'NA'; ?></h5>
                            </div>
                            <div class="overview-badge">
                                <h6>Owner</h6>
                                <h5>
                                    <?php 
                                    if(isset($vehicleDetails['owner']) && !empty($vehicleDetails['owner'])){
                                        if($vehicleDetails['owner']==1){
                                            echo '1st';
                                        }elseif($vehicleDetails['owner']==2){
                                            echo '2nd';
                                        }elseif($vehicleDetails['owner']==3){
                                            echo '3rd';
                                        }elseif($vehicleDetails['owner']==4){
                                            echo '3+ Owner';
                                        }
                                    }
                                    ?>
                                </h5>
                            </div>
                        </div>
                        <div class="vehicle-price d-flex align-items-center">
                            <h5>₹<?php echo isset($vehicleDetails['selling_price'])?number_format($vehicleDetails['selling_price'], 0, '.', ','):''; ?></h5>
                            <h6>(<?php if(isset($vehicleDetails['pricing_type']) && !empty($vehicleDetails['pricing_type'])){ if($vehicleDetails['pricing_type']==1){echo'Fixed';}elseif($vehicleDetails['pricing_type']==2){echo'Negotiable';} }else{echo 'NA';} ?>)</h6>
                        </div>
                        <div class="bill-table-wrap">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Reservation Fee</th>
                                        <td>₹2000</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Service Charge Fee (10%)</th>
                                        <td>₹200</td>
                                    </tr>
                                    <tr class="bill-total">
                                        <th scope="row">Total Amount</th>
                                        <td colspan="2">₹2200</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-7">
                <div class="reservation-details-wrap">
                    <div class="row">
                        <div class="col-sm-6 col-lg-4">
                            <div class="mb-3">
                                <h6>Reservation ID</h6>
                                <h4>#<?php echo isset($vehicleDetails['reservedVehicleInfo']['reservation_id']) && !empty($vehicleDetails['reservedVehicleInfo']['reservation_id'])?$vehicleDetails['reservedVehicleInfo']['reservation_id']:''; ?></h4>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="mb-3">
                                <h6>Date of Reservation</h6>
                                <h4><?php echo isset($vehicleDetails['reservedVehicleInfo']['created_datetime']) && !empty($vehicleDetails['reservedVehicleInfo']['created_datetime'])?date("d-m-y h:i A",strtotime($vehicleDetails['reservedVehicleInfo']['created_datetime'])):''; ?></h4>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="mb-3">
                                <h6>Visitor Name</h6>
                                <h4><?php echo isset($vehicleDetails['reservedVehicleInfo']['customer_name']) && !empty($vehicleDetails['reservedVehicleInfo']['customer_name'])?$vehicleDetails['reservedVehicleInfo']['customer_name']:''; ?></h4>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="mb-3">
                                <h6>Visiting Date</h6>
                                <h4><?php echo isset($vehicleDetails['reservedVehicleInfo']['date']) && !empty($vehicleDetails['reservedVehicleInfo']['date'])?date("d-m-y",strtotime($vehicleDetails['reservedVehicleInfo']['date'])):''; ?></h4>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="mb-3">
                                <h6>Visiting Time</h6>
                                <h4><?php echo isset($vehicleDetails['reservedVehicleInfo']['time']) && !empty($vehicleDetails['reservedVehicleInfo']['time'])?date("h:i A",strtotime($vehicleDetails['reservedVehicleInfo']['time'])):''; ?></h4>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="mb-3">
                                <h6>Payment Status</h6>
                                <h4>Paid</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="mb-3">
                                <h6>Payment Menthod</h6>
                                <h4>Online Payment</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="mb-3">
                                <h6>Amount Paid</h6>
                                <h4>₹2200</h4>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto mt-2">
                        <a href="<?php echo base_url('vehicle-details/'.$vehicleDetails['encrypted_id']); ?>" class="dg-brand-btn" >Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<?= $this->endSection() ?>